<header class="header">
    <div class="logo">
        <img src="/logo.c26a725b.svg" class="logo__image" alt="">
        <a href="<?=
            // IMPORTANT récupérer l'url de la home page
            get_home_url();
        ?>" class="logo__text">oSailing
        </a></div>

    <?php
        // nous allons afficher le menu "nav". Ce menu a été défini dans le backoffice de wp Apparence -> Personnaliser -> Menu

        // IMPORTANT WP afficher un menu wordpress
        // DOC https://developer.wordpress.org/reference/functions/wp_nav_menu/
        $menu = wp_nav_menu([
            'menu' => 'nav', // première clé : quel menu nous souhaitons afficher
            'container' => 'nav',    // la balise HTML qui sera utilisée pour encapsuler le menu
            'container_class' => 'menu', // la classe CSS qui sera appliquée au menu
            'menu_class' => 'menu__list',
            'echo' => false,    // nous ne souhaitons pas afficher le menu directement ; nous souhaitons récupérer la "chaine de caractères" retournée
        ]);

        echo $menu;
    ?>
</header>