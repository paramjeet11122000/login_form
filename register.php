<?php
@include 'congif.php';
if(isset($_POST['submit'])){
    $name=mysqli_real_escape_string($conn,$_POST['name']);
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $pass=md5($_POST['password']);
    $cpass=md5($_POST['cpassword']);

    $select="SELECT  * FROM user_form WHERE email='$email' && password='$pass' ";
    $result= mysqli_query($conn, $select);
    if(mysqli_num_rows($result)> 0){
        $error[]='user already exist!';
    }else{
        if($pass != $cpass){
            $error[]='pssword wrong';
        }else{
            $insert="INSERT  INTO user_form(name, email, password) VALUES('$name','$email', '$pass')";
            mysqli_query($conn, $insert);
            header('location:login.php');
        };
    };

};
 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register form
    </title>
    <!-- css custom file -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="form-container">
        <form action="" method="post">
            <h3>register here</h3>
            <?php
            if(isset($error)){
                foreach($error as $error){
                    echo'<span class="error-msg">'.$error.'</span>';
                };
            };
            ?>
            <input type="text" name="name" requied placeholder="enter your name">
            <input type="email" name="email" requied placeholder="enter your email">
            <input type="password" name="password" requied placeholder="enter your password">
            <input type="password" name="cpassword" requied placeholder="again enter your password">
            <p> already have an account?<a href="login.php" class="form-btn">log-in</a></p>
            <input type="submit" name="submit" value="register now" class="form-btn">
            
        </form>
       
        

    </div>

    
</body>
</html>