<?php

# Logic ...... 
##########################################################################################################
require '../helpers/DBConnection.php';
require '../helpers/functions.php';
##########################################################################################################
# Fetch Raw Data ..... 

$id = $_GET['id_bus'];
$sql = "select * from bus where id_bus = $id";
$op  = doQuery($sql);
$data = mysqli_fetch_assoc($op);

##########################################################################################################





if ($_SERVER['REQUEST_METHOD'] == "POST") {

    // CODE ..... 
    $model = Clean($_POST['model']);
    $capcity = Clean($_POST['capcity']);
    $plate_number = Clean($_POST['plate_number']);

    


    # VALIDATE INPUT ...... 
    $errors = [];
    if (!Validate($model, 'required')) {       
        $errors['model'] = "Field Required";
    }

    if (!Validate($capcity, 'required')) {       
        $errors['capcity'] = "Field Required";
    }
    if (!Validate($plate_number, 'required')) {       
        $errors['plate_number'] = "Field Required";
    }



    # Checke errors 
    if (count($errors) > 0) {
        $_SESSION['Message'] = $errors;
    } else {
        // code ..... 

        $sql = "update bus set model = '$model', capcity=$capcity, plate_number = $plate_number where id_bus = $id";
        $op  =  doQuery($sql);


        if ($op) {
            $message = ["Message" => "Raw Updated"];
            $_SESSION['Message'] = $message;
            header("Location: index.php");
            exit();
        } else {
            $message = ["Message" => "Error Try Again"];
            $_SESSION['Message'] = $message;
        }
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

            PrintMessages('Dashboard / Bus / Edit');

            ?>


        </ol>



        <form action="edit.php?id=<?php echo $data['id']; ?>" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label for="exampleInputName">Model</label>
                <input type="text" class="form-control" id="exampleInputName" aria-describedby="" name="model"
                    value="<?php echo $data['model']; ?>" placeholder="Enter Category Title">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>




    </div>
</main>





<?php

require '../layouts/footer.php';

?>
?>