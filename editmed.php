<?php 
    session_start();
    if($_SESSION['id']==1){

?>

<html>
       <head>

        <style>
            
.updatecss input {

    background-color:azure;
    width: 450px;
    height: 60px;
    text-align: left;
    color: black;
    


}

body{
    background-color: wheat;

}
        </style>
       </head>
       
       <body>
       <div> 
       <form action="user.php" method="POST" class="updatecss" >     
       Delete Medicine Enter The name:<input  type="text"  name="delc"/>
        <input type="submit" name="delcb" value="search and delete" style="width: 115px; border-radius: 50px;" />
        <br>
        <br><br><br><br>

       </form>
        <form action="user.php" method="POST" class="updatecss" >     

            <h1 style="color: black;" >TO EDIT : </h1>
            <br> Edit Medicine Enter The OLD name:<input  type="text"  name="delc"/>

            <br><br> Stock:<input type='number'  name='stock' required ><br><br><br><br>
            Medicine Name:<input type='text' id="2" name='medname' required ><br><br><br><br>
                Type:<select name="type" style="width: 450; height: 60px; background-color: brown;" >
                    <option>HAB</option>
                    <option>Drink</option>
                    <option>Marham</option>
                </select><br><br><br><br><br>
                Price Per item:<input type='number' name='ppi' required ><br><br><br><br><br>
                Unit:<input type='number' name='unit' required ><br><br><br><br>
                
                Description:<textarea style="width: 300px;height: 150px;" name="description"></textarea><br><br><br><br>
        <input type='submit'  name='update25' value='update'style="width: 60px; border-radius: 50px;" >
        </form>
       </div>



        <?php 
          


        ?>

    

    






<script>
    if(window.history.replaceState){
        window.history.replaceState(null,null,window.location.href);

    }
</script>  
</body>
</html>

<?php
    }            
    else{
        echo "Sorry This page is privet";
    
    }
?>