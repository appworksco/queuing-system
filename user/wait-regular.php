<?php
    include realpath(__DIR__ . '../.././includes/layout/dashboard-header.php');
    include realpath(__DIR__ . '../.././models/queue-facade.php');

    $queueFacade = new QueueFacade;

	if (isset($_GET["regular_id"])) {
		$regularId = $_GET["regular_id"];
		$waitRegular = $queueFacade->waitRegular($regularId);
		if ($waitRegular) {
			header("Location: index");
		}
	}
?>