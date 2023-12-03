<?php
require('sql_connect.php');

function reserve1($Imie, $Nazwisko, $Email, $id_zajec, $termin){
    global $mysqli;

    $Data = $termin;

    $sql = "SELECT Cena FROM zajecia WHERE id_zajec = $id_zajec";
    $result = $mysqli->query($sql);
    $row = $result->fetch_row();
    $Cena = $row[0];
    $Koszt = $Cena;

    $sql_2 = "INSERT INTO wynajmujacy (`Imie`, `Nazwisko`, `Email`) VALUES (?,?,?)";
    if($statement = $mysqli->prepare($sql_2)){
        if($statement->bind_param('sss',$Imie,$Nazwisko,$Email)){
            $statement->execute();
            $id_klienta = $mysqli->insert_id;
            $sql_3 = "INSERT INTO rezerwacja (`Data`, `id_klienta`, `id_zajec`, `Koszt`) VALUES (?,?,?,?)";

            if($statement_2 = $mysqli->prepare($sql_3)){
                if($statement_2->bind_param('siii', $Data,$id_klienta,$id_zajec,$Koszt)){
                    $statement_2->execute();
                    header("Location:index.php");
                }
            }
        }
    } else{
        die('Niepoprawne zapytanie');
    }
    


 } 
?>