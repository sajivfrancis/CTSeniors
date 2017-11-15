<html>
    <head>
        <title>CT Seniors</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link href="style.css" rel="stylesheet" type="text/css"/>
        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script src="js/mapStyle.js" type="text/javascript"></script>
    </head>
    <body>
        <?php
        include './navbar.php';
        ?>
        <div class="container-fluid">
            <div class="row text-center"></div>
            <div class="row">
                <div class="col-md-3" style="padding: 10px;">

                    <div class="btn-group btn-group-justified" style="margin-bottom: 10px;">
                        <a onclick="clearMarkers();" class="btn btn-default"><i class="fa fa-eye-slash" aria-hidden="true"></i> Hide</a>
                        <a onclick="showMarkers();" class="btn btn-default"><i class="fa fa-eye" aria-hidden="true"></i> Show</a>
                        <a onclick="deleteMarkers();" class="btn btn-default"><i class="fa fa-trash" aria-hidden="true"></i> Remove</a>
                    </div>
                    <div class="panel-group" id="categories">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#categories" href="#collapse1">
                                        <i class="fa fa-heartbeat" aria-hidden="true"></i> Health
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse1" class="panel-collapse collapse">
                                <div class="panel-body"> 

                                    <?php
                                    $cat = array();
                                    $obj = new stdClass();
                                    $obj->name = "Hospitals";
                                    $obj->dataSet = 'pg64-zncr';
                                    $obj->order = "dba";
                                    $obj->text = "rows[i].dba";
                                    $obj->address = "rows[i].address";
                                    $obj->city = "rows[i].city";
                                    $obj->state = "rows[i].state";
                                    $obj->marker = "HOSPITAL_O";
                                    $obj->icon = "fa-hospital-o";
                                    $obj->customScript = "";
                                    $cat[] = $obj;

                                    include './categories.php';
                                    ?>

                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" id="housingButton" data-parent="#categories" href="#collapse2">
                                        <i class="fa fa-home" aria-hidden="true"></i> Housing
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse2" class="panel-collapse collapse">
                                <div class="panel-body">                                 

                                    <?php
                                    $cat = array();

                                    $obj = new stdClass();
                                    $obj->name = "Seniors Centers";
                                    $obj->dataSet = 'h78t-88kx';
                                    $obj->order = "agency";
                                    $obj->text = "rows[i].agency";
                                    $obj->address = "rows[i].location_1.human_address.address";
                                    $obj->city = "rows[i].location_1.human_address.city";
                                    $obj->state = "rows[i].location_1.human_address.state";
                                    $obj->marker = "BUILDING_O";
                                    $obj->icon = "fa-building-o";
                                    $obj->customScript = "rows[i].location_1.human_address = JSON.parse(rows[i].location_1.human_address);";
                                    $cat[] = $obj;

                                    include './categories.php';
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#categories" href="#collapse3">
                                        <i class="fa fa-id-card-o" aria-hidden="true"></i> Government Programs
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse3" class="panel-collapse collapse">
                                <div class="panel-body">


                                    <?php
                                    $cat = array();

                                    $obj = new stdClass();
                                    $obj->name = "DMV Office Locations";
                                    $obj->dataSet = 'd75v-c5rd';
                                    $obj->order = "office";
                                    $obj->text = "rows[i].office";
                                    $obj->address = "rows[i].location";
                                    $obj->city = "rows[i].location_1.human_address.city";
                                    $obj->state = "'CT'";
                                    $obj->marker = "CAR";
                                    $obj->icon = "fa-car";
                                    $obj->customScript = "rows[i].location_1.human_address = JSON.parse(rows[i].location_1.human_address);";
                                    $cat[] = $obj;


                                    include './categories.php';
                                    ?>

                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#categories" href="#collapse4">
                                        <i class="fa fa-money" aria-hidden="true"></i> Resources
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse4" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <!-- Resources -->
                                    <?php
                                    $cat = array();

                                    $obj = new stdClass();
                                    $obj->name = "Commuter Park and Ride Lots";
                                    $obj->dataSet = 'qjh2-8gef';
                                    $obj->order = "town";
                                    $obj->text = "rows[i].town";
                                    $obj->address = "'route '+rows[i].route";
                                    $obj->city = "rows[i].town";
                                    $obj->state = "'CT'";
                                    $obj->marker = "TREE";
                                    $obj->icon = "fa-tree";
                                    $obj->customScript = "";
                                    $cat[] = $obj;



                                    $obj = new stdClass();
                                    $obj->name = "Electric Vehicle Charging Stations";
                                    $obj->dataSet = 'g5ck-ne9e';
                                    $obj->order = "location_name";
                                    $obj->text = "rows[i].location_name";
                                    $obj->address = "rows[i].location_1_address";
                                    $obj->city = "rows[i].location_1_city";
                                    $obj->state = "'CT'";
                                    $obj->marker = "PLUG";
                                    $obj->icon = "fa-plug";
                                    $obj->customScript = "";
                                    $cat[] = $obj;

                                    include './categories.php';
                                    ?>

                                    <!-- resources end -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default" id="directions">
                        <div class="panel-heading">Directions</div>
                        <div class="panel-body">
                            <div id="directionsPanel"></div>
                        </div>
                    </div>
                </div>
                <div id="map" class="col-md-9" style="height: 100%;"></div>

            </div>
        </div>   
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB3DuW4xAvzcZqtAYEJKuUNKzSDwHZb_y8&callback=initMap&libraries=places,visualization"></script>
        <script src="js/soda-js.bundle.js" type="text/javascript"></script>
        <script src="js/fontawesome-markers.min.js" type="text/javascript"></script>
        <script src="js/markerwithlabel.js" type="text/javascript"></script>
        <script src="js/script.js"></script>

    </body>
</html>