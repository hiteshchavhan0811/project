<?php

    session_start();

    if(isset($_SESSION["user"])){
        if(($_SESSION["user"])=="" or $_SESSION['usertype']!='p'){
            header("location: ../login.php");
        }else{
            $useremail=$_SESSION["user"];
        }

    }else{
        header("location: ../login.php");
    }
    

    //import database
    include("../connection.php");
    $userrow = $database->query("select * from patient where pemail='$useremail'");
    $userfetch=$userrow->fetch_assoc();
    $userid= $userfetch["pid"];
    $username=$userfetch["pname"];

    
    if($_GET){
        //import database
        include("../connection.php");
        $id=$_GET["id"];
        $result001= $database->query("select * from patient where pid=$id;");
        $email=($result001->fetch_assoc())["pemail"];

        $subject = "Account Deletion Status";
                $message = "Greetings From Shri Datt Hospital And Critical Care Center.
Your Account is deleted sucessfully.
                
                
                
                
        Thanks And Regards,
Shri Datt Hospital And Critical Care Center.";
                $sender = "From: hiteshchavhan0811@gmail.com";
                mail($email, $subject, $message);

        $sql= $database->query("delete from webuser where email='$email';");
        $sql= $database->query("delete from patient where pemail='$email';");


        //print_r($email);
        header("location: ../logout.php");
    }


?>