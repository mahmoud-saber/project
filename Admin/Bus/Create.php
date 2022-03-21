<?php

# Logic ...... 
##########################################################################################################
require '../helpers/DBConnection.php';
require '../helpers/functions.php';

if($_SERVER['REQUEST_METHOD'] == "POST"){

    // CODE ..... 
    $model = Clean($_POST['model']);

   
    # VALIDATE INPUT ...... 
    $errors = []; 
    
    if(!Validate($model,'required')){       
        $errors['model'] = "Field Required";
    }


    # Checke errors 
    if(count($errors) > 0){
       $_SESSION['Message'] = $errors;
    }else{
        // code ..... 

       $sql = "insert into bus (model) values ('$model')"; 
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
                    placeholder="Enter Category model">
            </div>

            <button type="submit" class="btn btn-primary">SAVE</button>
        </form>




    </div>
</main>





<?php

require '../layouts/footer.php';

?>