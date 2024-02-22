<?php

function get_json_data() {
    $raw_data = file_get_contents('php://input');

    return json_decode($raw_data, true);
}

function json_response($data) {
    ob_flush();
    header('Content-Type: application/json');
    echo json_encode($data);
    exit();
}