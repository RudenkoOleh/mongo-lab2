<?php
$client = new MongoDB\Client("mongodb://localhost:27017");

$departments = $client->dbforlab->shifts->distinct("department");
$nurses = $client->dbforlab->shifts->distinct("nurses");
$shifts = $client->dbforlab->shifts->distinct("shift");

function getNursesOptions($nurses ) {
    $options = "";

    foreach ($nurses as $nurse) {
        $options .= "<option value='$nurse'>$nurse</option>";
    }

    return $options;
}

function getDepartmentsOptions($departments) {
    $options = "";

    foreach ($departments as $department) {
        $options .= "<option value='$department'>$department</option>";
    }

    return $options;
}

function getShiftsOptions($shifts){
    $options = "";

    foreach ($shifts as $shift) {
        $options .= "<option value='$shift'>$shift</option>";
    }

    return $options;
}