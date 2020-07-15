<?php
/**
 * Created by PhpStorm.
 * User: Nurullah ISIK
 * Date: 15.07.2020
 * Time: 13:06
 */

namespace TKGM\Adres;

class AddressProperties extends HttpClient
{
    private $city;
    private $district;
    private $neighborhood;
    private $unit;
    private $page = 1;

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city_name
     */
    public function setCity($city_name): void
    {
        $this->city = $city_name;
    }

    /**
     * @return mixed
     */
    public function getDistrict()
    {
        return $this->district;
    }

    /**
     * @param mixed $district_name
     */
    public function setDistrict($district_name): void
    {
        $this->district = $district_name;
    }

    /**
     * @return mixed
     */
    public function getNeighborhood()
    {
        return $this->neighborhood;
    }

    /**
     * @param mixed $neighborhood_name
     */
    public function setNeighborhood($neighborhood_name): void
    {
        $this->neighborhood = $neighborhood_name;
    }

    /**
     * @return mixed
     */
    public function getUnit()
    {
        return $this->unit;
    }

    /**
     * @param mixed $unit_name
     */
    public function setUnit($unit_name): void
    {
        $this->unit = $unit_name;
    }

    /**
     * @return int
     */
    public function getPage(): int
    {
        return $this->page;
    }

    /**
     * @param int $page
     */
    public function setPage(int $page): void
    {
        $this->page = $page;
    }


}