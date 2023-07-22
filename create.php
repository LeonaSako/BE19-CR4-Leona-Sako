<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h2>Create a new BOOK/CD/DVD (All fields except the image are required)</h2>
        <?php
        if (isset($_POST["create"])) {
            $errors = [];
            if (empty($_POST["title"])) {
                $errors[] = "Title is required.";
            }
            if (empty($_POST["short_description"])) {
                $errors[] = "Short description is required.";
            }
            if (empty($_POST["ISBN"])) {
                $errors[] = "ISBN is required.";
            }
            if (empty($_POST["author_first_name"])) {
                $errors[] = "Author first name is required.";
            }
            if (empty($_POST["author_last_name"])) {
                $errors[] = "Author last name is required.";
            }
            if (empty($_POST["publisher_name"])) {
                $errors[] = "Publisher name is required.";
            }
            if (empty($_POST["publisher_address"])) {
                $errors[] = "Publisher address is required.";
            }
            if (empty($_POST["publish_date"])) {
                $errors[] = "Publish date is required.";
            }
           

            if (count($errors) === 0) {
                require_once "db_connect.php";
                require_once "file_upload.php";

                $title = $_POST["title"];
                $short_description = $_POST["short_description"];
                $ISBN = $_POST["ISBN"];
                $author_first_name = $_POST["author_first_name"];
                $author_last_name = $_POST["author_last_name"];
                $publisher_name = $_POST["publisher_name"];
                $publisher_address = $_POST["publisher_address"];
                $publish_date = $_POST["publish_date"];
                $image = fileUpload($_FILES["image"]);

                $sql = "INSERT INTO library ( title, short_description, ISBN, author_first_name, author_last_name, publisher_name, publisher_address, publish_date,  image) 
                VALUES ('$title','$short_description',$ISBN, '$author_first_name','$author_last_name','$publisher_name','$publisher_address' ,'$publish_date','{$image[0]}')";

                if (mysqli_query($connect, $sql)) {
                    echo "<div class='alert alert-success' role='alert'>
                            New record has been created, {$image[1]}
                        </div>";
                    header("refresh: 3; url= index.php");
                } else {
                    echo "<div class='alert alert-danger' role='alert'>
                            Error found, {$image[1]}
                        </div>";
                }
            } else {
                foreach ($errors as $error) {
                    echo "<div class='alert alert-danger' role='alert'>
                            $error
                        </div>";
                }
            }
        }
        ?>
        
        <div class="container mt-5">
      
        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3 mt-3">
                <label for="title" class="form-label">Title *</label>
                <input type="text" class="form-control" id="title" aria-describedby="title" name="title">
            </div>
            <div class="mb-3">
                <label for="short_description" class="form-label">Short_description *</label>
                <input type="text" class="form-control" id="short_description" aria-describedby="short_description" name="short_description">
            </div>
            <div class="mb-3">
                <label for="ISBN" class="form-label">ISBN *</label>
                <input type="number" class="form-control" id="ISBN" aria-describedby="ISBN" name="ISBN">
            </div>
            <div class="col-auto my-1">
      <label class="mr-sm-2" for="inlineFormCustomSelect">Type *</label>
      <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
        <option selected>Choose... </option>
        <option value="1">BOOK</option>
        <option value="2">CD</option>
        <option value="3">DVD</option>
      </select>

      <div class="mb-3 mt-3">
                <label for="author_first_name" class="form-label">author_first_name *</label>
                <input type="text" class="form-control" id="author_first_name" aria-describedby="author_first_name" name="author_first_name">
            </div>

            <div class="mb-3 mt-3">
                <label for="author_last_name" class="form-label">author_last_name *</label>
                <input type="text" class="form-control" id="author_last_name" aria-describedby="author_last_name" name="author_last_name">
            </div>

            <div class="mb-3 mt-3">
                <label for="publisher_name" class="form-label">publisher_name *</label>
                <input type="text" class="form-control" id="publisher_name" aria-describedby="publisher_name" name="publisher_name">
            </div>
            <div class="mb-3 mt-3">
                <label for="publisher_address" class="form-label">publisher_address *</label>
                <input type="text" class="form-control" id="publisher_address" aria-describedby="publisher_address" name="publisher_address">
            </div>
            <div class="mb-3">
                <label for="publish_date" class="form-label">publish_date *</label>
                <input type="datum" class="form-control" id="publish_date" aria-describedby="publish_date" name="publish_date">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">image</label>
                <input type="file" class="form-control" id="image" aria-describedby="image" name="image">
            </div>
            <button name="create" type="submit" class="btn btn-primary">Create </button>
            <a href="index.php" class="btn btn-primary">Back to home page</a>
        </form>
    </div>

            
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>





