<?php
@include 'congif.php';
session_start();
if(isset($_POST['submit'])){
    $name=mysqli_real_escape_string($conn,$_POST['name']);
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $pass=md5($_POST['password']);
    $cpass=md5($_POST['cpassword']);

    $select="SELECT  * FROM user_form WHERE email='$email' && password='$pass' ";
    $result= mysqli_query($conn, $select);
    if(mysqli_num_rows($result)> 0){
    $row=mysqli_fetch_array($result);
    $_SESSION['user_name']=$row['name'];
    header('location:user.php');
    };
    $error[]='incorrect email or password';

};
 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login form
    </title>
    <!-- css custom file -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="form-container">
        <form action="" method="post">
            <h3>login here</h3>
            <?php
            if(isset($error)){
                foreach($error as $error){
                    echo'<span class="error-msg">'.$error.'</span>';
                };
            };
            ?>
            <input type="email" name="email" requied placeholder="enter your email">
            <input type="password" name="password" requied placeholder="enter your password">
            <p>don't have an account?<a href="register.php" class="form-btn">register-in</a></p>
            <input type="submit" name="submit" value="LOG-IN" class="form-btn">
            
        </form>
       
        

    </div>

    
</body>
</html>