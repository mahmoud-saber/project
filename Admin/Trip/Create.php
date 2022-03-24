<?php
require '../helpers/DBConnection.php';
require '../helpers/functions.php';
require '../helpers/checklogin.php';

$sql = "select * from bus";
$bus_sql = doQuery($sql);

if($_SERVER['REQUEST_METHOD'] == "POST"){

    $name_trip = Clean($_POST['name_trip']);
    $date      = Clean($_POST['date']);
    $bus_id    = Clean($_POST['bus_id']);
    $price     = Clean($_POST['price']);

   
    $errors = []; 
    if(!Validate($name_trip,'required')){      
        $errors['name_trip'] = "Field Required";
    } elseif(!Validate($name_trip,'string')){      
        $errors['name_trip'] = "Not String";
    } 
  
    if(!Validate($date,'required')){      
        $errors['date'] = "Field Required";
    }
    elseif(!Validate($date,'date')) {
        $errors['date'] = "Invalid Format";
    }
    elseif(!Validate($date,'nextdate')) {
        $errors['date'] = "Invalid Expired";
    }
    
    if(!Validate($bus_id,'required')){      
        $errors['bus_id'] = "Field Required";
    }
    
    if(!Validate($price,'required')){      
        $errors['price'] = "Field Required";
    }
   
    


    if(count($errors) > 0){
       $_SESSION['Message'] = $errors;
    }else{
       $date =strtotime($date);
       $id_admin=$_SESSION['admin']['id'];
       $sql = "insert into trip (name_trip,date,bus_id,price,admin_id) values ('$name_trip',$date, $bus_id ,$price,$id_admin)"; 
       $op  = doQuery($sql);


       if($op){
           $message = ["Message" => "Raw Inserted"];
       }else{
           $message = ["Message" => "Error Try Again"]; 
       }

       $_SESSION['Message'] = $message; 


    }


}






require '../layouts/header.php';

require '../layouts/nav.php';

require '../layouts/sidNav.php';
?>




<main>
    <div class="container-fluid">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">


            <?php 

             PrintMessages('Dashboard / Trip / Create');
             
          ?>




        </ol>


        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post"
            enctype="multipart/form-data">

            <div class="form-group">
                <label for="exampleInputName">NameTrip</label>
                <input type="text" class="form-control" id="exampleInputName" aria-describedby="" name="name_trip"
                    placeholder="Enter  NameTrip">
            </div>
            <div class="form-group">
                <label for="exampleInputName">Date</label>
                <input type="date" class="form-control" id="exampleInputName" aria-describedby="" name="date"
                    placeholder="Enter Tripdate ">
            </div>
            <div class="form-group">
                <label for="exampleInputName">Price</label>
                <input type="number" class="form-control" id="exampleInputName" aria-describedby="" name="price"
                    placeholder="Enter Trip price">
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


            <button type="submit" class="btn btn-primary">SAVE</button>
        </form>




    </div>
</main>





<?php

require '../layouts/footer.php';

?>