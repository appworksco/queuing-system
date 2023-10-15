<?php
    include realpath(__DIR__ . '../.././includes/layout/dashboard-header.php');
    include realpath(__DIR__ . '../.././models/counters-facade.php');

    $countersFacade = new CountersFacade; 

	if (isset($_GET["counter_id"])) {
		$counterId = $_GET["counter_id"];
		$deleteCounter = $countersFacade->deleteCounter($counterId);
		if ($deleteCounter) {
			header("Location: counters?msg_invalid=Counter has been deleted successfully!");
		}
	}
?>