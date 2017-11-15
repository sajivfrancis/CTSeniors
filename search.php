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
        <div class="container-fluid mainpage" style="padding: 25;">
            <div class="row text-center">             
                <div class="col-xs-1"></div>
                <div class="col-xs-10">
                    <center><h1>Welcome CT - Seniors</h1></Center>
                </div> 
                <div class="col-xs-10">
                    <center><form action="results.php" method="post" class="form-inline my-2 my-lg-0">
                            <input class="form-control mr-sm-2" type="text" name="user_query" placeholder="Search" size="90">
                            <button class="btn btn-primary active" type="submit" value="Search Now">Search</button>
                        </form></center>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>
</html>