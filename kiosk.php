<?php 
    include realpath(__DIR__ . '/includes/layout/header.php');
    include realpath(__DIR__ . '/models/queue-facade.php');

    $queueFacade = new QueueFacade;    
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
                        <?php
                            $fetchServingSpecials = $queueFacade->fetchServing();
                            while ($row = $fetchServingSpecials->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                        <h1 class="display-4 fw-bold"><?= $row["number"] ?></h1>
                        <p class="m-0"><?= $row["type"] ?> <br> <?= $row["counter"] ?></p>
                        <?php } ?>
                    </div>
                </div>
                <div class="box">
                    <div>
                        <h4 class="text-uppercase fw-bold">Waiting</h4>
                        <h1 class="display-4 fw-bold">
                            <?php
                                $fetchWaitingSpecials = $queueFacade->fetchWaitingSpecial();
                                while ($row = $fetchWaitingSpecials->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                            <p><?= $row["number"] ?></p>
                            <?php } ?>
                        </h1>
                        <p>Special</p>
                    </div>
                </div>
                <div class="box">
                <div>
                        <h4 class="text-uppercase fw-bold">Waiting</h4>
                        <h1 class="display-4 fw-bold">
                            <?php
                                $fetchWaitingRegular = $queueFacade->fetchWaitingRegular();
                                while ($row = $fetchWaitingRegular->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                            <p><?= $row["number"] ?></p>
                            <?php } ?>
                        </h1>
                        <p>Regular</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    setTimeout(function(){
        window.location.reload(1);
    }, 1000);
</script>
<?php include realpath(__DIR__ . '/includes/layout/footer.php') ?>