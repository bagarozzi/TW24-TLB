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

    public function updateUser($email, $name, $surname, $phone, $birthday, $password) {
        $query = "UPDATE user SET name = ?, surname = ?, phone = ?, birthday = ?, password = ? WHERE email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ssssss', $name, $surname, $phone, $birthday, $password, $email);
        $stmt->execute();
    }
}
?>