<?php 
    include realpath(__DIR__ . '../.././includes/layout/dashboard-header.php');
    include realpath(__DIR__ . '../.././models/queue-facade.php');

    $queueFacade = new QueueFacade;

    if (isset($_SESSION["counter"])) {
		$counter = $_SESSION["counter"];
    }
?>
    
<style>
    body {
        opacity: 1;
        background-image: radial-gradient(#cdd9e7 1.05px, #e5e5f7 1.05px);
        background-size: 21px 21px;
    }
    .container {
        height: 100vh;
    }
</style>

<div class="container bg-light">
    <div class="pt-2">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark p-0">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Queueing System</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="../logout">Sign Out</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    
    <div class="row">
        <!-- Special -->
        <div class="col-lg-6 p-2 pe-lg-0">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h6 class="card-title pt-2">Special</h6>
                </div>
                <div class="card-body">
                    <table id="example-user" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Number</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody> 
                            <?php
                                $fetchQueueSpecials = $queueFacade->fetchQueueSpecials();
                                while ($row = $fetchQueueSpecials->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                            <tr>
                                <td><?= $row["number"] ?></td>
                                <td><?= $row["status"] ?></td>
                                <td>
                                    <?php if ($row["status"] == 'Wait') { ?> 
                                        <a href="serve-special?special_id=<?= $row["id"] ?>&number=<?= $row["number"] ?>&type=<?= $row["type"] ?>" class="btn btn-info btn-sm">Call</a>
                                        <a href="done-special?special_id=<?= $row["id"] ?>" class="btn btn-success btn-sm">No Show</a>
                                    <?php } if ($row["status"] == 'Serving') {  ?>
                                        <a href="done-special?special_id=<?= $row["id"] ?>" class="btn btn-success btn-sm">Done</a>
                                    <?php } ?>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Regular -->
        <div class="col-lg-6 p-2 pe-lg-0">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h6 class="card-title pt-2">Regular</h6>
                </div>
                <div class="card-body">
                    <table id="example-user-1" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Number</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody> 
                            <?php
                                $fetchQueueRegulars = $queueFacade->fetchQueueRegulars();
                                while ($row = $fetchQueueRegulars->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                            <tr>
                                <td><?= $row["number"] ?></td>
                                <td><?= $row["status"] ?></td>
                                <td>
                                    <?php if ($row["status"] == 'Wait') { ?> 
                                        <a href="serve-regular?regular_id=<?= $row["id"] ?>&number=<?= $row["number"] ?>&type=<?= $row["type"] ?>" class="btn btn-info btn-sm">Call</a>
                                        <a href="done-regular?regular_id=<?= $row["id"] ?>" class="btn btn-success btn-sm">No Show</a>
                                    <?php } if ($row["status"] == 'Serving') {  ?>
                                        <a href="done-regular?regular_id=<?= $row["id"] ?>" class="btn btn-success btn-sm">Done</a>
                                    <?php } ?>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    setTimeout(function(){
        window.location.reload(1);
    }, 3000);
</script>
<?php include realpath(__DIR__ . '../.././includes/layout/dashboard-footer.php') ?>