// this function loads a page into a section of the DOM
function loadPage(url, docFragmentId) {
  const xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState === 4 && this.status === 200) {
      document.getElementById(docFragmentId).innerHTML = this.responseText;
    }
  };
  xhttp.open("POST", url);
  xhttp.send();
}

function sendLoginForm(formElement) {
  const xhttp = new XMLHttpRequest();
  xhttp.onload = sendSuccess;
  xhttp.open("POST", formElement.action);
  xhttp.send(new FormData(formElement));
}

function sendSuccess() {
  // do something on form submit probably call loadPage
  if (this.status === 200) {
    if (this.responseText === "success") {
      //redirect to a different page
      document.location.href = "index.php";
    } else {
      const errorText = document.getElementById("error");
      errorText.innerHTML = "Invalid username or password";
    }
  }
}

function sendPasswordResetForm(formElement) {
  const xhttp = new XMLHttpRequest();
  xhttp.onload = passResetReqSuccess;
  xhttp.open("POST", formElement.action);
  xhttp.send(new FormData(formElement));
}

function passResetReqSuccess() {
  console.log(this.responseText);
  if (this.status === 200) {
    if (this.responseText === "success") {
      document.location.href = "index.php?page=passwordresetsuccess";
    } else if (this.responseText === "invalid") {
      const errorText = document.getElementById("pass_change_error");
      errorText.innerHTML =
        "Incorrect password. We couldn't change your password.";
    } else {
      const errors = JSON.parse(this.responseText);
      for (const [key, value] of Object.entries(errors)) {
        const errorText = document.getElementById(`${key}`);
        errorText.innerHTML = value;
      }
    }
  }
}

function sendRegisterForm(formElement) {
  const xhttp = new XMLHttpRequest();
  const fileElem = document.getElementById("profile-pic-url");
  const files = fileElem.files;
  const formData = new FormData(formElement);
  const file = files[0];
  formData.append("profile-pic", file, file.name);
  xhttp.onload = registerReqSuccess;
  xhttp.open("POST", formElement.action);
  xhttp.send(formData);
  //console.log()
}

function registerReqSuccess() {
  console.log(this.responseText);
  if (this.status === 200) {
    if (this.responseText === "success") {
      document.location.href = "index.php";
    } else if (this.responseText === "failed") {
      const errorText = document.getElementById("register-error");
      errorText.innerHTML = "Sorry, we just couldn't register you.";
    } else if (this.responseText === "image") {
      const errorText = document.getElementById("register-error");
      errorText.innerHTML = "We couldn't upload you image.";
    } else {
      const errors = JSON.parse(this.responseText);
      for (const [key, value] of Object.entries(errors)) {
        const errorText = document.getElementById(`${key}`);
        errorText.innerHTML = value;
      }
    }
  }
}
