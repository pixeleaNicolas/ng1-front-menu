<?php 
class FrontMenu {
    private static $instance = null;
    private $onglets = [];

    // Rend le constructeur privé pour empêcher l'instanciation directe
    private function __construct() {
        add_action('wp_enqueue_scripts', array($this, 'loadScriptAndStyle'));
    }

    // Empêche le clonage de l'instance
    private function __clone() {}

    // Empêche la désérialisation de l'instance
    public function __wakeup() {}

    // Méthode statique pour obtenir l'instance de la classe
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function ajouterOnglet(Ng1FrontMenuOnglet $onglet) {
        $this->onglets[] = $onglet;
    }

    public function afficherMenu() {
        echo '<div class="ng1-front-menu">';
        foreach ($this->onglets as $onglet) {
            // Assurez-vous que la classe Ng1FrontMenuOnglet a des méthodes getId() et getNom()
            echo '<div class="onglet" id="onglet-' . $onglet->getId() . '">';
            echo '<h3>' . $onglet->getNom() . '</h3>';
            $boutons = $onglet->getBoutons();
            foreach ($boutons as $bouton) {
                // Assurez-vous que la classe Ng1FrontMenuButton a des méthodes getAction() et getLabel()
                echo '<button onclick="' . $bouton->getAction() . '">' . $bouton->getLabel() . '</button>';
            }
            echo '</div>';
        }
        echo '</div>';
    }

    public function loadScriptAndStyle() {
        // Chemin relatif à la racine du plugin
        $urlBase = plugin_dir_url(__FILE__);

        // Enregistrer et charger le CSS
        wp_register_style('ng1-front-menu-style', $urlBase . 'style.css');
        wp_enqueue_style('ng1-front-menu-style');
        // Enregistrer et charger le JS
        wp_register_script('ng1-front-menu-script', $urlBase . 'assets/js/function.js', array('jquery'), false, true);
        wp_enqueue_script('ng1-front-menu-script');
    }

}
