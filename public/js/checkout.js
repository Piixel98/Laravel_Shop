document.addEventListener("DOMContentLoaded", async function() {
    document.addEventListener("click", async function(msevent) {
        if (msevent.target.matches('button.checkout')){
            msevent.preventDefault();
            if (document.getElementById("checkout").reportValidity()){
                await checkout();
            }
        }
    });
});

const setMessage = (status)=>{
    if (status === 201){
        document.getElementById("alertMsgSuccess").style.display="block";
    } else {
        document.getElementById("alertMsgError").style.display="block";
    }
}

async function checkout(){
    let firstName = document.getElementById("firstName").value;
    let lastName = document.getElementById("lastName").value;
    let email = document.getElementById("email").value;
    let phone = document.getElementById("phone").value;
    let address = document.getElementById("address").value;
    let city = document.getElementById("city").value;
    let country = document.getElementById("country");
    let postalCode = document.getElementById("postalCode").value;
    if (country != null) country = country.value;
    let totalAmount = document.getElementById("totalAmount").value;
    let paymentMethod = "CARD";
    let paymentStatus = 'PENDING';
    let csrf = document.getElementById("csrf").value;

    let body ={
        totalAmount,
        paymentMethod,
        paymentStatus,
        firstName,
        lastName,
        email,
        phone,
        city,
        country,
        postalCode,
        address,
    }

    const request = await fetch(`http://127.0.0.1:8000/order`,{
        method:"POST",
        headers:{"Content-type": "application/json","X-CSRF-TOKEN": csrf},
        body: JSON.stringify(body),
    });

    if (request.ok){
        let response = await request.text();
        console.log(response);
        setMessage(request.status)
        setTimeout(() => {
            location.href = "/";
        },3000 );
    }
    else {
        let response = await request.text();
        console.log(response);
        setMessage(request.status)
    }
}
