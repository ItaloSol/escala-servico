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
                         
                        include_once('../conexoes/conect.php');
                       
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
                $tipo_sv = $user_data['tipo_sv'];
                $posto_graduacao = $user_data['posto_graduacao'];
                $posto_servico = $user_data['posto_servico'];
                $status_posto = $user_data['status_posto'];
                $externa = $user_data['externa'];
                $id = $user_data['id_posto'];
              }
             
            }else{
              header('Location: ../editmilitargerencia.php');
            }
    echo $externa;      
		?>
    
		<div style="margin-left: 5%;margin-top: 2%;  border: 5px solid rgba(174, 0, 255, 0.459);margin-right: 65%; " > 
		<form  style="margin-left: 5%; margin-top: 2%;" method="POST" action="proc_edit_posto.php">
		<label style="font-size: 20px;">Nome: </label>
			<input  type="text" name="nome" value="<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo $nome_posto ?>" placeholder="Digite o nome do Posto"><br><br>
      <label style="font-size: 20px;" >Serviço de Escala Extena?</label>
         <input type="radio" id="EXTERNA" name="EXTERNA" value="<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo ($externa == '1') ? 'checked' : ''?>">
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
		 <div style="font-size: 20px;" >Qual o escala de serviço nesse posto?</div>		
		 <input type="radio" id="PRETA" name="SERVICO" value="PRETA" <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo ($posto_servico == 'PRETA') ? 'checked' : ''?> required>
		 <label for="PRETA">Preta</label>
         <input type="radio" id="VERMELHA" name="SERVICO" value="VERMELHA" <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo ($posto_servico == 'VERMELHA') ? 'checked' : ''?> required>
         <label for="VERMELHA">Vermelha</label>
         <input type="radio" id="AMBAS" name="SERVICO" value="AMBAS" <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo ($posto_servico == 'AMBAS') ? 'checked' : ''?> required>
         <label for="AMBAS">Ambas</label>
		 <b>Ou</b>
		 <input type="radio" id="MOTORISTA" name="SERVICO" value="MOTORISTA" <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo ($posto_servico == 'MOTORISTA') ? 'checked' : ''?> required>
         <label for="MOTORISTA">Motorista</label><br>
		 <input type="radio" id="Sargentoe" name="SERVICO" value="SARGENTO" <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo ($posto_servico == 'SARGENTO') ? 'checked' : ''?> required>
         <label for="Sargentoe">Sargento</label>
		 <br></br>
		 <div style="font-size: 20px;" >Qual graduação concorre ao serviço?</div>		
		 <input type="radio" id="SOLDADO EV" name="graduacao" value="SOLDADO EV" <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo ($posto_graduacao == 'SOLDADO EV') ? 'checked' : ''?> required>
		 <label for="SOLDADO EV">SOLDADO EV</label>
         <input type="radio" id="SOLDADO EP" name="graduacao" value="SOLDADO EP" <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo ($posto_graduacao == 'SOLDADO EP') ? 'checked' : ''?> required>
         <label for="SOLDADO EP">SOLDADO EP</label>
         <input type="radio" id="SOLDADOS" name="graduacao" value="SOLDADOS" <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo ($posto_graduacao == 'SOLDADOS') ? 'checked' : ''?> required>
         <label for="SOLDADOS">SOLDADOS</label>
         <input type="radio" id="CABO" name="graduacao" value="CABO" <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo ($posto_graduacao == 'CABO') ? 'checked' : ''?> required>
         <label for="CABO">Cabo</label><br>
		 <input type="radio" id="SARGENTO" name="graduacao" value="SARGENTO" <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo ($posto_graduacao == 'SARGENTO') ? 'checked' : ''?> required>
         <label for="SARGENTO">Sargento</label>
		 <br></br>
		 <label style="font-size: 20px;" >Qual o Tipo do Serviço?</label>
									<select name="tipo_sv">
								<optgroup label="Tipos">
                                <option name="tipo_sv" value="<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo $tipo_sv ?>"><?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo $tipo_sv ?>
								<option name="tipo_sv" value="PLANTAO">Plantão	
								<option name="tipo_sv" value="PERMANENCIA">Permanencia
								<option name="tipo_sv" value="MOTORISTA">Motorista
								<option name="tipo_sv" value="CB_DIA">Cabo de Dia
								<option name="tipo_sv" value="SGT_DIA">Sargento de Dia
                <option name="tipo_sv" value="MISSAO">Missão
								<option name="tipo_sv" value="GURADA_OM">Guarda do Quartel
								<option name="tipo_sv" value="CMD_GUARDA">Comandante da Guarda
								<option name="tipo_sv" value="CB_GUARDA">Cabo da Guarda
								<option name="tipo_sv" value="SD_GUARDA"> SOLDADOS da Guarda/Sentinelas
								<option name="tipo_sv" value="REF_GUARDA">Reforço da Guarda
								<option name="tipo_sv" value="GAR_GUARDA">Guarda a Garagem
								
								</select>
								<br></br>
                                <input type="radio" id="status_posto" name="status_posto" value="1" <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo ($status_posto == '1') ? 'checked' : ''?> required>
		 <label for="1">Ativar</label>
         <input type="radio" id="status_posto" name="status_posto" value="0" <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo ($status_posto == '0') ? 'checked' : ''?> required>
         <label for="0">Desativar</label>
         <br></br>
                                <input type="hidden" name="id" value="<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo $id ?>">
			<input class="btn btn-dblue btn-lg btn-primary" type="submit" name="submit">
		</form> 
			
            </div>
	</div>		
	<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ 
        }
    ?>
            <script src="../https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
		<script src="../https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
		<script src="../https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
		<script src="../js/personalizado.js"></script>		
            <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ endif; ?>
    <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ if( $adm != 1): ?>

    <script>window.location = 'resumo/painel.php'</script>";

    <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ endif; ?>
