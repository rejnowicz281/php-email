const firstNameLabel = document.getElementById("first-name-label");
const firstNameInput = document.getElementById("first-name");
const lastNameLabel = document.getElementById("last-name-label");
const lastNameInput = document.getElementById("last-name");
const messageLabel = document.getElementById("message-label");
const messageInput = document.getElementById("message");
const emailInput = document.getElementById("email");
const emailLabel = document.getElementById("email-label");
const phoneInput = document.getElementById("phone");
const phoneLabel = document.getElementById("phone-label");
const form = document.querySelector(".form");

function getFirstNameValidityMessage() {
    if (!firstNameInput.value) return "Please enter your first name.";

    return null;
}

function getLastNameValidityMessage() {
    if (!lastNameInput.value) return "Please enter your last name.";

    return null;
}

function getMessageValidityMessage() {
    if (!messageInput.value) return "Please enter a message.";

    return null;
}

function getEmailValidityMessage() {
    if (!emailInput.value) return "Please enter your email address.";
    if (!emailInput.value.includes("@")) return "Please enter a valid email address. It should contain an '@'.";

    return null;
}

function getPhoneValidityMessage() {
    if (!phoneInput.value) return "Please enter your phone number.";
    if (!phoneInput.value.match(/^\+?\d[\d\s\-()]{8,15}$/)) return "Please enter a valid phone number.";

    return null;
}

function validateGroup(input, label, validtityMessage) {
    if (validtityMessage) {
        label.style.color = "red";
        input.style.borderBottom = "1px solid red";
        input.setCustomValidity(validtityMessage);

        input.reportValidity();
    } else {
        label.style = null;
        input.style = null;
        input.setCustomValidity("");
    }
}

const validateFirstName = () => validateGroup(firstNameInput, firstNameLabel, getFirstNameValidityMessage());

const validateLastName = () => validateGroup(lastNameInput, lastNameLabel, getLastNameValidityMessage());

const validateMessage = () => validateGroup(messageInput, messageLabel, getMessageValidityMessage());

const validateEmail = () => validateGroup(emailInput, emailLabel, getEmailValidityMessage());

const validatePhone = () => validateGroup(phoneInput, phoneLabel, getPhoneValidityMessage());

firstNameInput.setCustomValidity(getFirstNameValidityMessage());
firstNameInput.addEventListener("input", () => validateFirstName());

lastNameInput.setCustomValidity(getLastNameValidityMessage());
lastNameInput.addEventListener("input", () => validateLastName());

messageInput.setCustomValidity(getMessageValidityMessage());
messageInput.addEventListener("input", () => validateMessage());

emailInput.setCustomValidity(getEmailValidityMessage());
emailInput.addEventListener("input", () => validateEmail());

phoneInput.setCustomValidity(getPhoneValidityMessage());
phoneInput.addEventListener("input", () => validatePhone());
