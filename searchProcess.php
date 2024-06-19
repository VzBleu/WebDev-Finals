<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="read3.css">
    <link rel="stylesheet" href="common1.css">
    <link rel="stylesheet" href="searchProcess.css">
    <script src="bootstrap.bundle.min.js"></script>
    <script src="jquery-3.7.1.min.js"></script>
    <script src="read3.js"></script>
    <script src="search.js"></script>
    <title>Navbar</title>
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
                            <a class="readLink nav-link" href="read2.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="create.php">Add Bikes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="update.php">Update List</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="remove.php">Remove Bike</a>
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

    <?php
    $xml = new domdocument("1.0");
    $xml->load("Bikes.xml");
    $bikes = $xml->getElementsByTagName("bike");

    $flag = 0;
    $search = isset($_GET["search"]) ? $_GET["search"] : '';

    foreach ($bikes as $bike) {
        $itemNum = $bike->getAttribute("item");
        $brand = $bike->getElementsByTagName("brand")->item(0)->nodeValue;

        $brandLower = strtolower($brand);
        $brandUpper = strtoupper($brand);

        if (($search == $itemNum) || ($search == $brand) || ($search == $brandLower) || ($search == $brandUpper)) {
            $flag = 1;

            $model = $bike->getElementsByTagName("model")->item(0)->nodeValue;
            $price = $bike->getElementsByTagName("price")->item(0)->nodeValue;
            $wins = $bike->getElementsByTagName("wins")->item(0)->nodeValue;
            $teams = $bike->getElementsByTagName("teams")->item(0)->nodeValue;
            $picture = $bike->getElementsByTagName("picture")->item(0)->nodeValue;

            echo "<div class='card mb-4 border-0'>
            <div class='row no-gutters'>
                <div class='col-md-8'>
                    <div class='imgDiv text-center'>
                        <img src='data:image;base64," . $picture . "' class='img-fluid' alt='$brand'>
                    </div>
                </div>
                <div class='col-md-4'>
                    <div class='card-body'>
                        <h5 class='card-title'>$brand</h5>
                        <p class='card-text small'><strong>Item Number:</strong> $itemNum</p>
                        <p class='card-text small'><strong>Model:</strong> $model</p>
                        <p class='card-text small'><strong>Price:</strong> $price</p>
                        <p class='card-text small'><strong>Wins:</strong> $wins</p>
                        <p class='card-text small'><strong>Teams:</strong> $teams</p>
                    </div>
                </div>
            </div>
        </div>";
            break;
        }
    }
    if ($flag == 0) {
        echo "No record found...<br><a href='read.php'>Back</a>";
    }
    ?>
</body>

</html>