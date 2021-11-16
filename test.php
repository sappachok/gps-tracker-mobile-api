<?php
//connect db
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Loc";

$conn = new mysqli($servernam,$username,$password,$dbname);

if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully <br><br>";
//submited by user
$username = $_POST["username"];
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$telno = $_POST["telno"];
$email = $_POST["email"];
$password = $_POST["password"];

$sql = "INSERT INTO users (username, fname, lname, telno, email, password) VALUES ('".$username."','".$fname."','".$lname."','".$telno."','".$email."','".$password."')";
        if($this->db->query($sql)){
            return 1;
        }else{
            return 0;
        }
$result = $conn->query($sql);
$conn->close();
?>
