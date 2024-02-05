<?php 
class Ng1FrontMenuButton {
    private $label;
    private $action;
    private $classesCss = []; // Ajout d'une propriété pour les classes CSS

    public function __construct($label, $action) {
        $this->label = $label;
        $this->action = $action;
    }

    // Méthode pour ajouter une classe CSS au bouton
    public function ajouterClasseCss($classe) {
        $this->classesCss[] = $classe;
    }

    // Méthode pour supprimer une classe CSS du bouton
    public function supprimerClasseCss($classe) {
        $index = array_search($classe, $this->classesCss);
        if ($index !== false) {
            unset($this->classesCss[$index]);
            $this->classesCss = array_values($this->classesCss); // Réindexe le tableau après suppression
        }
    }

    // Méthode pour obtenir le label du bouton
    public function getLabel() {
        return $this->label;
    }

    // Méthode pour obtenir l'action du bouton
    public function getAction() {
        return $this->action;
    }

    // Méthode pour exécuter l'action du bouton (peut-être à repenser selon vos besoins)
    public function executerAction() {
        // Logique pour exécuter l'action du bouton
        // Cette méthode pourrait être modifiée pour mieux s'adapter à votre usage,
        // par exemple, en générant du JavaScript pour l'action.
    }

    // Méthode pour afficher le bouton
    public function afficher() {
        $classes = join(' ', $this->classesCss); // Concatène toutes les classes CSS
        echo '<button class="' . $classes . '" onclick="' . $this->action . '">' . $this->label . '</button>';
    }
}
