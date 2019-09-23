<?php

    $excelApp = new COM("Excel.Application");
    $excelApp->Visible = true;

    $excelFile = $excelApp->WorkBooks->Add();

    $workSheet = $excelFile->WorkSheets("Sheet1");

    include "../../config/connection.php";

    include "functions.php";

    $products = getAllProducts();

    $br = 0;

    $count = count($products);

    for($i = 1; $i < $count+1; $i++){
        if($br == $count) break;

        $polje = $workSheet->Range("A".$i);
        $polje->activate;

        $polje->Value = $products[$br]->naziv;

        $polje = $workSheet->Range("B".$i);
        $polje->activate;

        $polje->Value = $products[$br]->cena;

        $polje = $workSheet->Range("C".$i);
        $polje->activate;

        $polje->Value = $products[$br]->opis;

        $polje = $workSheet->Range("D".$i);
        $polje->activate;

        $polje->Value = $products[$br]->sastojci;
        $br++;
    }

    $excelFile->_SaveAs("Proizvodi". time() . ".xlsx");

    $excelFile->Save();

    header("location:../../index.php?page=adminProizvod");

