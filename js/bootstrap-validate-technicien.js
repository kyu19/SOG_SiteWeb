document.querySelector('#mail').addEventListener('blur', validateEmail);

document.querySelector('#mdp').addEventListener('blur', validatePassword);

document.querySelector('#name').addEventListener('blur', validateUsername);

document.querySelector('#prenom').addEventListener('blur', validateSurname);

/*const reSpaces = /^\S*$/; accepte pas les espace*/

const reSpaces = /^[a-zA-Z-\s]+$/ ;

function validateUsername() {
  const nom = document.querySelector('#name');
  if (reSpaces.test(nom.value)) {
    nom.classList.remove('is-invalid');
    nom.classList.add('is-valid');
    return true;
  } else {
    nom.classList.remove('is-valid');

    nom.classList.add('is-invalid');
    
    return false;
  }
}

function validateSurname() {
  const prenom = document.querySelector('#prenom');
  const reSpaces = /^[a-zA-Z-\s]+$/ ;
  if (reSpaces.test(prenom.value)) {
    prenom.classList.remove('is-invalid');
    prenom.classList.add('is-valid');
    return true;
  } else {
    prenom.classList.remove('is-valid');

    prenom.classList.add('is-invalid');
    return false;
  }
}

function validateEmail() {
  const email = document.querySelector('#mail');
  /*const re = /^([a-zA-Z0-9_\-?\.?]){3,}@([a-zA-Z]){3,}\.([a-zA-Z]){2,5}$/;*/
  const re = /^[a-zA-Z0-9.-_]+[@]{1}[a-zA-Z0-9.-_]+[.]{1}[a-z]{2,10}$/g;

  if (re.test(email.value)) {
    email.classList.remove('is-invalid');
    email.classList.add('is-valid');

    return true;
  } else {
    email.classList.add('is-invalid');
    email.classList.remove('is-valid');

    return false;
  }
}

function validatePassword() {
  const mdp = document.querySelector('#mdp');
  const re = /(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.{8,})(?=.*[!@#$%^&*])/;
  if (re.test(mdp.value)) {
    mdp.classList.remove('is-invalid');
    mdp.classList.add('is-valid');

    return true;
  } else {
    mdp.classList.add('is-invalid');
    mdp.classList.remove('is-valid');

    return false;
  }
}


/*script validation bootstrap*/

(function () {
  const forms = document.querySelectorAll('.needs-validation');

  for (let form of forms) {
    form.addEventListener(
      'submit',
      function (event) {
        if (
          !form.checkValidity() ||
          !validateEmail() ||
          !validateUsername() ||
          !validateSurname() ||
          !validatePassword()
        ) {
          event.preventDefault();
          event.stopPropagation();
        } else {
          form.classList.add('was-validated');
        }
      },
      false
    );
  }
})();
