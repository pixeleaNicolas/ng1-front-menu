<?php 
class Ng1FrontMenuOnglet {
    private $id;
    private $nom;
    private $boutons = [];

    public function __construct($id, $nom) {
        $this->id = $id;
        $this->nom = $nom;
    }

    public function ajouterBouton(Ng1FrontMenuButton $bouton) {
        $this->boutons[] = $bouton;
    }

    // Méthode pour supprimer un bouton par son id
    public function supprimerBouton($idBouton) {
        foreach ($this->boutons as $index => $bouton) {
            if ($bouton->getId() === $idBouton) {
                unset($this->boutons[$index]);
                $this->boutons = array_values($this->boutons); // Réindexe le tableau après suppression
                break;
            }
        }
    }

    // Méthode pour obtenir tous les boutons de cet onglet
    public function getBoutons() {
        return $this->boutons;
    }

    // Méthode pour obtenir l'ID de l'onglet
    public function getId() {
        return $this->id;
    }

    // Méthode pour obtenir le nom de l'onglet
    public function getNom() {
        return $this->nom;
    }

    // Optionnel: Méthode pour générer le HTML de cet onglet et de ses boutons
    public function afficher() {
        echo '<div class="onglet" id="onglet-' . $this->id . '">';
        echo '<h3>' . $this->nom . '</h3>';
        foreach ($this->boutons as $bouton) {
            $bouton->afficher(); // Assurez-vous que la classe Ng1FrontMenuButton a une méthode afficher()
        }
        echo '</div>';
    }
}