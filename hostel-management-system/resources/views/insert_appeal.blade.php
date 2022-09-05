<?php
    $servername='localhost';
    $username='root';
    $password='';
    $dbname = "hms";
    $conn=mysqli_connect($servername,$username,$password,"$dbname");
      if(!$conn){
          die('Could not Connect MySql Server:' .mysql_error());
        }
?>

<?php

if(isset($_GET['submit']))
{    
     $e_hostel = $_GET['e_hostel'];
     $e_bed = $_GET['e_bed'];
     $e_room = $_GET['e_room'];
     $apply_reason = $_GET['apply_reason'];
     $sql = "INSERT INTO appeal (e_hostel,e_bed,e_room,apply_reason)VALUES ('$e_hostel','$e_bed','$e_room','$apply_reason')";
     if (mysqli_query($conn, $sql)) {
        echo "New record has been added successfully !";
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }
     mysqli_close($conn);
}
?>