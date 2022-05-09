/*----------------------
Click Div
----------------------*/
DebugMenu = {
    init: function () {
        $(".debug-menu").click(function () {
            $(".debug-menu").toggleClass("open");
        });
    }
};

ValidarRegister = {
    init: function () {
        $("#register-submit").click(function (ev) {
            var errors = [];
            $("#error-wrapper").empty();

            var regexName = /[a-zA-Z]+\s+[a-zA-Z]+/g;
            if (!regexName.test($("#name").val())) {
                ev.preventDefault()
                errors.push("El nom no és vàlid")
            }

            if (validatePassword($("#password").val())) {
                ev.preventDefault()
                errors.push(validatePassword($("#password").val()));
            }

            if (!validateDNI($("#dni").val())) {
                ev.preventDefault()
                errors.push("El DNI no és vàlid")
            }

            if ($("#mail").val().indexOf('@', 0) == -1 || $("#mail").val().indexOf('.', 0) == -1) {
                ev.preventDefault()
                errors.push("El correu electrònic no és vàlid")
            }

            if ($('#phone').val().length != 9 || isNaN($('#phone').val())) {
                ev.preventDefault()
                errors.push("El telèfon no és vàlid")
            }

            if (!$("#country").val()) {
                ev.preventDefault()
                errors.push("Insereix el teu país de residència")
            }

            if (errors.length > 0) {
                console.log("entra")
                errors.forEach(function (error, index) {
                    var message = document.createElement("div");
                    message.classList.add("alert", "alert-danger", "mb-2");
                    message.innerText = error;
                    $("#error-wrapper").append(message);
                });
            }
        });
    }
};

ValidarLogin = {
    init: function () {
        $("#submit-login").click(function (ev) {
            var errors = [];
            $("#error-wrapper").empty();
            $("#server-error").empty();

            if ($("#mail").val().indexOf('@', 0) == -1 || $("#mail").val().indexOf('.', 0) == -1) {
                ev.preventDefault()
                errors.push("El correu electrònic no és vàlid")
            }

            if (!$("#password").val()) {
                ev.preventDefault()
                errors.push("Insereix una contrassenya")
            }

            if (errors.length > 0) {
                console.log("entra")
                errors.forEach(function (error, index) {
                    var message = document.createElement("div");
                    message.classList.add("alert", "alert-danger", "mb-2");
                    message.innerText = error;
                    $("#error-wrapper").append(message);
                });
            }
        });
    }
};

function validateDNI(dni) {
    var numero, letr, letra;
    var expresion_regular_dni = /^[XYZ]?\d{5,8}[A-Z]$/;

    dni = dni.toUpperCase();

    if (expresion_regular_dni.test(dni) === true) {
        numero = dni.substr(0, dni.length - 1);
        numero = numero.replace('X', 0);
        numero = numero.replace('Y', 1);
        numero = numero.replace('Z', 2);
        letr = dni.substr(dni.length - 1, 1);
        numero = numero % 23;
        letra = 'TRWAGMYFPDXBNJZSQVHLCKET';
        letra = letra.substring(numero, numero + 1);
        if (letra != letr) {
            //alert('Dni erroneo, la letra del NIF no se corresponde');
            return false;
        } else {
            //alert('Dni correcto');
            return true;
        }
    } else {
        //alert('Dni erroneo, formato no válido');
        return false;
    }
}

function validatePassword(pswd) {
    var errors = [];
    var res = "";

    if (pswd) {
        //validate the length
        if (pswd.length < 8) {
            errors.push("Massa curta")
            //Invalid
        }

        //validate letter
        if (!pswd.match(/[A-z]/)) {
            errors.push("Requereix alguna lletra")
            //Invalid
        }

        //validate capital letter
        if (!pswd.match(/[A-Z]/)) {
            errors.push("Requereix alguna majúscula")
            //Invalid
        }

        //validate number
        if (!pswd.match(/\d/)) {
            errors.push("Requereix algun número")
            //Invalid
        }
    } else {
        errors.push("Insereix una contrassenya")
    }


    var space = "CONTRASSENYA: ";
    errors.forEach(function (error, index) {
        res += space + error;
        space = "<br>";
    })

    return res;
}

$(function () {
    DebugMenu.init();
    ValidarRegister.init();
    ValidarLogin.init();

});
