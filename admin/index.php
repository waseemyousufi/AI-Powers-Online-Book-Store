<?php include "includes/header.php"; ?>
<?php include "templates/navigation.php"; ?>

<div class="main">

    <!-- ================= topbar =================== -->
    <?php include "templates/topbar.php"; ?>
    
    <!-- ================= Cards =================== -->
    <div class="cardBox">
        <a href="./books.php" class="card text-decoration-none">
            <div>
                <?php
                $select_all_book = mysqli_query($conn,  "SELECT *  FROM books") or die(mysqli_error($conn));
                $book_count = mysqli_num_rows($select_all_book);
                ?>
                <div class="numbers"><?php echo $book_count; ?></div>
                <div class="cardName">کتاب ها</div>
            </div>
            <div class="iconBox">
                <ion-icon name="library-outline"></ion-icon>

            </div>
        </a>
        <a href="./users.php" class="card text-decoration-none">
            <div>
                <?php
                $select_all_user = mysqli_query($conn,  "SELECT *  FROM users") or die(mysqli_error($conn));
                $user_count = mysqli_num_rows($select_all_user);
                ?>
                <div class="numbers"><?php echo $user_count; ?></div>
                <div class="cardName">کاربران</div>
            </div>
            <div class="iconBox">
                <ion-icon name="person-outline"></ion-icon>
            </div>
        </a>
        <a href="./categories.php" class="card text-decoration-none">
            <div>
                <?php
                $select_all_cat = mysqli_query($conn,  "SELECT DISTINCT(cat_title) FROM category") or die(mysqli_error($conn));
                $cat_count = mysqli_num_rows($select_all_cat);
                ?>
                <div class="numbers"><?php echo $cat_count; ?></div>
                <div class="cardName">دسته بندی ها</div>
            </div>
            <div class="iconBox">
                <ion-icon name="grid-outline"></ion-icon>
            </div>
        </a>
        <a class="card text-decoration-none">
            <div>
                <?php
                $select_all_order = mysqli_query($conn,  "SELECT *  FROM ordered") or die(mysqli_error($conn));
                $order_count = mysqli_num_rows($select_all_order);
                ?>
                <div class="numbers"><?php echo $order_count; ?></div>
                <div class="cardName">فروشات</div>
            </div>
            <div class="iconBox">
                <ion-icon name="cash-outline"></ion-icon>
            </div>
        </a>
    </div>

    <!-- ================ Order Details List =================== -->
    <?php include "templates/recentOrder.php"; ?>
</div>
<?php include "includes/footer.php"; ?>