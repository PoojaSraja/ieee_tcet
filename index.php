<?php

include 'config.php';
$msg = "";
if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, md5($_POST['password']));
    // echo $password;

    $sql = "SELECT * FROM login_signup WHERE email='{$email}' AND password='{$password}'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    if($row){
        if($password === $row["password"]){
            // header("Location: http://192.168.33.76:8080/");
            header("Location: https://www.youtube.com/");
        }
    }else{
        $msg = "<div class='alert alert-danger'>Email or password do not match.</div>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link  href="style.css" rel="stylesheet">
    <meta name="keywords"
        content="Login Form" />
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
                        <?php echo $msg; ?>
                        <form action="index.php" method="POST">
                            <h2>Login</h2>
                            <label for="uname"><b>Email</b></label>
                            <input type="text" placeholder="Enter Email" name="email" required>

                            <label for="psw"><b>Password</b></label>
                            <input type="password" placeholder="Enter Password" name="password" required>
                            <button name="submit" type="submit" value="login">Login</button>
                            <p><center>Don't have an account? <a href="login.php">Register</a></center> </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

                        
</body>
</html>
