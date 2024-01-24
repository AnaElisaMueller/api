<?php
    require_once __DIR__ . '/variaveis.php';


$pokemonTxt = 'pokemon.txt';



if (!file_exists($pokemonTxt)){ //não existir = "cria"

$apiGet = "https://pokeapi.co/api/v2/pokemon?offset=0&limit=150";

$retornoApi = file_get_contents($apiGet);

file_put_contents($pokemonTxt, $retornoApi);


$atual = 1; //iniciar(pagina) na 1

} else{
 
    $retornoApi = file_get_contents($pokemonTxt);
    file_put_contents($pokemonTxt, $retornoApi);

    $atual = 1;
} 
/*
$min =1;
$max = 10;
$limite = 15; 
*/

$pagina =1;
//transformar em json
$res_json = json_decode($retornoApi);
//$a = array_slice($res_json, $min, $limite);
$p =0;
echo "a";
header('Content-Type: application/json');
//var_dump($res_json);
foreach ($res_json->results as $pokemon) {

  echo  $pokemon->name;
   // echo "\n"; "Nome: " .
   //echo $pagina;
   
   $a[$p] =  $pokemon->name;
   $p++;
  //  echo "URL: " . $ator->url;
//echo "\n";
}/*
if ($atual == 1){
for ($l = 0; $l <= 15; $l++){
 $a[$p];
} 
}*/


var_dump($a);

//var_dump($a);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokemon</title>
</head>
<body>
<main>
        <ol start="<?php echo $atual; ?>">
            <?php
                foreach ($atual as $pokemon=>$name) {
            ?>
                    <li><a href="./pokemon?pagina=<?php echo $atual; ?>" target="_blank"><?php echo ucfirst($name); ?></a></li>
            <?php
                }
            ?>
        </ol>
    </main>

</body>
</html>

