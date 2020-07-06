<?php
require "db.php";

?>


<?php


$sql = "SELECT * FROM books";
$result = $db->query($sql);
$books = $result->fetch();


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






    <?php
    if (isset($_GET['id'])) {
      $search = $_GET['id'];
      $sth = $db->prepare("SELECT * FROM books WHERE  book_title like '%$search%'  or book_id like '%$search%' or book_image  like'%$search%' ");
      $sth->setFetchMode(PDO::FETCH_OBJ);
      $sth->execute();
      if ($row = $sth->fetch()) { ?>

    <div class="row">
      <?php if ($row->book_id) : ?>

      <a class="col-5 col-sm-3" href='book.php?id=<?php echo $row->book_id ?>  '> <img
          src=" book-covers/<?php echo $row->book_image ?> " class="card-img-top"
          alt=" <?php echo $row->book_title ?>"></a>

      <?php else : ?>
      <a class="col-5 col-sm-3" href='book.php?id=<?php echo $row->book_id ?>'>
        <div class=" card-img-top">
          <div class="title"><?php echo $row->book_title ?> </div>
        </div>
      </a>






    </div>
    <?php endif; ?>
    <? else {
      echo "nothing";
    }?>
    <?php

      }
    }  ?>



























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