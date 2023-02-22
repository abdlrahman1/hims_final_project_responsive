<?php
session_start();
include("connection.php");
include("header.php");

if(isset($_POST["btn_contact_us"])){

  $name = $_POST["contact_us_full_name"];
  $email = $_POST["contact_us_email"];
  $phone = $_POST["contact_us_phone_number"];
  $message = $_POST["contact_us_message"];
  $ip = $_SERVER['REMOTE_ADDR'];
  $error = "";
  //check for valid name
  if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
    $error .= "Only letters and white space allowed in name.<br>"; 
  }
  //check for valid email
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error .= "Invalid email format.<br>"; 
  }
  //check for valid phone number
  if(!preg_match("/^[0-9]{11}$/", $phone)) {
    $error .= "Invalid phone number format, must be 11 digits.<br>";
  }

  //if no errors were found, insert into database
  if($error == "") {
    $contact_us = $database->prepare("INSERT INTO contact_us(name,phone,email,message,time_message,user_ip)VALUES(:name,:phone,:email,:message,now(),:ip)");
    $contact_us->bindParam(':name',$name);
    $contact_us->bindParam(':email',$email);
    $contact_us->bindParam(':phone',$phone);
    $contact_us->bindParam(':message',$message);
    $contact_us->bindParam(':ip',$ip);
    $contact_us->execute();

    if($contact_us->rowCount() > 0) {
      echo "your message were sent to the admin";
      header("Location:contact_us.php");
      exit();
    } else {
      echo "please try again";
    }
  } else {
    echo $error;
  }
}  
?>

<head>

    <link rel="stylesheet" href="css/contact_us.css"/>


   
</head>
<body>

<form method = "post">
<div class = "contact_us_parent">
    
<div class="inputs">
    <h1> send us a message</h1>
<input type="text" class = "input" placeholder="full name" name="contact_us_full_name"> 
<input type="text" class = "input" placeholder="E-mail" name="contact_us_email"> 
<input type="text" class = "input" placeholder="phone" name="contact_us_phone_number"> 
<textarea class = "textarea" placeholder="Your Message" name="contact_us_message"> </textarea>
<button type="submit" class="send"name = "btn_contact_us"> send</button>



</div>
</div>
</form>



</body>

</html>









