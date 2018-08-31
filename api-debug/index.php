<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title></title>
</head>
<body>
  <h1>取得</h1>
  <?php var_dump(phpinfo()); ?>

  <script>
  fetch('http://localhost:8080/api.php').then(function(response) {
    return response.json();
  }).then(function(json) {
    console.log(json);
  });
  </script>
</body>
</html>
