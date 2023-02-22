<?php
session_start();
include("connection.php");
include("header.php");

if(isset($_SESSION["user"]["role"])=="admin"){
    echo "hello".$_SESSION["user"]["email"];
    $contact_us_data = $database->prepare("SELECT * FROM contact_us");
    $contact_us_data->execute();
    $get_con_data = $contact_us_data->fetchAll();
    echo '<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>name</th>
            <th>phone</th>
            <th>Email</th>
            <th>message</th>
            <th> message_date</th>
            <th> delete</th>
        </tr>
    </thead>
    <tbody>';
    foreach($get_con_data as $result){
        echo "<tr>";
        echo "<td>" . $result["id"] . "</td>";
        echo "<td>" . $result["name"] . "</td>";
        echo "<td>" . $result["email"] . "</td>";
        echo "<td>" . $result["phone"] . "</td>";
        echo "<td>";
        $message = $result["message"];
        $message_length = strlen($message);
        if ($message_length > 100) {
            $message = substr($message, 0, 100) . "...";
            echo $message;
            echo "<a href='view_message.php?id=" . $result['id'] . "'>Read More</a>";
        } else {
            echo $message;
        }
        echo "</td>";
        echo "<td>" . $result["time_message"] . "</td>";
        echo "<td> <form method='post'>
            <input type='hidden' name='id' value='". $result['id'] ."'>
            <input type='submit'value='Delete' onclick='return confirm(\"Are you sure you want to delete this user?\");'>
            </form> </td>";
        echo "</tr>";
    }
    echo '</tbody>
    </table>';
}
else{
    echo "user";
}
if(isset($_POST['id'])){
    //get the user's id from the form
    $id = $_POST['id'];

    // delete the user from the database
    $query = $database->prepare("DELETE FROM contact_us WHERE id = :id");
    $query->bindParam(':id', $id);
    if($query->execute()){
        //display a message to the user
        header("Location: profile.php");
    }else{
        echo "Error";
    }
}
?>


<head>
<link rel="stylesheet" href="css/contact_us_dashbored.css"/>
</head>
<body>
    
</body>
</html>
<style>
