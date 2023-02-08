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
        $password=$_POST['userpassword'];
        $cpassword=$_POST['cpassword'];
        $code=$_POST['ccode'];

            if ($password==$cpassword){
                $subject = "Password Reset Status";
                $message = "Greetings From Shri Datt Hospital And Critical Care Center.
Congratulations Your Password Updated Successfully.Your Updated Password is $password
                
                
                
                
        Thanks And Regards,
Shri Datt Hospital And Critical Care Center.";
                $sender = "From: hiteshchavhan0811@gmail.com";
                mail($email, $subject, $message);
                mysqli_query($database,"UPDATE patient SET ppassword='$password' WHERE code='$code'");
             }
             else{
                $subject = "Password Reset Status";
                $message = "Greetings From Shri Datt Hospital And Critical Care Center.
Sorry Your Password Is Not Updated, Please Fill The Correct Details And Try Again.
                
                

                
                
                Thanks And Regards,
Shri Datt Hospital And Critical Care Center.";
                $sender = "From: hiteshchavhan0811@gmail.com";
                mail($email, $subject, $message);
             }
         header('location: login.php');
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
                    <p class="sub-text">Please Enter The Respective Details</p>
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
                <td class="label-td">
                    <label for="userpassword" class="form-label">Password: </label>
                </td>
            </tr>

            <tr>
                <td class="label-td">
                    <input type="Password" name="userpassword" class="input-text" placeholder="Password" required>
                </td>
            </tr>

            <tr>
                <td class="label-td">
                    <label for="cpassword" class="form-label">Confirm Password: </label>
                </td>
            </tr>

            <tr>
                <td class="label-td">
                    <input type="Password" name="cpassword" class="input-text" placeholder="Confirm Password" required>
                </td>
            </tr>

            <tr>
                <td class="label-td">
                    <label for="ccode" class="form-label">Verification Code: </label>
                </td>
            </tr>

            <tr>
                <td class="label-td">
                    <input type="password" name="ccode" class="input-text" placeholder="Verification Code" required>
                </td>
            </tr>


            

            <tr>
                <td>
                    <input type="submit" value="Reset Password" class="login-btn btn-primary btn">
                    <br>
                </td>
            </tr>
    
                        
                    </form>
        </table>

    </div>
</center>
</body>
</html>