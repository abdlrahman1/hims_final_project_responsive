<head>
    <link rel="stylesheet" href="css/all.min.css"/>
    <link rel="stylesheet" href="css/signup.css"/>
</head>
<body>
    <form method="post" enctype="multipart/form-data">
        <div class="sign_up_con" id="signup_con">
        <i class="fa-solid fa-x remove_mark_signup"></i>
            <h1> sign up</h1>
            <div class="icons"> 
                <div class="icon"><i class="fa-regular fa-user"></i></div>
            </div>
            <p> or use your account</p>
            <div class="input_con">
                <input type="text" class="username_input" placeholder="username" name="username">
                <input type="text" class="username_input" placeholder="firstname" name="firstname">
                <input type="text" class="username_input" placeholder="lastname" name="lastname">
                <input type="text" class="username_input" placeholder="email" name="email">
                <input type="password" class="password_input" placeholder="password" name="password">
                <input type="file" name="img">
            </div>
            <div class="login_links">
                <a href="register"> already have an account?</a>
            </div>
            <div class="login_btn">
                <button type="submit" name="btn">SIGN UP</button>
            </div>
        </div>
    </form>
</body>
</html>