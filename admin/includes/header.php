<?php ob_start(); ?>
<?php session_start(); ?>
<?php 
if(!isset($_SESSION["user_role"])){
    header("location: ../index.php");
}
?>

<?php include "../functions/functions.php"; ?>
<?php include "../config/db.php"; ?>


<html dir="rtl" lang="fa">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>

    <!-- CSS FILE -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- BOOTSTRAP FILE -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-nU14brUcp6StFntEOOEBvcJm4huWjB0OcIeQ3fltAfSmuZFrkAif0T+UtNGlKKQv" crossorigin="anonymous">

    <!-- persian fonts -->
    <link rel="stylesheet" href="../css-persian-master/css/fonts.css">
</head>

<body>