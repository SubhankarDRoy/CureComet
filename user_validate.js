function check_empty() {
    let fullname = document.getElementById('fname');
    if (fullname.value == "")
    {
        alert("Please enter your fullname");
    }
    else{
        document.getElementById("create_user_form").submit();
    }
}