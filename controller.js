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
        accContent.style.transition = selected;
      } else {
        accContent.style.display = 'none';
      }
    });
  });