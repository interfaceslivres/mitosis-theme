// função para menu responsivo

function menuTransforma() {
  var x = document.getElementById("myTopnav");
  var y = document.getElementById("menuParaFechar");
  var z = document.getElementById("menuMenu");
  var i = document.getElementById("menuFecharId");
  
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }

  if (y.className === "fa-solid fa-bars") {
    y.className += " fa-solid fa-times";
  } else {
    y.className = "fa-solid fa-bars";
  }

  if (z.className === "menuAbrir") {
    z.className += " fechar";
  } else {
    z.className = "menuAbrir";
  }

  if (i.className === "menuAbrirFechar.fechar") {
    i.className = "menuAbrirFechar.abrir";
  } else {
    i.className = "menuAbrirFechar.fechar";
  }
}



const accBtns = document.querySelectorAll('.acc-btn');

accBtns.forEach(function(accBtn) {
  accBtn.addEventListener('click', function() {
    const accContent = this.nextElementSibling;
    console.log(accContent.className);

    if (accContent.className === 'acc-content') {
      const allAccContent = document.querySelectorAll('.acc-content');

      allAccContent.forEach(function(content) {
        content.className = "acc-content";
      });

      accContent.className += " selected";
      

    } else {
      accContent.className = "acc-content";
    }
  });
});



/* backup q funciona: 


const accBtns = document.querySelectorAll('.acc-btn');

accBtns.forEach(function(accBtn) {
  accBtn.addEventListener('click', function() {
    const accContent = this.nextElementSibling;

    if (accContent.style.display === 'none') {
      const selected = 'selected';
      const allAccContent = document.querySelectorAll('.acc-content');

      allAccContent.forEach(function(content) {
        content.style.display = 'none';
      });

      accContent.style.display = 'block';
      accContent.style.height = '100px';
      accContent.style.transition = 'height 55s ease 3s';
      accContent.className += " test";
      

    } else {
      accContent.style.display = 'none';
      accContent.style.height = '0px';
      accContent.className = "acc-content";
    }
  });
});
*/

window.addEventListener('resize', function(event) {  
  if (this.screen.width > 813) {
  var x = document.getElementById("myTopnav");
  x.className = "topnav";
  };
}, true);

function menuTransformaPesquisa() {
  var x = document.getElementById("myPesquisa");
  var y = document.getElementById("lupaParaFechar");

  if (x.className === "pesquisa") {
    x.className += " pesquisaBarra";
  } else {
    x.className = "pesquisa";
  }

  if (y.className === "fa-solid fa-magnifying-glass") {
    y.className += " fa-solid fa-times";
  } else {
    y.className = "fa-solid fa-magnifying-glass";
  }
}
