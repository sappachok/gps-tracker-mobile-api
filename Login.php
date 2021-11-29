<?php
//connect db
$servername = "mysql";
$username = "gps-tracker";
$password = "TaVU7UBrLSmtz7Zm";
$dbname = "gps-tracker";

//submited by user
$loginUser = $_POST["loginUser"];
$loginPass = $_POST["loginPass"];

$conn = new mysqli($servernam,$username,$password,$dbname);

if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully <br><br>";

$sql = "SELECT password FROM users WHERE email = '" . $loginUser . "'";
$result = $conn->query($sql);

if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        if($row["password"] == $loginPass){
            echo "Login Success";
        }else{
            echo "Wrong Password.";
        }  
    }
}else{
    echo "Username does not exist";
}


?>