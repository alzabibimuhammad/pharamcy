<?php 
    session_start();
    if($_SESSION['id']==1){
?>

<html>
    <head>
    <link rel="stylesheet" href="addmedcss.css">

    <style type="text/css">


    body{
            color: #404E67;
            background:gray;
            font-family: 'open sans',sans-serif;
        }



.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  padding: 12px 16px;
  z-index: 1;
}

.dropdown:hover .dropdown-content {
  display: block;
}
    </style> 

</head>
<body>


<div class="navbar">
    <div class="icon">
        <p class="logo" class="text" >PHARMACY SHOP MANGEMENT</p>
    </div>

    <div class="menu">
        <ul>
            <li><a class="dropbtn" href="http://localhost/Pharmacy/pharmacy.php">HOME</a></li>
            <li><a class="dropbtn" href="http://localhost/Pharmacy/pharmacy.php">LOGOUT</a></li>
            <li><a class="dropbtn" href="http://localhost/Pharmacy/user.php">Medicine</a></li>


<div class="dropdown">
<li> <button class="dropbtn" class="btn" > Admin</button> </li>

<div class="dropdown-content">
<a href="http://localhost/pharmacy/addmed.php">Add Medicien</a>
<a href="http://localhost/pharmacy/customeradmin.php">Customers</a>
<a href="http://localhost/pharmacy/editmed.php">Edit & Delete Medicien</a>

<a href="cart1.php">SELLS</a>

</div>
</div>
</ul>

</div>   
</div>
<br><br><br>
<div>
    <h1  id="ad" >ADD MEDICINE FORM</h1>
    </div>
<form action="addmed.php" method="POST" >

<br><br>

    <div class="addmedform">

        Stock : <input type="number" name="stock" required /><br><br>
        Medicine Name : <input type="text" name="medname" required /><br><br>
        Select Type : <Select name="type" required>
            <option selected >HAB</option>
            <option>DRINK</option>
            <option>MARHAM</option>
        </Select><br><br><br>
        Price Per item : <input type="number" name="priceperitem" required /><br><br><br>
        Unit : <input type="number" name="unit" required /><br><br>

        Description : <textarea style="width: 300px;height: 150px;" name="description" ></textarea><br><br>
        <input type="submit"  name="submit_m" value="submit" id="s1" />
        <input type="reset" value="Reset" id="r1" />
    </div>
</form>    


</body>
    

</html>



<?php 
    include "dbcon.php";

    
    $insert=0;
    $id=0;
    
    if(isset($_POST['submit_m']))
    {
    $stock=$_POST['stock'];$medname=$_POST['medname'];
    $type=$_POST['type'];$priceperitem=$_POST['priceperitem'];$unit=$_POST['unit'];$description=$_POST['description'];

        $insert=mysqli_query($conne,"insert into medicine
        values ('$id','$stock','$medname','$type','$priceperitem','$unit','$description')");
    
    
    
    if ($insert==false){
        echo "<h1>Error..</h1>";
    }
    
        else{ 
        echo "<p> ADDED.</p> \n ";
        echo "go to Medicine page:<a href='http://localhost/Pharmacy/user.php'>USER</a>";
        }

}


}
else{
    echo "Sorry This page is privet";

}
?>


<script>
    if(window.history.replaceState){
        window.history.replaceState(null,null,window.location.href);

    }
</script>  