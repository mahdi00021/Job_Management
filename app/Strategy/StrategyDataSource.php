<?php
/**
 * Created by PhpStorm.
 * User: MAHDI
 * Date: 10/09/2020
 * Time: 14:54
 */

namespace App\Strategy;


interface StrategyDataSource
{

    public function reader();
    public function search($array, $key, $value);
    public function searchById($array, $value);
    public function searchByCity($array, $value);
    public function searchByCountry($array, $value);
    public function searchBestPosition($array, $skills );
    public function sorting($array,$key);
    public function show();
    public function showByJson();

}