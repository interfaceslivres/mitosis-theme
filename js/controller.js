// função para menu responsivo

function menuTransforma() {
  var x = document.getElementById("myTopnav");
  var y = document.getElementById("menuParaFechar");
  var z = document.getElementById("menuMenu");
  var i = document.getElementById("menuFecharId");
  
  if (x.className === "topnav") {
    document.getElementById("myPesquisa").className = "pesquisa";
    document.getElementById("lupaParaFechar").className = "fa-solid fa-magnifying-glass";

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

  if (i.className === "menuFechar") {
    i.className = " abrir";
  } else {
    i.className = "menuFechar";
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
    document.getElementById("myTopnav").className = "topnav";
    document.getElementById("menuParaFechar").className = "fa-solid fa-bars";
    document.getElementById("menuMenu").className = "menuAbrir";
    document.getElementById("menuFecharId").className = "menuFechar";

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


function menuTransformaAcessibilidade() {
  var x = document.getElementById("myMenuAcessibilidade");

  if (x.className === "menuAcessibilidade") {
    x.className += " menuAcessibilidadeBarra";
  } else {
    x.className = "menuAcessibilidade";
  }

}

