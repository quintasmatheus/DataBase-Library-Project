<?php

$con = mysqli_connect("localhost","root","","biblioteca_final") or die("error");

if(isset($_POST['nome'])){

$id = $_POST['id'];
$nome = $_POST['nome'];
$abreviatura = $_POST['abreviatura'];
$codigo = $_POST['codigo'];
$data_publicacao =  $_POST['data_publicacao'];
$Ano_de_publicacao =  $_POST['ano_publicacao'];
$Nr_Pags =  $_POST['paginas'];
$Capa =  NULL;
$Capa_em_miniatura =  NULL;
$Quantidade_Emprestimos = $_POST['qtdEmp'];
$Quantidade_Acessos = $_POST['qtdAcc'];
$data_aquisicao = $_POST['data_aquisicao'];
$Area_Tematica_Id = $_POST['fAreaTematica'];
$relevancia =  $_POST['frelevancia'];

$sql = "INSERT INTO publicacao(Id, Nome, Nome_abreviado, Codigo, Data_de_publicacao, Ano_de_publicacao, Nr_Pags, Capa, Capa_em_miniatura, Qtd_Emprestimos, Qtd_Acessos, Data_de_aquisicao, Area_Tematica_Id, relevancia ) 
VALUES('$id', '$nome', '$abreviatura', '$codigo', '$data_publicacao', '$Ano_de_publicacao', '$Nr_Pags', '$Capa', '$Capa_em_miniatura', '$Quantidade_Emprestimos', '$Quantidade_Acessos', '$data_aquisicao', '$Area_Tematica_Id', '$relevancia')";

if (mysqli_query($con, $sql)) {
    echo "insert done";
    
    }else {
        echo "Possiblidades de erro: ID inválido ou já existente / Código inválido ou já existente / Área Temática inválida ou não existe";

}
mysqli_close($con);
exit;
}

?>

<DOCTYPE html>
    <html>


     <body>
         <h1>Inserir publicações</h1>
<a href="menu.php">Return menu</a> <br>
              
     <form action="registar_publicacao.php" method="post"><br>
     
     <!-- Id da publicação --> 
     <label for="id"> (Obrigatório) Id da Publicação:</label><br/>
     <input type="number" id="id" name="id" min="1" size="20"/><br/><br/> 

     <!-- Nome da publicação --> 
     <label for="Nome"> (Obrigatório) Nome:</label><br/>
     <input type="text" name="nome" size="20"/><br/><br/> 

     <!-- Nome Abreviado -->
     <label for="abreviatura">Nome Abreviado:</label><br/>
     <input type="text" name="abreviatura" size="20"/><br/><br/> 
     
     <!-- Id Area Temáica -->
     <label for="fAreaTematica"> (Obrigatório) Id Area Temática:</label><br/>
     <input type="number" id="fAreaTematica" name="fAreaTematica"  size="20"/><br/><br/> 

     <!-- Codigo -->
     <label for="codigo"> (Obrigatório) Codigo:</label><br/>
     <input type="number" id="codigo" name="codigo" min="1" size="20"/><br/><br/> 

     <!-- Data de publicação -->
     <label for="data_publicacao">Data de Publicação:</label><br/>
     <input type="date" name="data_publicacao" size="20"/><br/><br/> 
     
     <!-- Ano de publicação -->
     <label for="ano_publicacao">Ano de Publicação:</label><br/>
     <input type="number" name="ano_publicacao" size="20"/><br/><br/> 
     <!-- Numero de paginas -->
     <label for="paginas">Número de Páginas:</label><br/>
     <input type="number" id="paginas" name="paginas" min="1" size="20"/><br/><br/> 

     <!-- Capa -->
     <label for=fcapa>Capa:</label><br/>
     <input type="image" src="img.submit.gif" alt="Submit" width="200" height="200">
     <br/><br/>

     <!-- Capa em miniatura -->
     <label for=fcapa_em_miniatura>Capa em Miniatura:</label><br/>
     <input type="image" src="img.submit.gif" alt="Submit" width="48" height="48">
     <br/><br/>

     <!-- Qtd de emprestimos -->
     <label for="qtdEmp">Quantidade de Empréstimos:</label><br/>
     <input type="number" id="qtdEmp" name="qtdEmp" min="0" size="20"/><br/><br/>

     <!-- Qtd de acessos -->
     <label for="qtdAcc">Quantidade de Acessos:</label><br/>
     <input type="number" id="qtdAcc" name="qtdAcc" min="0" size="20"/><br/><br/>

     <!-- Data de aquisiçao -->
     <label for="data_aquisicao">Data de Aquisição:</label><br/>
     <input type="date" name="data_aquisicao" size="20"/><br/><br/>   
     
     <!-- Relevância -->
     <label for="frelevancia">Relevância:</label><br/>
     <input type="number" id="frelevancia" name="frelevancia" min="1" max="5" size="20"/><br/><br/>   

     <!-- Submeter as informações -->
     <input type="submit" value="Criar publicação">
     </form>
     <br/>

        
    </body>

    
 
   

    
    </html>