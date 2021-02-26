const registrationForm = document.getElementById("registrationForm")
const registerButton = document.getElementById("submitButton");


registerButton.addEventListener("click", (e) => {
    e.preventDefault();
    const username = registrationForm.username.value;
    const password = registrationForm.password.value;

    if(username&&password)
    {
        window.location="loginPage.html"
    }
    else
    {
        alert("required field left empty");
    }

})