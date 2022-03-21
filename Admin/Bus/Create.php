<?php

# Logic ...... 
##########################################################################################################
require '../helpers/DBConnection.php';
require '../helpers/functions.php';

if($_SERVER['REQUEST_METHOD'] == "POST"){

    // CODE ..... 
    $model = Clean($_POST['model']);
    $capcity = Clean($_POST['capcity']);
    $plate_number = Clean($_POST['plate_number']);


   
    # VALIDATE INPUT ...... 
    $errors = []; 
    
    if(!Validate($model,'required')){       
        $errors['model'] = "Field Required";
    }
    if(!Validate($capcity,'required')){       
        $errors['capcity'] = "Field Required";
    }
    if(!Validate($plate_number,'required')){       
        $errors['plate_number'] = "Field Required";
    }

    # Checke errors 
    if(count($errors) > 0){
       $_SESSION['Message'] = $errors;
    }else{
        // code ..... 

       $sql = "insert into bus (model,capcity,plate_number) values ('$model',$capcity,$plate_number)"; 
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
                <input type="text" class="form-control" id="exampleInputName" aria-describedby="" name="plate_number"
                    placeholder="Enter Bus plate_number">
            </div>

            <button type="submit" class="btn btn-primary">SAVE</button>
        </form>




    </div>
</main>





<?php

require '../layouts/footer.php';

?>