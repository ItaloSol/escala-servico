<?php
// INCLUDES
    include_once('../dados/cabo.php');
    include_once('../dados/sgt.php');
    include_once('../dados/soldado_ep.php');
    include_once('../dados/soldado_ev.php');
    include_once('../dados/soldado_motora.php');
    include_once('../dados/postos.php');
    include_once('../dados/escala.php');

//      //      //      //

// VARIAVEIS DE CONTROLE DE LOOP
    $Postos_Existentes;
    $Id_Escalados = 0;
    $Militares = 0;
    $Percorrer_Postos = 0;
    $Data_Selecionada = date('Y-m-d');
    
//      //      //      //
$a = 0;
while($a < 3){ 
    echo ' <table class="table table-bordered table-condensed dtable" data-dtable-title="Escala "Serviço a Grafica" resumida">';
    echo '   <thead>';
    echo '    <tr>';
    echo '      <th style="text-align: center;">Data</th>';
    echo '    </tr>';
    echo '  </thead>';
    $Percorrer_Feriado = 0;
    $Date_Feriado = false;
    $Escala = false;

    while($Percorrer_Feriado < $Quantidade_Feriado){ 
        if($Data_Selecionada == $Feriado_Data[$Percorrer_Feriado]){
            echo '<tr> <td style="color: white;text-align: center;" bgcolor="Red" width="150" class="text-center">
            <b class="display-4">'. $exibedata .'</b> <br>
            '. $dia_semanaPt  .'<br>' . ' Feriado '. $Feriado_Motivo[$Percorrer_Feriado] .'
            </td></tr> ';
            $Date_Feriado = true;
        }
    $Percorrer_Feriado++;
    }
    if($Date_Feriado == false){ 
        if($dia_semanaEn == 'Sat' or $dia_semanaEn == 'Sun'){
            echo '<tr> <td style="color: white;" bgcolor="Red" width="150" class="text-center">
            <b class="display-4">'. $exibedata .'</b> <br>
            '. $dia_semanaPt .'<br>
            </td></tr> ';
        }else {
            echo '<tr><td width="150" class="text-center">
            <b class="display-4">'. $exibedata .'</b> <br>
            '. $dia_semanaPt .'<br>
            </td></tr>';
        }
    }
    if($Data_Selecionada <= $Desc_Escala_Data[0]){
        
        $Escala = true;
    }
    if($Escala == true) {
        echo '      <th bgcolor="yellow" style="text-align: center; color: green;">Serviço Definido</th>';
    }
    if($Escala == False) {
        echo '      <th bgcolor="green" style="text-align: center; color: red;">Previsão de Serviço</th>';
    }
    echo "</table>";
    echo ' <table class="table table-bordered table-condensed dtable" data-dtable-title="Escala "Serviço a Grafica" resumida">';
    echo '   <thead>';
    echo '    <tr>';
    echo '      <th  style="text-align: center;">Postos</th>';
    echo '       <th  style="text-align: center;">Militares</th>';
    echo '    </tr>';
    echo '  </thead>';

    if($Escala == false){ 
        while($Percorrer_Postos < $Postos_Existentes){
        //      //      //      //      //      //      //      //      //      //      //      //      //      //      //      //      //      //

        // SARGENTO DE DIA
                if($Posto_Tipo_Sv[$Percorrer_Postos] == 'SGT_DIA'){
                        $Militares = 0;
                        $Sargento_Mantem = 0; 
                    if($Date_Feriado == true and $Posto_Servico[$Percorrer_Postos] != 'PRETA' and $dia_semanaEn != 'Fri'){ 
                            while($Militares < $Posto_Qtd_Mil[$Percorrer_Postos]){
                                echo '<tr><td style="color: white;" bgcolor="black">'.$Posto_Nome[$Percorrer_Postos].'</td>
                                <td bgcolor="black">
                                <ul class="list-group">
                                <li
                                data-toggle="tooltip"
                                class="list-group-item hoverable cpointer"
                                onclick="location.href="#"">
                                '. $Sgt_Graduacao[$Sargento_Mantem]
                                ." "
                                .$Sgt_Nome[$Sargento_Mantem] ."<a onclick='acaoinfored()' class='abririnfored' href='#'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-info-square-fill' viewBox='0 0 16 16'>
                                <path d='M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm8.93 4.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM8 5.5a1 1 0 1 0 0-2 1 1 0 0 0 0 2z'/>
                                </svg>
                                </a> ".' <br>
                                </li>
                                </ul>
                                </td></tr>'; 
                                $Tipo_Sgt = 'PRETA';
                                $Escalados_Id[$Id_Escalados] = $Sgt_Id[$Sargento_Mantem];
                                $POSTO[$Id_Escalados] = $Posto_Nome[$Percorrer_Postos];
                                $Militares++;
                                $Id_Escalados++;
                            }
                    }
                    if($Date_Feriado == true and $Posto_Servico[$Percorrer_Postos] != 'PRETA'){ 
                        while($Militares < $Posto_Qtd_Mil[$Percorrer_Postos]){
                            echo '<tr><td style="color: white;" bgcolor="red">'.$Posto_Nome[$Percorrer_Postos].'</td>
                            <td bgcolor="red">
                            <ul class="list-group">
                            <li
                            data-toggle="tooltip"
                            class="list-group-item hoverable cpointer"
                            onclick="location.href="#"">
                            '. $Red_Sgt_Graduacao[$Sargento_Mantem]
                            ." "
                            .$Red_Sgt_Nome[$Sargento_Mantem] ."<a onclick='acaoinfored()' class='abririnfored' href='#'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-info-square-fill' viewBox='0 0 16 16'>
                            <path d='M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm8.93 4.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM8 5.5a1 1 0 1 0 0-2 1 1 0 0 0 0 2z'/>
                            </svg>
                            </a> ".' <br>
                            </li>
                            </ul>
                            </td></tr>'; 
                            $Tipo_Sgt = 'VERMELHA';
                            $Escalados_Id[$Id_Escalados] = $Sgt_Id[$Sargento_Mantem];
                            $POSTO[$Id_Escalados] = $Posto_Nome[$Percorrer_Postos];
                            $Militares++;
                            $Id_Escalados++;
                        }
                }
                    if($Date_Feriado == false){ 
                        if($Posto_Servico[$Percorrer_Postos] == 'SARGENTO'){
                            while($Militares < $Posto_Qtd_Mil[$Percorrer_Postos]){
                                if($dia_semanaEn == 'Sat' or $dia_semanaEn == 'Sun' ){
                                    echo '<tr><td style="color: white;" bgcolor="Red">'.$Posto_Nome[$Percorrer_Postos].'</td>
                                    <td bgcolor="Red">
                                    <ul class="list-group">
                                    <li
                                    data-toggle="tooltip"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href="#"">
                                    '. $Red_Sgt_Graduacao[$Sargento_Mantem]
                                    ." "
                                    .$Red_Sgt_Nome[$Sargento_Mantem] ."<a onclick='acaoinfored()' class='abririnfored' href='#'>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-info-square-fill' viewBox='0 0 16 16'>
                                    <path d='M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm8.93 4.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM8 5.5a1 1 0 1 0 0-2 1 1 0 0 0 0 2z'/>
                                    </svg>
                                    </a> ".' <br>
                                    </li>
                                    </ul>
                                    </td></tr>'; 
                                    $Tipo_Sgt = 'VERMELHA';
                                    $Escalados_Id[$Id_Escalados] = $Red_Sgt_Id[$Sargento_Mantem];
                                    $Militares++; 
                                    $POSTO[$Id_Escalados] = $Posto_Nome[$Percorrer_Postos];
                                    $Id_Escalados++;
                                    
                                }
                                elseif($dia_semanaEn == 'Fri' ){
                                    echo '<tr><td style="color: white;" bgcolor="Red">'.$Posto_Nome[$Percorrer_Postos].'</td>
                                    <td  bgcolor="Red">
                                    <ul class="list-group">
                                    <li
                                    data-toggle="tooltip"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href="#"">
                                    '. $Sgt_Graduacao[$Sargento_Mantem]
                                    ."  "
                                    .$Sgt_Nome[$Sargento_Mantem] ."<a onclick='acaoinfo()' class='abririnfo' href='#'>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-info-square-fill' viewBox='0 0 16 16'>
                                    <path d='M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm8.93 4.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM8 5.5a1 1 0 1 0 0-2 1 1 0 0 0 0 2z'/>
                                    </svg>
                                    </a>".' <br>
                                    </li>
                                    </ul>
                                    </td></tr>'; 
                                    $Tipo_Sgt = 'VERMELHA';
                                    $Escalados_Id[$Id_Escalados] = $Sgt_Id[$Sargento_Mantem];
                                    $Militares++; 
                                    $POSTO[$Id_Escalados] = $Posto_Nome[$Percorrer_Postos];
                                    $Id_Escalados++;
                                }
                                else{
                                    echo '<tr><td>'.$Posto_Nome[$Percorrer_Postos].'</td>
                                    <td>
                                    <ul class="list-group">
                                    <li
                                    data-toggle="tooltip"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href="#"">
                                    '. $Sgt_Graduacao[$Militares]
                                    ."  "
                                    .$Sgt_Nome[$Militares] ."<a onclick='acaoinfo()' class='abririnfo' href='#'>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-info-square-fill' viewBox='0 0 16 16'>
                                    <path d='M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm8.93 4.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM8 5.5a1 1 0 1 0 0-2 1 1 0 0 0 0 2z'/>
                                    </svg>
                                    </a> ".' <br>
                                    </li>
                                    </ul>
                                    </td></tr>'; 
                                    $Tipo_Sgt = 'PRETA';
                                    $Escalados_Id[$Id_Escalados] = $Sgt_Id[$Militares];
                                    $Militares++; 
                                    $POSTO[$Id_Escalados] = $Posto_Nome[$Percorrer_Postos];
                                    $Id_Escalados++;
                                }
                            }
                        }
                    }
                }
        //      //      //      //      //      //      //      //      //      //      //      //      //      //      //      //      //      //
        
        // CABO DE DIA
            if($Posto_Tipo_Sv[$Percorrer_Postos] == 'CB_DIA'){
                    $Militares = 0;  
                    if($Date_Feriado == true and $Posto_Servico[$Percorrer_Postos] != 'PRETA'){ 
                        while($Militares < $Posto_Qtd_Mil[$Percorrer_Postos]){
                            echo '<tr><td style="color: white;" bgcolor="Red">'.$Posto_Nome[$Percorrer_Postos].'</td>
                                <td bgcolor="Red">
                                <ul class="list-group">
                                <li
                                data-toggle="tooltip"
                                class="list-group-item hoverable cpointer"
                                onclick="location.href="#"">
                                '. $Red_Cabo_Graduacao[$Militares]
                                ." "
                                .$Red_Cabo_Nome[$Militares] ."<a onclick='acaoinfored()' class='abririnfored' href='#'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-info-square-fill' viewBox='0 0 16 16'>
                                <path d='M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm8.93 4.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM8 5.5a1 1 0 1 0 0-2 1 1 0 0 0 0 2z'/>
                                </svg>
                                </a> ".' <br>
                                </li>
                                </ul>
                                </td></tr>'; 
                                $Escalados_Id[$Id_Escalados] = $Red_Cabo_Id[$Militares];
                                $Militares++; 
                                $POSTO[$Id_Escalados] = $Posto_Nome[$Percorrer_Postos];
                                $Id_Escalados++;
                        }
                    }
                if($Date_Feriado == false){
                    if($Posto_Servico[$Percorrer_Postos] == 'AMBAS'){
                        while($Militares < $Posto_Qtd_Mil[$Percorrer_Postos]){
                            
                            if($dia_semanaEn == 'Sat' or $dia_semanaEn == 'Sun' ){
                                echo '<tr><td style="color: white;" bgcolor="Red">'.$Posto_Nome[$Percorrer_Postos].'</td>
                                <td bgcolor="Red">
                                <ul class="list-group">
                                <li
                                data-toggle="tooltip"
                                class="list-group-item hoverable cpointer"
                                onclick="location.href="#"">
                                '. $Red_Cabo_Graduacao[$Militares]
                                ." "
                                .$Red_Cabo_Nome[$Militares] ."<a onclick='acaoinfored()' class='abririnfored' href='#'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-info-square-fill' viewBox='0 0 16 16'>
                                <path d='M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm8.93 4.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM8 5.5a1 1 0 1 0 0-2 1 1 0 0 0 0 2z'/>
                                </svg>
                                </a> ".' <br>
                                </li>
                                </ul>
                                </td></tr>'; 
                                $Escalados_Id[$Id_Escalados] = $Red_Cabo_Id[$Militares];
                                $Militares++; 
                                $POSTO[$Id_Escalados] = $Posto_Nome[$Percorrer_Postos];
                                $Id_Escalados++;
                            }
                            else{
                                echo '<tr><td>'.$Posto_Nome[$Percorrer_Postos].'</td>
                                <td>
                                <ul class="list-group">
                                <li
                                data-toggle="tooltip"
                                class="list-group-item hoverable cpointer"
                                onclick="location.href="#"">
                                '.$Cabo_Graduacao[$Militares]
                                ."  "
                                .$Cabo_Nome[$Militares] ."<a onclick='acaoinfo()' class='abririnfo' href='#'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-info-square-fill' viewBox='0 0 16 16'>
                                <path d='M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm8.93 4.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM8 5.5a1 1 0 1 0 0-2 1 1 0 0 0 0 2z'/>
                                </svg>
                                </a> ".' <br>
                                </li>
                                </ul>
                                </td></tr>'; 
                                $Escalados_Id[$Id_Escalados] = $Cabo_Id[$Militares];
                                $Militares++; 
                                $POSTO[$Id_Escalados] = $Posto_Nome[$Percorrer_Postos];
                                $Id_Escalados++;
                            }
                        }
                    }
                    if($Posto_Servico[$Percorrer_Postos] == 'VERMELHA'){
                        if($dia_semanaEn == 'Sat' or $dia_semanaEn == 'Sun' ){
                            while($Militares < $Posto_Qtd_Mil[$Percorrer_Postos]){
                                echo '<tr><td style="color: white;" bgcolor="Red">'.$Posto_Nome[$Percorrer_Postos].'</td>
                                <td bgcolor="Red">
                                <ul class="list-group">
                                <li
                                data-toggle="tooltip"
                                class="list-group-item hoverable cpointer"
                                onclick="location.href="#"">
                                '. $Red_Cabo_Graduacao[$Militares]
                                ." "
                                .$RedCabo_Nome[$Militares] ."<a onclick='acaoinfored()' class='abririnfored' href='#'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-info-square-fill' viewBox='0 0 16 16'>
                                <path d='M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm8.93 4.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM8 5.5a1 1 0 1 0 0-2 1 1 0 0 0 0 2z'/>
                                </svg>
                                </a> ".' <br>
                                </li>
                                </ul>
                                </td></tr>'; 
                                $Escalados_Id[$Id_Escalados] = $Red_Cabo_Id[$Militares];
                                $Militares++; 
                                $POSTO[$Id_Escalados] = $Posto_Nome[$Percorrer_Postos];
                                $Id_Escalados++;
                            }
                        }
                    }
                    if($Posto_Servico[$Percorrer_Postos] == 'PRETA'){
                        
                        if($dia_semanaEn != 'Sat' and $dia_semanaEn != 'Sun' ){
                            while($Militares < $Posto_Qtd_Mil[$Percorrer_Postos]){
                                echo '<tr><td>'.$Posto_Nome[$Percorrer_Postos].'</td>
                                <td>
                                <ul class="list-group">
                                <li
                                data-toggle="tooltip"
                                class="list-group-item hoverable cpointer"
                                onclick="location.href="#"">
                                '.$Cabo_Graduacao[$Militares]
                                ."  "
                                .$Cabo_Nome[$Militares] ."<a onclick='acaoinfo()' class='abririnfo' href='#'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-info-square-fill' viewBox='0 0 16 16'>
                                <path d='M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm8.93 4.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM8 5.5a1 1 0 1 0 0-2 1 1 0 0 0 0 2z'/>
                                </svg>
                                </a> ".' <br>
                                </li>
                                </ul>
                                </td></tr>'; 
                                $Escalados_Id[$Id_Escalados] = $Cabo_Id[$Militares];
                                $Militares++; 
                                $POSTO[$Id_Escalados] = $Posto_Nome[$Percorrer_Postos];
                                $Id_Escalados++;
                            }
                        }
                    }
                }
            }
        //      //      //      //      //      //      //      //      //      //      //      //      //      //      //      //      //      //

        // MOTORISTA
                if($Posto_Tipo_Sv[$Percorrer_Postos] == 'MOTORISTA'){
                    $Militares = 0;   
                    if($Date_Feriado == true and $Posto_Servico[$Percorrer_Postos] != 'PRETA'){ 
                            while($Militares < $Posto_Qtd_Mil[$Percorrer_Postos]){
                                echo '<tr><td style="color: white;" bgcolor="Red">'.$Posto_Nome[$Percorrer_Postos].'<br>(Sobre aviso)</td>
                                <td bgcolor="Red">
                                <ul class="list-group">
                                <li
                                data-toggle="tooltip"
                                class="list-group-item hoverable cpointer"
                                onclick="location.href="#"">
                                '. $Red_Soldado_Motora_Graduacao[$Militares]
                                ." "
                                .$Red_Soldado_Motora_Nome[$Militares] ."<a onclick='acaoinfored()' class='abririnfored' href='#'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-info-square-fill' viewBox='0 0 16 16'>
                                <path d='M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm8.93 4.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM8 5.5a1 1 0 1 0 0-2 1 1 0 0 0 0 2z'/>
                                </svg>
                                </a> ".' <br>
                                </li>
                                </ul>
                                </td></tr>'; 
                                $Escalados_Id[$Id_Escalados] = $Red_Soldado_Motora_Id[$Militares];
                                $Militares++; 
                                $POSTO[$Id_Escalados] = $Posto_Nome[$Percorrer_Postos];
                                $Id_Escalados++;
                            }
                    }
                    if($Date_Feriado == false){ 
                        if($Posto_Servico[$Percorrer_Postos] == 'AMBAS'){
                            while($Militares < $Posto_Qtd_Mil[$Percorrer_Postos]){
                                if($dia_semanaEn == 'Sat' or $dia_semanaEn == 'Sun' ){
                                    echo '<tr><td style="color: white;" bgcolor="Red">'.$Posto_Nome[$Percorrer_Postos].'</td>
                                    <td bgcolor="Red">
                                    <ul class="list-group">
                                    <li
                                    data-toggle="tooltip"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href="#"">
                                    '. $Red_Soldado_Motora_Graduacao[$Militares]
                                    ." "
                                    .$Red_Soldado_Motora_Nome[$Militares] ."<a onclick='acaoinfored()' class='abririnfored' href='#'>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-info-square-fill' viewBox='0 0 16 16'>
                                    <path d='M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm8.93 4.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM8 5.5a1 1 0 1 0 0-2 1 1 0 0 0 0 2z'/>
                                    </svg>
                                    </a> ".' <br>
                                    </li>
                                    </ul>
                                    </td></tr>'; 
                                    $Escalados_Id[$Id_Escalados] = $Red_Soldado_Motora_Id[$Militares];
                                    $Militares++; 
                                    $POSTO[$Id_Escalados] = $Posto_Nome[$Percorrer_Postos];
                                    $Id_Escalados++;
                                }
                                else{
                                    echo '<tr><td>'.$Posto_Nome[$Percorrer_Postos].'</td>
                                    <td>
                                    <ul class="list-group">
                                    <li
                                    data-toggle="tooltip"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href="#"">
                                    '.$Soldado_Motora_Graduacao[$Militares]
                                    ."  "
                                    .$Soldado_Motora_Nome[$Militares] ."<a onclick='acaoinfo()' class='abririnfo' href='#'>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-info-square-fill' viewBox='0 0 16 16'>
                                    <path d='M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm8.93 4.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM8 5.5a1 1 0 1 0 0-2 1 1 0 0 0 0 2z'/>
                                    </svg>
                                    </a> ".' <br>
                                    </li>
                                    </ul>
                                </td></tr>'; 
                                $Escalados_Id[$Id_Escalados] = $Soldado_Motora_Id[$Militares];
                                $Militares++; 
                                $POSTO[$Id_Escalados] = $Posto_Nome[$Percorrer_Postos];
                                $Id_Escalados++;
                                }
                            }
                        }
                        if($Posto_Servico[$Percorrer_Postos] == 'MOTORISTA'){
                            while($Militares < $Posto_Qtd_Mil[$Percorrer_Postos]){
                                if($dia_semanaEn == 'Sat' or $dia_semanaEn == 'Sun' ){
                                    echo '<tr><td style="color: white;" bgcolor="Red">'.$Posto_Nome[$Percorrer_Postos].'<br>(Sobre aviso)</td>
                                    <td bgcolor="Red">
                                    <ul class="list-group">
                                    <li
                                    data-toggle="tooltip"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href="#"">
                                    '. $Red_Soldado_Motora_Graduacao[$Militares]
                                    ." "
                                    .$Red_Soldado_Motora_Nome[$Militares] ."<a onclick='acaoinfored()' class='abririnfored' href='#'>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-info-square-fill' viewBox='0 0 16 16'>
                                    <path d='M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm8.93 4.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM8 5.5a1 1 0 1 0 0-2 1 1 0 0 0 0 2z'/>
                                    </svg>
                                    </a> ".' <br>
                                    </li>
                                    </ul>
                                    </td></tr>'; 
                                    $Escalados_Id[$Id_Escalados] = $Soldado_Motora_Id[$Militares];
                                    $Militares++; 
                                    $POSTO[$Id_Escalados] = $Posto_Nome[$Percorrer_Postos];
                                    $Id_Escalados++;
                                }
                                else{
                                    echo '<tr><td>'.$Posto_Nome[$Percorrer_Postos].'</td>
                                    <td>
                                    <ul class="list-group">
                                    <li
                                    data-toggle="tooltip"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href="#"">
                                    '.$Soldado_Motora_Graduacao[$Militares]
                                    ."  "
                                    .$Soldado_Motora_Nome[$Militares] ."<a onclick='acaoinfo()' class='abririnfo' href='#'>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-info-square-fill' viewBox='0 0 16 16'>
                                    <path d='M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm8.93 4.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM8 5.5a1 1 0 1 0 0-2 1 1 0 0 0 0 2z'/>
                                    </svg>
                                    </a> ".' <br>
                                    </li>
                                    </ul>
                                </td></tr>'; 
                                $Escalados_Id[$Id_Escalados] = $Soldado_Motora_Id[$Militares];
                                $Militares++; 
                                $POSTO[$Id_Escalados] = $Posto_Nome[$Percorrer_Postos];
                                $Id_Escalados++;
                                }
                            }
                        }
                        if($Posto_Servico[$Percorrer_Postos] == 'VERMELHA'){
                            if($dia_semanaEn == 'Sat' or $dia_semanaEn == 'Sun' ){
                                while($Militares < $Posto_Qtd_Mil[$Percorrer_Postos]){
                                    echo '<tr><td style="color: white;" bgcolor="Red">'.$Posto_Nome[$Percorrer_Postos].'</td>
                                    <td bgcolor="Red">
                                    <ul class="list-group">
                                    <li
                                    data-toggle="tooltip"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href="#"">
                                    '. $Red_Soldado_Motora_Graduacao[$Militares]
                                    ." "
                                    .$Red_Soldado_Motora_Nome[$Militares] ."<a onclick='acaoinfored()' class='abririnfored' href='#'>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-info-square-fill' viewBox='0 0 16 16'>
                                    <path d='M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm8.93 4.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM8 5.5a1 1 0 1 0 0-2 1 1 0 0 0 0 2z'/>
                                    </svg>
                                    </a> ".' <br>
                                    </li>
                                    </ul>
                                    </td></tr>'; 
                                    $Escalados_Id[$Id_Escalados] = $Red_Soldado_Motora_Id[$Militares];
                                    $Militares++; 
                                    $POSTO[$Id_Escalados] = $Posto_Nome[$Percorrer_Postos];
                                    $Id_Escalados++;
                                }
                            }
                        }
                        if($Posto_Servico[$Percorrer_Postos] == 'PRETA'){
                            if($dia_semanaEn != 'Sat' and $dia_semanaEn != 'Sun' ){
                                while($Militares < $Posto_Qtd_Mil[$Percorrer_Postos]){
                                echo '<tr><td>'.$Posto_Nome[$Percorrer_Postos].'</td>
                                    <td>
                                    <ul class="list-group">
                                    <li
                                    data-toggle="tooltip"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href="#"">
                                    '.$Soldado_Motora_Graduacao[$Militares]
                                    ."  "
                                    .$Soldado_Motora_Nome[$Militares] ."<a onclick='acaoinfo()' class='abririnfo' href='#'>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-info-square-fill' viewBox='0 0 16 16'>
                                    <path d='M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm8.93 4.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM8 5.5a1 1 0 1 0 0-2 1 1 0 0 0 0 2z'/>
                                    </svg>
                                    </a> ".' <br>
                                    </li>
                                    </ul>
                                </td></tr>'; 
                                    $Escalados_Id[$Id_Escalados] = $Soldado_Motora_Id[$Militares];
                                    $Militares++; 
                                    $POSTO[$Id_Escalados] = $Posto_Nome[$Percorrer_Postos];
                                    $Id_Escalados++;
                                }
                            }
                        }
                    }
                }
            
        //      //      //      //      //      //      //      //      //      //      //      //      //      //      //      //      //      //

        // PLANTAO
                if($Posto_Tipo_Sv[$Percorrer_Postos] == 'PLANTAO'){
                    $Militares = 0;   
                    if($Date_Feriado == true and $Posto_Servico[$Percorrer_Postos] != 'PRETA' ){ 
                            while($Militares < $Posto_Qtd_Mil[$Percorrer_Postos]){
                                echo '<tr><td style="color: white;" bgcolor="Red">'.$Posto_Nome[$Percorrer_Postos].'</td>
                                    <td bgcolor="Red">
                                    <ul class="list-group">
                                    <li
                                    data-toggle="tooltip"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href="#"">
                                    '. $Red_Soldado_Ep_Graduacao[$Militares]
                                    ." "
                                    .$Red_Soldado_Ep_Nome[$Militares] ."<a onclick='acaoinfored()' class='abririnfored' href='#'>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-info-square-fill' viewBox='0 0 16 16'>
                                    <path d='M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm8.93 4.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM8 5.5a1 1 0 1 0 0-2 1 1 0 0 0 0 2z'/>
                                    </svg>
                                    </a> ".' <br>
                                    </li>
                                    </ul>
                                    </td></tr>'; 
                                    $Escalados_Id[$Id_Escalados] = $Red_Soldado_Ep_Id[$Militares];
                                    $Militares++; 
                                    $POSTO[$Id_Escalados] = $Posto_Nome[$Percorrer_Postos];
                                    $Id_Escalados++;
                            }
                    }
                    if($Date_Feriado == false){ 
                        if($Posto_Servico[$Percorrer_Postos] == 'AMBAS'){
                            while($Militares < $Posto_Qtd_Mil[$Percorrer_Postos]){
                                if($dia_semanaEn == 'Sat' or $dia_semanaEn == 'Sun' ){
                                    echo '<tr><td style="color: white;" bgcolor="Red">'.$Posto_Nome[$Percorrer_Postos].'</td>
                                    <td bgcolor="Red">
                                    <ul class="list-group">
                                    <li
                                    data-toggle="tooltip"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href="#"">
                                    '. $Red_Soldado_Ep_Graduacao[$Militares]
                                    ." "
                                    .$Red_Soldado_Ep_Nome[$Militares] ."<a onclick='acaoinfored()' class='abririnfored' href='#'>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-info-square-fill' viewBox='0 0 16 16'>
                                    <path d='M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm8.93 4.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM8 5.5a1 1 0 1 0 0-2 1 1 0 0 0 0 2z'/>
                                    </svg>
                                    </a> ".' <br>
                                    </li>
                                    </ul>
                                    </td></tr>'; 
                                    $Escalados_Id[$Id_Escalados] = $Red_Soldado_Ep_Id[$Militares];
                                    $Militares++; 
                                    $POSTO[$Id_Escalados] = $Posto_Nome[$Percorrer_Postos];
                                    $Id_Escalados++;
                                }
                                else{
                                
                                    echo '<tr><td>'.$Posto_Nome[$Percorrer_Postos].'</td>
                                    <td>
                                    <ul class="list-group">
                                    <li
                                    data-toggle="tooltip"
                                    class="list-group-item hoverable cpointer"
                                    onclick="location.href="#"">
                                    '.$Soldado_Ep_Graduacao[$Militares]
                                    ."  "
                                    .$Soldado_Ep_Nome[$Militares] ."<a onclick='acaoinfo()' class='abririnfo' href='#'>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-info-square-fill' viewBox='0 0 16 16'>
                                    <path d='M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm8.93 4.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM8 5.5a1 1 0 1 0 0-2 1 1 0 0 0 0 2z'/>
                                    </svg>
                                    </a> ".' <br>
                                    </li>
                                    </ul>
                                    </td></tr>'; 
                                    $Escalados_Id[$Id_Escalados] = $Soldado_Ep_Id[$Militares];
                                    $Militares++; 
                                    $POSTO[$Id_Escalados] = $Posto_Nome[$Percorrer_Postos];
                                    $Id_Escalados++;
                                }
                            }
                        }
                        
                        if($Posto_Servico[$Percorrer_Postos] == 'VERMELHA'){
                            if($dia_semanaEn == 'Sat' or $dia_semanaEn == 'Sun' ){
                                while($Militares < $Posto_Qtd_Mil[$Percorrer_Postos]){
                                        echo '<tr><td style="color: white;" bgcolor="Red">'.$Posto_Nome[$Percorrer_Postos].'</td>
                                        <td bgcolor="Red">
                                        <ul class="list-group">
                                        <li
                                        data-toggle="tooltip"
                                        class="list-group-item hoverable cpointer"
                                        onclick="location.href="#"">
                                        '. $Red_Soldado_Ep_Graduacao[$Militares]
                                        ." "
                                        .$Red_Soldado_Ep_Nome[$Militares] ."<a onclick='acaoinfored()' class='abririnfored' href='#'>
                                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-info-square-fill' viewBox='0 0 16 16'>
                                        <path d='M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm8.93 4.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM8 5.5a1 1 0 1 0 0-2 1 1 0 0 0 0 2z'/>
                                        </svg>
                                        </a> ".' <br>
                                        </li>
                                        </ul>
                                        </td></tr>'; 
                                        $Escalados_Id[$Id_Escalados] = $Red_Soldado_Ep_Id[$Militares];
                                        $Militares++; 
                                        $POSTO[$Id_Escalados] = $Posto_Nome[$Percorrer_Postos];
                                        $Id_Escalados++;
                                }
                            }
                        }
                        if($Date_Feriado != true){ 
                            if($Posto_Servico[$Percorrer_Postos] == 'PRETA'){
                                if($dia_semanaEn != 'Sat' and $dia_semanaEn != 'Sun' ){
                                    while($Militares < $Posto_Qtd_Mil[$Percorrer_Postos]){
                                        echo '<tr><td>'.$Posto_Nome[$Percorrer_Postos].'</td>
                                        <td>
                                        <ul class="list-group">
                                        <li
                                        data-toggle="tooltip"
                                        class="list-group-item hoverable cpointer"
                                        onclick="location.href="#"">
                                        '.$Soldado_Ep_Graduacao[$Militares]
                                        ."  "
                                        .$Soldado_Ep_Nome[$Militares] ."<a onclick='acaoinfo()' class='abririnfo' href='#'>
                                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-info-square-fill' viewBox='0 0 16 16'>
                                        <path d='M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm8.93 4.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM8 5.5a1 1 0 1 0 0-2 1 1 0 0 0 0 2z'/>
                                        </svg>
                                        </a> ".' <br>
                                        </li>
                                        </ul>
                                        </td></tr>'; 
                                        $Escalados_Id[$Id_Escalados] = $Soldado_Ep_Id[$Militares];
                                        
                                        $Militares++; 
                                        $POSTO[$Id_Escalados] = $Posto_Nome[$Percorrer_Postos];
                                        $Id_Escalados++;
                                    }
                                }
                            }
                        }     
                    }
                }
        //      //      //      //      //      //      //      //      //      //      //      //      //      //      //      //      //      //

                $Percorrer_Postos++;
        }
    }
}
    $t = 0;
    $a = 0;
    
$Verificar_Data_Desc_Escala = 0;
$Verifica_Quantidade_Por_Escala = $Quantidade_Por_Escala;
$a = 0;
$s = 0;

if($Escala == true) {
    
    if($Desc_Escala_Data[$Verificar_Data_Desc_Escala] == $Data_Selecionada ){
       
        
        while($Verificar_Data_Desc_Escala < $Verifica_Quantidade_Por_Escala){
            if($Desc_Escala_Tipo_Sv[$Verificar_Data_Desc_Escala] == 'SGT_DIA'){
                $Tipo_Sgt = $Desc_Escala_Tipo[$Verificar_Data_Desc_Escala];
            }
            if($Desc_Escala_Tipo[$Verificar_Data_Desc_Escala] == 'PRETA'){
                if($Desc_Subistituido_Quest[$Verificar_Data_Desc_Escala] == 1){
                   
                    echo '<tr><td>'.$Desc_Escala_Posto[$Verificar_Data_Desc_Escala].'</td>
                    <td>
                    <ul class="list-group">
                    <li
                    data-toggle="tooltip"
                    class="list-group-item hoverable cpointer"
                    onclick="location.href="#"">
                    '.$Desc_Escala_Militar_Graduacao[$Verificar_Data_Desc_Escala]
                    ."  "
                    .$Desc_Escala_Militar_Nome[$Verificar_Data_Desc_Escala] ." "."<a onclick='acaoinfo()' class='abririnfo' href='#'>
                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-info-square-fill' viewBox='0 0 16 16'>
                    <path d='M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm8.93 4.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM8 5.5a1 1 0 1 0 0-2 1 1 0 0 0 0 2z'/>
                    </svg>
                    </a> ".' <br>
                    </li>
                    </ul>
                    </td></tr>'; 
                    }else{ 
                    echo '<tr><td>'.$Desc_Escala_Posto[$Verificar_Data_Desc_Escala].'</td>
                    <td>
                    <ul class="list-group">
                    <li
                    data-toggle="tooltip"
                    class="list-group-item hoverable cpointer"
                    onclick="location.href="#"">
                    '.$Desc_Escala_Militar_Graduacao[$Verificar_Data_Desc_Escala]
                    ."  "
                    .$Desc_Escala_Militar_Nome[$Verificar_Data_Desc_Escala] ."<a onclick='acaoinfo()' class='abririnfo' href='#'>
                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-info-square-fill' viewBox='0 0 16 16'>
                    <path d='M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm8.93 4.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM8 5.5a1 1 0 1 0 0-2 1 1 0 0 0 0 2z'/>
                    </svg>
                    </a> ".' <br>
                    </li>
                    </ul>
                    </td></tr>'; 
                }
                $Posto_Escalados[$a] = $Desc_Escala_Id_Posto[$Verificar_Data_Desc_Escala];
                $Id_Escalada[$a] = $Desc_Escala_Id[$Verificar_Data_Desc_Escala];
                $Definidos_Id[$a] = $Desc_Escala_Militar_Id[$Verificar_Data_Desc_Escala];
                $POSTO_Definido[$a] = $Desc_Escala_Posto[$Verificar_Data_Desc_Escala];
                $a++;
            }
            if($Desc_Escala_Tipo[$Verificar_Data_Desc_Escala] == 'VERMELHA'){
                if($Desc_Subistituido_Quest[$Verificar_Data_Desc_Escala] == 1){
                    echo '<tr><td style="color: white;" bgcolor="Red">'.$Desc_Escala_Posto[$Verificar_Data_Desc_Escala].'</td>
                    <td bgcolor="Red">
                    <ul class="list-group">
                    <li
                    data-toggle="tooltip"
                    class="list-group-item hoverable cpointer"
                    onclick="location.href="#"">
                    '. $Desc_Escala_Militar_Graduacao[$Verificar_Data_Desc_Escala]
                    ." "
                    .$Desc_Escala_Militar_Nome[$Verificar_Data_Desc_Escala] ." "."<a onclick='acaoinfored()' class='abririnfored' href='#'>
                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-info-square-fill' viewBox='0 0 16 16'>
                    <path d='M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm8.93 4.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM8 5.5a1 1 0 1 0 0-2 1 1 0 0 0 0 2z'/>
                    </svg>
                    </a> ".' <br>
                    </li>
                    </ul>
                    </td></tr>'; 
                    }else{ 
                    echo '<tr><td style="color: white;" bgcolor="Red">'.$Desc_Escala_Posto[$Verificar_Data_Desc_Escala].'</td>
                    <td bgcolor="Red">
                    <ul class="list-group">
                    <li
                    data-toggle="tooltip"
                    class="list-group-item hoverable cpointer"
                    onclick="location.href="#"">
                    '. $Desc_Escala_Militar_Graduacao[$Verificar_Data_Desc_Escala]
                    ." "
                    .$Desc_Escala_Militar_Nome[$Verificar_Data_Desc_Escala] ."<a onclick='acaoinfored()' class='abririnfored' href='#'>
                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-info-square-fill' viewBox='0 0 16 16'>
                    <path d='M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm8.93 4.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM8 5.5a1 1 0 1 0 0-2 1 1 0 0 0 0 2z'/>
                    </svg>
                    </a> ".' <br>
                    </li>
                    </ul>
                    </td></tr>'; 
                }
                $Posto_Escalados[$a] = $Desc_Escala_Id_Posto[$Verificar_Data_Desc_Escala];
                $Id_Escalada[$a] = $Desc_Escala_Id[$Verificar_Data_Desc_Escala];
                $Definidos_Id[$a] = $Desc_Escala_Militar_Id[$Verificar_Data_Desc_Escala];
                $POSTO_Definido[$a] = $Desc_Escala_Posto[$Verificar_Data_Desc_Escala];
                $a++;
            }
            $Verificar_Data_Desc_Escala++;
            
        }
    }else{
        
        while( $Desc_Escala_Data[$Verificar_Data_Desc_Escala] >= $Data_Selecionada ){
            if($Data_Selecionada == $Desc_Escala_Data[$Verificar_Data_Desc_Escala] ){
                if($Desc_Escala_Tipo_Sv[$Verificar_Data_Desc_Escala] == 'SGT_DIA'){
                    $Tipo_Sgt = $Desc_Escala_Tipo[$Verificar_Data_Desc_Escala];
                }
                if($Desc_Escala_Tipo[$Verificar_Data_Desc_Escala] == 'PRETA'){
                    if($Desc_Subistituido_Quest[$Verificar_Data_Desc_Escala] == 1){
                        echo '<tr><td>'.$Desc_Escala_Posto[$Verificar_Data_Desc_Escala].'</td>
                        <td>
                        <ul class="list-group">
                        <li
                        data-toggle="tooltip"
                        class="list-group-item hoverable cpointer"
                        onclick="location.href="#"">
                        '.$Desc_Escala_Militar_Graduacao[$Verificar_Data_Desc_Escala]
                        ."  "
                        .$Desc_Escala_Militar_Nome[$Verificar_Data_Desc_Escala] ." "."<a onclick='acaoinfo()' class='abririnfo' href='#'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-info-square-fill' viewBox='0 0 16 16'>
                        <path d='M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm8.93 4.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM8 5.5a1 1 0 1 0 0-2 1 1 0 0 0 0 2z'/>
                        </svg>
                        </a> ".' <br>
                        </li>
                        </ul>
                        </td></tr>'; 
                        
                    }else{ 
                        echo '<tr><td>'.$Desc_Escala_Posto[$Verificar_Data_Desc_Escala].'</td>
                        <td>
                        <ul class="list-group">
                        <li
                        data-toggle="tooltip"
                        class="list-group-item hoverable cpointer"
                        onclick="location.href="#"">
                        '.$Desc_Escala_Militar_Graduacao[$Verificar_Data_Desc_Escala]
                        ."  "
                        .$Desc_Escala_Militar_Nome[$Verificar_Data_Desc_Escala] ."<a onclick='acaoinfo()' class='abririnfo' href='#'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-info-square-fill' viewBox='0 0 16 16'>
                        <path d='M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm8.93 4.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM8 5.5a1 1 0 1 0 0-2 1 1 0 0 0 0 2z'/>
                        </svg>
                        </a> ".' <br>
                        </li>
                        </ul>
                        </td></tr>'; 
                    }
                        $Posto_Escalados[$a] = $Desc_Escala_Id_Posto[$Verificar_Data_Desc_Escala];
                        $Id_Escalada[$a] = $Desc_Escala_Id[$Verificar_Data_Desc_Escala];
                        $Definidos_Id[$a] = $Desc_Escala_Militar_Id[$Verificar_Data_Desc_Escala];
                        $POSTO_Definido[$a] = $Desc_Escala_Posto[$Verificar_Data_Desc_Escala];
                        $a++;
                    
                }
                if($Desc_Escala_Tipo[$Verificar_Data_Desc_Escala] == 'VERMELHA'){
                    if($Desc_Subistituido_Quest[$Verificar_Data_Desc_Escala] == 1){
                        echo '<tr><td style="color: white;" bgcolor="Red">'.$Desc_Escala_Posto[$Verificar_Data_Desc_Escala].'</td>
                        <td bgcolor="Red">
                        <ul class="list-group">
                        <li
                        data-toggle="tooltip"
                        class="list-group-item hoverable cpointer"
                        onclick="location.href="#"">
                        '. $Desc_Escala_Militar_Graduacao[$Verificar_Data_Desc_Escala]
                        ." "
                        .$Desc_Escala_Militar_Nome[$Verificar_Data_Desc_Escala] ." "."<a onclick='acaoinfored()' class='abririnfored' href='#'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-info-square-fill' viewBox='0 0 16 16'>
                        <path d='M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm8.93 4.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM8 5.5a1 1 0 1 0 0-2 1 1 0 0 0 0 2z'/>
                        </svg>
                        </a> ".' <br>
                        </li>
                        </ul>
                        </td></tr>'; 
                        }else{ 
                        echo '<tr><td style="color: white;" bgcolor="Red">'.$Desc_Escala_Posto[$Verificar_Data_Desc_Escala].'</td>
                        <td bgcolor="Red">
                        <ul class="list-group">
                        <li
                        data-toggle="tooltip"
                        class="list-group-item hoverable cpointer"
                        onclick="location.href="#"">
                        '. $Desc_Escala_Militar_Graduacao[$Verificar_Data_Desc_Escala]
                        ." "
                        .$Desc_Escala_Militar_Nome[$Verificar_Data_Desc_Escala] ."<a onclick='acaoinfored()' class='abririnfored' href='#'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-info-square-fill' viewBox='0 0 16 16'>
                        <path d='M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm8.93 4.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM8 5.5a1 1 0 1 0 0-2 1 1 0 0 0 0 2z'/>
                        </svg>
                        </a> ".' <br>
                        </li>
                        </ul>
                        </td></tr>'; 
                    }
                    $Posto_Escalados[$a] = $Desc_Escala_Id_Posto[$Verificar_Data_Desc_Escala];
                    $Id_Escalada[$a] = $Desc_Escala_Id[$Verificar_Data_Desc_Escala];
                    $Definidos_Id[$a] = $Desc_Escala_Militar_Id[$Verificar_Data_Desc_Escala];
                    $POSTO_Definido[$a] = $Desc_Escala_Posto[$Verificar_Data_Desc_Escala];
                    $a++;
                }
            }
        $Verificar_Data_Desc_Escala++;
        } 
    }  
}

echo '  </table>';


?>

 <!-- MODALS -->
 

