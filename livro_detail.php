<?php 

$nome = $_GET['Nome'];

$con = mysqli_connect("localhost","root","", "biblioteca_final") or die("error");

$sql1 = "SELECT * FROM publicacao WHERE Nome = '$nome'";

$sql2 = "SELECT * FROM livro WHERE Nome = '$nome'";


/* $Id = "SELECT Id FROM publicacao WHERE Nome = '$nome'";
$Nome = "SELECT Nome FROM publicacao WHERE Nome = '$nome'";
$Nome_abreviado = "SELECT Nome_abreviado FROM publicacao WHERE Nome = '$nome'";
$Codigo = "SELECT Codigo FROM publicacao WHERE Nome = '$nome'";
$Data_de_publicacao = "SELECT Data_de_publicacao FROM publicacao WHERE Nome = '$nome'";
$Ano_de_publicacao = "SELECT Ano_de_publicacao FROM publicacao WHERE Nome = '$nome'";
$Nr_Pags = "SELECT Nr_Pags FROM publicacao WHERE Nome = '$nome'";
$Capa = "SELECT Capa FROM publicacao WHERE Nome = '$nome'";
$Capa_em_miniatura = "SELECT Capa_em_miniatura FROM publicacao WHERE Nome = '$nome'";
$Qtd_Emprestimos = "SELECT Qtd_Emprestimos FROM publicacao WHERE Nome = '$nome'";
$Qtd_Acessos = "SELECT Qtd_Acessos FROM publicacao WHERE Nome = '$nome'";
$Data_de_aquisicao = "SELECT Data_de_aquisicao FROM publicacao WHERE Nome = '$nome'";
$Area_Tematica_Id = "SELECT Area_Tematica_Id FROM publicacao WHERE Nome = '$nome'";
$relevancia = "SELECT relevancia FROM publicacao WHERE Nome = '$nome'";
*/


$query1 = mysqli_query($con, $sql1) or die("error"); 
$count1 = mysqli_num_rows($query1);


if ($count1 == 0) {
   
} else {
    while ($row = mysqli_fetch_array($query1)) {
        $Id = $row['Id'];
        /*  o $nome já existe, logo não é preciso ir buscar */
        $Nome_abreviado = $row['Nome_abreviado'];
        $Codigo = $row['Codigo'];
        $Data_de_publicacao = $row['Data_de_publicacao'];
        $Ano_de_publicacao = $row['Ano_de_publicacao'];
        $Nr_Pags = $row['Nr_Pags'];
        $Capa = $row['Capa'];
        $Capa_em_miniatura = $row['Capa_em_miniatura'];
        $Qtd_Emprestimos = $row['Qtd_Emprestimos'];
        $Qtd_Acessos = $row['Qtd_Acessos'];
        $Data_de_aquisicao = $row['Data_de_aquisicao'];
        $Area_Tematica_Id = $row['Area_Tematica_Id'];
        $relevancia = $row['relevancia'];
        
    }
}

$editora = "SELECT e.Nome
FROM editora e, livro l
WHERE e.Nome=l.Editora_Nome AND l.Nome='$nome'
GROUP BY e.nome";

 /*$Autor = "SELECT a.Nome
FROM autor a, autoria_de_livro al, livro l
WHERE a.id=al.Autorid AND al.LivroId=l.Id AND l.Nome='$nome'";
*/

/* $ISBN_Edicao = "SELECT MAX(el.Numero) as Edicao_recente, MAX(el.ISBN) as ISBN_recente
FROM edicao_de_livro el
WHERE el.Publicacao_Id =  '$Id' "; */

$query2 = mysqli_query($con, $sql2) or die("error");
$count2 = mysqli_num_rows($query2);

$editora = "";
if ($count2 == 0) {
    $editora = 'Não há resultados';
} else {
    while ($row = mysqli_fetch_array($query2)) {
        
        $editora = $row['Editora_Nome'];
       /* $Autor = $row['Nome']; */
    }
}


$sql3 = "SELECT tm.Nome
FROM tipo_de_monografia tm, monografia m, publicacao p
WHERE tm.Nome=m.Tipo_de_monografia_Nome AND m.Publicacao_Id= $Id
GROUP BY tm.Nome";

$query3=mysqli_query($con, $sql3) or die("error");
$count3 = mysqli_num_rows($query3);

$monografia="";
if ($count3 == 0) {
    $monografia = 'Não há resultados';
} else {
    while ($row3 = mysqli_fetch_array($query3)) {
        
        $monografia =$row3['Nome'];

       /* $Autor = $row['Nome']; */
    }
}

$sql4 = "SELECT p.Periodicidade_Nome, p.ISSN, p.Sigla
FROM periodico p, edicao_de_periodico ep, publicacao pub
WHERE p.Editora_ou_Periodico_Id=ep.Periodico_Editora_ou_Periodico_Id AND ep.Publicacao_Id=$Id
GROUP BY p.ISSN";

$query4 = mysqli_query($con, $sql4);
$count4 = mysqli_num_rows($query4);

$issn="";
$nome_peridiocidade ="";
$sigla="";

if ($count4 == 0){
    $issn="Não há resultados";
    $nome_peridiocidade ="Não há resultados";
    $sigla="Não há resultados";
} else {
    while($row4 = mysqli_fetch_array($query4)){
        $issn=$row4['ISSN'];
        $nome_peridiocidade =$row4['Periodicidade_Nome'];
        $sigla=$row4['Sigla'];
    }
}

$sql5 = "SELECT a.Nome
FROM area_tematica a, publicacao p 
WHERE a.Id = '$Area_Tematica_Id'
GROUP BY a.Id ";

$query5= mysqli_query($con, $sql5);
$count5 = mysqli_num_rows($query5);

$Area_Tematica= "";
if ($count5 == 0){
   
} else {
    while($row5 = mysqli_fetch_array($query5)){
     
        $Area_Tematica = $row5['Nome'];
    }
}

?>


<DOCTYPE html>
    <html>

        <body>
            <h1>Detalhes da Publicação</h1>

            <form action="livro_detail.php" method="post"><br>
            <a href="menu.php">Return menu</a> <br>
            <br>

                <label for="id">(l,m,p) - Id da Publicação: <?php print(" $Id");  ?> </label><br/>
                <br/>

                <label for="nome">(l,m,p) - Nome da Publicação: <?php print(" $nome"); ?>  </label><br/>
                <br/>

                <label for="nome_abreviado">(l,m,p) - Nome Abreviado: <?php print(" $Nome_abreviado");  ?>  </label><br/>
                <br/>

                <label for="codigo">(l,m,p) - Código: <?php print(" $Codigo");  ?></label><br/>
                <br/>

                <label for="data_da_pub">(l,m,p) - Data da Publicação: <?php print(" $Data_de_publicacao");  ?>  </label><br/>
                <br/>

                <label for="ano_pub">(l,m,p) - Ano em que foi publicado: <?php print(" $Ano_de_publicacao");  ?> </label><br/>
                <br/>

                <label for="nr_pags">(l,m,p) - Número de páginas: <?php print(" $Nr_Pags");  ?></label><br/>
                <br/>

                <label for="capa">(l,m,p) - Capa (Ampliada): <?php print(" $Capa");  ?>  </label><br/>
                <br/>

                <label for="capa_min">(l,m,p) - Capa (Miniatura): <?php print(" $Capa_em_miniatura");  ?> </label><br/>
                <br/>

                <label for="qtd_empr">(l,m,p) - Quantidade de Empréstimos: <?php print(" $Qtd_Emprestimos");  ?> </label><br/>
                <br/>

                <label for="qtd_acess">(l,m,p) - Quantidade de Acessos: <?php print(" $Qtd_Acessos");  ?> </label><br/>
                <br/>

                <label for="data_de_aquis">(l,m,p) - Data de Aquisição: <?php print(" $Data_de_aquisicao");  ?></label><br/>
                <br/>

                <label for="area_tematica_id"> (l,m,p) - Id da Área Temática: <?php print(" $Area_Tematica_Id");  ?> </label><br/>
                <br/>

                <label for="area_tematica">(l,m,p) - Área Temática: <?php print(" $Area_Tematica");  ?> </label><br/>
                <br/>

                <label for="relevancia">(l,m,p) - Relevância: <?php print(" $relevancia");  ?></label><br/>
                <br/>

                <label for="editora">(l) - Editora:<?php print(" $editora");  ?></label><br/>
                <br/>

                <label for="monografia">(m) - Tipo de Monografia:<?php print(" $monografia");  ?></label><br/>
                <br/>

                <label for="issn">(p) - ISSN:<?php print(" $issn");  ?></label><br/>
                <br/>

                <label for="periodicidade">(p) - Periodicidade:<?php print(" $nome_peridiocidade");  ?></label><br/>
                <br/>

                <label for="Sigla">(p) - Sigla:<?php print(" $sigla");  ?></label><br/>
                <br/>
                      
                <label for="detail">(l) = livro / (m) = monografia /(p) = Periódico:</label><br/>
                <br/>
                <br/>

            </form>

        </body>



    </html>