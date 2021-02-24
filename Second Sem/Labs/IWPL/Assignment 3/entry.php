<!DOCTYPE html>
<html>
<head>
	<title>Submit your entries</title>
	<style type="text/css">
		.heading{
			text-align: center;
			font-size: 55px;
			font-family: sans-serif;
			top: 0; 
			text-decoration-line: underline;
		}

		.title{
			font-size: 25px;
			text-decoration: underline;
			padding: 20px;
		}

		body{
			background-color: #E6E6E6;
			font-family: Arial, Helvetica, sans-serif;
		}

		.formCSS{
			align-content: center;
		}

		.forms{
			text-align: left;
			font-family: inherit;
			font-size: 20px;
			padding-left: 450px;
			padding-right: 250px;
			padding-bottom: 50px;
		}

		.field{
			text-align:left;
			padding: 10px; 
		}

		.btn{
			padding-top: 20px;
			font-size: 15px;
			width: 150px;
			padding: 10px;
		}

		.navbar{
			overflow: hidden;
			background: #333;
			position: sticky;
			top: 0;
		}

		.navbar a{
			float: left;
			font-size: 20px;
			color: white;
			text-align: center;
			padding: 14px 16px;
			text-decoration: none;
		}

		.dropdown{
			float: left;
			overflow: hidden;
		}

		.dropdown .dropbtn{
			font-size: 20px;
			border: none;
			outline: none;
			color: white;
			padding: 14px 16px;
			background-color: inherit;
			font-family: inherit;
		}

		.navbar a:hover, .dropdown:hover .dropbtn{
			background-color: #111;
		}

		.dropdown-content{
			display: none;
			position: absolute;
			background-color: #f9f9f9;
			min-width: 160px;
			box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
			position: fixed;
			z-index: 1;
		}

		.dropdown-content a{
			float: none;
			color: black;
			padding: 12px 16px;
			text-decoration: none;
			display: block;
			text-align: left;
		}

		.dropdown-content a:hover{
			background-color: #ddd;
		}

		.dropdown:hover .dropdown-content{
			display: block;
		}

		.active{
			background-color: #111;
		}

		.error{
			color: red;
			font-size: 12px;
		}
	</style>
</head>

<body>

<?php
// define variables and set to empty values
$nameErr = $emailErr = $websiteErr = "";
$name = $email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed"; 
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }
  }
    
  if (empty($_POST["website"])) {
    $websiteErr = "URL is required";
  } else {
    $website = test_input($_POST["website"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL"; 
    }
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
</body>
	
</body>
	<div class="navbar">
		<a href="web.html">Home</a>
		<a href="animals.html">Animals</a>
		<a href="india.html">India</a>
		<a href="ocean.html">Oceans</a>
		<a class="active" onclick="Back()" style="float: right; background-color: #4CAF50">Back</a>
		<div class="dropdown">
			<div class="active">
			<button class="dropbtn">Support 
	    		<i class="fa fa-caret-down"></i>
	    	</button></div>
	    <div class="dropdown-content">
	      	<a href="contact.html">Contact Us</a>
	      	<a href="entry.html">Submit Entries</a>
	    </div>
	  	</div> 
	</div>

	<script>
		function Back()
		{
			window.history.back();
		}
	</script>

	<h1 class="heading">Submit Entries</h1>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

		<div class="forms">
			<p>Help us by submiting entries which you feel are worthy enough of being on our website!</p>
			<fieldset class="formCSS" style="padding-top: 30px;">
				<legend class="title">Submit Entries</legend>

				Name:<br>
				<input class="field" type="text" name="name" placeholder="Name" size="30">
				<span class="error">*  <?php echo $nameErr;?></span>
				<br><br>

				Email-id:<br>
				<input class="field" type="text" name="email" placeholder="Email-id" size="30">
				<span class="error">*  <?php echo $emailErr;?></span>
				<br><br>

				Entry URL:<br>
				<input class="field" type="text" name="website" placeholder="Enter the URL" size="30">
				<span class="error">*  <?php echo $websiteErr;?></span>
				<br><br>
				<p><span class="error">* Required field</span></p>
			</fieldset>
			<br>
			
			<input class="btn" type="submit" name="submit" value="Submit">
			<input class="btn" type="reset" name="reset" value="Reset">
		</div>
	</form>
</body>
</html>
