
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Empréstimo</title>
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
    background: rgba(40, 40, 41, 0.31);
    border-radius: 16px;
    box-shadow: 0 4px 30px rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(2.7px);
    -webkit-backdrop-filter: blur(2.7px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    background: rgba(255, 255, 255, 0.2);
    border-radius: 16px;
    box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
    backdrop-filter: blur(5px);
    -webkit-backdrop-filter: blur(5px);
    border: 1px solid rgba(255, 255, 255, 0.3); 
    background-color: lightblue; 
}

.inputBox{
    position: relative;
}

#Enviar{    
    background-image: linear-gradient(to right,#363333, #363333);
    width: 50%;
    border: none;
    padding: 10px;
    color: white;
    font-size: 18px;
    cursor: pointer;
    border-radius: 10px;
}
#Enviar:hover{
    background-image: linear-gradient(to right,  #121111,#121111);
}
    
</style>

</head>

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
    </ul>
  </div>
</nav>

<body>
<br><br><br><br><br>
    <div class=" btn btn-dark">
    <form name="formEmprestimo" method="POST" action="emprestimo.php">
        <fieldset>
            <legend>Adicionar Emprestimo</legend>
        <label for="curso">Curso</label>
            <select class="form-select form-select-sm" name="curso" value="<?=$curso?>"required>
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
            <br>
            Nome <input class="form-control form-control-sm" type="text" name="nomeAluno" required>
            <br>
            Data de Empréstimo <input class="form-control form-control-sm" type="date" name="dataEmprestimo" required>
            <br>
            Título do Livro <input class="form-control form-control-sm" type="text" name="tituloLivro" required>
            <br>
            Data de Devolução <input class="form-control form-control-sm" type="date" name="dataDevolucao" required>
            <br>
        
        <button name= "Enviar" id="Enviar" class= "submit">ENVIAR</button>
    
        </fieldset>
    </form>
</div>

<br><br><br><br><br><br>



</body>
</html>


<?php 
    require_once('conexao.php');
        if(isset($_POST['Enviar'])){
            $curso=$_POST['curso'];
            $nomeAluno=$_POST['nomeAluno'];
            $dataEmprestimo=$_POST['dataEmprestimo'];
            $tituloLivro=$_POST['tituloLivro'];
            $dataDevolucao=$_POST['dataDevolucao'];

        try{
            $stmte = $pdo->prepare("INSERT INTO emprestimo(curso, nomeAluno, dataEmprestimo, tituloLivro, dataDevolucao) VALUES(?, ?, ?, ?, ?)");
            $stmte -> bindParam(1, $curso, PDO::PARAM_STR);
            $stmte -> bindParam(2, $nomeAluno, PDO::PARAM_STR);
            $stmte -> bindParam(3, $dataEmprestimo, PDO::PARAM_STR);
            $stmte -> bindParam(4, $tituloLivro, PDO::PARAM_STR);
            $stmte -> bindParam(5, $dataDevolucao, PDO::PARAM_STR);
            $executa = $stmte->execute();

            if($executa){
                
            }else{
                echo "erro ao inserir dados";
            }

        
        
        
        }catch(PDOException $e){
            echo $e->GetMessage();
        }
        
        }
    

?>
