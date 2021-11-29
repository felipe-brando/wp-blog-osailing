<?php
// STEP CUSTOMIZER récupération de la variable "menu-color" afin de l'utiliser dans le thème
$menuColor = get_theme_mod('menu-color');
?>

<header class="header header--vertical" style="background-color:<?=$menuColor;?>">
    <div class="logo logo--vertical">
        <img src="<?=get_theme_file_uri('assets/images/logo.svg');?>" class="logo__image" alt="">
        <h1 class="logo__text">oSailing</h1>
    </div>
    <nav class="menu menu--vertical">
        <ul class="menu__list">
            <li class="menu__list__item"><a class="menu__list__item__link menu__list__item__link--active"
                    href="#banner">Intro</a></li>
            <li class="menu__list__item"><a class="menu__list__item__link" href="#post-list">Articles</a></li>
            <li class="menu__list__item"><a class="menu__list__item__link" href="#values">Valeurs</a></li>
        </ul>
    </nav>
</header>