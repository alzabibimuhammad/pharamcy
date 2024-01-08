<?php 
    session_start();
    include "dbcon.php";

    if(isset($_POST['edit'])  ){
        $_SESSION['id_med']=$_POST['snr'];
        

    
?>

<html>

    <body style="background-color: gray;" >
    <form action="user.php" method="POST" class="updatecss" >     

        <br>
        <br><br><br><br>

        
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
    </body>

    <?php 
    }
    
    
    ?>
    




        



</html>
