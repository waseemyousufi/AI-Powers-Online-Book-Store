<?php
if (isset($_SESSION["email"])) {
    $email = $_SESSION["email"];
    $query = mysqli_query($conn,  "SELECT * FROM users WHERE email='{$email}'");
    while ($row = mysqli_fetch_assoc($query)) {
        $username = $row["username"];
        $user_image = $row["user_image"];
    }
}
?>


<div class="topbar pt-3">
    <div class="toggle">
        <ion-icon name="menu-outline"></ion-icon>
    </div>
    <div class="search">
        <form action="./search.php">
            <label for="">
                <input type="text" placeholder="جستجو">
                <ion-icon name="search-outline"></ion-icon>
            </label>
        </form>
    </div>
    <div class="user mx-3 d-flex justify-content-center">
        <h4>یوسفی</h4>
        <!-- <img src="https://img.freepik.com/premium-vector/man-avatar-profile-picture-vector-illustration_268834-538.jpg" height="60px" alt="" href> -->
        <img src="./assets/images/users/<?php echo $user_image; ?>" class="border border-1 rounded-circle m-2 p-1" height="55px" width="55px" alt="">
    </div>
</div>

