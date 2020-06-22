<?php 
session_start();
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/TECHNOLOGIE WEB/class.database.php";
   include_once($path);
   $db_connection = new dbConnection();
   $link = $db_connection->connect(); 
   
 $classe =$_SESSION['classe'];
 $section =$_SESSION['section'];
 
  
$reponse=$link->query("SELECT id_classe FROM classe WHERE nom='$classe'");
$donnees = $reponse->fetch();
$id_classe= $donnees['id_classe'];
$reponse=$link->query("SELECT capacite FROM classe WHERE nom='$classe'");
$donnees = $reponse->fetch();
$capacite= $donnees['capacite'];
?>


<div id="element" class="container"> 
  <div class="row">
    <div class="col-lg-6"><div class="jumbotron"> 				
             <span class="close" id="closeBtn">&times;</span>
<form  class="form-horizontal" id="form" method="post" action="test.php"> 
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
   
           
            </fieldset> 
</form>


    </div>
  </div>
</div>

           