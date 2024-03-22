<?php

class Skaiciavimai {
    public function skaiciuz($x) {
        $iteracijos = 0;
        $didziausia_reiksme = $x;

        while ($x != 1) {
            if ($x % 2 == 0) {
                $x = $x / 2;
            } else {
                $x = 3 * $x + 1;
            }
            $iteracijos++;

            if ($x > $didziausia_reiksme) {
                $didziausia_reiksme = $x;
            }
        }

        return array("skaicius" => $x, "iteracijos" => $iteracijos, "didziausia_reiksme" => $didziausia_reiksme);
    }

    public function apdorotiIntervala($Pradzia, $Pabaiga) {
        $rezultatai = array();
        $max = 0;
        $min = PHP_INT_MAX;
        $max_reiksmes = array();
        $max_iteracijos = 0;
        $max_iteracijos_skaicius = 0;
        $min_iteracijos_skaicius = 0;

        for ($i = $Pradzia; $i <= $Pabaiga; $i++) {
            $rezultatas = $this->skaiciuz($i);
            $rezultatai[$i] = $rezultatas;

            $iteracijos = $rezultatas['iteracijos'];
            $didziausia_reiksme = $rezultatas['didziausia_reiksme'];

            if ($iteracijos > $max) {
                $max = $iteracijos;
                $max_iteracijos_skaicius = $i;
            }
            if ($iteracijos < $min) {
                $min = $iteracijos;
                $min_iteracijos_skaicius = $i;
            }

            if ($didziausia_reiksme > $max_iteracijos) {
                $max_reiksmes = array($i => $didziausia_reiksme);
                $max_iteracijos = $didziausia_reiksme;
            } elseif ($didziausia_reiksme == $max_iteracijos) {
                $max_reiksmes[$i] = $didziausia_reiksme;
            }
        }

        return array("rezultatai" => $rezultatai, "max_iteracijos" => $max_iteracijos, "max_reiksmes" => $max_reiksmes, "max" => $max, "max_iteracijos_skaicius" => $max_iteracijos_skaicius, "min" => $min, "min_iteracijos_skaicius" => $min_iteracijos_skaicius);
    }

    public function aritmetinesProgresijosSuma($pradzia, $pabaiga, $d) {
        // Aritmetinės progresijos suma: S = n/2 * (pirmas_narys + paskutinis_narys)
        $n = ($pabaiga - $pradzia) / $d + 1;
        $suma = $n / 2 * ($pradzia + $pabaiga);
        return $suma;
    }
}

?>
