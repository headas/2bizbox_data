<?php
namespace app\index\controller;

use think\Controller;
use app\index\model\Ab;			//客户信息
use app\index\model\Pt_qa;  	//在检
use app\index\model\Pt_onhand;  //成品
use app\index\model\Sois;  		//发货数据

class Index extends Controller
{
    public function index()
    {
    	echo "string";
    }

    public function dz()
    {
    	$result = Ab::where('id','like','%HC%')
    	->select();
    	$this->assign('result', $result);
		return $this->fetch();
    }

    public function fh()
    {
    	$data = array(
    		'P1350' =>'2012300001',
    		'P2350' =>'2010500001',
    		'P3350' =>'2011500001',
    		'P3351' =>'2011500007',
    		'P3550' =>'2011500005',
    		'D3370' =>'2011600001',
    		'P6350' =>'2010100001',
    		'D6370' =>'2011100001',
    		'P7350' =>'2011000001',
    		'P8350' =>'2010200001',
    		'D8370' =>'2011400001',
    		'H6090' =>'2012000001',
    		'H6290' =>'2011700001',
    		'H6390' =>'2010900001',
    		'H9090' =>'2010900004',
    	);
    	$fh 	= [];
    	$num_zuotian  	= null;
    	$num_jintian 	= null;
        $num_benzhou        = null;
        $num_shangzhou      = null;
        $num_benyue         = null;
        $num_shangyue       = null;
        $num_jinnian        = null;
    	foreach ($data as $a => $b) {
    		$zuotian = Sois::whereTime('date_shipped','yesterday')->where('pn',$b)->sum('qty_ship');
    		$jintian = Sois::whereTime('date_shipped','today')->where('pn',$b)->sum('qty_ship');
            $benzhou = Sois::whereTime('date_shipped','week')->where('pn',$b)->sum('qty_ship');
    		$shangzhou = Sois::whereTime('date_shipped','last week')->where('pn',$b)->sum('qty_ship');
    		$benyue = Sois::whereTime('date_shipped','month')->where('pn',$b)->sum('qty_ship');
    		$shangyue = Sois::whereTime('date_shipped','last month')->where('pn',$b)->sum('qty_ship');
            $jinnian =  Sois::whereTime('date_shipped','year')->where('pn',$b)->sum('qty_ship');

    		$fh[] = array(
    			'name' 		=> $a,
    			'liaohao' 	=> $b,
    			'zuotian' 	=> (int)$zuotian,
    			'jintian'	=> (int)$jintian,
                'benzhou'   => (int)$benzhou,
    			'shangzhou'	=> (int)$shangzhou,
    			'benyue'	=> (int)$benyue,
    			'shangyue'	=> (int)$shangyue,
                'jinnian'   => (int)$jinnian
    		);
    		$num_zuotian = $num_zuotian + (int)$zuotian;
    		$num_jintian = $num_jintian + (int)$jintian;
            $num_benzhou = $num_benzhou + (int)$benzhou;
            $num_shangzhou = $num_shangzhou + (int)$shangzhou;
            $num_benyue = $num_benyue + (int)$benyue;
            $num_shangyue = $num_shangyue + (int)$shangyue;
            $num_jinnian = $num_jinnian + (int)$jinnian;

            // echo $num_benyue."</br>";

    		$this->assign('fh', $fh);
    	}

    	$this->assign('num_zuotian', $num_zuotian);
        $this->assign('num_jintian', $num_jintian);
    	$this->assign('num_benzhou', $num_benzhou);
        $this->assign('num_shangzhou', $num_shangzhou);
        $this->assign('num_benyue', $num_benyue);
        $this->assign('num_shangyue', $num_shangyue);
        $this->assign('num_jinnian', $num_jinnian);
    	return $this->fetch();
    }

    public function kc()
    {
    	$data = array(
    		'P1350' =>'2012300001',
    		'P2350' =>'2010500001',
    		'P3350' =>'2011500001',
    		'P3351' =>'2011500007',
    		'P3550' =>'2011500005',
    		'D3370' =>'2011600001',
    		'P6350' =>'2010100001',
    		'D6370' =>'2011100001',
    		'P7350' =>'2011000001',
    		'P8350' =>'2010200001',
    		'D8370' =>'2011400001',
    		'H6090' =>'2012000001',
    		'H6290' =>'2011700001',
    		'H6390' =>'2010900001',
    		'H9090' =>'2010900004',
    	);
		$zj = [];
		$kc = [];
    	$num  	= null;
    	$num1 	= null;
    	foreach ($data as $a => $b){
    		$zaijian = Pt_qa::where('pn',$b)->sum('qty');
    		$kucun = Pt_onhand::where('pn',$b)->field('onhand')->find();
    		// echo $b;
    		// die;
    		$zj[] = array(
    			'name' => $a,
    			'liaohao' => $b,
    			'zaijian' => (int)$zaijian,
    			'kucun' => (int)$kucun->{'onhand'}
    		);
    		$num1 = $num1 + (int)$zaijian;
    		$num = $num + (int)$kucun->{'onhand'};
    		$this->assign('zj', $zj);
    	}
    	$this->assign('num', $num);
    	$this->assign('num1', $num1);
    	return $this->fetch();
    }

    public function kcb()
    {
    	$d = array(
    		'P1350' =>'2012300001',
    		'P2350' =>'2010500001',
    	);
    	echo "string";
        // $benzhou = Sois::whereTime('date_shipped','week')->where('pn','2010500001')->sum('qty_ship');
        // $shangzhou = Sois::whereTime('date_shipped','last week')->where('pn','2010500001')->sum('qty_ship');
        // $benyue = Sois::whereTime('date_shipped','month')->where('pn','2010500001')->sum('qty_ship');
        // $shangyue = Sois::whereTime('date_shipped','last month')->where('pn','2010500001')->sum('qty_ship');
        $jinnian =  Sois::whereTime('date_shipped','year')->where('pn','2010500001')->sum('qty_ship');
    	// $data = Pt_qa::where('pn','in',$d)->sum('qty');
    }

}
