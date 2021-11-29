<?php

// hook wordpress pour configurer les features du thème
// Nous écoutons un event nommé 'after_setup_theme'
add_action(
    'after_setup_theme', // nom de l'event à surveiller
    'osailing_initialize_theme' // fonction à executer lorsquel l'event est déclenché
);

function osailing_initialize_theme()
{
    // wordpress va gérer la balise <title> du thème
    // DOC WP add_theme_support https://developer.wordpress.org/reference/functions/add_theme_support/
    add_theme_support('title-tag');

    // IMPORTANT WP theme gérant les images de mise en avant  des articles
    add_theme_support('post-thumbnails');

    // IMPORTANT WP theme gérant les menus depuis le backoffice
    add_theme_support('menus');
}

// =========================================================
// IMPORTANT WP wp_enqueue_scripts, ajouter des fichiers css/js à charger dans le thème
add_action(
    'wp_enqueue_scripts',
    function() {
        // IMPORTANT WP chargement d'un fichier css
        // DOC WP wp_enqueue_style https://developer.wordpress.org/reference/functions/wp_enqueue_style/
        wp_enqueue_style(
            'generic-styles', // identifiant du fichier css
            // get_theme_file_uri calcul automatiquement l'url du fichier demandé
            get_theme_file_uri('assets/css/styles.css') // url du fichier css
        );
         /*
        wp_enqueue_style(
            'nav-styles',
            get_theme_file_uri('assets/css/nav.css')
        );
        */
       
        // IMPORTANT WP chargement d'un fichier javascript
        
        wp_enqueue_script(
            'category-js',   // identifiant du javascript
            get_theme_file_uri('assets/js/category.js'),
            [], // les autres javascripts dont dépend category-js
            '1.0.0', // numéro de version du script
            true // le fichier est chargé dans le footer
        );
        
    }
);

// BONUS WP filter sur le résumé (excerpt)

add_filter(
    'get_the_excerpt',  // event correspondant à l'affichage du résuméboat-ship-horizon-blue
    function($excerpt) {
        // nous coupons le résumé (excerpt) au bout de 60 caractères et nous ajouton [...]

        // DOC PHP multibytes strings https://www.php.net/manual/fr/ref.mbstring.php
        return mb_substr($excerpt, 0, 60) . '[...]';
    }
);