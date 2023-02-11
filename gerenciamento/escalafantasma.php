<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ 
include_once('../conexoes/conect.php');
include_once('../conexoes/conecti.php');
include_once('../acoes/conexao.php');
include_once('../conexoes/conexaoo.php');
include_once('../conexoes/conexao.php');//
// echo 'Buscar escalas<br>';


                $sql = "SELECT * FROM militares WHERE atividade = '1'";
                $sxecute = $conect->query($sql);
                $milis = 0;
                while($fire = mysqli_fetch_assoc($sxecute)){
                    $id = $fire['id'];
                    $svpreta = $fire['data_ultimo_sv'];
                    $svvermelha = $fire['data_ultimo_sv_red'];
                    $svmissao = $fire['missao'];
                    $externa = $fire['externo'];
                    $grad = $fire['graduacao'];
                    $Sv_Preta[$milis] = $svpreta;
                    $Sv_Vermelha[$milis] = $svvermelha;
                    $Graduacao[$milis] = $grad;
                    $Sv_Missao[$milis] = $svmissao;
                    $Sv_Extena[$milis] = $externa;
                    $id_mil[$milis] = $id;
                    $milis++;
                }
               // echo 'Total militares => '. $milis .'<br>';
                $sql = "SELECT * FROM posto WHERE status_posto = '1' ";
                $sxecute = $conect->query($sql);
                $Posto = 0;
                while($fire = mysqli_fetch_assoc($sxecute)){
                    $idPosto = $fire['id_posto'];
                    $tiposv = $fire['tipo_sv'];
                    $extern = $fire['externa'];
                    $psoto = $fire['nome_posto']; 
                    $gradpsoto = $fire['posto_graduacao'];
                    $externaa[$Posto] = $extern;
                    $Tipo_Sv[$Posto] = $tiposv;
                    $id_Posto[$Posto] = $idPosto;
                    $postoGrad[$Posto] = $gradpsoto;
                    $nome_psoto[$Posto] = $psoto;
                    $Posto++;
                }
                $Postos = $Posto ;
               // echo 'Total de postos => '.$Postos .'<br>';
               // print_r($nome_psoto);
                $escala = 0; $Esc_Postos = 0;
                while($escala < $milis){ 
                           // echo $escala . ' ';
                            if($Esc_Postos == $Postos){
                                $Esc_Postos = 0;
                            }
                   while($Esc_Postos < $Postos){ 
                         
                                 if($Esc_Postos > $Postos){
                                    $Esc_Postos = 0;
                                }
                               // echo '<br>Analisadno militar => '.$id_mil[$escala].' no posto => '.$id_Posto[$Esc_Postos].'<br>';
                            $sql = "SELECT * FROM `escala` WHERE fk_militar = '$id_mil[$escala]' AND fk_posto = '$id_Posto[$Esc_Postos]' ORDER BY data DESC LIMIT 1 ";
                            $sxecute = $conect->query($sql);
                            if($fire = mysqli_fetch_assoc($sxecute)){
                               
                                $data = $fire['data'];
                                $fk_militar = $fire['fk_militar'];
                                $tipoescalada = $fire['tipo'];
                                $externa = $externaa[$Esc_Postos];
                               // echo $data .' - '. $fk_militar . '<br>';
                              ////echo $Tipo_Sv[$Esc_Postos] .'<=== tipo serviço ';
                                if($Graduacao[$escala] == 'SARGENTO'){
                                    if($Tipo_Sv[$Esc_Postos] == 'SGT_DIA'){
                                        if($tipoescalada == 'PRETA'){ 
                                           // echo 'SGT Preta<br>';
                                            if($Sv_Preta[$escala] != $data){
                                               // echo 'Data diferente de PRETA<br>' ;
                                                $sqlconserto = "UPDATE militares SET data_ultimo_sv='$data' WHERE id='$id_mil[$escala]' ";
                                                $execute = $conect->query($sqlconserto);
                                            }
                                        }
                                        if($tipoescalada == 'VERMELHA'){ 
                                           // echo 'Vermelha<br>';
                                            if($Sv_Vermelha[$escala] != $data){
                                               // echo 'Data diferente de VERMELHA<br>' ;
                                                $sqlconserto = "UPDATE militares SET data_ultimo_sv_red='$data' WHERE id='$id_mil[$escala]' ";
                                                $execute = $conect->query($sqlconserto);
                                            }
                                        }
                                    }
                                }
                                    if($Graduacao[$escala] == 'CABO'){ 
                                        if($Tipo_Sv[$Esc_Postos] == 'CB_DIA'){
                                            if($tipoescalada == 'PRETA'){ 
                                               // echo 'Preta<br>';
                                                if($Sv_Preta[$escala] != $data){
                                                   // echo 'Data diferente de PRETA<br>' ;
                                                    $sqlconserto = "UPDATE militares SET data_ultimo_sv='$data' WHERE id='$id_mil[$escala]' ";
                                                    $execute = $conect->query($sqlconserto);
                                                }
                                            }
                                            if($tipoescalada == 'VERMELHA'){ 
                                               // echo 'Vermelha<br>';
                                                if($Sv_Vermelha[$escala] != $data){
                                                   // echo 'Data diferente de VERMELHA<br>' ;
                                                    $sqlconserto = "UPDATE militares SET data_ultimo_sv_red='$data' WHERE id='$id_mil[$escala]' ";
                                                    $execute = $conect->query($sqlconserto);
                                                }
                                            }
                                        }
                                    }
                                


                                    if($postoGrad[$Esc_Postos] == $Graduacao[$escala]){ 
                                        if($Tipo_Sv[$Esc_Postos] == 'MISSAO'){
                                           // echo 'Missao<br>';// echo $Sv_Missao[$escala] . ' com ' . $data . ' ';
                                            if($Sv_Missao[$escala] != $data){
                                               // echo 'Data diferente de MISSAO<br>' ;
                                                $sqlconserto = "UPDATE militares SET missao='$data' WHERE id='$id_mil[$escala]' ";
                                                $execute = $conect->query($sqlconserto);
                                            }
                                        }
                                        if($Tipo_Sv[$Esc_Postos] == 'PLANTAO'){
                                            if($tipoescalada == 'PRETA'){ 
                                               // echo 'Preta<br>';
                                                if($Sv_Preta[$escala] != $data){
                                                   // echo 'Data diferente de PRETA<br>' ;
                                                    $sqlconserto = "UPDATE militares SET data_ultimo_sv='$data' WHERE id='$id_mil[$escala]' ";
                                                    $execute = $conect->query($sqlconserto);
                                                }
                                            }
                                            if($tipoescalada == 'VERMELHA'){ 
                                               // echo 'Vermelha<br>';
                                                if($Sv_Vermelha[$escala] != $data){
                                                   // echo 'Data diferente de VERMELHA<br>' ;
                                                    $sqlconserto = "UPDATE militares SET data_ultimo_sv_red='$data' WHERE id='$id_mil[$escala]' ";
                                                    $execute = $conect->query($sqlconserto);
                                                }
                                            }
                                        }
                                        
                                        if($externa == '1'){
                                           // echo 'Externa<br>';
                                            if($Sv_Extena[$escala] != $data){
                                               // echo 'Data diferente de EXTERNA<br><hr><br>' ;
                                                $sqlconserto = "UPDATE militares SET externo='$data' WHERE id='$id_mil[$escala]' ";
                                                $execute = $conect->query($sqlconserto);
                                            }
                                        }
                                 }
                            }else{
                                if($postoGrad[$Esc_Postos] == $Graduacao[$escala]){
                                   // echo 'Não existe serviço do '. $id_mil[$escala] . ' no posto '. $id_Posto[$Esc_Postos]; 
                                    $query = $conexao->prepare("INSERT INTO `escala` (`data`, `fk_militar`, `fk_posto`, `tipo`,`substituicao`,`s1`,`s2`) VALUES ('2000-01-01', '$id_mil[$escala]',
                                    '$id_Posto[$Esc_Postos]', 'PRETA',null,0,0)");//
                                    $query->execute();
                                }
                                
                                
                            }
                            $Esc_Postos++;
                        }
                    
                  $escala++;
                }