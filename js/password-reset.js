// Display the password field value when the 'Display password' checkbox is checked.
// This must be loaded at the bottom of the page to make sure it works.

var displayCheckbox = document.getElementById('display-password');

displayCheckbox.onclick = function() {
    var passwordField = document.getElementById('new-password');

    if (this.checked == true) {
        passwordField.setAttribute('type','text')
    } else {
        passwordField.setAttribute('type','password')
    }
};