function check_empty() {
    let fullname = document.getElementById('fname');
    let username = document.getElementById('username');
    let pass = document.getElementById('pass');
    let conpass = document.getElementById('conpass');
    let dob = document.getElementById('dob');
    let phno = document.getElementById('phno');
    let email = document.getElementById('email');
    let address = document.getElementById('address');

    if (fullname.value == "")
    {
        alert("Please enter your fullname");
    }
    else if (username.value == "")
    {
        alert("Please enter your username");
    }
    else if(pass.value=="")
    {
        alert("Please enter your password");
    }
    else if (conpass.value=="")
    {
        alert("Please confirm your password");
    }
    else if(dob.value=="")
    {
        alert("Please enter your date of birth");
    }
    else if(phno.value=="")
    {
        alert("Please enter your Phone Number");
    }
    else if(email.value=="")
    {
        alert("Please enter your Email");
    }
    else if(address.value=="")
    {
        alert("Please enter your address");
    }
    else if (pass.value!=conpass.value)
    {
        alert("Password and confirm password does not match");
    }
    else
    {
        document.getElementById("create_user_form").submit();
    }
}