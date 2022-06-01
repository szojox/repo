<script src="http://192.168.10.50/tinymce/js/tinymce/tinymce.min.js"></script>
  <script>tinymce.init({ theme_advanced_font_sizes : "10px,12px,14px,16px,24px", selector:'textarea',
  height: 100,
  theme: 'modern',
  plugins: [
    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
    'searchreplace wordcount visualblocks visualchars code fullscreen',
    'insertdatetime media nonbreaking save table contextmenu directionality',
    'emoticons template paste textcolor colorpicker textpattern imagetools'
  ],
  toolbar1: 'insertfile undo redo | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  toolbar2: 'print preview media | sizeselect | bold italic | fontselect |  fontsizeselect | forecolor backcolor emoticons',
  image_advtab: true });</script>
<?php
header('Content-Type: text/html; charset=utf-8');
$tekst_pasek_dol = $_POST["tekst_pasek_dol"];
$pasek_dol = $_POST["pasek_dol"];
$pasek_gora = $_POST["pasek_gora"];
$all_paski = $_POST["all_paski"];
$logo_post = $_POST["logo"];
$dol_reklama = $_POST["dol_reklama"];
if(isset($all_paski)){
$pasek_dol = $all_paski;
$pasek_gora = $all_paski;
}

$file = $_FILES['fileToUpload']['tmp_name']; 

if(is_uploaded_file($file)) { 
     move_uploaded_file($file, "grafika.png"); }
$belka_gora_img = $_FILES['belka_gora_img']['tmp_name']; 

if(is_uploaded_file($belka_gora_img)) { 
     move_uploaded_file($belka_gora_img, "belka_gora_img.png"); }

$logo = $_FILES['logo']['tmp_name']; 

if(is_uploaded_file($logo)) { 
     move_uploaded_file($logo, "logo.png"); }


$dol_reklama_img = $_FILES['dol_reklama_img']['tmp_name']; 

if(is_uploaded_file($dol_reklama_img)) { 
     move_uploaded_file($dol_reklama_img, "dol_reklama.png"); }


function replaceInFile($what, $with, $file){
    $buffer = "";
    $fp = file($file);
    foreach($fp as $line){
        $buffer .= preg_replace("|".$what."[a-zA-Z0-9 \s]*|", $what.$with, $line);
    }
    fclose($fp);
   
    file_put_contents($file, $buffer);
}


if(isset($tekst_pasek_dol))
{
$myfile = fopen("tekst_pasek_dol.txt", "w");
fwrite($myfile, $tekst_pasek_dol);
fclose($myfile);
}
if(isset($pasek_dol)){
replaceInFile('var pasek_dol = ', $pasek_dol, "foo.php");
}
if(isset($pasek_gora)){
replaceInFile('var pasek_gora = ', $pasek_gora, "foo.php");
}
if(isset($logo_post)){
replaceInFile('var logo = ', $logo_post, "foo.php");
}
if(isset($dol_reklama)){
replaceInFile('var dol_reklama = ', $dol_reklama, "foo.php");
}
?>


<html>
<head></head>
<body>   
<div class="content">
    <form action="#" method="POST">
        <label>Tekst pasek dół </label>
        <textarea  name="tekst_pasek_dol"><?php $homepage = file_get_contents('http://localhost/tekst_pasek_dol.txt'); echo $homepage; ?></textarea>
        <input name="mySubmit" type="submit" value="Submit!" />
</form>
<form action="##" method="POST">
<button type="submit" name="pasek_dol" value="true" >Włącz pasek dolny </button>
<button type="submit" name="pasek_dol" value="false">Wyłącz pasek dolny </button>
    </form>
</div>

<div class="content">
<form action="##" method="POST">
<button type="submit" name="pasek_gora" value="true" >Włącz pasek górny </button>
<button type="submit" name="pasek_gora" value="false">Wyłącz pasek górny </button>
    </form>

<div class="content">
<form action="##" method="POST">
<button type="submit" name="all_paski" value="true" >Włącz wszystkie paski</button>
<button type="submit" name="all_paski" value="false">Wyłącz wszystkie paski </button>
    </form>
</div>

<form action="###" method="post" enctype="multipart/form-data">
    Tło belki 1300x150 jest git: 
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>
<form action="####" method="post" enctype="multipart/form-data">
    Tło belki na gorze 1300x100 jest git: 
    <input type="file" name="belka_gora_img" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>
<form action="####" method="post" enctype="multipart/form-data">
    Logo 300x150 jest git: 
    <input type="file" name="logo" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>
<div class="content">
<form action="#####" method="POST">
<button type="submit" name="logo" value="true" >Włącz logo</button>
<button type="submit" name="logo" value="false">Wyłącz logo</button>
    </form></div>

<div class="content">
<form action="######" method="post" enctype="multipart/form-data">
    Reklama dol 1300x300 jest git: 
    <input type="file" name="dol_reklama_img" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>
<form action="#######" method="POST">
<button type="submit" name="dol_reklama" value="true" >Włącz reklame</button>
<button type="submit" name="dol_reklama" value="false">Wyłącz reklame</button>
</div>
</body>
</html>
