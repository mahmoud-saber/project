<?php

require '../helpers/DBConnection.php';
require '../helpers/functions.php';
require '../helpers/checklogin.php';

$sql = "select * from trip";
$op  = doQuery($sql);




require '../layouts/header.php';

require '../layouts/nav.php';

require '../layouts/sidNav.php';
?>




<main>
    <div class="container-fluid">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">

            <?php

            PrintMessages('Dashboard/Trip');

            ?>
        </ol>






        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                List Trip System
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>name_trip</th>
                                <th>price</th>
                                <th>date</th>

                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>name_trip</th>
                                <th>price</th>
                                <th>date</th>

                                <th>Control</th>
                            </tr>
                        </tfoot>


                        <tbody>

                            <?php


                            while ($data = mysqli_fetch_assoc($op)) {

                            ?>
                            <tr>

                                <td><?php echo $data['id']; ?></td>
                                <td><?php echo $data['name_trip']; ?></td>
                                <td><?php echo $data['price']; ?></td>
                                <td><?php echo date('Y/m/d',$data['date']); ?></td>
                                <td>
                                    <a href='Remove.php?id=<?php echo $data['id']; ?>'
                                        class='btn btn-danger m-r-1em'>Delete</a>

                                    <a href='Edit.php?id=<?php echo $data['id']; ?>'
                                        class='btn btn-primary m-r-1em'>Edit</a>
                                </td>


                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>





<?php

require '../layouts/footer.php';

?>