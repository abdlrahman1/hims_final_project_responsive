
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/header.css"/>
</head>
<body>
<header>
  <div class="menu-bar">
    <i class="fa-solid fa-x"></i>
    <a class="menu-bar-home"> home </a>
    <a class="menu-bar-contact_us"> contact us </a>
    <a class="menu-bar-about"> about us</a>
    <a class="menu-bar-login">login</a>
  </div>
  <div class="menu" id="menu" onclick="toogle()"> <i class="fa-solid fa-bars" id="ss" ></i></div>
  <ul class="parent-ul">
    <li><a href="index.php"> الصفحه الريئسية </a></li>
    <li> <a href="contact_us.php"> اتصل بنا </a></li>
    <li> <a href="about_us.php"> عنا </a></li>
    <li id="admin_dashboard"> <a href="admin_dashboard.php"> لوحه تحكم الادمن </a></li>
    <li onclick="signup()" id="signup">انشاء حساب |</li>
    <li onclick="login()" id="login"> تسجيل دخول</li>
    <li id="logout"><a href="logout.php"> تسجيل خروج</a></li>
    <li class="parent-link">الروابط الجديدة
      <ul class="child-links">
        <li><a href="books.php">books</a></li>
        <li><a href="articles.php">articles</a></li>
        <li><a href="challenges.php"> challenges</a></li>
      </ul>
    </li>
  </ul>
  <div class="logo-parent"> <img src="img/logo2.png" class="logo"> </div>
  <div class="parent-login-signup">
    <ul></ul>
  </div>
</header>


<div class="black"></div>
<div class= "scroll-btn"> UP  </div>
</body>
<?php 
include("signup_form.php");
include("login_form.php");  
?>
<?php if(isset($_SESSION['user'])){ ?>

<?php 
echo "<script> document.getElementById('signup').style.display ='none';
document.getElementById('login').style.display = 'none';
document.getElementById('logout').style.display='flex';

</script>";

if(isset($_SESSION["user"]["role"])=="Admin"){
    echo "<script>;
     document.getElementById('admin_dashboard').style.display='flex';
     </script>";
 }
}?>
<?php


if(isset($_POST["btn"]) && isset($_FILES["img"]) && !empty($_POST["username"]) && !empty($_POST["firstname"]) && !empty($_POST["lastname"]) && !empty($_POST["email"]) && !empty($_POST["password"])) {
    $username = $_POST["username"];
    $fname = $_POST["firstname"];
    $lname = $_POST["lastname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $img = $_FILES["img"]["name"];
    $img_temp = $_FILES["img"]["tmp_name"];
    $img_size = $_FILES["img"]["size"];
    $_SESSION["name"] = $fname;
    $img_extension = pathinfo($img, PATHINFO_EXTENSION);
    $allowed_extensions = ["png", "jpg", "jpeg"];

    // check if email or username already exists
    $check_query = $database->prepare("SELECT email FROM register WHERE email = :email or username = :username");
    $check_query->bindParam(':email', $email);
    $check_query->bindParam(':username', $username);
    $check_query->execute();
    if($check_query->rowCount() > 0){
        echo "This email or username address is already registered";
    } else {
        if(in_array($img_extension, $allowed_extensions)){
            if($img_size < 3000000){
                $upload_dir = 'D:\xampp\htdocs\php code\hims_final_project\upload/';
                $timestamp = time();
                $random_number = rand(1000, 9999);
                $new_img_name = $timestamp . '_' . $random_number . '.' . $img_extension;
                $img_path = $upload_dir . $new_img_name;
                if(move_uploaded_file($img_temp, $img_path)){
                    // insert the user into the database
                    $insert = $database->prepare("INSERT INTO register(username,firstname,lastname,email,password,pro_img,login_date)VALUES (:username,:firstname,:lastname,:email,:password,:img,now())");
                    $insert->bindParam(':username', $username);
                    $insert->bindParam(':firstname', $fname);
                    $insert->bindParam(':lastname', $lname);
                    $insert->bindParam(':email', $email);
                    $insert->bindParam(':password', $password);
                    $insert->bindParam(':img', $new_img_name);
                    $insert->execute();
                    if($insert->rowCount() > 0){
                        echo "Your email: ".$email." is registered and image is uploaded";
                    }
                } else {
                    echo "Error uploading image";
                }
            } else {
                echo "Image size is too large";
            }
        } else {
            echo "Please insert a png or jpeg photo";
        }
    }
}

//login form 
if(isset($_POST["log_btn"])){
    $email_log = $_POST["log_email"];
    $pass_log = $_POST["log_pass"];

    $login = $database->prepare("SELECT * FROM register WHERE email = :email_log AND password = :pass_log");
    $login->bindParam(':email_log', $email_log);
    $login->bindParam(':pass_log', $pass_log);
    $login->execute();

    if($login->rowCount()>0){
        $user = $login->fetch();
        $_SESSION['user'] = $user;
        echo "<script>window.location.href = 'index.php';</script>";
    } else {
        echo "Invalid email or password";
    }
}
?>
<script> 
</script>
<script src="js/header.js"> </script>
<script src="js/login.js"> </script>
<script src="js/signup.js"> </script>

</html>