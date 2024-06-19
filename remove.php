<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="common1.css">
    <link rel="stylesheet" href="remove.css">
    <script src="bootstrap.bundle.min.js"></script>
    <script src="jquery-3.7.1.min.js"></script>
    <script src="read3.js"></script>
    <script src="search.js"></script>
    <title>Navbar</title>
    <style>
        .navbar {
            display: none;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="navbarDiv container">
            <div class="row w-100">
                <div class="col-md-4 d-flex justify-content-start">
                    <a class="navbar-brand" href="read2.php">Stage Winning Bicycles</a>
                </div>
                <div class="col-md-4 d-flex justify-content-center">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="read2.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="create.php">Add Bikes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="update.php">Update List</a>
                        </li>
                        <li class="nav-item">
                            <a class="removeLink nav-link" href="remove.php">Remove Bike</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4 d-flex justify-content-end">
                    <form class="form-inline">
                        <input id="searchBar" class="form-control" type="search" placeholder="Ex. Colnago">
                        <div id="suggestions" class="suggestions"></div>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Remove Bike</h3>
                    </div>
                    <div class="card-body">
                        <form method="post" action="deleteProcess.php">
                            <div class="form-group">
                                <select class="form-control form-control-custom" name="itemNum" id="itemNum">
                                    <option disabled selected>--Select Item No.--</option>
                                    <?php
                                    $xml = new DOMDocument("1.0");
                                    $xml->load("Bikes.xml");
                                    $bikes = $xml->getElementsByTagName("bike");

                                    foreach ($bikes as $bike) {
                                        $itemNum = $bike->getAttribute("item");
                                        echo "<option value='" . $itemNum . "'>" . $itemNum . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-danger btn-block btn-custom">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>