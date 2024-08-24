<?php
// Include necessary files
include('home_header.php');
include('config.php');

// Handle form submission
if(isset($_POST["save"])) {
    // Sanitize user inputs
    $uname = mysqli_real_escape_string($mysqli, $_POST["uname"]);
    $pass = mysqli_real_escape_string($mysqli, $_POST["pass"]);

    // Prepare SQL query
    $sql = "SELECT * FROM recipient WHERE uname='$uname' AND pass='$pass'";
    
    // Execute the query
    $result = mysqli_query($mysqli, $sql);

    // Check if login is successful
    if (mysqli_num_rows($result) == 1) {
        // Start session
        session_start();

        // Fetch user data
        $user_data = mysqli_fetch_assoc($result);

        // Store user data in session variables
        $_SESSION["uname"] = $user_data['uname'];
        $_SESSION["rid"] = $user_data['id'];
        $_SESSION["rname"] = $user_data['rname'];
        $_SESSION["bgroup"] = $user_data['bgroup'];
        $_SESSION["organ"] = $user_data['organ'];

        // Redirect to recipient matching list page
        header("Location: recipient_matching_list.php");
        exit();
    } else {
        // Display error message for invalid login
        $error_message = "Invalid Username/Password";
    }
}
?>

<!-- HTML form for recipient login -->
<form action="" method="post" enctype="multipart/form-data">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-7">
                <img src="img/21.jpg" class="img-fluid" alt="">
            </div>
            <div class="col-sm-5">
                <div class="text-center mt-2 pb-2">
                    <h3>Recipient Login</h3>
                </div>
                <div class="row">
                    <div class="col-sm-4 pb-2">
                        User Name
                    </div>
                    <div class="col-sm-8 pb-2">
                        <input type="text" class="form-control" name="uname">
                    </div>
                    <div class="col-sm-4 pb-2">
                        Password
                    </div>
                    <div class="col-sm-8 pb-2">
                        <input type="password" class="form-control" name="pass">
                    </div>
                    <div class="col-sm-12 pb-2 text-center">
                        <span class="text-danger"><?php if(isset($error_message)) { echo $error_message; } ?></span>
                    </div>
                    <div class="col-sm-12 pb-2 text-center">
                        <input type="submit" value="Login" class="btn btn-success shadow-none" name="save">
                        <a href="recipient_register.php" class="btn btn-success ml-2">Sign Up</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<?php
// Include footer file
include('home_footer.php');
?>
