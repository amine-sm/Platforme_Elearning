let container = document.getElementById("container");
let registerBtn = document.getElementById("register");
let loginBtn = document.getElementById("login");

registerBtn.addEventListener('click',()=> {
    container.classList.add("active");
});

loginBtn.addEventListener('click',()=> {
    container.classList.remove("active");
});

var icons = document.querySelectorAll('.iconn');
var forms = document.querySelectorAll('form');
var isDarkMode = localStorage.getItem('darkMode') === 'true';

setMode(isDarkMode);

icons.forEach(function(icon) {
    icon.addEventListener('click', function() {
        isDarkMode = !isDarkMode;
        setMode(isDarkMode);
        localStorage.setItem('darkMode', isDarkMode);
    });
});

function setMode(isDarkMode) {
    icons.forEach(function(icon) {
        if (isDarkMode) {
            icon.classList.remove('bx-moon');
            icon.classList.add('bx-sun');
            document.body.classList.add('dark-mode');
            forms.forEach(function(form) {
                form.classList.add('dark-mode');
            });
        } else {
            icon.classList.remove('bx-sun');
            icon.classList.add('bx-moon');
            document.body.classList.remove('dark-mode');
            forms.forEach(function(form) {
                form.classList.remove('dark-mode');
            });
        }
    });
}