const profileForm = document.getElementById("profileForm")
const submitB = document.getElementById("submitB");


submitB.addEventListener("click", (e) => {
    e.preventDefault();
    const name = profileForm.name.value;
    const address = profileForm.address.value;
    const city = profileForm.city.value;
    const state = profileForm.state.value;
    const zipcode = profileForm.zipcode.value;

    if(name&&address&&city&&state&&zipcode)
    {
        window.location="home.html"
    }

})
