console.log('test')

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

//  cette fonction était sensé venir dans la création de recette pour display une image quand elle est choisie mais cela ne fonctionne pas
//  car il ne trouve pas la fonction => fichier app.js mal lié ? pourtant les deux premières fonctions du fichier fonctionnent
function previewImage(event) {
  const files = event.target.files;
  if(files.lenght > 0) {
    const imageUrl = URL.createObjectURL(files[0]);
    const imageDisplay = document.getElementById("imagePreview");
    imageDisplay.src = imageUrl;
  }
}