<!-- ================ Edit users =================== -->

<?php
if (isset($_GET["edit_id"])) {
    $the_user_id  = $_GET["edit_id"];
}
$select_user = mysqli_query($conn, "SELECT * FROM users WHERE user_id=$the_user_id") or die(mysqli_error($conn));
while ($row = mysqli_fetch_assoc($select_user)) {
    $user_id = $row["user_id"];
    $username = $row["username"];
    $lastname = $row["lastname"];
    $user_image = $row["user_image"];
    $email = $row["email"];
    $password = $row["user_password"];
}

$errors = array("username" => "", "lastname" => "", "email" => "", "password" => "");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // check form
    $user_role = $_POST["user_role"];
    $user_image = $_FILES["user_image"]["name"];
    $user_image_temp = $_FILES["user_image"]["tmp_name"];
    move_uploaded_file($user_image_temp, "./assets/images/users/$user_image");

    if (empty($_POST["username"])) {
        $errors["username"] = "اسم تان را وارد کنید <br/>";
    } else {
        if (!preg_match('/^[a-zA-Z]+$/', $_POST["username"])) {
            $errors["username"] = "اسم تان را وارد کنید <br/>";
        }
        $username = test_input($_POST["username"]);
        $username = mysqli_real_escape_string($conn, $username);
    }
    if (empty($_POST["lastname"])) {
        $errors["lastname"] = "تخلص تان را وارد کنید <br/>";
    } else {
        if (!preg_match('/^[a-zA-Z]+$/', $_POST["lastname"])) {
            $errors["lastname"] = "تخلص تان را وارد کنید <br/>";
        }
        $lastname =  test_input($_POST["lastname"]);
        $lastname = mysqli_real_escape_string($conn, $lastname);
    }

    if (empty($_FILES["user_image"]['name'])) {
        $query =  "SELECT * FROM users WHERE user_id = $the_user_id";
        $select_image = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($select_image)) {
            $user_image = $row["user_image"];
        }
    }

    if (empty($_POST["email"])) {
        $errors["email"]  = "ایمل تان را وارد کنید <br/>";
    } else {
        $email = $_POST["email"];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors["email"] = " ایمل درست وارد کنید";
        } else {
            $email = mysqli_real_escape_string($conn, $email);
        }
    }
    if (empty($_POST["password"])) {
        $errors["password"] =  "رمز تان را وارد کنید";
    } else {
        $password =  test_input($_POST["password"]);
        $password = mysqli_real_escape_string($conn, $password);
    }
    if (!array_filter($errors)) {
        $query = "UPDATE users SET username = '{$username}', lastname = '{$lastname}', user_image = '{$user_image}', email = '{$email}', user_password = '{$password}', user_role='{$user_role}' WHERE user_id = '{$the_user_id}'";
        $update_user = mysqli_query($conn, $query) or die(mysqli_error($conn));
        header("location: ./users.php");
    }
    // end of post check
}

?>

<section class="edit-users">
    <div class="container mt-5 px-5">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="border rounded p-3 bg-light g-3">
                <div class="mb-3">
                    <label for="username" class="form-label fs-5 mt-2">نام</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?php echo htmlspecialchars($username); ?>">
                    <div class="text-danger fs-5"><?php echo $errors["username"]; ?></div>

                    <label for="lastname" class="form-label fs-5 mt-2">تخلص</label>
                    <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo htmlspecialchars($lastname); ?>">
                    <div class="text-danger fs-5"><?php echo $errors["lastname"]; ?></div>

                    <label for="user_image" class="form-label fs-5 mt-2">عکس</label>
                    <input type="file" class="form-control" name="user_image" id="user_image" value="<?php echo $user_image; ?>">

                    <label for="email" class="form-label fs-5 mt-2">ایمل</label>
                    <input type="text" class="form-control" name="email" id="email" value="<?php echo htmlspecialchars($email); ?>">
                    <div class="text-danger fs-5"><?php echo $errors["email"]; ?></div>

                    <label for="password" class="form-label fs-5 mt-2">رمز</label>
                    <input type="text" class="form-control" name="password" id="password" value="<?php echo htmlspecialchars($password); ?>">
                    <div class="text-danger fs-5"><?php echo $errors["password"]; ?></div>

                    <label for="user_role" class="form-label fs-5 mt-2">صلاحیت</label>
                    <select class="form-select" name="user_role" id="user_role">
                        <option value="admin" selected>Admin</option>
                        <option value="user">User</option>
                    </select>
                </div>
                <button type="submit" name="edit_user" class="container-fluid btn-2 fs-5">ثبت</button>
            </div>
        </form>
    </div>
</section>

<?php include "includes/footer.php"; ?>