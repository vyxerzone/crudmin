<?php
ob_start();
session_start();
include("config.php");
$error_message = '';
$success_message = '';
$error_message1 = '';
$success_message1 = '';


// Check if the user is logged in or not
if(!isset($_SESSION['user'])) {
	header('location: ../login.php');
	exit;
}

 //   $q = $pdo->prepare("SELECT * FROM usuarios WHERE id=?");
 //   $q->execute([1]);
 //   $res = $q->fetchAll();
 //   foreach ($res as $row) {
 //       $active_editor = $row['active_editor'];
 //   }

// Current Page Access Level check for all pages
$cur_page = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
?>

<?php include "datosdemo.php"; ?>
<?php include "sidebar.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo "$TituloSitio"; ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>
  <?php include "navbar.php"; ?>