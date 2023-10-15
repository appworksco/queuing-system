<?php
    include realpath(__DIR__ . '../.././includes/layout/dashboard-header.php');
    include realpath(__DIR__ . '../.././models/queue-facade.php');

    $queueFacade = new QueueFacade;

	if (isset($_SESSION["counter"])) {
		$counter = $_SESSION["counter"];
    }
	if (isset($_GET["regular_id"])) {
		$regularId = $_GET["regular_id"];
	}
	if (isset($_GET["number"])) {
		$number = $_GET["number"];
	}
	if (isset($_GET["type"])) {
		$type = $_GET["type"];
	}
	
	$serve = $queueFacade->serve($number, $type, $counter);
	if ($serve) {
		$doneRegular = $queueFacade->doneRegular($regularId);
		header("Location: index");
	}
?>