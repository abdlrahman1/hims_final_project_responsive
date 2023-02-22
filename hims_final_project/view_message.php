<?php

session_start();
include("connection.php");
include("header.php");

if(isset($_SESSION["user"]["role"])=="admin"){
    $id = $_GET['id'];
    $contact_us_data = $database->prepare("SELECT * FROM contact_us WHERE id = :id");
    $contact_us_data->execute(array(':id' => $id));
    $get_con_data = $contact_us_data->fetch();
    echo "<h1>" . $get_con_data['name'] . "</h1>";
    echo "<p>" . $get_con_data['message'] . "</p>";
    echo "<a href='messages.php'>Back</a>";
}
else{
    echo "user";
}
?>


