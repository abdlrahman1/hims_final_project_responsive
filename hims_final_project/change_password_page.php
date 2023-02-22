<head>
    <link rel="stylesheet" href="css/change_password_page.css">
    <script src="js/reset_pass.js"></script>
</head>

<?php 
session_start();
include("connection.php");
include("header.php");

if(isset($_POST['update'])) {

    $oldpass = ($_POST['oldpass']);
    $newpass = ($_POST['newpass']);
    $confirmpass = ($_POST['confirmpass']);

    // Check if old password is correct for the current user
    $stmt = $database->prepare("SELECT password FROM register WHERE id = ? AND password = ?");
    $stmt->execute([$_SESSION['user']["id"], $oldpass]);
    $user = $stmt->fetch();

    if($user) {

        if($newpass == $confirmpass) {

            // Update the password for the current user
            $stmt = $database->prepare("UPDATE register SET password = ? WHERE id = ?");
            $result = $stmt->execute([$newpass, $_SESSION['user']["id"]]);

            if($result) {
                $_SESSION['user']["password"] = $newpass;
                echo "<script>alert('Your password has been updated'); window.location='index.php'</script>";
                exit;
            } else {
                die("Error with the query");
                echo "<script>alert('Your password has been updated'); window.location='change_password_page.php'</script>";
            }

        } else {
            echo "<script>alert('New password and confirmation password do not match')</script>";
        }

    } else {
        echo "<script>alert('Incorrect old password')</script>";
    }
}
?>


<div class="ch_pass_container">
    <div class="ch_header">
        <h3>Change Password</h3>
    </div>
    <form action="#" method="post">
        <input type="password" class="cur_pass" placeholder="Current Password" name="oldpass" required>
        <input type="password" class="n_pass" id="n_pass" placeholder="New Password" name="newpass" required>
        <input type="password" class="re_n_pass" id="re_n_pass" placeholder="Retype New Password" name="confirmpass" required>
        <input type="submit" class="sub_btn" value="SUBMIT" name="update">
    </form>
</div>

<?php include("footer.php"); 
?>
