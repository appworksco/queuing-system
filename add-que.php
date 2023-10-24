<?php 
    include realpath(__DIR__ . '/includes/layout/header.php');
    include realpath(__DIR__ . '/models/reports-facade.php');

    $reportsFacade = new ReportsFacade;    
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

<div id="site-kiosk">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6 d-flex align-items-center justify-content-center" style="height: 100vh">
                <div class="w-100">
                    <a href="./user/add-special" class="btn btn-success btn-lg w-100 mb-1">Add Special</a>
                    <a href="./user/add-regular" class="btn btn-primary btn-lg w-100">Add Regular</a>
                </div>
            </div>
            <div class="col-lg-3"></div>
        </div>
    </div>
</div>

<?php include realpath(__DIR__ . '/includes/layout/footer.php') ?>