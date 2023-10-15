<?php
    include realpath(__DIR__ . '../.././includes/layout/dashboard-header.php');
    include realpath(__DIR__ . '../.././models/users-facade.php');

    $usersFacade = new UsersFacade;

	if (isset($_GET["user_id"])) {
		$userId = $_GET["user_id"];
		$deleteUser = $usersFacade->deleteUser($userId);
		if ($deleteUser) {
			header("Location: users?msg_invalid=User has been deleted successfully!");
		}
	}
?>