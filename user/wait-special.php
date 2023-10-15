<?php
    include realpath(__DIR__ . '../.././includes/layout/dashboard-header.php');
    include realpath(__DIR__ . '../.././models/queue-facade.php');

    $queueFacade = new QueueFacade;

	if (isset($_GET["special_id"])) {
		$specialId = $_GET["special_id"];
		$waitSpecial = $queueFacade->waitSpecial($specialId);
		if ($waitSpecial) {
			header("Location: index");
		}
	}
?>