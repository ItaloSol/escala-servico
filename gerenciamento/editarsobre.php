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
	<title>Mudar sobreaviso</title>	   <div class="row">
                                
                                <div class="search hidden-xs hidden-sm">
                                </div>
                            </div>
                            
                                   

                            <h2>Mudar sobreaviso<h2>
                          <div>
						  <li>
                                    <a href="sobreaviso.php" class="icon-info"><button class="btn btn-dblue btn-lg btn-danger" role="button" class="submit">Cancelar</button></a>
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
            $sqlSelect = "SELECT * FROM previsao WHERE id_previsao = $id";
          
            $result = $conect->query($sqlSelect);
          
            /*print_r($result);*/
            if($result->num_rows > 0){
              
              while($user_data = mysqli_fetch_assoc($result)){
                $nome_posto = $user_data['motivo'];
                $qtd_mil = $user_data['qtd_prevista'];
                $qtd_mil = explode("0",$qtd_mil);
               
              }
             
            }else{
              header('Location: ../editmilitargerencia.php');
            }
          // print_r($qtd_mil);
		?>
		<div style="margin-left: 5%;margin-top: 2%;  border: 5px solid rgba(174, 0, 255, 0.459);margin-right: 65%; " > 
		<form  style="margin-left: 5%; margin-top: 2%;" method="POST" action="proc_edit_sobre.php">
			<label style="font-size: 20px;" >Quantos Sargentos de sobreaviso? </label>
									<select name="qtd_sgt">
								<optgroup label="Quantidade">
                <option name="qtd_sgt" value="<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo $qtd_mil[0] ?>"><?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo $qtd_mil[0] ?>	
								<option name="qtd_sgt" value="3">3
                <option name="qtd_sgt" value="5">5
								<option name="qtd_sgt" value="11">11
								<option name="qtd_sgt" value="15">15
								<option name="qtd_sgt" value="21">21
								<option name="qtd_sgt" value="26">26 
				
								</select> <sapn style="font-size: 20px;"></sapn>
								<br>	
                <label style="font-size: 20px;" >Quantos Cabos de sobreaviso? </label>
									<select name="qtd_cabo">
								<optgroup label="Quantidade">
                <option name="qtd_sgt" value="0<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo $qtd_mil[1] ?>"><?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo $qtd_mil[1] ?>	
								<option name="qtd_sgt" value="03">3
                <option name="qtd_cabo" value="05">5
								<option name="qtd_cabo" value="011">11
								<option name="qtd_cabo" value="015">15
								<option name="qtd_cabo" value="021">21
								<option name="qtd_cabo" value="026">26 
								
								</select> <sapn style="font-size: 20px;"></sapn>
								<br>	
                <label style="font-size: 20px;" >Quantos Motoristas de sobreaviso? </label>
									<select name="qtd_mot">
								<optgroup label="Quantidade">
                <option name="qtd_sgt" value="0<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo $qtd_mil[2] ?>"><?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo $qtd_mil[2] ?>	
								<option name="qtd_sgt" value="03">3
                <option name="qtd_mot" value="05">5
								<option name="qtd_mot" value="011">11
								<option name="qtd_mot" value="015">15
								<option name="qtd_mot" value="021">21
								<option name="qtd_mot" value="026">26 
							
								</select> <sapn style="font-size: 20px;"></sapn>
								<br>	
                <label style="font-size: 20px;" >Quantos Soldados de sobreaviso? </label>
									<select name="qtd_soldados">
								<optgroup label="Quantidade">
                <option name="qtd_sgt" value="0<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo $qtd_mil[3] ?>"><?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo $qtd_mil[3] ?>	
								<option name="qtd_sgt" value="03">3
                <option name="qtd_soldados" value="05">5
								<option name="qtd_soldados" value="011">11
								<option name="qtd_soldados" value="015">15
								<option name="qtd_soldados" value="021">21
								<option name="qtd_soldados" value="026">26 
							
								</select> <sapn style="font-size: 20px;"></sapn>
								<br>	
                <label style="font-size: 20px;" >Quantos sobreaviso de Missão? </label>
									<select name="qtd_Missao">
								<optgroup label="Quantidade">
                <option name="qtd_Missao" value="0<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo $qtd_mil[3] ?>"><?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo $qtd_mil[4] ?>	
								<option name="qtd_Missao" value="03">3
                <option name="qtd_Missao" value="05">5
								<option name="qtd_Missao" value="011">11
								<option name="qtd_Missao" value="015">15
								<option name="qtd_Missao" value="021">21
								<option name="qtd_Missao" value="026">26 
							
								</select> <sapn style="font-size: 20px;"></sapn>
								<br>	
								<br>
		 
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
