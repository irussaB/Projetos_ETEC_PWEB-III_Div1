<?php
    require '../app/conexao.php';
    $pdo = Conexao::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    //$json = $_GET['jsn'];//{"nome":"valor"}
    $json = filter_input(INPUT_GET,'json');
    $data = json_decode($json,true);
    $usuario = $data['usuario'];
    $senha = $data['senha'];
    $sql = "select * from usuarios where usulogin = '$usuario' and ususenha = MD5($senha);";
    $prp = $pdo->prepare($sql);
    $prp->execute();
    $data = $prp->fetchall(PDO::FETCH_ASSOC);
    echo json_encode($data);
    Conexao::desconectar();
    //{"usuario":"valor","senha":"valor"}
    //http://localhost/Projetos_ETEC_PWEB-III_Div1/api/spusuarios.php?json={"usuario":"irussaB","senha":"19062008"}

?>