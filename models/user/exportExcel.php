<?php

    $excelApp = new COM("Excel.Application");
    $excelApp->Visible = true;

    $excelFile = $excelApp->WorkBooks->Add();

    $workSheet = $excelFile->WorkSheets("Sheet1");

    include "../../config/connection.php";

    include "functions.php";

    $users = getAllUsers();

    $br = 0;

    $count = count($users);

    for($i = 1; $i < $count+1; $i++){
        if($br == $count) break;

        $polje = $workSheet->Range("A".$i);
        $polje->activate;

        $polje->Value = $users[$br]->korisnickoIme;

        $polje = $workSheet->Range("B".$i);
        $polje->activate;

        $polje->Value = $users[$br]->ime;

        $polje = $workSheet->Range("C".$i);
        $polje->activate;

        $polje->Value = $users[$br]->prezime;

        $polje = $workSheet->Range("D".$i);
        $polje->activate;

        $polje->Value = $users[$br]->uloga;

        $polje = $workSheet->Range("E".$i);
        $polje->activate;

        $polje->Value = $users[$br]->email;
        $br++;
    }

    $excelFile->_SaveAs("Proizvodi". time() . ".xlsx");

    $excelFile->Save();

    header("location:../../index.php?page=adminKorisnici");