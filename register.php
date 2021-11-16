<?php
//connect db
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Loc";

//submited by user
$lusername = $_POST["lusername"];
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$telno = $_POST["telno"];
$email = $_POST["email"];
$pass = $_POST["password"];

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
    echo $sql;
}else{
    echo "Creating user...";
    //Insert the user and password into the DB
    $sql2 = "INSERT INTO users(username, password, email, fname, lname, telno) VALUES ('" . $lusername . "','" . $fname . "','" . $lname . "','" . $telno . "','" . $email . "','" . $pass . "')";
    if($conn->query($sql2) === TRUE){
        echo "New record created successfully";
        echo $sql2;
    }else{
        echo "Error" . $sql . "<br>" . $conn->error; 
    }
}
$conn->close();

?>
