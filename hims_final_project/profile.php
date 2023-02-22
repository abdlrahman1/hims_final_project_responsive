<?php
session_start();
include("connection.php");
require("header.php"); 
?>
<head>
<link rel="stylesheet" href="css/profile.css">
<link href="css/all.css" rel="stylesheet">
</head>
    <div class="overview_container">
        <div class="overview_header">
            <h3>Account Overview</h3>
        </div>
        <div class="account_det">
            <div class="account_det_header">ACCOUNT DETAILS</div>
            <div class="edit_sign">
              <a href="details.php">
              <i class="fas fa-edit"></i></a>
            </div>
            <?php
          $email = $_SESSION["user"]['email'];
          $password = $_SESSION["user"]['password'];
          
          $profile = $database->prepare("SELECT * FROM register WHERE (email = :email AND password = :password) OR (firstname = :firstname AND password = :password)");
          $profile->bindParam(':email', $email);
          $profile->bindParam(':password', $password);
          $profile->bindParam(':firstname', $email);
          $profile->execute();
          
          if ($x = $profile->fetch()) {
              // Display the first name and last name
              echo '<div class="account_name">'.$x['firstname'].' '.$x['lastname'].'</div>
              <div class="email">'.$email.'</div>';
          }
          
             ?>
            <div class="change_pass">
                <a href="change_password_page.php">
                    CHANGE PASSWORD
                </a>
            </div>
        </div>
        <div class="address">
            <div class="adrs_header">ADDRESS BOOK</div>
            <div class="explain_1">
                Your default shipping address:
            </div>
            <div class="explain_2">
                No default shipping address available.
            </div>
            <div class="adrs_footer">
                <a href="add_address_page.php">
                    ADD DEFAULT ADDRESS
                </a>
            </div>
        </div>
        <div class="news_letter">
            <div class="news_header">NEWSLETTER PEFERENCES</div>
            <div class="edit_sign">
                <a href="newsletter page.php">
                  <i class="fas fa-edit"></i>
                </a>
            </div>
            <div class="explanation">
                You are curruntly subscribed to following newsletters:
            </div>
            <div class="check">
                <div class="right">
                    <img src="img/right-sign.png" width="15px" height="15px" alt="">
                </div>
                <div class="ex_right">daily newsletters</div>
            </div>
        </div>
        <br style=" clear: both;">

    </div> 
<?php 
include("footer.php");
?>