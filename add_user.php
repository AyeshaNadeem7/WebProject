<?php
$con = mysqli_connect("localhost", "root", "", "test");
$password = password_hash("123456", PASSWORD_DEFAULT);
mysqli_query($con, "INSERT INTO users (username, password) VALUES ('admin', '$password')");
echo "Test user created.";
?>
