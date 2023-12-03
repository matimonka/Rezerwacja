
<?php
require('sql_connect.php');
function reserve1($Imie, $Nazwisko, $Email, $id_zajec, $termin){
        global $mysqli;

        $Data = $termin;
        

        $sql_2 = "INSERT INTO wynajmujacy (`Imie`, `Nazwisko`, `Email`) VALUES (?,?,?)";
        if ($statement = $mysqli->prepare($sql_2)) {
            if ($statement->bind_param('sss', $Imie, $Nazwisko, $Email)) {
                $statement->execute();
                $id_klienta = $mysqli->insert_id;
                $sql_3 = "INSERT INTO rezerwacja (`Data`, `id_klienta`, `id_zajec`) VALUES (?,?,?)";

                if ($statement_2 = $mysqli->prepare($sql_3)) {
                    if ($statement_2->bind_param('sii', $Data, $id_klienta, $id_zajec)) {
                        $statement_2->execute();
                        header("Location:index.php");
                    }
                }
            }
        } else {
            die('Niepoprawne zapytanie');
        }
    }

if (!empty($_POST)) {

    $Imie = ($_POST['Imie']);
    $Nazwisko = ($_POST['Nazwisko']);
    $Email = ($_POST['Email']);
    $id_zajec = ($_POST['sport']);
    $termin = ($_POST['date']);

    
    reserve1($Imie, $Nazwisko, $Email, $id_zajec, $termin);

}

?>
