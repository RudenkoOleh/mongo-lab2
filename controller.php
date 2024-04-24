<?php
require_once __DIR__ . "/vendor/autoload.php";
include("connection.php");
echo "<script src='./script.js'></script>";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET["nurse"])) {
        $selectedNurse = $_GET["nurse"];
        $result = $client->dbforlab->shifts->distinct("wardNumbers", ["nurses" => $selectedNurse]);

        if (count($result) == 0) {
            echo("<p>No such ward.</p>");
        } else {
            echo "<table border='1'><thead><th>Ward</th></thead><tbody>";
            foreach ($result as $ward) {
                printf("<tr><td>%s</td></tr>", $ward);
            }
            echo "</tbody></table>";
        }
        echo "<div id='Div'></div>";
        echo "<script>showFromLocalStorage1('$selectedNurse')</script>";
        
        $json = json_encode($result);
        echo "<script>saveToLocalStorage('$selectedNurse', $json)</script>";
    }

    if (isset($_GET["department"]) && isset($_GET["shift"])) {
        $selectedDepartment = $_GET["department"];
        $selectedShift = $_GET["shift"];
        
        $result = $client->dbforlab->shifts->find(["department" => $selectedDepartment, "shift"=>$selectedShift ]);
        $shifts = [];
        foreach ($result as $shift) {
            $shifts[] = $shift;
        }

        if (count($shifts) == 0) {
            echo("<p>No such shifts.</p>");
        } else {

            echo "<table border='1'><thead><th>Shift</th><th>Date</th><th>Nurses</th><th>Department</th><th>Ward Numbers</th></thead><tbody>";

            foreach ($shifts as $shift) {
                echo "<tr>";
                echo "<td>" . $shift['shift'] . "</td>";
                echo "<td>" . $shift['date'] . "</td>";
                echo "<td>";
                foreach ($shift['nurses'] as $nurse) {
                    echo $nurse . "<br>";
                }
                echo "</td>";
                echo "<td>" . $shift['department'] . "</td>";
                echo "<td>";
                foreach ($shift['wardNumbers'] as $wardNumber) {
                    echo $wardNumber . "<br>";
                }
                echo "</td>";
                echo "</tr>";
            }

            echo "</tbody></table>";
        }

        echo "<div id='Div'></div>";
        echo "<script>showFromLocalStorage3('$selectedDepartment,$selectedShift')</script>";

        $json = json_encode($shifts);
        echo "<script>saveToLocalStorage('$selectedDepartment,$selectedShift', $json)</script>";

    } elseif(isset($_GET["department"])){ 
        $selectedDepartment = $_GET["department"];
        $result = $client->dbforlab->shifts->distinct("nurses", ["department" => $selectedDepartment]);

        if (count($result) == 0) {
            echo("<p>No such department.</p>");
        } else {

            echo "<table border='1'><thead><th>Nurses</th></thead><tbody>";
            foreach ($result as $department) {
                printf("<tr><td>%s</td></tr>", $department);
            }
            echo "</tbody></table>";
        }
        echo "<div id='Div'></div>";
        echo "<script>showFromLocalStorage2('$selectedDepartment')</script>";

        $json = json_encode($result);
        echo "<script>saveToLocalStorage('$selectedDepartment', $json)</script>";
    }
}