function togglePassword(id) {
    // same as before
}

function validatePassword(password) {
    // Check if password has at least 8 characters
    if (password.length < 8) {
        return false;
    }

    // Check if password contains at least one digit
    if (!/\d/.test(password)) {
        return false;
    }

    return true;
}

document.getElementById('registerForm').addEventListener('submit', function(event) {
    event.preventDefault();

    var password = document.getElementById('password').value;
    var confirmPassword = document.getElementById('confirmPassword').value;

    if (!validatePassword(password)) {
        document.getElementById('passwordError').innerHTML = 'Password Harus Berisi 8 Huruf Dan Minimal Ada 1 angka Di Dalamnya.';
        return;
    }

    if (password !== confirmPassword) {
        document.getElementById('passwordError').innerHTML = 'Password Tidak Sesuai/Sama.';
        return;
    }

    // If validation passes, show the popup
    document.getElementById('popup').style.display = 'block';
});


document.getElementById('popup-button').addEventListener('click', function() {
    // Close the popup
    document.getElementById('popup').style.display = 'none';

    // Redirect to login page
    window.location.href = '/Ravly/LoginRegister/tes.html';
});

function togglePassword(id) {
    var passwordInput = document.getElementById(id);
    var eyeButton = passwordInput.nextElementSibling;

    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        eyeButton.classList.add('fa-eye-slash');
    } else {
        passwordInput.type = 'password';
        eyeButton.classList.remove('fa-eye-slash');
    }
}