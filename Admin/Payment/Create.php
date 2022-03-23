<?php

# Logic ...... 
##########################################################################################################
require '../helpers/DBConnection.php';
require '../helpers/functions.php';
require '../helpers/checklogin.php';
/////////////////////////////////////

if($_SERVER['REQUEST_METHOD'] == "POST"){

    $method= Clean($_POST['method']);
   

   
    # VALIDATE INPUT ...... 
    $errors = []; 
    
    if(!Validate($method,'required')){      
        $errors['method'] = "Field Required";
    }
  
    # Checke errors 
    if(count($errors) > 0){
       $_SESSION['Message'] = $errors;
    }else{
        // code ..... 

       $sql = "insert into payment (method) values ('$method')"; 
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

             PrintMessages('Dashboard / Payment / Create');
             
          ?>




        </ol>



        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post"
            enctype="multipart/form-data">

            <div class="form-group">
                <label for="exampleInputName">Pament Method</label>
                <input type="text" class="form-control" id="exampleInputName" aria-describedby="" name="method"
                    placeholder="Enter method">
            </div>

            <!-- <div class="form-group">
                <label for="exampleInputName">Pament Method</label>
                <select class="form-control" id="exampleInputName" aria-describedby="" name="method">
                </select>
            </div> -->



            <button type="submit" class="btn btn-primary">SAVE</button>
        </form>




    </div>
</main>





<?php

require '../layouts/footer.php';

?>