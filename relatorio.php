<?php

require_once('conexao.php');
try{
    $stmte = $pdo->query("SELECT * FROM emprestimo");
    $executa = $stmte->execute();
    if(!empty($_GET['search']))
    {
        $data = $_GET['search'];
        $stmte = $pdo->query("SELECT * FROM emprestimo WHERE id LIKE '%$data%' or curso LIKE '%$data%' or nomeAluno LIKE '%$data%' or dataEmprestimo LIKE '%$data%' or tituloLivro LIKE '%$data%' or dataDevolucao LIKE '%$data%' or status LIKE '%$data%' ORDER BY id DESC");
    }
    else
    {
        $stmte = $pdo->query("SELECT * FROM emprestimo");
    }
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Relatórios</title>
    <style>
body{
    background-image: url(https://imgsnotigram.s3.amazonaws.com/uploads/2021/08/l2.jpg);
    text-align: center;
    color: white;
 }
h3{
    color: white;
    text-decoration: none;
}
   
.box-search{
    display: flex;
    justify-content: center;
    gap: .1%;
    }
  br
    table{position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    padding: 15px;
    background: rgba(255, 255, 255, 0.31);
    border-radius: 16px;
    box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
    backdrop-filter: blur(2.7px);
    -webkit-backdrop-filter: blur(2.7px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    background: rgba(255, 255, 255, 0.2);
    border-radius: 16px;
    box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
    backdrop-filter: blur(5px);
    -webkit-backdrop-filter: blur(5px);
    border: 1px solid rgba(255, 255, 255, 0.3); 
    background-color: orange; 


  }

</style> 

</head>

<body>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.html">Inicio<span class="sr-only"></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="relatorio.php">Relátorios</a>
      </li>
      
    </ul>
  </div>
</nav>

<br>
<br><br><br><br><br><br>
<div class="box-search">
    <input type="search" class="form-control" placeholder="Pesquisar" id="pesquisar">
    <button onclick="searchData()" class="btn btn-dark">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
        </svg>
    </button>
</div>
 
<div class="m-3"> 
<table class="table table-sm table-dark table-hover" >
<thead>
    <tr>
    <th scope="col">Curso</th>  
    <th scope="col">Nome</th>
    <th scope="col">Data de Empréstimo</th>
    <th scope="col">Titulo do Livro</th>
    <th scope="col">Data de Devolução</th>
    <th scope="col">Status</th>
    <th colspan="2" align="center">Opções</th>
    </tr>
</thead>
<tbody>
 <?php
    if($executa){
        while($reg = $stmte->fetch(PDO::FETCH_OBJ)){ // Para recuperar um ARRAY utilize PDO::FETCH_ASSOC 
?>
    <tr>

		<td><?=$reg->curso?></td>
        <td><?=$reg->nomeAluno?></td>
        <td><?=$reg->dataEmprestimo?></td>
        <td><?=$reg->tituloLivro?></td>
        <td><?=$reg->dataDevolucao?></td>
        <td><?=$reg->status?></td>
		<td><a class='btn btn-outline-primary' href="editar.php?id=<?=$reg->id?>">Editar</a>
        <a class='btn btn-outline-danger' href="dar_baixa.php?id=<?=$reg->id?>">Dar Baixa</a></td>
    </tr>
  </tbody>

</div>
    </body>
    <script>
        var search = document.getElementById('pesquisar');
        search.addEventListener("keydown", function(event){
            if (event.key === "Enter")
            {
                searchData();
            }
        });
        
        function searchData()
        {
            window.location = 'relatorio.php?search='+search.value;
        }
    
</script>
</html>

<?php
}
    print '</table>';
}else{
    echo 'Erro ao inserir os dados';
}

}catch(PDOException $e){
    echo $e->getMessage();
}
?>