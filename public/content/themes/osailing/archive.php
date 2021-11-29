<?php
get_header();
?>

<body class="category">

  <?php
    // inclusion du menu
    get_template_part('partials/nav');
  ?>

  <main class="post-list">
    <h1 class="post-list__title">
        <?php
            // BONUS WP  conditionnal tag, sommes nous sur une page author
            if(is_author()) {
              echo 'Articles de ' . get_the_author();
            }
            else {
              // BONUS WP template tag afficher le nom de la catégorie lorsque nous sommes sur une page archive https://developer.wordpress.org/reference/functions/single_cat_title/
              single_cat_title();
            }


        ?>
    </h1>

    <?php
    if(have_posts()) {
        while(have_posts()) {
          the_post();
          get_template_part('partials/article-thumbnail');
        }
    }
    ?>
  </main>

  <section class="pagination">
    <?php
        // pagination archives

        // si wordpress génère un lien pour "les post suivants" ( "les anciens posts")
        if(get_next_posts_link()) {

            // récupération du lien pointant vers la page des posts plus ancien
            $olderPostsLink = get_next_posts_page_link();

            // affichage du lien
            echo '<a class="pagination--previous-link button" href="' . $olderPostsLink . '">Articles précédents</a>';
        }
        else {
            // sinon affichage d'un span vide (pour des question d'intégration)
            echo '<span></span>';
        }

        if(get_previous_posts_link()) {

            $newerPostLink = get_previous_posts_page_link('Articles précédents');
            echo '<a class="pagination--previous-link button" href="' . $newerPostLink . '">Articles Suivant</a>';
        }
        else {
            echo '<span></span>';
        }
    ?>
  </section>



    <?php

    ?>



<?php
get_footer();
?>


