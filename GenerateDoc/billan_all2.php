<?php
include('config.php');
                        if (isset($_GET['action'])) {


          switch ($_GET['action']) {
            case 'filiere':
              $La_filisre = $_GET['filiere'];
              $sql12 = "SELECT * FROM matiere WHERE classe ='".$La_filisre."';";
              break;

            case 'matiere':
              $sql12 = "SELECT * FROM matiere WHERE id ='".$_GET['matiere']."';";


                $req00=$BDD->prepare($sql12);
                          $req00->execute();
                          $data00=$req00->fetch();

                  $La_filisre = $data00['classe'];     

              break;
              
            default:
              # code...
              break;
          }
                          if ((isset($La_filisre) || isset($_GET['matiere']))&&isset($_GET['annee'])&&isset($_GET['session'])) {

                          $req5=$BDD->prepare($sql12);
                          $req5->execute();
                          

                          $req7=$BDD->prepare('select * from sesion where id ='.$_GET['session'].';');
                          $req7->execute();
                          $data7=$req7->fetch();

				if(isset($La_filisre)){
				$req8=$BDD->prepare('select * from filiere where id ='.$La_filisre.';');
                          $req8->execute();
                          $data8=$req8->fetch();
                          
                          $filiere = $La_filisre;
				
				}
				
				else {
					if(isset($_GET['matiere'])){
				$reqi=$BDD->prepare('select * from matiere where id ='.$_GET['matiere'].';');
                          $reqi->execute();
                          $datai=$reqi->fetch();
                          
                          $req8=$BDD->prepare('select * from filiere where id ='.$datai['classe'].';');
                          $req8->execute();
                          $data8=$req8->fetch();
                          $filiere = $datai['classe'];
                          
                         
				
				}}
                          


                          
                         
                          
                          

   
 ob_start(); 
 
?>
<page backtop="150mm" backbottom="80mm" backleft="20mm" backright="2mm" orientation="L" format="1200x1000" >
<link rel="stylesheet" type="text/css" href="../css/style.css">
   <style type="text/css">
   
   }
.fact td{
height:5px;
border:2px solid black;
padding: 3px;
}
.note td{
  padding: 5px;
  text-align: center;
}
.fact {
  border:2px solid black;
  border-collapse: collapse;
  font-weight: normal;
}
.aside {
  display:table-cell;
  vertical-align:middle;
  padding:0;
}
   </style>
<page_header> 
             <div style="width:100%;"><br>
      <img src="../img/ifcad.png" style="width:500px;height:150px;margin-left:1800px">
    </div>
<b style="margin-left:800px;text-align:center;font-size:60px;"><br>Institut de Formation de Cadres
Pour le Développement
<br>Avenue Legrand, 57-59 - 1050 Bruxelles - Belgique<br>
Tél. 32/2/640.88.83. - Télécopieur : 32/2/649.41.09.

</b><br><br>    </page_header> 
        <page_footer> 

        <table style="font-size:60px;margin-left: 800px">
                      <tr style='width:100%'>
                        <td  style="float:left;width:70%">Fait à Bruxelles, le <?php
date_default_timezone_set('Europe/Paris');
// --- La setlocale() fonctionnne pour strftime mais pas pour DateTime->format()
setlocale(LC_TIME, 'fr_FR.utf8','fra');// OK
// strftime("jourEnLettres jour moisEnLettres annee") de la date courante
echo strftime("%A %d %B %Y");
?> </td><td style="float:right;width:30%;text-align:left">Michel LEGRAND,<br>Administrateur délégué.
</td>
                      </tr>


                      


                    </table><br><br><br><br><br><br><br><br>

             
        </page_footer>

    <b style="font-weight:bold;font-size:70px;margin-left:1500px;">BILAN DE FORMATION <?php echo $_GET['annee'];?> </b><br>

    <b style="font-weight:bold;font-size:70px;margin-left:1500px;"><?php echo $data8['designation'] . "(".utf8_decode($data8['cycle']).")";?> </b><br>

                     

<br><br><br><br><br><br><br><br><br><br><br><br>
<table style="width:100%;height:auto;margin-left: 100px" border="2" class="note">

<tr><td style="width:300px;font-size:55px"><?php 
echo utf8_encode($data8['cycle']);?>
  <br>session de <?php echo utf8_decode($data7['nom']); ?>
</td>
                  <?php

                  while ($data5=$req5->fetch()) {
                  
                  if(strcmp(utf8_decode($data5['nom']),"MÉMOIRE") == 0){}
                  else{
                  
                    ?>
                    
                    <td style="width:100px;margin-left:50px;font-size:28px;font-weight: bold;"><b><?php echo utf8_decode($data5['code']) ?></b></td>

                    <?php
                  }}
                  ?>
                  <td style="width:80px;margin-left:50px;font-size:42px">Total</td>
                  <td style="width:80px;margin-left:50px;font-size:42px">Total %</td>
                  <td style="width:60px;margin-left:50px;font-size:42px">Mention</td>
                  </tr>
                  <tr><td style="width:60px;margin-left:50px;font-size:55px" >Quota(s)</td>
                  <?php $req=$BDD->prepare($sql12);
                                  $req->execute();
                                  $qota_t=0;
                                  while($data=$req->fetch()){
                                  if(strcmp(utf8_decode($data['nom']),"MÉMOIRE") == 0){}
                  			else{
                                  $qota_t= $qota_t + $data['quota'];
                                  
                                  ?>
                                  <td style="width:60px;margin-left:50px;font-size:42px" >/<?php echo $data['quota']; ?></td>
                                  <?php
                                  }}
				                                  
                                     ?>
                                     <td style="font-size:42px"><?php echo $qota_t ?></td><td style="font-size:42px">100</td><td></td>
                                     </tr>
                  <?php
                  
                    $req1=$BDD->prepare('SELECT etudiant.*, SUM(note.note) AS note FROM etudiant,note WHERE `etudiant`.`filiere`='.$La_filisre.' and note.etudiant=etudiant.id  and etudiant.id not in (1,5,47,49,70,79,80,34,75,27,76,74,4,69,36,65,29,67,51,43,54)GROUP BY etudiant.id ORDER BY SUM(note.note) desc');
                          $req1->execute();
                          while ($data1=$req1->fetch()) { 
                          $total = 0; 
                            ?>
                            <tr>
                              <td style="font-size:55px;height: 200px;width: 300px"><?php echo utf8_decode($data1['nom'])." ".utf8_decode($data1['prenom']); 
                                $req6=$BDD->prepare($sql12);
                                  $req6->execute();  
                              ?></td>
                             <?php 
                             while ($data6=$req6->fetch()) { 
                             if(strcmp(utf8_decode($data6['nom']),"MÉMOIRE") == 0){}
                  else{
                                ?>
                                <td style="font-size:50px">
                                  <?php 
                                  $moitier = ($data6['quota']/2);

$req9=$BDD->prepare('SELECT * FROM `note` WHERE `etudiant` = '.$data1['id'].' and `matiere`= '.$data6['id'].' and (`sesion` = '.$_GET['session'].' OR `note` >'.$moitier.')');
                          $req9->execute();
                          $data9=$req9->fetch();
                          $total = $total +$data9['note'];
                          	
                              

if (isset($data9['sesion'])) {
                          		
                         if($data9['note'] < $moitier){

                              		$req19=$BDD->prepare('SELECT * FROM `sesion` WHERE `id`= '.$data9['sesion'].'');
                          $req19->execute();
                          $data19=$req19->fetch();

                              	if ($data1['annee'] != $data19['annee']) {
                              		echo "<b><font style='font-size:46px'>".$data9['note']." "."</font></b>D";}


                              	
                              	else {echo "<b><font style='font-size:49px'>".$data9['note']." "."</font></b>";}

                              }
                                else{

                                		$req19=$BDD->prepare('SELECT * FROM `sesion` WHERE `id`= '.$data9['sesion'].'');
                          $req19->execute();
                          $data19=$req19->fetch();

                              	if ($data1['annee'] != $data19['annee']) {
                              		echo $data9['note']." D";}


                              	
                              	else {echo $data9['note'];}
                                }

                          	}

                          	else{

                          	echo "#";
                             

                          	}


                                   ?>
                          	
                                </td>
                                <?php
                             }}
                              ?>
                              <td style="font-size:42px"><?php echo $total; ?></td>
                              <td style="font-size:42px"><?php if($qota_t != 0){echo number_format(($total/$qota_t)*100,2);} ?>%</td>
                              <td style="font-size:50px">
                              <?php   
                              $sqll = "SELECT * FROM `mention` WHERE id = ".$data1['mention_finale'].";";
                              $req15=$BDD->prepare($sqll);
                              $req15->execute();
                              $data15=$req15->fetch(); 
                              
                              echo ($data15['nom']);?>
                              </td>
				
                              </tr>

                            <?php

                              
                        }
                      }
                         

                  ?>

              </table>

       

                    <table class="fact" style="width:700px;">
                      
                       

                    </table>
                    
         

                    
    </page>

    <?php 
        $content = ob_get_clean();
        ob_end_clean(); 
        require_once('../res/html2pdf/html2pdf.class.php'); 
        $pdf = new HTML2PDF('L','780x750','fr'); 
        $pdf->writeHTML($content); 
        $pdf->Output("billan_general.pdf"); 
   ?>

</html>



<?php





                          

                            
                }
                      
                      ?>



