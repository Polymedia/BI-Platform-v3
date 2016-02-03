<?php

namespace app\utils;

use Yii;

class ExcelReader
{
    public function read($filename)
    {
        $path = Yii::$app->basePath . "/uploads/" . $filename;
        
        $objReader = \PHPExcel_IOFactory::createReaderForFile($path);
        //$objReader->setLoadSheetsOnly($sheets);
        $objReader->setReadDataOnly(true);
        
        $objPHPExcel = $objReader->load($path);
        $highestColumm = $objPHPExcel->setActiveSheetIndex(0)->getHighestColumn();
        $highestRow = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
        
        $data = [];
        foreach ($objPHPExcel->setActiveSheetIndex(0)->getRowIterator() as $row) {
            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(false);
            
            $rowData = [];
            foreach ($cellIterator as $cell) {
                if (!is_null($cell)) {
                    $rowData[] = $cell->getCalculatedValue();
                }
            }
            
            $data[] = $rowData;
        }
        
        return $data;
    }
}