<?php 
    session_start();
    if($_SESSION['id']==1){
?>

<html>
    <head>

    <link rel="stylesheet" href="cssuser.css"/>

    

<style>
    *{
        margin: 0;
        padding: 0;

    }
    .styled-table {
        background-color: white;
    border-collapse: collapse;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 1500px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    margin-left: 50px;
    
}


.styled-table thead tr {
    background-color: #009879;
    color: #ffffff;
    text-align: left;
}
.styled-table tbody tr{
    text-align: left;



}

.styled-table th,
.styled-table td {
    padding: 12px 15px;
}

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
#bu{
    width: 60px;
    height: 30px;
    background-color: #009879;
    color: white;
    border-radius: 50px;

}
    </style>    

    
        
   


    </head>
    <body class="body1">

        <form method="POST" action="addmed.php"  >
        <div class="navbar">
            <div class="icon">
                <p class="logo" class="text" >PHARMACY SHOP MANGEMENT</p>
            </div>

            <div class="menu">
                <ul>
                    <li><a class="dropbtn" href="http://localhost/Pharmacy/pharmacy.php">HOME</a></li>
                    <li><a class="dropbtn" href="http://localhost/Pharmacy/pharmacy.php">LOGOUT</a></li>
                    <li><a class="dropbtn" href="http://localhost/Pharmacy/user.php">USER</a></li>


<div class="dropdown">
 <li> <button class="dropbtn" class="btn" > Admin</button> </li>
 
  <div class="dropdown-content">
    <a href="http://localhost/pharmacy/addmed.php">Add Medicine</a>
    <a href="http://localhost/pharmacy/editmed.php">Edit & Delete Medicine</a>

    <a href="http://localhost/pharmacy/customeradmin.php">Customers</a>
    <a href="cart1.php">SELLS</a>

  </div>
</div>
</ul>

</div>   


        </div>
        </form>               
        <div>
    <pre>    
        
    







    <table class="styled-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>User Name</th>
            <th>Password</th>
            <th>Email</th>
            <th>Place</th>
            <th>Action</th>
            <th></th>


        </tr>
    </thead>
    <tbody>
        <?php 
            include "dbcon.php";
            $sql="select * from signup";
            $result= $conne->query($sql);
            if($result->num_rows>0){
                while($row=$result->fetch_assoc()){
                    echo "<tr><td >" . $row["id"] . "</td><td>".$row["username"] . "</td><td>".$row["password"] . "</td><td>".$row["email"] . "</td><td>".$row["place"] . "<td> <form method='POST' action='editordelbybottom.php' > <input type ='submit' id='bu' value='edit' name='edit' /><input type ='hidden' value='".$row['id']."' name='snnr'/></form><form method='POST' action='customeradmin.php'> <input type ='submit' id='bu'  value='Delete' name='del' /> </td>" . "<td> <input type ='hidden' value='".$row['id']."' name='snr'  /> </td></form> </tr>" ;
                }

            }
            else{

                echo "No result";
            }
        ?>

    </tbody>
</table>
</pre>
        </div>
        </form>

       <div style="margin-top:200px ;" > 
       <form action="customeradmin.php" method="POST" class="updatecss" >     
        <input  type="text" placeholder="Delete Or Edit Customer Enter The name" name="delc"/>
        <input type="submit" name="delcb" value="search and delete" style="border-radius: 100px;width: 110px; margin-left: 20px; " />

        <h3 style="color: yellow;margin-left: 100px; margin-top: 30px;" >TO EDIT : You have to put the name of the Customer in the textarea in the above </h3>
            <br><br> <input type='text' placeholder='name' name='n'><br>
                <input type='password' placeholder='password' name='p'><br>
                <input type='email' placeholder='email' name='e' ><br>
                <input type='text' placeholder='place' name='pl' >

        <input type='submit'  name='update25' value='update' style="width: 50px; margin-bottom: 100px; border-radius:100px; text-align: center; margin-left: 30px;">
        </form>
       </div>



        <?php 
            include "dbcon.php";

            if(isset($_POST['delcb'])){ 
                $sq="select * from signup where id = '1' ";
                $re=$conne->query($sq);
                $r=$re->fetch_assoc();
                $admin=$r['username'];
            if(!empty($_POST['delc']) and $_POST['delc']!=$admin ){

   
            $name100=$_POST['delc'];
            $sql3="select * from signup where username='".$name100."' ";
            $result= $conne->query($sql3);
            $row=$result->fetch_assoc();
            if($result->num_rows>0){
            echo "<h1>".$row['id']."+".$row['username']."+".$row['password']."</h1>";
            $sqld = "delete from signup where username='".$name100."'  ";
            $delete=mysqli_query($conne,$sqld);
            
            if($delete){
            echo $name100.".DELETED";

            }

            else{
                echo "NO result";
                
            }
            
        }}
            }
            ?>

            <?php
            if(isset($_POST['update25'])){
            if(!empty($_POST['delc'])){
        
            $namee2=$_POST['delc'];
            $sqlupdate="select * from signup where username='".$namee2."' ";
            
            $result1= $conne->query($sqlupdate);
            $row3=$result1->fetch_assoc();

            $idf=$row3['id'];

            if($result->num_rows>0){
                $namen=$_POST['n'];
                $namep=$_POST['p'];
                $nameee=$_POST['e'];
                $namepl=$_POST['pl'];

                $sqlup= "update signup set username = '$namen', password='$namep',email='$nameee',place='$namepl' where id='$idf'  ";
                $update=mysqli_query($conne,$sqlup);

                if($update){
                    echo $namen."  UPDATED";

                }
                else{
                    echo "ERROR NAME IS ALREADY EXIST ";
                }
                

            }}}

        ?>

    
<script>
    if(window.history.replaceState){
        window.history.replaceState(null,null,window.location.href);

    }
    </script>  

    </body>
</html>

<?php }
else{
    echo "Sorry This page is privet";

}
?>

<?php 

if(isset($_POST['del'])){
    $_SESSION['id_for']=$_POST['snr'];
    if($_SESSION['id_for']!=1){
    $del="delete from signup where id='".$_SESSION['id_for']."' ";
    $resa=mysqli_query($conne,$del);
    if($resa){
        echo "<br><h1 style='color:red;' >DELETED</h1>";

    }
}
    else{
        echo "<h1 style='color:red;' >..Sorry you can't delete the ADMIN..</h1>";

        }


}
?>

<?php 

if(isset($_POST['done'])){
    $un=$_POST['username'];
    $pass=$_POST['password'];
    $email=$_POST['email'];
    $place=$_POST['place'];

    $up="update signup set username='$un',password='$pass',email='$email',place='$place' where id='".$_SESSION['id_for_un']."' ";
    $res=mysqli_query($conne,$up);
    if ($res){

        echo"<br><h1 style='color:red;' >UPDATED</h1>";
    }


}







?>
  