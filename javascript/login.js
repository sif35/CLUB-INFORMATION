const loginEmail = document.getElementById("login-email")
const loginPassword = document.getElementById("login-password")
const loginForm = document.getElementById("login-form")
const loginButton = document.getElementById("submit-button")
const errorElementEmail = document.getElementById("error-element-email")
const errorElementPassword = document.getElementById("error-element-password")
let errorMessage = "";

const regexEmail = /^[a-zA-Z0-9]([a-zA-Z0-9\.-_]+)@[a-zA-Z0-9]+.([a-z]+)(.[a-z])?$/

// Function for checking email
function checkEmail() {

    loginEmail.addEventListener("input", function(event) {

        // console.log(loginEmail.value)
        // console.log(regexEmail.test(loginEmail.value))

        if (!regexEmail.test(loginEmail.value)) {
            errorMessage = "Invalid E-mail Address"
            errorElementEmail.style.visibility = "visible"
            errorElementEmail.innerHTML = errorMessage
            event.preventDefault();
        } 
        else {
            errorMessage = "Validated";
            errorElementEmail.innerHTML = errorMessage;
            errorElementEmail.style.visibility = "hidden"
        }
    })

    loginEmail.addEventListener("focusout", function(event) {
        
        if (loginEmail.value === "") {
            errorMessage = "Validated"
            errorElementEmail.style.visibility = "hidden"
            errorElementEmail.innerHTML = errorMessage
            console.log(errorElement.innerHTML)
            event.preventDefault();
        }

    })
}

// Function for checking password
function checkPassword() {

    loginPassword.addEventListener("input", function(event) {

        if (loginPassword.value) {
            errorMessage = "Password given"
            errorElementPassword.innerHTML = errorMessage
            errorElementPassword.style.visibility = "hidden"
            event.preventDefault()
        }
    })

    loginButton.addEventListener("onclick", function(event) {
        
        if (loginPassword.value === "") {
            errorMessage = "Password is required"
            errorElementPassword.style.visibility = "visible"
            errorElementPassword.innerHTML = errorMessage
            console.log(errorElementPassword.value)
            event.preventDefault();
        }
    })
}

checkEmail()
checkPassword()