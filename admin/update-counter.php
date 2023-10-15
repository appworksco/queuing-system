<?php 
    include realpath(__DIR__ . '../.././includes/layout/dashboard-header.php');
    include realpath(__DIR__ . '../.././models/counters-facade.php');
  
    $countersFacade = new CountersFacade; 

    if (isset($_GET["counter_id"])) {
        $counterId = $_GET["counter_id"];
    }

    if (isset($_POST["submit"])) {
        $counterId = $_POST["counter_id"];
        $counter = $_POST["counter"];
    
        if (empty($counter)) {
          array_push($invalid, 'Counter should not be empty!');
        }   else {
            $verifyCounter = $countersFacade->verifyCounter($counter);
            if ($verifyCounter == 1) {
                header("Location: counters.php?msg_invalid=Counter already exist!");
            } else {
                $updateCounter = $countersFacade->updateCounter($counter, $counterId);
                if ($updateCounter) {
                    header("Location: counters.php?msg_success=Counter has been added successfully!");
                }
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
                        <a class="nav-link active" href="counters">
                            <span data-feather="monitor"></span> Counters
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="users"></span> Users
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="bar-chart-2"></span> Reports
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="site-departments pt-4">
                <div class="d-flex align-items-center justify-content-between">
                    <h3>Update Counter</h3>
                </div>
                <hr>
                <?php include('../errors.php'); ?>
                <div class="form-group bg-light p-3">
                    <form action="update-counter" method="post">
                        <input type="hidden" value="<?= $counterId ?>" name="counter_id">
                        <label for="counter" class="form-label">Counter</label>
                        <?php
                            $fetchCounterById = $countersFacade->fetchCounterById($counterId);
                            while ($row = $fetchCounterById->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                        <input type="text" class="form-control" id="counter" value="<?= $row["counter"] ?>" placeholder="counter" name="counter">
                        <?php } ?>
                        <button class="btn btn-primary btn-sm mt-2" type="submit" name="submit">Submit</button>
                    </form>
                </div>
            </div>
        </main>
    </div>
</div>

<?php include realpath(__DIR__ . '../.././includes/layout/dashboard-footer.php') ?>