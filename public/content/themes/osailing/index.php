<?php
// IMPORTANT WP chargement du header dans un template
get_header();
?>

<body class="home">

    <?php
        // IMPORTANT WP, get_template_part chargement d'un sous template
        // DOC get_template_part https://developer.wordpress.org/reference/functions/get_template_part/
        // WARNING get_template_part ne pas mettre le ".php" dans le nom du "partial" à charger
        get_template_part('partials/home-nav');
    ?>
 
  <section class="banner" id="banner">
    <h2 class="banner__title">Cap sur le grand large</h2>

    <?php
      $headerImageURL = get_theme_mod('header-image');
    ?>

    <img src="<?=$headerImageURL;?>" class="banner__image">
  </section>
  <main class="post-list post-list--home" id="post-list">
    <?php
    // IMPORTANT WP : la boucle wordpress : permet d'afficher nos contenus
    // s'il y a des contenus à afficher
    if(have_posts()) {
        // tant qu'il y a des contenus à afficher
        while(have_posts()) {
        // chargement du contenu à afficher
        the_post();

        // chargement du partial qui affiche une vignette d'article
        get_template_part('partials/article-thumbnail');
        }
    }


    ?>
    <a class="button" href="/blog.html">Voir les articles plus anciens</a>
  </main>
  <section class="category-list" id="values">
    <div class="category">
      <h4 class="category__name"><a class="category__name__link" href="/category.html">Escales</a></h4>
      <span class="category__post-count">19</span>
    </div>
    <div class="category">
      <h4 class="category__name"><a class="category__name__link" href="/category.html">Semaines en mer</a></h4>
      <span class="category__post-count">123</span>
    </div>
    <div class="category">
      <h4 class="category__name"><a class="category__name__link" href="/category.html">Rencontres</a></h4>
      <span class="category__post-count">214</span>
    </div>
  </section>

<?php
// IMPORTANT WP chargement du footer dans un template
get_footer();
?>

