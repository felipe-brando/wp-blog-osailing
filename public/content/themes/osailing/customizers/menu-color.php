<?php


// STEP CUSTOMIZER déclarer un hook pour enregistrer un customizer
add_action(
    'customize_register',   // event pour enregistrer nos customizer
    'register_menu_color_customizer'
);

// DOC CUSTOMIZER Manager : https://developer.wordpress.org/reference/classes/wp_customize_manager/
function register_menu_color_customizer(WP_Customize_Manager $themeCustomizerObject)
{

    $customSectionName = 'custom-section-colors';
    $customizableVariableName = 'menu-color';
    $defaultValue = '#123456';
    $customizerButtonCssSelector = '.header.header--vertical';

    // STEP CUSTOMIZER déclarer une "sectione" dans le menu de personnalisation du thème
    $themeCustomizerObject->add_section(
        $customSectionName,    // identifiant de la section (custom-section-colors)
        [
            'title' => __("Couleurs du thème"), // libellé de la section
            'priority' => 300   // dans quel ordre la section va s'afficher dans le menu , 0 correspond à "tout en haut" de la liste
        ]
    );


    // STEP CUSTOMIZER déclarer une variable customisable
    $themeCustomizerObject->add_setting(
        $customizableVariableName,   // nom de la variable ('menu-color')
        [
            'default' => $defaultValue, // valeur par défaut
            'transport' => 'postMessage'    // preview en js , par défaut wp rafraichit la page
        ]
    );

    // STEP CUSTOMIZER composant à utiliser pour configurer la variable customisable
    $themeCustomizerObject->add_control(

        // WP_Customize_Color_Control est un composant wordpress qui permet de choisir une couleur
        new WP_Customize_Color_Control(
            $themeCustomizerObject, // l'objet "customizer" $themeCustomizerObject
            'menu-color-selector',  // identifiant du composant (nous choisissons le nom de façon arbitraire)
            [
                'label' => __('Couleur de fond du menu'),    // le libellé du composant
                'section' => $customSectionName,   // la section dans laquelle afficher le composant
                'settings' => $customizableVariableName, // la variable configurable ('menu-color')
            ]
        )
    );


    // STEP CUSTOMIZER Configuration du "petit crayon" qui permet de déclencher le customizer

    $themeCustomizerObject->selective_refresh->add_partial(
        // pour quelle variable "le petit crayon" va s'appliquer
        $customizableVariableName, // (menu-color)
        // DOC Customizer, configurer le "petit crayon" https://developer.wordpress.org/reference/classes/wp_customize_partial/__construct/
        [
            // selecteur css pour indiquer dans quel élément de la page le petit crayon du customizer doit s'afficher
            'selector' => $customizerButtonCssSelector,

            // empeche le refresh infini si l'élément n'est pas trouvé
            // WARNING CUSTOMIZER nous nous protégeons contre des boucles infinies de rafraichissement
            'fallback_refresh' => false
        ]
    );
}

//==================================================================

// STEP CUSTOMIZER : chargement des assets dédiés au customizer
add_action(
    'customize_preview_init',   // Event pour charger les assets dédié à la préview du customizer
    'osailing_load_customizer_assets'
);

function osailing_load_customizer_assets()
{

    wp_enqueue_script(
        'customizer-js',
        get_theme_file_uri('assets/js/customizers/menu-color.js'),
        [], // gestion des dépendances,
        false,
        true // nous demandons à wp de mettre le javascript dans le footer
    );
}

