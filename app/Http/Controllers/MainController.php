<?php

namespace App\Http\Controllers;

use App\Repositories\RepositoryInterface;
use App\Strategy\CsvDataSource;
use App\Strategy\StrategyDataSource;
use App\Repositories\ORM\CsvRepository;
use Illuminate\Http\Request;

class MainController extends Controller
{

    /**
     * @var StrategyDataSource
    */
    private $strategyDataSource;

    private $arrayData;

    /**
     * This method __construct is for Depency injection in Service provider
     * That we using of
     * Two binding in AppServiceProvider
     * MainController constructor.
     * @param StrategyDataSource $strategyDataSource
    */
    public function __construct(StrategyDataSource $strategyDataSource)
    {

        $this->strategyDataSource = $strategyDataSource;
        $this->arrayData = $this->strategyDataSource->reader();
    }

    /**
     * Search by Id of csv file
     *
     * @param $array
     * @param $value
     * @return $this
    */
    public function searchById($id)
    {
       return $this->strategyDataSource
                   ->searchById($this->arrayData, $id)
                   ->show();

    }

    /**
     * Search By Country of csv file
     *
     * @param $array
     * @param $value
     * @return $this
    */
    public function searchByCountry($country)
    {

        return $this->strategyDataSource
                    ->searchByCountry($this->arrayData, $country)
                    ->sorting($this->arrayData,'Seniority_level')
                    ->show();

    }

    /**
     * Search By City of csv file
     *
     * @param $array
     * @param $value
     * @return $this
    */
    public function searchByCity($city)
    {

        return $this->strategyDataSource
                    ->searchByCity($this->arrayData, $city)
                    ->sorting($this->arrayData,'Salary')
                    ->show();

    }

    /**
     * MY algoritm for search Best Position of csv file
     *
     * @param $array
     * @param array $skills
     * @return $this
    */
    public function searchByBestPosition(Request $request)
    {
        $data = explode(',',$request->input('skills'));

        return $this->strategyDataSource
                    ->searchBestPosition($this->arrayData,$data)
                    ->show();

    }

}
