<?php
session_start();

if (isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])) {
    require("../conexoes/conexao.php");

    $adm  = $_SESSION["usuario"][1];
    $nome = $_SESSION["usuario"][0];
    $id_desse_user = $_SESSION["usuario"][3];
    $arrayexplodido = explode("0", $id_desse_user);
} else {
    echo "<script>window.location = '../index.php'</script>";
}
?>
<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ if ($adm) : ?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

    <link rel="icon" type="image/x-icon" href="../img/logo40px.ico" /><!------ Include the above in your HEAD tag ---------->


    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


    <link rel="icon" type="image/x-icon" href="../img/logo40px.ico" /><!------ Include the above in your HEAD tag ---------->

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
    <link href="../css/militares.css" rel="stylesheet">

    <link rel="stylesheet" href="../js/militares.js">
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css'>
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/dialog-polyfill/0.4.2/dialog-polyfill.min.css'>
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/material-design-lite/1.2.1/material.min.css'>
    <link rel='stylesheet prefetch' href='https://code.getmdl.io/1.2.1/material.blue-light_blue.min.css'>
    <style class="cp-pen-styles">
        ;

        header .mdl-layout__drawer {
            border-right: 0;
        }

        header .mdl-layout__drawer .mdl-layout-title {
            box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 1px 5px 0 rgba(0, 0, 0, 0.12);
        }

        header .search label {
            color: rgba(255, 255, 255, 0.6);
        }


        .sidenav {
            background-color: #fff;
            border-right: 0;
        }

        .sidenav .mdl-layout-title {
            box-shadow: rgba(0, 0, 0, 0.13725) 0px 2px 2px 0px, rgba(0, 0, 0, 0.2) 0px 3px 1px -2px, rgba(0, 0, 0, 0.11765) 0px 1px 5px 0px;
        }

        .sidenav .mdl-navigation__link.active {
            color: #2196F3;
        }

        .sidenav .mdl-navigation__link span {
            padding-left: 16px;
        }



        .account_action .action {
            cursor: pointer;
        }

        .account_action .inner {
            padding: 5px 10px;
            font-size: 20px;
            background-color: #fff;
        }

        .account_action .inner .material-icons {
            padding: 5px 10px 0px 0px;
            font-size: 40px;
            color: #2196F3;
            border-right: 1px solid rgba(117, 117, 117, 0.53);
        }

        .account_action .inner span {
            display: inline-block;
            vertical-align: top;
            padding: 14px 10px;
            font-size: 14px;
            color: #757575;
        }

        .account_manage,
        .group_manage {
            color: #757575;
            overflow-x: auto;
            background-color: #fff;
        }

        .account_manage table td,
        .group_manage table td {
            color: #000;
        }

        .account_manage table td.name,
        .group_manage table td.name {
            color: #2196F3;
        }

        .account_manage .title {
            padding-bottom: 10px;
        }

        .account_manage #manage-user-filter {
            float: right;
            text-transform: capitalize;
            background-color: #fff;
            color: #757575;
            box-shadow: 0 1px 0px 0 rgba(0, 0, 0, 0.14), 0 0 1px -2px rgba(0, 0, 0, 0.2), 0 1px 5px 0 rgba(0, 0, 0, 0.12);
        }

        #action_person_dialog,
        #action_group_dialog {
            width: 600px;
        }

        #action_person_dialog .mdl-dialog__title,
        #action_group_dialog .mdl-dialog__title {
            color: #757575;
        }

        #action_person_dialog .mdl-textfield,
        #action_group_dialog .mdl-textfield {
            width: 100%;
        }

        .breadcrumbs {
            float: right;
            padding: 0;
            margin: 0;
            list-style: none;
        }

        .breadcrumbs>li {
            display: inline-block;
        }

        .breadcrumbs>li+li:before {
            padding: 0 5px;
            color: #ccc;
            content: "/ ";
        }

        .breadcrumbs .active {
            font-weight: normal;
            color: #999;
        }

        .buton {
            background-image: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
            width: 100%;
            border: none;
            padding: 10px;
            color: white;
            font-size: 10px;
            cursor: pointer;
            border-radius: 15px;
        }

        .direita {
            position: right;
            text-align: right;
            padding: 15px 15px 0px;

        }

        .buton:hover {
            background-image: linear-gradient(to right, rgb(0, 80, 172), rgb(80, 19, 195));
        }
    </style>

    <header>
        <div class="row">

            <div class="search hidden-xs hidden-sm">
                <input type="text" style="text-transform:uppercase" class="pesquisa" placeholder="Pesquisar" id="search">
            </div>
        </div>

        <li>
            <a href="gerenciamento.php" class="icon-info"><button class="btn btn-dblue btn-lg" role="button" class="submit">Voltar</button></a>
        </li>

        <h2 style="color:black">Escolha um Posto Para Exibir o Historico<h2>


    </header>
    <form method="POST" action="historico_geral.php">
        <select name="idposto">
            <option name="idposto" value="todos">TODOS</option>
            <option name="idposto" value="todospreta">TODOS PRETA</option>
            <option name="idposto" value="todosvermelha">TODOS VERMELHA</option>
            <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ include_once('../dados/postos.php');
            $cont = 0;
            while ($cont < $total_de_posto) {
                if ($Posto_Servico[$cont] == 'VERMELHA') {
                    echo '<option  bgcolor="red"  name="idposto" value="' . $Posto_ID[$cont] . '" ><b>' . $Posto_Nome[$cont] . ' -> Vermelha</b></option>';
                } else {
                    echo '<option name="idposto" value="' . $Posto_ID[$cont] . '" >' . $Posto_Nome[$cont] . ' -> Preta</option>';
                }

                $cont++;
            }
            ?>
        </select>
        <label>Perido: Inicio</label>
        <input type="date" name="dataI" />
        <label>Perido: Final</label>
        <input type="date" name="dataF" />
        <input class="btn btn-dblue btn-lg btn-primary" type="submit" name="submit">
    </form>

    <?php
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    include_once('../conexoes/conect.php');

    if (isset($_POST['idposto'])) {
        $idcon = $_POST['idposto'];
        if ($_POST['idposto'] == 'todos' || $_POST['idposto'] == 'todospreta' || $_POST['idposto'] == 'todosvermelha') {
            if ($_POST['idposto'] == 'todos') {
                $busca = ' p.posto_servico != "todos"';
            }
            if ($_POST['idposto'] == 'todospreta') {
                $busca = ' p.posto_servico = "preta" AND p.tipo_folga != "missao" AND p.tipo_folga != "missao_red" AND p.curso != "2" ';
            }
            if ($_POST['idposto'] == 'todosvermelha') {
                $busca = ' p.posto_servico = "vermelha" AND p.tipo_folga != "missao" AND p.tipo_folga != "missao_red" AND p.curso != "2" ';
            }
        } else {
            $busca = ' p.id_posto = ' . $idcon . ' ';
        }
        if ($_POST['dataI'] != '') {
            $data1 = $_POST['dataI'];
        }
        if ($_POST['dataF'] != '') {
            $data2 = $_POST['dataF'];
        }
        if (isset($data1)) {
            $where = ' e.data >= "' . $data1 . '" ';
        }
        if (isset($data2)) {
            if (isset($where)) {
                $where = $where . ' AND e.data <= "' . $data2 . '" ';
            } else {
                $where = ' e.data <= ' . $data2 . ' ';
            }
        }

        // echo $where;

        if (isset($where)) {

            $sql = "SELECT id , data_ultimo_sv , data_ultimo_sv_red, missao, missao_red, externo, escalado_externo, escalado_externo_red, posto_servico , nome_posto, nome_graduacao, nome_de_guerra, tipo_folga 
                                    FROM posto p INNER JOIN escala e ON e.fk_posto = p.id_posto INNER JOIN militares m ON m.id = e.fk_militar 
                                    INNER JOIN graduacoes g ON g.id_graduacao = m.graduacao
                                    WHERE $busca AND $where
                                     ORDER BY p.prioridade ASC";
        } else {
            $sql = "SELECT id , data_ultimo_sv , data_ultimo_sv_red, missao, missao_red, externo, escalado_externo, escalado_externo_red, posto_servico , nome_posto, nome_graduacao, nome_de_guerra, tipo_folga 
                                    FROM posto p INNER JOIN escala e ON e.fk_posto = p.id_posto INNER JOIN militares m ON m.id = e.fk_militar 
                                  INNER JOIN graduacoes g ON g.id_graduacao = m.graduacao
                                  WHERE $busca
                                   ORDER BY p.prioridade ASC";
        }
        //     echo $sql;
        $result = $conect->query($sql);

    ?>
        <div class="mdl-ce11">
            <main class="">

                <div class="mdl-grid">
                    <div class="mdl-cell mdl-cell--12-col action account_manage">

                        <body>
                            <div id="content">

                                <table class="mdl-data-table mdl-js-data-table mdl-cell mdl-cell--12-col">

                                    <tr>
                                        <th style="  text-align: center;  vertical-align: middle; ">Escala de Serviço</th>
                                        <th style="  text-align: center;"> <img src="../img/logo.png"><br>Gráfica do Exército </th>
                                        <th style="  text-align: center;">Confere com o original <br> <img src="../img/assinatura.png"><br> Escalante </th>
                                    </tr>
                                </table>
                                <div id="tabelaUsuarios">
                                    <table class="mdl-data-table mdl-js-data-table mdl-cell mdl-cell--12-col">
                                        <thead>


                                        </thead>
                                        <tbody>




                                            <tr>
                                                <th> Graduação </td>
                                                <th>Nome Militar</td>
                                                <th> Data da Ultima</td>
                                                <th> Quantidade de vezes </th>

                                            </tr>
                                            <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */
                                            $i = 0;
                                            while ($user_data = mysqli_fetch_assoc($result)) {
                                                $m = $user_data['id'];
                                                $mm[$i] = $m;
                                                $i++;
                                                $mm = array_unique($mm);
                                            }
                                            if (isset($mm)) {
                                                $qtd = count($mm);
                                                $a = 0;
                                                foreach ($mm as $value) {
                                                    if (isset($where)) {
                                                        if ($idcon != '') {
                                                            $sql_qtd = "SELECT * , COUNT(nome_de_guerra) as CON FROM posto p INNER JOIN escala e ON e.fk_posto = p.id_posto INNER JOIN militares m ON m.id = e.fk_militar 
                                                    INNER JOIN graduacoes g ON g.id_graduacao = m.graduacao
                                                   WHERE e.fk_militar = '$value' AND $busca  AND $where";
                                                        } else {
                                                            $sql_qtd = "SELECT * , COUNT(nome_de_guerra) as CON FROM posto p INNER JOIN escala e ON e.fk_posto = p.id_posto INNER JOIN militares m ON m.id = e.fk_militar 
                                                    INNER JOIN graduacoes g ON g.id_graduacao = m.graduacao
                                                   WHERE e.fk_militar = '$value' AND $busca AND $where";
                                                        }
                                                    } else {
                                                        $sql_qtd = "SELECT * , COUNT(nome_de_guerra) as CON FROM posto p INNER JOIN escala e ON e.fk_posto = p.id_posto INNER JOIN militares m ON m.id = e.fk_militar 
                                       INNER JOIN graduacoes g ON g.id_graduacao = m.graduacao
                                      WHERE e.fk_militar = '$value' AND $busca ";
                                                    }

                                                    $m_qtd = 0;
                                                    $result_quantidade_t = $conect->query($sql_qtd);
                                                    while ($user_data = mysqli_fetch_assoc($result_quantidade_t)) {
                                                        $tipo_sv_Folga = $user_data['tipo_folga'];
                                                        echo "<tr>";
                                                        echo "<td>" . $user_data['nome_posto'] . "</td>";
                                                        echo "<td>" . $user_data['nome_graduacao'] . " ";
                                                        echo " <b>" . $user_data['nome_de_guerra'] . "</b></td>";
                                                        echo "<td>" . date('d/m/Y', strtotime($user_data[$tipo_sv_Folga])) . "</td>";
                                                        echo "<td>" . $user_data['CON'] . "</td>";
                                                        echo '</tr>';
                                                    }
                                                }
                                            } else {
                                                echo '<h1>Nenhuma Busca Definida!</h1>';
                                            }






                                            ?>
                                        </tbody>
                                    </table>
                                <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ } ?>
                                </div>
                            </div>
                            <script src="../js/custom.js"></script>
                            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
                            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
                            <script src="../js/personalizado.js"></script>
                        <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ endif; ?>
                        <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ if ($adm != 1) : ?>

                            <script>
                                window.location = '../resumo/painel.php'
                            </script>";

                        <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ endif; ?>