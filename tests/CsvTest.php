<?php
/**
 * Created by PhpStorm.
 * User: MAHDI
 * Date: 10/09/2020
 * Time: 18:31
 */

class CsvTest extends TestCase
{

    public function test_search_by_id()
    {
        $response = $this->call('GET', '/Api/searchById/5');

        $this->assertEquals(200, $response->status());
    }

    public function test_search_By_Country()
    {
        $response = $this->call('GET', '/Api/searchByCountry/ES');

        $this->assertEquals(200, $response->status());
    }

    public function test_search_By_City()
    {
        $response = $this->call('GET', '/Api/searchByCity/Berlin');

        $this->assertEquals(200, $response->status());
    }

    public function test_search_By_Best_Position()
    {
        $response = $this->call('POST', '/Api/searchByBestPosition',['PHP','LAMP','OOP','HTML']);

        $this->assertEquals(200, $response->status());
    }
}