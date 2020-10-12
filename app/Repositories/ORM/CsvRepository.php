<?php
namespace App\Repositories\ORM;

use App\Repositories\RepositoryInterface;

/**
 * Class CsvRepository
**/
class CsvRepository implements RepositoryInterface
{
    /**
     * Global array for chaining method
     * And in end use of show()
     *
     * @var array
     */
    public $arrayResult = [];

    /**
     * Read file csv of local path
     *
     * @return array
     */
    public function reader()
    {
        $array = $fields = array();
        $i = 0;
        $handle = fopen(base_path().'\vacancies.csv', "r");

        if ($handle) {
            while (($row = fgetcsv($handle, 4096)) !== false) {
                if (empty($fields)) {
                    $fields = $row;
                    continue;
                }
                foreach ($row as $k => $value) {

                    $array[$i][$fields[$k]] = $value;

                }
                $i++;
            }
            if (!feof($handle)) {
                echo "Error: unexpected fgets() fail\n";
            }
            fclose($handle);
        }


        return $array;
    }


    /**
     * Search by Key and Value
     *
     * @param $array
     * @param $key
     * @param $value
     * @return $this
    */
    public function search($array, $key, $value)
    {
        $sumArray = array();

        foreach ($array as $k=>$subArray) {
            foreach ($subArray as $id=>$val) {
                if($id == $key && strpos($subArray[$key], $value) !== false) {

                    $sumArray[] = $subArray;
                }

            }
        }

        $this->arrayResult[] = $sumArray;
        return $this;
    }


    /**
     * Search by Id of csv file
     *
     * @param $array
     * @param $value
     * @return $this
    */
    public function searchById($array, $value)
    {
        $sumArray = array();

        foreach ($array as $k=>$subArray) {
            foreach ($subArray as $id=>$val) {
                if($id == 'ID' && $subArray['ID']== $value)
                {

                    $sumArray[] = $subArray;
                }

            }
        }

        $this->arrayResult[] = $sumArray;
        return $this;

    }

    /**
     * Search By City of csv file
     *
     * @param $array
     * @param $value
     * @return $this
    */
    public function searchByCity($array, $value)
    {
        $sumArray = array();

        foreach ($array as $k=>$subArray) {
            foreach ($subArray as $id=>$val) {
                if($id == 'City' && $subArray['City']== $value)
                {

                    $sumArray[] = $subArray;
                }

            }
        }

        $this->arrayResult[] = $sumArray;
        return $this;

    }

    /**
     * Search By Country of csv file
     *
     * @param $array
     * @param $value
     * @return $this
    */
    public function searchByCountry($array, $value)
    {
        $sumArray = array();

        foreach ($array as $k=>$subArray) {
            foreach ($subArray as $id=>$val) {
                if($id == 'Country' && $subArray['Country']== $value)
                {

                    $sumArray[] = $subArray;
                }

            }
        }

        $this->arrayResult[] = $sumArray;
        return $this;

    }

    /**
     * MY algoritm for search Best Position of csv file
     *
     * @param $array
     * @param array $skills
     * @return $this
    */
    public function searchBestPosition($array, $skills )
    {
        $res = array();

        foreach($array as $sub){
            $match = true;

            foreach($skills as $val){
                if(stripos($sub["Required_skills"], $val) === false){
                    $match = false;
                    break;
                }
            }
            if($match)
            $res[] = $sub;


        }

        $this->arrayResult[] = $res;
        return $this;

    }

    /**
     * Sort Acending by any key
     *
     * @param $array
     * @param $key
     * @return $this
    */
    public function sorting($array, $key)
    {
        $keys = array_column($array, $key);

        array_multisort($keys, SORT_DESC, $array);

        $this->arrayResult[] = $array;
        return $this;

    }

    /**
     * And in end showing all data of global array 'arrayResult' with this method
     * @return array
    */
    public function show()
    {
        return $this->arrayResult;
    }

    /**
     * Showing all data as Json array
     *
     * @return string
    */
    public function showByJson()
    {
        return json_encode($this->arrayResult);
    }

}