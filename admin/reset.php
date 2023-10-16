<?php
    include realpath(__DIR__ . '../.././includes/layout/dashboard-header.php');
    include realpath(__DIR__ . '../.././models/queue-facade.php');
	include realpath(__DIR__ . '../.././models/reports-facade.php');

    $queueFacade = new QueueFacade; 
	$reportsFacade = new ReportsFacade; 

	$queueFacade->reset();
	$reportsFacade->resetVideo();
	$reportsFacade->resetAnnouncement();

	header("Location: index");

?>