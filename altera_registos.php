<!DOCTYPE html>
    <html>

     <body>
         <h1>Alterar Publicações</h1>

              
        <form action="altera_registos.php" method="post"><br>
        <a href="menu.php">Return menu</a> <br>
<br>
            <!-- Id da publicação --> 
            <label for="id">Id da Publicação:</label><br/>
            <input type="number" id="id" name="id" min="1" size="20"/><br/><br/> 

            <!-- Alterar nome da publicação --> 
            <label for="nome">Inserir novo nome:</label><br/>
            <input type="text" id="nome" name="nome" size="20"/><br/><br/> 

            <!-- Nova data de publicação -->
            <label for="data_publicacao">Inserir nova data de publicação:</label><br/>
            <input type="date" id="data_publicacao" name="data_publicacao" size="20"/><br/><br/>

            <!-- Nova area Temáica -->
            <label for="AreaTematica">Inserir nova área temática:</label><br/>
            <input type="number" id="AreaTematica" name="AreaTematica"  size="20"/><br/><br/>  

            <!-- Submeter as informações -->
            <input type="submit" name="submit" value="Alterar publicação">
            <a href="<?php $_SERVER['PHP_SELF']; ?>">Refresh</a>
        </form>

     </body>

    </html>

<?php

$con = mysqli_connect("localhost","root","","biblioteca_final") or die("error");

if (isset($_POST['submit']) ) {
    $id = $_POST['id']; 
    $nome =$_POST['nome']; 
    $data_publicacao =$_POST['data_publicacao']; 
    $AreaTematica =$_POST['AreaTematica']; 
    
    $sql="";

        if ($nome !== "" && $data_publicacao !== "" && $AreaTematica !== "") {
        $nome = $_POST['nome'];
        $data_publicacao = $_POST['data_publicacao'];
        $AreaTematica = $_POST['AreaTematica'];
    
        $sql = "UPDATE publicacao SET Nome='$nome', Data_de_publicacao='$data_publicacao', Area_Tematica_Id=$AreaTematica WHERE Id=$id";

    } 

    if ($nome !== "" && $data_publicacao !== "" && $AreaTematica === "") {
        $nome = $_POST['nome'];
        $data_publicacao = $_POST['data_publicacao'];

        $sql = "UPDATE publicacao SET Nome='$nome', Data_de_publicacao='$data_publicacao' WHERE Id=$id";
    
    } 
    if ($nome !== "" && $data_publicacao === "" && $AreaTematica !== "") {
        $nome = $_POST['nome'];
        $AreaTematica = $_POST['AreaTematica'];

        $sql = "UPDATE publicacao SET Nome='$nome', Area_Tematica_Id=$AreaTematica WHERE Id=$id";
    
    } 

    if ($nome === "" && $data_publicacao !== "" && $AreaTematica !== "") {
        $data_publicacao = $_POST['data_publicacao'];
        $AreaTematica = $_POST['AreaTematica'];

        $sql = "UPDATE publicacao SET Data_de_publicacao='$data_publicacao', Area_Tematica_Id=$AreaTematica WHERE Id=$id";
    
    } 

    if ($nome !== "" && $data_publicacao === "" && $AreaTematica === "") {
        $nome = $_POST['nome'];

        $sql = "UPDATE publicacao SET Nome='$nome' WHERE Id=$id";
    
    } 

    if ($nome === "" && $data_publicacao !== "" && $AreaTematica === "") {
        $data_publicacao = $_POST['data_publicacao'];

        $sql = "UPDATE publicacao SET Data_de_publicacao='$data_publicacao' WHERE Id=$id";
    
    } 

    if ($nome === "" && $data_publicacao === "" && $AreaTematica !== "") {
        $AreaTematica = $_POST['AreaTematica'];

        $sql = "UPDATE publicacao SET Area_Tematica_Id=$AreaTematica WHERE Id=$id";
    } 

    if (mysqli_query($con, $sql)) {
        echo "Se o Id que introduziu existir na Base de Dados, a publicação foi alterada.";
        
        echo "Se o Id que introduziu não existir na Base de Dados, nada foi alterado.";
        } else {
            echo "Possiblidade de erro: Id não existente ou inválido / verifique se o que pretende alterar está escrito de modo correto";
    
    }
    mysqli_close($con);
    exit;
}


?>