<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo 'this is title' ;?></title>
</head>
<body>
<?php  echo gettype("hello"); 
echo "<Br>";
$num = 10;
echo gettype($num);
echo "<br>";

echo gettype(100);
echo "<br>";
echo gettype(true+true);
echo "<br>"; 
echo true+true;



?>
</body>
</html>