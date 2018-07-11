<?php

// Commentaire sur une seule ligne
/* 
Commentaires sur plusieurs 
Lignes
*/

// Déclaration de la variable
$mon_texte = "<h1>Mon premier texte en PHP sans \"fonction\"</h1>";

echo $mon_texte;

// Déclaration de la fonction
function mon_autre_texte() {
	echo "<h1>Mon deuxième texte en PHP avec fonction</h1>";
}

// Appel de la fonction
mon_autre_texte();

// Déclaration d'une fonction avec paramètres (variable)
function mon_texte_modulable($mon_texte_perso) {
	echo "<h1>Utiliation de la fonction</h1>";
	echo $mon_texte_perso;
}

// Appel de la fonction avec les arguments (variable)
mon_texte_modulable("<h2>Mon texte à moi</h2>");
mon_texte_modulable("<h3>Mon texte en plus</h3>");


// Condition en PHP
$valeur = '5';

// Début de ma condition
if ($valeur == 5) {

	// si égal à 5, cette phrase s'affiche
	echo '<p>Ma valeur est égale à 5</p>';

} else {

	// Dans tous les autres cas, c'est cette phrase qui s'affiche
	echo '<p>Ma valeur n\'est pas égale à 5</p>';

}


// Condition inverse en PHP

$valeur2 = 10;

if (! $valeur2 == 10 ) {
	return;
} 








?>