<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="read3.css">
    <link rel="stylesheet" href="common1.css">
    <script src="bootstrap.bundle.min.js"></script>
    <script src="jquery-3.7.1.min.js"></script>
    <script src="read3.js"></script>
    <script src="search.js"></script>
    <title>Navbar</title>
    <style>
        .navbar {
            display: none;
            /* Initially hide the navbar */
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
    <div class="full-screen-image">
        <img src="Bike Race.jpg" alt="Full Screen Image" class="fade-in-image">
    </div>

    <div class="centered-text">
        <h1>Internationally Competitive Winning Bicycles</h1>
        <p>We provide description on the latest bikes that have triumphed in major races. Whether you're an
            experienced cyclist looking to upgrade or just curious about
            these high-performance bikes, our site offers everything you need to stay informed and inspired.</p>
    </div>

    <!--CAROUSEL-->
    <?php
    // Load the XML file
    $xml = new DOMDocument("1.0");
    $xml->load("Bikes.xml");

    $bikes = $xml->getElementsByTagName("bike");

    // Start the carousel HTML
    echo '<div class="carouselDiv container mt-5">';
    echo '<div id="gallery" class="carousel slide" data-bs-ride="carousel">';

    // Carousel indicators
    echo '<div class="carousel-indicators">';
    foreach ($bikes as $index => $bike) {
        $activeClass = $index === 0 ? 'class="active" aria-current="true"' : '';
        echo '<button type="button" data-bs-target="#gallery" data-bs-slide-to="' . $index . '" ' . $activeClass . ' aria-label="Slide ' . ($index + 1) . '"></button>';
    }
    echo '</div>';

    // Carousel inner
    echo '<div class="carousel-inner">';
    foreach ($bikes as $index => $bike) {
        $itemNum = $bike->getAttribute("item");
        $brand = $bike->getElementsByTagName("brand")->item(0)->nodeValue;
        $model = $bike->getElementsByTagName("model")->item(0)->nodeValue;
        $price = $bike->getElementsByTagName("price")->item(0)->nodeValue;
        $wins = $bike->getElementsByTagName("wins")->item(0)->nodeValue;
        $teams = $bike->getElementsByTagName("teams")->item(0)->nodeValue;
        $picture = $bike->getElementsByTagName("picture")->item(0)->nodeValue;

        // Active class for the first item
        $activeClass = $index === 0 ? 'active' : '';

        echo '<div class="carousel-item ' . $activeClass . '">';
        echo '<img src="data:image;base64,' . $picture . '" class="d-block w-100 carousel-image" alt="' . $brand . '">';
        echo '<div class="carousel-caption d-none d-md-block text-shadow">';
        echo '<h5>' . $brand . ' - ' . $model . '</h5>';
        echo '<p>Price: ' . $price . '</p>';
        echo '</div>';
        echo '</div>';
    }
    echo '</div>'; // End of carousel-inner
    
    // Carousel controls (optional)
    echo '<button class="carousel-control-prev" type="button" data-bs-target="#gallery" data-bs-slide="prev">';
    echo '<span class="carousel-control-prev-icon" aria-hidden="true"></span>';
    echo '<span class="visually-hidden">Previous</span>';
    echo '</button>';
    echo '<button class="carousel-control-next" type="button" data-bs-target="#gallery" data-bs-slide="next">';
    echo '<span class="carousel-control-next-icon" aria-hidden="true"></span>';
    echo '<span class="visually-hidden">Next</span>';
    echo '</button>';

    echo '</div>';
    echo '</div>';


    ?>


    <footer class=" text-center text-lg-start">
        <div class="container p-2">
            <div class="row">

                <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">About Us</h5>
                    <p>
                        We offer insights into the newest bicycles that have excelled in prominent competitions. Whether
                        you're a seasoned rider seeking an upgrade or simply intrigued by these top-performing bicycles,
                        our platform provides all the information to keep you informed and motivated.
                    </p>
                </div>



                <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Links</h5>
                    <ul class="list-unstyled mb-0">
                        <li>
                            <a href="#!" class="text-dark">facebook.com</a>
                        </li>
                        <li>
                            <a href="#!" class="text-dark">x.com</a>
                        </li>
                        <li>
                            <a href="#!" class="text-dark">linkedin.com</a>
                        </li>
                        <li>
                            <a href="#!" class="text-dark">reddit.com</a>
                        </li>
                    </ul>
                </div>



                <div class="col-lg-4 col-md-12 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Contact</h5>
                    <p>
                        <a href="#!" class="text-dark">stagewinningbikes@email.com</a><br>
                        <a href="#!" class="text-dark">+923456789101</a>
                    </p>
                </div>

            </div>
        </div>


        <div class="text-center p-2 bg-light" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2024 Copyright:
            <a class="text-dark" href="#">StageWinningBikes.com</a>
        </div>

    </footer>
</body>

</html>