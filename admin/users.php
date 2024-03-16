<?php include "includes/header.php"; ?>
<?php include "templates/navigation.php"; ?>
<?php
if (isset($_GET["d_id"])) {
    // $the_user_id = $_GET["d_id"];
    // $delete_row = mysqli_query($conn, "DELETE FROM users WHERE user_id=$the_user_id") or die(mysqli_error($conn));
    // header("location: users.php");
}

?>



<div class="main">
    <?php include "templates/topbar.php"; ?>
    <!-- ================ Users =================== -->

    <?php if (isset($_GET["source"])) {
        $source = $_GET["source"];
    } else {
        $source = "";
    }
    switch ($source) {
        case "edit_users":
            include "includes/edit_user.php";
            break;
        default:
            include "includes/view_all_users.php";
            break;
    }

    ?>

</div>


<?php include "includes/footer.php"; ?>