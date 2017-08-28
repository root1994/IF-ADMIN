<?php
include('config.php');
                        if (isset($_GET['matricule'])&&isset($_GET['annee'])&&isset($_GET['session'])) {

                          $req5=$BDD->prepare('select * from etudiant where matricule ="'.$_GET['matricule'].'";');
                          $req5->execute();  
                          $data5=$req5->fetch();
                          
                          $total_quota = 0;
                          $note_total = 0;


                          $sql3 = 'select * from filiere where id ='.$data5['filiere'].'';
                          $req6=$BDD->prepare($sql3);
                          $req6->execute();  
                          $data6=$req6->fetch();


                          $sql8 = 'select * from sesion where id ='.$_GET['session'].'';
                          $req=$BDD->prepare($sql8);
                          $req->execute();  
                          $data=$req->fetch();

   
 ob_start(); 
?>
<page backtop="60mm" backbottom="2mm" backleft="5mm" backright="5mm" >
<link rel="stylesheet" type="text/css" href="../css/style.css">
   <style type="text/css">
   
   }
.fact td{
height:5px;
border:2px solid black;
padding: 3px;
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
.aside p {
  display:table;/* so it takes width of text */
  text-indent:1em;
  white-space:nowrap;
  transform:rotate(90deg) translate( -50%,0);
  transform-origin:0.6em center;
}
   </style>
<page_header> 
             <div style="width:100%;">
      <img src="../img/ifcad.png" style="width:130px;height:70px;margin-left:330px">
    </div>
<b style="margin-left:250px;text-align:center;font-size:10px;">Institut de Formation de Cadres
Pour le Développement
<br>
Avenue Legrand, 57-59 - 1050 Bruxelles - Belgique<br>
Tél. 32/2/640.88.83. - Télécopieur : 32/2/649.41.09.
</b><br><br>

    <b style="font-weight:bold;font-size:20px;margin-left:220px;">BILAN DE FORMATION <?php echo $_GET['annee'];?> </b><br>

                    <b style='margin-left:320px;'>N°BF/<?php  echo $data6['cycle']; ?>/<?php  echo substr($data5['annee'], -4); ?></b><br>

<br>
              <table style="width:700px;">
                <tr style="width:100%;"><td style="width:60%;padding-left:6mm">Nom : <b><?php  echo $data5['nom']; ?></b></td><td style="width:40%;">Date de naissance :<b> <?php  echo utf8_decode($data5['daten']); ?></b></td></tr>
                <tr><td style='padding-left:6mm'>Prénom :<b> <?php  echo utf8_decode($data5['prenom']);  ?></b></td><td>Nationalité : <b><?php  echo utf8_decode($data5['nation']); ?></b></td></tr>
                


              </table>

        </page_header> 
        <page_footer> 
             
        </page_footer> 

                    <table class="fact" style="width:700px;">
                      
                        <tr style="height: 20px">
                          <td colspan='3' style="width:100%;text-align:center;"><?php  echo $data6['designation']; ?>(<?php echo $data6['cycle']; ?>)<br>session de <?php  echo utf8_decode($data['nom']); ?></td></tr>

                          <tr style="background:black;color:#FFF;text-align:center"><td style="width:50%;border-right:2px solid #FFF">Matière</td>
                            <td style="width:25%">Note</td><td style='width:15%'></td>
                            </tr>

                            <?php
                          $req9=$BDD->prepare("SELECT * FROM matiere WHERE classe =".$data5['filiere']." ORDER BY `matiere`.`nom`");
                          $req9->execute();  
                          while ( $data9=$req9->fetch()) {

                          $sql12 = 'SELECT * FROM note WHERE matiere ='.$data9['id'].' and etudiant= '.$data5['id'].'';
                          $req12=$BDD->prepare($sql12);
                          $req12->execute();
                          $data12=$req12->fetch() ;

                            
                            if (strcmp(utf8_decode($data9['nom']),"MÉMOIRE") == 0) {

                              if (isset($data12['note']) && $data12['note']!=0) {
                                ?>

                                  <tr><td style="height:0.5mm"><?php echo utf8_decode($data9['nom']); ?></td>
                                
                                <td> <?php if($data12['note'] < ($data9['quota'])/2){echo "<b><font style='font-size:16px'>".$data12['note']."</font></b>";}
                                else{echo $data12['note'];} ?> </td>
                                <td style="height:0.5mm">/ <?php echo $data9['quota']; ?></td>

                              </tr>

                                <?php
                              }

                              else{

                              }
                              # code...
                            }

                            else{
                              ?>
                                <tr><td style="height:0.5mm"><?php echo utf8_decode($data9['nom']); ?></td>
                                
                                <td> <?php 

                                if($data12['note'] < ($data9['quota'])/2){echo "<b><font style='font-size:16px'>".$data12['note']."</font></b>";}
                                else{echo $data12['note'];}


                                 ?> </td>
                                <td style="height:0.5mm">/ <?php echo $data9['quota']; ?></td>

                              </tr>

                              <?php
                            }
                             ?>
                              

                             <?php
                            }  

                            ?>
                            <tr style="border: 2px solid black"><td style="height:4mm;font-weight:bold;font-size:19px">Total</td><td>
                            <?php
                            $req9->execute();
                            while ( $data9=$req9->fetch()) {
                             
                            
                              
                            $sql1 = 'select * from note where matiere ='.$data9['id'].' and etudiant= '.$data5['id'].'';
                            
                          $req13=$BDD->prepare($sql1);
                          $req13->execute();
                          $data13=$req13->fetch();
                          
                          if (strcmp(utf8_decode($data9['nom']),"MÉMOIRE") == 0) {

                              if (isset($data13['note'])&& $data13['note']!=0) {
                          
                          		$note_total= $note_total + $data13['note'];
                          
                          
                          
                            		$total_quota =$total_quota+ $data9['quota'];
                            
                            		}
                           	 else{
                            
                           		 }}
                            else{
                            
                             $note_total= $note_total + $data13['note'];
                          
                          
                          
                            $total_quota =$total_quota+ $data9['quota'];
                            
                            }
                            
                            }
                            
                            echo $note_total;
                            
                            ?>
                            </td><td>/<?php echo $total_quota;?></td></tr>
                            <tr style="border: 2px solid black"><td style="height:4mm;font-weight:bold;font-size:19px">Total en %</td><td><?php echo  number_format(($note_total/$total_quota)*100,2);  ?>%</td>
                            <td><?php echo  number_format(($total_quota/$total_quota)*100,0);  ?>%</td></tr>
                            <tr style="border: 2px solid black"><td  style="height:4mm;font-weight:bold;font-size:19px">Mention</td><td colspan="2">
                            
                            <?php  
                            $req15=$BDD->prepare("SELECT * FROM `mention` WHERE id = ".utf8_decode($data5['mention_finale']).";");
                              $req15->execute();
                              $data41=$req15->fetch();
                            
                            echo ($data41['nom']); ?>
                            </td></tr>

                    </table>

                    <br><br>
                    <table style="width:700px;">
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


                      


                    </table>
         

                    
    </page>

    <?php 
        $content = ob_get_clean();
        ob_end_clean(); 
        require_once('../res/html2pdf/html2pdf.class.php'); 
        $pdf = new HTML2PDF('P','A4','fr'); 
        $pdf->writeHTML($content); 
        $pdf->Output("billan.pdf"); 
   ?>

</html>



<?php





                          

                            
                }
                      
                      ?>



