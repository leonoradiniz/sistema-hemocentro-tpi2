<?php

    function msgCampoVazio($campoVazio) {

        echo("O campo $campoVazio não foi preenchido! Este campo é obrigatório.");
    }

    $etniasValidas = ['branca', 'preta', 'parda', 'amarela', 'indigena'];

    if (isset($_POST['etnia']) && in_array($_POST['etnia'], $etniasValidas)) {

        $etnia = $_POST['etnia'];

    } else {

        msgCampoVazio('Etnia autodeclarada');

    }


    if (isset($_POST['altura']) && !empty(trim($_POST['altura'])) && is_numeric($_POST['altura']) && 
    ($_POST['altura'] >= 100) && ($_POST['altura'] <= 250)) {

        $altura = $_POST['altura'];

    } else {

        msgCampoVazio('Altura (cm)');
    }


    $statusCadastroAnteriorValidos = ['sim', 'nao', 'nao_sei'];

    if (isset($_POST['cadastro_anterior']) && in_array($_POST['cadastro_anterior'], $statusCadastroAnteriorValidos)) {

        $statusCadastroAnterior = $_POST['cadastro_anterior'];

    } else {

        msgCampoVazio('Cadastro Anterior no REDOME');
    
    }


    $statusHistoricoFamiliarValidos = ['sim', 'nao'];

    if (isset($_POST['historico_familiar']) && in_array($_POST['historico_familiar'], $statusHistoricoFamiliarValidos)) {

        $statusHistoricoFamiliar = $_POST['historico_familiar'];

    } else {

        msgCampoVazio('Histórico Familiar');
    }


    $statusDisponibilidadeNacionalValidos = ['sim', 'nao'];

    if (isset($_POST['disponibilidade_nacional']) && in_array($_POST['disponibilidade_nacional'], $statusDisponibilidadeNacionalValidos)) {

        $statusDisponibilidadeNacional = $_POST['disponibilidade_nacional'];

    } else {

        msgCampoVazio('Disponibilidade Nacional para Doação');
    }

?>