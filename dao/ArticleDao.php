<?php
    require_once 'ConnexionManager.php';
    require_once '../domaine/Article.php';
    require_once '../domaine/Categorie.php';


    class ArticleDao {
        private $connexion;

        public function __construct() {
            $this->connexion = ConnexionManager::getConnexion();
        }

        public function getArticleById($id) {
            $sql = "SELECT * FROM article WHERE id = :id";
            $stmt = $this->connexion->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            $row = $stmt->fetch();
            return new Article($row['id'], $row['titre'], $row['contenu'], $row['categorie'], $row['dateCreation'], $row['dateModification']);
        }

        public function getArticles() {
            $sql = "SELECT * FROM article";
            $stmt = $this->connexion->query($sql);
            $rows = $stmt->fetchAll();
            $articles = array();
            foreach ($rows as $row) {
                $articles[] = new Article($row['id'], $row['titre'], $row['contenu'], $row['categorie'], $row['dateCreation'], $row['dateModification']);
            }
            return $articles;
        }

        public function getArticlesByCategorieId($id) {
            $sql = "SELECT * FROM article WHERE categorie = :id";
            $stmt = $this->connexion->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            $rows = $stmt->fetchAll();
            $articles = array();
            foreach ($rows as $row) {
                $articles[] = new Article($row['id'], $row['titre'], $row['contenu'], $row['categorie'], $row['dateCreation'], $row['dateModification']);
            }
            return $articles;
        }

        public function addArticle($article) {
            $sql = "INSERT INTO article (titre, contenu, categorie, dateCreation, dateModification) VALUES (:titre, :contenu, :categorie, :dateCreation, :dateModification)";
            $stmt = $this->connexion->prepare($sql);
            $stmt->bindValue(':titre', $article->getTitre());
            $stmt->bindValue(':contenu', $article->getContenu());
            $stmt->bindValue(':categorie', $article->getCategorie());
            $stmt->bindValue(':dateCreation', $article->getDateCreation());
            $stmt->bindValue(':dateModification', $article->getDateModification());
            $stmt->execute();
        }

        public function updateArticle($article) {
            $sql = "UPDATE article SET titre = :titre, contenu = :contenu, categorie = :categorie, dateCreation = :dateCreation, dateModification = :dateModification WHERE id = :id";
            $stmt = $this->connexion->prepare($sql);
            $stmt->bindValue(':id', $article->getId());
            $stmt->bindValue(':titre', $article->getTitre());
            $stmt->bindValue(':contenu', $article->getContenu());
            $stmt->bindValue(':categorie', $article->getCategorie());
            $stmt->bindValue(':dateCreation', $article->getDateCreation());
            $stmt->bindValue(':dateModification', $article->getDateModification());
            $stmt->execute();
        }

        public function deleteArticle($id) {
            $sql = "DELETE FROM article WHERE id = :id";
            $stmt = $this->connexion->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
        }

    }
?>