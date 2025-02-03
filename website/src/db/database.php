<?php
class DatabaseHelper {
    private $db;

    public function __construct($servername, $username, $password, $dbname, $port) {
        $this->db = new mysqli($servername, $username, $password, $dbname, $port);
        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
        }
    }

    public function getProductsByCategory($category) {
        $stmt = $this->db->prepare("SELECT nome, prezzo, descrizione, immagine, disponibilita FROM prodotto 
                                    WHERE prodotto.App_nome = ?;");
        $stmt->bind_param("s", $category);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getProductsSorted($category, $attribute) {
        $stmt = $this->db->prepare("SELECT nome, prezzo, descrizione, immagine, disponibilita FROM prodotto 
                                    WHERE prodotto.App_nome = ?
                                    ORDER BY $attribute;"); 
        $stmt->bind_param("s", $category);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getShoppingCart($user) {
        $stmt = $this->db->prepare("SELECT * FROM prodotto, carrello WHERE prodotto.codProdotto=carrello.codProdotto AND carrello.email=?");
        $stmt->bind_param("s", $user);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function updateShoppingCart($user, $product, $quantity) {
        $stmt = $this->db->prepare("UPDATE carrello SET quantita=? WHERE email=? AND codProdotto=?");
        $stmt->bind_param("isi", $quantity, $user, $product);
        $stmt->execute();
    }

    public function removeFromShoppingCart($user, $product) {
        $stmt = $this->db->prepare("DELETE FROM carrello WHERE email=? AND codProdotto=?");
        $stmt->bind_param("si", $user, $product);
        $stmt->execute();
    }

    public function getNotifications($user) {
        $stmt = $this->db->prepare("SELECT * FROM notifica WHERE email=? ORDER BY Data DESC");
        $stmt->bind_param("s", $user);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getUserInfo($email) {
        $query = "SELECT * FROM UTENTE WHERE email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function insertUser($name, $surname, $email, $password, $birthday) {
        $query = "INSERT INTO utente (email, password, nome, cognome, dataNascita) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('sssss', $email, $password, $nome, $surname, $birthday);
        $stmt->execute();
    }

    public function updateUser($email, $name, $surname, $birthday, $password) {
        $query = "UPDATE user SET name = ?, surname = ?, birthday = ?, password = ? WHERE email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('sssss', $name, $surname, $birthday, $password, $email);
        $stmt->execute();
    }

    public function checkUsername($email) {
        $query = "SELECT email FROM utente WHERE email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getOrders($user) {
        $stmt = $this->db->prepare("SELECT SUM(richiesta.quantita * prodotto.prezzo) as totale, ordine.data, ordine.riferimento FROM ordine, richiesta, prodotto WHERE ordine.riferimento=richiesta.riferimento AND ordine.email=? AND prodotto.codProdotto=richiesta.codProdotto ORDER BY data DESC");
        $stmt->bind_param("s", $user);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAdminPassword($username) {
        $query = "SELECT password FROM admin WHERE username = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getUserPassword($email) {
        $query = "SELECT password FROM utente WHERE email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>