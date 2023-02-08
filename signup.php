<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/animations.css">  
    <link rel="stylesheet" href="css/main.css">  
    <link rel="stylesheet" href="css/signup.css">
        
    <title>Sign Up</title>
    
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

include("connection.php");

$error = '';




if($_POST){

    $email=$_POST['newemail'];
    
    $result= $database->query("select * from webuser where email='$email';");
    
    if($result->num_rows==1){

        $subject = "Account Creation Update.";
    $message = "Greetings From Shri Datt Hospital And Critical Care Center.
Hello You are trying to create a new account using same Email Id.
You cannot create multiple account with same Email Id.
Try using another email id.

If this is not done by you please upadte your account password for security purpose.
    
    
    
    

    Thanks And Regards,
Shri Datt Hospital And Critical Care Center.";
    $sender = "From: hiteshchavhan0811@gmail.com";
    mail($email, $subject, $message);

    header("location: signup.php");
    }
    else{
        $code = rand(999999, 111111);

        $subject = "Email Verification Code";
        $message = "Greetings From Shri Datt Hospital And Critical Care Center.
    Your verification code is $code
        
        
        
        
    
        Thanks And Regards,
    Shri Datt Hospital And Critical Care Center.";
        $sender = "From: hiteshchavhan0811@gmail.com";
        mail($email, $subject, $message);
    
        
    
        $_SESSION["personal"]=array(
            'fname'=>$_POST['fname'],
            'lname'=>$_POST['lname'],
            'address'=>$_POST['address'],
            'nic'=>$_POST['nic'],
            'dob'=>$_POST['dob'],
            'newemail'=>$_POST['newemail'],
            'code' => $code
        );
    
    
        print_r($_SESSION["personal"]);
    
    
        header("location: create-account.php");
    }




}

?>




    <center>
    <div class="container">
        <table border="0">
            <tr>
                <td colspan="2">
                    <p class="header-text">Let's Get Started</p>
                    <p class="sub-text">Add Your Personal Details to Continue</p>
                </td>
            </tr>
            <tr>
                <form action="" method="POST" >
                <td class="label-td" colspan="2">
                    <label for="name" class="form-label">Name: </label>
                </td>
            </tr>
            <tr>
                <td class="label-td">
                    <input type="text" name="fname" class="input-text" placeholder="First Name" required>
                </td>
                <td class="label-td">
                    <input type="text" name="lname" class="input-text" placeholder="Last Name" required>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <label for="address" class="form-label">Address: </label>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <input type="text" name="address" class="input-text" placeholder="Address" required>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <label for="nic" class="form-label">Unique Id: </label>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <input type="text" name="nic" class="input-text" placeholder="Create Unique Id" required>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <label for="dob" class="form-label">Date of Birth: </label>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <input type="date" name="dob" class="input-text" required>
                </td>
            </tr>
            <tr>
                <form action="" method="POST" >
                <td class="label-td" colspan="2">
                    <label for="newemail" class="form-label">Email: </label>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <input type="email" name="newemail" class="input-text" placeholder="Email Address" required>
                </td>
                
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                </td>
            </tr>

            <tr>
                <td>
                    <input type="reset" value="Reset" class="login-btn btn-primary-soft btn" >
                </td>
                <td>
                    <input type="submit" value="Next" class="login-btn btn-primary btn">
                </td>

            </tr>
            <tr>
                <td colspan="2">
                    <br>
                    <label for="" class="sub-text" style="font-weight: 280;">Already have an account&#63; </label>
                    <a href="login.php" class="hover-link1 non-style-link">Login</a>
                    <br><br><br>
                </td>
            </tr>

                    </form>
            </tr>
        </table>

    </div>
</center>
</body>
</html>