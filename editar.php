<?php 
    require_once('conexao.php');

    $id=$_GET['id'];

    $sth = $pdo->prepare("SELECT id, curso, nomeAluno, dataEmprestimo, tituloLivro, dataDevolucao from emprestimo WHERE id = :id");
    $sth->bindValue(':id', $id, PDO::PARAM_STR); // No select e no delete basta um bindValue
    $sth->execute();

    $reg = $sth->fetch(PDO::FETCH_OBJ);
    $curso = $reg->curso;
    $nomeAluno = $reg->nomeAluno;
    $dataEmprestimo = $reg->dataEmprestimo;
    $tituloLivro = $reg->tituloLivro;
    $dataDevolucao = $reg->dataDevolucao;
    

?>
<title>Editar</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="relatorio.php">Relátorios<span class="sr-only"></span></a>
      </li>
    </ul>
  </div>
</nav>
  
</nav>

<style>
*{
    margin: 0%;
    padding: 0%;
}
body{
    background-image: url(https://imgsnotigram.s3.amazonaws.com/uploads/2021/08/l2.jpg);
    width: 100vw;
    height: 100vh;
    background-size: cover;
    color: rgb(12, 3, 3);
    font-family: 'Ubuntu', sans-serif;
    text-align: center;
    background-color: white;
}
.conteudo{
    position: absolute;
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
    background-color: #FFDEAD; 
    
}
.inputBox{
    position: relative;
}

#Enviar{
    background-image: linear-gradient(to right,#4F4F4F, #4F4F4F);
    width: 50%;
    border: none;
    padding: 10px;
    color: white;
    font-size: 18px;
    cursor: pointer;
    border-radius: 10px;
}
#Enviar:hover{
    background-image: linear-gradient(to right,	#000000, 	#000000);
}
    

    
</style>
<div class="conteudo" align="center">
    <form class="" method="post" action="">
       <legend>Editar Registro</legend>

    <label for="curso">Curso</label>
        <select class="form-select form-select-sm" name="curso" value="<?=$curso?>">
                <option name="1º Enfermagem" value="1º Enfermagem">1º Enfermagem</option>
                <option name="1º Hospedagem" value="1º Hospedagem">1º Hospedagem</option>
                <option name="1º Informática" value="1º Informática">1º Informática</option>
                <option name="1º Modelagem" value="1º Modelagem">1º Modelagem</option>
                <option name="2º Enfermagem" value="2º Enfermagem">2º Enfermagem</option>
                <option name="2º Hospedagem" value="2º Hospedagem">2º Hospedagem</option>
                <option name="2º Informática" value="2º Informática">2º Informática</option>
                <option name="2º Modelagem" value="2º Modelagem">2º Modelagem</option>
                <option name="3º Enfermagem" value="3º Enfermagem">3º Enfermagem</option>
                <option name="3º Hospedagem" value="3º Hospedagem">3º Hospedagem</option>
                <option name="3º Informática" value="3º Informática">3º Informática</option>
                <option name="3º Modelagem" value="3º Modelagem">3º Modelagem</option>
        </select>
        <input name="id"  type="hidden" value="<?=$id?> required"> 
        <br>
        Nome<input type="text" class="form-control form-control-sm" name="nomeAluno" value="<?=$nomeAluno?>">
        <input name="id" type="hidden" value="<?=$id?>"> 
        <br>
        Data de Empréstimo<input type="date" class="form-control form-control-sm" name="dataEmprestimo" value="<?=$dataEmprestimo?>">
        <input name="id" type="hidden" value="<?=$id?>"> 
        <br>
        Título do Livro<input type="text" class="form-control form-control-sm" name="tituloLivro" value="<?=$tituloLivro?>">
        <input name="id" type="hidden" value="<?=$id?>">
        <br>
       Data de Devolução<input type="date" class="form-control form-control-sm" name="dataDevolucao" value="<?=$dataDevolucao?>">
        <input name="id" type="hidden" value="<?=$id?>">
        <br>
        <button name= "enviar" id="enviar"class= "submit">ENVIAR</button>

    </form>
</div>

<?php

if(isset($_POST['enviar'])){
    $id = $_POST['id'];
    $curso = $_POST['curso'];
    $nomeAluno = $_POST['nomeAluno'];
    $dataEmprestimo = $_POST['dataEmprestimo'];
    $tituloLivro = $_POST['tituloLivro'];
    $dataDevolucao = $_POST['dataDevolucao'];

    $sql = "UPDATE emprestimo SET curso = :curso, nomeAluno = :nomeAluno, dataEmprestimo = :dataEmprestimo, tituloLivro = :tituloLivro, dataDevolucao = :dataDevolucao WHERE id = :id";
    $sth = $pdo->prepare($sql);
    $sth->bindParam(':id', $_POST['id'], PDO::PARAM_INT);   
    $sth->bindParam(':curso', $_POST['curso'], PDO::PARAM_INT);
    $sth->bindParam(':nomeAluno', $_POST['nomeAluno'], PDO::PARAM_INT);
    $sth->bindParam(':dataEmprestimo', $_POST['dataEmprestimo'], PDO::PARAM_INT);
    $sth->bindParam(':tituloLivro', $_POST['tituloLivro'], PDO::PARAM_INT);
    $sth->bindParam(':dataDevolucao', $_POST['dataDevolucao'], PDO::PARAM_INT);   
   if($sth->execute()){
        print "<script>alert('Registro alterado com sucesso!');location='relatorio.php';</script>";
    }else{
        print "Erro ao editar o registro!<br><br>";
    }
}
?>
