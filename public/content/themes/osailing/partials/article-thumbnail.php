<article class="post post--excerpt">
    <?php

    // DOC WP conditionnal tags https://codex.wordpress.org/Conditional_Tags

        // get_the_id() est le template tag qui permet de récupérer l'id de l'article
        $articleId = get_the_id();

        // has_post_thumbnail nous permet de savoir si un article a une image de mise en avant. On peut utiliser ici l'id de l'article pour savoir si ce dernier a une image
        $hasImage = has_post_thumbnail($articleId);

        // si l'aricle a une image, on l'affiche
        if($hasImage) {
            $imageURL = get_the_post_thumbnail_url();
            echo '<img src="' . $imageURL .'" class="post__image"/>';
        }
        else {
            // sinon on affiche une image par défaut
            echo '<img class="post__image" src="https://picsum.photos/300/200?random=1">';
        }

    ?>

    <h3 class="post__title">
        <?php
        the_title();
        ?>
    </h3>
    <p class="post__excerpt">
        <?php
        echo get_the_excerpt();
        ?>
    </p>
    <?php
     // IMPORTANT WP récupération de l'url de l'article
     $articleURL = get_the_permalink();
     echo '<a href="' . $articleURL . '" class="post__link">';
        echo 'Lire la suite';
     echo '</a>';
     ?>
</article>

