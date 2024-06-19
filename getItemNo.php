<?php
$xml = new domdocument();
$xml->load("Bikes.xml");
$bikes = $xml->getElementsByTagName("bike");

$itemNo = $_REQUEST["q"];
$flag = 0;
foreach ($bikes as $bike) {
	$searchItemNo = $bike->getAttribute('item');
	if (strtolower($itemNo) == $searchItemNo) {
		$flag = 1;
		echo "<p class='text-danger'>Item No. " . $itemNo . " already exists.</p>";
		break;
	}
}
if ($flag == 0)
	echo "<p class='text-success'> Item No. " . $itemNo . " is still available.</p>";
?>