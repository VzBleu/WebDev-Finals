<?php
$xml = new domdocument("1.0");
$xml->formatOutput = true;
$xml->preserveWhiteSpace = false;
$xml->load("Bikes.xml");

$searchItemNum = $_POST["itemNum"];
$price = $_POST["newPrice"];
$wins = $_POST["newWins"];
$picture = $_POST["picture"];
$flag = 0;

$bikes = $xml->getElementsByTagName("bike");
foreach ($bikes as $bike) {
    $itemNum = $bike->getAttribute("item");
    if ($searchItemNum == $itemNum) {
        $flag = 1;
        $newBrand = $bike->getElementsByTagName("brand")->item(0)->nodeValue;
        $newModel = $bike->getElementsByTagName("model")->item(0)->nodeValue;
        $newTeams = $bike->getElementsByTagName("teams")->item(0)->nodeValue;

        $newNode = $xml->createElement("bike");
        $brand = $xml->createElement("brand", $newBrand);
        $model = $xml->createElement("model", $newModel);
        $teams = $xml->createElement("teams", $newTeams);

        $newPrice = $xml->createElement("price", "₱" . $price . "K");
        $newWins = $xml->createElement("wins", $wins);
        $pic = $xml->createElement("picture");
        $imageData = file_get_contents($picture);
        $base64 = base64_encode($imageData);
        $cdata = $xml->createCDATASection($base64);
        $pic->appendChild($cdata);

        $newNode->appendChild($brand);
        $newNode->appendChild($model);
        $newNode->appendChild($newPrice);
        $newNode->appendChild($newWins);
        $newNode->appendChild($teams);
        $newNode->appendChild($pic);
        $newNode->setAttribute("item", "$itemNum");

        $oldNode = $bike;

        $xml->getElementsByTagName("bikes")->item(0)->replaceChild($newNode, $oldNode);
        $xml->save("Bikes.xml");

        echo "<script>
        function redirectToPage() {
            window.location.href = 'update.php';
        }
        redirectToPage();
    </script>";
        break;
    }
}
if ($flag == 0)
    echo "Modification failed...<a href='update.php'>Back</a>";
?>