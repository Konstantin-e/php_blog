<?php

require('config.php');
require('db.php');


if(isset($_POST['submit'])) {

  $title = mysqli_real_escape_string($dbc, $_POST['title']);
  $author = mysqli_real_escape_string($dbc, $_POST['author']);
  $body = mysqli_real_escape_string($dbc, $_POST['body']);

  $query = "INSERT INTO 
              posts (title, author, body) 
                VALUES (
                  '$title',
                  '$author', 
                  '$body')";


  if (mysqli_query($dbc, $query)) {
    header('Location: ' . ROOT_URL);
  } else {
    echo 'Error: ' . mysqli_error($conn);
  }



  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add new Post</title>
  <link rel="stylesheet" href="https://bootswatch.com/4/litera/bootstrap.min.css" >
</head>
<body>
  <div class="container p-5 ">
    <form class="form-group" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" >
      <div class="form-group row" >
        <label class="col-sm-2">Title</label>
        <input class="col-sm-10" type="text" name="title">
      </div>
      <div class="form-group row" >
        <label class="col-sm-2">Author</label>
        <input class="col-sm-10" type="text" name="author">
      </div>
      <div class="form-group row" >
        <label class="col-sm-2">Body</label>
        <textarea class="form-control col-sm-10" name="body" ></textarea>
      </div>
      <input type="submit" name="submit" value="Submit" class="btn btn-info">
    </form>
  </div>
</body>
</html>