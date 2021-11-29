<section class="pagination">
    <?php

      // récupération du post précédent
      $previousPost = get_previous_post();

      // s'il y a un post précédent, alors nous affichons le bouton
      if($previousPost) {
        $url = get_post_permalink($previousPost);
        echo '<a class="pagination--previous-link button" href="' . $url . '">Article précédent</a>';
      }
      $nextPost = get_next_post();
      // s'il y a un post précédent, alors nous affichons le bouton
      if($nextPost) {
        $url = get_post_permalink($nextPost);
        echo '<a class="pagination--previous-link button" href="' . $url . '">Article suivant</a>';
      }
    ?>
  </section>