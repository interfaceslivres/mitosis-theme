// função para menu responsivo

function menuTransforma() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}

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
      accContent.style.height = 'auto';
      accContent.style.transition = 'height 5s ease 3s';
    } else {
      accContent.style.display = 'none';
      accContent.style.height = '0px';
    }
  });
});


window.addEventListener('resize', function(event) {  
  if (this.screen.width > 813) {
  var x = document.getElementById("myTopnav");
  x.className = "topnav";
  };
}, true);