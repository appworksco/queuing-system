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
            <div class="col-8 bg-light p-0">
                <div class="video">
                <?php
                    $fetchVideo = $reportsFacade->fetchVideo();
                    while ($row = $fetchVideo->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <iframe class="w-100 h-100" src="<?= $row["link"] ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                <?php } ?>
                </div>
                <div class="announcement">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="text-uppercase fw-bold">Announcement</h4>
                            <?php
                                $fetchAnnouncement = $reportsFacade->fetchAnnouncement();
                                while ($row = $fetchAnnouncement->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                            <p class="lead"><?= $row["message"] ?></p>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div id="refreshData" class="col-4 p-0">
                <iframe class="w-100 h-100" src="kiosk-data.php" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>

<?php include realpath(__DIR__ . '/includes/layout/footer.php') ?>