<?php

// Incluir a conexao com o banco de dados
include_once 'config.php';

//Receber os dados da requisão
$dados_requisicao = $_REQUEST;

// Obter a quantidade de registros no banco de dados
$query_qnt_emprestimo = "SELECT COUNT(id) AS qnt_emprestimos FROM emprestimo";
$result_qnt_emprestimo = $conn->prepare($query_qnt_emprestimo);
$result_qnt_emprestimo->execute();
$row_qnt_emprestimo = $result_qnt_emprestimo->fetch(PDO::FETCH_ASSOC);
//var_dump($row_qnt_usuarios);

// Recuperar os registros do banco de dados
$query_emprestimo = "SELECT , curso, nomeAluno, dataEmprestimo, tituloLivro, dataDevolucao, status 
                    FROM emprestimo
                    ORDER BY id DESC";
                    LIMIT :inicio , :quantidade"; //LIMIT :inicio, :quantidade
$result_emprestimo = $conn->prepare($query_emprestimo);
$result_emprestimo->bindParam(':inicio', $dados_requisicao['start'], PDO::PARAM_INT);
$result_emprestimo->bindParam(':quantidade', $dados_requisicao['length'], PDO::PARAM_INT);
$result_emprestimo->execute();

while($row_emprestimo = $result_emprestimo->fetch(PDO::FETCH_ASSOC)){
    //var_dump($row_usuario);
    extract($row_emprestimo);
    $emprestimos = [];
    $emprestimo[] = $curso;
    $emprestimo[] = $nomeAluno;
    $emprestimo[] = $dataEmprestimo;
    $emprestimo[] = $tituloLivro;
    $emprestimo[] = $dataDevolucao;
    $emprestimo[] = $status;
    $dados[] = $emprestimo;
}

//var_dump($dados);

//Cria o array de informações a serem retornadas para o Javascript
$resultado=[
    "draw" => intval($dados_requisicao['draw']), // Para cada requisição é enviado um número como parâmetro
    "recordsTotal" => intval($row_qnt_emprestimo['qnt_emprestimo']), // Quantidade de registros que há no banco de dados
    "recordsFiltered" => intval($row_qnt_emprestimo['qnt_emprestimo']), // Total de registros quando houver pesquisa
    "data" => $dados // Array de dados com os registros retornados da tabela usuarios
];

//var_dump($resultado);

// Retornar os dados em formato de objeto para o JavaScript
echo json_encode($resultado);
?>