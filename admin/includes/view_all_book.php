    <!-- ================ALL Books =================== -->
    <div class="container">
        <div class="books">
            <div class="bookHeader d-flex justify-content-between mt-2">
                <h2> کتاب ها</h2>
                <a href="books.php?source=add_book" class="btn-1"> افزودن به لست کتاب ها</a>
            </div>
            <table class="content-table">
                <thead>
                    <tr>
                        <td>آی دی</td>
                        <td>نام</td>
                        <td>نویسنده</td>
                        <td>توضیحات</td>
                        <td>ناشر</td>
                        <td>قیمت</td>
                        <td> </td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $limit = 10;
                    $page = isset($_GET["page"]) ? $_GET["page"] : 1;
                    $start = ($page - 1) * $limit;

                    $select_all_book = mysqli_query($conn, "SELECT * FROM books LIMIT $start, $limit") or die(mysqli_error($conn));
                    $total_rows = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM books"));
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
                    ?>
                        <tr>
                            <td><?php echo $row["book_id"]; ?></td>
                            <td><?php echo $row["book_title"]; ?></td>
                            <td><?php echo $row["author_name"]; ?></td>
                            <td><?php echo $row["book_description"]; ?></td>
                            <td><?php echo $row["publisher"]; ?></td>
                            <td><?php echo $row["book_price"]; ?></td>
                            <td class="">
                                <a href="books.php?d_id=<?php echo $row["book_id"]; ?>" class=""><ion-icon name="trash-outline" class='text-danger'></ion-icon></a>
                                <a href="books.php?source=edit_book&b_id=<?php echo $row["book_id"]; ?>" class=""><ion-icon name="create-outline"></ion-icon></a>
                            </td>

                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>



            <!-- pagination -->
            <div class="text-center">
                <div class="pagination-1">
                    <a href="books.php?page=<?php echo $previous; ?>">&raquo;</a>
                    <?php
                    for ($i = 1; $i <= $total_pages; $i++) :

                        if ($i > 2 && $i < $total_pages - 2) {
                            echo "";
                        } else {
                    ?>
                            <a href="books.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                    <?php
                        }
                    endfor; ?>
                    <a href="books.php?page=<?php echo $next; ?>">&laquo;</a>
                </div>
            </div>
        </div>
    </div>