<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/animations.css">  
    <link rel="stylesheet" href="css/main.css">  
    <link rel="stylesheet" href="css/login.css">
        
    <title>Reset Password</title>

    
    
</head>
<body>
    <?php

    //learn from w3schools.com
    //Unset all the server side variables

    session_start();

    $_SESSION["user"]="";
    $_SESSION["usertype"]="";
    
    // Set the new timezone
    date_default_timezone_set('Asia/Kolkata');
    $date = date('Y-m-d');

    $_SESSION["date"]=$date;
    

    //import database
    include("connection.php");

    



    if($_POST){
        //print_r($_POST);
        $email=$_POST['useremail'];


        $code = rand(999999, 111111);
        $insert_data = "UPDATE patient SET code='$code' WHERE pemail='$email'";
        $data_check = mysqli_query($database, $insert_data);

        $subject = "Email Verification Code";
        $message = "Your verification code is $code";
        $sender = "From: hiteshchavhan0811@gmail.com";
        mail($email, $subject, $message);

         header('location: send_otp.php');
    }
    ?>





    <center>
    <div class="container">
        <table border="0" style="margin: 0;padding: 0;width: 60%;">
            <tr>
                <td>
                    <p class="header-text">Reset Password</p>
                </td>
            </tr>
        <div class="form-body">
            <tr>
                <td>
                    <p class="sub-text"></p>
                </td>
            </tr>
            <tr>
                <form action="" method="POST" >
                <td class="label-td">
                    <label for="useremail" class="form-label">Email: </label>
                </td>
            </tr>
            <tr>
                <td class="label-td">
                    <input type="email" name="useremail" class="input-text" placeholder="Email Address" required>
                </td>
            </tr>

            <tr>
                <td>
                    <p class="header-text">             </p>
                </td>
            </tr>
            
            <tr>
                <td>
                    <input type="submit" value="Send OTP On Email" class="login-btn btn-primary btn">
                    <br>
                </td>
            </tr>

    
                        
                    </form>
        </table>

    </div>
</center>
</body>
</html>