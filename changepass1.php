<html>
    <head>


        <style>
            *{
                margin: 0;
                padding: 0;

            }
            .form{
                width: 500px;
                color: white;
                height: 380px;
                background: linear-gradient(to top,rgba(0,0,0,0.5)50%,rgba(0,0,0,0.5)50%);
                border-radius: 10px;
                padding: 25px;

            }
            .form input{
                color: white;
                background-color: green;
                width: 400px;
                height: 30px;
            }
            

        </style>

    </head>
</html>

<?php 
    include "dbcon.php";
if(isset($_POST['submit_l'])){
    $name=$_POST['username'];
    $passg=$_POST['pass'];

    $sql25="select * from signup where username='".$name."'";

    

    $result25= $conne->query($sql25);

    $rowd=$result25->fetch_assoc();

    if($passg==$rowd['password']){

    $idff=$rowd['id'];

     
    
    echo "<form class='form' action='pharmacy.php' method='POST' >
    <input type='hidden' name='id' value='".$idff."' /><br><br><br>

    New Name:<input type='text' name='username'/><br><br><br>
    New Password:<input type='password' name='password'/><br><br><br>
    New Email:<input type='email' name='email'/><br><br><br>
    New Place:<input type='text' name='place'/><br><br>
    <input type='submit' name='submit' style='border-radius: 50px; width:50px; margin-left:200px;' value='update'/>
    </form>
    
    "
    ;
    }
    else{
        echo"<h1 style='color:red;'>error in user name or password</h1>";

    }

    
}






    
?>


