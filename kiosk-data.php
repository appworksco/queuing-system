<?php 
    include realpath(__DIR__ . '/includes/layout/header.php');
    include realpath(__DIR__ . '/models/queue-facade.php');

    $queueFacade = new QueueFacade;    
?>

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

<script>
    setTimeout(function(){
        window.location.reload(1);
    }, 5000);
</script>
<?php include realpath(__DIR__ . '/includes/layout/footer.php') ?>