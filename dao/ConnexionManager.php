<?php

class ConnexionManager {
    private $connexion;
    private static $instance = null;

    public function __construct() {
        $this->connexion = new PDO(
            "mysql:host=localhost;dbname=mglsi_news",
            "mglsi_user",
            "passer"
        );

        $this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->connexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $this->connexion->exec("SET NAMES 'UTF8'");
    }

    public static function getConnexion() {
        if (self::$instance == null) {
            self::$instance = new ConnexionManager();
        }
        return self::$instance->connexion;
    }
}
?>
