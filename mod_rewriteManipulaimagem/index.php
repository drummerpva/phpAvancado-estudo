<?php
//pega parametro do rewrite
//print_r($_GET);
//redimensionando imagens
$arquivo = "imagem.jpg";
$largura = 200;
$altura = 200;

list($larguraOriginal,$alturaOriginal) = getimagesize($arquivo);
$ratio = $larguraOriginal / $alturaOriginal;
//echo $ratio;
if($largura/$altura > $ratio){
    $largura = $altura * $ratio;
}else{
    $altura = $largura / $ratio;
}
//echo "<p>Largura: ".$largura." e Altura: $altura --- LOriginal $larguraOriginal e AOriginal $alturaOriginal";
$imagemFinal = imagecreatetruecolor($largura, $altura);
$imagemOriginal = imagecreatefromjpeg($arquivo);

imagecopyresampled($imagemFinal,$imagemOriginal,0,0,0,0,$largura,$altura,$larguraOriginal,$alturaOriginal);
//mudar cabeçalho para mudar a imagem
//header("Content-Type: image/png");
imagejpeg($imagemFinal,"miniatura.jpg",70);
//100 define qualidade maxima   
//echo "<p>Image redimensionada com sucesso!</p>";

//Inserindo texto em imagem
$imagem = "mini.jpg";
list($larguraO,$alturaO) = getimagesize($imagem);
$imagemFinal = imagecreatetruecolor($larguraO, $alturaO);
$imagemO = imagecreatefromjpeg($imagem);
$imagemMini = imagecreatefromjpeg("miniatura.jpg");
list($larguraMini,$alturaMini) = getimagesize("miniatura.jpg");
imagecopy($imagemFinal,$imagemO,0,0,0,0,$larguraO,$alturaO);
imagecopy($imagemFinal,$imagemMini,100,200,0,0,$larguraMini,$alturaMini);
//header("Content-Type: image/jpg");
imagejpeg($imagemFinal,"imagemMarcadAgua.jpg",100);
echo "Marca D Agua inserida com sucesso!";




























