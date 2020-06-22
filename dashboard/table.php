<?php
session_start();
?>
<?php
    function remplir($id)
    {
        
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/TECHNOLOGIE WEB/header.php";
   include_once($path);

   $db_connection = new dbConnection();
   $link = $db_connection->connect(); 
   
   $classe=$_SESSION['classe'];
   $reponse=$link->query("SELECT id_classe FROM classe WHERE nom='$classe'");
       $donnees = $reponse->fetch();
       $id_classe=$donnees['id_classe'];

       $reponse=$link->query("SELECT id_salle,id_matiere FROM seance WHERE id_classe='$id_classe' AND heurejour='$id'");
       $donnees = $reponse->fetch();
       $id_salle=$donnees['id_salle'];
       $id_matiere=$donnees['id_matiere'];

       $reponse=$link->query("SELECT nom FROM salle WHERE id_salle='$id_salle'");
       $donnees = $reponse->fetch();
       $nom_salle=$donnees['nom'];

       $reponse=$link->query("SELECT nom FROM matiere WHERE id_matiere='$id_matiere'");
       $donnees = $reponse->fetch();
       $nom_matiere=$donnees['nom'];


       $reponse=$link->query("SELECT id_prof FROM enseigner WHERE id_matiere='$id_matiere' AND heurejour='$id'");
       $donnees = $reponse->fetch();
       $id_prof=$donnees['id_prof'];

       $reponse=$link->query("SELECT nom FROM professeur WHERE id_prof='$id_prof'");
       $donnees = $reponse->fetch();
       $nom_prof=$donnees['nom'];
   if(!empty($nom_salle) && !empty($nom_prof) && !empty($nom_matiere))
   {
       echo "<p>".$nom_prof."</p><p>".$nom_matiere."</p><p>".$nom_salle."</p>";
       ?>
       <span class="close" id="<?php echo 'd'.substr($id,1,2); ?>" onclick="Seance('<?php echo 'd'.substr($id,1,2); ?>')">&times;</span>
       <?php
   }
   else{
   ?>
   <button type="button" onclick="Seance('<?php echo $id; ?>')" class="btn btn-light" id="<?php echo 'b'.substr($id,1,2); ?>">Clickez Ici</button>
   <?php 
   }
   }
   ?>
    
<?php
 $path = $_SERVER['DOCUMENT_ROOT'];
 $path .= "/TECHNOLOGIE WEB/navbar.php";
 include_once($path);
 
 $path = $_SERVER['DOCUMENT_ROOT'];
 $path .= "/TECHNOLOGIE WEB/class.database.php";
 include_once($path);
?>

    <body id="body">
    <style>
table {
    margin-left: -100px; /* - moitié de la largeur */
    position: absolute;
    text-align: center;
    left: 30%;
    display:inline-block;
}

td {
  width:200px;
  height:100px;
  background-color: white;
 
}
th {
  width:150px;
  height:50px;
  text-align: center;
  background-color: burlywood;
 
}
#pdf {
    position:relative;
 
    top:650px;
    left:800px;
}

</style>

        <script type="text/javascript" src="../scripts/corr.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.min.js"></script>

<table id="table" align="center" border="2px">
            <tr>
                <td></td>
                <th>08h00 à 10h00 </th>
                <th>10h10 à 12h10</th>
                <th>14h00 à 16h00</th>
                <th>16h10 à 18h10</th>
            </tr>
            <tr>
                <th>Lundi</th>
                <td id="t11"><?php remplir("t11");?></td>
                <td id="t12"><?php remplir("t12");?></td>
                <td id="t13"><?php remplir("t13");?></td>
                <td id="t14"><?php remplir("t14");?></td>
            </tr>
            <tr>
                <th>Mardi</th>
                <td id="t21"><?php remplir("t21");?></td>
                <td id="t22"><?php remplir("t22");?></td>
                <td id="t23"><?php remplir("t23");?></td>
                <td id="t24"><?php remplir("t24");?></td>
            </tr>
            <tr>
                <th>Mercredi</th>
                <td id="t31"><?php remplir("t31");?> </td>
                <td id="t32"><?php remplir("t32");?></td>
                <td id="t33"><?php remplir("t33");?></td>
                <td id="t34"><?php remplir("t34");?></td>
            </tr>
            <tr>
                <th>Jeudi</th>
                <td id="t41"><?php remplir("t41");?></td>
                <td id="t42"><?php remplir("t42");?></td>
                <td id="t43"><?php remplir("t43");?></td>
                <td id="t44"><?php remplir("t44");?></td>
            </tr>
            <tr>
                <th>Vendredi</th>
                <td id="t51"><?php remplir("t51");?></td>
                <td id="t52"><?php remplir("t52");?></td>
                <td id="t53"><?php remplir("t53");?></td>
                <td id="t54"><?php remplir("t54");?></td>
            </tr>
           
        </table>



        
				<input type="submit" onclick="PDF()"  id="pdf" name="pdf" class="btn btn-success" value="Generer_Pdf">
				
        

</div>
       
          <div id="simpleModal" class="modal">
            <div class="modal-content">
             <span class="close" id="closeBtn">&times;</span>
       <?php 
 $path = $_SERVER['DOCUMENT_ROOT'];
 $path .= "/TECHNOLOGIE WEB/class.database.php";
 include_once($path);
$db_connection = new dbConnection();
$link = $db_connection->connect(); 
$classe=$_SESSION['classe'];
echo $classe;
$section=$_SESSION['section'];
$reponse=$link->query("SELECT id_classe FROM classe WHERE nom='$classe'");
$donnees = $reponse->fetch();
$id_classe= $donnees['id_classe'];
$reponse=$link->query("SELECT capacite FROM classe WHERE nom='$classe'");
$donnees = $reponse->fetch();
$capacite= $donnees['capacite'];
?>
<form method="post" action="" id="form"> 
<fieldset>
    <legend>Remplir L'emploi :</legend>
    <div class="form-group">
			  <label class="col-md-4 control-label" for="matiere">Matiere :</label>
			  <div class="col-md-8">
				    <select id="matiere" name="matiere" class="form-control" required="">
            <?php
                $reponse=$link->query("SELECT nom FROM matiere WHERE id_classe='$id_classe'");
                while ($donnees = $reponse->fetch())
                {
            ?>
            <option id="nom" value="<?php echo $donnees['nom']; ?>"> <?php echo $donnees['nom']; ?></option>
            <?php
                }
            ?>
            </select>
            </div>
			</div>
            <div class="form-group">
			  <label class="col-md-4 control-label" for="salle">Salle :</label>
			  <div class="col-md-8">
				    <select id="salle" name="salle" class="form-control" required="">
        
            <?php
                $reponse=$link->query("SELECT nom FROM salle WHERE capacite>='$capacite'");
                while ($donnees = $reponse->fetch())
                {
            ?>
            <option value="<?php echo $donnees['nom']; ?>"> <?php echo $donnees['nom']; ?></option>
            <?php
                }
            ?>
            </select>
            </div>
			</div>
            <div class="form-group">
			  <label class="col-md-4 control-label" for="prof">prof :</label>
			  <div class="col-md-8">
				    <select id="prof" name="prof" class="form-control" required="">
    
            <?php
                $reponse=$link->query("SELECT nom FROM professeur");
                while ($donnees = $reponse->fetch())
                {
            ?>
            <option value="<?php echo $donnees['nom']; ?>">Pr. <?php echo $donnees['nom']; ?></option>
            <?php
                }
            ?>
            </select>
            </div>
            </div>

			  <input id="heure" name="heure" type="hidden"  class="form-control input-md" checked="">
			
            
            <div class="form-group">
			  <label class="col-md-4 control-label" for="color">Color :</label>  
			  <div class="col-md-8">
			  <input id="color" name="color" type="color"  class="form-control input-md" value = "#e66465">
			  </div>
			</div>
            
            
      
            <div class="form-group">
			  <label class="col-md-4 control-label" for="valider"></label>
			  <div class="col-md-4">
				<input type="submit" id="valider" name="generate" class="btn btn-success" value="Valider">
				</div>
            </div>
            </fieldset> 
</form>


    </div>
  </div>
</div>
<div id="simpleModal1" class="modal">
            <div class="modal-content">
             <span class="close" id="closeBtn1">&times;</span>
             <p id="1"></p>
             <p id="2"></p>
          <button type="text" id="OK">OK</button>  
            </div>
</div> 
<!--<script type="text/javascript" src="creation.js"></script>-->
<?php
     $path = $_SERVER['DOCUMENT_ROOT'];
     $path .= "/TECHNOLOGIE WEB/class.database.php";
     include_once($path);
$db_connection = new dbConnection();
$link = $db_connection->connect(); 
if (isset($_POST['matiere']) && isset($_POST['salle']) && isset($_POST['prof']) && isset($_POST['heure']) && isset($_POST['color']) )
{
    $classe=$_SESSION['classe'];
    $id_seance=$_POST['heure'].$classe;

    $classe=$_SESSION['classe'];
    $reponse=$link->query("SELECT id_classe FROM classe WHERE nom='$classe'");
    $donnees = $reponse->fetch();
    $id_classe=$donnees['id_classe'];

    $salle=$_POST['salle'];
    $reponse=$link->query("SELECT id_salle FROM salle WHERE nom='$salle'");
    $donnees = $reponse->fetch();
    $id_salle=$donnees['id_salle'];

    $prof=$_POST['prof'];
    $reponse=$link->query("SELECT id_prof FROM professeur WHERE nom='$prof'");
    $donnees = $reponse->fetch();
    $id_prof=$donnees['id_prof'];

    $matiere=$_POST['matiere'];
    $reponse=$link->query("SELECT id_matiere FROM matiere WHERE nom='$matiere' AND id_classe='$id_classe'");
    $donnees = $reponse->fetch();
    $id_matiere=$donnees['id_matiere'];
    $heurejour=$_POST['heure'];
    $p=0;
     if (substr($_POST['heure'],0,1)=='d')
     {
      $heurejour1='t'.substr($_POST['heure'],1,2);
      $reponse=$link->query("SELECT id_prof FROM enseigner WHERE heurejour='$heurejour1'");
      while($donnees = $reponse->fetch())
      {
        if($donnees['id_prof']==$id_prof)
          $p=1;
      }
     }
     else
     {
      $reponse=$link->query("SELECT id_prof FROM enseigner WHERE heurejour='$heurejour'");
      while($donnees = $reponse->fetch())
      {
        if($donnees['id_prof']==$id_prof)
          $p=1;
      }
     }
      $s=0;
     if (substr($_POST['heure'],0,1)=='d')
     {
      $heurejour1='t'.substr($_POST['heure'],1,2);
      $reponse=$link->query("SELECT id_salle FROM seance WHERE LEFT(id_seance,3)='$heurejour1'");
      while($donnees = $reponse->fetch())
      {
        if($donnees['id_salle']==$id_salle)
          $s=1;
      }
     }
     else
     {
      $reponse=$link->query("SELECT id_salle FROM seance WHERE LEFT(id_seance,3)='$heurejour'");
      while($donnees = $reponse->fetch())
      {
        if($donnees['id_salle']==$id_salle)
          $s=1;
      }
     }
    if($s==1 || $p==1)
    {
      if($s==1 && $p==1)
        { ?>
      <script> Seance1("<?php echo $salle;?>","<?php echo $prof;?>"); </script>
      <?php
        }
        elseif($s==1 && $p==0)
           { ?>
      <script> Seance1("<?php echo $salle;?>","<?php echo '';?>"); </script>
      <?php
        }
         elseif($s==0 && $p==1)
           { ?>
      <script> Seance1("<?php echo '';?>","<?php echo $prof;?>"); </script>
      <?php
        }
    }
    else
    {
    if (substr($_POST['heure'],0,1)=='d')
    {
            $id_seance='t'.substr($_POST['heure'],1,2).$classe;
            $heurejour='t'.substr($_POST['heure'],1,2);
            $reponse=$link->query("SELECT id_matiere FROM seance WHERE id_seance='$id_seance'");
            $donnees = $reponse->fetch();
            $id_matiere1=$donnees['id_matiere'];
            $reponse=$link->prepare("DELETE FROM seance WHERE id_seance='$id_seance'");
            $reponse->execute();
            $reponse=$link->prepare("DELETE FROM enseigner WHERE heurejour='$heurejour' AND id_matiere='$id_matiere1'");
            $reponse->execute();
            $req = $link->prepare('INSERT INTO seance(id_seance,heurejour,heure_debut,heure_fin,jour,id_matiere,id_salle,id_classe) VALUES (:id_seance,:heurejour,:heure_debut,:heure_fin,:jour,:id_matiere,:id_salle,:id_classe)');
                        $req->execute(array('id_seance' => $id_seance,
                        'heurejour' => $heurejour,
                        'heure_debut'=> "",
                        'heure_fin'=>"",
                        'jour'=>"",
                        'id_matiere' => $id_matiere,
                        'id_salle' => $id_salle,
                        'id_classe' => $id_classe,
                        ));
                        $req = $link->prepare('INSERT INTO enseigner(heurejour,id_prof,id_matiere) VALUES (:heurejour,:id_prof,:id_matiere)');
    $req->execute(array('heurejour' => $heurejour,
                        'id_prof' => $id_prof,
                        'id_matiere' => $id_matiere,
                    ));
    }
    else
    {
    $req = $link->prepare('INSERT INTO seance(id_seance,heurejour,heure_debut,heure_fin,jour,id_matiere,id_salle,id_classe) VALUES (:id_seance,:heurejour,:heure_debut,:heure_fin,:jour,:id_matiere,:id_salle,:id_classe)');
    $req->execute(array('id_seance' => $id_seance,
                        'heurejour' => $_POST['heure'],
                        'heure_debut'=> "",
                        'heure_fin'=>"",
                        'jour'=>"",
                        'id_matiere' => $id_matiere,
                        'id_salle' => $id_salle,
                        'id_classe' => $id_classe,
                        ));

    /*$req = $link->prepare('INSERT INTO enseigne(heurejour,heure_debut,heure_fin,id_prof,id_matiere) VALUES (:heurejour,:heure_debut,:heure_fin,:id_prof,:id_matiere)');
   $req->execute(array('heurejour' => $_POST['heure'],
                        'heure_debut'=> "",
                        'heure_fin'=>"",
                        'id_prof' => $id_prof,
                        'id_matiere' => $id_matiere,
                        ));*/
    $req = $link->prepare('INSERT INTO enseigner(heurejour,id_prof,id_matiere) VALUES (:heurejour,:id_prof,:id_matiere)');
    $req->execute(array('heurejour' => $_POST['heure'],
                        'id_prof' => $id_prof,
                        'id_matiere' => $id_matiere,
                    ));
}
?>
<script >
insere("<?php echo $heurejour; ?>","<?php echo $_POST['matiere']; ?>","<?php echo $_POST['salle']; ?>","<?php echo $_POST['prof']; ?>","<?php echo $_POST['color']; ?>");
</script>
<?php
}
}
?>
</body>
</html>