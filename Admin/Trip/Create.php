<?php

# Logic ...... 
##########################################################################################################
require '../helpers/DBConnection.php';
require '../helpers/functions.php';

if($_SERVER['REQUEST_METHOD'] == "POST"){

    // CODE ..... 
    $name_trip = Clean($_POST['name_trip']);
    $date = Clean($_POST['date']);
    $bus_id = Clean($_POST['bus_id']);
    $client_id = Clean($_POST['	client_id']);
    $price = Clean($_POST['price']);
    $admin_id = Clean($_POST['admin_id']);

   
    # VALIDATE INPUT ...... 
    $errors = []; 
    if(!Validate($name_trip,'required')){      
        $errors['name_trip'] = "Field Required";
    } 
    if(!Validate($date,'required')){      
        $errors['date'] = "Field Required";
    }
    if(!Validate($bus_id,'required')){      
        $errors['bus_id'] = "Field Required";
    }
    if(!Validate($client_id,'required')){      
        $errors['client_id'] = "Field Required";
    }
    if(!Validate($price,'required')){      
        $errors['price'] = "Field Required";
    }
   
    if(!Validate($admin_id,'required')){      
        $errors['admin_id'] = "Field Required";
    }


    # Checke errors 
    if(count($errors) > 0){
       $_SESSION['Message'] = $errors;
    }else{
        // code ..... 

       $sql = "insert into trip (name_trip,date,bus_id,client_id,price,admin_id) values ('$name_trip',$date,$bus_id ,$client_id,$price,$admin_id)"; 
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

             PrintMessages('Dashboard / Roles / Create');
             
          ?>




        </ol>



        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post"
            enctype="multipart/form-data">

            <div class="form-group">
                <label for="exampleInputName">model</label>
                <input type="text" class="form-control" id="exampleInputName" aria-describedby="" name="model"
                    placeholder="Enter Bsu model">
            </div>
            <div class="form-group">
                <label for="exampleInputName">capctiy</label>
                <input type="text" class="form-control" id="exampleInputName" aria-describedby="" name="capcity"
                    placeholder="Enter Bus capctiy">
            </div>
            <div class="form-group">
                <label for="exampleInputName">plate_number</label>
                <input type="number" class="form-control" id="exampleInputName" aria-describedby="" name="plate_number"
                    placeholder="Enter Bus plate_number">
            </div>
            <div class="form-group">
                <label for="exampleInputName">capctiy</label>
                <input type="text" class="form-control" id="exampleInputName" aria-describedby="" name="capcity"
                    placeholder="Enter Bus capctiy">
            </div>
            <div class="form-group">
                <label for="exampleInputName">capctiy</label>
                <input type="text" class="form-control" id="exampleInputName" aria-describedby="" name="capcity"
                    placeholder="Enter Bus capctiy">
            </div>
            <div class="form-group">
                <label for="exampleInputName">capctiy</label>
                <input type="text" class="form-control" id="exampleInputName" aria-describedby="" name="capcity"
                    placeholder="Enter Bus capctiy">
            </div>

            <button type="submit" class="btn btn-primary">SAVE</button>
        </form>




    </div>
</main>





<?php

require '../layouts/footer.php';

?>