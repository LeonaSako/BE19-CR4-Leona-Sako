<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Details</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

<style>
    .available {
        color: blue;
    }

    .reserved {
        color: red;
    }
</style>

</head>
<body>

<?php
if (isset($_GET["id"])) {

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "be19_cr4_leonasako_biglibrary";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $id = $_GET["id"];
    $sql = "SELECT * FROM library WHERE id = $id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $imagePath = "images/" . $row["image"];
        $status = (rand(0, 1) == 1) ? "Available" : "Reserved";
?>

<div class="card m-2c" style="width: 18rem;">
    <img src="<?php echo $imagePath; ?>" class="card-img-top" alt="<?php echo $row["title"]; ?>" style="width: 100%; max-height: 250px;">
    <div class="card-body">
        <h3 class="card-title"><?php echo $row["title"]; ?></h3>
        <p class="card-text"><strong>ISBN:</strong> <?php echo $row["ISBN"]; ?></p>
        <p class="card-text"><strong>Description:</strong> <?php echo $row["short_description"]; ?></p>
        <p class="card-text"><strong>Type:</strong> <?php echo $row["type"]; ?></p>
        <p class="card-text"><strong>Author:</strong> <?php echo $row["author_first_name"] . " " . $row["author_last_name"]; ?></p>
        <p class="card-text"><strong>Publisher:</strong> <?php echo $row["publisher_name"]; ?></p>
        <p class="card-text"><strong>Publisher Address:</strong> <?php echo $row["publisher_address"]; ?></p>
        <p class="card-text"><strong>Publish Date:</strong> <?php echo $row["publish_date"]; ?></p>
        <p class="card-text"><strong>Status:</strong> <span class="<?php echo ($status === "Available") ? 'available' : 'reserved'; ?>"><?php echo $status; ?></span></p>
    </div>
</div>

<?php
    } else {
        echo "Book/CD/DVD not found.";
    }

    $conn->close();
} else {
    echo "Invalid request.";
}
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>
</html>
