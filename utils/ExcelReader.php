<?php

namespace app\utils;

use Yii;

class ExcelReader
{
    public $data = [];
    public $columnCount = 0;
    public $columns = [];
    
    public static function read($filename)
    {
        $path = Yii::$app->basePath . "/uploads/" . $filename;
        
        $objReader = \PHPExcel_IOFactory::createReaderForFile($path);
        //$objReader->setLoadSheetsOnly($sheets);
        $objReader->setReadDataOnly(true);

        $objPHPExcel = $objReader->load($path);
        $reader = new ExcelReader();
        
        foreach ($objPHPExcel->setActiveSheetIndex(0)->getRowIterator() as $row) {
            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(false);
            
            $rowData = [];
            foreach ($cellIterator as $cell) {
                if (!is_null($cell)) {
                    $rowData[] = $cell->getCalculatedValue();
                }
            }
            
            $reader->data[] = $rowData;
        }
        
        $reader->columnCount = count($reader->data[0]);
        $colrange = range(0, $reader->columnCount - 1);
        foreach ($colrange as $column)
            $reader->columns[] = strval($column);
                
        return $reader;
    }
}