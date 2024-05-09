<?php 
include('conexao.php');

$url = false;
if(isset($_POST{'url'})) {
 
   $hash = uniqid();
   $url = $mysqli->real_escape_string($_POST['url']);
   $views = 0;
   $url_prefix = 'https://localhost/projeto/r.php?h=';

   $hash=md5($hash);
   $mysqli->query("INSERT INTO urls (id, url, views) VALUES ('$hash', '$url', 's$views')") or die ($mysqli->error);
   $url = $url_prefix . $hash;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encurtador URL</title>
</head>

<body>
    <form method="POST">
        <input type="url" name="url" placeholder="Insira a URL.">
        <button>Enviar</button>
    </form>
    <?php if ($url !== false) { ?>
    <p> 
        URL Encurtada:<br>    
        <input type="text" readonly value="<?php echo $url; ?>">
    </p>
    <?php } ?>
</body>

</html>