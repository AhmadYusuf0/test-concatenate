<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class Test2Controller extends Controller
{
    public function index()
    {
        $province = $this->getProvince();
        $data['province'] = $province['rajaongkir'];
        return view('test2', $data);
    }

    public function getCity($id_province)
    {
        $client = new Client();
        $content = array(
            'headers'   => [
                'key' => 'ec34cd40c5d0d10f17668377b41fd28e',
            ],
        );
        try {
            $response =  $client->request('GET', 'https://api.rajaongkir.com/starter/city?province='.$id_province, $content);
            return json_decode($response->getBody(), true);
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            try {
                if ($e->getResponse()) {
                    $response = $e->getResponse()->getBody()->getContents();
                    $error = json_decode($response, true);

                    if (!$error) {
                        return $e->getResponse()->getBody();
                    } else {
                        return $error;
                    }
                } else {
                    return ['status' => 'fail', 'messages' => [0 => 'Check your internet connection.']];
                }
            } catch (Exception $e) {
                return ['status' => 'fail', 'messages' => [0 => 'Check your internet connection.']];
            }
        }
    }

    public function getProvince()
    {
        $client = new Client();
        $content = array(
            'headers'   => [
                'key' => 'ec34cd40c5d0d10f17668377b41fd28e',
            ],
        );

        try {
            $response =  $client->request('GET', 'https://api.rajaongkir.com/starter/province', $content);
            return json_decode($response->getBody(), true);
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            try {
                if ($e->getResponse()) {
                    $response = $e->getResponse()->getBody()->getContents();
                    $error = json_decode($response, true);

                    if (!$error) {
                        return $e->getResponse()->getBody();
                    } else {
                        return $error;
                    }
                } else {
                    return ['status' => 'fail', 'messages' => [0 => 'Check your internet connection.']];
                }
            } catch (Exception $e) {
                return ['status' => 'fail', 'messages' => [0 => 'Check your internet connection.']];
            }
        }
    }

    public function action(Request $request)
    {
        $client = new Client();
        $data_post = [
            'origin' => '501',
            'destination' => $request->post('city'),
            'weight' => $request->post('weight'),
            'courier' => $request->post('courier')
        ];
        $content = array(
            'headers'   => [
                'key' => 'ec34cd40c5d0d10f17668377b41fd28e',
            ],
            'json'      => (array) $data_post
        );

        try {
            $response = $client->post('https://api.rajaongkir.com/starter/cost', $content);
            $data['results'] = json_decode($response->getBody());
            return view('test2_result', $data);
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            try {
                if ($e->getResponse()) {
                    $response = $e->getResponse()->getBody()->getContents();
                    if (!is_array($response)) {
                    }
                    session()->flash('message', 'Gagal mencari ongkir karena kesalahan sistem.');
                    return redirect()->back();
                } else {
                    session()->flash('message', 'Check your internet connection.');
                    return redirect()->back();
                }
            } catch (Exception $e) {
                session()->flash('message', 'Check your internet connection.');
                return redirect()->back();
            }
        }
    }
}
