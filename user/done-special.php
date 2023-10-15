<?php
    include realpath(__DIR__ . '../.././includes/layout/dashboard-header.php');
    include realpath(__DIR__ . '../.././models/queue-facade.php');

    $queueFacade = new QueueFacade;

	if (isset($_GET["special_id"])) {
		$specialId = $_GET["special_id"];
		$doneSpecial = $queueFacade->doneSpecial($specialId);
		if ($doneSpecial) {
			header("Location: index");
		}
	}
?>