<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publisher's Offerings</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h3>Publisher's Offerings: </h3>
        <?php
        if (isset($_GET["publisher_name"])) {

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "be19_cr4_leonasako_biglibrary";
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $publisher_name = $_GET["publisher_name"];

            $sql = "SELECT * FROM library WHERE publisher_name = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $publisher_name); 
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) 
            {
                while ($row = $result->fetch_assoc()) {
        ?>
                    <div class="card mb-3" style="max-width: 400px;">
                        <img src="<?php echo "images/" . $row["image"]; ?>" class="card-img-top" alt="<?php echo $row["title"]; ?>" style="width: 100%; height: 200px;">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row["title"]; ?></h5>
                            <p class="card-text" style="word-wrap: break-word;"><?php echo $row["short_description"]; ?></p>
                            <p class="card-text"><strong>ISBN:</strong> <?php echo $row["ISBN"]; ?></p>
                        </div>
                    </div>
        <?php
                }
            } else {
                echo "No books/CD/DVD found for the publisher.";
            }

            $stmt->close();
            $conn->close();
        } else {
            echo "Invalid request.";
        }
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>

    