<?php

    $excelApp = new COM("Application.Excel");
    $excelApp->visible = true;

    $excelFile = $excelApp->WorkBooks->Add();

    $workSheet = $excelFile->WorkSheets("Sheet1");

    $polje = $workSheet->Range("A1");
    $polje->activate;
    $polje->value = "blabla";

    $excelFile->_SaveAs("blabla");

    