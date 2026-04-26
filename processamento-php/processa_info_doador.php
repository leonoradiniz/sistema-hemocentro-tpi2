<?php

    function msgCampoVazio($campoVazio) {

        echo("O campo $campoVazio não foi preenchido! Este campo é obrigatório.");
    }
        

    if (isset ($_POST['nome']) && !empty(trim($_POST['nome']))) {
        $nome = trim($_POST['nome']);

    } else {
        msgCampoVazio('Nome');
    }


    $nome_social = trim($_POST['nome_social']);


    $sexosValidos = ['masculino', 'feminino'];

    if (isset ($_POST['sexo_biologico']) && in_array($_POST['sexo_biologico'], $sexosValidos)) {

        $sexo_biologico = $_POST['sexo_biologico'];

    } else {
        msgCampoVazio('Sexo Biológico');
    }


    if (isset ($_POST['rg']) && !empty(trim($_POST['rg']))) {
        $rg = trim($_POST['rg']);

    } else {
        msgCampoVazio('RG');
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


    if (isset($_POST['data_nascimento']) && !empty($_POST['data_nascimento'])) {

        $dataPreenchida = new DateTime($_POST['data_nascimento']);
        $dataAtual = new DateTime('today');

        if ($dataPreenchida > $dataAtual) {
            echo("Data de Nascimento inválida! A data inserida é posterior à data de hoje.");

        } else {
            $dataNascimento = $_POST['data_nascimento'];
        }

    } else {
        msgCampoVazio('Data de Nascimento');
    }


    $tiposSanguineosValidos = ['A+', 'A-', 'B+', 'B-', 'AB+',  'AB-', 'O+', 'O-', 'nao_sei'];

    if (isset($_POST['tipo_sanguineo']) && in_array($_POST['tipo_sanguineo'], $tiposSanguineosValidos)) {

        $tipoSanguineo = $_POST['tipo_sanguineo'];

    } else {
        msgCampoVazio('Tipo Sanguíneo');
    }


    if (isset($_POST['peso']) && !empty(trim($_POST['peso']))) {

        if ($_POST['peso'] < 0.0) {
            echo("Peso inválido! O peso deve ser maior que zero.");

        } else {
            $peso = trim($_POST['peso']);
        } 
        
    } else {
        msgCampoVazio('Peso');
    } 

    
    if (isset($_POST['telefone']) && !empty(trim($_POST['telefone']))) {

        if (!(preg_match('/^[0-9]{10,11}$/', trim($_POST['telefone'])))) {

            echo("Preenchimento do Telefone inválido! Preencha somente com números e inclua o DDD da sua região.");

        } else {

            $telefone = trim($_POST['telefone']);
        }
    } else {

        msgCampoVazio('Telefone');
    }


    if (isset($_POST['email']) && !empty(trim($_POST['email']))) {

        if (!(filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL))) {

            echo("Preenchimento do E-mail inválido! Preencha conforme o formato 'exemplo@email.com'.");
        }

        else {
            $email = trim($_POST['email']);
        }

    } else {
        msgCampoVazio('E-mail');
    }


    if (isset($_POST['endereco']) && !empty(trim($_POST['endereco']))) {

        $endereco = trim($_POST['endereco']);

    } else {
        msgCampoVazio('Endereço');

    }