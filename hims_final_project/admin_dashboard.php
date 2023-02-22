<?php
session_start();
include("connection.php");
include("header.php");

?>

<head>
<link rel="stylesheet" href="css/all.min.css">
<link rel="stylesheet" href="css/admin_dashboard.css">
<style>

    </style>

</head>

<body>
    <section class="parent_icon_dashboard">
        <div class="parent_3_icon_1">
        <a href="publish_books.php">
    <div class="books">
<i class="fa-solid fa-book"></i>
<h5>books</h5>
</div>
        </a>
<a href="publish_article.php">
<div class="articles_icon">
<i class="fa-solid fa-newspaper"></i>
<h5>articles</h5>
</div>
</a>
<a href="contact_us_dashbored.php">
<div class="messages">
<i class="fa-solid fa-message"></i>
<h5>messages</h5>
</div>
</a>
</div>

<div class="parent_3_icon_2">
    <a href="publish_challenges.php">
<div class="coding">
<i class="fa-solid fa-code"></i>
<h5>challenges</h5>
</div>
</a>
<a href="users_dashboard.php">
<div class="users_icon">
<i class="fa-solid fa-users"></i>
<h5>users</h5>
</div>
</a>
<a href="index.php">
<div class="back">
<i class="fa-solid fa-house"></i>
<p>home</p>
</div>
</a>
</div>
</section>
</body>