<?php

// Fonctions utiles
/**
 * Nous allons utiliser Render pour afficher nos vues.
 *
 */
function render(string $path, array $variables = []): void {
    extract($variables);
    ob_start();
    require "$path.phtml";
    $pageContent = ob_get_clean();

    require dirname(__DIR__).'/views/layout.phtml';
}