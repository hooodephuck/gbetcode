<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$jsonString = file_get_contents('jsonFile.json');
$data = json_decode($jsonString, true);

//do edits  {"activity_code":"1","activity_name":"FOOTBALL"}
//if uid = n  and runner = x add a note

$data[0]['activity_name'] = "TENNIS";
// or if you want to change all entries with activity_code "1"
foreach ($data as $key => $entry) {
    if ($entry['activity_code'] == '1') {
        $data[$key]['activity_name'] = "TENNIS";
    }
}

//just create ann entry for each runner only
foreach ($data as $key => $entry) {
    if ($entry['UID'] == '1') {
        
    }
}