<?php

    include realpath(__DIR__ . '../.././includes/layout/dashboard-header.php');
    include realpath(__DIR__ . '../.././models/queue-facade.php');

    $queueFacade = new QueueFacade;

    use Mike42\Escpos;
    use Mike42\Escpos\Printer;
    use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
    use Mike42\Escpos\PrintConnectors\FilePrintConnector;
    use Mike42\Escpos\PrintBuffers\ImagePrintBuffer;
    use Mike42\Escpos\CapabilityProfiles\DefaultCapabilityProfile;
    use Mike42\Escpos\CapabilityProfiles\SimpleCapabilityProfile;

    $connector = new WindowsPrintConnector("smb://". getenv('COMPUTERNAME') ."/xprinter");
    $printer = new Printer($connector);
    $date = date("m-d-Y");

    $printer -> setJustification(Printer::JUSTIFY_CENTER);
    $printer -> feed(1);
    $printer -> setTextSize(2, 2);
    $printer -> text("Special\n");
    $printer -> feed(1);
    $printer -> setTextSize(1, 1);
    $printer -> text("************************\n");
    $printer -> feed(2);
    $printer -> setTextSize(8, 8);
    
    $fetchQueueSpecial = $queueFacade->fetchQueueSpecial();
    if ($fetchQueueSpecial == 0) {
        $number = 1;
        $type = 'Special';
        $status = 'Wait';
        $addNumberSpecial = $queueFacade->addNumberSpecial($number, $type, $status);
    } else {
        // get latest data and add 1
        $fetchLatestNumberSpecial = $queueFacade->fetchLatestNumberSpecial();
        while ($row = $fetchLatestNumberSpecial->fetch(PDO::FETCH_ASSOC)) {
            $number = $row["number"] + 1;
            $type = 'Special';
            $status = 'Wait';
            $addNumberSpecial = $queueFacade->addNumberSpecial($number, $type, $status);
        }
    }

    $printer -> text("$number\n");
    $printer -> feed(2);
    $printer -> setTextSize(1, 1);
    $printer -> text("************************\n");
    $printer -> feed(2);
    $printer -> setTextSize(2, 2);
    $printer -> text("$date\n");
    $printer -> cut();
    $printer -> pulse();
    $printer -> close();

    header("Location: ../add-que");