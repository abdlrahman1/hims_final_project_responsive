<?php
//connect to the database
session_start();
include("connection.php");
include("header.php");

//start the session


//check if the user is logged in
if(!isset($_SESSION["user"])){
    header("Location:index.php");
}

//get the user's data from the database
$email = $_SESSION["user"]["email"];
$query = $database->prepare("SELECT * FROM register WHERE email = :email");
$query->bindParam(':email', $email);
$query->execute();
$user = $query->fetch();

if($user["role"] === "admin"){
    $data_user = $database->prepare("SELECT * FROM register WHERE role != 'admin' OR role IS NULL");

    if($data_user->execute()){
        $get_data_user = $data_user->fetchAll();
    }else{
        echo "Error";
        die();
    }
}
else{
//display the user's data on the profile page
echo "Username: " . $user["username"] . "<br>";
echo "First name: " . $user["firstname"] . "<br>";
echo "Last name: " . $user["lastname"] . "<br>";
echo "Email: " . $user["email"] . "<br>";
echo "Profile Image: <img src='upload/".$user["pro_img"]."' width='100px' height='100px'>";
echo $user["role"];
}
?>

<!DOCTYPE html>
<html>
<head>
    <style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    th {
        background-color: #dddddd;
    }
    </style>
</head>
<body>

<?php
if($user["role"] === "admin"){
    echo '<table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>login date</th>
                    <th> profile photo</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>';
    foreach($get_data_user as $result){
        echo "<tr>";
        echo "<td>" . $result["id"] . "</td>";
        echo "<td>" . $result["firstname"] . "</td>";
        echo "<td>" . $result["lastname"] . "</td>";
        echo "<td>" . $result["email"] . "</td>";
        echo "<td>" . $result["login_date"] . "</td>";
        echo "<td>".'<img src="upload/'.$result["pro_img"].'"class="pro_img" width="100%"; height="100px">' ."</td>";
        echo "<td> <form method='post'>
                <input type='hidden' name='id' value='". $result['id'] ."'>
                <input type='submit'value='Delete' onclick='return confirm(\"Are you sure you want to delete this user?\");'>
                </form> </td>";
                echo "</tr>";
            }
            echo '</tbody>
                </table>';
        }
       
//check if the form has been submitted
if(isset($_POST['id'])){
    //get the user's id from the form
    $id = $_POST['id'];

    // delete the user from the database
    $query = $database->prepare("DELETE FROM register WHERE id = :id");
    $query->bindParam(':id', $id);
    if($query->execute()){
        //display a message to the user
        echo "User has been deleted.";
        header("Location: profile.php");
    }else{
        echo "Error";
    }
}

        ?>
      
        
        </body>
        </html>

  