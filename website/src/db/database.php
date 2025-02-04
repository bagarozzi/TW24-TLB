<?php
class DatabaseHelper {
    private $db;

    public function __construct($servername, $username, $password, $dbname, $port) {
        $this->db = new mysqli($servername, $username, $password, $dbname, $port);
        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
        }
    }

    public function getProducts($category, $name, $sort) {
        $sql = "SELECT nome, prezzo, descrizione, immagine, disponibilita FROM prodotto WHERE 1";
        $types = "";
        $params = [];
        if($category != "") {
            $sql .= " AND prodotto.App_nome = ?";
            $types .= "s";
            $params[] = $category; 
        }
        if($name != "") {
            $sql .= " AND LOWER(nome) LIKE LOWER(?)";
            $types .= "s";
            $params[] = $name; 
        }
        if($sort !="") {
            $sql .= " ORDER BY $sort";
        }
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param($types, ...$params); // Binding dei parametri

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

    public function updateUser($email, $name, $surname, $phone, $birthday, $password) {
        $query = "UPDATE user SET name = ?, surname = ?, phone = ?, birthday = ?, password = ? WHERE email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ssssss', $name, $surname, $phone, $birthday, $password, $email);
        $stmt->execute();
    }
}
?>