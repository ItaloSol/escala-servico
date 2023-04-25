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
    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      
<style>
  body{
    font-family: Arial, Helvetica, sans-serif;
    background-image: linear-gradient(to right, rgb(20,147,220), rgb(17,54,71));
  }
  .boxi{
    color: white;
    position: absolute;
    top:50%;
    left: 50%;
    transform: translate(-50%, -50%);
    padding: 15px;
    border-radius: 15px;
    width: 20%;
  }
  fieldset{
    border:3px solid dodgerblue;

  }
  legend{
    border: 1px solid dodgerblue;
    padding: 10px;
    text-align: center;
    background-color: dodgerblue;
    border-radius: 8px;
    
  }
  .inputBox{
    position: relative;
  }
  .inputUser{
    background: none;
    border: none;
    border-bottom: 1px solid white;
    outline: none;
    font-size: 15px;
    width: 100%;
    letter-spacing: 2px;
    }
    .labelInput1{
      position: absolute;
      top: px;
      left: 19px;
      pointer-events: none;
      transition: .5s;
    }
    .labelInput2{
      position: absolute;
      top: px;
      left: 19px;
      pointer-events: none;
      transition: .5s;
    }
    .labelInput3{
      position: absolute;
      top: 240px;
      left: 16px;
      pointer-events: none;
      transition: .5s;
    }
    .labelInput4{
      position: absolute;
      top: px;
      left: 19px;
      pointer-events: none;
      transition: .5s;
    }
    .inputUser:focus ~ .labelInput1,
    .inputUser:valid ~ .labelInput1
    {
      top: 59px;
      font-size: -12px;
      color: dodgerblue;
    }
    .inputUser:focus ~ .labelInput2,
    .inputUser:valid ~ .labelInput2
    {
      top: 115px;
      font-size: -12px;
      color: dodgerblue;
    }
    .inputUser:focus ~ .labelInput3,
    .inputUser:valid ~ .labelInput3
    {
      top: 258px;
      font-size: -12px;
      color: dodgerblue;
    }
    .inputUser:focus ~ .labelInput4,
    .inputUser:valid ~ .labelInput4
    {
      top: 311px;
      font-size: -12px;
      color: dodgerblue;
    }
    #update{
      background-image: linear-gradient(to right, rgb(20,147,220), rgb(17,54,71));
      width: 100%;
      border: none;
      padding: 15px;
      color: white;
      font-size: 15px;
      cursor: pointer;
      border-radius: 10px;
    }
    #update:hover{
      background-image: linear-gradient(to right, rgb(0,80,172), rgb(80,19,195));
    }
   
    .sair{
        background-image: linear-gradient(to right, rgb(20,147,220), rgb(17,54,71));
      width: 100%;
      position: relative;
      top: 50px;
      left: 165px;
      border: none;
      padding: 15px;
      color: white;
      font-size: 15px;
      cursor: pointer;
      border-radius: 10px;
    }
  
  
</style>
<?php
 
if(!empty($_GET['id'])){  
  include_once('../conexoes/conect.php');
  
  $id = $_GET['id'];
  
  $sqlSelect = "SELECT * FROM militares WHERE id=$id";

  $result = $conect->query($sqlSelect);

  /*print_r($result);*/
  if($result->num_rows > 0){
    
    while($user_data = mysqli_fetch_assoc($result)){
      $nome_de_guerra = $user_data['nome_de_guerra'];
      $data_ultimo_sv_red = $user_data['data_ultimo_sv_red'];
      $graduacao = $user_data['graduacao'];
      $antiguidade = $user_data['antiguidade'];
      $data_ultimo_sv = $user_data['data_ultimo_sv'];
      $servico = $user_data['servico'];
      $atividade = $user_data['atividade'];
    }
   
  }else{
    header('Location: ../editmilitargerencia.php');
  }


  
  /*
  $teste = "\n";
  echo $folga;
  echo $teste;
  echo $atividade;
  echo $teste;
  echo $antiguidade;
  echo $teste;
  echo $graduacao;
  echo $teste;
  echo $nome_de_guerra;
  echo $teste;
  echo $servico;
  echo $teste;
  echo $telefone;

  $query = $conexao->prepare("INSERT INTO militares(folga,antiguidade,nome_de_guerra,servico,telefone,graduacao,atividade) VALUES 
  ('$folga','$antiguidade','$nome_de_guerra','$servico','$telefone','$graduacao','$atividade')");
          $query->execute();                                             
*/
}
?>
</body>
 <body>
   <div class="boxi">
  
     <form action="saveeditgen.php" method="POST">
       <fildset>
         <legend><b>Editar Dados Do Militar</b></legend>
         <br>
         <div class="imputBox">
           <input type="text" style="text-transform:uppercase" name="nome_de_guerra" id="nome_de_guerra" class="inputUser" value="<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo $nome_de_guerra ?>" required>
           <label for="nome_de_guerra" class="labelInput1">Nome de guerra</label>
         </div>
        
         <p><b>Graduação:</b></p>
        
        <input type="radio" id="Soldado" name="graduacao" value="SOLDADO EV" <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo ($graduacao == 'SOLDADO EV') ? 'checked' : ''?>  required>
        <label for="Soldado">Soldado</label>
        <input type="radio" id="SOLDADO EPP" name="graduacao" value=SOLDADO EPEP" <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo ($graduacao == 'SOLDADO EP') ? 'checked' : ''?> required>
        <label for="SOLDADO EP">Soldado Ep</label>
        
        <br></br>
        <input type="radio" id="CABO" name="graduacao" value="CABO" <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo ($graduacao == 'CABO') ? 'checked' : ''?> required>
        <label for="CABO">Cabo</label>
        <input type="radio" id="SARGENTO" name="graduacao" value="SARGENTO" <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo ($graduacao == 'SARGENTO') ? 'checked' : ''?> required> 
        <label for="SARGENTO">Sargento</label>
        <br></br>
      
         <div class="imputBox">
         <label for="antiguidade"  class="labelInput3">Antiguidade</label>  
         <input type="text" style="text-transform:uppercase" name="antiguidade" id="antiguidade" class="inputUser" value="<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo $antiguidade ?>" required>
         </div>
         <br></br>
         <br></br>
           <label for="data_ultimo_sv" >Data do Ultimo Sv PRETA</label>
           <input type="date" name="data_ultimo_sv" id="data_ultimo_sv" class="inputUser" value="<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo $data_ultimo_sv ?>" >
         <br></br>
         <br></br>
           <label for="data_ultimo_sv" >Data do Ultimo Sv vermelha</label>
           <input type="date" name="data_ultimo_sv_red" id="data_ultimo_sv_red" class="inputUser" value="<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo $data_ultimo_sv_red ?>" >
         <br></br>
        
         <p><b>Servico:</b></p>
         <input type="radio" id="PRETA" name="servico" value="PRETA" <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo ($servico == 'PRETA') ? 'checked' : ''?> required>
         <label for="PRETA">Preta</label>
         <input type="radio" id="VERMELHA" name="servico" value="VERMELHA"  <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo ($servico == 'VERMELHA') ? 'checked' : ''?> required>
         <label for="VERMELHA">Vermelha</label>
         <input type="radio" id="AMBAS" name="servico" value="AMBAS" <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo ($servico == 'AMBAS') ? 'checked' : ''?> required>
         <label for="AMBAS">Ambas</label>
         <input type="radio" id="MOTORISTA" name="servico" value="MOTORISTA" <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo ($servico == 'MOTORISTA') ? 'checked' : ''?> required>
         <label for="MOTORISTA">Motorista</label>
         <br></br>
         <p><b>Status:</b></p>
         <input type="radio" id="atividade" name="atividade" value="1" <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo ($atividade == '1') ? 'checked' : ''?>  required>
         <label for="ativo">Ativo</label>
         <input type="radio" id="inativo" name="atividade" value="0" <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo ($atividade == '0') ? 'checked' : ''?> required>
         <label for="inativo">Inativo</label>
         <br></br>
         <input type="hidden" name="id" value="<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo $id ?>">
        <input type="submit" name="update" id="update">
        <div >
 
       
          <a href="editmilitargerencia.php" class="sair" id="sair" role="button">Cancelar</a>
        </div>
       </fildset>
     </form>
   </div>
 </body>
 <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ endif; ?>
    <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ if( $adm != 1): ?>

    <script>window.location = 'resumo/painel.php'</script>";

    <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ endif; ?>