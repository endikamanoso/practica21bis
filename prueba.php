<?php
header('Content-Type: application/json');
$data = ['id' => "ejemplo", 'name' => "ejemplo2", 'email' => "ejemplo3"];
echo json_encode($data);