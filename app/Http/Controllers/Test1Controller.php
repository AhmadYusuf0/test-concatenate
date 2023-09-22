<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Test1Controller extends Controller
{
    public function index()
    {
        return view('test1');
    }

    public function action(Request $request)
    {
        $jumlahPerulangan = $request->input('perulangan');
        $countBageConcat = 0;
        $outputArray = [];
        for ($i = 1; $i <= $jumlahPerulangan; $i++) {
            if ($countBageConcat >= 5) {
                break;
            }
            $output = '';
            if ($countBageConcat >= 2) {
                if ($i % 3 == 0) {
                    $output .= 'Concat';
                } elseif ($i % 5 == 0) {
                    $output .= 'Bage';
                }
            } else {
                if ($i % 3 == 0) {
                    $output .= 'Bage';
                }
                if ($i % 5 == 0) {
                    $output .= 'Concat';
                }
            }
            if ($output == 'BageConcat') {
                $countBageConcat++;
            }
            $outputArray[] = $output;
        }
        $data['output'] = $outputArray;
        return view('test1_result', $data);
    }
}
