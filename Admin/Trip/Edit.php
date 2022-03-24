<?php

require '../helpers/DBConnection.php';
require '../helpers/functions.php';
require '../helpers/checklogin.php';



$id = $_GET['id'];
$sql = "select * from trip where id = $id";
$op  = doQuery($sql);
$data = mysqli_fetch_assoc($op);


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
        $sql = "update trip set name_trip ='$name_trip', date= $date, bus_id=$bus_id , price=$price where id = $id"; 
        $op  = doQuery($sql);
 
 
        if($op){
            $message = ["Message" => "Raw updated"];
            header("Location: index.php");
            exit();
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

            PrintMessages('Dashboard / Trip / Update');

            ?>


        </ol>



        <form action="Edit.php?id=<?php echo $data['id']; ?>" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label for="exampleInputName">NameTrip</label>
                <input type="text" class="form-control" id="exampleInputName" aria-describedby="" name="name_trip"
                    value="<?php echo $data['name_trip']?>">
            </div>
            <div class="form-group">
                <label for="exampleInputName">Date</label>
                <input type="date" class="form-control" id="exampleInputName" aria-describedby="" name="date"
                    value="<?php echo date('Y-m-d',$data['date']); ?>">
            </div>
            <div class=" form-group">
                <label for="exampleInputName">Price</label>
                <input type="number" class="form-control" id="exampleInputName" aria-describedby="" name="price"
                    value="<?php echo $data['price']?>">
            </div>
            <div class="form-group">
                <label for="exampleInputName">bus_model</label>
                <select class="form-control" id="exampleInputName" aria-describedby="" name="bus_id">

                    <?php 
                        while($data= mysqli_fetch_assoc($bus_sql ) ){
                    ?>
                    <option value=" <?php echo $data['id']?> "><?php echo $data['model']?> </option>

                    <?php } ?>
                </select>
            </div>


            <button type="submit" class="btn btn-primary">Update</button>
        </form>




    </div>
</main>





<?php

require '../layouts/footer.php';

?>