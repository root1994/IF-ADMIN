<?php
include('config.php');
                         
  if (!empty($_GET['matricule'])) {

                          $matricule=$_GET['matricule'];
                          $req3=$BDD->prepare('select * from etudiant where matricule ="'.$matricule.'"');
                          $req3->execute();
                          $data3=$req3->fetch();

                          $req4=$BDD->prepare('select * from filiere where id ='.$data3['filiere'].'');
                          $req4->execute();
                          $data4=$req4->fetch(); 

ob_start(); 
?>
<page backtop="5mm" backbottom="5mm" backleft="3mm" backright="5mm" class="conteneurpdf">
<link rel="stylesheet" type="text/css" href="../css/style.css">


    <div style="background:black;width:100%;">
      <img src="../img/ifcad.gif" style="margin:none;">
    </div>

    <table style='width:100%;'>
    <tr>
      <td style='width: 30%;'><div class="info"> Année Academique: 2016/2017</div></td>
      <td style='width: 30%;text-align: center;'><div class="info">Filière: <?php echo utf8_decode($data4['cycle']);?> </div></td>
      <td style='width: 30%;text-align: center;'><div class=" info">Matricule: <?php echo $data3['matricule'];?></div></td>
    </tr>
    </table>
    
    

    <div class="col-lg-12 col-sm-12 col-xs-12 titre">Informaions Personnelles</div><br><br>
      
    <table style="width:100%">
      <tr>
      <td style="width:25%"> <div class="col-lg-3 col-sm-3 col-xs-3" style="float:left;">
          <img src="../img/default.png" style="width:;height:;"> 
           
    </div></td>

          <td style="width:75%">
            <table style="width:100%">
      <tr>
          <td style="width:50%">
            <div class="col-lg-6 col-sm-6 col-xs-6" style="float:left;">
        Civilité:  <?php echo $data3['civilite'];?><br><br>
        Nom:  <?php echo utf8_decode($data3['nom']);?> <br><br> Né (e) le: <?php echo $data3['daten'];?> <br><br> Pays de naissance:  <?php echo utf8_decode($data3['paysn']);?> 
        <br><br> Tél:  <?php echo $data3['tel'];?>

        </div>
          </td>
          <td style="width:50%">
            <div class="col-lg-6 col-sm-6 col-xs-6" style="float:right;">
        <br><br>Prénom:  <?php echo utf8_decode($data3['prenom']);?><br><br>à:  <?php echo utf8_decode($data3['lieun']);?> <br><br> Nationalité:  <?php echo utf8_decode($data3['nation']);?>
        <br><br>Email:  <?php echo utf8_decode($data3['email']);?>
        </div>
          </td>

      </tr>
      <tr colspan="2" style='text-align: center;'>
        <td><br>Adrèsse: <?php echo utf8_decode($data3['adresse']);?></td>
      </tr>



    </table>
          </td>
          

      </tr>
      

    </table>
   

    <div class="col-lg-9 col-sm-9 col-xs-9" style="float:left;">

        
    </div>


     <br><br><div class="col-lg-12 col-sm-12 col-xs-12 titre">Profil Academique</div><br><br>

     <table style="width:100%">
      <tr>
          <td style="width:50%">
            <div class="col-lg-6 col-sm-6 col-xs-6" style="float:left;">
    Dernier diplôme :  <?php echo $data3['diplome'];?><br><br>Pays d'obtention:  <?php echo utf8_decode($data3['paysd']);?>
    </div>
          </td>
          <td style="width:50%">
            <div class="col-lg-6 col-sm-6 col-xs-6" style="float:right;">
      &Eacute;tablissement:  <?php echo $data3['ecoled'];?> <br><br>Mention:  <?php echo utf8_decode($data3['mention']);?><br><br>Année:  <?php echo $data3['dated'];?>
    </div>
          </td>

      </tr>
     

    </table>
    <br><br><div class="col-lg-12 col-sm-12 col-xs-12 titre">Informations complementaires</div><br><br>

        <table style="width:100%">
      <tr>
          <td style="width:50%">
            <div class="col-lg-6 col-sm-6 col-xs-6" style="float:left;">
      Handicape:  <?php echo utf8_decode($data3['handicape']);?>   
    </div>
          </td>
          <td style="width:50%">
             <div class="col-lg-6 col-sm-6 col-xs-6" style="float:right;">
       Divertissements:  <?php echo utf8_decode($data3['diver']);?>
    </div>
          </td>

      </tr>
     

    </table>

      <div class="col-lg-12 col-sm-12 col-xs-12 " style="background:black">

      <img src="../img/back.jpeg" style="margin:5px; width:90px;height:90px;float:right;">

  
  
    </div>


<?php }; ?>

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




