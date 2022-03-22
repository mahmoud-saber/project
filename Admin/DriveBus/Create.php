<?php

# Logic ...... 
##########################################################################################################
require '../helpers/DBConnection.php';
require '../helpers/functions.php';
require '../helpers/checklogin.php';
/////////////////////////////////////
##fetch data of bus
$sql = "select * from bus";
$bus_sql = doQuery($sql);
////////////////////////////
##fetch data of driver
$sql = "select * from driver";
$driver_sql = doQuery($sql);
/////////////////////////
if($_SERVER['REQUEST_METHOD'] == "POST"){

    $bus_id    = Clean($_POST['bus_id']);
    $driver_id = Clean($_POST['driver_id']);
    $admin_id  = Clean($_POST['admin_id']);


   
    # VALIDATE INPUT ...... 
    $errors = []; 
    
    if(!Validate($bus_id,'required')){      
        $errors['bus_id'] = "Field Required";
    }
    if(!Validate($driver_id,'required')){      
        $errors['driver_id'] = "Field Required";
    }
    // if(!Validate($admin_id,'required')){      
    //     $errors['admin_id'] = "Field Required";
    // }

    # Checke errors 
    if(count($errors) > 0){
       $_SESSION['Message'] = $errors;
    }else{
        // code ..... 

       $sql = "insert into drive_bus (bus_id,admin_id,driver_id) values ($bus_id,1,$driver_id)"; 
       $op  = doQuery($sql);


       if($op){
           $message = ["Message" => "Raw Inserted"];
       }else{
           $message = ["Message" => "Error Try Again"]; 
       }

       $_SESSION['Message'] = $message; 


    }


}

##########################################################################################################





require '../layouts/header.php';

require '../layouts/nav.php';

require '../layouts/sidNav.php';
?>




<main>
    <div class="container-fluid">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">


            <?php 

             PrintMessages('Dashboard / Bus / Create');
             
          ?>




        </ol>



        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post"
            enctype="multipart/form-data">



            <div class="form-group">
                <label for="exampleInputName">Drierv</label>
                <select class="form-control" id="exampleInputName" aria-describedby="" name="driver_id">

                    <?php 
                while($data= mysqli_fetch_assoc($driver_sql ) ){
                    ?>
                    <option value="<?php echo $data['id']?> "><?php echo $data['name']?> </option>

                    <?php } ?>
                </select>
            </div>

            <div class="form-group">
                <label for="exampleInputName">bus_model</label>
                <select class="form-control" id="exampleInputName" aria-describedby="" name="bus_id">

                    <?php 
                while($data= mysqli_fetch_assoc($bus_sql ) ){
                    ?>
                    <option value="<?php echo $data['id']?> "><?php echo $data['model']?> </option>

                    <?php } ?>
                </select>
            </div>
            <!-- <div class="form-group">
                <label for="exampleInputName">admin</label>
                <input type="number" class="form-control" id="exampleInputName" aria-describedby="" name="admin_id"
                    placeholder="Enter Bus plate_number">
            </div> -->

            <button type="submit" class="btn btn-primary">SAVE</button>
        </form>




    </div>
</main>





<?php

require '../layouts/footer.php';

?>