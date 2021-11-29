// STEP CUSTOMIZER javascript Configuration du live preview


// au chargement de la page
document.addEventListener("DOMContentLoaded", function() {

    console.log('%c' + 'Initialisation du customizer coté js', 'color: #0bf; font-size: 1rem; background-color:#fff');
  
    // utilisation de la bibliothèque javascript worpdress dédié au customizer (fournie par wordpress)
    wp.customize(
      // sur quelle variable le javascript doit gérer le live preview
      'menu-color',
  
      // déclaration de la fonction qui "gère" la variable customisée
      function(value) {
        value.bind(function(newValue) {
  
          //=====CODE CUSTOM=========
          // cette fonction se déclenche lorsque la "variable customisée" change de valeur
          // nous ciblons le menu
          console.log(newValue);
  
          let menu = document.querySelector('.header.header--vertical');
          // nous changeons la couleur de fond du menu
          menu.style.backgroundColor = newValue;
          //==========================
        });
      }
    );
  });
  
  
  
  