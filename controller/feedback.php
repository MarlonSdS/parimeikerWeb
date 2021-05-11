<?php 

session_start();
include_once("conexao.php");

if(!empty($_POST['estrela'])){
	$estrela = $_POST['estrela'];
    $idUser = $_POST['id-usuario'];
	
	//Salvar no banco de dados
    if($_POST['tipo'] == "empresa"){
        $idEmp = $_POST['id-avaliado'];
        $result_avaliacos = "INSERT INTO notas (nota, idUser, idEmpresa) VALUES ('$estrela', '$idUser', '$idEmp')";
        $resultado_avaliacos = mysqli_query($conexao, $result_avaliacos);
    }elseif($_POST['tipo'] == "auto"){
        $idAuto = $_POST['id-avaliado'];
        $result_avaliacos = "INSERT INTO notas (nota, idUser, idAutonomo) VALUES ('$estrela', '$idUser', '$idAuto')";
        $resultado_avaliacos = mysqli_query($conexao, $result_avaliacos);
    }

    $id = $_POST['id-avaliado'];
    $tipo = $_POST['tipo'];
    header("Location: ../view/visitProfile.php?id=$id&tipo=$tipo");
	
}else{
	$_SESSION['msg'] = "Necessário selecionar pelo menos 1 estrela";
    $id = $_POST['id-avaliado'];
    $tipo = $_POST['tipo'];
	header("Location: ../view/visitProfile.php?id=$id&tipo=$tipo");
}

?>