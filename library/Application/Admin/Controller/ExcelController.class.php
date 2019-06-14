<?php 

namespace Admin\Controller;


class ExcelController extends CommonController{

	 public function exportExcel($expTitle,$expCellName,$expTableData){
        $fileName = $expTitle.date('_Ymd_His');//or $xlsTitle 文件名称可根据自己情况设定
        $cellNum = count($expCellName);
        $dataNum = count($expTableData);

        vendor("PHPExcel.PHPExcel");

        $objPHPExcel = new \PHPExcel();
        $cellName = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T',);

        // $objPHPExcel->getActiveSheet(0)->mergeCells('A1:'.$cellName[$cellNum-1].'1');//合并单元格
        // $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', $expTitle.'  Export time:'.date('Y-m-d H:i:s'));//第一行标题
        for($i=0;$i<$cellNum;$i++){
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue($cellName[$i].'1', $expCellName[$i][1]);
        }
        // Miscellaneous glyphs, UTF-8
    for($i=0;$i<$dataNum;$i++){
            for($j=0;$j<$cellNum;$j++){
    $objPHPExcel->getActiveSheet(0)->setCellValue( $cellName[$j].($i+2), $expTableData[$i][$expCellName[$j][0]]  );
            }
        }

        header('pragma:public');
        header('Content-type:application/vnd.ms-excel;charset=utf-8;name="'.$xlsTitle.'.xls"');
        header("Content-Disposition:attachment;filename=$fileName.xls");//attachment新窗口打印inline本窗口打印
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');


    }
   function output_user(){//导出Excel
        $xlsName  = "user";
        $xlsCell  = array(
            array('user_id','账户'),
            array('user_pwd','密码'),
            array('user_name','姓名'),
            array('user_sex','性别'),
            array('user_tele','手机号'),
        );
        $xlsModel = M('user');
        $xlsData  = $xlsModel->Field('user_id,user_pwd,user_name,user_sex,user_tele')->select();
        $this->exportExcel($xlsName,$xlsCell,$xlsData);

    }
  public function excel(){
    
        $this->display();
    }

    public function uploadXls(){

        $upload= new \Think\Upload();
        $upload->rootPath='./public/Uploads/';
        $info=$upload->uploadOne($_FILES['excelData']);
        $filename=$upload->rootPath.$info['savepath'].$info['savename'];
        $ext=$info['ext'];

        if($info){
            $this->saveXls($filename,$ext);
        }else{
            $this->error($upload->getError());
        }
    }
    public function saveXls($filename,$ext){
        $books_copy_model=M('books_copy');
        vendor('PHPExcel.PHPExcel');
        $PHPExcel=new \PHPExcel();

        if($exts='xls'){
            Vendor('PHPExcel.PHPExcel.Reader.Excel5');
            $PHPReader=new \PHPExcel_Reader_Excel5();
        }else if($exts='xlsx'){
            Vendor('PHPExcel.PHPExcel.Reader.Excel2007');
            $PHPReader=new \PHPExcel_Reader_Excel2007();
        }
        $PHPExcel=$PHPReader->load($filename);
        $currentSheet=$PHPExcel->getSheet(0);
        $allRow=$currentSheet->getHighestRow();

        $cellName=array(
            
            array('B','book_name'),
            array('C','author'),
            array('D','press'),
            array('E','thumb_picture'),
            array('F','picture'),
            array('G','remark'),
            array('H','now_borrow'),
            array('I','status'),
            );

        $cellNum=count($cellName);

        for($i=2;$i<$allRow;$i++){
            for($j=0;$j<$cellNum;$j++){
        $data[$cellName[$j][1]]=$PHPExcel->getActiveSheet(0)->getCell($cellName[$j][0].$i )->getValue();
            }
            $books_copy_model->add($data);
            
        }
    }
        public function output_books(){

            $book_model=M('books');
            $data=$book_model->select();

            $cellName=array(
                array('A','id'),
                array('B','book_name'),
                array('C','author'),
                array('D','press'),
                array('E','thumb_picture'),
                array('F','picture'),
                array('G','remark'),
                array('H','now_borrow'),
                array('I','status'),
                );
            
            //////////////////////////////////////
            $expTitle='books';
            
        $fileName = $expTitle.date('_Ymd_His');//or $xlsTitle 文件名称可根据自己情况设定
        $cellNum = count($cellName);
        $dataNum = count($data);
        vendor("PHPExcel.PHPExcel");

        $objPHPExcel = new \PHPExcel();
        

        for($i=0;$i<$dataNum;$i++){
            for($j=0;$j<$cellNum;$j++){
             $objPHPExcel->getActiveSheet(0)->setCellValue( $cellName[$j][0].($i+1)  ,$data[$i][$cellName[$j][1]] );
             
             
            }

        }
        
        header('pragma:public');
        header('Content-type:application/vnd.ms-excel;charset=utf-8;name="'.$xlsTitle.'.xls"');
        header("Content-Disposition:attachment;filename=$fileName.xls");//attachment新窗口打印inline本窗口打印
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
        

        }
   public  function output_borrow(){

            $book_model=M('record');
            $data=$book_model->select();

            $cellName=array(
                array('A','book_id'),
                array('B','user_id'),
                array('C','status'),
                );
            
            //////////////////////////////////////
            $expTitle='record';
        $fileName = $expTitle.date('_Ymd_His');//or $xlsTitle 文件名称可根据自己情况设定
        $cellNum = count($cellName);
        $dataNum = count($data);
        vendor("PHPExcel.PHPExcel");
        $objPHPExcel = new \PHPExcel();
    
        for($i=0;$i<$dataNum;$i++){
            for($j=0;$j<$cellNum;$j++){
             $objPHPExcel->getActiveSheet(0)->setCellValue( $cellName[$j][0].($i+1)  ,$data[$i][$cellName[$j][1]] );
            }

        }
        
        header('pragma:public');
        header('Content-type:application/vnd.ms-excel;charset=utf-8;name="'.$xlsTitle.'.xls"');
        header("Content-Disposition:attachment;filename=$fileName.xls");//attachment新窗口打印inline本窗口打印
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
        }
      
        public function output_message(){
            $user_model=M('message');
            $fileName='cc'.date('_Ymd_His');
            $data=$user_model->select();
            $cellName=array(
                array('A','message_id'),
                array('B','user_id'),
                array('C','user_message'),
                array('D','add_date'),
                array('E','user_status'),
                );
            $cellNum=count($cellName);
            $dataNum=count($dataNum);
            vendor("PHPExcel.PHPExcel");
            $objPHPExcel =new \PHPExcel();
            for($i=0;$i<$dataNum;$i++){
                for($j=0;$j<$cellNum;$j++){
            $objPHPExcel->getActiveSheet(0)->setCellValue($cellNum[$j][0].($i+1),$data[$i][$cellName[$j][1]]);
                }
            }
             header('pragma:public');
        header('Content-type:application/vnd.ms-excel;charset=utf-8;name="'.$xlsTitle.'.xls"');
        header("Content-Disposition:attachment;filename=$fileName.xls");//attachment新窗口打印inline本窗口打印
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
        }
          public function output_admin(){
            $admin_model=M('admin');
            $data=$admin_model->select();
            $fileName='admin';
            $cellName=array(
                  array('A','id'),
                  array('B','pwd'),
                  array('C','admin_name'),
                  array('D','admin_status')  
                );
            $cellNum=count($cellName);
            $dataNum=count($data);

            vendor("PHPExcel.PHPExcel");
            $objPHPExcel=new \PHPExcel();
             $objPHPExcel->getActiveSheet(0)->getColumnDimension('A')->setAutoSize(true);
            for($i=0;$i<$dataNum;$i++){
                for($j=0;$j<$cellNum;$j++){
            $objPHPExcel->getActiveSheet(0)->setCellValue( $cellName[$j][0].($i+1)  ,$data[$i][$cellName[$j][1]]) ;
                }
            }
        header('pragma:public');
        header('Content-type:application/vnd.ms-excel;charset=utf-8;name="'.$xlsTitle.'.xls"');
        header("Content-Disposition:attachment;filename=$fileName.xls");//attachment新窗口打印inline本窗口打印
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
        }
        public function out_excel($modelName){
            
            $fileName=$modelName.date("_Ymd_His");
            
            $model=M($modelName);
            $data=$model->select();
            $cellNum=count($data[0]);
            $dataNum=count($data);

            vendor("PHPExcel.PHPExcel");
            $objPHPExcel=new \PHPExcel();

            $indexAll=array();
            foreach($data[0] as $k => $v ){
                $indexAll[]=$k;
            }
            for($i=1;$i<$cellNum;$i++){
                for($j=65,$allCharacter=65+$cellNum;$j<$allCharacter;$j++){
                $objPHPExcel->getActiveSheet(0)->setCellValue(chr($j).$i,$indexAll[$i] );
                $objPHPExcel->getActiveSheet(0)->getColumnDimension(chr($j))->setAutoSize(true);
                }
            }


            $cellName=array();
            for($i=0;$i<$dataNum;$i++){
                $indexNum=0;
                    for($j=65,$allCharacter=65+$cellNum;$j<$allCharacter;$j++){
                        $info=$data[$i][$indexAll[$indexNum]];
                        $cell=chr($j).($i+2);
                
                 $objPHPExcel->getActiveSheet(0)->setCellValue($cell,$info);
                        $indexNum=$indexNum+1;   
                    }
                    
            }
        header('pragma:public');
        header('Content-type:application/vnd.ms-excel;charset=utf-8;name="'.$xlsTitle.'.xls"');
        header("Content-Disposition:attachment;filename=$fileName.xls");//attachment新窗口打印inline本窗口打印
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
        }
        public function out_message(){

            $this->out_excel('message');

        }
        public function out_story(){
            $this->out_excel('story');
        }



   } 
        
      
        // }



    


