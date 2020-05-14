<?php

  require('config.php');
  require('db.php');

  $query = 'SELECT * FROM posts ORDER BY created_at DESC';

  $result = mysqli_query($dbc, $query);
  $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Post</title>
  <link rel="stylesheet" href="https://bootswatch.com/4/litera/bootstrap.min.css" >

</head>
<body>
  <div class="container">
    <h2 class="bg-primary text-white">Posts</h1>

    <?php foreach($posts as $post): ?>
    <div class="card mb-3">
      <div class="card-header">
        <div class="card-title float-right"><small>Author:<em>
          <?php echo $post['author'] ; ?></small></em>
        </div>
      </div>
      <div class="card-body">
        <div class="card-title">
          <?php echo $post['title'] ; ?>
        </div>
        <p class='card-text'>
          <?php echo $post['body'] ; ?>
        </p>
      </div>
    </div>
    <?php endforeach ; ?>

    <a class="btn btn-primary" href="addpost.php">Add Post</a>

  </div>
</body>
</html>