<?php
include_once __DIR__.'/ng1FrontMenuButton.php';
include_once __DIR__.'/ng1FrontMenuOnglet.php';
include_once __DIR__.'/ng1FrontMenu.php';




function initialiser_front_menu() {

    $menu = FrontMenu::getInstance(); // Récupère l'instance unique de FrontMenu

    $onglet1 = new Ng1FrontMenuOnglet('id1', 'Onglet 1');
    $onglet1->ajouterBouton(new Ng1FrontMenuButton('Bouton 1', 'action1();'));
    $onglet1->ajouterBouton(new Ng1FrontMenuButton('Bouton 2', 'action2();'));
    $menu->ajouterOnglet($onglet1);

    $onglet2 = new Ng1FrontMenuOnglet('id2', 'Onglet 2');
    $onglet2->ajouterBouton(new Ng1FrontMenuButton('Bouton 3', 'action3();'));
    $menu->ajouterOnglet($onglet2);

    // Ajouter d'autres onglets et boutons selon les besoins

    // Afficher le menu
    $menu->afficherMenu();
}

// Ajouter l'action pour afficher le menu
add_action('wp_footer', 'initialiser_front_menu');