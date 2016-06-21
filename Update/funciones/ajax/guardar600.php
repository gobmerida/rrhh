<?php
$imagem = $_POST['imagem'];
list($tipo, $dados) = explode(';', $imagem);
list(, $tipo) = explode(':', $tipo);
list(, $dados) = explode(',', $dados);
$dados = base64_decode($dados);
$nome = "noticia_ppal";
file_put_contents("../../c_noti/{$nome}.jpg", $dados);
