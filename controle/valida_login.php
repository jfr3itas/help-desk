<?php

    session_start();
    print_r($_SESSION);

    $usuario_autenticado = false;
    $id_usuario = 0;
    $usuario_perfil_id = null;

    $perfis = array(1 => 'Adm', 2 => 'Usuário');

    $usuarios_app = array(

        array('id' => 1, 'email' => 'adm@teste.com.br', 'senha' => '123456', 'perfil_id' => 1),
        array('id' => 2, 'email' => 'user@teste.com.br', 'senha' => 'abcd', 'perfil_id' => 2),
        array('id' => 3, 'email' => 'user2@teste.com.br', 'senha' => 'abcd', 'perfil_id' => 2)

    );

    foreach($usuarios_app as $usuario) {

        if($usuario['email'] == $_POST['email'] && $usuario['senha'] == $_POST['senha']) {

            $usuario_autenticado = true;
            $id_usuario = $usuario['id'];
            $usuario_perfil_id = $usuario['perfil_id'];

        }
        
        else
            header('Location: index.php?login=erro');

    }

    if($usuario_autenticado) {

        $_SESSION['autenticado'] = true;
        $_SESSION['id'] = $id_usuario;
        $_SESSION['perfil_id'] = $usuario_perfil_id;
        header('Location: ../home.php');

    }
    
    else {

        $_SESSION['autenticado'] = false;
        header('Location: index.php?login=erro');
        
    }

?>