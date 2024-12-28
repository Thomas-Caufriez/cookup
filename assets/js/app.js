console.log('app.js chargé');

function changepwd() {
  const hidden = document.getElementById("pwd");
  if (hidden.type === "password") {
    hidden.type = "text";
  } else {
    hidden.type = "password";
  }
}

function changepwd2() {
  const hidden = document.getElementById("new_password");
  if (hidden.type === "password") {
    hidden.type = "text";
  } else {
    hidden.type = "password";
  }
}

function sendmail() {
  alert("Email de récupération envoyé avec succès ! (fake)")
}

// permet de cacher un des deux menus de la navbar dans index si l'autre est ouvert
const collapseIngredients = document.getElementById('filterIngredients');
const collapsePlats = document.getElementById('filterPlats');

const btnIngredients = document.querySelector('[data-bs-target="#filterIngredients"]');
const btnPlats = document.querySelector('[data-bs-target="#filterPlats"]');

btnIngredients.addEventListener('click', function () {
    if (collapsePlats.classList.contains('show')) {
        collapsePlats.classList.remove('show');
    }
});

btnPlats.addEventListener('click', function () {
    if (collapseIngredients.classList.contains('show')) {
        collapseIngredients.classList.remove('show');
    }
});