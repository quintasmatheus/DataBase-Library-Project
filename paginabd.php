<?php

$con = mysqli_connect("localhost","root","", "biblioteca_final") or die("error");

 $Nome = "";

if(isset($_POST['nome'])){

    $searchq = $_POST['nome'];

    $query = mysqli_query($con, "SELECT * FROM publicacao WHERE Nome LIKE '%$searchq'") or die("error"); 

    $count = mysqli_num_rows($query);
    if ($count == 0) {
        $Nome = 'Não há resultados';

    } else {
        while ($row = mysqli_fetch_array($query)) {
            $Nome = $row['Nome'];

        }
    }
}
?>


<!DOCTYPE html>
<html>
  <body>

   <h1>Procura de Publicações</h1>
    <form action ="paginabd.php" method="post">
      <input type="text" name="nome" />
      <input type="submit" value="Search"/>
      <a href="<?php $_SERVER['PHP_SELF']; ?>">Refresh</a> <a href="menu.php">Return menu</a>


    </form>
<?php
print("$Nome");
?>
      </body>
</html>