<?php
add_action(
    'customize_register',
    'register_header_image_customizer'
);

function register_header_image_customizer(WP_Customize_Manager $themeCustomizerObject)
{

    $customSectionName = 'custom-section-images';
    $customizableVariableName = 'header-image';
    $defaultValue = get_theme_file_uri('assets/images/banner.jpg');
    $customizerButtonCssSelector = '#banner';


    $themeCustomizerObject->add_section(
        $customSectionName,
        [
            'title' => __("Images du thème"),
            'priority' => 300
        ]
    );

    $themeCustomizerObject->add_setting(
        $customizableVariableName,
        [
            'default' => $defaultValue,
            'transport' => 'postMessage'
        ]
    );


    $themeCustomizerObject->add_control(
        new WP_Customize_Image_Control(
            $themeCustomizerObject,
            'header-image-selector',
            [
                'label' => __('Image de l\'entête de la home'),
                'section' => $customSectionName,
                'settings' => $customizableVariableName,
            ]
        )
    );


    $themeCustomizerObject->selective_refresh->add_partial(
        $customizableVariableName,
        [
            'selector' => $customizerButtonCssSelector,
            'fallback_refresh' => false
        ]
    );
}

//==================================================================

add_action(
    'customize_preview_init',
    'osailing_load_customizerHeaderImage_assets'
);

function osailing_load_customizerHeaderImage_assets()
{
    wp_enqueue_script(
        'customizer-header-image-js',
        get_theme_file_uri('assets/js/customizers/header-image.js'),
        [], // gestion des dépendances,
        false,
        true // nous demandons à wp de mettre le javascript dans le footer
    );
}


