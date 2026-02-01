<?php
session_start();
include('includes/config.php'); // This contains $con for DB connection
error_reporting(0);

// Check if user is logged in
if(strlen($_SESSION['login'])==0 || strlen($_SESSION['pcode'])==0) {   
    header('location:index.php');
    exit;
}

// Fetch student info
$stmt = mysqli_query($con, "SELECT * FROM students WHERE StudentRegno='".$_SESSION['login']."'");
$student = mysqli_fetch_assoc($stmt);

// Fixed fee for all courses (this is just an example, you can change as needed)
$fixedFee = 100; // USD

// Stripe Payment Link URL (Stripe Payment Link)
$stripe_payment_link = " ";  // Replace this with your actual Stripe Payment Link

// Insert data into the database when "Enroll" button is clicked
if (isset($_POST['submit'])) {
    $studentregno = $_SESSION['login'];
    $pincode = $_SESSION['pcode'];
    $session = $_POST['session'];
    $dept = $_POST['department'];
    $level = $_POST['level'];
    $course = $_POST['course'];
    $sem = $_POST['sem'];

    // Insert into courseenrolls table
    $sql = "INSERT INTO courseenrolls (studentRegno, pincode, session, department, level, course, semester) 
            VALUES ('$studentregno', '$pincode', '$session', '$dept', '$level', '$course', '$sem')";

    if (mysqli_query($con, $sql)) {
        $_SESSION['msg'] = "Enrollment Successful!";
        header("Location: enroll-history.php"); // Redirect to the history page
        exit;
    } else {
        $_SESSION['msg'] = "Error: Not Enrolled!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Course Enrollment</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <script src="https://checkout.stripe.com/checkout.js"></script>

    <script type="text/javascript">
        // Function to enable the "Pay Now" button when all form fields are filled
        function enablePayButton() {
            var session = document.getElementById("session").value;
            var department = document.getElementById("department").value;
            var level = document.getElementById("level").value;
            var semester = document.getElementById("sem").value;
            var course = document.getElementById("course").value;

            // If all required fields are filled, enable the Pay Now button
            if (session && department && level && semester && course) {
                document.getElementById("payButton").disabled = false;
            } else {
                document.getElementById("payButton").disabled = true;
            }
        }

        // Function to enable the "Enroll" button when Pay Now is clicked
        function enableEnrollButton() {
            document.getElementById("enrollButton").disabled = false;
        }

        // Function to open the Stripe Payment Link
        function payNow() {
            // If the Pay Now button is clicked, open the Stripe Payment Link in a new tab
            window.open("<?php echo $stripe_payment_link; ?>", "_blank");

            // Enable the Enroll button after payment button is clicked
            enableEnrollButton();
        }
    </script>
</head>

<body>
    <?php include('includes/header.php'); ?>
    <?php if ($_SESSION['login'] != "") { include('includes/menubar.php'); } ?>

    <div class="content-wrapper">
        <div class="container">
            <h1 class="page-head-line">Course Enroll</h1>

            <div class="col-md-8 offset-md-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Course Enroll
                    </div>

                    <font color="green" align="center"><?php echo htmlentities($_SESSION['msg']); ?><?php echo htmlentities($_SESSION['msg'] = ""); ?></font>

                    <div class="panel-body">
                        <form method="POST" enctype="multipart/form-data">
                            <!-- Student Info -->
                            <div class="form-group">
                                <label for="studentname">Student Name</label>
                                <input type="text" class="form-control" id="studentname" name="studentname" value="<?php echo htmlentities($student['studentName']); ?>" readonly />
                            </div>

                            <div class="form-group">
                                <label for="studentregno">Student Reg No</label>
                                <input type="text" class="form-control" id="studentregno" name="studentregno" value="<?php echo htmlentities($student['StudentRegno']); ?>" placeholder="Student Reg no" readonly />
                            </div>

                            <div class="form-group">
                                <label for="Pincode">Pincode</label>
                                <input type="text" class="form-control" id="Pincode" name="Pincode" readonly value="<?php echo htmlentities($student['pincode']); ?>" required />
                            </div>

                            <!-- Session -->
                            <div class="form-group">
                                <label for="Session">Session</label>
                                <select class="form-control" name="session" id="session" required="required" onchange="enablePayButton()">
                                    <option value="">Select Session</option>
                                    <?php
                                    $sql = mysqli_query($con, "SELECT * FROM session");
                                    while ($row = mysqli_fetch_array($sql)) {
                                        echo '<option value="' . htmlentities($row['id']) . '">' . htmlentities($row['session']) . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>

                            <!-- Department -->
                            <div class="form-group">
                                <label for="Department">Department</label>
                                <select class="form-control" name="department" id="department" required="required" onchange="enablePayButton()">
                                    <option value="">Select Department</option>
                                    <?php
                                    $sql = mysqli_query($con, "SELECT * FROM department");
                                    while ($row = mysqli_fetch_array($sql)) {
                                        echo '<option value="' . htmlentities($row['id']) . '">' . htmlentities($row['department']) . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>

                            <!-- Level -->
                            <div class="form-group">
                                <label for="Level">Level</label>
                                <select class="form-control" name="level" id="level" required="required" onchange="enablePayButton()">
                                    <option value="">Select Level</option>
                                    <?php
                                    $sql = mysqli_query($con, "SELECT * FROM level");
                                    while ($row = mysqli_fetch_array($sql)) {
                                        echo '<option value="' . htmlentities($row['id']) . '">' . htmlentities($row['level']) . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>

                            <!-- Semester -->
                            <div class="form-group">
                                <label for="Semester">Semester</label>
                                <select class="form-control" name="sem" id="sem" required="required" onchange="enablePayButton()">
                                    <option value="">Select Semester</option>
                                    <?php
                                    $sql = mysqli_query($con, "SELECT * FROM semester");
                                    while ($row = mysqli_fetch_array($sql)) {
                                        echo '<option value="' . htmlentities($row['id']) . '">' . htmlentities($row['semester']) . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>

                            <!-- Course -->
                            <div class="form-group">
                                <label for="Course">Course</label>
                                <select class="form-control" name="course" id="course" required="required" onchange="enablePayButton()">
                                    <option value="">Select Course</option>
                                    <?php
                                    $sql = mysqli_query($con, "SELECT * FROM course");
                                    while ($row = mysqli_fetch_array($sql)) {
                                        echo '<option value="' . htmlentities($row['id']) . '">' . htmlentities($row['courseName']) . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>

                            <!-- Pay Now Button -->
                            <button type="button" id="payButton" class="btn btn-primary" disabled onclick="payNow()">
                                Pay Now
                            </button>

                            <!-- Enroll Button (Initially disabled) -->
                            <button type="submit" name="submit" id="enrollButton" class="btn btn-success" disabled>
                                Enroll
                            </button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('includes/footer.php'); ?>
    <script src="assets/js/jquery-1.11.1.js"></script>
    <script src="assets/js/bootstrap.js"></script>

</body>

</html>
