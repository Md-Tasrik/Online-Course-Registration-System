<?php
session_start();
include('includes/config.php');
require_once('connection.php'); // if you use PDO for database connection

// Check if enrollment data exists in session
if(!isset($_SESSION['enroll_data'])){
    header('Location: enroll.php'); // Redirect back if no data
    exit;
}

// Retrieve enrollment data from session
$data = $_SESSION['enroll_data'];

// Stripe Keys
$stripe = [
    'publishable_key' => 'pk_test_51S24AkPv3yrO1r93wKDnqLO7jRC3M31InIlmpkmryyYTxj6U0oQMkgm9YNwbCl2clnhAgYVycfyk8CQJnEw4PzJj00lXsjSkx3', // Replace with your Stripe publishable key
    'secret_key' => 'sk_test_51S24AkPv3yrO1r93O1OtSGK2LC4b0IAYMqWeQ0EzvTBZm6baecyY4ebxDsIyOl9Tuhc770l1ugplIZd6VmzSg9LZ00jg70PgiQ'            // Replace with your Stripe secret key
];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Course Payment</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <script src="https://checkout.stripe.com/checkout.js"></script>
</head>
<body>
<?php include('includes/header.php');?>
<?php if($_SESSION['login']!=""){ include('includes/menubar.php'); } ?>

<div class="content-wrapper">
    <div class="container">
        <h1 class="page-head-line">Course Payment</h1>

        <div class="col-md-8 offset-md-2">
            <div class="panel panel-info">
                <div class="panel-heading">
                    Payment Details
                </div>
                <div class="panel-body">
                    <p><b>Student Name:</b> <?php echo htmlentities($data['studentregno']); ?></p>
                    <p><b>Course ID:</b> <?php echo htmlentities($data['course']); ?></p>
                    <p><b>Semester:</b> <?php echo htmlentities($data['semester']); ?></p>
                    <p><b>Department:</b> <?php echo htmlentities($data['department']); ?></p>
                    <p><b>Fixed Course Fee:</b> $<?php echo $data['totalFee']; ?> USD</p>

                    <!-- Stripe Payment Form -->
                    <form action="charge.php" method="POST">
                        <script
                            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                            data-key="<?php echo $stripe['publishable_key']; ?>"
                            data-amount="<?php echo $data['totalFee']*100; ?>"  <!-- Amount in cents -->
                            data-name="Course Registration"
                            data-description="Payment for Course ID <?php echo $data['course']; ?>"
                            data-email="<?php echo $_SESSION['login']; ?>"
                            data-locale="auto"
                            data-label="Pay Now"
                            data-allow-remember-me="false">
                        </script>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

<?php include('includes/footer.php');?>
<script src="assets/js/jquery-1.11.1.js"></script>
<script src="assets/js/bootstrap.js"></script>
</body>
</html>
