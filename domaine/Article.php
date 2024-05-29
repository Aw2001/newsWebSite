<?php

    class Article {
        private $id;
        private $titre;
        private $contenu;
        private $categorie;
       


        public function __construct($id, $titre, $contenu, $categorie) {
            $this->id = $id;
            $this->titre = $titre;
            $this->contenu = $contenu;
            $this->categorie = $categorie;
        }


        public function getId() {
            return $this->id;
        }

        public function getTitre() {
            return $this->titre;
        }

        public function getContenu() {
            return $this->contenu;
        }

        public function getCategorie() {
            return $this->categorie;
        }

        
        public function setId($id) {
            $this->id = $id;
        }

        public function setTitre($titre) {
            $this->titre = $titre;
        }

        
        public function setContenu($contenu) {
            $this->contenu = $contenu;
        }

        public function setCategorie($categorie) {
            $this->categorie = $categorie;
        }

    
    }
?>