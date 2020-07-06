<?php
require "db.php";

?>


<?php


$sql = "SELECT * FROM books";
$result = $db->query($sql);



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/38edef601e.js"></script>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <link href="https://fonts.googleapis.com/css2?family=Chelsea+Market&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="container">
    <h1> Seussology</h1>

    <ul> <a href="index.php" class="nav-link"> Home </a>

      <a href="new.php" class="nav-link"> New page</a> </ul>




    <?php $id = $_GET['id']; ?>














    <div class="row no-gutters">



      <?php foreach ($result as $row) :

      ?>
      <a href='book.php?id=<?php echo $row['book_id'] ?>'>
        <div class="container">

          <div class="col-md-4">
            <?php if ($row['book_image']) : ?>


            <img src=" book-covers/<?php echo  $row['book_image'] ?>" class="card-img"
              alt=" <?php echo $row['book_title'] ?>">
          </div>


          <?php else : ?>

          <div class="col-md-4">
            <div class="card-img"><?php echo  $row['book_title'] ?> </div>
          </div>

          <?php endif; ?>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title"><?php echo $row['book_title'] ?></h5>

              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional
                content.
                This content is a little bit longer.</p>
              <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
          </div>
        </div>
      </a>


      <?php endforeach; ?>



    </div>






</body>

</html>

<?php function errorCheck()
{
  global $db;

  $errorInfo = $db->errorInfo();

  if (isset($errorInfo[2])) {
    echo $errorInfo[2];
    exit;
  }
}
?>