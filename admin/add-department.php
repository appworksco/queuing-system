<?php 
    include realpath(__DIR__ . '../.././includes/layout/dashboard-header.php');
    include realpath(__DIR__ . '../.././models/departments-facade.php');
  
    $departmentsFacade = new DepartmentsFacade; 

    if (isset($_POST["submit"])) {
        $department = $_POST["department"];
    
        if (empty($department)) {
          array_push($invalid, 'Department should not be empty!');
        }   else {
            $verifyDeparment = $departmentsFacade->verifyDepartment($department);
            if ($verifyDeparment == 1) {
                array_push($invalid, "Department already exist!");
            } else {
                $addDepartment = $departmentsFacade->addDepartment($department);
                if ($addDepartment) {
                    header("Location: departments?msg_success=Department has been added successfully!");
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
                        <a class="nav-link active" href="departments">
                            <span data-feather="home"></span> Departments
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
                    <h3>Add Department</h3>
                </div>
                <hr>
                <?php include('../errors.php'); ?>
                <div class="form-group bg-light p-3">
                    <form action="add-department" method="post">
                        <label for="department" class="form-label">Department</label>
                        <input type="text" class="form-control" id="department" placeholder="Department" name="department">
                        <button class="btn btn-primary btn-sm mt-2" type="submit" name="submit">Submit</button>
                    </form>
                </div>
            </div>
        </main>
    </div>
</div>

<?php include realpath(__DIR__ . '../.././includes/layout/dashboard-footer.php') ?>