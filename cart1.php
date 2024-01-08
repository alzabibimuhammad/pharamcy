
<?php
session_start();



?>

<html>
<link rel="stylesheet" href="cssuser.css">

<head>
<style>
    *{
        margin: 0;
        padding: 0;

    }


.icon{
    width: 200px;
    float: left;
    height: 70px;
}
.logo{
    padding-inline-end: 1600px;

    border-style: solid;
    background-color: green;
    color: white;
    font-size: 35px;
    font-family: Arial;
    float: left;

}

    .styled-table {
    background-color: white;
    border-collapse: collapse;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 1500px;
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

.updatecss input {
    background-color:#009879;
    width: 250px;
    height: 50px;
    text-align: left;
    color: white;
    margin-left: 100px;


}
::placeholder{
    color: black;

}




.btnn{
    
    width: 240px;
    height: 40px;
    color: white;
    font-weight: bold;
    background-color: green;
    border: none;
    margin-top: 20px;
    font-size: 18px;
    border-radius: 10px;
    transition: 0.4s ease ;
}
.btnn:hover{
    background-color: goldenrod;
}

    </style>  
</head>
<body>
<div class="icon"   >
        <p class="logo" class="text" >Sells</p></div>
</div>
<pre>
<form method="POST" action="cart1.php" ><?php if($_SESSION['id']==1){ ?>




<input type="text" name="searchcust" placeholder="Customer name" style="color: black;" /><input type="submit" value="search" style="background-color: yellow;" name="searchcus"></form>
<?php }?>





<div >
<table class="styled-table"  >
<thead>
        <tr>
            <th>ID</th>
            <th>User Name</th>
            <th>Medicine Name</th>
            <th>Unit</th>
            <th>Price Per Item</th>
            <th>Total</th>
            <?php if($_SESSION['id']!=1){?>
            <th>Action</th> 
            <?php 
            }
                if($_SESSION['id']==1){
            ?>
            <th>Date</th>

            <?php } ?>


        </tr>
    </thead>
    <tbody>
        <?php 
            $total_mony=0;
            $total_user_mony=0;
            include "dbcon.php";
            $username=$_SESSION["username"];
            if($_SESSION['id']!=1){
            $sql="select * from addtocart where username='".$username."' ";

            $result= $conne->query($sql);



            if($result->num_rows>0){
                while($row=$result->fetch_assoc()){
                    echo "<tr><td>" . $row["id"] . "</td><td>".$row["username"] . "</td><td>".$row["medname"] . "</td><td>".$row["unit"] . "</td><td>".$row["priceperitem"] ."$</td><td>".$row["totalprice"]. "$</td><td><form method='POST' action='cart1.php' ><input type='hidden' name='delete' value='".$row["id"]."' > <input type='submit' name='delc' value='delete' style='background-color:red;width:50;border-radius:50px; ' > </form></td></tr>";
                    $total_user_mony=$total_user_mony+$row['totalprice'];
                }

            }
            else{

                echo "No result";
            }
        }


        else{
            if(isset($_POST["searchcus"])){
                $us=$_POST["searchcust"];

                $sql="select * from buy where username='".$us."'  ";
                $result=$conne->query($sql);
                if($result->num_rows>0){
                    while($row=$result->fetch_assoc()){
                        echo "<tr><td>" . $row["id"] . "</td><td>".$row["username"] . "</td><td>".$row["medname"] . "</td><td>".$row["unit"]  ."</td><td>".$row["priceperitem"]."$</td><td>".$row["totalprice"]."$</td><td>".$row["date"]. "</td></tr>";
    
                    }
    
                    }
                else{
    
                    echo "No result";
                }
                

            }
            else{
            $sqlprint="select * from buy ";
            $resultprint= $conne->query($sqlprint);

            if($resultprint->num_rows>0){
                while($rowprint=$resultprint->fetch_assoc()){
                    echo "<tr><td>" . $rowprint["id"] . "</td><td>".$rowprint["username"] . "</td><td>".$rowprint["medname"] . "</td><td>".$rowprint["unit"]  ."</td><td>".$rowprint["priceperitem"]."</td><td>".$rowprint["totalprice"]."$</td><td>".$rowprint["date"]. "</td></tr>";
                    $total_mony=$total_mony+$rowprint['totalprice'];

                }

                }
            else{

                echo "No result";
            }

        }
    }
        ?>

    </tbody>
</table>

<?php 
    if($_SESSION['id']==1)
    echo "<h3>Total Sales:".$total_mony."$</h3>";

    if($_SESSION['id']!=1)
    echo "<h3>Total Price:".$total_user_mony."$</h3>";
?>



    
    </div>
    </pre>
    
<?php if($_SESSION['id']!=1){  ?>
    <form method="POST" action="cart1.php" >
            <input type="number" style="background-color: #009879; width: 220px;"  placeholder="Enter the id of the cart to delete it." name="delid"/>
            <input type="submit" name="delids" style="background-color: brown; color:white;border-radius: 20px; " value="Delete"/>


    </form>
<?php }?>


    <?php 
        include "dbcon.php";

        if(isset($_POST['delids'])){
            if ($_SESSION['id']!=1){
            $id=$_POST['delid'];
            $sqld = "delete from addtocart where id='$id' and username='".$_SESSION['username']."'  ";
            $resultd= $conne->query($sqld);
            if($resultd){
                echo "<h1 style='color:red;' >Deleted:".$id."</h1>";

            }





    }}

    
    
    ?>
    <!-- return confirm('are you shure')" -->
<?php if ($_SESSION['id']!=1){?>
<form action="buy.php" method="POST" onsubmit="return confirm('are you shure')">

    <input type="submit" class="btnn" style="margin-left: 500px;margin-top: 200px;" name="submitbuy" value="BUY"/>

</form>
<?php } ?>

<!-- //delete cart -->

<?php 
    if(isset($_POST['delc'])){
        	$cart=$_POST['delete'];

            $delete=" delete from addtocart where id='$cart' ";
            $resultdelete=mysqli_query($conne,$delete);
            echo "DELETED"; 




    }
?>


<script>
    if(window.history.replaceState){
        window.history.replaceState(null,null,window.location.href);

    }
    </script>    



</body>
    </html>