<?php

    //learn from w3schools.com

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


    if($_POST){
        if(isset($_POST["booknow"])){
            $apponum=$_POST["apponum"];
            $scheduleid=$_POST["scheduleid"];
            $date=$_POST["date"];
            $scheduleid=$_POST["scheduleid"];

            $subject = "Appointment Booking Successful";
            $message = "Congratulations ,Your Oppointment With Dr.Shrikant Gote is scheduled Successfully.
Your appointment number is $apponum. 
For Complete details about appointment please visit the MY_BOOKINGS panel in website.






        Thanks And Regards,
Shri Datt Hospital And Critical Care Center.";
            $sender = "From: hiteshchavhan0811@gmail.com";
            mail($useremail, $subject, $message);

            $subject = "Greetings From Shri Datt Hospital And Critical Care Center";
            $message = "Congratulations,Your Appointment is confirmed by the doctor.
In case you are not able to visit the hospital you can consult with the doctor through the video conferencing.
Video Conferencing Link : https://meet.google.com/oea-tvxn-kkb .
Please inform us if you are want to start video conferening before joining the meeting on Mobile Number : 9923563591 .






        Thanks And Regards,
Shri Datt Hospital And Critical Care Center.";
            $sender = "From: hiteshchavhan0811@gmail.com";
            mail($useremail, $subject, $message);

            $sql2="insert into appointment(pid,apponum,scheduleid,appodate) values ($userid,$apponum,$scheduleid,'$date')";
            $result= $database->query($sql2);
            //echo $apponom;
            header("location: appointment.php?action=booking-added&id=".$apponum."&titleget=none");

        }
    }
 ?>