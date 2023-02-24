<?php

class location extends Controller
{
    public function cityRest($districtName = null)
    {
        $data = $this->model('viewModel')->getCities($districtName);
        $json = array();
        while ($row = $data->fetch_assoc()) {
            $array['CityName'] = $row['CityName'];
            $array['DistrictName'] = $row['DistrictName'];
            array_push($json, $array);
        }
        $json_response = json_encode($json);
        echo $json_response;
    }

    public function districtRest($provinceName = null)
    {
        $data = $this->model('viewModel')->getDistricts($provinceName);
        $json = array();
        while ($row = $data->fetch_assoc()) {
            $array['DistrictName'] = $row['DistrictName'];
            $array['ProvinceName'] = $row['ProvinceName'];
            array_push($json, $array);
        }
        $json_response = json_encode($json);
        echo $json_response;   
    }

    public function provinceRest()
    {
        $data = $this->model('viewModel')->getProvinces();
        $json = array();
        while ($row = $data->fetch_assoc()) {
            $array['ProvinceName'] = $row['ProvinceName'];
            array_push($json, $array);
        }
        $json_response = json_encode($json);
        echo $json_response;
     //   return $json_response;
    }
}