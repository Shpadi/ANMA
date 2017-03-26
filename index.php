<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
   <link href="css/bootstrap.min.css" rel="stylesheet">
   <link href="css/bootstrap-select.min.css" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="css/style.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="js/bootstrap-select.min.js"></script>
     <script src="js/bootstrap-checkbox.min.js" defer></script>
</head>
<body>
     


    <div class="container">
            <div class="row">
                <h1>ANMA Test</h1>
            </div>
            <div class="row">
                <a href="create.php" class="btn btn-success">Create</a>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Surname</th>
                      <th>Birthdate</th>
                      <th>Descriptione</th>
                      <th>Marital Status</th>
                      <th>Language</th>
                      <th>Interes</th>
                      <th>Action</th>
                      <th>Update</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   include 'database.php';
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM student ORDER BY id DESC';
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                            echo '<td>'. $row['name'] . '</td>';
                            echo '<td>'. $row['surname'] . '</td>';
                            echo '<td>'. $row['birthdate'] . '</td>';
                            echo '<td>'. $row['descriptione'] . '</td>';
                            echo '<td>'. $row['marital_status'] . '</td>';
                            echo '<td>'. $row['language'] . '</td>';
                            echo '<td>'. $row['interes'] . '</td>';
                            echo '<td><a href="read.php?id='.$row['id'].'"><button class="btn btn-lg btn-primary btn-block" >Read</button></a></td>';
                             echo '<td><a href="update.php?id='.$row['id'].'"><button class="btn btn-lg btn-primary btn-block" >Update</button></a></td>';
                              echo '<td><a href="delete.php?id='.$row['id'].'"><button class="btn btn-lg btn-primary btn-block" >Delete</button></a></td>';
                            echo '</tr>';
                   }
                   Database::disconnect();
                  ?>
                  </tbody>
            </table>
        </div>
</body>


<script type="text/javascript">
	//$(':checkbox').checkboxpicker();
</script>
</html>




