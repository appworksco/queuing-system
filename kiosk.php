<?php include realpath(__DIR__ . '/includes/layout/header.php') ?>
    
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
            <div class="col-8 bg-light p-0">
                <div class="video">
                    
                </div>
                <div class="announcement">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="text-uppercase fw-bold">Announcement</h4>
                            <p class="lead">asdasd</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 p-0">
                <div class="box bg-dark text-light">
                    <div>
                        <h4 class="text-uppercase fw-bold">Now Serving</h4>
                        <h1 class="display-4 fw-bold">0</h1>
                    </div>
                </div>
                <div class="box">
                    <div>
                        <h4 class="text-uppercase fw-bold">Waiting</h4>
                        <h1 class="display-4 fw-bold">0</h1>
                    </div>
                </div>
                <div class="box">
                    <div>
                        <h4 class="text-uppercase fw-bold">Waiting</h4>
                        <h1 class="display-4 fw-bold">0</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include realpath(__DIR__ . '/includes/layout/footer.php') ?>