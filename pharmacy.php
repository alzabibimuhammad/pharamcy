<?php 
  include "dbcon.php";
  session_start();
  $_SESSION['username']="";
?>

<html>
    <head>
        <title>PHARMACY</title>
        <link rel="stylesheet" href="csshome.css">

        <style>
.flip-box {
   background-color: transparent;
   width: 300px;
   height: 200px;
   perspective: 1000px;
 }
 
 .flip-box-inner {
   position: relative;
   width: 100%;
   height: 100%;
   text-align: center;
   transition: transform 0.8s;
   transform-style: preserve-3d;
 }
 
 .flip-box:hover .flip-box-inner {
   transform: rotateY(180deg);
 }
 
 .flip-box-front, .flip-box-back {
   position: absolute;
   width: 100%;
   height: 100%;
   -webkit-backface-visibility: hidden;
   backface-visibility: hidden;
 }
 
 .flip-box-front {
   background-color:green ;
   color: white;
 }
 
 .flip-box-back {
   background-color:white;
   color: black;
   transform: rotateY(180deg);
 }
        </style>

    </head>
<body >


  



    <div class="main">
        <div class="navbar">
            <div class="icon">
                <p class="logo" style="padding-right: 100px;" >PHARMACY_SHOP_MANGEMENT_SYSTEM</p>
            </div>
           
    <img src="med2.jpg" style="width: 500px;height: 400px; float:right; margin-top: 100px;margin-right: 100px;" id="changimg"/>
    <script>
             var myImage=document.getElementById("changimg");
             var imageArray=["med2.jpg","med.jpg"];
             var imageIndex=0;
             function chageImage(){
               myImage.setAttribute("src",imageArray[imageIndex]);
               imageIndex++;
               if(imageIndex>=imageArray.length){
                 imageIndex=0;
               }
             }
             setInterval(chageImage,1500);

           </script>

           
           <div class="content">
            <pre> 


            <div class="flip-box">
    <div class="flip-box-inner">
      <div class="flip-box-front">
       <br><h1 style="font-size: 50px;" align="center"><i><b>ABOUT US</b></i></h1>
      </div>
      <div class="flip-box-back">
        <h1 style="font-size: larger;"align="center">Muhammad alzabibi <br><br>ID:201910452 </h1>
      </div>
    </div>
  </div><h1><br>
ONLINE SHOPPING & <br>        PHARMACY 
               </h1>
            </pre>
               <p class="par">
                   This website is created for helping people <br>
                   and make it easy for them to buy any medicine <br>
                   from there home online
               </p>
               <button class="cn"><a href="http://aiu.edu.sy">JOIN US</a> </button> 
           </div>
           <form method="POST" action="user.php">
            <div class="form">
                <h2>
                    Login Here
                </h2>
                <input type="text" name="username" placeholder="User Name" />
                <input type="password" name="pass_l" placeholder="Enter your password"/>

                <button name="submit_l" type="submit"  class="btnn" >Login</button>
                <p class="link">Don't have an account <br>
                <a href="http://localhost/pharmacy/signup.html">Sign up here</a></p>
            </div>


            </form>
        </div>  
    </div>  
</body> 
</html>


<?php

if(isset($_POST['submit'])){
    $id=$_POST['id'];
    $usname=$_POST['username'];
    $passl=$_POST['password'];
    $emaile=$_POST['email'];
    $placee=$_POST['place'];

    $sqlup= "update signup set username = '$usname', password='$passl',email='$emaile',place='$placee' where id='$id' ";
    $update=mysqli_query($conne,$sqlup);

    if($update){
        echo $usname."  UPDATED";

    }
    else{
        echo "ERROR";
    }

}?>


<?php
//signup

$id_l=0;


if(isset($_POST['submit_l']))
{
    $pass_l=$_POST['pass_l'];$fname=$_POST['fname'];
    $place=$_POST['place'];$email=$_POST['email'];

    $insert=mysqli_query($conne,"insert into signup
    values ('$id_l','$fname','$pass_l','$email','$place')");



if ($insert==false){
    echo mysqli_error($conne)."\n";
    echo "<h1>User name is already exist..".$fname." \n please change the username</h1>";
}

    else{ 
    echo "<p> SIGHNUP IS DONE.</p> \n ";
    }

}
?>

<script>
    if(window.history.replaceState){
        window.history.replaceState(null,null,window.location.href);

    }
    </script>  