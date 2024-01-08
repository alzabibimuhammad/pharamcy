<!-- editordelbybottom.php -->

<?php 
    session_start();
    include "dbcon.php";
    if(isset($_POST['edit'])){
       $_SESSION['id_for_un']=$_POST['snnr'];
    
}



if(isset($_POST['edit'])){
?>

<html>
<head>
    <style>
.updatecss input {
    background-color:#009879;
    width: 250px;
    height: 50px;
    text-align: left;
    color: white;
    margin-left: 100px;


}
::placeholder{
    color: white;

}
</style>
</head>

    <body style="background-color: gray; color: white; " >
    <form action="customeradmin.php" method="POST" class="updatecss" >     

        <br>
        <br><br><br><br>

        
                User Name:<input type='text'  name='username' required ><br><br><br><br>
                Password:<input type='password' name='password' required ><br><br><br><br><br>
                Email:<input type='email' name='email' required ><br><br><br><br>
                Place:<input type='text' name='place' required ><br><br><br><br>
                
                <input type="submit" name="done" value="Edit" style="width: 60px; text-align: center;" >

        </form>
       
    </body>
</html>

<?php }?>

