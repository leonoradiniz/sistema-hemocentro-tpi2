<?php

    function msgCampoVazio($campoVazio) {

        echo("O campo $campoVazio não foi preenchido! Este campo é obrigatório.");
    }


        $doencasCronicasValidas = ['hiv', 'hepatite_b', 'hepatite_c', 'chagas', 'cancer', 'diabetes_insulina', 'nenhuma'];

    if (isset($_POST['doencas_cronicas'])) {

        foreach ($_POST['doencas_cronicas'] as $doenca) {
            if (in_array($doenca, $doencasCronicasValidas)) {

               // o valor é válido, ocorre a atribuição após o fim da verificação do foreach
            
            } else {
                echo("Valor inválido para o campo de Doenças Crônicas! Se atenha à lista de valores disponíveis para marcação.");
            }
        }

        $doencasCronicas = $_POST['doencas_cronicas'];

    } else {
        msgCampoVazio('Doenças Crônicas');
    }


    $sintomasGripaisValidos = ['doente_agora', 'menos_7_dias', 'mais_7_dias', 'nao_tive'];

    if (isset($_POST['sintomas_gripais']) && in_array($_POST['sintomas_gripais'], $sintomasGripaisValidos)) {

        $sintomasGripais = $_POST['sintomas_gripais'];

    } else {
        msgCampoVazio('Sintomas Gripais Recentes');
    }


    $covidValoresValidos = ['positivo_recente', 'contato_recente', 'recuperado', 'nao_tive'];

    if (isset($_POST['covid']) && in_array($_POST['covid'], $covidValoresValidos)) {

        $valorCovid = $_POST['covid'];

    } else {
        msgCampoVazio('Covid-19');
    }


    $eventosRecentesValidos = ['vacina', 'cirurgia_pequena', 'cirurgia_grande', 'odontologico', 'nenhum'];

    if (isset($_POST['eventos_recentes'])) {

        foreach ($_POST['eventos_recentes'] as $evento) {
            if (in_array($evento, $eventosRecentesValidos)) {

               // o valor é válido, ocorre a atribuição após o fim da verificação do foreach
            
            } else {
                echo("Valor inválido para o campo de Eventos Recentes de Saúde! Se atenha à lista de valores disponíveis para marcação.");
            }
        }

        $eventosRecentes = $_POST['eventos_recentes'];

    } else {
        msgCampoVazio('Eventos Recentes de Saúde');
    }

    
    $gravidezValoresValidos = ['gravida', 'amamentando', 'pos_parto_recente', 'nenhuma'];

    if (isset($_POST['gravidez']) && in_array($_POST['gravidez'], $gravidezValoresValidos)) {

        $gravidezValor = $_POST['gravidez'];

    } else {
        msgCampoVazio('Gravidez e Pós-Parto');
    }

?>