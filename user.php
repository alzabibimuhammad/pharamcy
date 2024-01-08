<?php
$servername = "localhost";
$username = "root";
$password = "";
$conne = mysqli_connect($servername, $username, $password,'Pharmacy') ;
if ($conne==false) {
die("Connection failed: ");
}

session_start();


if (isset($_POST['submit_l'])){

$username=$_POST['username'];

$pass_l=$_POST['pass_l'];

$sql = "select * from signup where username='".$username."' AND password='".$pass_l."' ";
$result =mysqli_query($conne,$sql);

   if(mysqli_num_rows($result)==1){
    $rown=$result->fetch_assoc();   
    $_SESSION["username"]=$_POST['username'];
    $_SESSION["place"]=$rown['place'];
   }}
   if($_SESSION["username"]){

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
    margin-top: 100px;    
    border-collapse: collapse;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width:1500px;
    margin-left: 50px;
    background-color: white;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
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

.styled-table input{
    width: 300px;
    height: 25px;

}

.addto input{
    width: 300px;
    height: 50px;
    margin-left: 200px;
    background-color: blanchedalmond;

}

#edit{
    width: 60px;
    height: 30px;
    background-color: #009879;
    color: white;
    border-radius: 50px;

}


    </style>    

    
        
   


    </head>
    <body class="body1">

        <form method="POST" action="changepass.php"  >
        <div class="navbar">
            <div class="icon">
                <p class="logo" class="text">PHARMACY SHOP MANGEMENT</p>
            </div>

            <div class="menu">
                <ul>
                    <li><a class="dropbtn" href="http://localhost/Pharmacy/pharmacy.php">LOGOUT</a></li>
                    <li><a class="dropbtn" href="http://facebook.com">CONTACT_US</a></li>


                    <?php
                    include "dbcon.php";

                    $sqlch="select * from signup where username = '".$_SESSION['username']."'";
                    $check = $conne->query($sqlch);
                    $rowch = $check->fetch_assoc();
                    $_SESSION['id']=$rowch['id'];
                    $idch=1;
                    if ($rowch['id']==1){
                    ?> 
<div class="dropdown">
 <li> <button class="dropbtn" class="btn" > Admin</button> </li>
 
  <div class="dropdown-content">
    <a href="http://localhost/pharmacy/addmed.php"> Add Medicine</a>
    <a href="http://localhost/pharmacy/editmed.php">Edit & Delete Medicine</a>
    <a   href="http://localhost/pharmacy/customeradmin.php">Customers</a>
    <a  href='cart1.php'>Sells</a>


    
  </div>
</div>

</div>   
</form>    

<form action="user.php" method="POST">
<?php }
    else{

        echo "<li><a class='dropbtn' href='changepass.html' >ChangeUserDetails</a></li>";
        echo"<li><a class='dropbtn' href='cart1.php'>YourCart</a></li>";


    }
?>            

</ul>
</form>
        </div>
        <div>
    <pre>    
    
        
    





    <h1 style="margin-top: 70px;" >Medicines</h1> 
    <table class="styled-table"  >
    <thead>
        <tr>
            <th>Code</th>
            <th>Name</th>
            <th>Type</th>
            <th>Unit</th>
            <th>PricePerItem</th>
            <th>Description</th>
            <th>Stock</th>
            <th>Action</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <tr>

            <?php 

                $sql2="select * from medicine";
                $result= $conne->query($sql2);
                if($result->num_rows>0){
                      while($row = $result->fetch_assoc()){
                                echo "<tr><td>" . $row["code"] . "</td><td>".$row["medname"] . "</td><td>".$row["type"] . "</td><td>".$row["unit"] ."</td><td>".$row["priceperitem"]. "$</td><td>".$row["description"] ."</td>";
                                if ($rowch['id']==1){
                                   echo "<td>".$row["stock"]."</td>";
                                   echo "<td id='s' > <form method='POST' action='editmedbybuttom.php' > <input type ='submit' value='edit' name='edit' id='edit' /> <input type ='hidden' value='".$row['code']."' name='snr'  /></form><form method='POST' action='user.php'> <input type ='submit' value='Delete' name='del' id='edit' /> </td>" . "<td> <input type ='hidden' value='".$row['code']."' name='snr'  /> </td></form></tr>";

                                }
                                
                                //else{
                                //         echo "<td></td><td><form method='POST' action='user.php' ><input type='submit' value='ADD TO CART' name='atc' style='width:100px;background-color: yellow;color:black;' id='edit'><input type='hidden' value='".$row['code']."' name='mn' ></form></td></tr>";

                                // }


                        }}
                        else{
            
                            echo "No result";
                        }
                    
                       ?> 

    </tbody>
</table>
</pre>
<?php


    if($rowch['id']!=1){
?>
        </div>

        <!-- searchmed.php -->
        <form action="user.php" class="addto" method="POST"   >
            <input type="text" style="margin-left:100px ;margin-top: 100px; width:430px;"  name="searchs" placeholder="ENTER THE NAME OF THE MEDICINE TO SEARCH IF IT AVAILABLE."/>
            <input type="submit" value="search" name="searchb" style="background-color: yellow;width: 60px; border-radius: 50px; " />            


        </form>
        <?php 
        include "dbcon.php";
        if(isset($_POST['searchb'])){
            $mname=$_POST['searchs'];
            $mysql="select * from medicine where medname= '".$mname."' ";
            $myresult= $conne->query($mysql);
    
            if($myresult->num_rows>0){
            $myrow=$myresult->fetch_assoc();
        
            echo "<h2 style='color:Yellow;' >Medicine Is Available :".$myrow['medname']." \n and the quantity is:".$myrow['unit']."</h2>";

    }
    else{
        echo "<h2 style='color:red;' >Medicine is not founded</h2>";

    }

}
?>


        
        


        <form action="user.php" class="addto"  method="POST" >
        <br><br><br><br><br><br><br><input type="text" name="medname20" placeholder="Medname"  /><br>
            <input type="text" name="unit20" placeholder="Unit" /><br><br>

            <input type="submit" name="submited" style="background-color: yellow;width: 100px; border-radius: 50px; margin-left: 290px;" value="AddToCart" />


           
            
        </form>
        <?php 
    $id=0;
    $un=$_SESSION["username"];
    if(!empty($_POST['medname20']) and !empty($_POST['unit20']) ){

    if(isset($_POST['submited'])){

    $medname=$_POST['medname20'];
    $unit=$_POST['unit20'];
    
    $sql = "select * from medicine where medname='".$medname."' ";
    $result= $conne->query($sql);
    $row = $result->fetch_assoc();

    if($unit>$row['unit']){
        echo "<h1 style='color:red;' >Error in unit</h1>";

    }
    else{

    $ppi=$row['priceperitem'];
    $total = $ppi * $unit;

    if($result){    

    if (isset($_POST['submited'])){
        
        $insert=mysqli_query($conne,"insert into addtocart
        values ('$id','$un','$medname','$unit','$ppi','$total')");
        
        if($insert){
        echo "<h1 style='color:red;' >Added</h1>";
            $conne->close();



        }


    }}
    }
        }
        }



    ?>

    

    </body>
</html>
<?php 
}

    if(isset($_POST['del'])){
        $_SESSION['id_med_p']=$_POST['snr'];

        $delete2="delete from medicine where code='".$_SESSION['id_med_p']."' ";
        $res=mysqli_query($conne,$delete2);
        if($res){
            echo "<br>DELETED<br>";

        }}

        if(isset($_POST['update25'])){
            $stock=$_POST['stock'];
            $medname=$_POST['medname'];
            $type=$_POST['type'];
            $ppi=$_POST['ppi'];
            $unit=$_POST['unit'];
            $description=$_POST['description'];
    
            $sql= "update medicine set stock='$stock' ,medname = '$medname', type='$type',priceperitem='$ppi',unit='$unit',description='$description' where code='".$_SESSION['id_med']."'  ";
            $update1=mysqli_query($conne,$sql);
            echo "<br>";
            if($update1){
                echo "UPDATED........";
    
            }
    
        }


        //editmed.php
        if(isset($_POST['delcb'])){ 
            if(!empty($_POST['delc'])){
   
            $name=$_POST['delc'];
            $sql3="select * from medicine where medname='".$name."' ";
            $result= $conne->query($sql3);
            $row=$result->fetch_assoc();
            if($result->num_rows>0){
            echo "<h1>".$row['code']."+".$row['medname']."+".$row['type']."</h1>";
            $sqld = "delete from medicine where medname='".$name."'  ";
            $delete=mysqli_query($conne,$sqld);
            
            if($delete){
            echo $name.".DELETED";
        }

            else{
                echo "NO result";
                
            }
            
        }
            }}
            

            if(isset($_POST['update25'])){
                if(!empty($_POST['delc'])){
            
        
            $namee=$_POST['delc'];
            $sqlupdate="select * from medicine where medname='".$namee."' ";
            
            $result1= $conne->query($sqlupdate);
            $row3=$result1->fetch_assoc();
            $idf=$row3['code'];

            if($result1->num_rows>0){
                $stock=$_POST['stock'];
                $medname=$_POST['medname'];
                $type=$_POST['type'];
                $ppi=$_POST['ppi'];
                $unit=$_POST['unit'];
                $description=$_POST['description'];


                echo $stock.$medname.$type.$ppi.$unit.$description;

                $sqlupp= "update medicine set stock='$stock' ,medname = '$medname', type='$type',priceperitem='$ppi',unit='$unit',description='$description' where code='$idf'  ";
                $update1=mysqli_query($conne,$sqlupp);

                if($update1){
                    echo $medname."  UPDATED";

                }
                else{
                    echo "ERROR";
                }
                

            }}}


}

else{
        echo "<h1 class='content' style='color:red;'  > Error in Username or Password.............. \n </h1>";
        echo "<h1> Please try again</h1>";
echo "<a href='http://localhost/Pharmacy/pharmacy.php'>
<button style='    width: 100px;
height: 40px;
background: green;
border: 2px solid green;
margin-top: 13px;
color: white;
font-size: 15px;
border-bottom-right-radius:5px ;
border-bottom-right-radius:5px ;'>Home </button></a>";
echo "<a href='http://www.google.com'>
<button style='width: 100px;
height: 40px;
background: green;
border: 2px solid green;
margin-top: 13px;
color: white;
font-size: 15px;
border-bottom-right-radius:5px ;
border-bottom-right-radius:5px ;'>Exit </button></a>";
}

?> 

<script>
    if(window.history.replaceState){
        window.history.replaceState(null,null,window.location.href);

    }
</script>  




  
