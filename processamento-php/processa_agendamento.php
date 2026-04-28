<?php

    function msgCampoVazio($campoVazio) {

        echo("O campo $campoVazio não foi preenchido! Este campo é obrigatório.");
    }

    if (isset($_POST['cpf']) && !empty(trim($_POST['cpf']))) {

        if(!(preg_match ('/^[0-9]{11}$/', trim($_POST['cpf'])))) {

            echo("Preenchimento do CPF inválido! Somente números.");

        } else {
            $cpf = trim($_POST['cpf']);
        }

    } else {
        msgCampoVazio('CPF');
    }


    if (isset($_POST['data_doacao']) && !empty($_POST['data_doacao'])) {

        $dataPreenchida = new DateTime($_POST['data_doacao']);
        $dataAtual = new DateTime('today');

        if ($dataPreenchida < $dataAtual) {
            echo("Data para doação inválida! A data inserida já passou.");

        } else {
            $dataDoacao = $_POST['data_doacao'];
        }

    } else {
        msgCampoVazio('Data Preferida para Doação');
    }


    $turnosValidos = ['manha', 'tarde'];

    if (isset($_POST['turno']) && in_array($_POST['turno'], $turnosValidos)) {

        $turnoDoacao = $_POST['turno'];

    } else {
        msgCampoVazio('Turno Preferido para Doação');
    }


    $unidadesValidas = ['hemominas_uberlandia', 'hemominas_bh', 'hemominas_juiz_fora', 'hemominas_montes_claros'];

    if (isset($_POST['unidade']) && in_array($_POST['unidade'], $unidadesValidas)) {

        $unidade = $_POST['unidade'];

    } else {

        msgCampoVazio('Unidade de Atendimento');
    }


    if (isset($_POST['observacoes'])) {

        $observacoes = trim($_POST['observacoes']);

    } else {

    $observacoes = '';

    }
?>