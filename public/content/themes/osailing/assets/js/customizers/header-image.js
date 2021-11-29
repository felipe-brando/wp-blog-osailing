document.addEventListener("DOMContentLoaded", function() {

    console.log('%c' + 'Initialisation du customizer header image coté js', 'color: #0bf; font-size: 1rem; background-color:#fff');
  
    wp.customize(
      // sur quelle variable le javascript doit gérer le live preview
      'header-image',
  
      // déclaration de la fonction qui "gère" la variable customisée
      function(value) {
        value.bind(function(newValue) {
  
          //=====CODE CUSTOM=========
          // cette fonction se déclenche lorsque la "variable customisée" change de valeur
          // nous ciblons le menu
          console.log(newValue);
  
          let headerImage = document.querySelector('.banner__image');
          // nous changeons l'url source de l'image
          headerImage.setAttribute('src', newValue);
          //==========================
        });
      }
    );
  });
  
  
  
  