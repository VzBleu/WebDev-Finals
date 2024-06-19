<?php
$xml = new domdocument("1.0");
$xml->load("Bikes.xml");
$bikes = $xml->getElementsByTagName("bike");

$searchItemNum = $_POST["itemNum"];

foreach ($bikes as $bike) {
    $itemNum = $bike->getAttribute("item");

    if ($searchItemNum == $itemNum) {
        $xml->getElementsByTagName("bikes")->item(0)->removeChild($bike);
        $xml->save("Bikes.xml");
        echo "<script>
        function redirectToPage() {
            window.location.href = 'remove.php';
        }
        redirectToPage();
    </script>";

        break;
    }
}
?>