function validateRegistrationForm() {
  var email = document.getElementById("email").value;
  var gender = document.getElementById("gender").value;
  var password = document.getElementById("password").value;
  var confirmPassword = document.getElementById("confirm_password").value;

  var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  if (!emailPattern.test(email)) {
    alert("Please enter a valid email address.");
    return false;
  }

  if (gender == "") {
    alert("Please select a gender.");
    return false;
  }

  if (password == "") {
    alert("Please enter a password.");
    return false;
  }

  if (password !== confirmPassword) {
    alert("Passwords do not match.");
    return false;
  }

  if (password.length < 6) {
    alert("Password should be at least 6 characters long.");
    return false;
  }

  return true;
}

function validateLoginForm() {
  var email = document.getElementById("email").value;
  var password = document.getElementById("password").value;

  var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  if (!emailPattern.test(email)) {
    alert("Please enter a valid email address.");
    return false;
  }

  if (password == "") {
    alert("Please enter a password.");
    return false;
  }

  return true;
}
