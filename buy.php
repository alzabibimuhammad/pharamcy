

<html>
    <head>
        <title>FATORAH</title>
        <style>
    .styled-table  {
        border: 1px solid black;

}
.styled-table th,td{
    border: 0.1px solid black;

}
            </style>
    </head>
<body>

    <h1>MR:    <?php session_start();
        $usname=$_SESSION["username"]; 
        echo $usname;
        
        ?></h1>
    <h1>
        Place:<?php 
            $place=$_SESSION["place"];
        echo $place;
        
        ?>
    </h1>    
    <h2>
        Date: <?php
            $d= date("y-m-d");
            $t=date("h:i:sa");
            echo $d."<br>";
            echo $t;

        ?>
    </h2>

<table class="styled-table" >
    <tr>
        <th>Medicine Name</th>
        <th>Unit</th>
        <th>Price Per Item</th>
        <th>Total price</th>
    </tr>
    <?php 
        include "dbcon.php";
        $idb=0;
        $total=0;
        $sql= "select * from addtocart where username='".$usname."' ";
        $result= $conne->query($sql);

    
        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                $s="select * from medicine where medname = '".$row['medname']."'";
                $r=$conne->query($s);
                $ro=$r->fetch_assoc();

            if($row["unit"]<=$ro["unit"]){

                echo "<tr><td>".$row["medname"] . "</td><td>".$row["unit"] . "</td><td>".$row["priceperitem"] ."$</td><td>".$row["totalprice"]. "$</td></tr>";
                $total=$total+$row["totalprice"];
                


                $insert=mysqli_query($conne,"insert into buy
                values ('$idb','$usname','".$row["medname"]."','".$row["unit"]."','".$row["priceperitem"]."','".$row["totalprice"]."','$d+$t')");
                if($insert){
                    $del="delete from addtocart where medname='".$row["medname"]."'";
                    $go=mysqli_query($conne,$del);
                }
                
                $code=0;
                $sqlmed="select * from medicine where medname='".$row["medname"]."'";
                $resultmed=$conne->query($sqlmed);
                $rowmed=$resultmed->fetch_assoc();
                
                
                $totalunit = $rowmed["unit"]-$row["unit"];


                if($totalunit>0){
                $updatemed="update medicine set unit='$totalunit' where medname='".$row["medname"]."'  ";
                $resultupdate=$conne->query($updatemed);
                }
                else{
                    $updatemedi="update medicine set unit= '0' where medname = '".$row["medname"]."' ";
                    $resultdelete=$conne->query($updatemedi);

                }
                
                


            
            }
            else{
                echo "sorry error in unit or medname your bill is unacceptable please change your cart ";

            }
                
            
            }}
 

    ?> 


</table>

<h2>Total:
  <?php 
    echo $total."$.";
  ?>          

</h2>

<h3>For your feedback call:0932392808</h3>


</body>
</html>