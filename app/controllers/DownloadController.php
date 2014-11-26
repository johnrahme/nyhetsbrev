<?php


class DownloadController extends BaseController
{
    public $restful = true;

    public function index()
    {
        $results = DB::table('utbildningsutskottet')->get();
        return View::make('nedladdning.index')
            ->with('results', $results)
            ->with('title', 'Nedladdning');
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


        if($typ == 'xls'){
            // i framtiden:

            //https://github.com/Maatwebsite/Laravel-Excel

            // Execute the database query
            $results = DB::table($utskott)->get();

            if (PHP_SAPI == 'cli')
                die('This example should only be run from a Web Browser');

            /** Include PHPExcel */
            require_once 'PHPExcel/PHPExcel.php';


            // Create new PHPExcel object
            $objPHPExcel = new PHPExcel();

            // Set document properties
            $objPHPExcel->getProperties()->setCreator("John Rahme")
                ->setLastModifiedBy("John Rahme");



            $objPHPExcel->setActiveSheetIndex(0);
            $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'ID');
            $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Name');
            $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Email');


            //Detta skulle kunna göras snyggare nån gång
            $rowCount = 2;
            foreach($results as $result){
                // Set cell An to the "name" column from the database (assuming you have a column called name)
                //    where n is the Excel row number (ie cell A1 in the first row)
                $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $result->id);
                // Set cell Bn to the "age" column from the database (assuming you have a column called age)
                //    where n is the Excel row number (ie cell A1 in the first row)
                $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $result->Name);
                $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $result->Email);
                // Increment the Excel row counter
                $rowCount++;
            }

            // Name worksheet
            $objPHPExcel->getActiveSheet()->setTitle('Simple');


            // Set active sheet index to the first sheet, so Excel opens this as the first sheet
            $objPHPExcel->setActiveSheetIndex(0);




            // Redirect output to a client’s web browser (Excel5)
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename='.$filename .'.xlsx');
            header('Cache-Control: max-age=0');
            // If you're serving to IE 9, then the following may be needed
            header('Cache-Control: max-age=1');

            // If you're serving to IE over SSL, then the following may be needed
            header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
            header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
            header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
            header ('Pragma: public'); // HTTP/1.0

            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
            $objWriter->save('php://output');
        }
        else {
                if($utskott == 'utbildningsutskottet'){
                    $table = utbildningsutskottet::all();
                }
                elseif($utskott == 'klubbverket'){
                    $table = klubbverket::all();
                }
                elseif($utskott == 'arbetsmarknadsutskottet'){
                    $table = arbetsmarknadsutskottet::all();
                }
                elseif($utskott == 'idrottsutskottet'){
                    $table = idrottsutskottet::all();
                }
                $output = "id, name, email, Created , Last editet \n";
                foreach ($table as $row) {
                    $output.= implode(",",$row->toArray())."\n";
                }
                $headers = array(
                    'Content-Type' => 'text/csv',
                    'Content-Disposition' => 'attachment; filename='."$filename".'.csv',
                );

                return Response::make(rtrim($output, "\n"), 200, $headers);
        }
        return Redirect::route('download');
    }
}
