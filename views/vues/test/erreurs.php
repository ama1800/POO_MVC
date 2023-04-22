<?php $titre = 'CINEMA PHP_POO'; ?>

<?php ob_start() ?>
<p>Une erreur est survenue : <?= $msgErreur ?></p>
<?php $contenu = ob_get_clean(); ?>

<?php require 'views/lyaouts/Template.php'; ?>