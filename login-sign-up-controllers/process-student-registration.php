<?php
session_start();
require_once('database-connection.php');

// Process registration form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $class_program_id = $_POST["class_program"];
    $registration_date = $_POST["registration_date"];
    $student_name = $_POST["student_name"];
    $student_email = $_POST["student_email"];
    $student_phone = $_POST["student_phone"];
    $student_password = password_hash($_POST["student_password"], PASSWORD_DEFAULT); // Hash the password
    $student_address = $_POST["student_address"];
    
    $emergency_contact_phone = $_POST["emergency_contact_phone"];
    $amount = $_POST["amount"];
    $cardHolderName = $_POST["cardholder_name"];
    $cardNumber  = $_POST["card_number"];
    $cardExpiryDate  = $_POST["card_expiry_date"];
    $cardCvv  = $_POST["card_cvv"];
    
    // SQL query to insert data into the user table
    $sql = "INSERT INTO registration (class_program, registration_date, student_name, student_email, student_phone, student_password, student_address, emergency_contact_phone) 
            VALUES ('$class_program_id', '$registration_date', '$student_name', '$student_email', '$student_phone', '$student_password', '$student_address', '$emergency_contact_phone')";
    
    if ($conn->query($sql) === TRUE) {
        // SQL query to insert data into the paymenthistoryclasses table
        $publish_at = date('y/m/d');
        $sql2 = "INSERT INTO paymenthistoryclasses (student_name, class_program_name, amount, payment_date, card_holder_name, card_number, card_expiry_date, card_cvv) 
                VALUES ('$student_name', '$class_program_id', '$amount', '$publish_at', '$cardHolderName', '$cardNumber', '$cardExpiryDate', '$cardCvv')";

        if ($conn->query($sql2) === TRUE) {
            echo "<script>alert('Registration and payment successful'); window.location.href='student-dashboard/';</script>";
        } else {
            echo "Error: " . $sql2 . "<br>" . $conn->error;
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
