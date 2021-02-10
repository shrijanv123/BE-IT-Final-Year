function validateForm(){
	var name1 = document.getElementById("fname").value;
	var name2 = document.getElementById("lname").value;
	var pswd1 = document.getElementById("pswd1").value;
	var pswd2 = document.getElementById("pswd2").value;
	var gen = document.getElementById("gender").value;
	var terms = document.getElementById("terms").value;

	var alpha = /^[A-Za-z]/;
	var decimal = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;

	if(name1.match(alpha))
		return true;
	
	else{
		alert("First name must contain only letters");
	}

	if(name2.match(alpha))
		return true;
	
	else{
		alert("Last name must contain only letters");
	}

	if(pswd1.match(decimal))
		return true;
	else{
		alert("Password must be 8 to 16 characters long and must contain atleast one lowercase, one numeric and one special character");
	}

	if(pswd1 == pswd2)
		return true;

	else
		alert("Passwords do not match");

	if(terms.checked)
		return true;
	else{
		alert("Accept the terms & conditions");
	}

	for(var i=0;i<3;i++){
		if(gen[i].checked)
			return true;
		else{
			alert("Select any one gender");
			return false;
		}
	}
}

function validatePhoneNo() {
	var phno = document.getElementById("phno").value;
	var num = /^\d{10}$/;

	if(phno.match(num))
		return true;
	else{
		alert("Enter a valid phone number");
	}
}

function disableCopy() {
      alert("You cannot perform Copy");
      return false;
}

function disablePaste() {
      alert("You cannot performing Paste");
      return false;
}

function disableCut() {
      alert("You cannot perform Cut");
      return false;
}

function disableContextMenu() {
      alert("You cannot perform right click via mouse as well as keyboard");
      return false;
}