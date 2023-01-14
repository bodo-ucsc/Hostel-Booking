<?php

class location extends Controller
{
    public function cityRest($districName)
    {
        $data = $this->model('viewModel')->getCities($districName);
        $json = array();
        while ($row = $data->fetch_assoc()) {
            $array['CityName'] = $row['CityName'];
            $array['DistricName'] = $row['DistricName'];
            array_push($json, $array);
        }
        $json_response = json_encode($json);
        echo $json_response;
    }

    public function DistricRest($provinceName)
    {
        $data = $this->model('viewModel')->getDistrics($provinceName);
        $json = array();
        while ($row = $data->fetch_assoc()) {
            $array['districName'] = $row['districName'];
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
        return $json_response;
    }
}