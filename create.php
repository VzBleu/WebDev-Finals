<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="common1.css">
    <link rel="stylesheet" href="create.css">
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
<script>
    function check(itemNo) {
        if (itemNo.length == 0) {
            document.getElementById("txtPrompt").innerHTML = "";
        }
        else {
            http = new XMLHttpRequest();
            http.onreadystatechange = function () {
                if (http.readyState == 4 && http.status == 200) {
                    document.getElementById("txtPrompt").innerHTML = http.responseText;
                }
                else {
                    document.getElementById("txtPrompt").innerHTML = "Loading...";
                }
            };
            http.open("GET", "getItemNo.php?q=" + itemNo, true);
            http.send();
        }
    }
</script>

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
                            <a class="createLink nav-link" href="create.php">Add Bikes</a>
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

    <div class="container mt-5">
        <div class="row justify-content-center formDiv-custom">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center display-8">Register Bike</h3>
                    </div>
                    <div class="card-body">
                        <form method="post" action="createProcess.php">
                            <div class="form-group">
                                <label id="txtPrompt" class="d-block text-center"></label>
                                <input type="text" class="form-control form-control-custom" name="itemNum"
                                    placeholder="Item No." onkeyup="check(this.value)">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-custom" name="brand"
                                    placeholder="Brand">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-custom" name="model"
                                    placeholder="Model">
                            </div>
                            <div class="input-group input-group-custom">
                                <span class="input-group-text">₱</span>
                                <input type="text" class="form-control" name="price" placeholder="Price">
                                <span class="input-group-text">K</span>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-custom" name="wins"
                                    placeholder="Wins">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-custom" name="teams"
                                    placeholder="Teams">
                            </div>
                            <div class="form-group">
                                <input type="file" class="form-control-file file-input-custom" name="picture"
                                    id="picture">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary form-control-custom btn-custom"
                                    value="Add Bike">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
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