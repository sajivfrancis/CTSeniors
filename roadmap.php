<html>
    <head>
        <title>CT Seniors</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link href="style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php
        include './navbar.php';
        ?>
        <div class="container-fluid" style="padding: 0;">
            <div class="row text-center">
                <img src="img/roadmap.png" class="center-block img-responsive"/>
            </div>
            <div class="list-group">
                <a href="https://www.cttransit.com/" class="list-group-item list-group-item-action flex-column align-items-start active">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">CT Transit</h5>
                    </div>
                    <p class="mb-1">Connecticut Transit is a bus system serving much of the U.S. state of Connecticut and is a division of that state's Department of Transportation.</p>
                    <small>Transport Services</small>
                </a>
                <a href="http://www.hartfordtransit.org/" class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">GHTD - Hartford Transit</h5>
                    </div>
                    <p class="mb-1">The GHTD is a quasi-municipal corporation operating under the authority of Chapter 103a of the Connecticut General Statutes. There are currently sixteen member towns represented by appointees who collectively form the Board of Directors.</p>
                    <small>Transport Services</small>
                </a>
                 <a href="http://www.gogbt.com/" class="list-group-item list-group-item-action flex-column align-items-start active">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">GBT - Bridgeport Transit</h5>
                    </div>
                    <p class="mb-1">Greater Bridgeport Transit (GBT) provides local, regional and express bus services throughout the Bridgeport region with routes extending from Milford to Norwalk and from Bridgeport to the Naugatuck Valley.</p>
                    <small>Transport Services</small>
                </a>
                <a href="https://www.quandl.com/?modal=register" class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">API - Housing Data</h5>
                    </div>
                    <p class="mb-1">The premier source for financial, economic, and alternative datasets, serving investment professionals. </p>
                    <small>Housing - Real Estate</small>
                </a>
                <a href="https://www.opendatanetwork.com/dataset/data.ct.gov/tids-7w95" class="list-group-item list-group-item-action flex-column align-items-start active">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">API - CT Occupational Employment & Wages</h5>
                    </div>
                    <p class="mb-1">The Connecticut Occupational Employment and Wage data provides employment and wage data by occupation and is based on the results of the Occupational Employment Statistics (OES) survey.</p>
                    <small>Employment & Wages</small>
                </a>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </body>
</html>