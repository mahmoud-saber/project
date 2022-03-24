<?php

require '../helpers/DBConnection.php';
require '../helpers/functions.php';
require '../helpers/checklogin.php';

$id = $_GET['id'];
$sql = "select * from payment where id= $id";
$op  = doQuery($sql);
$data = mysqli_fetch_assoc($op);





if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $method = Clean($_POST['method']);
  

    


    $errors = [];
    if (!Validate($method, 'required')) {       
        $errors['method'] = "Field Required";
    }

    



    if (count($errors) > 0) {
        $_SESSION['Message'] = $errors;
    } else {

        $sql = "update payment set method = '$method' where id = $id";
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







require '../layouts/header.php';

require '../layouts/nav.php';

require '../layouts/sidNav.php';
?>




<main>
    <div class="container-fluid">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">


            <?php

            PrintMessages('Dashboard / Payment / Edit');

            ?>


        </ol>



        <form action="Edit.php?id=<?php echo $data['id']; ?>" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label for="exampleInputName">method</label>
                <input type="text" class="form-control" id="exampleInputName" aria-describedby="" name="method"
                    value="<?php echo $data['method']; ?>">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>




    </div>
</main>





<?php

require '../layouts/footer.php';

?>
?>