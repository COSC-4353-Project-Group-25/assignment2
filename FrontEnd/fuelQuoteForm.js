const fuelQForm = document.getElementById("fuelQForm")
const submit = document.getElementById("submit");


submit.addEventListener("click", (e) => {
    e.preventDefault();
    const gallons = fuelQForm.gallons.value;
    const dDate = fuelQForm.dDate.value;

    if(gallons&&dDate)
    {
        window.location="home.html"
    }

})
