<?php 
    include realpath(__DIR__ . '../.././includes/layout/dashboard-header.php');
    include realpath(__DIR__ . '../.././models/reports-facade.php');
  
    $reportsFacade = new ReportsFacade; 

    if (isset($_POST["submit"])) {
        $message = $_POST["message"];
    
        if (empty($message)) {
          array_push($invalid, 'Message should not be empty!');
        }   else {

            $updateAnnouncement = $reportsFacade->updateAnnouncement($message);
            if ($updateAnnouncement) {
                header("Location: reports.php?msg_success=Announcement has been updated successfully!");
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
                        <a class="nav-link" href="users">
                            <span data-feather="users"></span> Users
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="reports">
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
                    <h3>Update Message</h3>
                </div>
                <hr>
                <?php include('../errors.php'); ?>
                <div class="form-group bg-light p-3">
                    <form action="update-announcement" method="post">
                        <label for="message" class="form-label">Message</label>
                        <textarea name="message" id="message" class="w-100 p-1" placeholder="Message" style="height: 100px"></textarea>
                        <button class="btn btn-primary btn-sm mt-2" type="submit" name="submit">Submit</button>
                    </form>
                </div>
            </div>
        </main>
    </div>
</div>

<?php include realpath(__DIR__ . '../.././includes/layout/dashboard-footer.php') ?>