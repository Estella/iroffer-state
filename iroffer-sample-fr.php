<?php
#
# Copyright 2004 Dirk Meyer, Im Grund 4, 34317 Habichstwald
#	dirk.meyer@dinoex.sub.org
#
# Mises � jour sur :
#	http://iroffer.dinoex.net/
#
ob_start('ob_gzhandler');

#
# Configuration:
#
# IRC-Nick des Bots
#
# 1) Le nom du r�pertoire est le Nick du Bot 
$nick = dirname( $_SERVER[ 'PHP_SELF' ] );
$nick = basename( $nick );
$nick = 'XDCC|'.$nick;
# 2) Pour un Nick pr�cis enregistr� :
$nick = '[XDCC]`MonBot';

# Emplacement du fichier state du Bot
$filenames = array(
	'MonBot.state'
);

# COPIER+COLLER par Javascript actif=1, inactif=0
$javascript = 1;

# Limiter la longueur des noms de fichiers � "X" caract�res, 0 = tout afficher
$max_filename_len = 0;

# Chemin du fichier de cache, Merci d'en cr�er un vide.
$cache_file = 'size.data';

# Sous quel nom doivent appara�tre les Packs sans groupe ? 
$default_group = 'Nouveaut�s';

# Mettez la valeur � 1 pour ne pas afficher les Packs verrouill�s dans la liste. 
$hide_locked = 0;

# Liste des groupes qui ne sont pas affich�s. S�parateur '|'
$hide_groups = '';

# Chemin "files_dir" dans le fichier de configuration iroffer. 
$base_path = './';

# Si le Bot a un chemin d'acc�s � un chroot court. 
$chroot_path = '';

# Quelles donn�es doivent �tre affich�es ?
$statistik = array (
#	'uptimetext' => 'Temps de connexion :',
	'timetext' => 'Derniere mise � jour :',
	'freeslots' => 'Connexions ouvertes',
#	'maxslots' => 'Connexions maximum : ',
	'queue' => 'Queues :',
#	'minspeed' => 'Vitesse minimum :',
#	'maxspeed' => 'Vitesse Maximum :',
	'current' => 'Vitesse Actuelle :',
#	'cap' => 'Bande-passante Maximale :',
#	'record' => 'Record',
#	'send' => 'Envoi :',
#	'dailytext' => "Trafic jour :",
#	'weeklytext' => "Trafic semaine :",
#	'monthlytext' => "Trafic mois :",
#	'downltext' => "Trafic Total",
);

# Charset of all filenames
$iroffer_charset = 'iso-8859-1';
#$iroffer_charset = 'utf-8';

# fin des param�tres, Ne pas modifier au d�l�

include 'iroffer-state.php';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<?php echo $meta_generator; ?>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $iroffer_charset; ?>">
<meta http-equiv="content-language" content="fr-fr">
<link rel="icon" href="/favicon.ico">
<link rel="stylesheet" type="text/css" href="iroffer-state.css">
<title><?php echo $nick; ?></title>
<?php echo $javascript_code; ?>
</head>
<body>
<center>
<?php

$bot = new iroffer_botlist();
$bot->nick = $nick;

$bot->filenames = $filenames;
$bot->base_path = $base_path;
$bot->chroot_path = $chroot_path;
$bot->statistik = $statistik;
$bot->hide_locked = $hide_locked;
$bot->hide_groups = $hide_groups;
# $bot->add_url = 'debug=1';

$bot->read_state();
$bot->write_table();

?>
</center>
</body>
</html>

