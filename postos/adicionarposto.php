<?php
        session_start();

        if(isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])){
            require("../conexoes/conexao.php");

            $adm  = $_SESSION["usuario"][1];
               $nome = $_SESSION["usuario"][0]; $id_desse_user = $_SESSION["usuario"][3]; $arrayexplodido = explode("0",$id_desse_user); 
        }else{
            echo "<script>window.location = '../index.php'</script>";
        }
    ?>
    <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ if($adm): ?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

<link rel="icon" type="image/x-icon" href="../img/logo40px.ico" /><!------ Include the above in your HEAD tag ---------->


    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    
    
    <link rel="icon" type="image/x-icon" href="../img/logo40px.ico" /><!------ Include the above in your HEAD tag ---------->

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
    <link href="../css/militares.css" rel="stylesheet">
  
    <link rel="stylesheet" href="../js/militares.js">
<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css'><link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/dialog-polyfill/0.4.2/dialog-polyfill.min.css'><link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/material-design-lite/1.2.1/material.min.css'><link rel='stylesheet prefetch' href='https://code.getmdl.io/1.2.1/material.blue-light_blue.min.css'>
    <style class="cp-pen-styles">;
    header .mdl-layout__drawer {
    border-right: 0;
    }
    header .mdl-layout__drawer .mdl-layout-title {
    box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 1px 5px 0 rgba(0, 0, 0, 0.12);
    }
    header .search input {
    border-bottom: 0;

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

    .breadcrumbs > li {
    display: inline-block;
    }

    .breadcrumbs > li + li:before {
    padding: 0 5px;
    color: #ccc;
    content: "/ ";
    } 

    .breadcrumbs .active {
    font-weight: normal;
    color: #999;
    }
    .buton{
      background-image: linear-gradient(to right, rgb(20,147,220), rgb(17,54,71));
      width: 100%;
      border: none;
      padding: 10px;
      color: white;
      font-size: 10px;
      cursor: pointer;
      border-radius: 15px;
    }
    .direita{
        position: right;
        text-align: right;
        padding: 15px 15px 0px;

    }
    .buton:hover{
      background-image: linear-gradient(to right, rgb(0,80,172), rgb(80,19,195));
    }
    </style>
   
    <header>                           
	<title>Cadastrar Posto</title>	   <div class="row">
                                
                                <div class="search hidden-xs hidden-sm">
                                </div>
                            </div>
                            
                                   

                            <h2>Cadastrar Posto<h2>
                          <div>
						  <li>
                                    <a href="postosgerenciamento.php" class="icon-info"><button class="btn btn-dblue btn-lg btn-danger" role="button" class="submit">Cancelar</button></a>
                                    </li>
                            <!-- <li>
                                    <a href="adicionarposto.php" class="icon-info"><button class="btn btn-dblue btn-lg btn-primary" role="button" class="submit">Adicionar</button></a>
                                    </li> -->
</div>
                        </header>
                    
<?php
                          if(isset($_SESSION['msg'])){
                            echo $_SESSION['msg'];
                            unset($_SESSION['msg']);
                        }
                         
                           
                            ?>
    <div class="mdl-ce11">
	
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		
        if(!empty($_GET['id'])){  
            include_once('../conexoes/conect.php');
            
            $id = $_GET['id'];
            $sqlSelect = "SELECT * FROM posto WHERE id_posto = $id";
          
            $result = $conect->query($sqlSelect);
          
            /*print_r($result);*/
            if($result->num_rows > 0){
              
              while($user_data = mysqli_fetch_assoc($result)){
                $nome_posto = $user_data['nome_posto'];
                $qtd_mil = $user_data['qtd_mil'];
                $curso = $user_data['curso'];
                $prioridade = $user_data['prioridade'];
                $tipo_folga = $user_data['tipo_folga'];
                $posto_graduacao = $user_data['posto_graduacao'];
                $posto_servico = $user_data['posto_servico'];
                $status_posto = $user_data['status_posto'];
                $id = $user_data['id_posto'];
                $diasdo = $user_data['data_posto'];
                $dia_troca = $user_data['data_atividade'];
                $atividade_posto = $user_data['guarnicao_posto'];
                $posto_antiguidade = $user_data['posto_antiguidade'];
                $escala_um_secao = $user_data['escala_um_secao'];
              }
             
            }else{
              header('Location: ../editmilitargerencia.php');
            }
        //    echo $diasdo;
            $dias =  explode('-', $diasdo) ;
          //  print_r($dias);
		?>
    
		<div style="margin-left: 5%;margin-top: 2%;  border: 5px solid rgba(174, 0, 255, 0.459);margin-right: 65%; " > 
		<form  style="margin-left: 5%; margin-top: 2%;" method="POST" action="proc_edit_posto.php">
        
        
		<label style="font-size: 20px;">Nome: </label>
			<input  type="text" name="nome" value="<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo $nome_posto ?>" placeholder="Digite o nome do Posto"><br><br>
			<label style="font-size: 20px;" >Quantos militares concorrem ao posto </label>
									<select name="qtd_mil">
								<optgroup label="Quantidade">
                                <option name="qtd_mil" value="<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo $qtd_mil ?>"><?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo $qtd_mil ?> 
								<option name="qtd_mil" value="01">01	
								<option name="qtd_mil" value="02">02
								<option name="qtd_mil" value="03">03
								<option name="qtd_mil" value="04">04
								<option name="qtd_mil" value="05">05
								<option name="qtd_mil" value="06">06
								<option name="qtd_mil" value="07">07
								<option name="qtd_mil" value="08">08
								<option name="qtd_mil" value="09">09
								<option name="qtd_mil" value="10">10 
								</select> <sapn style="font-size: 20px;">por dia.</sapn>
								<br>	
								<br>
                                <label style="font-size: 20px;" >Qual o Tipo do Serviço?</label>
									<select name="tipo_sv">
								<optgroup label="Tipos">
                                    <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ if($tipo_folga == "data_ultimo_sv"){ ?>
                                        <option name="tipo_sv" value="data_ultimo_sv">Interno	
                                        <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */    } ?>
                                        <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ if($tipo_folga == "escalado_externo"){ ?>
                                            <option name="tipo_sv" value="escalado_externo">Externo Gerido Pela Om
                                        <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */    } ?>
                                        <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ if($tipo_folga == "missao"){ ?>
                                            <option name="tipo_sv" value="missao">Missão	
                                        <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */    } ?>
                                        <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ if($tipo_folga == "externo"){ ?>
                                            <option name="tipo_sv" value="externo">Não Gerida Pela Om
                                        <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */    } ?>
								<option name="tipo_sv" value="data_ultimo_sv">Interno	
								<option name="tipo_sv" value="escalado_externo">Externo Gerido Pela Om
								<option name="tipo_sv" value="missao">Missão
								<option name="tipo_sv" value="externo">Sem Escalação
								</select>
								<br></br>
		 <div style="font-size: 20px;" >Qual o escala de serviço nesse posto?</div>		
		 <input type="radio" id="PRETA" name="SERVICO" value="PRETA" <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo ($posto_servico == 'PRETA') ? 'checked' : ''?> required>
		 <label for="PRETA">Preta</label>
         <input type="radio" id="VERMELHA" name="SERVICO" value="VERMELHA" <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo ($posto_servico == 'VERMELHA') ? 'checked' : ''?> required>
         <label for="VERMELHA">Vermelha</label>
         
		 <br></br>
		
		 <div style="font-size: 20px;" >Desativar ou Ativar o Posto?</div>
                                <input type="radio" id="status_posto" name="status_posto" value="1" <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo ($status_posto == '1') ? 'checked' : ''?> required>
		 <label for="1">Ativar</label>
         <input type="radio" id="status_posto" name="status_posto" value="0" <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo ($status_posto == '0') ? 'checked' : ''?> required>
         <label for="0">Desativar</label>
         
                                <input type="hidden" name="id" value="<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo $id ?>">
                                <?php
         $query_sd_Grad = $conexao->prepare("SELECT * FROM graduacoes order by id_graduacao asc"); 
         $query_sd_Grad->execute(); 
         $i = 0;
          while($linha = $query_sd_Grad->fetch(PDO::FETCH_ASSOC)) {
             $Grad_Externo_ = $linha['id_graduacao'];
             $Grad_Externo = $linha['nome_graduacao'];
             $Grad_Externo_ID[$i] = $Grad_Externo_;
             $Grad_Externo_Nome[$i] = $Grad_Externo;
             $i++;
          }
          $total_de_Grad = $i;
         $nome = $posto_graduacao - 1;
         ?>
		 <br></br>
		 <div style="font-size: 20px;" >Qual graduação concorre ao serviço?</div>		
         <select name="graduacao">
        
								<optgroup label="graduacoes">
                                    <option name="graduacao" value="<?= $posto_graduacao ?>"><?= $Grad_Externo_Nome[$nome] ?></option>
         <?php
         $cont = 0;
         while($cont < $total_de_Grad){
            echo '<option name="graduacao" value="'.$Grad_Externo_ID[$cont].'" >'.$Grad_Externo_Nome[$cont].'</option>';
        //    echo '<input type="radio" id="'.$Grad_Externo_Nome[$cont].'" name="graduacao" value="'.$Grad_Externo_ID[$cont].'" required>';
		//   echo '<label for="'.$Grad_Externo_Nome[$cont].'">'.$Grad_Externo_Nome[$cont].'</label> <br>';
         $cont++;
         }
                     ?>
         </select>
		 
         <br></br>
		 <div style="font-size: 20px;" >Qual os dias para o serviço?</div>		
		 <input type="checkbox" id="seg" name="dia0" value="seg-" <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo (in_array("seg",$dias)) ? 'checked' : ''?>>
		 <label for="seg">seg</label>
         <input type="checkbox" id="ter" name="dia1" value="ter-"<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo (in_array("ter",$dias)) ? 'checked' : ''?>>
		 <label for="ter">ter</label>
         <input type="checkbox" id="qua" name="dia2" value="qua-"<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo (in_array("qua",$dias)) ? 'checked' : ''?>>
		 <label for="qua">qua</label>
         <input type="checkbox" id="qui" name="dia3" value="qui-"<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo (in_array("qui",$dias)) ? 'checked' : ''?>>
		 <label for="qui">qui</label>
         <input type="checkbox" id="sex" name="dia4" value="sex-"<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo (in_array("sex",$dias)) ? 'checked' : ''?>>
		 <label for="sex">sex</label>
         <input type="checkbox" id="sab" name="dia5" value="sáb-"<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo (in_array("sáb",$dias)) ? 'checked' : ''?>>
		 <label for="sab">sab</label>
         <input type="checkbox" id="dom" name="dia6" value="dom-" <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo (in_array("dom",$dias)) ? 'checked' : ''?>>
		 <label for="dom">dom</label>
         <input type="checkbox" id="fer" name="dia7" value="fer-"  <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo (in_array("fer",$dias)) ? 'checked' : ''?>>
		 <label for="fer">Feriados</label>
		 <br></br>
         <div style="font-size: 20px;" >Repetir a Guarnição: <input type="checkbox" value='sim' name='repitir' <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo ($atividade_posto == '2') ? 'checked' : '' ?>/> Sim</div>	<br>
         <div style="font-size: 20px;" >Qual sera o dia em que o posto troca a guarnição?</div>		
		 <input type="radio" id="Trorseg" name="dia_troca" value="seg" <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo  ($dia_troca == 'seg') ? 'checked' : ''?>>
		 <label for="Trorseg">seg</label>
         <input type="radio" id="Trorter" name="dia_troca" value="ter"<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo  ($dia_troca == 'ter') ? 'checked' : ''?>>
		 <label for="Trorter">ter</label>
         <input type="radio" id="Trorqua" name="dia_troca" value="qua"<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo  ($dia_troca == 'qua') ? 'checked' : ''?>>
		 <label for="Trorqua">qua</label>
         <input type="radio" id="Trorqui" name="dia_troca" value="qui"<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo  ($dia_troca == 'qui') ? 'checked' : ''?>>
		 <label for="Trorqui">qui</label>
         <input type="radio" id="Trorsex" name="dia_troca" value="sex"<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo  ($dia_troca == 'sex') ? 'checked' : ''?>>
		 <label for="Trorsex">sex</label>
         <input type="radio" id="Trorsab" name="dia_troca" value="sáb"<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo  ($dia_troca == 'sáb') ? 'checked' : ''?>>
		 <label for="Trorsab">sab</label>
         <input type="radio" id="Trordom" name="dia_troca" value="dom" <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo  ($dia_troca == 'dom') ? 'checked' : ''?>>
		 <label for="Trordom">dom</label>
         
         <br></br>
         <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ 
          $query_sd_Curso = $conexao->prepare("SELECT * FROM cursos "); 
          $query_sd_Curso->execute(); 
          $i = 0;
           while($linha = $query_sd_Curso->fetch(PDO::FETCH_ASSOC)) {
              $Curso_Externo_ = $linha['id_curso'];
              $Curso_Externo = $linha['nome_curso'];
              $Curso_Externo_ID[$i] = $Curso_Externo_;
              $Curso_Externo_Nome[$i] = $Curso_Externo;
              $i++;
           }
           $total_de_cursos = $i;
           $nome = $curso - 1;
         ?>
                                <label style="font-size: 20px;" >Qual curso exclusivo para esse posto?</label>
									<select name="curso">
								<optgroup label="Tipos">
                                <option name="curso" value="<?= $curso ?>"><?= $Curso_Externo_Nome[$nome] ?></option>
								<?php
                            $cont = 0;
                                while($cont < $total_de_cursos){
                                echo '<option name="curso" value="'.$Curso_Externo_ID[$cont].'" >'.$Curso_Externo_Nome[$cont].'</option>';
                                $cont++;
                                }
                                            ?>
								</select>
								
         <br></br>
         <div style="font-size: 20px;" >Prioridade de Antiguidade: <input type="radio" value='DESC' name='antiguidade_posto' <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo  ($posto_antiguidade == 'DESC') ? 'checked' : ''?>> Moderno <input type="radio" value='ASC' name='antiguidade_posto' <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo  ($posto_antiguidade == 'ASC') ? 'checked' : ''?>> Antigo</div>	<br>
         <label style="font-size: 20px;">Prioridade: </label>
			<input  type="number" name="Prioridade" value="<?= $prioridade ?>" placeholder="Digite a Prioridade"><br><br>
            <div style="font-size: 20px;" >Desativar ou Ativar Função de escalar só um militar da seção? (Isso pode beneficiar militares e desbalancear a folga)</div>
                                <input type="radio" id="um_militar" name="um_militar" value="GROUP BY m.secao HAVING COUNT(*) > 0" <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo ($escala_um_secao == 'GROUP BY m.secao HAVING COUNT(*) > 0') ? 'checked' : ''?> required>
		 <label for="1">Ativado</label>
         <input type="radio" id="um_militar" name="um_militar" value="" <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo ($escala_um_secao == '') ? 'checked' : ''?> required>
         <label for="0">Desativado</label><br><br>
			<input class="btn btn-dblue btn-lg btn-primary" type="submit" name="submit">
            
		</form> 
			
            </div>
	</div>		
	<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ 
        
    ?>
        <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ }else{ ?>
		<div style="margin-left: 5%;margin-top: 2%;  border: 5px solid rgba(174, 0, 255, 0.459);margin-right: 65%; " > 
		<form  style="margin-left: 5%; margin-top: 2%;" method="POST" action="proc_cad_posto.php">
		<label style="font-size: 20px;">Nome: </label>
			<input  type="text" name="nome" placeholder="Digite o nome do Posto"><br><br>
            
         <br>
			<label style="font-size: 20px;" >Quantos militares concorrem ao posto </label>
									<select name="qtd_mil">
								<optgroup label="Quantidade">
								<option name="qtd_mil" value="01">01	
								<option name="qtd_mil" value="02">02
								<option name="qtd_mil" value="03">03
								<option name="qtd_mil" value="04">04
								<option name="qtd_mil" value="05">05
								<option name="qtd_mil" value="06">06
								<option name="qtd_mil" value="07">07
								<option name="qtd_mil" value="08">08
								<option name="qtd_mil" value="09">09
								<option name="qtd_mil" value="10">10 
								</select> <sapn style="font-size: 20px;">por dia.</sapn>
								<br>	
								<br>
                                <label style="font-size: 20px;" >Qual o Tipo do Serviço?</label>
									<select name="tipo_sv">
								<optgroup label="Tipos">
								<option name="tipo_sv" value="data_ultimo_sv">Interno	
								<option name="tipo_sv" value="escalado_externo">Externo Gerido Pela Om
								<option name="tipo_sv" value="missao">Missão
								<option name="tipo_sv" value="externo">Não Gerida Pela Om
								</select>
								<br></br>
		 <div style="font-size: 20px;" >Qual o escala de serviço nesse posto?</div>		
		 <input type="radio" id="PRETA" name="SERVICO" value="PRETA" required>
		 <label for="PRETA">Preta</label>
         <input type="radio" id="VERMELHA" name="SERVICO" value="VERMELHA" required>
         <label for="VERMELHA">Vermelha</label>
         <?php
         $query_sd_Grad = $conexao->prepare("SELECT * FROM graduacoes order by id_graduacao asc"); 
         $query_sd_Grad->execute(); 
         $i = 0;
          while($linha = $query_sd_Grad->fetch(PDO::FETCH_ASSOC)) {
             $Grad_Externo_ = $linha['id_graduacao'];
             $Grad_Externo = $linha['nome_graduacao'];
             $Grad_Externo_ID[$i] = $Grad_Externo_;
             $Grad_Externo_Nome[$i] = $Grad_Externo;
             $i++;
          }
          $total_de_Grad = $i;
         
         ?>
		 <br></br>
		 <div style="font-size: 20px;" >Qual graduação concorre ao serviço?</div>		
         <select name="graduacao">
								<optgroup label="graduacoes">
         <?php
         $cont = 0;
         while($cont < $total_de_Grad){
            echo '<option name="graduacao" value="'.$Grad_Externo_ID[$cont].'" >'.$Grad_Externo_Nome[$cont].'</option>';
        //    echo '<input type="radio" id="'.$Grad_Externo_Nome[$cont].'" name="graduacao" value="'.$Grad_Externo_ID[$cont].'" required>';
		//   echo '<label for="'.$Grad_Externo_Nome[$cont].'">'.$Grad_Externo_Nome[$cont].'</label> <br>';
         $cont++;
         }
                     ?>
         </select>
		 
         <br></br>
		 <div style="font-size: 20px;" >Qual os dias para o serviço?</div>		
		 <input type="checkbox" id="seg" name="dia0" value="seg-" >
		 <label for="seg">Seg</label>
         <input type="checkbox" id="Ter" name="dia1" value="Ter-" >
		 <label for="Ter">Ter</label>
         <input type="checkbox" id="qua" name="dia2" value="qua-" >
		 <label for="qua">Qua</label>
         <input type="checkbox" id="qui" name="dia3" value="qui-" >
		 <label for="qui">qui</label>
         <input type="checkbox" id="sex" name="dia4" value="sex-" >
		 <label for="sex">sex</label>
         <input type="checkbox" id="sab" name="dia5" value="sáb-" >
		 <label for="sab">sab</label>
         <input type="checkbox" id="dom-" name="dia6" value="dom-" >
		 <label for="dom">dom</label>
         <input type="checkbox" id="fer" name="dia7" value="fer-" >
		 <label for="fer">Feriados</label>
		 <br></br>
         <div style="font-size: 20px;" >Repetir a Guarnição: <input type="checkbox" value='sim' name='repitir'> Sim</div>	<br>
         <div style="font-size: 20px;" >Qual sera o dia em que o posto troca a guarnição?</div>		
		 <input type="radio" id="Trorseg" name="dia_troca" value="seg" >
		 <label for="Trorseg">seg</label>
         <input type="radio" id="Trorter" name="dia_troca" value="ter">
		 <label for="Trorter">ter</label>
         <input type="radio" id="Trorqua" name="dia_troca" value="qua">
		 <label for="Trorqua">qua</label>
         <input type="radio" id="Trorqui" name="dia_troca" value="qui">
		 <label for="Trorqui">qui</label>
         <input type="radio" id="Trorsex" name="dia_troca" value="sex">
		 <label for="Trorsex">sex</label>
         <input type="radio" id="Trorsab" name="dia_troca" value="sáb">
		 <label for="Trorsab">sab</label>
         <input type="radio" id="Trordom" name="dia_troca" value="dom" >
		 <label for="Trordom">dom</label>
         
         <br></br>
         <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ 
          $query_sd_Curso = $conexao->prepare("SELECT * FROM cursos "); 
          $query_sd_Curso->execute(); 
          $i = 0;
           while($linha = $query_sd_Curso->fetch(PDO::FETCH_ASSOC)) {
              $Curso_Externo_ = $linha['id_curso'];
              $Curso_Externo = $linha['nome_curso'];
              $Curso_Externo_ID[$i] = $Curso_Externo_;
              $Curso_Externo_Nome[$i] = $Curso_Externo;
              $i++;
           }
           $total_de_cursos = $i;
         ?>
                                <label style="font-size: 20px;" >Qual curso exclusivo para esse posto?</label>
									<select name="curso">
								<optgroup label="Tipos">
								<?php
                            $cont = 0;
                                while($cont < $total_de_cursos){
                                echo '<option name="curso" value="'.$Curso_Externo_ID[$cont].'" >'.$Curso_Externo_Nome[$cont].'</option>';
                                $cont++;
                                }
                                            ?>
								</select>
								
         <br></br>
         <div style="font-size: 20px;" >Prioridade de Antiguidade: <input type="radio" value='DESC' name='antiguidade_posto'> Moderno <input type="radio" value='ASC' name='antiguidade_posto'> Antigo</div>	<br>
         <label style="font-size: 20px;">Prioridade: </label>
			<input  type="number" name="Prioridade" placeholder="Digite a Prioridade"><br><br>
			<input class="btn btn-dblue btn-lg btn-primary" type="submit" name="submit">
		</form> 
			
            </div>
	</div>		
	
            <script src="../https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
		<script src="../https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
		<script src="../https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
		<script src="../js/personalizado.js"></script>		
            <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ } endif; ?>
    <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ if( $adm != 1): ?>

    <script>window.location = 'resumo/painel.php'</script>";

    <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ endif; ?>
