<?php
$texte = $_POST["texte"] ?? "";
$code = $_POST["code"] ?? "";
$tableau_de_caracteres = str_split($texte);
$codes_ascii = array_map(function($c) { return ord($c); }, $tableau_de_caracteres);
function crypte_xor($texte, $code) {
    $tableau_de_caracteres = str_split($texte);
    $table_code = array_map(function($c) { return ord($c); }, str_split($code));
    $codes_ascii = array_map(function($c) { return ord($c); }, $tableau_de_caracteres);
    $chiffre = [];
    foreach ($codes_ascii as $key => $value) {
        echo "$value ^ " . $table_code[$key % count($table_code)] . "<br>";
        $chiffre[$key] = ($value ^ $table_code[$key % count($table_code)]);
    }
    return $chiffre;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        <textarea name="texte" id="texte" cols="30" rows="5"><?= $texte ?></textarea><br>
        <input type="text" name="code" value="<?= $code ?>"/><br>
        <input type="submit" value="crypter" />
        <pre><?php print_r($codes_ascii) ?></pre>
        <pre><?php print_r(crypte_xor($texte, $code)) ?></pre>
    </form>
</body>
</html>