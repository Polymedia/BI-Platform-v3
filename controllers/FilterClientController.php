<?php

namespace app\controllers;

use app\controllers\classes\Filter;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\helpers\StringHelper;
use yii\web\Controller;
use yii\web\View;

class FilterClientController extends BaseDashboardController
{
    public function actionIndex()
    {
        $conn_string = "host=192.168.44.94 port=5432 dbname=bi3 user=postgres password=vAy7swuT";
        $dbconn = pg_connect($conn_string) or die("Невозможно подключиться к БД");;

//        $bigData = [];
//        $years = [2014, 2015, 2016];
//        $groups = [["South", "North"], ["South", "North"], ["South", "North"]];
//        $categories = [
//            ["Electronics", "Mobile", "Cars", "Computers"],
//            ["Electronics", "Mobile", "Cars", "Computers", "Tabs", "Services"],
//            ["Electronics", "Computers", "Tabs"]
//        ];
//        $managers = [
//            ["Roy Smith", "Barbara Wake", "Garry Kleine", "Liz Washington"],
//            ["Roy Smith", "Barbara Wake", "Garry Kleine", "Liz Washington", "Mike Sober"],
//            ["Roy Smith", "Barbara Wake", "Sarah Hails"]
//        ];
//        $start = 12000;
//        for ($j = 0; $j < count($years); $j++) {
//            for ($i = $start + 1000 * $j; $i < $start + 1000 * ($j + 1); $i++) {
//                $row = [
//                    "id" => $i,
//                    "year" => $years[$j],
//                    "country" => $groups[$j][rand(0, count($groups[$j]) - 1)],
//                    "category" => $categories[$j][rand(0, count($categories[$j]) - 1)],
//                    "manager" => $managers[$j][rand(0, count($managers[$j]) - 1)],
//                    "amount" => rand (0,100)
//                ];
//                pg_insert($dbconn, 'filter_client', $row) or die("111");
//            }
//        }

        $result = pg_query($dbconn, "SELECT * FROM filter_client");
        $data = [];
        while($row = pg_fetch_row($result)) {
            array_push($data, [
                    "id" => $row[0],
                    "year" => $row[1],
                    "country" => $row[2],
                    "category" => $row[3],
                    "manager" => $row[4],
                    "amount" => intval($row[5])
                ]
            );
        }

        pg_close($dbconn);

        return $this->render('index.php', [
            'data' => $data
        ]);
    }
}