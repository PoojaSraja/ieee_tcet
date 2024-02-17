<?php
include 'config.php';
$msg = "";
if (isset($_POST['submit'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, md5($_POST['password']));
    $cpsw = mysqli_real_escape_string($conn, md5($_POST['cpsw']));

    if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM login_signup WHERE email='{$email}'")) > 0) {
        $msg = "<div class='alert alert-danger'>{$email} - This email address already exists.</div>";
    } else{
        if ($password === $cpsw){
            $sql = "INSERT INTO login_signup (name, email, password) VALUES ('{$name}', '{$email}', '{$password}')";
            $result = mysqli_query($conn, $sql);
                
            if ($result) {
                $msg = "<div class='alert alert-info'>Account successfully created</div>";
            } else {
                $msg = "<div class='alert alert-danger'>Something went wrong.</div>";
            }
        }else{
            $msg = "<div class = 'alert alert-danger'>Password and Confirm Password do not match</div>";
        }
    }
}   
$conn->close();
?>


<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link  href="style.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords" content="Login Form" />
    <!-- //Meta tag Keywords -->
    <link href="//fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <!--/Style-CSS -->
    <!-- <link rel="stylesheet" href="css/style.css" type="text/css" media="all" /> -->
    <!--//Style-CSS -->
    <script src="https://kit.fontawesome.com/af562a2a63.js" crossorigin="anonymous"></script>
</head>

<body>
    <section class="w3l-mockup-form">
        <div class="container">
            <div class="workinghny-form-grid">
                <div class="main-mockup">
                    <div class="content-wthree">
                        <h2>Register Now</h2>
                        <?php echo $msg; ?>
                        <form action="" method="post">
                            <label for="name"><b>Name</b></label>
                            <input type="text" placeholder="Enter Username" name="name" value="<?php if (isset($_POST['submit'])) { echo $name;}?>" required>

                            <label for="email"><b>Email</b></label>
                            <input type="email" placeholder="Enter Email" name="email" value="<?php if (isset($_POST['submit'])) {echo $email;}?>" required>

                            <label for="password"><b>Password</b></label>
                            <input type="password" placeholder="Enter Password" name="password" required>

                            <label for="cpsw"><b>Confirm Password</b></label>
                            <input type="password" placeholder="Enter Password Again" name="cpsw" required>

                            <button name="submit" type="submit">Register</button>
                            <p><center>Have an account? <a href="index.php">Login</a></center> </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- <script src="js/jquery.min.js"></script> -->
</body>
</html>
