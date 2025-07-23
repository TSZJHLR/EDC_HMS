<?php

session_start();
include_once 'config/Database.php';
include_once 'config/Security.php';
include_once 'classes/DataEntry.php';
include_once 'classes/Validator.php';
include_once 'classes/FormHandler.php';

$database = new Database();
$db = $database->connect();
$dataEntry = new DataEntry($db);
$formHandler = new FormHandler($dataEntry);

// handle form submissions
$alert = $formHandler->handleRequest();

// get data for display
$entries = $dataEntry->read();
$stats = $dataEntry->getStats();

// page variables
$pageTitle = "Dashboard - EDC System";
$bodyClass = "dashboard-body";
$footerClass = "dashboard-footer";

include 'includes/header.php';
include 'includes/dashboard-header.php';
?>

<div class="dashboard-container">
    <?php include 'includes/sidebar.php'; ?>
    
    <main class="main-content">
        <?php include 'includes/alert.php'; ?>
        <?php include 'includes/data-table.php'; ?>
        <?php include 'includes/data-form.php'; ?>
        <?php include 'includes/stats.php'; ?>
    </main>
</div>

<?php 
include 'includes/scripts.php';
include 'includes/footer.php'; 
?>