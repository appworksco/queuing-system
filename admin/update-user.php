<?php 
    include realpath(__DIR__ . '../.././includes/layout/dashboard-header.php');
    include realpath(__DIR__ . '../.././models/users-facade.php');
  
    $usersFacade = new usersFacade; 

    if (isset($_GET["user_id"])) {
        $userId = $_GET["user_id"];
    }

    if (isset($_POST["submit"])) {
        $userId = $_POST["user_id"];
        $firstName = $_POST["first_name"];
        $lastName = $_POST["last_name"];
        $username = $_POST["username"];
        $password = $_POST["password"];

        if (empty($firstName)) {
          array_push($invalid, 'Department should not be empty!');
        } if (empty($lastName)) {
            array_push($invalid, 'Last Name should not be empty!');
        } if (empty($username)) {
            array_push($invalid, 'Username should not be empty!');
        } if (empty($password)) {
            array_push($invalid, 'Password should not be empty!');
        } else {
            $updateUser = $usersFacade->updateUser($userId, $firstName, $lastName, $username, $password);
            if ($updateUser) {
                header("Location: users?msg_success=User has been added successfully!");
            }
        }
    }
?>

<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Queuing System</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
    <div class="navbar-nav">
        <div class="nav-item text-nowrap">
            <a class="nav-link px-3" href="../logout">Sign out</a>
        </div>
    </div>
</header>

<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="departments">
                            <span data-feather="home"></span> Departments
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="counters">
                            <span data-feather="monitor"></span> Counters
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="users">
                            <span data-feather="users"></span> Users
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="reports">
                            <span data-feather="bar-chart-2"></span> Reports
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="reset">
                            <span data-feather="settings"></span> Reset
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="site-departments pt-4">
                <div class="d-flex align-items-center justify-content-between">
                    <h3>Add User</h3>
                </div>
                <hr>
                <?php include('../errors.php'); ?>
                <div class="form-group bg-light p-3">
                    <form action="update-user" method="post">
                        <input type="hidden" value="<?= $userId ?>" name="user_id">
                        <?php
                            $fetchUsersById = $usersFacade->fetchUsersById($userId);
                            while ($row = $fetchUsersById->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                        <label for="firstName" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="firstName" value="<?= $row["first_name"] ?>" placeholder="First Name" name="first_name">
                        <label for="lastName" class="form-label mt-2">Last Name</label>
                        <input type="text" class="form-control" id="lastName" value="<?= $row["last_name"] ?>" placeholder="Last Name" name="last_name">
                        <label for="username" class="form-label mt-2">Username</label>
                        <input type="text" class="form-control" id="username" value="<?= $row["username"] ?>" placeholder="Username" name="username">
                        <label for="password" class="form-label mt-2">Password</label>
                        <input type="password" class="form-control" id="password" value="<?= $row["password"] ?>" placeholder="Password" name="password">
                        <?php } ?>
                        <button class="btn btn-primary btn-sm mt-2" type="submit" name="submit">Submit</button>
                    </form>
                </div>
            </div>
        </main>
    </div>
</div>

<?php include realpath(__DIR__ . '../.././includes/layout/dashboard-footer.php') ?>