<?php
session_start();
include('includes/config.php');
require_once 'vendor/autoload.php';  // Include Stripe's library

// Stripe Secret Key (for backend)
\Stripe\Stripe::setApiKey('sk_test_51S24AkPv3yrO1r93O1OtSGK2LC4b0IAYMqWeQ0EzvTBZm6baecyY4ebxDsIyOl9Tuhc770l1ugplIZd6VmzSg9LZ00jg70PgiQ');

// Check if the payment is successful and handle the enrollment process
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Your POST data from the form
    $studentRegno = $_SESSION['login'];
    $courseId = $_POST['course'];  // Course ID selected by the user
    $sessionId = $_POST['session'];  // Session selected by the user
    $departmentId = $_POST['department'];  // Department selected by the user
    $levelId = $_POST['level'];  // Level selected by the user
    $semesterId = $_POST['sem'];  // Semester selected by the user
    $enrollDate = date('Y-m-d');  // The current date (enrollment date)

    try {
        // Create a Stripe Checkout session (assuming you have the session ID from the client)
        $session = \Stripe\Checkout\Session::retrieve($_POST['session_id']); // Assuming you passed session ID to this page

        if ($session->payment_status == 'paid') {
            // Payment successful, insert the enrollment data into the database
            $stmt = $con->prepare("INSERT INTO courseenrolls (studentRegno, course, session, department, level, semester, enrollDate) 
                                VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("siissis", $studentRegno, $courseId, $sessionId, $departmentId, $levelId, $semesterId, $enrollDate);
            $stmt->execute();

            // Redirect to success page or update enrollment history directly
            $_SESSION['msg'] = "Enroll Successfully !!";
            header('Location: success.php'); // Redirect to the success page after payment
            exit();
        } else {
            // Payment failed, handle the failure
            echo "Payment failed. Please try again.";
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
