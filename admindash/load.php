
<?php

include 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

$conn = mysqli_connect("localhost","root","","e-project");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $reader = IOFactory::createReader('Xlsx');

    $sheet = $reader->load($_FILES["excel"]["tmp_name"]);

    //Convert in HTML
  //  $writer = IOFactory::createWriter($sheet,'Html');
 //   $mess = $writer->save('php://output');

    //get Cell Value by name
 //   $cellValue = $sheet->getActiveSheet()->getCell('A4')->getCalculatedValue();

    //get cell value by rows and columns
  //  $cv2 = $sheet->getActiveSheet()->getCellByColumnAndRow(2, 5)->getValue();

    //get number of rows
    $num_rows = $sheet->getActiveSheet()->getHighestRow();
    echo $num_rows;
    for($i = 1 ; $i <= $num_rows ; $i++){
        $col = $sheet->getActiveSheet()->getCellByColumnAndRow(1, $i)->getValue();
        $col2 = $sheet->getActiveSheet()->getCellByColumnAndRow(2, $i)->getValue();
        $col3 = $sheet->getActiveSheet()->getCellByColumnAndRow(3, $i)->getValue();
        $col4 = $sheet->getActiveSheet()->getCellByColumnAndRow(4, $i)->getValue();
        $col5 = $sheet->getActiveSheet()->getCellByColumnAndRow(5, $i)->getValue();
//        $col3 = $sheet->getActiveSheet()->getCellByColumnAndRow(3, $i)->getValue();


        mysqli_query($conn,"INSERT INTO c_status VALUES(NULL,'$col','$col2','$col3',' $col4',' $col5)");

    }

}

//echo $mess;

print_r($mess);
print_r($cellValue);
print_r($cv2);



?>