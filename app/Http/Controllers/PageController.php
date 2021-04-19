<?php

namespace App\Http\Controllers;

use App\Antrian;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

class PageController extends Controller
{

    public function index()
    {
        //

            return view('page');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $request->validate(['keperluan'=>'required']);
        $date = Carbon::now()->format('Y-m-d');
        $cek = Antrian::where('keperluan', $request->keperluan)->whereDate('created_at', $date)->orderBy('no_antrian', 'desc')->first();

        $antrian = Antrian::create([
            'no_antrian' => $cek == null ? 0 + 1 : ($cek->no_antrian + 1),
            'keperluan' => $request->keperluan,
            'status' => 0,
        ]);

        $this->print($antrian);

        return response()->json($antrian->toArray());
    }



        public function print($antrian) {

        $date = $antrian->created_at->format('d/m/Y h:i');

        $connector = new WindowsPrintConnector("printerpos");

        /* Print a "Hello world" receipt" */
        $printer = new Printer($connector);
        $printer -> setTextSize(1, 1);
        $center = (Printer::JUSTIFY_CENTER);
        $bold = (Printer::MODE_EMPHASIZED);
        $printer -> setJustification($center);
        $printer -> selectPrintMode($bold);
        $printer -> text("Selamat Datang\n");
        $printer -> text("POLSEK BUBULAN\n");
        $printer -> text("KAMI SIAP MELAYANI ANDA");
        $printer -> setTextSize(1, 1);
        $printer -> feed(1);
        $printer -> setTextSize(1, 1);
        $printer -> setTextSize(2, 2);
        $printer->text(str_pad('', 24, "-")."\n");
        $printer -> setJustification();
        $printer -> setTextSize(1, 1);
        $printer -> text("Tanggal & Waktu : ".$date."\n\n");
        $printer -> setJustification($center);
        $printer -> text("PELAYANAN ".$antrian->keperluan);
        $printer -> feed(2);
        $printer -> text("No Antrian\n");
        $printer -> feed(1);
        $printer -> setTextSize(3, 3);
        $printer -> text($this->keperluan($antrian->keperluan)." ".$antrian->no_antrian);
        $printer -> setTextSize(2,2);
        $printer -> feed(1);
        $printer->text(str_pad('', 24, "-")."\n");
        $printer -> setTextSize(1, 1);
        $printer -> text("Terima Kasih");
        $printer -> feed(1);



        $printer -> cut();

        /* Close printer */
        $printer -> close();

        }


        public function keperluan($keperluan)
        {

            $payload = array(
                'SKCK' => 'A',
                'SKTLK' => 'B',
                'LP' => 'C',
                'IJIN' => 'D',





            );
            return $payload[$keperluan];
        }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

////SKCK//////
    public function nextskck()
    {

        $date = Carbon::now()->format('Y-m-d');


        $cek = Antrian::where([
            ['status', '0'],
            ['keperluan','skck'],
        ])->whereDate('created_at', $date)->orderBy('no_antrian', 'asc')->first();
        $cek->status = '1';

        $cek->save();
        return response()->json($cek);


}

public function recallskck(Request $request)
{


    $date = Carbon::now()->format('Y-m-d');


    $cek = Antrian::where([
        ['status', '1'],
        ['keperluan','skck'],
    ])->whereDate('created_at', $date)->orderBy('no_antrian', 'desc')->first();

    return response()->json($cek);

}


/////////sktlk/////////////
public function nextsktlk()
{
    $date = Carbon::now()->format('Y-m-d');


    $cek = Antrian::where([
        ['status', '0'],
        ['keperluan','sktlk'],
    ])->whereDate('created_at', $date)->orderBy('no_antrian', 'asc')->first();
    $cek->status = '1';

    $cek->save();
    return response()->json($cek);
}

public function recallsktlk(Request $request)
{


    $date = Carbon::now()->format('Y-m-d');


    $cek = Antrian::where([
        ['status', '1'],
        ['keperluan','sktlk'],
    ])->whereDate('created_at', $date)->orderBy('no_antrian', 'desc')->first();

    return response()->json($cek);

}


///////////////LP/////////////////////
public function nextlp()
{


    $date = Carbon::now()->format('Y-m-d');


    $cek = Antrian::where([
        ['status', '0'],
        ['keperluan','lp'],
    ])->whereDate('created_at', $date)->orderBy('no_antrian', 'asc')->first();
    $cek->status = '1';

    $cek->save();
    return response()->json($cek);


}

public function recalllp(Request $request)
{


    $date = Carbon::now()->format('Y-m-d');


    $cek = Antrian::where([
        ['status', '1'],
        ['keperluan','lp'],
    ])->whereDate('created_at', $date)->orderBy('no_antrian', 'desc')->first();

    return response()->json($cek);

}


///////////////////////////sp2hp////////////

public function nextsp2hp()
{


    $date = Carbon::now()->format('Y-m-d');


    $cek = Antrian::where([
        ['status', '0'],
        ['keperluan','sp2hp'],
    ])->whereDate('created_at', $date)->orderBy('no_antrian', 'asc')->first();
    $cek->status = '1';

    $cek->save();
    return response()->json($cek);


}

public function recallsp2hp(Request $request)
{


    $date = Carbon::now()->format('Y-m-d');


    $cek = Antrian::where([
        ['status', '1'],
        ['keperluan','sp2hp'],
    ])->whereDate('created_at', $date)->orderBy('no_antrian', 'desc')->first();

    return response()->json($cek);

}

///////////////////////STTP//////////////////

public function nextsttp()
{


    $date = Carbon::now()->format('Y-m-d');


    $cek = Antrian::where([
        ['status', '0'],
        ['keperluan','sttp'],
    ])->whereDate('created_at', $date)->orderBy('no_antrian', 'asc')->first();
    $cek->status = '1';

    $cek->save();
    return response()->json($cek);


}

public function recallsttp(Request $request)
{


    $date = Carbon::now()->format('Y-m-d');


    $cek = Antrian::where([
        ['status', '1'],
        ['keperluan','sttp'],
    ])->whereDate('created_at', $date)->orderBy('no_antrian', 'desc')->first();

    return response()->json($cek);

}

///////////////////////STTLP//////////////////

public function nextsttlp()
{


    $date = Carbon::now()->format('Y-m-d');


    $cek = Antrian::where([
        ['status', '0'],
        ['keperluan','sttlp'],
    ])->whereDate('created_at', $date)->orderBy('no_antrian', 'asc')->first();
    $cek->status = '1';

    $cek->save();
    return response()->json($cek);


}

public function recallsttlp(Request $request)
{


    $date = Carbon::now()->format('Y-m-d');


    $cek = Antrian::where([
        ['status', '1'],
        ['keperluan','sttlp'],
    ])->whereDate('created_at', $date)->orderBy('no_antrian', 'desc')->first();

    return response()->json($cek);

}


///////////////////////SKLD//////////////////

public function nextskld()
{


    $date = Carbon::now()->format('Y-m-d');


    $cek = Antrian::where([
        ['status', '0'],
        ['keperluan','skld'],
    ])->whereDate('created_at', $date)->orderBy('no_antrian', 'asc')->first();
    $cek->status = '1';

    $cek->save();
    return response()->json($cek);


}

public function recallskld(Request $request)
{


    $date = Carbon::now()->format('Y-m-d');


    $cek = Antrian::where([
        ['status', '1'],
        ['keperluan','skld'],
    ])->whereDate('created_at', $date)->orderBy('no_antrian', 'desc')->first();

    return response()->json($cek);

}

///////////////JSON NOMOR ANTRIAN/////////////////////


public function loadnoantrian()
{

    $date = Carbon::now()->format('Y-m-d');

    $skck = Antrian::where([
        ['status', '1'],
        ['keperluan','skck'],

    ])->whereDate('created_at', $date)->orderBy('no_antrian', 'desc')->first();

    $sktlk = Antrian::where([
        ['status', '1'],
        ['keperluan','sktlk'],

    ])->whereDate('created_at', $date)->orderBy('no_antrian', 'desc')->first();

    $lp = Antrian::where([
        ['status', '1'],
        ['keperluan','lp'],

    ])->whereDate('created_at', $date)->orderBy('no_antrian', 'desc')->first();

    $sp2hp = Antrian::where([
        ['status', '1'],
        ['keperluan','sp2hp'],

    ])->whereDate('created_at', $date)->orderBy('no_antrian', 'desc')->first();


    $sttp = Antrian::where([
        ['status', '1'],
        ['keperluan','sttp'],

    ])->whereDate('created_at', $date)->orderBy('no_antrian', 'desc')->first();

    $sttlp = Antrian::where([
        ['status', '1'],
        ['keperluan','sttlp'],

    ])->whereDate('created_at', $date)->orderBy('no_antrian', 'desc')->first();

    $skld = Antrian::where([
        ['status', '1'],
        ['keperluan','skld'],

    ])->whereDate('created_at', $date)->orderBy('no_antrian', 'desc')->first();


    return response()->json(['skck' =>$skck, 'sktlk' => $sktlk, 'lp' =>$lp, 'sp2hp' => $sp2hp, 'sttp' => $sttp, 'sttlp' => $sttlp, 'skld' => $skld]);



}
}
