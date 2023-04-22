<?php
    var_dump($_SESSION['erreur']);
    die;
    if (isset($_SESSION['erreur'])) {
      echo $_SESSION['erreur'];
    } else if (isset($_SESSION['succes'])) {
      echo $_SESSION['succes'];
    }