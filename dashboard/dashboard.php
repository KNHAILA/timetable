<?php 
   session_start();
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/TECHNOLOGIE WEB/header.php";
   include_once($path);

   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/TECHNOLOGIE WEB/navbar.php";
   include_once($path);
   
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/TECHNOLOGIE WEB/class.database.php";
   include_once($path);
   $db_connection = new dbConnection();
   $link = $db_connection->connect(); 
   $login=$_SESSION['name'];
   
?>
 <?php

if(isset($_POST['generate']) )
{
  $classe=$_POST['classe'];
  $section=$_POST['section'];

  $_SESSION['classe'] = $classe;
$_SESSION['section'] = $section;
if($_POST['rubrique']=="creation")
	header("Location: table.php");
elseif ($_POST['rubrique']=="suppression") {
	header("Location: suppression.php");
}

}
?>

<body>
<div class="container"> 
  <div class="row">
    <div class="col-lg-6"><div class="jumbotron"> 				
			<form class="form-horizontal" method="post" action="">
			<fieldset>

			<!-- Form Name -->
			<legend>CREATION DE L'EMPLOI</legend>
			
			<!-- Select Basic -->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="classe">Classe :</label>
			  <div class="col-md-8">
				    <select id="classe" name="classe" class="form-control" required="">
				        <?php

                             $reponse=$link->query("SELECT nom FROM classe WHERE login='$login'");
                             while ($donnees = $reponse->fetch())
                             {
                        ?>
                        <option name="classe" value="<?php echo $donnees['nom']; ?>"> <?php echo $donnees['nom']; ?></option>
                        <?php
                              }
                        ?>
				  
				    </select>
				
			    </div>
			</div>

			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="year">Année / Session :</label>  
			  <div class="col-md-8">
			  <input id="year" name="year" type="text" placeholder="Année academique" class="form-control input-md" required="">
			  <span class="help-block">Ecire sous forme : 2015-2016</span>  
			  </div>
			</div>

			<!-- Select Basic -->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="semestre">Semestre :</label>
			  <div class="col-md-8">
				<select id="semestre" name="semester" class="form-control" required="">
				  <option value="one">1</option>
				  <option value="two">2</option>
				  
				</select>
			  </div>
			</div>

			<!-- Select Basic -->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="section">Section :</label>
			  <div class="col-md-8">
				<select id="section" name="section" class="form-control" required="">
				<option value="Section1">Section 1</option>
				<option value="Section2">Section 2</option>
				  
				</select>
				<span class="help-block">Année ,Semestre, Section</span>  
			  </div>
			</div>
			<div class="form-group">
			  <label class="col-md-4 control-label" for="rubrique">Rubrique :</label>
			  <div class="col-md-8">
				<select id="rubrique" name="rubrique" class="form-control" required="">
				<option value="creation">Creation ou Modification</option>
				<option value="suppression">Suppression</option>
				  
				</select>
			  </div>
			</div>

			<!-- Button -->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="generate"></label>
			  <div class="col-md-4">
				<input type="submit" id="generate" name="generate" class="btn btn-success" value="valider">
				</div>
			</div>

			</fieldset>
			</form>

		</div>
    </div>
  </div>


  

</body>
<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/TECHNOLOGIE WEB/footer.php";
   include_once($path);
?>