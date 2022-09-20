function checkInputs() {
    const usernameField = document.getElementById("username")
    const passwordField = document.getElementById("password")
    const passwordConfirmField = document.getElementById("password1")
    const titleField = document.getElementById("title")
    const descriptionField = document.getElementById("description")
    const textField = document.getElementById("text")
    if (!usernameField.value || !passwordField.value || !passwordConfirmField.value) {
        alert("Mandatory fields cannot be empty!")
        return false;
    }
    if (usernameField.value.length < 5) {
        alert("Username should be at least 5 chars")
        return false;
    }
    if (passwordField.value.length < 6) {
        alert("Password should be at least 6 chars")
        return false;
    }
    if (usernameField.value.includes("<") || usernameField.value.includes(">") || usernameField.value.includes("&")) {
        alert("XSS detected!")
        return false;
    }
    if (passwordField.value.includes("<") || passwordField.value.includes(">") || passwordField.value.includes("&")) {
        alert("XSS detected!")
        return false;
    }
    if (passwordField.value != passwordConfirmField.value) {
        alert("Entered passwords don't match")
        return false;
    }
    if (titleField.value.includes("<") || titleField.value.includes(">") || titleField.value.includes("&")) {
        alert("XSS detected!")
        return false;
    }
    if (descriptionField.value.includes("<") || descriptionField.value.includes(">") || descriptionField.value.includes("&")) {
        alert("XSS detected!")
        return false;
    }
    if (textField.value.includes("<") || textField.value.includes(">") || textField.value.includes("&")) {
        alert("XSS detected!")
        return false;
    }
    if (descriptionField.value.length > 500) {
        alert("Description cannot be more than 500 chars")
        return false;
    }
    if (textField.value.length > 10000) {
        alert("Story cannot be more than 10000 chars")
        return false;
    }
    if (titleField.value.length > 100) {
        alert("Title cannot be more than 100 chars")
        return false;
    }
    if (!titleField.value || !descriptionField.value || !textField.value) {
        alert("Mandatory fields cannot be empty!")
        return false;
    }
}