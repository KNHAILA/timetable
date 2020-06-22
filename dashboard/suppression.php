<?php
session_start();
?>
<?php
function remplir($i)
{
	$classe=$_SESSION['classe'];
	$c=$i.$classe;
	include('connection.php');
    $reponse=$bdd->query("SELECT id_matiere,id_salle FROM seance WHERE id_seance='$c'");
    $donnees = $reponse->fetch();
    $id_matiere=$donnees['id_matiere'];
    $id_salle=$donnees['id_salle'];
    $reponse=$bdd->query("SELECT nom FROM matiere WHERE id_matiere='$id_matiere'");
    $donnees = $reponse->fetch();
    $nom_matiere=$donnees['nom'];
    $reponse=$bdd->query("SELECT nom FROM salle WHERE id_salle='$id_salle'");
    $donnees = $reponse->fetch();
    $nom_salle=$donnees['nom'];
    $reponse=$bdd->query("SELECT id_prof FROM enseigner WHERE heurejour='$i' AND id_matiere='$id_matiere'");
    $donnees = $reponse->fetch();
    $id_prof=$donnees['id_prof'];
    $reponse=$bdd->query("SELECT nom FROM professeur WHERE id_prof='$id_prof'");
    $donnees = $reponse->fetch();
    $nom_prof=$donnees['nom'];
    if (!empty($nom_matiere) && !empty($nom_salle) && !empty($nom_prof))
    {
    	echo "<p>".$nom_matiere."</p>";
    	echo "<p>".$nom_salle."</p>";
    	echo "<p>Pr. ".$nom_prof."</p>";
    }
}
?>
<?php
function supprimer()
{
	$classe='AP1';
	include('connection.php');
	for($i=1;$i<=5;$i++)
	{
		for($j=1;$j<=4;$j++)
		{
			$c1='t'.strval($i).strval($j);
			$c2=$c1.strval($classe);
			$reponse=$bdd->query("SELECT id_matiere FROM seance WHERE id_seance='$c2'");
			$donnees = $reponse->fetch();
			$id_matiere=$donnees['id_matiere'];
			$reponse=$bdd->prepare("DELETE FROM seance WHERE id_seance='$c2'");
			$reponse->execute();
			$reponse=$bdd->prepare("DELETE FROM enseigner WHERE heurejour='$c1' AND id_matiere='$id_matiere'");
			$reponse->execute();
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Suppression</title>
</head>
<body>
<?php
	include('connection.php');
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
#p {
    position:relative;
 
    top:650px;
    left:800px;
    width: 200px;
    height: 50px;
    background-color: green;
    font-size: 25px;
}

</style>

    	
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
        <button type="button" id="p" onclick="document.write('<?php supprimer();?>')">Supprimer</button>
</body>
</html>