const loginForm = document.getElementById("LoginForm");
const loginButton = document.getElementById("submitButton");


loginButton.addEventListener("click", (e) => {
	e.preventDefault();
	const username = loginForm.username.value;
	const password = loginForm.password.value;
	
	//placeholder for username that will be held in server
	if (username === "username1" && password === "password1"){
		//TO DO check if mandatory profile things are blank if so take them to the create profile page
		window.location="createProfile.html"
	}
	else {
		//TO DO CHANGE FROM ALERT TO POP UP
		alert("Wrong password try again");
	}
})

