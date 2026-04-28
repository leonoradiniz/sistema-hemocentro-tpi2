<?php

    function msgCampoVazio($campoVazio) {

        echo("O campo $campoVazio não foi preenchido! Este campo é obrigatório.");
    }

    $statusViagensRiscoValidos = ['menos_3_meses', 'entre_3_12_meses', 'nao'];

    if (isset($_POST['viagem_area_risco']) && in_array($_POST['viagem_area_risco'], $statusViagensRiscoValidos)) {

        $statusViagensRisco = $_POST['viagem_area_risco'];

    } else {

    msgCampoVazio('Viagens para áreas de risco');

    }


    $statusTatuagemPiercingValidos = ['sim', 'nao'];

    if (isset($_POST['tatuagem_piercing']) && in_array($_POST['tatuagem_piercing'], $statusTatuagemPiercingValidos)) {

        $statusTatuagemPiercing = $_POST['tatuagem_piercing'];

    } else {

        msgCampoVazio('Tatuagem e Piercing');
    }

    
    $statusDrogasInjetaveisValidos = ['sim', 'nao'];

    if (isset($_POST['drogas_injetaveis']) && in_array($_POST['drogas_injetaveis'], $statusDrogasInjetaveisValidos)) {

        $statusDrogasInjetaveis = $_POST['drogas_injetaveis'];

    } else {

        msgCampoVazio('Uso de Drogas Injetaveis');
    
    }


    $statusPrivacaoLiberdadeValidos = ['sim', 'nao'];

    if (isset($_POST['privacao_liberdade']) && in_array($_POST['privacao_liberdade'], $statusPrivacaoLiberdadeValidos)) {

        $statusPrivacaoLiberdade = $_POST['privacao_liberdade'];

    } else {

        msgCampoVazio('Status de Privação de Liberdade');
    
    }
    

    $statusPerfurocortanteValidos = ['sim', 'nao'];

    if (isset($_POST['perfurocortante']) && in_array($_POST['perfurocortante'], $statusPerfurocortanteValidos)) {

        $statusPerfurocortante = $_POST['perfurocortante'];

    } else {

        msgCampoVazio('Procedimentos com Material Perfurocortante');
    
    }
?>