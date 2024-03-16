<?php include "includes/header.php"; ?>
<?php include "templates/navigation.php"; ?>
<?php
if (isset($_GET["d_id"])) {
    $the_book_id = $_GET["d_id"];
    $delete_row = mysqli_query($conn, "DELETE FROM books WHERE book_id=$the_book_id") or die(mysqli_error($conn));
    header("location: books.php");
}
?>
<div class="main">
    <?php include "templates/topbar.php"; ?>

    <?php
    if (isset($_GET["source"])) {
        $source = $_GET["source"];
    } else {
        $source = "";
    }
    switch ($source) {
        case "add_book":
            include "includes/add_book.php";
            break;
        case "edit_book":
            include "includes/edit_book.php";
            break;
        default:
            include "includes/view_all_book.php";
            break;
    }
    ?>


</div>


<?php include "includes/footer.php"; ?>