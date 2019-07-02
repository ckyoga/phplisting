<html>

<head>
    <title>Real Estate Listings</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
    <link href='css/custom.css' rel='stylesheet' type='text/css'>
    <link href='css/menu.css' rel='stylesheet' type='text/css'>
</head>

<body>

<div>
    <nav>
        <ul>
            <li><a href="listings-display.php">View Listings</a></li>
            <li><a href="add-display.php">Add Listings</a></li>

        </ul>
    </nav>
</div>

<div class="container">

        <div class="row">

            <div class="col-xl-8 offset-xl-2 py-5">

                <h2>Add Listing below</h2>

                <p class="lead">This is a demo page to add real estate listings by using Bootstrap with a PHP and AJAX background.</p>


                <form id="contact-form" method="post" action="listing.php" role="form">

                    <div class="messages"></div>

                    <div class="controls">

                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mlsNumber">MLS Number *</label>
                                    <input id="mlsNumber" type="number" name="mlsNumber" class="form-control" placeholder="Please enter the MLS Number *" required="required" data-error="MLS Number is required and must be a number.">
                                    <div class="help-block with-errors"></div>
                                    <p id="mlsNumber-errors"></p>
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address">Address Line 1 *</label>
                                    <input id="address" type="text" name="address" class="form-control" placeholder="Address Line 1 *" required="required" data-error="Address is required.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address2">Address Line 2 </label>
                                    <input id="address2" type="text" name="address2" class="form-control" placeholder="Address Line 2">
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="city">City *</label>
                                    <input id="city" type="text" name="city" class="form-control" placeholder="City *" required="required" data-error="City is required.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="state">Please specify the state *</label>
                                    <select id="state" name="state" class="form-control" required="required" data-error="Please specify the state.">
                                        <?php
                                            // Include States file:
                                            require('includes/states.inc.php');
                                        ?>
                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="zipcode">Zip Code *</label>
                                    <input id="zipcode" type="text" name="zipcode" class="form-control" placeholder="Please enter zipcode *" required="required" data-error="Valid zip code is required.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="area">Neighborhood *</label>
                                    <input id="area" type="text" name="area" class="form-control" placeholder="Please enter the Neighborhood *" required="required" data-error="Valid neighborhood is required.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description">Message *</label>
                                    <textarea id="description" name="description" class="form-control" placeholder="Description *" rows="4" required="required" data-error="Valid description is required."></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <input type="submit" class="btn btn-success btn-send" value="Create Listing">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <p class="text-muted">
                                    <strong>*</strong> These fields are required. </p>
                            </div>
                        </div>
                    </div>

                </form>

            </div>
            <!-- /.8 -->

        </div>
        <!-- /.row-->

    </div>
    <!-- /.container-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js" integrity="sha256-dHf/YjH1A4tewEsKUSmNnV05DDbfGN3g7NMq86xgGh8=" crossorigin="anonymous"></script>
<script src="js/contact.js"></script>
</body>

</html>