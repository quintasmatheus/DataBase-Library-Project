<!DOCTYPE html>
<html>
  <body>

   <h1>Remover Publicações</h1>
    <form action ="remove_publicacao.php" method="post">
      <input type="text" name="nome" />
      <input type="submit" value="Remove"/>
      <a href="<?php $_SERVER['PHP_SELF']; ?>">Refresh</a><br>
      <a href="menu.php">Return menu</a> 



    </form>
  </body>
</html>


<?php

$con = mysqli_connect("localhost","root","","biblioteca_final") or die("error");

 $output = "";

if(isset($_POST['nome'])){

    $searchq = $_POST['nome'];

    $sql = "DELETE FROM publicacao WHERE Nome='$searchq'";
     
    $query = mysqli_query($con, "DELETE FROM publicacao WHERE Nome='$searchq'") or die("error");

    if (mysqli_query($con, $sql)) {
        echo "A publicação com o nome $searchq foi eliminado com sucesso";

    } else {
        echo "Houve um erro ao remover a publicação! Verifique se introduziu o nome da publicção corretamente";
    }
}



mysqli_close($con);
exit;
?>