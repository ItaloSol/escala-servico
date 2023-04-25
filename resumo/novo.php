
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="ISO-8859-1">
        <link rel="shortcut icon" href="http://servico.badmqgex.eb.mil.br/images/brasao_base_border.ico" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<!--<meta name="viewport" content="width=device-width, inital-scale=1, shrink-to-fit=no">-->
<link rel="stylesheet" href="http://servico.badmqgex.eb.mil.br/vendor/components/font-awesome/css/fontawesome-all.min.css">

<!--<link rel="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css">-->
<link rel="stylesheet" href="http://servico.badmqgex.eb.mil.br/include/md/css/bootstrap.min.css">
<link rel="stylesheet" href="http://servico.badmqgex.eb.mil.br/include/md/css/mdb.min.css">
<!-- ----------------------------------------------------------------------------- -->

<link rel="stylesheet" href="http://servico.badmqgex.eb.mil.br/include/datatables/datatables.min.css">
<!-- ----------------------------------------------------------------------------- -->

<link rel="stylesheet" href="http://servico.badmqgex.eb.mil.br/vendor/components/jqueryui/themes/base/jquery-ui.min.css">
<!-- ----------------------------------------------------------------------------- -->

<link rel="stylesheet" href="http://servico.badmqgex.eb.mil.br/include/chosen/component-chosen.min.css">
<!-- ----------------------------------------------------------------------------- -->

<link rel="stylesheet" href="http://servico.badmqgex.eb.mil.br/include/css/style.css">        <title></title>
    </head>
    <body>
        <!--<div class="loading">
            <div style="position: absolute; left: 50%; top: 40%;">
                <div style="position: relative; left: -50%; top: -40%;">
                    <div class="position-relative text-center">
                        <h3>Recalculando escala, aguarde...</h3>
                        <i class="fas fa-cog fa-spin fa-4x"></i>
                        <i class="fas fa-cog fa-spin fa-2x" style="animation-direction: reverse"></i>
                    </div>
                </div>
            </div>
        </div>-->
            <nav class="navbar navbar-expand-lg navbar-dark rgba-black-slight animated fadeIn fixed-top scrolling-navbar no-print">
        <div class="container-fluid">
            <a class="navbar-brand" href="http://servico.badmqgex.eb.mil.br/">
                <img src="http://intranet.badmqgex.eb.mil.br/images/conteudo/badmqgex.min.png" width="25" height="30" class="d-inline-flex align-top" alt="">
                B Adm QGEx
                <small class="text-warning float-right" style="font-size: 48%!important;margin-top:10px">&nbsp;&nbsp;<i class="fas fa-info-circle"></i> em fase de testes</small>
            </a>
            <button onclick="$('#navbarResponsive').toggle()" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse animated fadeInDown" id="navbarResponsive">
                                                            <ul class="navbar-nav mx-auto">
    
        
                        <li class="nav-item  mt-auto mb-auto">
                <a class="nav-link load" href="http://servico.badmqgex.eb.mil.br/escala/datas/1/1">
                    <span>Datas</span>
                </a>
            </li>
            
            <li class="nav-item dropdown mt-auto mb-auto">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownImpedimentos" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Impedimentos
                </a>
                <ul id="dropdownMenuImpedimentos" class="dropdown-menu dropdown-menu-right animated fadeIn p-0 border-0 z-depth-2" aria-labelledby="navbarDropdownImpedimentos">
                                            <li class="form-control w-100 d-inline-flex p-0 hoverable">
                            <a href="#" data-target="#collapseImpedimentos1" data-toggle="collapse" aria-controls="collapseImpedimentos1" aria-expanded="false" class="dropdown-item">Serviço ao QGEx <i class='mt-1 float-right fas fa-chevron-down'></i></a>
                        </li>
                        <li class="list-group-item collapse p-0" id="collapseImpedimentos1">
                            <ul class="list-group p-0">
                                <li class="list-group-item w-100 d-inline-flex p-0 hoverable">
                                    <a href="http://servico.badmqgex.eb.mil.br/escala/novo-impedimento/1"><i class="fas fa-plus text-info"></i> Informar novo</a>
                                </li>
                                <li class="list-group-item w-100 d-inline-flex p-0 hoverable">
                                    <a href="http://servico.badmqgex.eb.mil.br/escala/impedidos/1"><i class="fas fa-check text-success"></i> Autorizados</a>
                                </li>
                                <li class="list-group-item w-100 d-inline-flex p-0 hoverable">
                                    <a href="http://servico.badmqgex.eb.mil.br/escala/impedidos/1?f=pendentes"><i class="fas fa-exclamation-triangle text-warning"></i> Pendentes</a>
                                </li>
                                <li class="list-group-item w-100 d-inline-flex p-0 hoverable">
                                    <a href="http://servico.badmqgex.eb.mil.br/escala/impedidos/1?f=corrigir"><i class="fas fa-tasks text-warning"></i> Para corrigir</a>
                                </li>
                                <li class="list-group-item w-100 d-inline-flex p-0 hoverable">
                                    <a href="http://servico.badmqgex.eb.mil.br/escala/impedidos/1?finalizando"><i class="far fa-clock text-danger"></i> Finalizando</a>
                                </li>
                            </ul>
                        </li>
                                    </ul>
            </li>
            
            <li class="nav-item  mt-auto mb-auto">
                <a class="nav-link load" href="http://servico.badmqgex.eb.mil.br/escala/plano-de-chamada/052126">
                    <span>Plano de chamada</span>
                </a>
            </li>
                                        <li class="nav-item dropdown mt-auto mb-auto">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Serviços
    </a>
    <ul class="dropdown-menu dropdown-menu-right animated fadeIn p-0 border-0 z-depth-2" aria-labelledby="navbarDropdown">
        <li class="list-group-item w-100 d-inline-flex p-0 hoverable">
                        <a class="dropdown-item load" href="http://servico.badmqgex.eb.mil.br/escala/1/11/05/2022"> <img class="wh-2" src="http://servico.badmqgex.eb.mil.br/images/escala-sv.png"> Escala de Sv</a>
        </li>
        <li class="list-group-item w-100 d-inline-flex p-0 hoverable">
            <a class="dropdown-item" href="http://servico.badmqgex.eb.mil.br/livro"> <img class="wh-2" src="http://servico.badmqgex.eb.mil.br/images/livro-of-dia.png"> Livro do OD</a>
        </li>
    </ul>
</li></ul>

                                                        <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown mt-auto mb-auto mr-0">
            <a onclick="$(this).children('i').toggleClass('bell-shake')" class="nav-link dropdown-toggle" href="#" id="navbarDropdownMsg" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell text-warning fa-1-5x"></i>    
            </a>
                            <ul class="dropdown-menu dropdown-menu-right animated fadeIn p-0 border-0 z-depth-2" aria-labelledby="navbarDropdownMsg">
                                                                        <h6 class="dropdown-header"><i class="fas fa-info-circle text-warning"></i> Avisos da escala <b>Serviço ao QGEx</b></h6>
                                                            <li class="list-group-item hoverable" style="font-size:smaller">
                                    <b>Impedimentos de militares</b><br>Há 132 <a class='v-align-bottom p-0 waves-effect waves-light' style='color:#4285f4!important;font-size:inherit;' href='http://servico.badmqgex.eb.mil.br/escala/impedidos/1?finalizando'>impedimentos</a> prestes a serem finalizados em até 20 dias.                                </li>
                                                                                                                                                <li class="list-group-item hoverable" style="font-size:smaller">
                                    <b>Impedimento</b><br>O senhor possui <a class='v-align-bottom p-0 waves-effect waves-light' style='color:#4285f4!important;font-size:inherit;' href='http://servico.badmqgex.eb.mil.br/escala/impedimento/1/43c19f2f5a5d5ecdc6649732d7fa9046'>impedimento</a>  e só volta ao serviço  em 31/05/2022.                                </li>
                                                                                        <li class="list-group-item hoverable" style="font-size:smaller">
                                    <b>Status na previsão</b><br>O senhor está na previsão em <a href="http://servico.badmqgex.eb.mil.br/escala/1/31/05/2022" class="v-align-middle p-0" style="color:#4285f4!important;font-size:inherit;">31/05/2022 (Cb Blq)</a> e <a href="http://servico.badmqgex.eb.mil.br/escala/1/04/06/2022" class="v-align-middle p-0" style="color:#4285f4!important;font-size:inherit;">04/06/2022 (Cb Blq)</a>. Redobre sua atenção!                                </li>
                                                                                        <li class="list-group-item hoverable" style="font-size:smaller">
                                                                            <b>Sobreaviso GERAL</b><br>Até o dia 13/05/2022, o senhor não está de sobreaviso GERAL entre os 10 primeiros substitutos.                                                                    </li>
                                                                                        <li class="list-group-item hoverable" style="font-size:smaller">
                                                                            <b>Sobreaviso na OM</b><br>Até o dia 13/05/2022, o senhor não está de sobreaviso na OM entre os 10 primeiros substitutos.                                                                    </li>
                                                                                        </ul>
                    </li>
                <li class="nav-item avatar dropdown mtsm2">
            <a class="nav-link p-0" href="#" id="dropUser" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img id="imgNavbarProfile" src="http://servico.badmqgex.eb.mil.br/images/user.png" class="rounded-circle bg-white" alt="avatar image" height="35" width="35">
            </a>
            <ul class="dropdown-menu dropdown-menu-right animated fadeIn p-0 border-0 z-depth-2 w-100" aria-labelledby="dropUser">
                <li class="list-group-item w-100 d-inline-flex p-0 hoverable">
                                        <a class="dropdown-item " href="http://servico.badmqgex.eb.mil.br/perfil/1110579776">
                        <i class="fas fa-user-circle fa-2x "></i>
                        <span class="position-absolute ml-3 " style="margin-top:0.4rem;">perfil</span>
                    </a>
                </li>
                <li class="list-group-item w-100 d-inline-flex p-0 hoverable">
                    <a class="dropdown-item" href="http://servico.badmqgex.eb.mil.br/logout">
                        <i class="fas fa-sign-out-alt fa-1x"></i>
                        <span class="position-absolute ml-3">sair</span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
            </div>
        </div>
    </nav>
                <div class="container conteudo">
                        <div class="my-4 content-inner animated fadeIn">
                <div style="overflow: auto" class="card card-body">
    <table class="table table-bordered table-condensed dtable" data-dtable-title='Escala "Serviço ao QGEx" resumida'>
        <thead>
            <tr>
                <th>Data</th>
                <th>Militares</th>
            </tr>
        </thead>
        <tbody>
                            <tr class="">
                    <td width="150" class="text-center">
                        <b class="display-4">11/05</b> <br>
                        Qua (escala preta) <br>
                                            </td>
                    <td class="text-center p-2">
                                                    NENHUM MILITAR DO SEU ÓRGÃO ESCALADO PARA ESTE DIA!
                                            </td>
                </tr>
                            <tr class="">
                    <td width="150" class="text-center">
                        <b class="display-4">12/05</b> <br>
                        Qui (escala preta) <br>
                                            </td>
                    <td class="text-center p-2">
                                                    NENHUM MILITAR DO SEU ÓRGÃO ESCALADO PARA ESTE DIA!
                                            </td>
                </tr>
                            <tr class="">
                    <td width="150" class="text-center">
                        <b class="display-4">13/05</b> <br>
                        Sex (escala preta) <br>
                                            </td>
                    <td class="text-center p-2">
                                                    NENHUM MILITAR DO SEU ÓRGÃO ESCALADO PARA ESTE DIA!
                                            </td>
                </tr>
                            <tr class="">
                    <td width="150" class="text-center">
                        <b class="display-4">14/05</b> <br>
                        Sáb (escala vermelha) <br>
                                            </td>
                    <td class="text-center p-2">
                                                    NENHUM MILITAR DO SEU ÓRGÃO ESCALADO PARA ESTE DIA!
                                            </td>
                </tr>
                            <tr class="">
                    <td width="150" class="text-center">
                        <b class="display-4">15/05</b> <br>
                        Dom (escala vermelha) <br>
                                            </td>
                    <td class="text-center p-2">
                                                    NENHUM MILITAR DO SEU ÓRGÃO ESCALADO PARA ESTE DIA!
                                            </td>
                </tr>
                            <tr class="">
                    <td width="150" class="text-center">
                        <b class="display-4">16/05</b> <br>
                        Seg (escala preta) <br>
                                            </td>
                    <td class="text-center p-2">
                                                    NENHUM MILITAR DO SEU ÓRGÃO ESCALADO PARA ESTE DIA!
                                            </td>
                </tr>
                            <tr class="">
                    <td width="150" class="text-center">
                        <b class="display-4">17/05</b> <br>
                        Ter (escala preta) <br>
                                            </td>
                    <td class="text-center p-2">
                                                    NENHUM MILITAR DO SEU ÓRGÃO ESCALADO PARA ESTE DIA!
                                            </td>
                </tr>
                            <tr class="">
                    <td width="150" class="text-center">
                        <b class="display-4">18/05</b> <br>
                        Qua (escala preta) <br>
                                            </td>
                    <td class="text-center p-2">
                                                    NENHUM MILITAR DO SEU ÓRGÃO ESCALADO PARA ESTE DIA!
                                            </td>
                </tr>
                            <tr class="">
                    <td width="150" class="text-center">
                        <b class="display-4">19/05</b> <br>
                        Qui (escala preta) <br>
                                            </td>
                    <td class="text-center p-2">
                                                    NENHUM MILITAR DO SEU ÓRGÃO ESCALADO PARA ESTE DIA!
                                            </td>
                </tr>
                            <tr class="">
                    <td width="150" class="text-center">
                        <b class="display-4">20/05</b> <br>
                        Sex (escala preta) <br>
                                            </td>
                    <td class="text-center p-2">
                                                    NENHUM MILITAR DO SEU ÓRGÃO ESCALADO PARA ESTE DIA!
                                            </td>
                </tr>
                            <tr class="">
                    <td width="150" class="text-center">
                        <b class="display-4">21/05</b> <br>
                        Sáb (escala vermelha) <br>
                                            </td>
                    <td class="text-center p-2">
                                                    NENHUM MILITAR DO SEU ÓRGÃO ESCALADO PARA ESTE DIA!
                                            </td>
                </tr>
                            <tr class="">
                    <td width="150" class="text-center">
                        <b class="display-4">22/05</b> <br>
                        Dom (escala vermelha) <br>
                                            </td>
                    <td class="text-center p-2">
                                                    NENHUM MILITAR DO SEU ÓRGÃO ESCALADO PARA ESTE DIA!
                                            </td>
                </tr>
                            <tr class="">
                    <td width="150" class="text-center">
                        <b class="display-4">23/05</b> <br>
                        Seg (escala preta) <br>
                                            </td>
                    <td class="text-center p-2">
                                                    NENHUM MILITAR DO SEU ÓRGÃO ESCALADO PARA ESTE DIA!
                                            </td>
                </tr>
                            <tr class="">
                    <td width="150" class="text-center">
                        <b class="display-4">24/05</b> <br>
                        Ter (escala preta) <br>
                                            </td>
                    <td class="text-center p-2">
                                                    NENHUM MILITAR DO SEU ÓRGÃO ESCALADO PARA ESTE DIA!
                                            </td>
                </tr>
                            <tr class="">
                    <td width="150" class="text-center">
                        <b class="display-4">25/05</b> <br>
                        Qua (escala preta) <br>
                                            </td>
                    <td class="text-center p-2">
                                                    NENHUM MILITAR DO SEU ÓRGÃO ESCALADO PARA ESTE DIA!
                                            </td>
                </tr>
                            <tr class="">
                    <td width="150" class="text-center">
                        <b class="display-4">26/05</b> <br>
                        Qui (escala preta) <br>
                                            </td>
                    <td class="text-center p-2">
                                                    NENHUM MILITAR DO SEU ÓRGÃO ESCALADO PARA ESTE DIA!
                                            </td>
                </tr>
                            <tr class="">
                    <td width="150" class="text-center">
                        <b class="display-4">27/05</b> <br>
                        Sex (escala preta) <br>
                                            </td>
                    <td class="text-center p-2">
                                                    NENHUM MILITAR DO SEU ÓRGÃO ESCALADO PARA ESTE DIA!
                                            </td>
                </tr>
                            <tr class="">
                    <td width="150" class="text-center">
                        <b class="display-4">28/05</b> <br>
                        Sáb (escala vermelha) <br>
                                            </td>
                    <td class="text-center p-2">
                                                    NENHUM MILITAR DO SEU ÓRGÃO ESCALADO PARA ESTE DIA!
                                            </td>
                </tr>
                            <tr class="">
                    <td width="150" class="text-center">
                        <b class="display-4">29/05</b> <br>
                        Dom (escala vermelha) <br>
                                            </td>
                    <td class="text-center p-2">
                                                    NENHUM MILITAR DO SEU ÓRGÃO ESCALADO PARA ESTE DIA!
                                            </td>
                </tr>
                            <tr class="">
                    <td width="150" class="text-center">
                        <b class="display-4">30/05</b> <br>
                        Seg (escala preta) <br>
                                            </td>
                    <td class="text-center p-2">
                                                    NENHUM MILITAR DO SEU ÓRGÃO ESCALADO PARA ESTE DIA!
                                            </td>
                </tr>
                            <tr class="">
                    <td width="150" class="text-center">
                        <b class="display-4">31/05</b> <br>
                        Ter (escala preta) <br>
                                            </td>
                    <td class="text-center p-2">
                                                    <ul class="list-group">
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de 2º Ten FURTUOZO"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/0112867544'">
                                    2º Ten FURTUOZO (OD) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de 1º Sgt NASCIMENTO"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/0435086244'">
                                    1º Sgt NASCIMENTO (Sgt Adj) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de 2º Sgt THEES"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/0119025658'">
                                    2º Sgt THEES (Sgt Mon) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de 3º Sgt LEIDIANA FREITAS"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1110927975'">
                                    3º Sgt LEIDIANA FREITAS (Sgt Mon) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de 3º Sgt EDNUBIA"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1110924873'">
                                    3º Sgt EDNUBIA (Sgt Mon) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de 3º Sgt GIRLANE"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1107664979'">
                                    3º Sgt GIRLANE (Sgt Port Norte) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de 3º Sgt RAQUEL OLIVEIRA"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1114108879'">
                                    3º Sgt RAQUEL OLIVEIRA (Sgt Garagem) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de 3º Sgt ELIAS JOSE"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1115671479'">
                                    3º Sgt ELIAS JOSE (Sgt Delta) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de 3º Sgt MARIO"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1112070279'">
                                    3º Sgt MARIO (Sgt Port Sul) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de 3º Sgt MASCARENHAS"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1104669872'">
                                    3º Sgt MASCARENHAS (Sgt P1) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de 3º Sgt JEANE CARVALHO"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1117827574'">
                                    3º Sgt JEANE CARVALHO (Sgt P3) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Cb ANDERSON"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1108802271'">
                                    Cb ANDERSON (Fisc Res) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Cb CARVALHO"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1108797976'">
                                    Cb CARVALHO (Cb Blq) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Cb DO CARMO"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1110579776'">
                                    Cb DO CARMO (Cb Blq) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Cb KEVIN"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1112048770'">
                                    Cb KEVIN (Cb Blq) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Cb ARTUR SILVA"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1109392579'">
                                    Cb ARTUR SILVA (Cb Blq) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Cb WYLIMA"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1112506876'">
                                    Cb WYLIMA (Cb P4) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Cb WESLEY"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1104930274'">
                                    Cb WESLEY (Cb Garagem) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Cb ITALO"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1112048671'">
                                    Cb ITALO (Cb Port Norte) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Cb RODRIGUES"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1105061475'">
                                    Cb RODRIGUES (Cb Port Sul) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Cb FISCHER"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1114651373'">
                                    Cb FISCHER (Cb Delta) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Cb FERNANDES"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1112093677'">
                                    Cb FERNANDES (Cb P1) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Cb MANDU"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1114651472'">
                                    Cb MANDU (Cb P2) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Cb PAIVA"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1114627878'">
                                    Cb PAIVA (Cb P3) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd DUARTE"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1110634175'">
                                    Sd DUARTE (Sd Ap Port Sul) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd MARCOS CAVALCANTE"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1110626478'">
                                    Sd MARCOS CAVALCANTE (Sd Ap Port Sul) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd OLIVEIRA"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1111056071'">
                                    Sd OLIVEIRA (Sd Ap Port Norte) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd ALESSANDRO"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1112033079'">
                                    Sd ALESSANDRO (Sd Ap Port Norte) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd MEDEIROS"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1112088776'">
                                    Sd MEDEIROS (Sd Garagem) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd DELMARIO"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1113777278'">
                                    Sd DELMARIO (Sd Garagem) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd ADOHILTON"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1113381774'">
                                    Sd ADOHILTON (Sd Garagem) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd DE SOUSA"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1114651878'">
                                    Sd DE SOUSA (Sd Garagem) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd MATHEUS"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1114690272'">
                                    Sd MATHEUS (Sd Garagem) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd RANIERY"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1115293670'">
                                    Sd RANIERY (Sd Garagem) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd MORAIS"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1115594077'">
                                    Sd MORAIS (Sd Gd) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd DESIDERIO"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1115580274'">
                                    Sd DESIDERIO (Sd Gd) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd MUNIZ"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1115595371'">
                                    Sd MUNIZ (Sd Gd) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd RESPLANDES"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1115594879'">
                                    Sd RESPLANDES (Sd Gd) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd RAMOS"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1117383776'">
                                    Sd RAMOS (Sd Gd) <br>
                                </li>
                                                            </ul>
                                            </td>
                </tr>
                            <tr class="">
                    <td width="150" class="text-center">
                        <b class="display-4">01/06</b> <br>
                        Qua (escala preta) <br>
                                            </td>
                    <td class="text-center p-2">
                                                    <ul class="list-group">
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de 1º Sgt ÍTALO"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/0400156352'">
                                    1º Sgt ÍTALO (Sgt Adj) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Cb CHRIS MARCOS"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1110597877'">
                                    Cb CHRIS MARCOS (Cb Blq) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Cb HENRIQUE"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1111055776'">
                                    Cb HENRIQUE (Cb Blq) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Cb CLEYTON"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1112083371'">
                                    Cb CLEYTON (Cb Garagem) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Cb MENDES"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1116652775'">
                                    Cb MENDES (Cb Port Norte) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd Rcr DE MELO"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1118355674'">
                                    Sd Rcr DE MELO (Sd Ap Port Sul) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd Rcr SERGIO"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1118348471'">
                                    Sd Rcr SERGIO (Sd Ap Port Sul) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd Rcr SALVIANO"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1118355872'">
                                    Sd Rcr SALVIANO (Sd Ap Port Norte) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd Rcr BRUNO"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1118346871'">
                                    Sd Rcr BRUNO (Sd Ap Port Norte) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd Rcr MICHEL"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1118347077'">
                                    Sd Rcr MICHEL (Sd Garagem) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd Rcr ROBERTH"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1118348778'">
                                    Sd Rcr ROBERTH (Sd Garagem) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd Rcr JANSEN"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1118353778'">
                                    Sd Rcr JANSEN (Sd Garagem) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd Rcr ANUNCIACAO"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1118350576'">
                                    Sd Rcr ANUNCIACAO (Sd Garagem) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd Rcr DA SILVA"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1118354974'">
                                    Sd Rcr DA SILVA (Sd Garagem) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd Rcr MARTINS"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1118349479'">
                                    Sd Rcr MARTINS (Sd Garagem) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd Rcr SAMUEL"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1118348570'">
                                    Sd Rcr SAMUEL (Sd Gd) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd Rcr LUIZ EDUARDO"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1118349974'">
                                    Sd Rcr LUIZ EDUARDO (Sd Gd) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd Rcr ADRIANO"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1118356672'">
                                    Sd Rcr ADRIANO (Sd Gd) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd Rcr EDUARDO"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1118354578'">
                                    Sd Rcr EDUARDO (Sd Gd) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd Rcr TORRES"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1118353976'">
                                    Sd Rcr TORRES (Sd Gd) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd Rcr VINICIUS"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1118347978'">
                                    Sd Rcr VINICIUS (Sd Gd) <br>
                                </li>
                                                            </ul>
                                            </td>
                </tr>
                            <tr class="">
                    <td width="150" class="text-center">
                        <b class="display-4">02/06</b> <br>
                        Qui (escala preta) <br>
                                            </td>
                    <td class="text-center p-2">
                                                    <ul class="list-group">
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Asp SHIRLEY"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1112491475'">
                                    Asp SHIRLEY (Aux OD) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de 1º Sgt BRAGA"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/0434946943'">
                                    1º Sgt BRAGA (Sgt Adj) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd Rcr HONORIO"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1118348877'">
                                    Sd Rcr HONORIO (Sd Ap Port Sul) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd Rcr KAYKY"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1118351178'">
                                    Sd Rcr KAYKY (Sd Ap Port Sul) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd Rcr PEREIRA"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1118350378'">
                                    Sd Rcr PEREIRA (Sd Ap Port Norte) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd Rcr IGOR"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1118167277'">
                                    Sd Rcr IGOR (Sd Ap Port Norte) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd Rcr CASTRO"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1118352374'">
                                    Sd Rcr CASTRO (Sd Garagem) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd Rcr DOUGLAS"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1118354776'">
                                    Sd Rcr DOUGLAS (Sd Garagem) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd Rcr ALEXANDRE"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1118346475'">
                                    Sd Rcr ALEXANDRE (Sd Garagem) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd Rcr RAFAEL"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1118349271'">
                                    Sd Rcr RAFAEL (Sd Garagem) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd Rcr DE OLIVEIRA"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1118352176'">
                                    Sd Rcr DE OLIVEIRA (Sd Garagem) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd Rcr LUAN"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1118348679'">
                                    Sd Rcr LUAN (Sd Garagem) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd Rcr GABRIEL"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1118353570'">
                                    Sd Rcr GABRIEL (Sd Gd) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd Rcr COSTA"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1118351574'">
                                    Sd Rcr COSTA (Sd Gd) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd Rcr KAIO"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1118356474'">
                                    Sd Rcr KAIO (Sd Gd) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd Rcr JONAS"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1118351772'">
                                    Sd Rcr JONAS (Sd Gd) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd Rcr MONTEIRO"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1118353174'">
                                    Sd Rcr MONTEIRO (Sd Gd) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd Rcr COIMBRA"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1118356276'">
                                    Sd Rcr COIMBRA (Sd Gd) <br>
                                </li>
                                                            </ul>
                                            </td>
                </tr>
                            <tr class="">
                    <td width="150" class="text-center">
                        <b class="display-4">03/06</b> <br>
                        Sex (escala preta) <br>
                                            </td>
                    <td class="text-center p-2">
                                                    <ul class="list-group">
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de 1º Sgt MARCEL"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/0131551442'">
                                    1º Sgt MARCEL (Sgt Adj) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de 3º Sgt MENDES"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1111948079'">
                                    3º Sgt MENDES (Sgt Mon) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de 3º Sgt DEIVERSON"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1113766677'">
                                    3º Sgt DEIVERSON (Sgt P1) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd Rcr MAXSUEL"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1118347176'">
                                    Sd Rcr MAXSUEL (Sd Ap Port Sul) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd Rcr WALEF"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1118167178'">
                                    Sd Rcr WALEF (Sd Ap Port Sul) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd Rcr RIBEIRO"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1118351970'">
                                    Sd Rcr RIBEIRO (Sd Ap Port Norte) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd Rcr CARLOS"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1118346772'">
                                    Sd Rcr CARLOS (Sd Ap Port Norte) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd Rcr LUCAS"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1118350774'">
                                    Sd Rcr LUCAS (Sd Garagem) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd Rcr DIEGO"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1118355179'">
                                    Sd Rcr DIEGO (Sd Garagem) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd Rcr DAMACENO"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1118350972'">
                                    Sd Rcr DAMACENO (Sd Garagem) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd Rcr ALISSON"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1118346673'">
                                    Sd Rcr ALISSON (Sd Garagem) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd Rcr LUAN"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1118354073'">
                                    Sd Rcr LUAN (Sd Garagem) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd Rcr MAURICIO"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1118347572'">
                                    Sd Rcr MAURICIO (Sd Garagem) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd Rcr ALBUQUERQUE"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1118347275'">
                                    Sd Rcr ALBUQUERQUE (Sd Gd) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd Rcr HORACIO"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1118348075'">
                                    Sd Rcr HORACIO (Sd Gd) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd Rcr CHARLISSON"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1118356078'">
                                    Sd Rcr CHARLISSON (Sd Gd) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd Rcr DIAS"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1118350170'">
                                    Sd Rcr DIAS (Sd Gd) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd Rcr QUEIROZ"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1118348273'">
                                    Sd Rcr QUEIROZ (Sd Gd) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd Rcr KAYLLAN"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1118351376'">
                                    Sd Rcr KAYLLAN (Sd Gd) <br>
                                </li>
                                                            </ul>
                                            </td>
                </tr>
                            <tr class="">
                    <td width="150" class="text-center">
                        <b class="display-4">04/06</b> <br>
                        Sáb (escala vermelha) <br>
                                            </td>
                    <td class="text-center p-2">
                                                    <ul class="list-group">
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de 2º Ten FURTUOZO"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/0112867544'">
                                    2º Ten FURTUOZO (OD) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de 1º Sgt ÍTALO"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/0400156352'">
                                    1º Sgt ÍTALO (Sgt Adj) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de 2º Sgt THEES"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/0119025658'">
                                    2º Sgt THEES (Sgt Mon) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de 3º Sgt LEIDIANA FREITAS"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1110927975'">
                                    3º Sgt LEIDIANA FREITAS (Sgt Mon) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de 3º Sgt EDNUBIA"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1110924873'">
                                    3º Sgt EDNUBIA (Sgt Mon) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de 3º Sgt GIRLANE"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1107664979'">
                                    3º Sgt GIRLANE (Sgt Mon) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de 3º Sgt RAQUEL OLIVEIRA"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1114108879'">
                                    3º Sgt RAQUEL OLIVEIRA (Sgt Port Norte) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de 3º Sgt ELIAS JOSE"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1115671479'">
                                    3º Sgt ELIAS JOSE (Sgt Garagem) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de 3º Sgt MARIO"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1112070279'">
                                    3º Sgt MARIO (Sgt Delta) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de 3º Sgt MASCARENHAS"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1104669872'">
                                    3º Sgt MASCARENHAS (Sgt Port Sul) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de 3º Sgt JEANE CARVALHO"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1117827574'">
                                    3º Sgt JEANE CARVALHO (Sgt P1) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Cb ANDERSON"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1108802271'">
                                    Cb ANDERSON (Cb Blq) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Cb CARVALHO"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1108797976'">
                                    Cb CARVALHO (Cb Blq) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Cb DO CARMO"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1110579776'">
                                    Cb DO CARMO (Cb Blq) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Cb KEVIN"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1112048770'">
                                    Cb KEVIN (Cb Blq) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Cb ARTUR SILVA"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1109392579'">
                                    Cb ARTUR SILVA (Cb P4) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Cb WYLIMA"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1112506876'">
                                    Cb WYLIMA (Cb Garagem) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Cb WESLEY"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1104930274'">
                                    Cb WESLEY (Cb Port Norte) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Cb FISCHER"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1114651373'">
                                    Cb FISCHER (Cb Port Sul) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Cb FERNANDES"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1112093677'">
                                    Cb FERNANDES (Cb Delta) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Cb MANDU"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1114651472'">
                                    Cb MANDU (Cb P1) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Cb PAIVA"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1114627878'">
                                    Cb PAIVA (Cb P2) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd Rcr MICHEL"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1118347077'">
                                    Sd Rcr MICHEL (Sd Garagem) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd Rcr ROBERTH"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1118348778'">
                                    Sd Rcr ROBERTH (Sd Garagem) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd Rcr JANSEN"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1118353778'">
                                    Sd Rcr JANSEN (Sd Garagem) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd Rcr ANUNCIACAO"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1118350576'">
                                    Sd Rcr ANUNCIACAO (Sd Garagem) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd Rcr DA SILVA"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1118354974'">
                                    Sd Rcr DA SILVA (Sd Garagem) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd Rcr MARTINS"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1118349479'">
                                    Sd Rcr MARTINS (Sd Garagem) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd Rcr SAMUEL"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1118348570'">
                                    Sd Rcr SAMUEL (Sd Gd) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd Rcr LUIZ EDUARDO"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1118349974'">
                                    Sd Rcr LUIZ EDUARDO (Sd Gd) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd Rcr ADRIANO"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1118356672'">
                                    Sd Rcr ADRIANO (Sd Gd) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd Rcr EDUARDO"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1118354578'">
                                    Sd Rcr EDUARDO (Sd Gd) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd Rcr TORRES"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1118353976'">
                                    Sd Rcr TORRES (Sd Gd) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd Rcr VINICIUS"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1118347978'">
                                    Sd Rcr VINICIUS (Sd Gd) <br>
                                </li>
                                                            </ul>
                                            </td>
                </tr>
                            <tr class="">
                    <td width="150" class="text-center">
                        <b class="display-4">05/06</b> <br>
                        Dom (escala vermelha) <br>
                                            </td>
                    <td class="text-center p-2">
                                                    <ul class="list-group">
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de 3º Sgt MENDES"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1111948079'">
                                    3º Sgt MENDES (Sgt Mon) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de 3º Sgt DEIVERSON"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1113766677'">
                                    3º Sgt DEIVERSON (Sgt P2) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Cb CHRIS MARCOS"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1110597877'">
                                    Cb CHRIS MARCOS (Cb Blq) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Cb HENRIQUE"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1111055776'">
                                    Cb HENRIQUE (Cb Blq) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Cb CLEYTON"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1112083371'">
                                    Cb CLEYTON (Cb Garagem) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Cb MENDES"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1116652775'">
                                    Cb MENDES (Cb Port Norte) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Cb ITALO"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1112048671'">
                                    Cb ITALO (Cb P1) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Cb RODRIGUES"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1105061475'">
                                    Cb RODRIGUES (Cb P2) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd Rcr DE OLIVEIRA"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1118352176'">
                                    Sd Rcr DE OLIVEIRA (Sd Garagem) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd Rcr LUAN"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1118348679'">
                                    Sd Rcr LUAN (Sd Garagem) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd Rcr GABRIEL"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1118353570'">
                                    Sd Rcr GABRIEL (Sd Garagem) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd Rcr COSTA"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1118351574'">
                                    Sd Rcr COSTA (Sd Garagem) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd Rcr KAIO"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1118356474'">
                                    Sd Rcr KAIO (Sd Garagem) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd Rcr JONAS"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1118351772'">
                                    Sd Rcr JONAS (Sd Garagem) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd Rcr MONTEIRO"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1118353174'">
                                    Sd Rcr MONTEIRO (Sd Gd) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd Rcr COIMBRA"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1118356276'">
                                    Sd Rcr COIMBRA (Sd Gd) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd Rcr DE MELO"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1118355674'">
                                    Sd Rcr DE MELO (Sd Gd) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd Rcr SERGIO"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1118348471'">
                                    Sd Rcr SERGIO (Sd Gd) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd Rcr SALVIANO"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1118355872'">
                                    Sd Rcr SALVIANO (Sd Gd) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd Rcr BRUNO"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1118346871'">
                                    Sd Rcr BRUNO (Sd Gd) <br>
                                </li>
                                                            </ul>
                                            </td>
                </tr>
                            <tr class="">
                    <td width="150" class="text-center">
                        <b class="display-4">06/06</b> <br>
                        Seg (escala preta) <br>
                                            </td>
                    <td class="text-center p-2">
                                                    <ul class="list-group">
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de 1º Sgt DOMINGOS"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/0131841942'">
                                    1º Sgt DOMINGOS (Sgt Adj) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd ELIAN"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1114651076'">
                                    Sd ELIAN (Sd Ap Port Sul) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd Rcr GUILHERME"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1118353372'">
                                    Sd Rcr GUILHERME (Sd Ap Port Norte) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd Rcr PATRICK"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1118346970'">
                                    Sd Rcr PATRICK (Sd Ap Port Norte) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd Rcr WELTON"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1118347473'">
                                    Sd Rcr WELTON (Sd Garagem) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd Rcr ISAIAS"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1118352978'">
                                    Sd Rcr ISAIAS (Sd Garagem) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd Rcr DEIVID"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1118355476'">
                                    Sd Rcr DEIVID (Sd Garagem) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd Rcr SOARES"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1118354271'">
                                    Sd Rcr SOARES (Sd Garagem) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd Rcr IURY"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1118352770'">
                                    Sd Rcr IURY (Sd Garagem) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd Rcr SILVESTRE"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1118348372'">
                                    Sd Rcr SILVESTRE (Sd Garagem) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd Rcr TEIXEIRA"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1118356771'">
                                    Sd Rcr TEIXEIRA (Sd Gd) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd Rcr SANTANA"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1118348174'">
                                    Sd Rcr SANTANA (Sd Gd) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd Rcr LUCAS COSTA"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1118349776'">
                                    Sd Rcr LUCAS COSTA (Sd Gd) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd Rcr PEDRO HENRIQUE"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1118349073'">
                                    Sd Rcr PEDRO HENRIQUE (Sd Gd) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd Rcr DERICK"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1118352572'">
                                    Sd Rcr DERICK (Sd Gd) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd Rcr DOURADO"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1118348976'">
                                    Sd Rcr DOURADO (Sd Gd) <br>
                                </li>
                                                            </ul>
                                            </td>
                </tr>
                            <tr class="">
                    <td width="150" class="text-center">
                        <b class="display-4">07/06</b> <br>
                        Ter (escala preta) <br>
                                            </td>
                    <td class="text-center p-2">
                                                    <ul class="list-group">
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd FILHO"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1105027278'">
                                    Sd FILHO (Sd Ap Port Sul) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd ALVES"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1113767873'">
                                    Sd ALVES (Sd Ap Port Sul) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd CAMELO"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1114651175'">
                                    Sd CAMELO (Sd Ap Port Norte) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd HOSANA"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1116387679'">
                                    Sd HOSANA (Sd Garagem) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd EWANGLE"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1116387877'">
                                    Sd EWANGLE (Sd Garagem) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd BARBOSA"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1116385970'">
                                    Sd BARBOSA (Sd Garagem) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd LOURENCO"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1116384973'">
                                    Sd LOURENCO (Sd Garagem) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd ISAAC NILTON"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1116384775'">
                                    Sd ISAAC NILTON (Sd Garagem) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd BRITO"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1117384378'">
                                    Sd BRITO (Sd Garagem) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd MARQUES"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1117384071'">
                                    Sd MARQUES (Sd Gd) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd DANTAS"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1117384477'">
                                    Sd DANTAS (Sd Gd) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd PACHECO"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1117383677'">
                                    Sd PACHECO (Sd Gd) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd MSANTOS"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1117383479'">
                                    Sd MSANTOS (Sd Gd) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd Rcr GARCEZ"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1117385573'">
                                    Sd Rcr GARCEZ (Sd Gd) <br>
                                </li>
                                                            </ul>
                                            </td>
                </tr>
                            <tr class="">
                    <td width="150" class="text-center">
                        <b class="display-4">08/06</b> <br>
                        Qua (escala preta) <br>
                                            </td>
                    <td class="text-center p-2">
                                                    <ul class="list-group">
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd AMORIM"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1117359479'">
                                    Sd AMORIM (Sd Ap Port Sul) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd FELIPE"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1117385672'">
                                    Sd FELIPE (Sd Ap Port Norte) <br>
                                </li>
                                                                <li
                                    data-toggle="tooltip"
                                    title="Clique para ver o perfil de Sd OTAVIO"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href='http://servico.badmqgex.eb.mil.br/perfil/1117386175'">
                                    Sd OTAVIO (Sd Ap Port Norte) <br>
                                </li>
                                                            </ul>
                                            </td>
                </tr>
                            <tr class="">
                    <td width="150" class="text-center">
                        <b class="display-4">09/06</b> <br>
                        Qui (escala preta) <br>
                                            </td>
                    <td class="text-center p-2">
                                                    NENHUM MILITAR DO SEU ÓRGÃO ESCALADO PARA ESTE DIA!
                                            </td>
                </tr>
                    </tbody>
        <tfoot>
            <tr>
                <th>Data</th>
                <th>Militares</th>
            </tr>
        </tfoot>
    </table>
</div>            </div>
        </div>
        <!-- Modal de solicitação de acesso -->
<div class="modal fade" id="mSolicitarAcesso" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body text-center mb-1">
                <form action="http://servico.badmqgex.eb.mil.br/checar-dados" id="fChecarDados" class="validate ajax" data-ajaxres="postFChecarDados" method="post" accept-charset="iso-8859-1">
                    <h5 class="mt-1 mb-2 text-justify">
                        <!-- Conteúdo preencido por função, não remover h5 -->
                    </h5>
                    <div class="md-form mx-auto">
                        <input type="text" data-rules="req|num|eql[10]" maxlength="10" id="fChecarDadosIdt" name="idt" class="form-control form-control-sm ml-0">
                        <label for="fChecarDadosIdt" class="ml-0">Identidade militar</label>
                    </div>
                    <div class="md-form mx-auto">
                        <input type="password" data-rules="req|num|eql[8]" id="fChecarDadosPwd" maxlength="8" name="pwd" class="form-control form-control-sm ml-0">
                        <label for="fChecarDadosPwd" class="ml-0">Senha do SiCaPEx</label>
                    </div>
                    <input type="hidden" name="action" value=""> <!-- Valor alterado por função, não remover action -->
                    <div class="text-center mt-4">
                        <input type="submit" class="btn btn-cyan mt-1" value="CHECAR DADOS">
                    </div>
                </form>            </div>
        </div>
    </div>
</div>
<!-- /Modal de solicitação de acesso -->

<!-- Modal de troca de militares na escala -->
<div class="modal fade" id="mTrocaEscala" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-center">
                <h4 class="heading"></h4>
            </div>
            <div class="modal-body text-center mb-1">
                <form action="http://servico.badmqgex.eb.mil.br/escala/solicitar-troca" id="fTrocaEscala" class="ajax" data-ajaxres="postFTrocaEscala" method="post" accept-charset="iso-8859-1">
                    Informe o mililitar que fará a troca com <b class="mil"></b><br><br>
                    <div class="selectom">
                        <select onchange="selectMil(this.value, event)" name="selectom" class="select form-control form-control-chosen"></select>
                    </div>
                    <input type="hidden" name="escala">
                    <input type="hidden" name="data">
                    <input type="hidden" name="idtmilsai">
                    <div class="selectmil">
                        <select name="idtmilentra" class="select form-control d-none my-2"></select>
                    </div>
                    <div class="text-center mt-4">
                        <input type="submit" class="btn btn-cyan mt-1" value="ENVIAR SOLICITAÇÃO DE TROCA">
                    </div>
                </form>            </div>
        </div>
    </div>
</div>
<!-- /Modal de troca de militares na escala -->

<!-- Modal de substituição de militares -->
<div class="modal fade" id="mSubstituicao" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-center">
                <h4 class="heading">Sobreaviso <span id="dataSvSobreaviso"></span></h4>
                <div id="substituicaoFilter"></div>
            </div>
            <div class="modal-body text-center mb-1">
                                    <div class="alert alert-info" style="text-align:justify;word-break:normal;">
                        Primeiramente, o sistema busca o próximo mais folgado que <b>não</b> esteja
                        impedido para o dia requisitado, em igualdade de folga, o mais moderno será precedido. O
                        primeiro militar da lista a seguir será o mais folgado e/ou mais moderno, seguindo
                        os critérios.
                    </div><br>
                    <div id="milSubstituto"></div>
                                                </div>
        </div>
    </div>
</div>
<!-- /Modal de substituição de militares -->

<!-- Frame Modal Bottom -->
<div class="modal fade bottom" id="mDefaultSuccess" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-frame modal-bottom" role="document">
        <div class="modal-content">
            <div class="modal-body bg-success">
                <div class="row d-flex justify-content-center align-items-center">
                    <p class="p-5 text-justify text-white"></p>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Frame Modal Bottom -->

<!-- Modal de confirmação -->
<div class="modal fade" id="mConfirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-notify modal-danger" role="document">
        <div class="modal-content text-center">
            <div class="modal-header d-flex justify-content-center">
                <p class="heading">Deseja realmente continuar?</p>
            </div>
            <div class="modal-body">
                <i class="fa fa-times fa-4x animated rotateIn"></i>
                <p class="text-justify animated fadeInUp"></p>
            </div>
            <div class="modal-footer flex-center">
            </div>
        </div>
    </div>
</div>
<!-- /Modal de confirmação -->

<!-- Modal de configurações de listas -->
<div class="modal fade" id="mConfig" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body text-center mb-1">
                <form action="http://servico.badmqgex.eb.mil.br/add-option" id="fAtlzConf" method="post" accept-charset="iso-8859-1">
                    <div class="md-form">
                        <select class="select form-control form-control-chosen" name="option" id="fAtlzConfOption">
                            <option value="">-- Selecione uma opção a ser inserida --</option>
                        </select>
                    </div>
                    <div class="text-center mt-4">
                        <input type="submit" class="btn btn-success mt-1 btn-sm" value="INSERIR">
                    </div>
                </form>            </div>
        </div>
    </div>
</div>
<!-- /Modal de configurações de listas -->

<div class="modal fade" id="mImg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content text-center">
            <div class="modal-header justify-content-center bg-primary text-white text-uppercase">
                <p class="heading mt-1" style="margin-bottom: 0px"></p>
            </div>
            <div class="modal-body mb-0 p-0">
                <div class="embed-responsive embed-responsive-21by9">
                    <img class="embed-responsive-item">
                </div>
            </div>
            <div class="modal-footer flex-center text-danger">
                <b>Esta imagem mostra onde os dados necessários se encontram na ficha individual do(a) militar</b>
            </div>
        </div>
    </div>
</div>

<!-- Modal de aviso na tela de impedimentos -->
<div class="modal fade" id="mImpedimentos" tabindex="-1" role="dialog"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-white primary-color">
                <h5 class="modal-title" id="exampleModalLabel">Impedimentos por grupos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="text-align:justify;word-break:normal;">
                <b>Como funciona o recurso de impedimentos por grupos?</b><br>
                <br>
                <ul>
                    <li>
                        <b>Para adicionar um grupo (vários impedimentos que compartilham as mesmas informações)</b>, basta informar mais
                        de um militar. Se posteriormente houver a necessidade de alterar informações do impedimento
                        e refletí-las para os outros militares do grupo, basta editar o impedimento de qualquer um dos militares de mesmo grupo e antes de confimar, certifique-se
                        de que a opção <b>"Aplicar mudanças ao grupo"</b> esteja <b>marcada</b>.
                    </li>
                    <li>
                        <b>Para remover um militar de um grupo existente alterando o motivo</b>, basta editar seu impedimento e antes de confirmar, certifique-se de que a opção
                        <b>"Aplicar mudanças ao grupo"</b> esteja <b>desmarcada</b>. A ação de <b>excluir</b> o impedimento também remove o militar do grupo.
                    </li>
                    <li>
                        <b>Para adicionar militar(es) a um grupo de impedimento existente</b>, clique em <b>"Informar novo"</b> ou <b>"Informar impedimento"</b>, informe os militares e clique no botão
                        <b>"Adicionar a um grupo existente"</b>, uma lista com os grupos já criados será mostrada, basta selecionar o grupo e confirmar o impedimento.
                    </li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
            </div>
        </div>
    </div>
</div>
<!-- /Modal de aviso na tela de impedimentos -->        <footer class="container-fluid p-0 no-print">
    
    <div class="text-white text-shadow text-center rgba-black-strong" id="footerBlocks" style="padding: 3.7rem!important;border-top: 5px solid #ff98004d">
        <div class="row text-justify">
            <div class="footer-block col-md-4 col-sm-12 offset-md-2 p-5 wow fadeInUp mt-2 mr-md-2">
                <b>B ADM QGEX</b><hr class="rgba-orange-light">
                Base Administrativa do Quartel-General do Exército<br>
                Avenida do Exército, s/n, Setor de Garagens e Bloco J do QGEx, Primeiro Piso, SMU Brasília DF, 70.630-901
            </div>
            <div class="footer-block col-md-4 col-sm-12 p-5 wow fadeInUp mt-2">
                <b>DIVISÃO DE TECNOLOGIA DA INFORMAÇÃO</b><hr class="rgba-orange-light">
                Turma de Desenvolvimento de Sistemas<br>
                Caso haja alguma dúvida ou sugestão em relação ao sistema, entre em contato enviando um e-mail para
                <a href="mailto:dti.sistemas@badmqgex.eb.mil.br" class="text-warning"><b>sistemas@badmqgex.eb.mil.br</b></a>
            </div>
        </div>
        <div class="row animatedParent text-justify">
            <div class="footer-block col-md-4 col-sm-12 offset-md-2 p-5 wow fadeInUp mt-2 mr-md-2">
                <b>LINKS ÚTEIS</b><hr class="rgba-orange-light">
                <div class="text-left">
                    <a class="text-white" target="_blank" href="http://intranet.badmqgex.eb.mil.br">
                        &#8680; Nossa página na EB Net
                    </a><br>
                    <a class="text-white" target="_blank" href="http://www.badmqgex.eb.mil.br">
                        &#8680; Nossa página na internet
                    </a><br>
                    <a class="text-white" target="_blank" href="http://si.badmqgex.eb.mil.br">
                        &#8680; Sistema integrado (Arranchamento, Auditórios e Classificados)
                    </a><br>
                    <a class="text-white" target="_blank" href="http://credenciamento.badmqgex.eb.mil.br">
                        &#8680; Credenciamento
                    </a><br>
                    <a class="text-white" target="_blank" href="http://transporte.badmqgex.eb.mil.br/">
                        &#8680; Pedidos de viaturas
                    </a><br>
                    <a class="text-white" target="_blank" href="http://coletivo.badmqgex.eb.mil.br/">
                        &#8680; Transporte coletivo
                    </a>
                </div>
            </div>
            <div class="footer-block col-md-4 col-sm-12 p-5 wow fadeInUp mt-2">
                <b>SISTEMA DE SERVIÇO</b><hr class="rgba-orange-light">
                &copy; 2020 - 2022 <b>B Adm QGEx</b><br>
                Todos os direitos reservados<br>
                Desenvolvido por <a href="mailto:macxionallan@gmail.com" class="text-white"><b>3º Sgt Macxion</b></a>
            </div>
        </div>
            </div>
</footer>        <script>var baseUrl = 'http://servico.badmqgex.eb.mil.br/';</script>
<!--<script src="vendor/components/jquery/jquery.min.js"></script>-->
<script src="http://servico.badmqgex.eb.mil.br/include/md/js/jquery-3.3.1.min.js"></script>
<script src="http://servico.badmqgex.eb.mil.br/vendor/components/jqueryui/jquery-ui.min.js"></script>
<script src="http://servico.badmqgex.eb.mil.br/include/js/jquery.mask.js"></script>
<script src="http://servico.badmqgex.eb.mil.br/include/js/masks.js"></script>
<script src="http://servico.badmqgex.eb.mil.br/include/js/jquery.cookie.js"></script>
<script src="http://servico.badmqgex.eb.mil.br/include/md/js/popper.min.js"></script>
<script src="http://servico.badmqgex.eb.mil.br/include/md/js/bootstrap.min.js"></script>
<script src="http://servico.badmqgex.eb.mil.br/include/md/js/mdb.min.js"></script>


<!--script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>-->
<script src="http://servico.badmqgex.eb.mil.br/include/js/waypoints.js"></script>
<script src="http://servico.badmqgex.eb.mil.br/include/js/jquery.counterup.js"></script>
<script src="http://servico.badmqgex.eb.mil.br/include/js/validation.js"></script>
<script src="http://servico.badmqgex.eb.mil.br/include/datatables/datatables.min.js"></script>
<script src="http://servico.badmqgex.eb.mil.br/include/chosen/chosen.jquery.min.js"></script>
<script src="http://servico.badmqgex.eb.mil.br/include/tinymce/jquery.tinymce.min.js"></script>
<script src="http://servico.badmqgex.eb.mil.br/include/tinymce/tinymce.min.js"></script>
<script src="http://servico.badmqgex.eb.mil.br/include/js/scripts.js"></script>
<script src="http://servico.badmqgex.eb.mil.br/include/js/posts.js"></script>
<script src="http://servico.badmqgex.eb.mil.br/include/js/gets.js"></script>
    </body>
</html>
