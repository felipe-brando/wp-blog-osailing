<?php
// IMPORTANT WP charge les données du post
get_header();

the_post();

?>

<body class="single">
    <?php
        // inclusion du menu
        get_template_part('partials/nav');
    ?>
    
    <main>
        <article class="post">
            <header class="post__header">

            <?php
                $articleId = get_the_id();
                $hasImage = has_post_thumbnail($articleId);
                if($hasImage) {
                    $imageURL = get_the_post_thumbnail_url();
                    echo '<img src="' . $imageURL .'" class="post__header__image"/>';
                }
                else {
                    echo '<img class="post__header__image" src="https://picsum.photos/300/200?random=1">';
                }
            ?>
       
            <h1 class="post__header__title"><?= get_the_title(); ?></h1>
            </header>
            <main class="post__content">
                <p>
                    <?php
                    // IMPORTANT WP template tag afficher le contenu d'un article
                        echo get_the_content();
                    ?>      
                </p>
            </main>
            <footer class="post__footer">
                <p>Par <?php
                    // IMPORTANT WP lien vers la page des articles d'un auteur
                    echo get_the_author_posts_link();
                    ?>
                </p>
                    <?php
                    // IMPORTANT WP lister les catégories d'un post

                    $categories = get_the_category();
                    if(!empty($categories)) {
                        echo 'Dans ';
                        foreach($categories as $category) {
                            $categoryURL = get_category_link($category);
                            echo '<a class="post__footer__category-link" href="' . $categoryURL . '">';
                                echo $category->name;
                            echo '</a>';
                            echo ' ';
                        }
                    }
                
        
                    // IMPORTANT WP template tag la date d'un post au format datetime
                    ?>
                    le <time class="post__footer__date" datetime="<?php the_date_xml()?>">
                    <?php
                    //DOC PHP fonctions sur les dates https://www.php.net/strtotime https://www.php.net/manual/fr/function.date.php

                    // IMPORTANT WP template tag afficher la date d'un article
                    echo get_the_date();
                    ?>
                    </time>
            </footer>
        </article>
    </main>
    <section class="pagination">
        <?php
        // récupération du post précédent
        $previousPost = get_previous_post();

        // s'il y a un post précédent, alors nous affichons le bouton
        if($previousPost) {
            $url = get_post_permalink($previousPost);
            echo '<a class="pagination--previous-link button" href="' . $url . '">Article précédent</a>';
        }
        else {
            // sinon nous affichons un span vide
            echo '<span></span>';
        }

        // récupération du post suivant
        $nextPost = get_next_post();
        // s'il y a un post suivant, alors nous affichons le bouton
        if($nextPost) {
            $url = get_post_permalink($nextPost);
            echo '<a class="pagination--previous-link button" href="' . $url . '">Article suivant</a>';
        }
        else {
            echo '<span></span>';
        }
        ?>
    </section>

<?php
  get_footer();
?>