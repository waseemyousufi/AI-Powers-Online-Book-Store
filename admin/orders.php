<?php include "includes/header.php"; ?>
<?php include "templates/navigation.php"; ?>
<?php
if (isset($_GET["d_id"])) {
    $the_user_id = $_GET["d_id"];
    $delete_row = mysqli_query($conn, "DELETE FROM users WHERE user_id=$the_user_id") or die(mysqli_error($conn));
    header("location: users.php");
}

?>



<div class="main">
    <?php include "templates/topbar.php"; ?>
    <!-- ================ Users =================== -->
    <div class="container">
        <div class="order">
            <div class=orderHeader my-1">
                <h2>کاربران</h2>
            </div>


            <table dir="ltr" class="content-table">
                <thead>
                    <tr>
                        <!-- <td>User Id</td> -->
                        <td>Name</td>
                        <td>Last Name</td>
                        <td>Country</td>
                        <td>City</td>
                        <td>Address</td>
                        <td>Phone Number</td>
                        <td>Email</td>
                        <td>Payment</td>
                        <td>Orders</td>
                   

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $limit = 12;
                    $page = isset($_GET["page"]) ? $_GET["page"] : 1;
                    $start = ($page - 1) * $limit;

                    $select_all_book = mysqli_query($conn, "SELECT * FROM ordered LIMIT $start, $limit") or die(mysqli_error($conn));
                    $total_rows = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM ordered"));
                    $total_pages = ceil($total_rows / $limit);

                    if ($page > 1) {
                        $previous = $page - 1;
                    } else {
                        $previous = 1;
                    }
                    if ($page < $total_pages) {
                        $next = $page + 1;
                    } else {
                        $next = $total_pages;
                    }

                    while ($row = mysqli_fetch_assoc($select_all_book)) :
                        $username = $row["username"];
                        $lastname = $row["lastname"];
                        $country = $row["country"];
                        $city = $row["city"];
                        $user_address = $row["user_address"];
                        $phone_number = $row["phone_number"];
                        $email =  $row["email"];
                        $payment = $row["payment"];
                        $ordered_books = $row["ordered_books"];
                    ?>
                        <tr>
                            <td><?php echo $username; ?></td>
                            <td><?php echo $lastname; ?></td>
                            <td><?php echo $country; ?></td>
                            <td><?php echo $city; ?></td>
                            <td><?php echo $user_address; ?></td>
                            <td><?php echo $phone_number; ?></td>
                            <td><?php echo $email; ?></td>
                            <td><?php echo  $payment; ?></td>
                            <td><?php echo  $ordered_books; ?></td>

                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>



            <!-- pagination -->
            <div class="text-center">
                <div class="pagination-1 my-3">
                    <a href="orders.php?page=<?php echo $previous; ?>">&raquo;</a>
                    <?php
                    for ($i = 1; $i <= $total_pages; $i++) :
                        if ($i > 2 && $i < $total_pages - 2) {
                            echo "";
                        } else {
                    ?>
                            <a href="orders.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                    <?php
                        }
                    endfor; ?>
                    <a href="orders.php?page=<?php echo $next; ?>">&laquo;</a>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include "includes/footer.php"; ?>