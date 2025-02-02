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
        $stmt = $this->db->prepare("SELECT * FROM etichetta AS e , prodotto AS p
                                    WHERE p.codProdotto = e.codProdotto AND e.nome = ?");
        $stmt->bind_param("s", $category);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all();
    }
}
?>