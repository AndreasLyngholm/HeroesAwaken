<?php

$BASE = 'en';

rmdir('export');
mkdir('export');

$files = glob($BASE . '/*');

foreach ($files as $file)
{
    $data = (include $file);
    $name = basename($file, '.php');
    file_put_contents('export/'.$name.'.json', json_encode($data, JSON_PRETTY_PRINT));
}

?>
