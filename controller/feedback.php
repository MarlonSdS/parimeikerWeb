<?php 

session_start();
include_once("conexao.php");

if(!empty($_POST['estrela'] and $_POST['coment'])){
	$estrela = $_POST['estrela'];
    $idUser = $_POST['id-usuario'];
    $data = date("Y/m/d");
    $comentario = $_POST['coment'];
	
	//Salvar no banco de dados
    if($_POST['tipo'] == "empresa"){
        $idEmp = $_POST['id-avaliado'];
        $result_avaliacos = "INSERT INTO notas (nota, comentario, idUser, idEmpresa, data) VALUES ('$estrela', '$comentario', '$idUser', '$idEmp', '$data')";
        $resultado_avaliacos = mysqli_query($conexao, $result_avaliacos);
    }elseif($_POST['tipo'] == "auto"){
        echo $data;
        $idAuto = $_POST['id-avaliado'];
        $result_avaliacos = "INSERT INTO notas (nota, comentario, idUser, idAutonomo, data) VALUES ('$estrela', '$comentario', '$idUser', '$idAuto', '$data')";
        $resultado_avaliacos = mysqli_query($conexao, $result_avaliacos);
    }

    $id = $_POST['id-avaliado'];
    $tipo = $_POST['tipo'];
    header("Location: ../view/visitProfile.php?id=$id&tipo=$tipo");
	
}else{
	$_SESSION['msg'] = "Necessário selecionar pelo menos 1 estrela e o comentário não pode ser em branco";
    $id = $_POST['id-avaliado'];
    $tipo = $_POST['tipo'];
	header("Location: ../view/visitProfile.php?id=$id&tipo=$tipo");
}

?>