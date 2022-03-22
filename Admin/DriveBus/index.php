<?php

# Logic ...... 
##########################################################################################################
require '../helpers/DBConnection.php';
require '../helpers/functions.php';

# Fetch Data .... 
$sql = "select drive_bus.* , driver.name,bus.model from drive_bus inner join  driver on drive_bus.driver_id=driver.id  inner join bus on drive_bus.bus_id=bus.id; ";
$op  = doQuery($sql);

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

            PrintMessages('Dashboard/Drive_Bus');

            ?>
        </ol>






        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                List Drive Bus
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name Driver</th>
                                <th>Bus</th>
                                <th>Control</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Name Driver</th>
                                <th>Bus</th>
                                <th>Control</th>
                            </tr>
                        </tfoot>


                        <tbody>

                            <?php

                            # Fetch And Print data .... 

                            while ($data = mysqli_fetch_assoc($op)) {

                            ?>
                            <tr>
                                <td><?php echo $data['id']; ?></td>
                                <td><?php echo $data['name']; ?></td>
                                <td><?php echo $data['model']; ?></td>
                                = <td>
                                    <a href='Remove.php?id=<?php echo $data['id']; ?>'
                                        class='btn btn-danger m-r-1em'>Delete</a>

                                    <a href='edit.php?id=<?php echo $data['id']; ?>'
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