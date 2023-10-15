<?php 
    include realpath(__DIR__ . '../.././includes/layout/dashboard-header.php');
    include realpath(__DIR__ . '../.././models/departments-facade.php');
  
    $departmentsFacade = new DepartmentsFacade; 

    if (isset($_GET["msg_invalid"])) {
        $msg = $_GET["msg_invalid"];
        array_push($invalid, $msg);
    }
    if (isset($_GET["msg_success"])) {
        $msg = $_GET["msg_success"];
        array_push($success, $msg);
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
                        <a class="nav-link active" href="departments">
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
                        <a class="nav-link" href="reports">
                            <span data-feather="bar-chart-2"></span> Reports
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="site-departments pt-4">
                <div class="d-flex align-items-center justify-content-between">
                    <h3>Department</h3>
                    <a href="add-department" class="btn btn-primary btn-sm">Add Department</a>
                </div>
                <hr>
                <?php include('../errors.php'); ?>
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Department</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody> 
                        <?php
                            $fetchDepartments = $departmentsFacade->fetchDepartments();
                            while ($row = $fetchDepartments->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                        <tr>
                            <td><?= $row["department"] ?></td>
                            <td>
                                <a href="update-department?department_id=<?= $row["id"] ?>" class="btn btn-info btn-sm">Update</a>
                                <a href="delete-department?department_id=<?= $row["id"] ?>" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>

<?php include realpath(__DIR__ . '../.././includes/layout/dashboard-footer.php') ?>