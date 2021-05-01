/*const fuelQForm = document.getElementById("fuelQForm")
const submit = document.getElementById("submit");


submit.addEventListener("click", (e) => {
    e.preventDefault();
    const gallons = fuelQForm.gallons.value;
    const dDate = fuelQForm.dDate.value;
    if(gallons&&dDate)
    {
        //window.location="home.html"
		
    }

})
*/

(function() {
    $('form > input').keyup(function() {
        var empty = false;
        $('form > input').each(function() {
            if ($(this).val() == '')
            {
                empty = true;
            }
        });
        if (empty)
        {
            $('#register').attr('disabled', 'disabled');
        } 
       else 
        {
            $('#register').removeAttr('disabled');
        }
    });
    })()

function myFunction(){
	var dDate = document.getElementById("dDate").value;
	var gallons = document.getElementById("gallons").value;
	var x = document.getElementById("hide");
    console.log(dDate)
    
    $.ajax({
        url: "../BackEnd/fuelQuoteModule.php",
        type: "post",
        data: {gallons: gallons,dDate: dDate},
        dataType: "JSON",
        success: function(res)
        {
            //console.log(res);
            console.log(res.price_per_gallon);
            document.getElementById('oAddress').value=res.del_address;
            document.getElementById('ppg').value=res.price_per_gallon;
            document.getElementById('total').value=res.total.toFixed(2);
            console.log(res.price_per_gallon);
        }
        
    });
    
    
	//$.post("fuelQuoteModule.php", {gallons: gallons,dDate: dDate}),
	x.style= "display:block";
}

function submitF()
{
    var submitGallons = document.getElementById("gallons").value;
	var del_address = document.getElementById("oAddress").value;
    var dDate = document.getElementById("dDate").value;
	var ppg = document.getElementById("ppg").value;
    var total = document.getElementById("total").value;

    console.log(submitGallons);
    console.log(del_address);
    console.log(dDate);
    console.log(ppg);
    console.log(total);

    $.ajax({
        url: "../BackEnd/fuelQuoteModule.php",
        type: "post",
        data: {submitGallons: submitGallons,del_address: del_address, dDate: dDate, ppg:ppg, total:total},
        //dataType: "JSON",
        success: function(res)
        {
            console.log(res);
            window.location.href='home.html';
        }
        
    });
    
}