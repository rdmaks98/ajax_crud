<?php 
$conn = mysqli_connect("localhost","root","","ajax_crud");
if(empty($conn))
{
die("Error". mysqli_connect_error());
}

extract($_POST);
    // insert data into database
    $query = "UPDATE `ajax-user` SET fname='$fname',degree='$degree',email='$email',mob='$mob' WHERE id='$id'";
    print_r($query);
    mysqli_query($conn, $query);
?>