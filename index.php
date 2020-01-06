<?php



die(json_encode([
    'retcode' => 'success',
    'server'  => $_SERVER,
    'post'    => $_POST
]));
