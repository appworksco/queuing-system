<?php
    include realpath(__DIR__ . '../.././includes/layout/dashboard-header.php');
    include realpath(__DIR__ . '../.././models/queue-facade.php');

    $queueFacade = new QueueFacade;

	if (isset($_SESSION["counter"])) {
		$counter = $_SESSION["counter"];
    }
	if (isset($_GET["special_id"])) {
		$specialId = $_GET["special_id"];
	}
	if (isset($_GET["number"])) {
		$number = $_GET["number"];
	}
	if (isset($_GET["type"])) {
		$type = $_GET["type"];
	}
	
	$serve = $queueFacade->serve($number, $type, $counter);
	if ($serve) {
		$serveSpecials = $queueFacade->serveSpecials($specialId); ?>
		<audio id="audio" src=".././dist/sfx/bell.mp3"></audio>
	<?php }
?>

<script>
	var audio = document.getElementById("audio");
	audio.play();

	var count = 2;
	setInterval(function(){
		count--;
		if (count == 0) {
			window.location = 'index.php'; 
		}
	},1000);
</script>