// Fonction color, change la couleur du champs de saisie.

function red_light(champ, error) {
    "use strict";
    if (error) {
        champ.style.backgroundColor = "#ff3333";
    } else {
        champ.style.backgroundColor = "#1da1f2";
    }
}

// Fonction validation de l'input name.

function verif_username(username) {
    "use strict";
    var regex = /^[a-zA-Z0-9_]+$/;
    if (username.value.length < 3 || !regex.test(username.value)) {
        red_light(username, true);
        return false;

    } else {
        red_light(username, false);
        return true;
    }
}

// Fonction validation de l'input name.

function verif_mail(email) {
    "use strict";
    var regex = /^[a-zA-Z0-9._]+@[a-z0-9._]{2,}\.[a-z]{2,4}$/;
    if (!regex.test(email.value)) {
        red_light(email, true);
        return false;
    } else {
        red_light(email, false);
        return true;
    }
}

// Fonction validation de l'input prenom.

function verif_lastname(lastname) {
    "use strict";
    var regex = /^[a-zA-Z]+$/;
    if (lastname.value.length < 3 || !regex.test(lastname.value)) {
        red_light(lastname, true);
        return false;
    } else {
        red_light(lastname, false);
        return true;
    }
}

function verif_firstname(firstname) {
    "use strict";
    var regex = /^[a-zA-Z]+$/;
    if (firstname.value.length < 3 || !regex.test(firstname.value)) {
        red_light(firstname, true);
        return false;
    } else {
        red_light(firstname, false);
        return true;
    }
}

function password_checker(password) {
    "use strict";
    var regex = /^[a-zA-Z0-9_]+$/;
    if (password.value.length < 6 || !regex.test(password.value)) {
        red_light(password, true);
        return false;
    } else {
        red_light(password, false);
        return true;
    }
}

function verif_password(password_confirm) {
    "use strict";
    var pass = document.getElementsByName("password")[0].value;
    var passconf = document.getElementsByName("password_confirm")[0].value;
    if (pass !== passconf) {
        red_light(password_confirm, true);
        window.alert("Les mots de passes ne correspondent pas !");
        return false;
    } else {
        red_light(password_confirm, false);
        return true;
    }
}

// Mega-fonction de validation.

function valid_form(form) {
    "use strict";
    var USERNAME = verif_username(form.username);
    var EMAIL = verif_mail(form.email);
    var LASTNAME = verif_lastname(form.lastname);
    var FIRSTNAME = verif_firstname(form.firstname);
    var PASSWORDLEN = password_checker(form.password);
    var PASSWORD = verif_password(form.password_confirm);

    if (USERNAME && EMAIL && LASTNAME && FIRSTNAME && PASSWORDLEN && PASSWORD) {
        return true;
    } else {
        window.alert("Veuillez remplir les champs manquants.");
        return false;
    }
}