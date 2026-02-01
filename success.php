<?php
session_start();

// Include config only once to avoid constant redefinition
include_once('includes/config.php');

// Check if the user is logged in
if(strlen($_SESSION['login'])==0){   
    header('location:index.php');
    exit;
}

// Fetch the student's enrolled courses
$stmt = mysqli_query($con, "SELECT course.courseName, session.session, department.department, level.level, semester.semester, courseenrolls.enrollDate 
                            FROM courseenrolls 
                            JOIN course ON course.id = courseenrolls.course
                            JOIN session ON session.id = courseenrolls.session
                            JOIN department ON department.id = courseenrolls.department
                            JOIN level ON level.id = courseenrolls.level
                            JOIN semester ON semester.id = courseenrolls.semester
                            WHERE courseenrolls.studentRegno = '".$_SESSION['login']."'");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="Course Enrollment Success" />
    <meta name="author" content="" />
    <title>Enrollment Success</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
</head>
<body>

<?php include('includes/header.php');?>

<div class="container">
    <h1 class="page-head-line">Payment Successful!</h1>
    <p>Thank you for enrolling in the course. Your enrollment details are below:</p>

    <!-- Display success message -->
    <div class="alert alert-success">
        <strong>Success!</strong> Your enrollment has been processed.
    </div>

    <div class="table-responsive table-bordered">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Course Name</th>
                    <th>Session</th>
                    <th>Department</th>
                    <th>Level</th>
                    <th>Semester</th>
                    <th>Enrollment Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $cnt = 1;
                while ($row = mysqli_fetch_array($stmt)) {
                ?>
                <tr>
                    <td><?php echo $cnt++; ?></td>
                    <td><?php echo htmlentities($row['courseName']); ?></td>
                    <td><?php echo htmlentities($row['session']); ?></td>
                    <td><?php echo htmlentities($row['department']); ?></td>
                    <td><?php echo htmlentities($row['level']); ?></td>
                    <td><?php echo htmlentities($row['semester']); ?></td>
                    <td><?php echo htmlentities($row['enrollDate']); ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <a href="enroll-history.php" class="btn btn-primary">Go to Enroll History</a>
</div>

<?php include('includes/footer.php');?>

<script src="assets/js/jquery-1.11.1.js"></script>
<script src="assets/js/bootstrap.js"></script>
</body>
</html>
