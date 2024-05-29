<?php
    require_once 'ConnexionManager.php';
    require_once '../domaine/Categorie.php';

    class CategorieDao {
        private $connexion;

        public function __construct() {
            $this->connexion = ConnexionManager::getConnexion();
        }

        public function getCategorieById($id) {
            $sql = "SELECT * FROM categorie WHERE id = :id";
            $stmt = $this->connexion->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            $row = $stmt->fetch();
            return new Categorie($row['id'], $row['libelle']);
        }

        public function getCategories() {
            $sql = "SELECT * FROM categorie";
            $stmt = $this->connexion->query($sql);
            $rows = $stmt->fetchAll();
            $categories = array();
            foreach ($rows as $row) {
                $categories[] = new Categorie($row['id'], $row['libelle']);
            }
            return $categories;
        }

        public function addCategorie($categorie) {
            $sql = "INSERT INTO categorie (libelle) VALUES (:libelle)";
            $stmt = $this->connexion->prepare($sql);
            $stmt->bindValue(':libelle', $categorie->getLibelle());
            $stmt->execute();
        }

        public function updateCategorie($categorie) {
            $sql = "UPDATE categorie SET libelle = :libelle WHERE id = :id";
            $stmt = $this->connexion->prepare($sql);
            $stmt->bindValue(':id', $categorie->getId());
            $stmt->bindValue(':libelle', $categorie->getLibelle());
            $stmt->execute();
        }

        public function deleteCategorie($id) {
            $sql = "DELETE FROM categorie WHERE id = :id";
            $stmt = $this->connexion->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
        }
    }
?>