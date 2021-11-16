<?php
//connect db
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Loc";

//submited by user
$telno = $_POST["telno"];


$conn = new mysqli($servernam,$username,$password,$dbname);

if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully <br><br>";

$sql = "SELECT email FROM users WHERE email = '" . $email . "'";
$result = $conn->query($sql);

if($result->num_rows > 0){
    //Tell user that email us already taken
    echo "Email us already taken";
    
}else{
    echo "Creating user...";
    //Insert the user and password into the DB
    $sql2 = "INSERT INTO users(telno) VALUES ('" . $telno . "') WHERE email = '".$email."'";
    if($conn->query($sql2) === TRUE){
        echo "New record created successfully";
    }else{
        echo "Error" . $sql . "<br>" . $conn->error; 
    }
}
$conn->close();

?>
