<?php

include 'Skaiciavimai.php';

class Histograma extends Skaiciavimai {
    public function sudarytiHistograma($Pradzia, $Pabaiga) {
        $rezultatai = $this->apdorotiIntervala($Pradzia, $Pabaiga);
        $histograma = array();

        foreach ($rezultatai['rezultatai'] as $skaicius => $rezultatas) {
            $iteracijos = $rezultatas['iteracijos'];

            if (!isset($histograma[$iteracijos])) {
                $histograma[$iteracijos] = 1;
            } else {
                $histograma[$iteracijos]++;
            }
        }

        return $histograma;
    }

    public function isvestiHistograma($histograma) {
        foreach ($histograma as $iteracija => $daznis) {
            echo "Iteracija: $iteracija ; daznis: $daznis<br>";
        }
    }
}