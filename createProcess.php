<?php
$xml = new domdocument("1.0");
$xml->formatOutput = true;
$xml->preserveWhiteSpace = false;
$xml->load("Bikes.xml");

$itemNum = $_POST["itemNum"];
$brand = $_POST["brand"];
$model = $_POST["model"];
$price = $_POST["price"];
$wins = $_POST["wins"];
$teams = $_POST["teams"];
$picture = $_POST["picture"];

$bikelmnt = $xml->createElement("bike");
$brandlmnt = $xml->createElement("brand", $brand);
$modellmnt = $xml->createElement("model", $model);
$pricelmnt = $xml->createElement("price", $price);
$winslmnt = $xml->createElement("wins", $wins);
$teamslmnt = $xml->createElement("teams", $teams);

$pic = $xml->createElement("picture");
$imageData = file_get_contents($picture);
$base64 = base64_encode($imageData);
$cdata = $xml->createCDATASection($base64);
$pic->appendChild($cdata);

$bikelmnt->appendChild($brandlmnt);
$bikelmnt->appendChild($modellmnt);
$bikelmnt->appendChild($pricelmnt);
$bikelmnt->appendChild($winslmnt);
$bikelmnt->appendChild($teamslmnt);
$bikelmnt->appendChild($pic);

$bikelmnt->setAttribute("item", $itemNum);
$xml->getElementsByTagName("bikes")->item(0)->appendchild($bikelmnt);
$xml->save("Bikes.xml");
echo "<script>
    function redirectToPage() {
        window.location.href = 'create.php';
    }
    redirectToPage();
</script>";
?>