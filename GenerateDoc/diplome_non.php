<?php
include('config.php');
                        if (isset($_GET['matricule'])&&isset($_GET['annee'])) {

                          $req5=$BDD->prepare('select * from etudiant where matricule ="'.$_GET['matricule'].'" and annee = "'.$_GET['annee'].'"');
                          $req5->execute();  
                          $data5=$req5->fetch();

                          $sql2 = 'select * from filiere where id='.$data5['filiere'].'';
                          $req4=$BDD->prepare($sql2);
                          $req4->execute();  
                          $data6=$req4->fetch();

                          $sql4 = 'select * from mention where id='.$data5['mention_finale'].'';
                          $req2=$BDD->prepare($sql4);
                          $req2->execute();  
                          $data2=$req2->fetch();
   
 ob_start(); 
?>
<page backtop="60mm" backbottom="5mm" backleft="10mm" backright="10mm" orientation="paysage" >
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
<br>
             <div style="width:100%;">
      <img src="../img/ifcad.png" style="width:130px;height:80px;margin-left:500px">
    </div>
    <p style="margin-left:480px">Ecole associée de l'Unesco</p>
<b style="margin-left:280px;text-align:center;font-size:22px;">Institut de Formation de Cadres
Pour le Développement</b>
<br>
<b style="margin-left:270px;text-align:center;font-size:22px;">DIPLÔME DE  MAITRISE EN ADMINISTRATION PUBLIQUE</b>

<p style="margin-left:70px;text-align:center;font-size:22px;"><?php echo substr($data5['annee'], 0, 4) ." - ". substr($data5['annee'], -4) ; ?></p><br>
        </page_header> 
        <page_footer>
    
        </page_footer> 

                    <p style='line-height:23px;'>
                      Nous, Président et Membres du Jury, chargés par le Conseil d'Administration de l'Institut de Formation de Cadres pour le Développement, sis à Bruxelles (Belgique), de conférer le DIPLÔME de <i><?php if($data6['id'] == "3"){echo "de Maitrise en Projets";}elseif($data6['id'] == "4"){echo "MAITRISE EN ADMINISTRATION PUBLIQUE";} ?></i>,<br> 

                        Vu le règlement organique établi pour la délivrance du diplôme à l'<b>IFCAD</b>,<br>
Attendu que <?php  echo $data5['civilite'];  ?> <b><?php  echo $data5['nom'].' '.$data5['prenom'] ; ?></b>, né(e) à  <?php echo $data5['lieun']; ?> (<?php echo $data5['paysn'] ?>), le <?php echo $data5['daten']; ?>,<br>
est porteur (se) du diplôme de <?php echo $data5['diplome'] ?> de <?php echo $data5['paysd'] ?>,<br>
délivré le <?php echo $data5['dated'] ?>,<br>
<b>Considérant l’arrêté ministériel du 26 mai 2015 nommant la précitée au grade d’administrateur des SAF, (Services administratifs et financiers),</b><br>
Attendu que l'enseignement suivi a une durée d'<b>un an</b>, représentant <b>605</b> heures de cours et séminaires ci-après :
<p style="font-size:10px;"><i>
Analyse financière de projets ; analyse économique de projets ; conception et formulation de projets ; gestion des ressources humaines ; assurances ; géographie économique ; droits de l’homme ; transports ; anglais ; relations internationales ; économie politique ; démographie ; développement durable et gestion de l’environnement ; management  ; informatique ; aménagement du territoire ; internet ; gestion d’entreprises ; comptabilité des sociétés ; analyse et lecture de bilan ;banque ; microfinance ;</i></p>
Attendu qu'il/elle  a réussi avec <?php echo $data5['pourcentage'] ?> % des points les examens portant sur l'ensemble du programme,
lui délivrons le présent diplôme avec la mention <b><?php echo $data2['nom'] ?></b>.



                    </p>

<table style="width:1000px;"><tr style='width:100%'>
    <td style='width:30%'>L'ADMINISTRATEUR DELEGUE,</td>          <td style='width:30%'>LE(LA) SECRETAIRE DU JURY,</td>   <td style='width:40%'>LE PRESIDENT DU JURY ET DIRECTEUR DE LA FORMATION,
</td></tr></table><br><br><br><br><br>

                    <table style="width:1000px;">
                      <tr style='width:100%'>
                        <td  style="float:left;width:50%">Fait à Bruxelles le, <?php
date_default_timezone_set('Europe/Paris');
// --- La setlocale() fonctionnne pour strftime mais pas pour DateTime->format()
setlocale(LC_TIME, 'fr_FR.utf8','fra');// OK
// strftime("jourEnLettres jour moisEnLettres annee") de la date courante
echo strftime("%A %d %B %Y");
?> </td><td style="float:right;width:50%;text-align:right">Michel LEGRAND,<br>
                                                                  Administrateur délégué.
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
        $pdf->Output("FACTURE.pdf"); 
   ?>

</html>



<?php





                          

                            
                }
                      
                      ?>



<?php
include('config.php');
                        if (isset($_GET['matricule'])&&isset($_GET['annee'])&&isset($_GET['session'])) {

                          $req5=$BDD->prepare('select * from etudiant where matricule ="'.$_GET['matricule'].'" and annee = "'.$_GET['annee'].'"');
                          $req5->execute();  
                          $data5=$req5->fetch();


                          $sql3 = 'select * from filiere where id='.$data5['filiere'].'';
                          $req6=$BDD->prepare($sql3);
                          $req6->execute();  
                          $data6=$req6->fetch();


                          $sql8 = 'select * from sesion where id='.$_GET['session'].'';
                          $req=$BDD->prepare($sql8);
                          $req->execute();  
                          $data=$req->fetch();

   
 ob_start(); 
?>
<page backtop="100mm" backbottom="20mm" backleft="3mm" backright="5mm" >
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
      <img src="../img/ifcad.png" style="width:130px;height:80px;margin-left:300px">
    </div>
<br>
<b style="margin-left:200px;text-align:center">Institut de Formation de Cadres
Pour le Développement
<br>
Avenue Legrand, 57-59 - 1050 Bruxelles - Belgique<br>
Tél. 32/2/640.88.83. - Télécopieur : 32/2/649.41.09.
</b><br><br><br>

    <b style="font-weight:bold;font-size:20px;margin-left:220px;">BILAN DE FORMATION <?php echo $_GET['annee'];?> </b><br><br>

                    <b style='margin-left:320px;'>N°BF/<?php  echo $data6['cycle']; ?>/<?php  echo substr($data5['annee'], -4); ?></b><br>

<br><br><br>
              <table>
                <tr><td>Nom : <?php  echo $data5['nom']; ?></td></tr>
                <tr><td>Prénom : <?php  echo $data5['prenom']; ?></td></tr>
                <tr><td>Date de naissance : <?php  echo $data5['daten']; ?></td></tr>
                <tr><td>Nationalité : <?php  echo $data5['nation']; ?></td></tr>


              </table>

        </page_header> 
        <page_footer> 
             <div class="col-lg-12 col-sm-12 col-xs-12 " style="background:black">

      <img src="../img/back.jpeg" style="margin:5px; width:50px;height:50px;float:right;">

  
  
    </div>
    [[page_cu]]/[[page_nb]]
        </page_footer> 

                    <table class="fact" style="width:700px;">
                      
                        <tr>
                          <td colspan='2' style="width:100%;text-align:center;"><?php  echo $data6['cycle']; ?><br>session de <?php  echo $data['nom']; ?></td></tr>

                          <tr style="background:black;color:#FFF;text-align:center"><td style="width:50%;border-right:2px solid #FFF">Matiere</td>
                            <td style="width:50%">Note</td>
                            </tr>

                            <?php
                              $sql9 = 'select * from matiere where classe ='.$data5['filiere'].'';
                          $req9=$BDD->prepare($sql9);
                          $req9->execute();  
                          while ( $data9=$req9->fetch()) {

                          $sql12 = 'select * from note where matiere ='.$data9['id'].' and etudiant= '.$data5['id'].'';
                          $req12=$BDD->prepare($sql12);
                          $req12->execute();
                          $data12=$req12->fetch() 

                             ?>
                              <tr><td style="height:4mm"><p><?php echo $data9['nom']; ?></p></td>
                                <td> <?php echo $data12['note']; ?> </td>

                              </tr>

                             <?php
                            }  

                            ?>
                            <tr><td style="height:4mm">Total</td><td></td></tr>
                            <tr><td style="height:4mm">Total en %</td><td></td></tr>
                            <tr><td style="height:4mm">Mention</td><td></td></tr>

                    </table>

                    <br><br>
                    <table style="width:700px;">
                      <tr style='width:100%'>
                        <td  style="float:left;width:50%">Fait à Bruxelles le, <?php
date_default_timezone_set('Europe/Paris');
// --- La setlocale() fonctionnne pour strftime mais pas pour DateTime->format()
setlocale(LC_TIME, 'fr_FR.utf8','fra');// OK
// strftime("jourEnLettres jour moisEnLettres annee") de la date courante
echo strftime("%A %d %B %Y");
?> </td><td style="float:right;width:50%;text-align:right">Michel LEGRAND,<br>
                                                                  Administrateur délégué.
</td>
                      </tr>


                      


                    </table>
         

                    
    </page>

    <?php 
        $content = ob_get_clean();
        ob_end_clean(); 
        require_once('../templates/html2pdf/html2pdf.class.php'); 
        $pdf = new HTML2PDF('L','A4','fr'); 
        $pdf->writeHTML($content); 
        $pdf->Output("FACTURE.pdf"); 
   ?>

</html>



<?php





                          

                            
                }
                      
                      ?>



