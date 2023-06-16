function validate(firstname,lastname,username,password,cpassword)
{
    var pattern = /^(?=.*[-\#\$\.\%\&\@\!\+\=\\*])(?=.*[a-zA-Z])(?=.*\d).{8,}$/;
    if(firstname.length==0 ||lastname.length==0 ||username.length==0 ||password.length==0||cpassword==0)
    {
        document.getElementById("error").innerHTML="All fields are required";
        return false;
    }
    
    else if(!pattern.test(password))
    {
        document.getElementById("error").innerHTML="Password is at least 8 characters with at least 1 number and 1 special character ";
        return false;
    }
    else if(password != cpassword)
    {
        document.getElementById("error").innerHTML="Password doesn't match confirmed password";
        return false;
    }
    else
    {
        return true;
    }
}
