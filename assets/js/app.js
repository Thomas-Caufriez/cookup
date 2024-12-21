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
