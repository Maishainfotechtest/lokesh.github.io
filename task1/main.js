//validation for imgae
 
// validation for email
function emailvalidation() {

    let usermail = document.getElementById('email').value;
    let emailerror = document.getElementById('emailerror');


    if (usermail == "") {
        emailerror.innerText = "**please enter email";

    }
    else if (usermail.length < 5) {
        emailerror.innerText = "**email length should be grater than 5";

    }
    else {
        emailerror.innerText = " ";

    }
}
// validation for username 
function namevalidation() {
    let username = document.getElementById('name').value;

    let nameCount = username.length;
    let errmsg = document.getElementById('errMsg');

    if (nameCount == "") {

        errmsg.innerText = " **please enter name";
    }
    else {
        if (nameCount < 4) {
            errmsg.innerText = " **Name length should be greater than 3 ";

        }
        else if (nameCount > 20) {
            errmsg.innerText = " **Name length should be less than 20 ";

        }
        else { errmsg.innerText = "  "; }
    }

}

// validation for phone number 
function phonevalidation() {
    let userContact = document.getElementById('mobile').value;
    let phonError = document.getElementById('phoneerror');
    let callCount = userContact.length;

    if (callCount == "") {

        phonError.innerText = "**please enter phone number";

    }
    else if (userContact == NaN) {
        phonError.innerText = "**only numbers are allowed";
    }
    else {
        if (callCount < 10 || callCount > 10) {
            phonError.innerText = "**contact number should be in 0 -10 range";

        }

        else {
            phonError.innerText = " ";
        }
    }

}

//validation for password and confirm password 
function passvalidation() {
    let pass = document.getElementById('pass').value;
    let cpass = document.getElementById('cpass').value;

    let passerror = document.getElementById("passError");
    let cpasserror = document.getElementById("cpasserror");

    let passcount = pass.length;

    if (pass == "") {
        passerror.innerText = "*please enter  password";

    }
    else {
        if (passcount > 1) {
            passerror.innerText = " ";
        }
        if (cpass == "") {
            cpasserror.innerText = "**please enter confirm password";

        }
        if (passcount < 5) {
            passerror.innerText = "**password length must be greater than 5";

        }

        else {
            if (pass !== cpass) {
                cpasserror.innerText = "**password and comfirm password are not matching";
                passerror.innerText = "*password and confirm password are not matching";

            } else {
                cpasserror.innerText = " ";
                passerror.innerText = " ";

            }
        }
    }




}

 

function submitpage() {
//username validation 
    namevalidation();
//phone number validation
    phonevalidation();
//email validation
    emailvalidation();
//password validation;
    passvalidation();
 
}





