<?php

include 'Htmlas.html';
include 'Skaiciavimai.php';

$skaiciavimai = new Skaiciavimai();

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['Pradzia']) && isset($_GET['Pabaiga']) && isset($_GET['Skirtumas'])) {
        $Pradzia = $_GET['Pradzia'];
        $Pabaiga = $_GET['Pabaiga'];
        $Skirtumas = $_GET['Skirtumas'];

        $intervaloRezultatai = $skaiciavimai->apdorotiIntervala($Pradzia, $Pabaiga);
        $aritmetinesProgresijosSuma = $skaiciavimai->aritmetinesProgresijosSuma($Pradzia, $Pabaiga, $Skirtumas);

        foreach ($intervaloRezultatai['rezultatai'] as $skaicius => $rezultatas) {
            echo "Iteracijos, skaiciui $skaicius: {$rezultatas['iteracijos']}, didziausia reiksme: {$rezultatas['didziausia_reiksme']}<br>";
        }

        echo "<p>Daugiausiai iteraciju: {$intervaloRezultatai['max']} (su skaiciumi {$intervaloRezultatai['max_iteracijos_skaicius']})</p>";
        echo "<p>Maziausiai iteraciju: {$intervaloRezultatai['min']} (su skaiciumi {$intervaloRezultatai['min_iteracijos_skaicius']})</p>";
        echo "<p>Skaiciai su didziausia reiksme ({$intervaloRezultatai['max_iteracijos']}): ";
        foreach ($intervaloRezultatai['max_reiksmes'] as $skaicius => $reiksme) {
            echo "$skaicius ";
            echo ", ";
        }

        echo "<p>Aritmetines progresijos suma: $aritmetinesProgresijosSuma</p>";
    }
}

?>