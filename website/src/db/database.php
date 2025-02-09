<?php
class DatabaseHelper
{
    private $db;

    public function __construct($servername, $username, $password, $dbname, $port)
    {
        $this->db = new mysqli($servername, $username, $password, $dbname, $port);
        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
        }
    }

    public function insertProductInCart($id, $email, $quantity) {
        $product = $this->getSingleProductinCart($id, $email);
        if($product) {
            $newQuantity = $product["quantita"] + $quantity;
            $query = "UPDATE carrello SET `quantita`= $newQuantity WHERE codProdotto = ? AND email = ?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('ss',$id, $email);
            $stmt->execute();
        } else {
            $query = "INSERT INTO `carrello`(`codProdotto`, `email`, `quantita`) VALUES (?, ?, ?)";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('sss',$id, $email, $quantity);
            $stmt->execute();
        }
    }

    public function getSingleProductinCart($id, $email)
    {
        $sql = "SELECT quantita FROM carrello WHERE codProdotto = ? AND email = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("is", $id, $email);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function getSingleProduct($id)
    {
        $sql = "SELECT codProdotto, nome, prezzo, descrizione, immagine, disponibilita, App_nome FROM prodotto WHERE codProdotto = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function getProducts($category, $name, $sort, $maxPrice)
    {
        $sql = "SELECT codProdotto, nome, prezzo, descrizione, immagine, disponibilita FROM prodotto WHERE 1";
        $types = "";
        $params = [];
        $paramYN = false;
        if ($category != "") {
            $sql .= " AND prodotto.App_nome = ?";
            $types .= "s";
            $params[] = $category;
            $paramYN = true;
        }
        if ($maxPrice != "") {
            $sql .= " AND prodotto.prezzo < ?";
            $types .= "d";
            $params[] = $maxPrice;
            $paramYN = true;
        }
        if ($name != "") {
            $sql .= ' AND LOWER(nome) LIKE ?';
            $types .= "s";
            $name = strtolower($name);
            $params[] = "%$name%";
            $paramYN = true;
        }
        if ($sort != "") {
            $sql .= " ORDER BY $sort";
        }
        $stmt = $this->db->prepare($sql);
        if ($paramYN) {
            $stmt->bind_param($types, ...$params);
        }
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getShoppingCart($user)
    {
        $stmt = $this->db->prepare("SELECT * FROM prodotto, carrello WHERE prodotto.codProdotto=carrello.codProdotto AND carrello.email=?");
        $stmt->bind_param("s", $user);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function emptyCart($email)
    {
        $stmt = $this->db->prepare("DELETE FROM carrello WHERE email=?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
    }

    public function updateShoppingCart($user, $product, $quantity)
    {
        $stmt = $this->db->prepare("UPDATE carrello SET quantita=? WHERE email=? AND codProdotto=?");
        $stmt->bind_param("isi", $quantity, $user, $product);
        $stmt->execute();
    }

    public function removeFromShoppingCart($user, $product)
    {
        $stmt = $this->db->prepare("DELETE FROM carrello WHERE email=? AND codProdotto=?");
        $stmt->bind_param("si", $user, $product);
        $stmt->execute();
    }

    public function getNotifications($user)
    {
        $stmt = $this->db->prepare("SELECT * FROM notifica WHERE email=? ORDER BY Data DESC");
        $stmt->bind_param("s", $user);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAdminNotifications()
    {
        $stmt = $this->db->prepare('SELECT * FROM notifica WHERE username="turbo" ORDER BY Data DESC');
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getUserInfo($email)
    {
        $query = "SELECT email, password, nome as name, cognome as surname, dataNascita as birthday FROM UTENTE WHERE email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function insertUser($email, $password, $name, $surname, $birthday)
    {
        $query = "INSERT INTO utente (email, password, nome, cognome, dataNascita) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('sssss', $email, $password, $name, $surname, $birthday);
        $stmt->execute();
    }

    public function updateUser($email, $name, $surname, $birthday, $password)
    {
        $query = "UPDATE UTENTE SET nome = ?, cognome = ?, dataNascita = ?, password = ? WHERE email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('sssss', $name, $surname, $birthday, $password, $email);
        return $stmt->execute();
    }

    public function checkUsername($email)
    {
        $query = "SELECT email FROM UTENTE WHERE email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function insertCategory($category)
    {
        $query = "INSERT INTO CATEGORIA_PRODOTTO (nome) VALUES (?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $category);
        $stmt->execute();
    }

    public function updateCategory($newCategory, $category)
    {
        $query = "UPDATE CATEGORIA_PRODOTTO SET nome = ? WHERE nome = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("ss", $newCategory, $category);
        return $stmt->execute();
    }

    public function deleteCategory($category)
    {
        $query = "DELETE FROM CATEGORIA_PRODOTTO WHERE nome = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $category);
        return $stmt->execute();
    }

    public function insertProduct($name, $price, $description, $image, $quantity, $category)
    {
        $query = "INSERT INTO PRODOTTO (nome, prezzo, descrizione, immagine, disponibilita, App_nome) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("sdssis", $name, $price, $description, $image, $quantity, $category);
        $stmt->execute();
        return $stmt->insert_id;
    }

    public function updateProduct($name, $price, $description, $image, $quantity, $category, $id)
    {
        $query = "UPDATE PRODOTTO SET nome = ?, prezzo = ?, descrizione = ?, immagine = ?, disponibilita = ?, App_nome = ? WHERE codProdotto = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("sdssisi", $name, $price, $description, $image, $quantity, $category, $id);
        return $stmt->execute();
    }

    public function updateProductWithoutImage($name, $price, $description, $quantity, $category, $id)
    {
        $query = "UPDATE PRODOTTO SET nome = ?, prezzo = ?, descrizione = ?, disponibilita = ?, App_nome = ? WHERE codProdotto = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("sdsisi", $name, $price, $description, $quantity, $category, $id);
        return $stmt->execute();
    }

    public function deleteProduct($id)
    {
        $query = "DELETE FROM PRODOTTO WHERE codProdotto = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public function removeProduct($product_id, $quantity) {
        $stmt = $this->db->prepare("SELECT disponibilita FROM prodotto WHERE codProdotto = ?");
        $stmt->bind_param("i", $product_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $product = $result->fetch_assoc();

        if ($product && $product['disponibilita'] >= $quantity) {
            $stmt = $this->db->prepare("UPDATE prodotto SET disponibilita = disponibilita - ? WHERE codProdotto = ?");
            $stmt->bind_param("ii", $quantity, $product_id);
            $stmt->execute();
            return true;
        } else {
            return false;
        }
    }

    public function getCategories()
    {
        $query = "SELECT nome as name FROM CATEGORIA_PRODOTTO";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getOrders($user)
    {
        $stmt = $this->db->prepare('SELECT o.riferimento AS riferimento, o.data AS data, SUM(p.prezzo * r.quantita) AS totale
            FROM ORDINE o JOIN richiesta r ON o.riferimento = r.riferimento JOIN PRODOTTO p ON r.codProdotto = p.codProdotto
            WHERE o.email=?
            GROUP BY o.riferimento, o.data, o.email;
        ');
        $stmt->bind_param("s", $user);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAdminPassword($username)
    {
        $query = "SELECT password FROM admin WHERE username = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getUserPassword($email)
    {
        $query = "SELECT password FROM utente WHERE email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function markNotificationAsRead($notification_id)
    {
        $stmt = $this->db->prepare("UPDATE notifica SET letto=1 WHERE id_notifica=?");
        $stmt->bind_param("i", $notification_id);
        $stmt->execute();
    }

    public function removeNotification($notification_id)
    {
        $stmt = $this->db->prepare("DELETE FROM notifica WHERE id_notifica=?");
        $stmt->bind_param("i", $notification_id);
        $stmt->execute();
    }

    public function createOrder($email)
    {
        $stmt = $this->db->prepare('INSERT INTO ordine (email, data, stato) VALUES (?, CURRENT_DATE, "confermato")');
        $stmt->bind_param("s", $email);
        $stmt->execute();

        $inserted_id = $stmt->insert_id;

        $stmt->close();

        $stmt2 = $this->db->prepare("INSERT INTO richiesta (riferimento, codProdotto, quantita) VALUES ($inserted_id, ?, ?)");
        $cart = $this->getShoppingCart($email);
        foreach ($cart as $product) {
            if($this->removeProduct($product["codProdotto"], $product["quantita"])) {
                $stmt2->bind_param("si", $product["codProdotto"], $product["quantita"]);
                $stmt2->execute();
            }
        }

        $this->emptyCart($email);

        $stmt2->close();

        return $inserted_id;
    }

    public function getOrderDetails($order_id)
    {
        $stmt = $this->db->prepare("SELECT prodotto.nome, richiesta.quantita, prodotto.prezzo FROM richiesta, prodotto WHERE richiesta.riferimento=? AND richiesta.codProdotto=prodotto.codProdotto");
        $stmt->bind_param("i", $order_id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAllOrders()
    {
        $stmt = $this->db->prepare("SELECT ordine.riferimento, ordine.email, ordine.data, SUM(richiesta.quantita) as totale, ordine.stato FROM ordine, richiesta, prodotto WHERE ordine.riferimento=richiesta.riferimento AND prodotto.codProdotto=richiesta.codProdotto GROUP BY ordine.riferimento ORDER BY ordine.data DESC");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getSingleOrder($order_id)
    {
        $stmt = $this->db->prepare("SELECT * FROM ordine WHERE riferimento=?");
        $stmt->bind_param("i", $order_id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function deleteOrder($order_id)
    {
        $stmt = $this->db->prepare("DELETE FROM ordine WHERE riferimento=?");
        $stmt->bind_param("i", $order_id);
        $stmt->execute();
    }

    public function updateOrderStatus($order_id, $status)
    {
        $stmt = $this->db->prepare("UPDATE ordine SET stato=? WHERE riferimento=?");
        $stmt->bind_param("si", $status, $order_id);
        $stmt->execute();
    }

    public function setOrderShipped($order_id)
    {
        $stmt = $this->db->prepare("UPDATE ordine SET spedito=1 WHERE riferimento=?");
        $stmt->bind_param("i", $order_id);
        $stmt->execute();
    }

    public function createUserNotification($email, $order_id, $title, $description)
    {
        $stmt = $this->db->prepare('INSERT INTO notifica (Data, Titolo, Descrizione, riferimento, email, letto) VALUES (CURRENT_DATE, ?, ?, ?, ?, "0")');
        $stmt->bind_param("ssis", $title, $description, $order_id, $email);
        $stmt->execute();
    }

    public function createAdminNotification($user, $order_id, $title, $description)
    {
        $stmt = $this->db->prepare('INSERT INTO notifica (Data, Titolo, Descrizione, riferimento, username, letto) VALUES (CURRENT_DATE, ?, ?, ?, ?, "0")');
        $stmt->bind_param("ssis", $title, $description, $order_id, $user);
        $stmt->execute();
    }
}
