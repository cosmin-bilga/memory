<?php

define("VIEW_PATH", "templates/");

function load_view($view, $data = [])
{
    // Extraire les données en variables
    if (!empty($data)) {
        extract($data);
    }

    // Chemin vers le fichier de vue
    $view_file = VIEW_PATH . '/' . $view . '.php';

    // Vérifier si la vue existe
    if (!file_exists($view_file)) {
        die("Vue non trouvée : $view");
    }

    // Charger la vue
    require $view_file;
}

/**
 * Charge une vue avec un layout
 */
function load_view_with_layout($view, $data = [], $layout = 'layout')
{
    // Démarrer la capture de sortie
    ob_start();

    // Charger la vue
    load_view($view, $data);

    // Récupérer le contenu de la vue
    $content = ob_get_clean();

    // Ajouter le contenu aux données
    $data['content'] = $content;

    // Charger le layout
    load_view('layouts/' . $layout, $data);
}
