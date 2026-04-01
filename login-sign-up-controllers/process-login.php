<?php
session_start();
require_once('database-connection.php');

// Process login method
if (isset($_POST['username'])) {
    $userName = $_POST['username'];
    $passWord = $_POST['password'];
    $userType = $_POST['userType'];

    if ($userType == "student") {
  
      
      // Select student number and password from student_account table
      $sql = "SELECT * FROM registration WHERE student_name='$userName' AND student_password ='$passWord'";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
   
   $count = mysqli_num_rows($result);
   
   // If result matched $myusername and $mypassword, table row must be 1 row
     
   if($count == 1) {
   
       
    $_SESSION['student_name'] = $row['student_name'];
    
    echo "<script>alert('Login Successful'); window.location.href='student-dashboard/';</script>";
   //header("Location:student-module/index.");

   }else {

    echo "Debug Info: Count = $count"; // Print the count for debugging
    echo "<script>alert('Your Login Name or Password is invalid'); window.location.href='index.html';</script>";
   }

     

        }else if($userType == "admin"){
        $sql = "SELECT * FROM admin_account WHERE admin_name ='$userName' AND admin_password ='$passWord'";
        $result = mysqli_query($conn, $sql);

        if (!$result) {
            // Handle SQL query error
            echo "SQL Error: " . mysqli_error($conn);
        } else {
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $count = mysqli_num_rows($result);

            if ($count == 1) {
                $_SESSION['admin_name'] = $row['admin_name'];
                echo "<script>alert('Login Successful'); window.location.href='http://localhost/combat-cllub-website/admin/index.php';</script>";
            } else {
                echo "<script>alert('Your Login Name or Password is invalid'); window.location.href='index.php';</script>";
            }
        }
    }
}
?>
