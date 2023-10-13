<?php

session_start();
ob_start();

$invalid = array();
$success = array();
$info = array();

// Require the Composer autoload file to autoload PHP dependencies.
require_once realpath(__DIR__ . '/vendor/autoload.php');

// Require the conn.php file located in the 'db' directory.
require realpath(__DIR__ . '/db/conn.php');