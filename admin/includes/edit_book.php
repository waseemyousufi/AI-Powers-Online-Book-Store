<?php
if (isset($_GET["b_id"])) {
    $the_book_id = $_GET["b_id"];
}

$query = "SELECT * FROM books WHERE book_id = $the_book_id";
$select_books = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($select_books)) {
    $book_id = $row["book_id"];
    $title = $row["book_title"];
    $author = $row["author_name"];
    $price = $row["book_price"];
    $category = $row["book_category"];
    $publisher = $row["publisher"];
    $language  =   $row["lang"];
    $rating = $row["book_rating"];
    $description = $row["book_description"];
    $book_image = $row["book_image"];
}
$errors = array("title" => "", "author" => "", "price" => "", "category" => "", "rating" => "", "publisher" => "", "language" => "", "image" => "");
if (isset($_POST["update_book"])) {
    $title = test_input($_POST["book_title"]);
    $author = test_input($_POST["author"]);
    $price = test_input($_POST["price"]);
    $category = test_input($_POST["category"]);
    $rating = test_input($_POST["rating"]);
    $publisher = test_input($_POST["publisher"]);
    $language = test_input($_POST["language"]);
    $description = test_input($_POST["description"]);

    $image = $_FILES["image"]["name"];
    $image_temp = $_FILES["image"]["tmp_name"];
    move_uploaded_file($image_temp, "./assets/images/$image");

    if (empty($title)) {
        $errors["title"] = "نام کتاب را وارد کنید";
    } else {
        $title = mysqli_real_escape_string($conn, $title);
    }
    if (empty($author)) {
        $errors["author"] = "نام کتاب را وارد کنید";
    } else {
        $author = mysqli_real_escape_string($conn, $author);
    }
    if (empty($price)) {
        $errors["price"] = "نام کتاب را وارد کنید";
    } else {
        $price = mysqli_real_escape_string($conn, $price);
    }
    if (empty($publisher)) {
        $errors["publisher"] = "نام کتاب را وارد کنید";
    } else {
        $publisher = mysqli_real_escape_string($conn, $publisher);
    }
    if (empty($description)) {
        $errors["description"] = "نام کتاب را وارد کنید";
    } else {
        $description = mysqli_real_escape_string($conn, $description);
    }
    if (!array_filter($errors)) {
        $query = "UPDATE books SET book_title='{$title}', author_name='{$author}', book_description='{$description}', book_price='{$price}', book_category='{$category}', book_rating='{$rating}', publisher='{$publisher}',book_image='{$image}' WHERE book_id='{$the_book_id}'";
        $update_book_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
        header("location: ./books.php");
    }
}

?>

<!-- ================ ADD Books =================== -->
<div class="add-book container mt-5 px-5">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="row border rounded p-3 bg-light g-3">
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="book_title" class="form-label fs-5 mt-2">نام کتاب</label>
                    <input type="text" class="form-control" id="book_title" name="book_title" value="<?php echo htmlspecialchars($title); ?>">
                    <div class="text-danger fs-5"><?php echo $errors["title"]; ?></div>


                    <label for="author" class="form-label fs-5 mt-2"> نویسنده</label>
                    <input type="text" class="form-control" id="author" name="author" value="<?php echo htmlspecialchars($author); ?>">
                    <div class="text-danger fs-5"><?php echo $errors["author"]; ?></div>


                    <label for="price" class="form-label fs-5 mt-2">قیمت</label>
                    <input type="text" class="form-control" name="price" id="price" value="<?php echo htmlspecialchars($price); ?>">
                    <div class="text-danger fs-5"><?php echo $errors["price"]; ?></div>


                    <label for="category" class="form-label fs-5 mt-2"> دسته بندی</label>
                    <select name="category" class="form-select" id="category">
                        <option value="<?php echo $category; ?>"><?php echo $category; ?></option>
                        <?php
                        $select_cat = mysqli_query($conn, "SELECT DISTINCT(book_category) FROM books") or die(mysqli_error($conn));
                        while ($row = mysqli_fetch_assoc($select_cat)) : ?>
                            <option value="<?php echo $row['book_category']; ?>"><?php echo $row["book_category"]; ?></option>
                        <?php endwhile; ?>
                    </select>

                    <label for="rating" class="form-label fs-5 mt-2">ریتنگ</label>
                    <select name="rating" id="rating" class="form-select">
                        <option value="5"><?php echo $rating; ?></option>
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="image" class="form-label fs-5 mt-2">عکس</label>
                    <input type="file" class="form-control" name="image" id="image">

                    <label for="publisher" class="form-label fs-5 mt-2"> ناشر</label>
                    <input type="text" name="publisher" class="form-control" id="publisher" value="<?php echo htmlspecialchars($publisher); ?>">
                    <div class="text-danger fs-5"><?php echo $errors["publisher"] ?></div>


                    <label for="language" class="form-label fs-5 mt-2">زبان</label>
                    <select class="form-select" name="language" id="language">
                        <option value="<?php echo $language; ?>"><?php echo $language; ?></option>
                        <option value="fa">Fa</option>
                        <option value="en">En</option>
                    </select>

                    <div class="form-floating mt-4">
                        <textarea class="form-control fs-5" placeholder="Leave a comment here" id="floatingTextarea2" name="description" style="height: 150px"><?php echo $description; ?></textarea>
                        <label for="floatingTextarea2" class="fs-5">چکیده</label>
                    </div>

                </div>
            </div>
            <button type="submit" name="update_book" class="btn-2 fs-5">افزودن به لست کتاب ها</button>
        </div>
    </form>
</div>