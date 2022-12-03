<?php 
    require_once('conexao.php');

    $id=$_GET['id'];

    $sth = $pdo->prepare("SELECT id, status from emprestimo WHERE id = :id");
    $sth->bindValue(':id', $id, PDO::PARAM_STR); // No select e no delete basta um bindValue
    $sth->execute();

    $reg = $sth->fetch(PDO::FETCH_OBJ);
    $status = $reg->status;
    
    
?>
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
    background-image: linear-gradient(to right,#000000,#000000);
}
    

    
</style>

<div class="conteudo" align="center">    

    <form method="post" action="">
        <legend>Retirar Pendência</legend>      
        
        <select class="form-select form-select-sm" name="status" value="<?=$status?>">
            <option name="Pendente" value="Pendente">Pendente</option>
            <option name="Devolvido" value="Devolvido">Devolvido</option>  
        </select>
        <input name="id" type="hidden" value="<?=$id?> required"> <br>

        <button name= "enviar" id="enviar" class= "submit">Enviar</button>
    </form>
</div>

<?php

if(isset($_POST['enviar'])){
    $id = $_POST['id'];
    $status = $_POST['status'];
    
    

    $sql = "UPDATE emprestimo SET status = :status WHERE id = :id";
    $sth = $pdo->prepare($sql);
    $sth->bindParam(':id', $_POST['id'], PDO::PARAM_INT);   
    $sth->bindParam(':status', $_POST['status'], PDO::PARAM_INT);   
   if($sth->execute()){
        print "<script>alert('Registro alterado com sucesso!');location='relatorio.php';</script>";
    }else{
        print "Erro ao editar o registro!<br><br>";
    }
}
?>