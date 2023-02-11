<?php
// INCLUDES
// include_once('../dados/cabo.php');
// include_once('../dados/sgt.php');
// include_once('../dados/soldado_ep.php');
// include_once('../dados/soldados.php');
// include_once('../dados/missao.php');
// include_once('../dados/soldado_ev.php');
// include_once('../dados/soldado_motora.php');
include_once('../dados/escala.php');
include_once('../dados/externa.php');

//      //      //      //

// VARIAVEIS DE CONTROLE DE LOOP
$Postos_Existentes;
$Id_Escalados = 0;
$Militares = 0;
$Percorrer_Postos = 0;
$Militares_Cb = 0;
$Militares_Ev = 0;
$Militares_Miss = 0;
//      //      //      //
?>
<style>
     td {
        color: white;
    }
    ul {
        color: black;
    }
</style>
<?php
echo '  <table class="table table-bordered table-condensed dtable" data-dtable-title="Escala "Serviço " resumida">';
echo '   <thead>';
echo '    <tr>';
echo '      <th style="text-align: center;">';
 include_once('calendario.php');
 echo '</th>';
echo '    </tr>';
echo '  </thead>';
$Percorrer_Feriado = 0;
$Date_Feriado = false;
$Escala = false;
$Percorrer_Externo = 0;
while ($Percorrer_Feriado < $Quantidade_Feriado) {
    if ($Data_Selecionada == $Feriado_Data[$Percorrer_Feriado]) {
        echo '<tr> <td style="color: white;text-align: center;" bgcolor="Red" width="150" class="text-center">
         <b class="display-4">' . $exibedata . '</b> <br>
         ' . $dia_semanaPt  . '<br>' . ' Feriado ' . $Feriado_Motivo[$Percorrer_Feriado] . '
         </td></tr> ';
        $Date_Feriado = true;
    }
    $Percorrer_Feriado++;
}
if ($Date_Feriado == false) {
    if ($dia_semanaEn == 'Sat' or $dia_semanaEn == 'Sun') {
        echo '<tr> <td style="color: white;" bgcolor="Red" width="150" class="text-center">
         <b class="display-4">' . $exibedata . '</b> <br>
         ' . $dia_semanaPt . '<br>
         </td></tr> ';
    } else {
        echo '<tr><td width="150" class="text-center">
         <b class="display-4">' . $exibedata . '</b> <br>
         ' . $dia_semanaPt . '<br>
         </td></tr>';
    }
}
if(isset($escala_nao_existe)){
   
}else{
    if ($Data_Selecionada <= $Desc_Escala_Data[0]) {

        $Escala = true;
    }
}

if ($Escala == true) {
    echo '      <th bgcolor="yellow" style="text-align: center; color: green; font-size: 22px;">Serviço Definido</th>';
}
if ($Escala == False) {
    echo '      <th bgcolor="green" style="text-align: center; color: yellow; font-size: 22px;"">Previsão de Serviço</th>';
}
echo "</table>";
echo ' <table class="table table-bordered table-condensed dtable" data-dtable-title="Escala "Serviço " resumida">';
echo '   <thead>';
echo '    <tr>';
echo '      <th  style="color: white; font-size: 22px; text-align: center;">Postos</th>';
echo '       <th  style=" color: white; font-size: 22px; text-align: center;">Militares</th>';
echo '    </tr>';
echo '  </thead>';
include_once('../dados/previstos.php');
$repetida = 1;
$mostra = 0;
$Postos = 1;
$Id_Escalados = 0;
if ($EscalaExterna == true) {
    while ($QtdServicoExterno > $Percorrer_Externo) {
        echo '<tr><td style="color: black;" bgcolor="yellow">' . $Externa_Posto[$Percorrer_Externo] . '</td>
                <td style="color: black;" bgcolor="yellow">
                <ul class="list-group">
                <li
                data-toggle="tooltip"
                class="list-group-item hoverable cpointer"
                onclick="location.href="#"">
                ' . $Externa_Graduacao[$Percorrer_Externo]
            . "  "
            . $Externa_Nome[$Percorrer_Externo] . " " . ' <br>
                </li>
                </ul>
                </td></tr>';
        $Percorrer_Externo++;
    }
}
if(!isset($Total_Previstos)){
    $Total_Previstos = 0;
}
if ($Escala == false) {
    if($Total_Previstos == 0){}else { 
    while ($Qtd_Postos > $Postos) {
        while($Total_Previstos > $mostra){ 
        if ($Postos_Qtd[$Postos] > $repetida) {
            while ($repetida <= $Postos_Qtd[$Postos]) {
                echo '<tr>';
                if($Postos_Servico[$Postos] == 'VERMELHA'){
                   echo '<td bgcolor="red" >';
                }else{
                    echo '<td style="color: white;">';
                }
                
                echo $Postos_Nome[$Postos] ; 
                if($Postos_Servico[$Postos] == 'VERMELHA'){
                    echo '<td bgcolor="red" >';
                 }else{
                     echo '<td>';
                 }
                echo ' <ul class="list-group"> <li data-toggle="tooltip" class="list-group-item hoverable cpointer" onclick="location.href="#"">
                                     ' . $Previsto_Nome_Graduacao[$mostra] . " ";
                $query_anotacao = $conexao->prepare("SELECT  * FROM anotacoes  WHERE sts = 1 AND cod_militar = '$Previsto_Para_Id[$mostra]'");
                $query_anotacao->execute();
                if ($anotacoes = $query_anotacao->fetch(PDO::FETCH_ASSOC)) {
                    $Anotacao = $anotacoes['id_anotacoes'];
                }
              
                echo $Previsto_Para_Nome[$mostra];
                if (isset($Anotacao)) {
                    echo '⚠️';
                }
                if($Postos_Servico[$Postos] == 'VERMELHA'){
                    echo "<a onclick='acaoinfored()' class='abririnfored' href='#'>
                    <img src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAlFJREFUSEuFlo1VGzEMx3+ahHSCJBPACGGCsgHJJBwTFCZoukE7QY4NkknUJ1t3ls6XR94DLrZO1v9DMoJ9BNDyy5/Lal73pfbH4+N6TBGeY7ZvkubQWISgc41tvaa799a08SLwqLADdg52RBmBM/AngxPKYX6KNHYyRQIHFd5Q2UTqIpue+AqcBM5T0hI/HbDOtQygrx51AwbgL5SqDfcO5Qk4Ag8eZzGnLCJUBJm0AWVKfvLkmUiH4VTYIW+e4h2V4xJxpPAA/PYq9nPFnYMqjMD1TtCLE/Ps2njMbMeS5YrwgBpUhmrflL2Ru/CGwFELErmC/ojbs1uAXwg3E7ZVl0yWDljpBBPcNJlRBJvyAfxEOKFF5KX7ojkW206XcESLHp/AS6WxyTcKulVhj8rYZev8mev3bXPXRWBU2LcDauxd+MFp6ge3wvrGmHvMWjvaVJ338vKd8fSdBvZmKiJqMApsKzRvqM6ekoqI7eOhNk4uwJc3oyOoHFSRazcmkQPbAX5y14S4iCzwqb3IeJNhVqs+7ia4I6imWfsUmwo8ax2E0UXly1Wrj/tGcyOEKREOKKs+MuQGuqmbk8iNgwmFHbZXwcZy+kRzhueJe4sNo6JHYPkGkFcfWMbpe691GiFt2FFi7Xvrrq7dKwdxXBuvNpf++SUzjevHMn+EjaPskncaNGGLioeKpoiWr8NUos2uUnURdTFlXeTOLcmCpov9GM9b3/myXim3mHDOOnU3Y+BrOZ3zxbLSV9O7K3Mp1NgECQfEm679x3A/0YJep1T4D5W1CDJHUmUMAAAAAElFTkSuQmCC'/> </a> <br> </li> </ul> </td></tr>";
                }
                if($Postos_Servico[$Postos] == 'PRETA'){
                    echo "<a onclick='acaoinfo()' class='abririnfo' href='#'>
                    <img src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAlFJREFUSEuFlo1VGzEMx3+ahHSCJBPACGGCsgHJJBwTFCZoukE7QY4NkknUJ1t3ls6XR94DLrZO1v9DMoJ9BNDyy5/Lal73pfbH4+N6TBGeY7ZvkubQWISgc41tvaa799a08SLwqLADdg52RBmBM/AngxPKYX6KNHYyRQIHFd5Q2UTqIpue+AqcBM5T0hI/HbDOtQygrx51AwbgL5SqDfcO5Qk4Ag8eZzGnLCJUBJm0AWVKfvLkmUiH4VTYIW+e4h2V4xJxpPAA/PYq9nPFnYMqjMD1TtCLE/Ps2njMbMeS5YrwgBpUhmrflL2Ru/CGwFELErmC/ojbs1uAXwg3E7ZVl0yWDljpBBPcNJlRBJvyAfxEOKFF5KX7ojkW206XcESLHp/AS6WxyTcKulVhj8rYZev8mev3bXPXRWBU2LcDauxd+MFp6ge3wvrGmHvMWjvaVJ338vKd8fSdBvZmKiJqMApsKzRvqM6ekoqI7eOhNk4uwJc3oyOoHFSRazcmkQPbAX5y14S4iCzwqb3IeJNhVqs+7ia4I6imWfsUmwo8ax2E0UXly1Wrj/tGcyOEKREOKKs+MuQGuqmbk8iNgwmFHbZXwcZy+kRzhueJe4sNo6JHYPkGkFcfWMbpe691GiFt2FFi7Xvrrq7dKwdxXBuvNpf++SUzjevHMn+EjaPskncaNGGLioeKpoiWr8NUos2uUnURdTFlXeTOLcmCpov9GM9b3/myXim3mHDOOnU3Y+BrOZ3zxbLSV9O7K3Mp1NgECQfEm679x3A/0YJep1T4D5W1CDJHUmUMAAAAAElFTkSuQmCC'/></a> <br></li></ul></td></tr>";
                }
               
                $Id_Dos_Postos_Escalados[$Id_Escalados] = $Postos_Id[$Postos];
                $Escalados_Id[$Id_Escalados] = $Previsto_Para_Id[$mostra];
                $Posto_Folga_Escaldo[$Id_Escalados] = $Postos_Folga[$Postos];
                $POSTO[$Id_Escalados] = $Postos_Nome[$Postos];
                $Id_Escalados++;
                $repetida++;
                $mostra++;
                       
            }
            $repetida = 1;
        } else {
            echo '<tr>';
            if($Postos_Servico[$Postos] == 'VERMELHA'){
               echo '<td bgcolor="red" >';
            }else{
                echo '<td style="color: white;">';
            }
            
            echo $Postos_Nome[$Postos] ; 
            if($Postos_Servico[$Postos] == 'VERMELHA'){
                echo '<td bgcolor="red" >';
             }else{
                 echo '<td style="color: white;">';
             }
            echo ' <ul class="list-group"> <li data-toggle="tooltip" class="list-group-item hoverable cpointer" onclick="location.href="#"">
      ' . $Previsto_Nome_Graduacao[$mostra] . " ";
            $query_anotacao = $conexao->prepare("SELECT  * FROM anotacoes  WHERE sts = 1 AND cod_militar = '$Previsto_Para_Id[$mostra]'");
            $query_anotacao->execute();
            if ($anotacoes = $query_anotacao->fetch(PDO::FETCH_ASSOC)) {
                $Anotacao = $anotacoes['id_anotacoes'];
            }

            echo $Previsto_Para_Nome[$mostra];
            if (isset($Anotacao)) {
                echo '⚠️';
            }
            if($Postos_Servico[$Postos] == 'VERMELHA'){
                echo "<a onclick='acaoinfored()' class='abririnfored' href='#'>
                <img src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAlFJREFUSEuFlo1VGzEMx3+ahHSCJBPACGGCsgHJJBwTFCZoukE7QY4NkknUJ1t3ls6XR94DLrZO1v9DMoJ9BNDyy5/Lal73pfbH4+N6TBGeY7ZvkubQWISgc41tvaa799a08SLwqLADdg52RBmBM/AngxPKYX6KNHYyRQIHFd5Q2UTqIpue+AqcBM5T0hI/HbDOtQygrx51AwbgL5SqDfcO5Qk4Ag8eZzGnLCJUBJm0AWVKfvLkmUiH4VTYIW+e4h2V4xJxpPAA/PYq9nPFnYMqjMD1TtCLE/Ps2njMbMeS5YrwgBpUhmrflL2Ru/CGwFELErmC/ojbs1uAXwg3E7ZVl0yWDljpBBPcNJlRBJvyAfxEOKFF5KX7ojkW206XcESLHp/AS6WxyTcKulVhj8rYZev8mev3bXPXRWBU2LcDauxd+MFp6ge3wvrGmHvMWjvaVJ338vKd8fSdBvZmKiJqMApsKzRvqM6ekoqI7eOhNk4uwJc3oyOoHFSRazcmkQPbAX5y14S4iCzwqb3IeJNhVqs+7ia4I6imWfsUmwo8ax2E0UXly1Wrj/tGcyOEKREOKKs+MuQGuqmbk8iNgwmFHbZXwcZy+kRzhueJe4sNo6JHYPkGkFcfWMbpe691GiFt2FFi7Xvrrq7dKwdxXBuvNpf++SUzjevHMn+EjaPskncaNGGLioeKpoiWr8NUos2uUnURdTFlXeTOLcmCpov9GM9b3/myXim3mHDOOnU3Y+BrOZ3zxbLSV9O7K3Mp1NgECQfEm679x3A/0YJep1T4D5W1CDJHUmUMAAAAAElFTkSuQmCC'/> </a> <br> </li> </ul> </td></tr>";
            }
            if($Postos_Servico[$Postos] == 'PRETA'){
                echo "<a onclick='acaoinfo()' class='abririnfo' href='#'>
                <img src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAlFJREFUSEuFlo1VGzEMx3+ahHSCJBPACGGCsgHJJBwTFCZoukE7QY4NkknUJ1t3ls6XR94DLrZO1v9DMoJ9BNDyy5/Lal73pfbH4+N6TBGeY7ZvkubQWISgc41tvaa799a08SLwqLADdg52RBmBM/AngxPKYX6KNHYyRQIHFd5Q2UTqIpue+AqcBM5T0hI/HbDOtQygrx51AwbgL5SqDfcO5Qk4Ag8eZzGnLCJUBJm0AWVKfvLkmUiH4VTYIW+e4h2V4xJxpPAA/PYq9nPFnYMqjMD1TtCLE/Ps2njMbMeS5YrwgBpUhmrflL2Ru/CGwFELErmC/ojbs1uAXwg3E7ZVl0yWDljpBBPcNJlRBJvyAfxEOKFF5KX7ojkW206XcESLHp/AS6WxyTcKulVhj8rYZev8mev3bXPXRWBU2LcDauxd+MFp6ge3wvrGmHvMWjvaVJ338vKd8fSdBvZmKiJqMApsKzRvqM6ekoqI7eOhNk4uwJc3oyOoHFSRazcmkQPbAX5y14S4iCzwqb3IeJNhVqs+7ia4I6imWfsUmwo8ax2E0UXly1Wrj/tGcyOEKREOKKs+MuQGuqmbk8iNgwmFHbZXwcZy+kRzhueJe4sNo6JHYPkGkFcfWMbpe691GiFt2FFi7Xvrrq7dKwdxXBuvNpf++SUzjevHMn+EjaPskncaNGGLioeKpoiWr8NUos2uUnURdTFlXeTOLcmCpov9GM9b3/myXim3mHDOOnU3Y+BrOZ3zxbLSV9O7K3Mp1NgECQfEm679x3A/0YJep1T4D5W1CDJHUmUMAAAAAElFTkSuQmCC'/> </a> <br> </li> </ul> </td></tr>";
            }
            
            $Id_Dos_Postos_Escalados[$Id_Escalados] = $Postos_Id[$Postos];
                        $Escalados_Id[$Id_Escalados] = $Previsto_Para_Id[$mostra];
                        $Posto_Folga_Escaldo[$Id_Escalados] = $Postos_Folga[$Postos];
                        $POSTO[$Id_Escalados] = $Postos_Nome[$Postos];
                        $Id_Escalados++;
            $repetida = 1;
            $mostra++;
            
            
        }
       
            $Postos++;
       
    }
    
    $Escalados_Dados = [ 
        'id_posto' => $Postos_Id,
        'folga_posto' => $Postos_Folga,
        'id_militar' => $Previsto_Para_Id,
        'nome_posto' => $Postos_Nome,
        'data_selecionada' => $Data_Selecionada

   ];
}
    }
}
// //      //      //      //      //      //      //      //      //      //      //      //      //      //      //      //      //      //

//             $Percorrer_Postos++;
//     }


//}
$t = 0;
$a = 0;

$Verificar_Data_Desc_Escala = 0;
$Verifica_Quantidade_Por_Escala = $Quantidade_Por_Escala;
$a = 0;
$s = 0;

    function definida($data){
    global $conexao;
        $query_escala = $conexao->prepare("SELECT * FROM escala a INNER JOIN militares m ON a.fk_militar = m.id INNER JOIN posto p ON a.fk_posto = p.id_posto INNER JOIN graduacoes g ON m.graduacao = g.id_graduacao WHERE p.prioridade != '-1' AND a.data = '$data'  ORDER BY a.data DESC , p.prioridade asc, antiguidade ASC");//SELECIONA A TABELA DE MILITARES
        $query_escala->execute(); //EXECUTA TABELA
        $a = 0;
        while($escala = $query_escala->fetch(PDO::FETCH_ASSOC)) {     
       
          $a++;
       
        }
      return  $a;
    }
$Quantidade_Por_Escala = definida($Data_Selecionada);
if ($Escala == true) {
    if ($Desc_Escala_Data[$Verificar_Data_Desc_Escala] == $Data_Selecionada) {
        while ($Verificar_Data_Desc_Escala < $Quantidade_Por_Escala) {
            if ($Desc_Escala_Tipo[$Verificar_Data_Desc_Escala] == 'PRETA') {
                if ($Desc_Subistituido_Quest[$Verificar_Data_Desc_Escala] == 1) {

                    echo '<tr><td>' . $Desc_Escala_Posto[$Verificar_Data_Desc_Escala] . '</td>
                    <td>
                    <ul class="list-group">
                    <li
                    data-toggle="tooltip"
                    class="list-group-item hoverable cpointer"
                    onclick="location.href="#"">
                    ';
                    if ($Desc_Subistituido_S2_Id[$Verificar_Data_Desc_Escala] != null) {
                        $query_registro = $conexao->prepare("SELECT * FROM militares m INNER JOIN graduacoes g ON m.graduacao = g.id_graduacao  WHERE id = $Desc_Subistituido_S2_Id[$Verificar_Data_Desc_Escala]");
                        $query_registro->execute(); //EXECUTA TABELA
                        $i = 0;
                        while ($reg = $query_registro->fetch(PDO::FETCH_ASSOC)) {
                            $entrou = $reg['nome_de_guerra'];
                            $gradentrou = $reg['nome_graduacao'];
                            $i++;
                        }
                        echo $gradentrou.' ' . $entrou;
                    } else {
                        echo $Desc_Escala_Militar_Nome[$Verificar_Data_Desc_Escala];
                    }
                    if ($Desc_Subistituido_S1_Id[$Verificar_Data_Desc_Escala] != null) {
                        $query_registro = $conexao->prepare("SELECT * FROM militares m INNER JOIN graduacoes g ON m.graduacao = g.id_graduacao  WHERE id = $Desc_Subistituido_S1_Id[$Verificar_Data_Desc_Escala]");
                        $query_registro->execute(); //EXECUTA TABELA
                        $i = 0;
                        while ($reg = $query_registro->fetch(PDO::FETCH_ASSOC)) {
                            $militar_saiu = $reg['nome_de_guerra'];
                            $gradsaiu = $reg['nome_graduacao'];
                            $i++;
                        }
                        echo ' <span style=" font-size: 10px;"> Saiu ' . $gradsaiu . ' ' . $militar_saiu . '</span></s>';
                    }
                    echo "<a onclick='acaoinfo()' class='abririnfo' href='#'>
                    <img src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAlFJREFUSEuFlo1VGzEMx3+ahHSCJBPACGGCsgHJJBwTFCZoukE7QY4NkknUJ1t3ls6XR94DLrZO1v9DMoJ9BNDyy5/Lal73pfbH4+N6TBGeY7ZvkubQWISgc41tvaa799a08SLwqLADdg52RBmBM/AngxPKYX6KNHYyRQIHFd5Q2UTqIpue+AqcBM5T0hI/HbDOtQygrx51AwbgL5SqDfcO5Qk4Ag8eZzGnLCJUBJm0AWVKfvLkmUiH4VTYIW+e4h2V4xJxpPAA/PYq9nPFnYMqjMD1TtCLE/Ps2njMbMeS5YrwgBpUhmrflL2Ru/CGwFELErmC/ojbs1uAXwg3E7ZVl0yWDljpBBPcNJlRBJvyAfxEOKFF5KX7ojkW206XcESLHp/AS6WxyTcKulVhj8rYZev8mev3bXPXRWBU2LcDauxd+MFp6ge3wvrGmHvMWjvaVJ338vKd8fSdBvZmKiJqMApsKzRvqM6ekoqI7eOhNk4uwJc3oyOoHFSRazcmkQPbAX5y14S4iCzwqb3IeJNhVqs+7ia4I6imWfsUmwo8ax2E0UXly1Wrj/tGcyOEKREOKKs+MuQGuqmbk8iNgwmFHbZXwcZy+kRzhueJe4sNo6JHYPkGkFcfWMbpe691GiFt2FFi7Xvrrq7dKwdxXBuvNpf++SUzjevHMn+EjaPskncaNGGLioeKpoiWr8NUos2uUnURdTFlXeTOLcmCpov9GM9b3/myXim3mHDOOnU3Y+BrOZ3zxbLSV9O7K3Mp1NgECQfEm679x3A/0YJep1T4D5W1CDJHUmUMAAAAAElFTkSuQmCC'/>
                    </a> <br>
                    </li>
                    </ul>
                    </td></tr>";
                } else {
                    echo '<tr><td>' . $Desc_Escala_Posto[$Verificar_Data_Desc_Escala] . '</td>
                    <td>
                    <ul class="list-group">
                    <li
                    data-toggle="tooltip"
                    class="list-group-item hoverable cpointer"
                    onclick="location.href="#"">
                    ' . $Desc_Escala_Militar_Graduacao[$Verificar_Data_Desc_Escala]
                        . "  "
                        . $Desc_Escala_Militar_Nome[$Verificar_Data_Desc_Escala] . "<a onclick='acaoinfo()' class='abririnfo' href='#'>
                    <img src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAlFJREFUSEuFlo1VGzEMx3+ahHSCJBPACGGCsgHJJBwTFCZoukE7QY4NkknUJ1t3ls6XR94DLrZO1v9DMoJ9BNDyy5/Lal73pfbH4+N6TBGeY7ZvkubQWISgc41tvaa799a08SLwqLADdg52RBmBM/AngxPKYX6KNHYyRQIHFd5Q2UTqIpue+AqcBM5T0hI/HbDOtQygrx51AwbgL5SqDfcO5Qk4Ag8eZzGnLCJUBJm0AWVKfvLkmUiH4VTYIW+e4h2V4xJxpPAA/PYq9nPFnYMqjMD1TtCLE/Ps2njMbMeS5YrwgBpUhmrflL2Ru/CGwFELErmC/ojbs1uAXwg3E7ZVl0yWDljpBBPcNJlRBJvyAfxEOKFF5KX7ojkW206XcESLHp/AS6WxyTcKulVhj8rYZev8mev3bXPXRWBU2LcDauxd+MFp6ge3wvrGmHvMWjvaVJ338vKd8fSdBvZmKiJqMApsKzRvqM6ekoqI7eOhNk4uwJc3oyOoHFSRazcmkQPbAX5y14S4iCzwqb3IeJNhVqs+7ia4I6imWfsUmwo8ax2E0UXly1Wrj/tGcyOEKREOKKs+MuQGuqmbk8iNgwmFHbZXwcZy+kRzhueJe4sNo6JHYPkGkFcfWMbpe691GiFt2FFi7Xvrrq7dKwdxXBuvNpf++SUzjevHMn+EjaPskncaNGGLioeKpoiWr8NUos2uUnURdTFlXeTOLcmCpov9GM9b3/myXim3mHDOOnU3Y+BrOZ3zxbLSV9O7K3Mp1NgECQfEm679x3A/0YJep1T4D5W1CDJHUmUMAAAAAElFTkSuQmCC'/>
                    </a>" . ' <br>
                    </li>
                    </ul>
                    </td></tr>';
                }
                $Id_Dos_Postos_Escalados[$a] = $Desc_Escala_Id_Posto[$Verificar_Data_Desc_Escala];
                $Id_Escalada[$a] = $Desc_Escala_Id[$Verificar_Data_Desc_Escala];
                $Definidos_Id[$a] = $Desc_Escala_Militar_Id[$Verificar_Data_Desc_Escala];
                $POSTO_Definido[$a] = $Desc_Escala_Posto[$Verificar_Data_Desc_Escala];
                $a++;
            }
            if ($Desc_Escala_Tipo[$Verificar_Data_Desc_Escala] == 'VERMELHA') {
                if ($Desc_Subistituido_Quest[$Verificar_Data_Desc_Escala] == 1) {
                    echo '<tr><td style="color: white;" bgcolor="Red">' . $Desc_Escala_Posto[$Verificar_Data_Desc_Escala] . '</td>
                    <td bgcolor="Red">
                    <ul class="list-group">
                    <li
                    data-toggle="tooltip"
                    class="list-group-item hoverable cpointer"
                    onclick="location.href="#"">
                    ';
                    if ($Desc_Subistituido_S2_Id[$Verificar_Data_Desc_Escala] != null) {
                        $query_registro = $conexao->prepare("SELECT * FROM militares m INNER JOIN graduacoes g ON m.graduacao = g.id_graduacao  WHERE id = $Desc_Subistituido_S2_Id[$Verificar_Data_Desc_Escala]");
                        $query_registro->execute(); //EXECUTA TABELA
                        $i = 0;
                        while ($reg = $query_registro->fetch(PDO::FETCH_ASSOC)) {
                            $entrou = $reg['nome_de_guerra'];
                            $gradentrou = $reg['nome_graduacao'];
                            $i++;
                        }
                        echo $gradentrou.' ' . $entrou;
                    } else {
                        echo $Desc_Escala_Militar_Nome[$Verificar_Data_Desc_Escala] . "";
                    }
                    if ($Desc_Subistituido_S1_Id[$Verificar_Data_Desc_Escala] != null) {

                        $query_registro = $conexao->prepare("SELECT * FROM militares m INNER JOIN graduacoes g ON m.graduacao = g.id_graduacao  WHERE id = $Desc_Subistituido_S1_Id[$Verificar_Data_Desc_Escala]");
                        $query_registro->execute(); //EXECUTA TABELA
                        $i = 0;
                        while ($reg = $query_registro->fetch(PDO::FETCH_ASSOC)) {
                            $militar_saiu = $reg['nome_de_guerra'];
                            $gradsaiu = $reg['nome_graduacao'];
                            $i++;
                        }
                        echo ' <span style=" font-size: 10px;"> Saiu ' . $gradsaiu . ' ' . $militar_saiu . '</span></s>';
                    }
                    echo " <a onclick='acaoinfored()' class='abririnfored' href='#'>
                    <img src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAlFJREFUSEuFlo1VGzEMx3+ahHSCJBPACGGCsgHJJBwTFCZoukE7QY4NkknUJ1t3ls6XR94DLrZO1v9DMoJ9BNDyy5/Lal73pfbH4+N6TBGeY7ZvkubQWISgc41tvaa799a08SLwqLADdg52RBmBM/AngxPKYX6KNHYyRQIHFd5Q2UTqIpue+AqcBM5T0hI/HbDOtQygrx51AwbgL5SqDfcO5Qk4Ag8eZzGnLCJUBJm0AWVKfvLkmUiH4VTYIW+e4h2V4xJxpPAA/PYq9nPFnYMqjMD1TtCLE/Ps2njMbMeS5YrwgBpUhmrflL2Ru/CGwFELErmC/ojbs1uAXwg3E7ZVl0yWDljpBBPcNJlRBJvyAfxEOKFF5KX7ojkW206XcESLHp/AS6WxyTcKulVhj8rYZev8mev3bXPXRWBU2LcDauxd+MFp6ge3wvrGmHvMWjvaVJ338vKd8fSdBvZmKiJqMApsKzRvqM6ekoqI7eOhNk4uwJc3oyOoHFSRazcmkQPbAX5y14S4iCzwqb3IeJNhVqs+7ia4I6imWfsUmwo8ax2E0UXly1Wrj/tGcyOEKREOKKs+MuQGuqmbk8iNgwmFHbZXwcZy+kRzhueJe4sNo6JHYPkGkFcfWMbpe691GiFt2FFi7Xvrrq7dKwdxXBuvNpf++SUzjevHMn+EjaPskncaNGGLioeKpoiWr8NUos2uUnURdTFlXeTOLcmCpov9GM9b3/myXim3mHDOOnU3Y+BrOZ3zxbLSV9O7K3Mp1NgECQfEm679x3A/0YJep1T4D5W1CDJHUmUMAAAAAElFTkSuQmCC'/>
                    </a><br>
                    </li>
                    </ul>
                    </td></tr>";
                } else {
                    
                    echo '<tr><td style="color: white;" bgcolor="Red">' . $Desc_Escala_Posto[$Verificar_Data_Desc_Escala] . '</td>
                    <td bgcolor="Red">
                    <ul class="list-group">
                    <li
                    data-toggle="tooltip"
                    class="list-group-item hoverable cpointer"
                    onclick="location.href="#"">
                    ' . $Desc_Escala_Militar_Graduacao[$Verificar_Data_Desc_Escala]
                        . " "
                        . $Desc_Escala_Militar_Nome[$Verificar_Data_Desc_Escala] . "<a onclick='acaoinfored()' class='abririnfored' href='#'>
                    <img src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAlFJREFUSEuFlo1VGzEMx3+ahHSCJBPACGGCsgHJJBwTFCZoukE7QY4NkknUJ1t3ls6XR94DLrZO1v9DMoJ9BNDyy5/Lal73pfbH4+N6TBGeY7ZvkubQWISgc41tvaa799a08SLwqLADdg52RBmBM/AngxPKYX6KNHYyRQIHFd5Q2UTqIpue+AqcBM5T0hI/HbDOtQygrx51AwbgL5SqDfcO5Qk4Ag8eZzGnLCJUBJm0AWVKfvLkmUiH4VTYIW+e4h2V4xJxpPAA/PYq9nPFnYMqjMD1TtCLE/Ps2njMbMeS5YrwgBpUhmrflL2Ru/CGwFELErmC/ojbs1uAXwg3E7ZVl0yWDljpBBPcNJlRBJvyAfxEOKFF5KX7ojkW206XcESLHp/AS6WxyTcKulVhj8rYZev8mev3bXPXRWBU2LcDauxd+MFp6ge3wvrGmHvMWjvaVJ338vKd8fSdBvZmKiJqMApsKzRvqM6ekoqI7eOhNk4uwJc3oyOoHFSRazcmkQPbAX5y14S4iCzwqb3IeJNhVqs+7ia4I6imWfsUmwo8ax2E0UXly1Wrj/tGcyOEKREOKKs+MuQGuqmbk8iNgwmFHbZXwcZy+kRzhueJe4sNo6JHYPkGkFcfWMbpe691GiFt2FFi7Xvrrq7dKwdxXBuvNpf++SUzjevHMn+EjaPskncaNGGLioeKpoiWr8NUos2uUnURdTFlXeTOLcmCpov9GM9b3/myXim3mHDOOnU3Y+BrOZ3zxbLSV9O7K3Mp1NgECQfEm679x3A/0YJep1T4D5W1CDJHUmUMAAAAAElFTkSuQmCC'/>
                    </a>";
                    echo $Verificar_Data_Desc_Escala;
                    echo ' <br>
                    </li>
                    </ul>
                    </td></tr>';
                }
                $Id_Dos_Postos_Escalados[$a] = $Desc_Escala_Id_Posto[$Verificar_Data_Desc_Escala];
                $Id_Escalada[$a] = $Desc_Escala_Id[$Verificar_Data_Desc_Escala];
                $Definidos_Id[$a] = $Desc_Escala_Militar_Id[$Verificar_Data_Desc_Escala];
                $POSTO_Definido[$a] = $Desc_Escala_Posto[$Verificar_Data_Desc_Escala];
                $a++;
            }
            $Verificar_Data_Desc_Escala++;
        }
    } else {
        
        while ($Desc_Escala_Data[$Verificar_Data_Desc_Escala] >= $Data_Selecionada) {
           
            if ($Data_Selecionada == $Desc_Escala_Data[$Verificar_Data_Desc_Escala]) {

                if ($Desc_Escala_Tipo[$Verificar_Data_Desc_Escala] == 'PRETA') {
                    if ($Desc_Subistituido_Quest[$Verificar_Data_Desc_Escala] == 1) {
                        echo '<tr><td>' . $Desc_Escala_Posto[$Verificar_Data_Desc_Escala] . '</td>
                        <td>
                        <ul class="list-group">
                        <li
                        data-toggle="tooltip"
                        class="list-group-item hoverable cpointer"
                        onclick="location.href="#"">
                        ' . $Desc_Escala_Militar_Graduacao[$Verificar_Data_Desc_Escala]
                            . " ";
                        if ($Desc_Subistituido_S2_Id[$Verificar_Data_Desc_Escala] != null) {
                            $query_registro = $conexao->prepare("SELECT * FROM militares m INNER JOIN graduacoes g ON m.graduacao = g.id_graduacao  WHERE id = $Desc_Subistituido_S2_Id[$Verificar_Data_Desc_Escala]");
                            $query_registro->execute(); //EXECUTA TABELA
                            $i = 0;
                            while ($reg = $query_registro->fetch(PDO::FETCH_ASSOC)) {
                                $entrou = $reg['nome_de_guerra'];

                                $i++;
                            }
                            echo  $entrou;
                        } else {
                            echo $Desc_Escala_Militar_Nome[$Verificar_Data_Desc_Escala];
                        }

                        if ($Desc_Subistituido_S1_Id[$Verificar_Data_Desc_Escala] != null) {
                            $query_registro = $conexao->prepare("SELECT * FROM militares m INNER JOIN graduacoes g ON m.graduacao = g.id_graduacao  WHERE id = $Desc_Subistituido_S1_Id[$Verificar_Data_Desc_Escala]");
                            $query_registro->execute(); //EXECUTA TABELA
                            $i = 0;
                            while ($reg = $query_registro->fetch(PDO::FETCH_ASSOC)) {
                                $militar_saiu = $reg['nome_de_guerra'];
                                $grad_saiu = $reg['nome_graduacao'];
                                $i++;
                                echo ' <span style=" font-size: 10px;"> saiu ' . $grad_saiu . ' ' . $militar_saiu . '</span>';
                            }
                        }
                        echo "<a onclick='acaoinfo()' class='abririnfo' href='#'>
                        <img src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAlFJREFUSEuFlo1VGzEMx3+ahHSCJBPACGGCsgHJJBwTFCZoukE7QY4NkknUJ1t3ls6XR94DLrZO1v9DMoJ9BNDyy5/Lal73pfbH4+N6TBGeY7ZvkubQWISgc41tvaa799a08SLwqLADdg52RBmBM/AngxPKYX6KNHYyRQIHFd5Q2UTqIpue+AqcBM5T0hI/HbDOtQygrx51AwbgL5SqDfcO5Qk4Ag8eZzGnLCJUBJm0AWVKfvLkmUiH4VTYIW+e4h2V4xJxpPAA/PYq9nPFnYMqjMD1TtCLE/Ps2njMbMeS5YrwgBpUhmrflL2Ru/CGwFELErmC/ojbs1uAXwg3E7ZVl0yWDljpBBPcNJlRBJvyAfxEOKFF5KX7ojkW206XcESLHp/AS6WxyTcKulVhj8rYZev8mev3bXPXRWBU2LcDauxd+MFp6ge3wvrGmHvMWjvaVJ338vKd8fSdBvZmKiJqMApsKzRvqM6ekoqI7eOhNk4uwJc3oyOoHFSRazcmkQPbAX5y14S4iCzwqb3IeJNhVqs+7ia4I6imWfsUmwo8ax2E0UXly1Wrj/tGcyOEKREOKKs+MuQGuqmbk8iNgwmFHbZXwcZy+kRzhueJe4sNo6JHYPkGkFcfWMbpe691GiFt2FFi7Xvrrq7dKwdxXBuvNpf++SUzjevHMn+EjaPskncaNGGLioeKpoiWr8NUos2uUnURdTFlXeTOLcmCpov9GM9b3/myXim3mHDOOnU3Y+BrOZ3zxbLSV9O7K3Mp1NgECQfEm679x3A/0YJep1T4D5W1CDJHUmUMAAAAAElFTkSuQmCC'/>
                        </a> <br>
                        </li>
                        </ul>
                        </td></tr>";
                    } else {
                        echo '<tr><td>' . $Desc_Escala_Posto[$Verificar_Data_Desc_Escala] . '</td>
                        <td>
                        <ul class="list-group">
                        <li
                        data-toggle="tooltip"
                        class="list-group-item hoverable cpointer"
                        onclick="location.href="#"">
                        ' . $Desc_Escala_Militar_Graduacao[$Verificar_Data_Desc_Escala]
                            . " "
                            . $Desc_Escala_Militar_Nome[$Verificar_Data_Desc_Escala] . "<a onclick='acaoinfo()' class='abririnfo' href='#'>
                        <img src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAlFJREFUSEuFlo1VGzEMx3+ahHSCJBPACGGCsgHJJBwTFCZoukE7QY4NkknUJ1t3ls6XR94DLrZO1v9DMoJ9BNDyy5/Lal73pfbH4+N6TBGeY7ZvkubQWISgc41tvaa799a08SLwqLADdg52RBmBM/AngxPKYX6KNHYyRQIHFd5Q2UTqIpue+AqcBM5T0hI/HbDOtQygrx51AwbgL5SqDfcO5Qk4Ag8eZzGnLCJUBJm0AWVKfvLkmUiH4VTYIW+e4h2V4xJxpPAA/PYq9nPFnYMqjMD1TtCLE/Ps2njMbMeS5YrwgBpUhmrflL2Ru/CGwFELErmC/ojbs1uAXwg3E7ZVl0yWDljpBBPcNJlRBJvyAfxEOKFF5KX7ojkW206XcESLHp/AS6WxyTcKulVhj8rYZev8mev3bXPXRWBU2LcDauxd+MFp6ge3wvrGmHvMWjvaVJ338vKd8fSdBvZmKiJqMApsKzRvqM6ekoqI7eOhNk4uwJc3oyOoHFSRazcmkQPbAX5y14S4iCzwqb3IeJNhVqs+7ia4I6imWfsUmwo8ax2E0UXly1Wrj/tGcyOEKREOKKs+MuQGuqmbk8iNgwmFHbZXwcZy+kRzhueJe4sNo6JHYPkGkFcfWMbpe691GiFt2FFi7Xvrrq7dKwdxXBuvNpf++SUzjevHMn+EjaPskncaNGGLioeKpoiWr8NUos2uUnURdTFlXeTOLcmCpov9GM9b3/myXim3mHDOOnU3Y+BrOZ3zxbLSV9O7K3Mp1NgECQfEm679x3A/0YJep1T4D5W1CDJHUmUMAAAAAElFTkSuQmCC'/>
                        </a>";
                        if ($Desc_Subistituido_S1_Id[$Verificar_Data_Desc_Escala] != null) {
                            $query_registro = $conexao->prepare("SELECT * FROM militares m INNER JOIN graduacoes g ON m.graduacao = g.id_graduacao  WHERE id = $Desc_Subistituido_S1_Id[$Verificar_Data_Desc_Escala]");
                            $query_registro->execute(); //EXECUTA TABELA
                            $i = 0;
                            while ($reg = $query_registro->fetch(PDO::FETCH_ASSOC)) {
                                $militar_saiu = $reg['nome_de_guerra'];
                                $gradsaiu = $reg['nome_graduacao'];
                                $i++;

                                echo ' <span style=" font-size: 10px;"> Saiu ' . $gradsaiu . ' ' . $militar_saiu . '</span></s>';
                            }
                        }
                        echo "<a onclick='acaoinfo()' class='abririnfo' href='#'>
                        <img src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAlFJREFUSEuFlo1VGzEMx3+ahHSCJBPACGGCsgHJJBwTFCZoukE7QY4NkknUJ1t3ls6XR94DLrZO1v9DMoJ9BNDyy5/Lal73pfbH4+N6TBGeY7ZvkubQWISgc41tvaa799a08SLwqLADdg52RBmBM/AngxPKYX6KNHYyRQIHFd5Q2UTqIpue+AqcBM5T0hI/HbDOtQygrx51AwbgL5SqDfcO5Qk4Ag8eZzGnLCJUBJm0AWVKfvLkmUiH4VTYIW+e4h2V4xJxpPAA/PYq9nPFnYMqjMD1TtCLE/Ps2njMbMeS5YrwgBpUhmrflL2Ru/CGwFELErmC/ojbs1uAXwg3E7ZVl0yWDljpBBPcNJlRBJvyAfxEOKFF5KX7ojkW206XcESLHp/AS6WxyTcKulVhj8rYZev8mev3bXPXRWBU2LcDauxd+MFp6ge3wvrGmHvMWjvaVJ338vKd8fSdBvZmKiJqMApsKzRvqM6ekoqI7eOhNk4uwJc3oyOoHFSRazcmkQPbAX5y14S4iCzwqb3IeJNhVqs+7ia4I6imWfsUmwo8ax2E0UXly1Wrj/tGcyOEKREOKKs+MuQGuqmbk8iNgwmFHbZXwcZy+kRzhueJe4sNo6JHYPkGkFcfWMbpe691GiFt2FFi7Xvrrq7dKwdxXBuvNpf++SUzjevHMn+EjaPskncaNGGLioeKpoiWr8NUos2uUnURdTFlXeTOLcmCpov9GM9b3/myXim3mHDOOnU3Y+BrOZ3zxbLSV9O7K3Mp1NgECQfEm679x3A/0YJep1T4D5W1CDJHUmUMAAAAAElFTkSuQmCC'/>
                        </a> <br>
                        </li>
                        </ul>
                        </td></tr>";
                    }
                    $Id_Dos_Postos_Escalados[$a] = $Desc_Escala_Id_Posto[$Verificar_Data_Desc_Escala];
                    $Id_Escalada[$a] = $Desc_Escala_Id[$Verificar_Data_Desc_Escala];
                    $Definidos_Id[$a] = $Desc_Escala_Militar_Id[$Verificar_Data_Desc_Escala];
                    $POSTO_Definido[$a] = $Desc_Escala_Posto[$Verificar_Data_Desc_Escala];
                    $a++;
                }
                if ($Desc_Escala_Tipo[$Verificar_Data_Desc_Escala] == 'VERMELHA') {
                    if ($Desc_Subistituido_Quest[$Verificar_Data_Desc_Escala] == 1) {
                        echo '<tr><td style="color: white;" bgcolor="Red">' . $Desc_Escala_Posto[$Verificar_Data_Desc_Escala] . '</td>
                        <td bgcolor="Red">
                        <ul class="list-group">
                        <li
                        data-toggle="tooltip"
                        class="list-group-item hoverable cpointer"
                        onclick="location.href="#"">
                        ';
                        if ($Desc_Subistituido_S2_Id[$Verificar_Data_Desc_Escala] != null) {
                            $query_registro = $conexao->prepare("SELECT * FROM militares m INNER JOIN graduacoes g ON m.graduacao = g.id_graduacao  WHERE id = $Desc_Subistituido_S2_Id[$Verificar_Data_Desc_Escala]");
                            $query_registro->execute(); //EXECUTA TABELA
                            $i = 0;
                            while ($reg = $query_registro->fetch(PDO::FETCH_ASSOC)) {
                                $entrou = $reg['nome_de_guerra'];
                                $gradentrou = $reg['nome_graduacao'];
                                $i++;
                            }
                            echo $gradentrou.' ' . $entrou;
                        } else {
                            echo $Desc_Escala_Militar_Nome[$Verificar_Data_Desc_Escala];
                        }
                        if ($Desc_Subistituido_S1_Id[$Verificar_Data_Desc_Escala] != null) {
                            $query_registro = $conexao->prepare("SELECT * FROM militares m INNER JOIN graduacoes g ON m.graduacao = g.id_graduacao  WHERE id = $Desc_Subistituido_S1_Id[$Verificar_Data_Desc_Escala]");
                            $query_registro->execute(); //EXECUTA TABELA
                            $i = 0;
                            while ($reg = $query_registro->fetch(PDO::FETCH_ASSOC)) {
                                $militar_saiu = $reg['nome_de_guerra'];
                                $gradsaiu = $reg['nome_graduacao'];
                                $i++;
                                echo ' <span style=" font-size: 10px;"> Saiu ' . $gradsaiu . ' ' . $militar_saiu . '</span></s>';
                            }
                        }
                        echo "<a onclick='acaoinfored()' class='abririnfored' href='#'>
                        <img src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAlFJREFUSEuFlo1VGzEMx3+ahHSCJBPACGGCsgHJJBwTFCZoukE7QY4NkknUJ1t3ls6XR94DLrZO1v9DMoJ9BNDyy5/Lal73pfbH4+N6TBGeY7ZvkubQWISgc41tvaa799a08SLwqLADdg52RBmBM/AngxPKYX6KNHYyRQIHFd5Q2UTqIpue+AqcBM5T0hI/HbDOtQygrx51AwbgL5SqDfcO5Qk4Ag8eZzGnLCJUBJm0AWVKfvLkmUiH4VTYIW+e4h2V4xJxpPAA/PYq9nPFnYMqjMD1TtCLE/Ps2njMbMeS5YrwgBpUhmrflL2Ru/CGwFELErmC/ojbs1uAXwg3E7ZVl0yWDljpBBPcNJlRBJvyAfxEOKFF5KX7ojkW206XcESLHp/AS6WxyTcKulVhj8rYZev8mev3bXPXRWBU2LcDauxd+MFp6ge3wvrGmHvMWjvaVJ338vKd8fSdBvZmKiJqMApsKzRvqM6ekoqI7eOhNk4uwJc3oyOoHFSRazcmkQPbAX5y14S4iCzwqb3IeJNhVqs+7ia4I6imWfsUmwo8ax2E0UXly1Wrj/tGcyOEKREOKKs+MuQGuqmbk8iNgwmFHbZXwcZy+kRzhueJe4sNo6JHYPkGkFcfWMbpe691GiFt2FFi7Xvrrq7dKwdxXBuvNpf++SUzjevHMn+EjaPskncaNGGLioeKpoiWr8NUos2uUnURdTFlXeTOLcmCpov9GM9b3/myXim3mHDOOnU3Y+BrOZ3zxbLSV9O7K3Mp1NgECQfEm679x3A/0YJep1T4D5W1CDJHUmUMAAAAAElFTkSuQmCC'/>
                        </a><br>
                        </li>
                        </ul>
                        </td></tr>";
                    } else {
                        echo '<tr><td style="color: white;" bgcolor="Red">' . $Desc_Escala_Posto[$Verificar_Data_Desc_Escala] . '</td>
                        <td bgcolor="Red">
                        <ul class="list-group">
                        <li
                        data-toggle="tooltip"
                        class="list-group-item hoverable cpointer"
                        onclick="location.href="#"">
                        ' . $Desc_Escala_Militar_Graduacao[$Verificar_Data_Desc_Escala]
                            . " "
                            . $Desc_Escala_Militar_Nome[$Verificar_Data_Desc_Escala] . "<a onclick='acaoinfored()' class='abririnfored' href='#'>
                        <img src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAlFJREFUSEuFlo1VGzEMx3+ahHSCJBPACGGCsgHJJBwTFCZoukE7QY4NkknUJ1t3ls6XR94DLrZO1v9DMoJ9BNDyy5/Lal73pfbH4+N6TBGeY7ZvkubQWISgc41tvaa799a08SLwqLADdg52RBmBM/AngxPKYX6KNHYyRQIHFd5Q2UTqIpue+AqcBM5T0hI/HbDOtQygrx51AwbgL5SqDfcO5Qk4Ag8eZzGnLCJUBJm0AWVKfvLkmUiH4VTYIW+e4h2V4xJxpPAA/PYq9nPFnYMqjMD1TtCLE/Ps2njMbMeS5YrwgBpUhmrflL2Ru/CGwFELErmC/ojbs1uAXwg3E7ZVl0yWDljpBBPcNJlRBJvyAfxEOKFF5KX7ojkW206XcESLHp/AS6WxyTcKulVhj8rYZev8mev3bXPXRWBU2LcDauxd+MFp6ge3wvrGmHvMWjvaVJ338vKd8fSdBvZmKiJqMApsKzRvqM6ekoqI7eOhNk4uwJc3oyOoHFSRazcmkQPbAX5y14S4iCzwqb3IeJNhVqs+7ia4I6imWfsUmwo8ax2E0UXly1Wrj/tGcyOEKREOKKs+MuQGuqmbk8iNgwmFHbZXwcZy+kRzhueJe4sNo6JHYPkGkFcfWMbpe691GiFt2FFi7Xvrrq7dKwdxXBuvNpf++SUzjevHMn+EjaPskncaNGGLioeKpoiWr8NUos2uUnURdTFlXeTOLcmCpov9GM9b3/myXim3mHDOOnU3Y+BrOZ3zxbLSV9O7K3Mp1NgECQfEm679x3A/0YJep1T4D5W1CDJHUmUMAAAAAElFTkSuQmCC'/>
                        </a>" . ' <br>
                        </li>
                        </ul>
                        </td></tr>';
                    }
                    $Id_Dos_Postos_Escalados[$a] = $Desc_Escala_Id_Posto[$Verificar_Data_Desc_Escala];
                    $Id_Escalada[$a] = $Desc_Escala_Id[$Verificar_Data_Desc_Escala];
                    $Definidos_Id[$a] = $Desc_Escala_Militar_Id[$Verificar_Data_Desc_Escala];
                    $POSTO_Definido[$a] = $Desc_Escala_Posto[$Verificar_Data_Desc_Escala];
                    $a++;
                }
            }
            $Verificar_Data_Desc_Escala++;
            
        }
    }
    if ($EscalaExterna == true) {
        while ($QtdServicoExterno > $Percorrer_Externo) {
            echo '<tr><td style="color: black;" bgcolor="yellow">' . $Externa_Posto[$Percorrer_Externo] . '</td>
            <td style="color: black;" bgcolor="yellow">
            <ul class="list-group">
            <li
            data-toggle="tooltip"
            class="list-group-item hoverable cpointer"
            onclick="location.href="#"">
            ' . $Externa_Graduacao[$Percorrer_Externo]
                . "  "
                . $Externa_Nome[$Percorrer_Externo] . " " . ' <br>
            </li>
            </ul>
            </td></tr>';
            $Percorrer_Externo++;
        }
    }
}

echo '  </table>';


?>

<!-- MODALS -->