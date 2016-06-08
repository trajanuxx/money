<?php
if (!isset($_SESSION)) {
  session_start();
}

echo  $_SERVER['DOCUMENT_ROOT'] . 'money/arquivos/';
move_uploaded_file($_FILES['file']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . 'money/arquivos/' . $SESSION["id_usuario"].'_'.$_FILES['file']['name']);;


?>




