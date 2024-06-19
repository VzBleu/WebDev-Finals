<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="common.css">
    <link rel="stylesheet" href="remove.css">
    <script src="bootstrap.bundle.min.js"></script>
    <script src="jquery-3.7.1.min.js"></script>
    <script src="read3.js"></script>
    <title>Navbar</title>
    <style>
        .suggestions {
            border: 1px solid #ddd;
            border-top: 0;
            max-height: 200px;
            overflow-y: auto;
        }

        .suggestion-item {
            padding: 10px;
            cursor: pointer;
        }

        .suggestion-item:hover {
            background-color: #f0f0f0;
        }
    </style>
    <script>
        $(document).ready(function () {
            $('#searchBar').on('input', function () {
                let query = $(this).val().trim();
                if (query.length > 0) {
                    $.ajax({
                        url: 'Bikes.xml',
                        dataType: 'xml',
                        success: function (data) {
                            let suggestions = '';
                            $(data).find('bike').each(function () {
                                let brand = $(this).find('brand').text();
                                if (brand.toLowerCase().includes(query.toLowerCase())) {
                                    suggestions += '<div class="suggestion-item" data-brand="' + brand + '">' + brand + '</div>';
                                }
                            });
                            $('#suggestions').html(suggestions).show();
                        },
                        error: function () {
                            $('#suggestions').html('<div class="suggestion-item">Error loading suggestions</div>').show();
                        }
                    });
                } else {
                    $('#suggestions').hide();
                }
            });

            $('#suggestions').on('click', '.suggestion-item', function () {
                let selectedBrand = $(this).data('brand');
                window.location.href = 'searchProcess.php?search=' + encodeURIComponent(selectedBrand);
            });


            $(document).click(function (e) {
                if (!$(e.target).closest('#searchBar, #suggestions').length) {
                    $('#suggestions').hide();
                }
            });
        });
    </script>
</head>

<body>
    <div class="container mt-5">
        <h2>Bike Brand Search</h2>
        <div class="form-group">
            <input type="text" id="searchBar" class="form-control" placeholder="Search for bike brands...">
            <div id="suggestions" class="suggestions"></div>
        </div>
    </div>
</body>

</html>