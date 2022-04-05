// ** CODE JAVASCRIPT 


//SUB NAV ADMIN

// remove + add sur les class active du menu au click.
const icons = document.querySelectorAll('.icons');

icons.forEach(clickedTab => {
	clickedTab.addEventListener('click', () => {
		icons.forEach(tab => {
			tab.classList.remove('active');
		});
		clickedTab.classList.add('active');
	});
});

//
//
//

//MAIN NAV

/* Ajouter et supprimer la classe "responsive" de topnav quand l'utilisateur clique. */
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}

function setActive() {
  aObj = document.getElementById('myTopnav').getElementsByTagName('a');
  for(i=0;i<aObj.length;i++) {
    if(document.location.href.indexOf(aObj[i].href)>=0) {
      aObj[i].className='nav-active';
    }
  }
}
window.onload = setActive;