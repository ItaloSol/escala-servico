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
<style>
  body{
    font-family: Arial, Helvetica, sans-serif;
    background-image: linear-gradient(to right, rgb(128 0 0), rgb(180 255 0));
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
      top: px;
      left: 19px;
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
  
  $sqlSelect = "SELECT * FROM impedimentos i INNER JOIN militares m ON  i.fk_militares = m.id WHERE i.impedimento_id=$id";

  $result = $conect->query($sqlSelect);

 /* print_r($result);*/
  if($result->num_rows > 0){
    
    while($user_data = mysqli_fetch_assoc($result)){
      $id = $user_data['impedimento_id'];
      $militar = $user_data['nome_de_guerra'];
      $motivo = $user_data['motivo'];
      $fk_militar = $user_data['fk_militares'];
      $data_inicio = $user_data['data_inicio'];
      $data_final = $user_data['data_final'];
      $graduacao =  $user_data['graduacao'];
      $semana =  $user_data['semana'];
    $atividade = $user_data['atividade'];
   // echo $graduacao;
    }
      
       
  }else{
    header('Location: impedimento.php');
  }
}

   /* 
    while($user_data = mysqli_fetch_assoc($resulti)){
      $milita = $militar;
      $atividade = $user_data['atividade'];
      $servio = $user_data['servico'];
      $folga = $user_data['folga'];
    }
  
*/
?>
 <?php
                          
                            ?>
</body>
 <body>
   <div class="boxi">
     <form action="saveeditimp.php" method="POST">
       <fildset>
         <legend><b>Editar Impedimento Do Militar</b></legend>
         <br>
         <div class="imputBox">
         <input type="text" style="text-transform:uppercase" name="militar" id="militar" class="inputUser" value="<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo $militar ?>" required>
           <label for="militar" class="labelInput1" >Militar</label>  </div>
         <br></br>
         <div class="imputBox">
         <input type="text" style="text-transform:uppercase" name="motivo" id="motivo" class="inputUser" value="<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo $motivo ?>" required>
           <label for="motivo" class="labelInput4" ></label>
         </div>
         <br></br>
         <div class="imputBox">
         <input type="RADIO" id="VERMELHA"value="VERMELHA" name="tiposv"  required <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo ($semana == 'VERMELHA') ? 'checked' : ''?>><label for="VERMELHA">VERMELHA</label>
         <input type="RADIO" id="PRETA" value="PRETA" name="tiposv"  required <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo ($semana == 'PRETA') ? 'checked' : ''?> > <label for="PRETA">PRETA</label>
         <input type="RADIO" id="AMBAS" value="AMBAS" name="tiposv"  required <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo ($semana == 'AMBAS') ? 'checked' : ''?> > <label for="AMBAS">AMBAS</label>
         </div>
         <br></br>
         <div class="imputBox">
               </div>
         <br></br>
         <div class="imputBox">
           <input type="date" name="data_inicio" id="data_inicio" class="inputUser" value="<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo $data_inicio ?>" required>
           <label for="data_inicio" class="labelInput1"></label>
         </div>
         <input type="hidden" name="militar" id="militar" class="inputUser" value="<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo $militar ?>">
         <input type="hidden" name="graduacao" id="graduacao" class="inputUser" value="<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo $graduacao ?>">
         <br></br>
         <div class="imputBox">
           <input type="date" name="data_final" id="data_final" class="inputUser" value="<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo $data_final ?>" required>
           <label for="data_final" class="labelInput4" ></label>
         </div>
         <input type="hidden" name="fk_militar" value="<?= $fk_militar ?>">
                <br></br>
        
      
        
         <input type="hidden" name="id" value="<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo $id ?>">
        <input type="submit" name="update" id="update">
        <div >
          <a href="impedimento.php" class="sair" id="sair" role="button">Sair</a>
        </div>
       </fildset>
     </form>
   </div>
 </body>
 <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ endif; ?>
    <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ if( $adm != 1): ?>

    <script>window.location = '../resumo/painel.php'</script>";

    <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ endif; ?>