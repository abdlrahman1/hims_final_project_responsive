<head>

<link rel="stylesheet" href="css/change_password.css">
</head>

<?php include("header.php")?>;
    <div class="ch_pass_container">
        <div class="ch_header">
            <h3>Change Password</h3>
        </div>
        <form action="#" method="post">
            <input type="password" class="cur_pass" placeholder="Currunt Password" name="oldpass">
            <input type="password" class="n_pass" id="n_pass" onkeyup="new_pass()" placeholder="New Password" name="newpass">
            <input type="password" class="re_n_pass" id="re_n_pass" onkeyup="confirm_pass()" placeholder="Retype New Password"name="confirmpass">
            <input type="submit" class="sub_btn" onclick="sub_btn()" value="SUBMIT" name="update">
        </form>
    </div>
 
  