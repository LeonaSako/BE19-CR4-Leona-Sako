<?php
    include "db_connect.php";
   
    
    
   

    $sql = "SELECT * FROM `library`";
    $result = mysqli_query($connect, $sql);

    $layout="";

    if( mysqli_num_rows($result)>0){

        while($row = mysqli_fetch_assoc($result)){
            $layout .= "<div>
            <div class='card  m-2' style='max-width: 600px; max-height:550px; min-height:520px'>
            <img  src='images/{$row["image"]}' alt='Card image cap' style='max-width: 100%; max-height:170px; min-height:170px; '>
            <div class='card-body'>
              <h5 class='card-title'style=' max-height:75px; min-height:75px'>{$row["title"]}</h5>
              
              <p class='card-text'style=' max-height:70px; min-height:55px'>{$row["short_description"]}</p>
             
              <a href='publisher.php?publisher_name=".$row["publisher_name"] . "'class=''>{$row["publisher_name"]}</a><br><br>  
        
              <a href='details.php?id=" . $row["id"] . "'class='btn btn-primary'>Show details</a><br><br>
              <a href='update.php?id={$row["id"]}' class='btn btn-warning'>Edit</a>
                    <a href='delete.php?id={$row["id"]}' class='btn btn-danger'>Delete</a>
            </div>
            </div>
          </div>";
        }
    }
        else{
            $layout.= "No Results";

        }
    mysqli_close($connect);
    
   

    ?>
    
    <!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>BIG LIBRARY</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="navbar-brand" href="create.php">Create a BOOK/CD/DVD</a>
      </li>
    </ul>
  </div>
</nav>
   



    <div class="container ">
        <div class=" row row-cols-xl-4 row-cols-lg-3 row-cols-md-2 row-cols-sm-2 row-cols-xs-1 ">

    <?php echo $layout ?>
    </div>
    </div>



    
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    </body>
</html>
