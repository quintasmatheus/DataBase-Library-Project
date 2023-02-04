<?php 
$con = mysqli_connect("localhost","root","", "biblioteca_final") or die("erro");

$sql = "SELECT Nome, Codigo, Area_Tematica_Id, relevancia, Data_de_publicacao,Qtd_Emprestimos, Capa  FROM  publicacao";

if (isset($_POST['search'])) {

    $search_term = $_POST['nome'];

    $sql .= " WHERE Nome = '$search_term' ";

    $sql .= " OR Codigo = '$search_term' ";

    $sql .= " OR Area_Tematica_Id = '$search_term' ";

    $sql .= " OR relevancia = '$search_term' ";

    $sql .= " OR Data_de_publicacao = '$search_term' ";

}

$query = mysqli_query($con, $sql) or die("error"); 

?>

<!DOCTYPE html>
<html>
<body>
    <h1>Advanced Search</h1>

    <form action="advanced_search.php" method="post">
    
    <label for="pesquisa"></label>
    
<br>
    <input type="text" id = "pesquisa" name= "nome">
    <input type="submit" name = "search" value="Search"/><br>
    <a href="<?php $_SERVER['PHP_SELF']; ?>">Refresh</a>  
    <br>
    <a href="menu.php">Return menu</a> <br>
    </form>  

     <table width="50%" border="5" cellspacing="5">

<tr>
<td><strong>titulo</strong></td>
<td><strong>area_tematica</strong></td>
<td><strong>data_publicacao</strong></td>
<td><strong>Nº empréstimos</strong></td>
<td><strong>Capa</strong></td>
</tr>

<?php while ($row = mysqli_fetch_array($query)) { ?>

<tr>  
<td> <a href ="livro_detail.php?Nome=<?php echo $row['Nome'] ?>"> <?php echo $row['Nome'] ?></a> </td>
<td><?php echo $row ['Area_Tematica_Id']; ?></td>
<td><?php echo $row ['Data_de_publicacao']; ?></td>
<td><?php echo $row ['Qtd_Emprestimos'];?></td>
<td><?php echo $row ['Capa'];?></td>

</tr>
<?php } ?>


</table>
</body>
   
</html>