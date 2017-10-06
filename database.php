<?php 

if ((isset($_POST['postcode'])) && (isset($_POST['email']))) {

   $postcode = $_POST['postcode'];
   $email = $_POST['email'];

  //connect to mysql - I prefer prepared statements as the variables are prepared for safety when sent to MySQL

  $connect = mysqli_connect('hostname','db-user','password','database');

mysqli_query( $connect, "INSERT INTO visitors(postcode,email) VALUES('$postcode','$email')");

};
?>
