    <!-- ================ALL Users =================== -->
    <div class="container">
        <div class="users">
            <div class="userHeader my-1">
                <h2>کاربران</h2>
            </div>


            <table dir="ltr" class="content-table">
                <thead>
                    <tr>
                        <td>User Id</td>
                        <td>Name</td>
                        <td>Last Name</td>
                        <td>Email</td>
                        <td>User Role</td>
                        <td></td>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $limit = 12;
                    $page = isset($_GET["page"]) ? $_GET["page"] : 1;
                    $start = ($page - 1) * $limit;

                    $select_all_book = mysqli_query($conn, "SELECT * FROM users LIMIT $start, $limit") or die(mysqli_error($conn));
                    $total_rows = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users"));
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
                        $user_id = $row["user_id"];
                        $username = $row["username"];
                        $lastname = $row["lastname"];
                        $email =  $row["email"];
                        $user_role = $row["user_role"];
                    ?>
                        <tr>
                            <td><?php echo $user_id; ?></td>
                            <td><?php echo $username; ?></td>
                            <td><?php echo $lastname; ?></td>
                            <td><?php echo $email; ?></td>
                            <td><?php echo  $user_role; ?></td>
                            <!-- <td class="">
                                <?php if ($user_role == 'admin') {
                                    echo "<a href='./users.php?source=edit_users&edit_id=$user_id'><ion-icon name='create-outline'></ion-icon></a>";
                                } else { ?>
                                    <a href='./users.php?source=edit_users&edit_id=<?php echo $user_id; ?>'><ion-icon name='create-outline'></ion-icon></a>
                                    <a href="users.php?d_id=<?php echo $user_id; ?>"><ion-icon name="trash-outline" class='text-danger'></ion-icon></a>

                                <?php } ?>
                            </td> -->
                            <td>
                                <a href='./users.php?source=edit_users&edit_id=<?php echo $user_id; ?>'><ion-icon name='create-outline'></ion-icon></a>
                                <a href="users.php?d_id=<?php echo $user_id; ?>"><ion-icon name="trash-outline" class='text-danger'></ion-icon></a>
                            </td>


                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>



            <!-- pagination -->
            <div class="text-center">
                <div class="pagination-1 my-3">
                    <a href="users.php?page=<?php echo $previous; ?>">&raquo;</a>
                    <?php
                    for ($i = 1; $i <= $total_pages; $i++) :
                        if ($i > 2 && $i < $total_pages - 2) {
                            echo "";
                        } else {
                    ?>
                            <a href="users.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                    <?php
                        }
                    endfor; ?>
                    <a href="users.php?page=<?php echo $next; ?>">&laquo;</a>
                </div>
            </div>
        </div>
    </div>