<?php
include('config.php');
                        if (isset($_GET['filiere'])&&isset($_GET['annee'])) {

                        if ($_GET['filiere'] == '0') {
                          
                            $filtre = "annee = '".$_GET['annee']."'";
                            }

                          else{

                              $sql2 = 'select * from filiere where id='.$_GET['filiere'].'';
                            $req5=$BDD->prepare($sql2);
                          $req5->execute();  
                          $data5=$req5->fetch();

                          
                            $filtre = "filiere =".$_GET['filiere']." and annee = '".$_GET['annee']."'";
                          
                        }

                        $sql = 'select * from etudiant where '.$filtre.'';



                          
                          $req3=$BDD->prepare($sql);
                          $req3->execute();
                          
   
 ob_start(); 
?>
<page backtop="35mm" backbottom="40mm" backleft="1mm" backright="6mm" class="conteneurpdf">
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
  font-weight: bold;
}
   </style>
<page_header> 
             <div style="background:black;width:100%;">
      <img src="../img/ifcad.gif" style="margin:none;">
    </div>

        </page_header> 
        <page_footer> 
             <div class="col-lg-12 col-sm-12 col-xs-12 " style="background:black">

      <img src="../img/back.jpeg" style="margin:5px; width:90px;height:90px;float:right;">

  
  
    </div>
        </page_footer> 


    <table style='width:100%;'>
    <tr>
      <td style='width: 30%;'><div class="info"> Année Académique: <?php echo $_GET['annee']; ?></div></td>
      <td style='width: 30%;text-align: center;'><div class="info"></div></td>
      <td style='width: 30%;text-align: center;'> </td>
    </tr>
    </table><br><br>

      <b style="font-weight:bold;font-size:20px;margin-left:250px;">Liste Des &Eacute;tudiants <?php if ($_GET['filiere'] != "0") {
        echo " (".$data5['cycle'].")";
      }  ?></b><br><br><br>
         
          <table style="text-align:center;width:90%;" class="fact">
          <tr style="width:100%;font-size:18px;border:1px solid">
            <td style="width:15%">Matricule</td>
            <td style="width:35%">Nom(s) et prénom(s)</td>
            <td style="width:35%">Date et lieu de naissance</td>
            <td style="width:10%">filière</td>
          </tr>
            <?php
            while($data3=$req3->fetch()){ 
              $sql1 = 'select * from filiere where id='.$data3['filiere'].'';



                          
                          $req4=$BDD->prepare($sql1);
                          $req4->execute();  
                          $data4=$req4->fetch()
            ?>
              <tr>
                  <td><?php  echo $data3['matricule']; ?></td>
                  <td><?php  echo utf8_decode($data3['nom']." ".  $data3['prenom']); ?></td>
                  <td><?php  echo utf8_decode($data3['daten'])." à ".utf8_decode($data3['lieun'])."(".utf8_decode($data3['paysn']).")"; ?></td>
                  <td><?php  echo $data4['cycle']; ?></td>
              </tr> 
              <?php

                                  }

              ?>
              </table><br><br>
              <table style="width:700px;">
                      <tr style='width:100%'>
                        <td  style="float:left;width:75%">Fait à Bruxelles le, <?php
date_default_timezone_set('Europe/Paris');
// --- La setlocale() fonctionnne pour strftime mais pas pour DateTime->format()
setlocale(LC_TIME, 'fr_FR.utf8','fra');// OK
// strftime("jourEnLettres jour moisEnLettres annee") de la date courante
echo strftime("%A %d %B %Y");
?> </td><td style="float:right;width:25%;text-align:left">Michel LEGRAND,</td></tr><tr><td></td><td style="float:right;width:20%;text-align:left">
                                                           Administrateur délégué.
</td>
                      </tr>


                      


                    </table>
         
   

   
     


<?php }; ?>

    </page>

    <?php 
        $content = ob_get_clean();
        ob_end_clean(); 
        require_once('../templates/html2pdf/html2pdf.class.php'); 
        $pdf = new HTML2PDF('P','A4','fr'); 
        $pdf->writeHTML($content); 
        $pdf->Output("FACTURE.pdf"); 
   ?>

</html>









                          

                            
                }
                      
                      ?>

