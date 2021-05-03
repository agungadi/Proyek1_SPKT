<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Antrian;

class CallController extends Controller
{

    public function next()
    {
        $date = Carbon::now()->format('Y-m-d');

        $cek = Antrian::where([
            ['status', '0'],
            ['keperluan','skck'],
        ])->whereDate('created_at', $date)->orderBy('no_antrean', 'asc')->first();


        return response()->json($cek);


    }



    public function monitor()
    {
        $date = Carbon::now()->format('Y-m-d');

        $cek = Antrian::where([
            ['status', '1'],
            ['keperluan','skck'],
        ])->whereDate('created_at', $date)->orderBy('no_antrean', 'asc')->update(['status' => '1'])
        ->first();


    }



    public function skck(Request $request)
    {


        $antrian = Antrian::where([
            ['keperluan', 'skck'],
            ['status', '0'],
            ])->whereDate('created_at', Carbon::today())->get();
        return view('admin.skck', compact('antrian'));
    }

    public function sktlk(Request $request)
    {


        $antrian = Antrian::where([
            ['keperluan', 'sktlk'],
            ['status', '0'],
            ])->whereDate('created_at', Carbon::today())->get();
        return view('admin.sktlk', compact('antrian'));
    }

    public function lp(Request $request)
    {


        $antrian = Antrian::where([
            ['keperluan', 'lp'],
            ['status', '0'],
            ])->whereDate('created_at', Carbon::today())->get();
        return view('admin.lp', compact('antrian'));
    }

    public function ijin(Request $request)
    {


        $antrian = Antrian::where([
            ['keperluan', 'ijin keramaian'],
            ['status', '0'],
            ])->whereDate('created_at', Carbon::today())->get();
        return view('admin.ijin', compact('antrian'));
    }
}


