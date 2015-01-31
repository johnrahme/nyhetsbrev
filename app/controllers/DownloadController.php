<?php


class DownloadController extends BaseController
{
    public $restful = true;

    public function index()
    {
        $results = DB::table('utbildningsutskottet')->get();
        return View::make('nedladdning.index')
            ->with('results', $results)
            ->with('title', 'Nedladdning')
            ->with('active', 'download');
    }
    public function get(){
        //Sätt up variabler
        $utskott = Input::get('utskott');
        $typ = Input::get('format');
        $filename = $utskott . "-". date("Y-m-d");

        error_reporting(E_ALL);
        ini_set('display_errors', TRUE);
        ini_set('display_startup_errors', TRUE);
        date_default_timezone_set('Europe/London');

        if($utskott == 'utbildningsutskottet'){
            $data = Utbildningsutskottet::all();
        }
        elseif($utskott == 'klubbverket'){
            $data = Klubbverket::all();
        }
        elseif($utskott == 'arbetsmarknadsutskottet'){
            $data = Arbetsmarknadsutskottet::all();
        }
        elseif($utskott == 'idrottsutskottet'){
            $data= Idrottsutskottet::all();
        }

        $file = Excel::create($filename, function($excel) use($data) {

            $excel->sheet('Sheet 1', function($sheet) use($data) {

                $sheet->fromModel($data);
                $sheet->row(1, array(
                    'ID', 'First Name','Email', 'Created at', 'Last updated at'
                ));

            });

        });

        if($typ == 'xls'){
            $file->download('xlsx');
        }
        else {
            $file->download('csv');
        }
        return Redirect::route('download');
    }
}
