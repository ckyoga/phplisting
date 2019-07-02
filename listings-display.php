<?php
/**
 * Created by PhpStorm.
 * User: Caroline Burns
 * Date: 2019-07-01
 */

// Need the utilities file:
require('includes/utilities.inc.php');

// Include header file:
require('includes/header.inc.php');

?>

<div class="container">

    <div class="row">

        <div class="col-xl-8 offset-xl-2 py-5">

            <h2>View Listings below</h2>

            <p class="lead">This is a demo page to view real estate listings by using Bootstrap with a PHP and MySQL background.</p>

            <table>
                <tr>
                    <th>MLS #</th>
                    <th>Address</th>
                    <th>Description</th>
                </tr>

            <?php

                // Get Listings from database
                $sql="SELECT mlsNumber, address, description FROM listings ORDER BY mlsNumber ASC ";
                $stmt = $pdo->query($sql);
                $stmt->setFetchMode(PDO::FETCH_CLASS, 'Listing');

                while ($row = $stmt->fetch()) {
                    echo "<tr><td > " . $row->getMlsNumber() . "</td><td>" . $row->getAddress() . "</td><td>" . $row->getDescription() . "</td> </tr>";
                }
            ?>
            </table>
        </div>
        <!-- /.8 -->

    </div>
    <!-- /.row-->

</div>
<!-- /.container-->

<?php
// Include header file:
require('includes/footer.inc.php');
?>



