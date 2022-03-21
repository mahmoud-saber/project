<?php

# Logic ...... 
##########################################################################################################
require '../helpers/DBConnection.php';
require '../helpers/functions.php';

# Fetch Data .... 
$sql = "select * from bus";
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

            PrintMessages('Dashboard/buses');

            ?>
        </ol>






        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                List Categories
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>model</th>
                                <th>Control</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>model</th>
                                <th>Control</th>
                            </tr>
                        </tfoot>


                        <tbody>

                            <?php

                            # Fetch And Print data .... 

                            while ($data = mysqli_fetch_assoc($op)) {

                            ?>
                            <tr>
                                <td><?php echo $data['id_bus']; ?></td>
                                <td><?php echo $data['model']; ?></td>
                                <td>
                                    <a href='Remove.php?id=<?php echo $data['id_bus']; ?>'
                                        class='btn btn-danger m-r-1em'>Delete</a>

                                    <a href='edit.php?id=<?php echo $data['id_bus']; ?>'
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