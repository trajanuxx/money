<?php
// Nas versões do PHP anteriores a 4.1.0, $HTTP_POST_FILES deve ser utilizado ao invés
// de $_FILES.

echo  $_SERVER['DOCUMENT_ROOT'] . 'dinheiro/arquivos/';
move_uploaded_file($_FILES['file']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . 'dinheiro/arquivos/' . $_FILES['file']['name']);;


?>




