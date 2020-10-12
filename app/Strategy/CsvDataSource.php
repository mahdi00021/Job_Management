<?php
/**
 * Created by PhpStorm.
 * User: MAHDI
 * Date: 10/09/2020
 * Time: 14:56
 */

namespace App\Strategy;


use App\Repositories\ORM\CsvRepository;
use App\Repositories\RepositoryInterface;

class CsvDataSource implements StrategyDataSource
{
    protected $repositoryInterface;

    public function __construct(RepositoryInterface $repositoryInterface)
    {
        $this->repositoryInterface = $repositoryInterface;
    }


    public function search($array, $key, $value)
    {
       return $this->repositoryInterface->search($array, $key, $value);
    }

    public function searchById($array, $value)
    {
       return $this->repositoryInterface->searchById($array, $value);
    }

    public function searchByCity($array, $value)
    {
       return $this->repositoryInterface->searchByCity($array, $value);
    }

    public function searchByCountry($array, $value)
    {
       return $this->repositoryInterface->searchByCountry($array, $value);
    }

    public function searchBestPosition($array, $skills)
    {
       return $this->repositoryInterface->searchBestPosition($array, $skills );
    }

    public function sorting($array, $key)
    {
       return $this->repositoryInterface->sorting($array, $key);
    }

    public function show()
    {
       return $this->repositoryInterface->show();
    }

    public function showByJson()
    {
       return $this->repositoryInterface->showByJson();
    }

    public function reader()
    {
       return $this->repositoryInterface->reader();
    }
}