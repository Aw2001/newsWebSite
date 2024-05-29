<?php
    require_once '../dao/ConnexionManager.php';
    require_once '../dao/ArticleDao.php';
    require_once '../dao/CategorieDao.php';

    class Controller {

        public function __construct() {
        }

        public function showAccueil() {
            $articleDao = new ArticleDao();
            $categorieDao = new CategorieDao();
            $articles = $articleDao->getArticles();
            $categories = $categorieDao->getCategories();
            require '../views/accueil.php';
        }

        public function showArticle($id){
            $articleDao = new ArticleDao();
            $categorieDao = new CategorieDao();
            $article = $articleDao->getArticleById($id);
            $categories = $categorieDao->getCategorieById();
            require '../views/accueil.php';
        }

        public function showCategorie($id){
            $articleDao = new ArticleDao();
            $categorieDao = new CategorieDao();
            $articles = $articleDao->getArticlesByCategorieId($id);
            $categories = $categorieDao->getCategories();
            require '../views/accueil.php';
        }

    }
?>