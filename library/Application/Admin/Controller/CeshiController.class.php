<?php 

namespace Admin\Controller;
use Think\Controller;

class CeshiController extends Controller{

	public function packData(){

		$book_model=M('books');
		$xlsData=$book_model->select();
		
		$xlsCell=array(
				array('id','ID'),
				array('book_name','书名'),
				array('author','作者'),
				array('press','出版社'),
				array('thumb_picture','缩略图'),
				array('picture','图片地址'),
				array('remark','备注'),
				array('now_borrow','现在书被借的人'),
				array('status','状态'),
			);
		$xlsName='书本记录';
		$this->downData($xlsName,$xlsData,$xlsCell);

	}
	public function downData($xlsName,$xlsData,$xlsCell){

		$xlsTitle=iconv('utf-8','gb2312',$xlsName);
		$fileName=$xlsName.date('_Ymd_His');
	
		vendor("PHPExcel.PHPExcel");

		$objPHPExcel=new \PHPExcel();
		$objPHPExcel->getActiveSheet(0)->getColumnDimension('B')->setAutoSize(true);
		$objPHPExcel->getActiveSheet(0)->getColumnDimension('C')->setAutoSize(true);
		$objPHPExcel->getActiveSheet(0)->getColumnDimension('H')->setAutoSize(true);
		$objPHPExcel->getActiveSheet(0)->getColumnDimension('F')->setAutoSize(true);
		$objPHPExcel->getActiveSheet(0)->getColumnDimension('G')->setAutoSize(true);



		$cellName=array('A','B','C','D','E','F','G','H','I');
		$cellNum=count($cellName);
		$dataNum=count($xlsData);

		for($i=0;$i<$cellNum;$i++){
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue($cellName[$i].'1',$xlsCell[$i][1] );
		}
		for($i=0;$i<$dataNum;$i++){
			for($j=0;$j<$cellNum;$j++){
		$objPHPExcel->getActiveSheet(0)->setCellValue($cellName[$j].($i+2),$xlsData[$i][$xlsCell[$j][0]] );
			}
		}

		header('pargma:public');
		header("Content-Disposition:attachment;filename=$fileName.xls");
		$objWriter=\PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel5');
		$objWriter->save('php://output');
		exit;

	}
	  public function excel(){
        $this->display();
    }


    public function data_import($filename, $exts = 'xls',$or)

    {
    	$books_copy_model=M('books_copy');
        //导入PHPExcel类库，因为PHPExcel没有用命名空间，只能inport导入

        vendor('PHPExcel.PHPExcel');

        //创建PHPExcel对象，注意，不能少了\

        $PHPExcel = new \PHPExcel();

        //如果excel文件后缀名为.xls，导入这个类

        if ($exts == 'xls') {
            Vendor('PHPExcel.PHPExcel.Reader.Excel5');
            $PHPReader = new \PHPExcel_Reader_Excel5();

        } else if ($exts == 'xlsx') {

            Vendor('PHPExcel.PHPExcel.Reader.Excel2007');

            $PHPReader = new \PHPExcel_Reader_Excel2007();
        }


        $PHPExcel = $PHPReader->load($filename);

        //获取表中的第一个工作表，如果要获取第二个，把0改为1，依次类推

        $currentSheet = $PHPExcel->getSheet(0);

        //获取总列数

        $allColumn = $currentSheet->getHighestColumn();


        //获取总行数

        $allRow = $currentSheet->getHighestRow();
        
        for ($i=2;$i<=$allRow;$i++){
        	
        	$data=array();
        	$data['book_name']=$PHPExcel->getActiveSheet()->getCell("B".$i)->getValue();
        	$data['author']=$PHPExcel->getActiveSheet()->getCell("C".$i)->getValue();
        	$data['press']=$PHPExcel->getActiveSheet()->getCell("D".$i)->getValue();
        	$data['thumb_picture']=$PHPExcel->getActiveSheet()->getCell("E".$i)->getValue();
        	$data['picture']=$PHPExcel->getActiveSheet()->getCell("F".$i)->getValue();
        	$data['remark']=$PHPExcel->getActiveSheet()->getCell("G".$i)->getValue();
        	$data['now_borrow']=$PHPExcel->getActiveSheet()->getCell("H".$i)->getValue();
        	$data['status']=$PHPExcel->getActiveSheet()->getCell("I".$i)->getValue();
        	
        	
        	$result=$books_copy_model->add($data);
        }

    }
    public function save_info($data){


    }




    public function imports(){  
       

     $upload = new \Think\Upload();
   $upload->maxSize = 3145728;
      $upload->exts = array('xls', 'xlsx');     //允许上传文件的后缀
       $upload->rootPath  = './public/Uploads/'; // 设置附件上传目录    
    	 $info = $upload->uploadOne($_FILES['excelData']);
    	 dump($info); 
		$filename = $upload->rootPath . $info['savepath'] . $info['savename'];
		dump($filename);
            $exts = $info['ext'];   
            dump($exts);
               if (!$info) {// 上传错误提示错误信息        
               $this->error($upload->getError());   
                } else {// 上传成功       
                 $this->data_import($filename, $exts,3);    
             } 
         }


    public function ip(){

        $ip=get_client_ip(1);
        dump($ip);
        $Ip = new \Org\Net\IpLocation('UTFWry.dat'); // 实例化类 参数表示IP地址库文件
        dump($Ip);
        $area = $Ip->getlocation('223.88.237.240');
        dump($area);
        dump($_SERVER['HTTP_CLIENT_IP']);
    }

    public function character(){
        $string1="\x45";

        // $str2="$string1";
        // dump($str2);
        // dump($string1);
        // $string2=$string1+1;
        // dump($string2);
        $str3=chr(65);
        for($i=65;$i<=90;$i++){
            $num=chr($i);
            dump($num);
        }

    }



}