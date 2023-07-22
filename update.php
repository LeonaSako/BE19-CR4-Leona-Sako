<?php
    require_once "db_connect.php";
    require_once "file_upload.php";

    $id = $_GET["id"]; 
    $sql = "SELECT * FROM library WHERE id = $id";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);


    if(isset($_POST["update"])){
    
        $title = $_POST["title"];
        $short_description = $_POST["short_description"];
        $image = fileUpload($_FILES["image"]);


        if($_FILES["image"]["error"] == 0){

            if($row["image"] != "library.jpg"){
                unlink("images/$row[image]"); 
            }
            $sql = "UPDATE `library` SET `title`='$title',`image`='$image[0]',`short_description`='$short_description' WHERE id=$id";
        }else {
            $sql = "UPDATE `library` SET `title`='$title',`short_description`='$short_description' WHERE id=$id";
        }

        if(mysqli_query($connect, $sql)){
            echo "<div class='alert alert-success' role='alert'>
            library has been updated, {$image[1]}
          </div>";
          header("refresh: 3; url= index.php");
        }else {
            echo "<div class='alert alert-danger' role='alert'>
            error found, {$image[1]}
          </div>";
        }
    }
    mysqli_close($connect);
?>

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
        <h2>Update</h2>
        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3 mt-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" aria-describedby="title" name="title" value="<?=$row["title"] ?>">
            </div>
            <div class="mb-3">
                <label for="short_description" class="form-label">Short_description</label>
                <input type="text" class="form-control" id="short_description" aria-describedby="short_description" name="short_description" value="<?=$row["short_description"] ?>">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">image</label>
                <input type="file" class="form-control" id="image" aria-describedby="image" name="image">
            </div>
            <button name="update" type="submit" class="btn btn-primary">Update </button>
            <a href="index.php" class="btn btn-warning">Back to home page</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>
</html>