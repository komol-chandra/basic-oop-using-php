<?php
// echo "hello world";

$name = "komol chandra";

$age         = 'name';
const player = "hi";
// echo $$age;
// echo player; // query string ?q=abc&r=10&p=1;
// http verb
// GET
//POST
//PUT
//PATCH
//DELETE
//ANY
//MATCH
//HEAD
// echo "<pre>";
// // print_r($_SERVER);
// print_r($argv);

// if ($argv[1] == 'serve') {
//     file_put_contents('index.php', '<h1>PHP UP</h1>');
// }

// print_r(exec("rm -rf index.php"));

// for ($i = 0, $j = 0; $i < 10; $i++, $j++) {
//     echo "I is ={$i} and J is = {$j}\n";
// }

$values = ["Active", "Inactive", "Active", "Inactive", "Active", "Inactive", "Active", "Inactive"];
foreach ($values as $value) {
    if ($value == "Inactive") {
        break;
        echo "Running if" . PHP_EOL;
    }
    echo "Active" . PHP_EOL;
    echo "Out of if" . PHP_EOL;

}
