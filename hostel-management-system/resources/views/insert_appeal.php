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
     $sql = "INSERT INTO appeal (student_id,e_hostel,e_bed,e_room,apply_reason,status)VALUES ('uwucst18007','$e_hostel','$e_bed','$e_room','$apply_reason','pending')";
     if (mysqli_query($conn, $sql)) {
        echo "New record has been added successfully !" ;
      //   return redirect()->route('student.main');
      header("Location: http://127.0.0.1:8000/student/home");
      exit;

     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }
     mysqli_close($conn);
}
?>