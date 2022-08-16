<?php

$r = mt_rand(1,255);
$g = mt_rand(1,255);
$b = mt_rand(1,255);
$rgb = 'rgb('.$r.','.$g.','.$b.');';


// $dateOne = date('Y-m-d', strtotime("+10 day"));
// $dateTwo = date('Y-m-d', strtotime('+1 month'));

// print_r([$dateOne,$dateTwo]);

// exit();
 function getDynamicFilterDate($dateType, $parameterOne = '+0', $parameterTwo = '')
    {
        switch ($dateType) {
            case 'day':
                $startDate = date('Y-m-d 00:00:00', strtotime($parameterOne . $dateType));
                $endDate = date('Y-m-d 23:59:59', strtotime($parameterOne . $dateType));
                break;
            case 'week':
                $today = strtotime(date('Y-m-d'));
                $weekday = date('w') == 0 ? 7 : date('w');
                $monday = $today - ($weekday - 1) * 3600 * 24;
                $sunday = $monday + 7 * 24 * 3600  - 1;
                $startDate = date('Y-m-d 00:00:00', strtotime($parameterOne . $dateType, $monday));
                $endDate = date('Y-m-d 23:59:59', strtotime($parameterOne . $dateType, $sunday));
                break;
            case 'month':
                $startDate  = date('Y-m-01 00:00:00', strtotime($parameterOne . $dateType));
                $endDate = date('Y-m-t 23:59:59', strtotime($parameterOne . $dateType));
                break;
            case 'quarter':
                $season = ceil(date('n') / 3); //获取当前月份的季度 
                $start = ($season - 1);
                $end = $season;
                if (!empty($parameterOne)) {
                    $num = abs($parameterOne);
                    $strpos =  strpos($parameterOne, '-');
                    // 检测字符
                    if ($strpos !== false) {
                         $start = ($season - 1) - $num;
                         $end = $season - $num;
                    } else {
                        $start = ($season - 1) + $num;
                        $end = $season + $num;
                    }
                }
                $startDate = date('Y-m-t H:i:s', mktime(0, 0, 0, $start * 3 + 1, 1, date('Y')));
                $endDate = date('Y-m-t H:i:s', mktime(23, 59, 59, $end * 3, 1, date('Y')));
                break;
            case 'year':
                $startDate = date('Y-01-01 00:00:00', strtotime($parameterOne . $dateType));
                $endDate = date('Y-12-31 23:59:59', strtotime($parameterOne . $dateType));
                break;
            case 'custom':
                // 自定义处理                
                $dateOne = date('Y-m-d', strtotime($parameterOne));
                $dateTwo = date('Y-m-d', strtotime($parameterTwo));
                if (strtotime($dateOne) > strtotime($dateTwo)) {
                    $startDate = date('Y-m-d 00:00:00', strtotime($dateTwo));
                    $endDate = date('Y-m-d 23:59:59', strtotime($dateOne));
                } else {
                    $startDate = date('Y-m-d 00:00:00', strtotime($dateOne));
                    $endDate = date('Y-m-d 23:59:59', strtotime($dateTwo));
                }
                break;
            default:
                break;
        }
        // return [$startDate, $endDate];
        print_r([$startDate, $endDate]);
      }

// getDynamicFilterDate('custom', '+10 day','-1 month');
getDynamicFilterDate('custom', '+10 day' , ' -10 month');






exit();




$array = [
       [
            "_widget_16581103257026062"=>"2022-07-18 00:00:00",
            "year"=>"2022",
            "month"=>7,
            "_widget_16581103223893036"=>"测试-1",
            "count"=>1,
            "_widget_16581103238342356"=>"1"
       ],
       [
            "_widget_16581103257026062"=>"2022-06-15 00:00:00",
            "year"=>"2022",
            "month"=>6,
            "_widget_16581103223893036"=>"测试-3",
            "count"=>1,
            "_widget_16581103238342356"=>"3"
       ],
       [
            "_widget_16581103257026062"=>"2022-04-14 00:00:00",
            "year"=>"2022",
            "month"=>4,
            "_widget_16581103223893036"=>"测试-4",
            "count"=>1,
            "_widget_16581103238342356"=>"4"
       ],
       [
            "_widget_16581103257026062"=>"2021-12-10 00:00:00",
            "year"=>"2021",
            "month"=>12,
            "_widget_16581103223893036"=>"测试-10",
            "count"=>1,
            "_widget_16581103238342356"=>"10"
       ],
       [
            "_widget_16581103257026062"=>"2021-10-15 00:00:00",
            "year"=>"2021",
            "month"=>10,
            "_widget_16581103223893036"=>"测试-5",
            "count"=>1,
            "_widget_16581103238342356"=>"5"
       ],
       [
            "_widget_16581103257026062"=>"2021-09-16 00:00:00",
            "year"=>"2021",
            "month"=>9,
            "_widget_16581103223893036"=>"测试-6",
            "count"=>1,
            "_widget_16581103238342356"=>"6"
       ],
       [
            "_widget_16581103257026062"=>"2021-07-19 00:00:00",
            "year"=>"2021",
            "month"=>7,
            "_widget_16581103223893036"=>"测试-2",
            "count"=>1,
            "_widget_16581103238342356"=>"2"
       ],
       [
            "_widget_16581103257026062"=>"2021-07-18 00:00:00",
            "year"=>"2021",
            "month"=>7,
            "_widget_16581103223893036"=>"测试-8",
            "count"=>1,
            "_widget_16581103238342356"=>"8"
       ],
       [
            "_widget_16581103257026062"=>"2021-06-19 00:00:00",
            "year"=>"2021",
            "month"=>6,
            "_widget_16581103223893036"=>"测试-9",
            "count"=>1,
            "_widget_16581103238342356"=>"9"
       ],
       [
            "_widget_16581103257026062"=>"2021-01-17 00:00:00",
            "year"=>"2021",
            "month"=>1,
            "_widget_16581103223893036"=>"测试-7",
            "count"=>1,
            "_widget_16581103238342356"=>"7"
       ]
    ];
function gen_one_to_three($array) {
    for ($i = 0; $i < count($array); $i++) {
        //注意变量$i的值在不同的yield之间是保持传递的。
        yield $array[$i];
    }
}

$generator = gen_one_to_three($array);


foreach ($generator as $value) {
  print_r($value);
}





exit();


   
    $yFields = [
      ['field_code' => '_widget_16581103223893036'],
      ['field_code' => 'month'],
      ['field_code' => '_widget_16581103238342356'],
    ];
// $keys= array_column($yFields,'field_code');
   foreach ($yFields as $key => $yVal) {
        $keys[$yVal['field_code']] =  count(array_column($array, null, $yVal['field_code']));
    }

// rsort($keys);
print_r(max($keys));

exit;
$arr = [
  ['field_code' => '_widget_16581103257026062'],
  ['field_code' => '_widget_16581103223893036'],
  ['field_code' => '_widget_16581103238342356'],
];

$code = array_merge(['_widget_16581103238654321','_widget_16581103257123456'], array_column($arr,'field_code'));


print_r($code);



exit();




$arr = [
       [
            "_widget_16581103257026062"=>"2022-07-18 00:00:00",
            "year"=>"2022",
            "month"=>7,
            "_widget_16581103223893036"=>"测试-1",
            "count"=>1,
            "_widget_16581103238342356"=>"1"
       ],
       [
            "_widget_16581103257026062"=>"2022-06-15 00:00:00",
            "year"=>"2022",
            "month"=>6,
            "_widget_16581103223893036"=>"测试-3",
            "count"=>1,
            "_widget_16581103238342356"=>"3"
       ],
       [
            "_widget_16581103257026062"=>"2022-04-14 00:00:00",
            "year"=>"2022",
            "month"=>4,
            "_widget_16581103223893036"=>"测试-4",
            "count"=>1,
            "_widget_16581103238342356"=>"4"
       ],
       [
            "_widget_16581103257026062"=>"2021-12-10 00:00:00",
            "year"=>"2021",
            "month"=>12,
            "_widget_16581103223893036"=>"测试-10",
            "count"=>1,
            "_widget_16581103238342356"=>"10"
       ],
       [
            "_widget_16581103257026062"=>"2021-10-15 00:00:00",
            "year"=>"2021",
            "month"=>10,
            "_widget_16581103223893036"=>"测试-5",
            "count"=>1,
            "_widget_16581103238342356"=>"5"
       ],
       [
            "_widget_16581103257026062"=>"2021-09-16 00:00:00",
            "year"=>"2021",
            "month"=>9,
            "_widget_16581103223893036"=>"测试-6",
            "count"=>1,
            "_widget_16581103238342356"=>"6"
       ],
       [
            "_widget_16581103257026062"=>"2021-07-19 00:00:00",
            "year"=>"2021",
            "month"=>7,
            "_widget_16581103223893036"=>"测试-2",
            "count"=>1,
            "_widget_16581103238342356"=>"2"
       ],
       [
            "_widget_16581103257026062"=>"2021-07-18 00:00:00",
            "year"=>"2021",
            "month"=>7,
            "_widget_16581103223893036"=>"测试-8",
            "count"=>1,
            "_widget_16581103238342356"=>"8"
       ],
       [
            "_widget_16581103257026062"=>"2021-06-19 00:00:00",
            "year"=>"2021",
            "month"=>6,
            "_widget_16581103223893036"=>"测试-9",
            "count"=>1,
            "_widget_16581103238342356"=>"9"
       ],
       [
            "_widget_16581103257026062"=>"2021-01-17 00:00:00",
            "year"=>"2021",
            "month"=>1,
            "_widget_16581103223893036"=>"测试-7",
            "count"=>1,
            "_widget_16581103238342356"=>"7"
       ]
    ];

   
    $yFields = [
      ['field_code' => '_widget_16581103223893036'],
      ['field_code' => 'month'],
      ['field_code' => '_widget_16581103238342356'],
    ];
   
    $metrics = [
      ['field_code' => '_widget_16581103257026062' ,'field_name' => '萨达'],
      ['field_code' => '_widget_16581103238342356','field_name' => '测试'],
    ];
     $xFields = [
      ['field_code' => '_widget_16581103257026062'],
    ];


$data = [];


// $ydata = [];
foreach($arr as $key => $val){
  foreach ($yFields as $k => $yval) {
      $info[$key][$yval['field_code']] = $val[$yval['field_code']];

  }
}
// $fieldCode = array_column($yFields,'field_code');
// $countNum = count($fieldCode);

// print_r($info);

// exit;

foreach($arr as $key => $val){
  foreach($xFields as $ke => $xval){
    $result['x'][$ke]['data'][] = $val[$xval['field_code']];
  }
  if (empty($yFields)) {
   foreach ($metrics as $ke => $item) {
        if (!isset($result['val'][$ke])) {
            $result['val'][$ke]['data'][] = $val['count'];
            $result['val'][$ke]['sum'] = array_sum(array_column($arr, 'count'));
            $result['val'][$ke]['field_name'] =  $item['field_name'];
            $result['val'][$ke]['field_code'] =  $item['field_code'];
            $result['val'][$ke]['y'] =  array_column($yFields,'field_code');
        } else {
            $result['val'][$ke]['data'][] = $val['count'];
        }
    }
  }else{

    // foreach ($metrics as $ke => $item) {
    //   foreach($info as  $yval){
    //      if(){

    //      }
    //       if (!isset($result['val'][$ke])) {
    //         $result['val'][$ke]['data'][] = $val['count'];
    //         $result['val'][$ke]['sum'] = array_sum(array_column($arr, 'count'));
    //         $result['val'][$ke]['field_name'] =  $item['field_name'];
    //         $result['val'][$ke]['field_code'] =  $item['field_code'];
    //         $result['val'][$ke]['y'] =  array_column($yFields,'field_code');
    //     } else {
    //         $result['val'][$ke]['data'][] = $val['count'];
    //     }
    //   }

    // }
  }

  }
    




foreach($arr as $k => $val){

    foreach($metrics as $ke => $item){

      $y = [];
      foreach($yFields as $key => $yval){
        $y[] = $val[$yval['field_code']];

      }
      
       


        $val[$item['field_code']];





       $rData[$k.'_'.$ke] = [
          'data' => [],
          'field_code' => $item['field_code'],
          'field_name' => $item['field_name'],
          'y' => $y,
        ];
    }
  }

   

print_r($rData);






 print_r($result);


exit();

$field = [
  'field_type' => 'datetime',
  'summary_type' => 'year_quarter',
  'field_code' => [
    '2021-10-11 21:23:43',
    '2020-11-12 21:23:43',
    '2020-12-23 21:23:43',
    '2020-03-03 21:23:43',
    '2020-09-30 21:23:43',
    '2020-09-18 21:23:43',
    '2020-09-26 21:23:43',
    '2022-08-25 21:23:43',
    '2022-07-25 21:23:43',
    '2022-08-12 21:23:43',
    '2022-08-04 21:23:43',
    '2022-07-23 21:23:43',
    '2022-06-05 21:23:43',

  ]
];



  function getMissingTime($field = [], $data = [])
    {
        $dimensionDatetimeSummary = config('configDashboard.dimensionSummary.codeValue.datetime.summaryWay');

        if ($field['field_type'] == 'datetime') {
            // $date =  array_column($data, $field['field_code']);
          $date = $field['field_code'];

            switch ($field['summary_type']) {
                case $dimensionDatetimeSummary['year']:
                    $dateType = 'year';
                    break;
                case $dimensionDatetimeSummary['year_quarter']:
                    $dateType = 'quarter';
                    break;
                case $dimensionDatetimeSummary['year_month']:
                    $dateType = 'month';
                    break;
                case $dimensionDatetimeSummary['year_week']:
                    $dateType = 'week';
                    break;
                case $dimensionDatetimeSummary['year_month_day']:
                    $dateType = 'day';
                    break;
                default:
                    $dateType = 'day';
                    break;
            }
            do {
                $i = 1;
                if (isset($field['field_code']) && $field['field_code'] == 'asc') {
                    $i++;
                    sort($date);
                } else {
                    $i--;
                    rsort($date);
                }
                list($startDate, $endDate) =  $this->getDynamicFilterDate($dateType, '');
            } while (date('Y-m-d', strtotime($startDate)) != date('Y-m-d', strtotime(end($date))));
        }
    }













  

  exit;




$xFields = [
  ['ce' => 'desc'],
  ['sh'=>'asc']
];


exit();

$yFields = [
  ['sort_type' => 'ww:desc' ],
  ['sort_type' => 'ss:asc' ],
];


 $sortProcessing = function ($fields) {
    $sort = [];
    if (!empty($fields)) {
        foreach ($fields as $key => $item) {
            if (!empty($item['sort_type'])) {
                $sortType = explode(':', $item['sort_type']);
                print_r($sortType );
                $sort[$sortType[0]] = $sortType[1];
            }
        }
    }
    return $sort;
};


$sortRow =  $sortProcessing($xFields);
$sortCol =  $sortProcessing($yFields);
$sort =   array_merge($sortRow, $sortCol);


print_r($sort);




exit;
$data = [
['ceshi_1' => 'name_1'],
['ceshi_2' => 'name_2'],

];

$arr = [] ;
foreach ($data as $key => $value) {
array_push($arr, $value);
    
}

print_r($data);

exit();

echo date('Y-m-d H:i:s',mktime(23, 59, 59, 1, 1, date('Y')));echo PHP_EOL;echo date('Y-m-d H:i:s',mktime(0, 0, 0, 1, 1, date('Y')));
exit();

$str = "Hello world. It's a beautiful day.";
var_dump (explode(" ",$str));

$data = implode(',', ['1','2','3']);


  
  print_r($data);




exit();





// DATE_FORMAT(date,'%Y-%U') as date

   function getWeekDate($year,$weekNum,$statisticsStartDate='', $statisticsEndDate = ''){
        $firstDayOfYear=mktime(0, 0, 0, 1, 1, $year);
        $firstWeekDay=date('N', $firstDayOfYear);
        $firstWeekNum=date('W', $firstDayOfYear);
        if ($firstWeekNum==1) {
            $day=(1-($firstWeekDay))+7*($weekNum);
            $startDate=date('Y-m-d', mktime(0, 0, 0, 1, $day, $year));
            $endDate=date('Y-m-d', mktime(0, 0, 0, 1, $day+6, $year));
        } else {
            $day=(8-$firstWeekDay)+7*($weekNum-1);
            $startDate=date('Y-m-d', mktime(0, 0, 0, 1, $day, $year));
            $endDate=date('Y-m-d', mktime(0, 0, 0, 1, $day+6, $year));
        }
        if (date('Y', strtotime($startDate)) != date('Y', strtotime($endDate))) {
            // mysql 按周查询未跨年，第一周与最后一周跨年处理
            if ($weekNum > 50) {
                $endDate = $year.'-12-31';
            } else {
                $startDate = $year.'-01-01';
            }
        }
        // 查询时间处理
        if(!empty($statisticsStartDate) && !empty($statisticsEndDate)){
            if($startDate < $statisticsStartDate && $endDate >= $statisticsStartDate){
                $startDate = $statisticsStartDate;
            }
            if ($startDate < $statisticsEndDate && $endDate >= $statisticsEndDate) {
                $endDate = $statisticsEndDate;
            }
        }
        return $year.'Y '.date('m-d',strtotime($startDate)).'/'.date('m-d',strtotime($endDate));
    }

echo getWeekDate(2022,1);

echo '<hr style="border-width:5px;border-color:'.$rgb.'"/>';


exit();
$arr = [
[
        "module_process_node_line_id"=> 8,
        "module_process_version_id"=> 1,
        "module_id"=> 1,
        "start_node_id"=> 5,
        "end_node_id"=> 9,
        "line_name"=> "测试-8",
        "direction_type"=> "3",
        "condition_type"=> 2,
        "satisfy_type"=> 1,
        "name"=> null,
        "parent"=> [
            [
                "module_process_node_line_id"=> 4,
                "module_process_version_id"=> 1,
                "module_id"=> 1,
                "start_node_id"=> 2,
                "end_node_id"=> 5,
                "line_name"=> "测试-4",
                "direction_type"=> "3",
                "condition_type"=> 2,
                "satisfy_type"=> 1,
                "name"=> null,
                "parent"=> [
                    [
                        "module_process_node_line_id"=> 1,
                        "module_process_version_id"=> 1,
                        "module_id"=> 1,
                        "start_node_id"=> 1,
                        "end_node_id"=> 2,
                        "line_name"=> "测试-1",
                        "direction_type"=> "3",
                        "condition_type"=> 2,
                        "satisfy_type"=> 1,
                        "name"=> null,
                        "parent"=> []
                    ]
                ]
            ]
        ]
    ]
  ];

function getData($arr,&$info = []){
    foreach($arr as $key => $item){
      $info[] = $item['start_node_id'];
      if(isset($item['parent']) && !empty($item['parent'])){
          getData($item['parent'],$info);
      }
    }

    return $info;
}


$ddd = getData($arr);

var_dump($ddd);

exit();

$a = 10;
$b = $a;

// unset($a);
unset($b);


// echo $b;
echo $a;






exit;

$arr = [
  [
    "my_price_landedPriceAmount" => "20",
    "lower_price_landedPriceAmount" => "19",
    "competitive_price_landedPriceAmount" => "20.8",
    "SellerSKU" => "9G-74PD-70VY",
  ],
  [
    "my_price_landedPriceAmount" => "43",
    "lower_price_landedPriceAmount" => "39.99",
    "competitive_price_landedPriceAmount" => "43.19",
    "SellerSKU" => "TO-GO7F-1RJP",
  ],
  [
    "my_price_landedPriceAmount" => null,
    "lower_price_landedPriceAmount" => "9.43",
    "competitive_price_landedPriceAmount" => "9.81",
    "SellerSKU" => "7G-448Q-9OF0",
  ],
  [
    "my_price_landedPriceAmount" => "11.26",
    "lower_price_landedPriceAmount" => "9.55",
    "competitive_price_landedPriceAmount" => "9.97",
    "SellerSKU" => "1B-5VEA-IEDC",
  ],
  [
    "my_price_landedPriceAmount" => "32.39",
    "lower_price_landedPriceAmount" => "32.28",
    "competitive_price_landedPriceAmount" => "32.28",
    "SellerSKU" => "QJ-IGXX-SHFU",
  ],
  [
    "my_price_landedPriceAmount" => "14.99",
    "lower_price_landedPriceAmount" => "9.27",
    "competitive_price_landedPriceAmount" => "9.17",
    "SellerSKU" => "49-ZZCU-AARN",
  ]
];

print_r(array_column($arr,null,'SellerSKU'));





exit();

$box_info = [
    [
      "carton_id" => "FBA001",
      "seller_sku" => "QJ-IGXX-SHFU"
    ],
     [
      
      "shipment_id" => "FBA16GDGGGF3",
      "carton_id" => "FBA001",
    ],
    [
      "carton_id" => "FBA002",
      "seller_sku" => "QJ-IGXX-SHFU"
    ],
     [
      
      "shipment_id" => "FBA16GDGGGF3",
      "carton_id" => "FBA003",
    ],
    [
      "carton_id" => "FBA003",
      "seller_sku" => "QJ-IGXX-SHFU"
    ],
     [
      
      "shipment_id" => "FBA16GDGGGF3",
      "carton_id" => "FBA003",
    ],
];
   
  // $arr_1 = array_column($box_info,null,'carton_id');
  // print_r($arr_1);
  $arr2 = [];
  array_map(function($val) use(&$arr2){

      $arr2[$val['carton_id']][] = $val;

  },$box_info);

  print_r($arr2);

  print_r($box_info);
  // print_r($box_info);






echo '<hr style="border-width:5px;border-color:'.$rgb.'"/>';





die();


$attributes = array();    
$xsdstring = "yourfile.xsd";  
$XSDDOC = new DOMDocument();  
$XSDDOC->preserveWhiteSpace = false; 


if ($XSDDOC->load($xsdstring))  {      
  $xsdpath = new DOMXPath($XSDDOC);      
  $attributeNodes = $xsdpath->query('//xs:simpleType[@name="attributeType"]')->item(0);
  foreach ($attributeNodes->childNodes as $attr){          
    $attributes[ 
      $attr->getAttribute('value') ] = $attr->getAttribute('name');      
    }      
    unset($xsdpath);  
  }  
  print_r($attributes);  





























$arr = [
  [
    'name' => 'ceshi_1',
    'quantity' => 1,
    'quantity_in_case' => 1,
  ],
  
  [
    'name' => 'ceshi_2',
    'quantity' => 2,
    'quantity_in_case' => 2,
  ],
  
  [
    'name' => 'ceshi_3',
    'quantity' => 3,
    'quantity_in_case' => 3,
  ],
  
  [
    'name' => 'ceshi_4',
    'quantity' => 4,
    'quantity_in_case' => 4,
  ],
  
  [
    'name' => 'ceshi_5',
    'quantity' => 5,
    'quantity_in_case' => 5,
  ],
  
];
$arr2 = array_map(function($val){
  return $val;
});


print_r($arr2);

// print_r(array_column($arr, 'quantity_in_case','name'));






echo '<hr style="border-width:5px;border-color:'.$rgb.'"/>';

die();
$message = 'cURL error 77:  (see https://curl.haxx.se/libcurl/c/libcurl-errors.html)';

$arrMessage = explode(' ', $message);

if ($arrMessage[0] == 'cURL') {
    print_r($arrMessage);
}

exit;


echo '<hr style="border-width:5px;border-color:'.$rgb.'"/>';



$a=array("a"=>"red","b"=>"green","c"=>"blue","d"=>"yellow");
print_r(array_rand($a,2));



echo '<hr style="border-width:5px;border-color:'.$rgb.'"/>';

exit;

 function readLog($path,&$files){
    if(!is_dir($path)){
      $dp = dir($path);
      while ($file = $dp->read()) {
        if($file != '.' && $file != '..'){
          readLog($path.'/'.$file,$files);
        }
      }
      $dp->close();
    }
    if(is_file($path)){
      $files[] =  $path;
    }

  }





exit;

// $arr1 = ['PHP', 'a'=>'MySQl'];
// $arr2 = ['PHP', 'MySQl', 'a'=>'HTML', 'CSS'];
// $mergeArr = array_merge($arr1, $arr2);
// $plusArr = $arr1 + $arr2;
// var_dump($mergeArr);
// var_dump($plusArr);

// exit;

// $arr1 = ['PHP', 'apache'];
// $arr2 = ['PHP', 'MySQl', 'HTML', 'CSS'];
// $mergeArr = array_merge($arr1, $arr2);
// $plusArr = $arr1 + $arr2;
// var_dump($mergeArr);
// var_dump($plusArr);





// exit;



// $age=array("Bill"=>"60","Steve"=>"56","Mark"=>"31");
// arsort($age);


// var_dump($age);

// exit;
$arr_1 = [
    ['label_id'        => 2],
    ['label_id'        => 1]
];
$arr_2 = [
    ['education_level' => 1],
    ['education_level' => 2],
    ['education_level' => 3]
];
$arr_3 = [
    [
        'school_id'       => 1,
        'province_id'     => 2,
        'city_id'         => 3,
        'county_id'       => 4,
    ],[
        'school_id'       => 5,
        'province_id'     => 6,
        'city_id'         => 7,
        'county_id'       => 8,
    ],[
     'school_id'       => 9,
        'province_id'     => 10,
        'city_id'         => 11,
        'county_id'       => 12,
    ],[
     'school_id'       => 13,
        'province_id'     => 14,
        'city_id'         => 15,
        'county_id'       => 16,
    ]
];

$arr = ['arr_1' => count($arr_1),'arr_2' => count($arr_2),'arr_3' => count($arr_3)];

print_r($arr);


arsort($arr);


print_r($arr);


exit;


$arr = array_merge($arr_1,$arr_2,$arr_3);


print_r($arr);

print_r($arr_1 + $arr_2 + $arr_3);




$new_arr = [

    'label_id'        => 0,
    'education_level' => 0,
    'school_id'       => 0,
    'province_id'     => 0,
    'city_id'         => 0,
    'county_id'       => 0,


];




echo '<hr style="border-width:5px;border-color:'.$rgb.'"/>';
exit;

$arr =  [
  0 => [
    "id" => 1,
    "name" => "姓名",
    "value" => "哈哈哈2",
  ],
  1 => [
    "id" => 2,
    "name" => "手机号",
    "value" => "15927596309",
  ],
  2 => [
    "id" => 82,
    "name" => "地区",
    "value" => "湖北,武汉",
  ],
  3 => [
    "id" => 1,
    "name" => "性别",
    "value" => "男",
  ],
  4 => [
    "id" => 15928,
    "name" => "学校",
    "value" => "升学在线初中",
  ],
  5 => [
    "id" => "custom0",
    "name" => "多选",
    "value" => "的发给对方很规范和分级分工,1223456,1222555,其他",
  ],
  6 => [
    "id" => "custom1",
    "name" => "复选",
    "value" => "的顶顶顶顶顶多多多多多多多多多多多多多多多多多多多多多多多多多付付付付付付付付付:123456,235435555553的所得税打所多所多所多所多所多所多,所多所多所多所多所多所多所多所多所多所多所多所多所",
  ],
  7 => [
    "id" => "custom2",
    "name" => "填空",
    "value" => "1122",
  ],
  8 => [
    "id" => "custom3",
    "name" => "文本域",
    "value" => "",
  ],
  9 => [
    "id" => "custom4",
    "name" => "单选",
    "value" => "",
  ],
  10 => [
    "id" => "custom5",
    "name" => "省重点高中",
    "value" => "甘肃,广西,湖北",
  ],
  11 => [
    "id" => "custom6",
    "name" => "知名高中",
    "value" => "",
  ],
  12 => [
    "id" => "custom7",
    "name" => "普通高中",
    "value" => "广西,湖南,河北",
  ],
  13 => [
    "id" => "custom8",
    "name" => "普通高中",
    "value" => "",
  ],
  14 => [
    "id" => "custom9",
    "name" => "双一流",
    "value" => "",
  ],
  15 => [
    "id" => "custom10",
    "name" => "双一流",
    "value" => "全部",
  ],
  16 => [
    "id" => "custom11",
    "name" => "重点本科",
    "value" => "",
  ],
  17 => [
    "id" => "custom12",
    "name" => "普通本科",
    "value" => "",
  ],
  18 => [
    "id" => "custom13",
    "name" => "高职高专",
    "value" => "",
  ],
  19 => [
    "id" => "custom14",
    "name" => "参加人数",
    "value" => "12345",
  ],
  20 => [
    "id" => "custom15",
    "name" => "学校入学人数 ",
    "value" => "125555",
  ],
];


print_r(array_values(array_column($arr,'value','name')));





print_r($arr);

echo '<hr style="border-width:5px;border-color:'.$rgb.'"/>';
exit;

 $appleSecret = 'd45e97893a7a4d3b9a990514eacccc2f';
// $goods_id ='com.weefic.measuretools.removeAds';

$code = "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";


 function checkData($appleSecret, $code ,$YII_ENV = 'dev'){
    $jsonData = array('receipt-data' => $code, 'password' => $appleSecret);
    $postJson = json_encode($jsonData);
    if ($YII_ENV != "dev") {
        $url = "https://buy.itunes.apple.com/verifyReceipt";// 正式环境
    } else {
        $url = "https://sandbox.itunes.apple.com/verifyReceipt";// 沙盒环境
    }
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postJson);
    $result = curl_exec($ch);
    curl_close($ch);

    var_dump(json_decode($result),true);
          
}


checkData($appleSecret, $code);



// 返回结果

// object(stdClass)[3]
//   public 'receipt' => 
//     object(stdClass)[1]
//       public 'receipt_type' => string 'ProductionSandbox' (length=17)
//       public 'adam_id' => int 0
//       public 'app_item_id' => int 0
//       public 'bundle_id' => string 'com.weefic.measuretools' (length=23)
//       public 'application_version' => string '6' (length=1)
//       public 'download_id' => int 0
//       public 'version_external_identifier' => int 0
//       public 'receipt_creation_date' => string '2021-01-22 03:08:26 Etc/GMT' (length=27)
//       public 'receipt_creation_date_ms' => string '1611284906000' (length=13)
//       public 'receipt_creation_date_pst' => string '2021-01-21 19:08:26 America/Los_Angeles' (length=39)
//       public 'request_date' => string '2021-01-28 10:53:05 Etc/GMT' (length=27)
//       public 'request_date_ms' => string '1611831185990' (length=13)
//       public 'request_date_pst' => string '2021-01-28 02:53:05 America/Los_Angeles' (length=39)
//       public 'original_purchase_date' => string '2013-08-01 07:00:00 Etc/GMT' (length=27)
//       public 'original_purchase_date_ms' => string '1375340400000' (length=13)
//       public 'original_purchase_date_pst' => string '2013-08-01 00:00:00 America/Los_Angeles' (length=39)
//       public 'original_application_version' => string '1.0' (length=3)
//       public 'in_app' => 
//         array (size=1)
//           0 => 
//             object(stdClass)[2]
//               ...
//   public 'environment' => string 'Sandbox' (length=7)
//   public 'latest_receipt_info' => 
//     array (size=1)
//       0 => 
//         object(stdClass)[4]
//           public 'quantity' => string '1' (length=1)
//           public 'product_id' => string 'com.weefic.measuretools.removeAds' (length=33)
//           public 'transaction_id' => string '1000000767440240' (length=16)
//           public 'original_transaction_id' => string '1000000767440240' (length=16)
//           public 'purchase_date' => string '2021-01-20 11:52:02 Etc/GMT' (length=27)
//           public 'purchase_date_ms' => string '1611143522000' (length=13)
//           public 'purchase_date_pst' => string '2021-01-20 03:52:02 America/Los_Angeles' (length=39)
//           public 'original_purchase_date' => string '2021-01-20 11:52:02 Etc/GMT' (length=27)
//           public 'original_purchase_date_ms' => string '1611143522000' (length=13)
//           public 'original_purchase_date_pst' => string '2021-01-20 03:52:02 America/Los_Angeles' (length=39)
//           public 'is_trial_period' => string 'false' (length=5)
//   public 'latest_receipt' => string 'MIIT1QYJKoZIhvcNAQcCoIITxjCCE8ICAQExCzAJBgUrDgMCGgUAMIIDdgYJKoZIhvcNAQcBoIIDZwSCA2MxggNfMAoCAQgCAQEEAhYAMAoCARQCAQEEAgwAMAsCAQECAQEEAwIBADALAgEDAgEBBAMMATYwCwIBCwIBAQQDAgEAMAsCAQ8CAQEEAwIBADALAgEQAgEBBAMCAQAwCwIBGQIBAQQDAgEDMAwCAQoCAQEEBBYCNCswDAIBDgIBAQQEAgIA4TANAgENAgEBBAUCAwIi4TANAgETAgEBBAUMAzEuMDAOAgEJAgEBBAYCBFAyNTYwGAIBBAIBAgQQCoXmwZwvLZ/cjOVhnxSULzAbAgEAAgEBBBMMEVByb2R1Y3Rpb25TYW5kYm94MBwCAQUCAQEEFPkHlzNR97T6gUj1gUynXFKDOI4kMB4CAQwCAQEEFhYUMjAyMS0wMS0yOFQxMDo1MzowNVowHgIBEgIBAQQWFhQyMDEzLTA4LTAxVDA3'... (length=6776)
//   public 'status' => int 0











echo '<hr style="border-width:5px;border-color:'.$rgb.'"/>';


$new_pw = 'wqdasadsaqq111';



echo '<hr style="border-width:5px;border-color:'.$rgb.'"/>';


 $startTime = date('Y-m-01 00:00:00', strtotime('-1 month'));
        $endTime = date('Y-m-t 23:59:59', strtotime($startTime));


echo $startTime .'====='.$endTime;


echo PHP_EOL;

echo date('Y-m-t');

exit;



echo '<hr style="border-width:5px;border-color:'.$rgb.'"/>';

var_dump(strlen($new_pw));


 echo preg_match("/^[a-zA-Z0-9\+]+$/", $new_pw) ? "true":"false";

// z
// 
                
//             }
            // if (preg_match("/^[a-z\d]*$/i", $new_pw)) {
                
            // }

            exit;

echo '<hr style="border-width:5px;border-color:'.$rgb.'"/>';

$string = '111111asdASD';

var_dump(ctype_alpha($string));
echo PHP_EOL;
var_dump(ctype_alnum($string));
echo PHP_EOL;

var_dump(is_numeric($string));
echo PHP_EOL;




if(ctype_alpha($string) || !ctype_alnum($string) || is_numeric($string)){
    echo "字母或数字或其他符号";
}else{
    echo "字母加数字";
}
// $float =  ctype_alpha($string);

// var_dump($float);
exit;
echo implode(',', ['1','2','3']);


echo '<hr style="border-width:5px;border-color:'.$rgb.'"/>';


$RESULT = 11 + 011 + 0x11;
echo $RESULT;

echo '<hr style="border-width:5px;border-color:'.$rgb.'"/>';


class MyException extends Exception
{
}
try {
    throw new MyException('Oops!');
} catch (Exception $e) {
    echo "Caught Exception\n";
} catch (MyException $e) {
    echo "Caught MyException\n";
}   

exit;
echo '<hr style="border-width:5px;border-color:'.$rgb.'"/>';


$a1=array("Dog","Cat");
$a2=array("Puppy","Kitten");
print_r(array_map(null,$a1,$a2));

echo '<hr style="border-width:5px;border-color:'.$rgb.'"/>';


$arr = [1,2,3,4,5,6,7,8,9,0,10];

$arr_1 = [1,2,3];

$arr_2 = [4,5,6];


var_export(array_diff($arr,$arr_1,$arr_2));





echo '<hr style="border-width:5px;border-color:'.$rgb.'"/>';


exit();
$my_array = array("red","green","blue","yellow","purple");

shuffle($my_array);
print_r($my_array);


echo '<hr style="border-width:5px;border-color:'.$rgb.'"/>';




function qli($tx){
    preg_match_all('/[\x{4e00}-\x{9fa5}a-zA-Z0-9-_*&^%$#@!~`:：‘“。；;\'\".、\ \|]/u',$tx,$jg);
    return join('',$jg[0]);
}


$str = "utf - 8 下|匹配\出中'文字符串\":：";

$ar  = qli($str);

echo $ar;

echo PHP_EOL;





echo '<hr style="border-width:5px;border-color:'.$rgb.'"/>';

exit;


    // $str = "utf-8下匹配出中文字符串";
    // $str = "蕊子💜";

    // $preg = "/[\x{4e00}-\x{9fa5}]+/u";
    // if(preg_match_all($preg,$str,$matches)){
    //     print_r($matches);
    // }

echo '<hr style="border-width:5px;border-color:'.$rgb.'"/>';


$arr = [

[ '10'=>'success' ],
['20'=>'success'],
['30'=>'failed'],
['40'=>'success'],
];

// print_r($arr);

foreach($arr as $key => $value){
// print_r($key);
// print_r($value);
foreach($value as $k => $v){
    
     if($v == 'success'){
        $arr2[] = $k;
     }

}


}

print_r($arr2);






exit;


echo '<hr style="border-width:5px;border-color:'.$rgb.'"/>';



function test($a=0,&$result=array()){
$a++;
echo $a;
echo PHP_EOL;
echo '----';
if ($a<10) {
    $result[]=$a;
    var_dump($result);
    test($a,$result);
}
echo '=======';

echo $a;
echo PHP_EOL;

return $result;

}
test();

echo '<hr style="border-width:5px;border-color:'.$rgb.'"/>';

$client = array (
  4 => 
  array (
    '7f00000108fc00000001' => '7f00000108fc00000001',
    '7f00000108fe00000002' => '7f00000108fe00000002',
  ),
);

$result = [];
array_map(function ($value) use (&$result) {
    $result = array_merge($result, array_values($value));
}, $client);



 // $groupAll = array_map('array_values', $client);






var_export($result);


echo '<hr style="border-width:5px;border-color:'.$rgb.'"/>';




$arr = array (
  '0' => 
  array (
    'room_id' => '45',
    'user_id' => 'undefined',
    'client_name' => 'admin',
    'network_type' => '',
    'client_id' => '7f00000108ff00000001',

  ),
  '1' => 
  array (
    'room_id' => '45',
    'user_id' => '18616961823',
    'client_name' => '柴浩',
    'network_type' => 'undefined',
    'client_id' => '7f00000108fe00000001',

  ),
  '2' => 
  array (
    'room_id' => '45',
    'user_id' => '18616961823',
    'client_name' => '柴浩',
    'network_type' => 'undefined',
    'client_id' => '7f00000108fe00000002',
  ),
);

$arr_1  = array_column($arr,'user_id','client_id');
var_dump($arr_1);
$user_id = ['18616961823'];
// var_export();

var_dump(array_intersect($arr_1,$user_id));



echo '<hr style="border-width:5px;border-color:'.$rgb.'"/>';

echo (124 % 7);

echo '<hr style="border-width:5px;border-color:'.$rgb.'"/>';

$more = (125 % 8);

echo $more;


echo '<hr style="border-width:5px;border-color:'.$rgb.'"/>';


 $mysql= [
        'host' => '127.0.0.1',
        'port' => 3306,
        'user' => 'root',
        'password' => 'yingtao',
        'db_name' => 'erp_dev'
    ];

        
$conn = mysqli_connect($mysql['host'],$mysql['user'],$mysql['password'],$mysql['db_name']);

// 检测连接
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// 数据库链接成功,查询数据

$sql = 'select `id`,`bn` from yty_orders limit 10';

$result = $conn->query($sql);

// var_dump($result);

if ($result->num_rows > 0) {
    // 输出数据
    while($row = $result->fetch_assoc()) {

        // var_dump($row);
        // var_dump((int)$row['id']);
        echo "id: " . $row["id"]. " - order_id: " . $row["bn"]. "<br>";
    }
} else {
    echo "0 结果";
}

// mysql_close();

// print_r($data);



echo '<hr style="border-width:5px;border-color:'.$rgb.'"/>';

$str = '嘎中';
echo mb_strlen($str , 'utf8');



echo '<hr style="border-width:5px;border-color:'.$rgb.'"/>';


echo str_pad(mt_rand(0,8), 2,'0',STR_PAD_LEFT);

echo '<hr style="border-width:5px;border-color:'.$rgb.'"/>';


$arr = [  
   'result' => [
    'err_code' => '0',
    'model' => '234101593394897848^0',
    'msg' => 'OK',
    'success' => true,
  ],
  'request_id' => 'v1lm08h9nl2b',
];


var_export($arr['result']['msg']);

// echo PHP_EOL;


// print_r($arr['result']['msg']);



echo '<hr style="border-width:5px;border-color:'.$rgb.'"/>';



$arr = null;
if($arr > 0){
  echo '0';
}else{
  echo '1';
}

echo '<hr style="border-width:5px;border-color:'.$rgb.'"/>';


$arr = dirname(dirname(dirname(dirname(__DIR__))));

$arr1 = dirname(dirname(dirname(__DIR__)));

$arr2 = dirname(dirname(__DIR__));

$arr3 = dirname(__DIR__);
echo $arr;
echo PHP_EOL;
echo $arr1;
echo PHP_EOL;

echo $arr2;
echo PHP_EOL;

echo $arr3;

echo PHP_EOL;


echo '<hr style="border-width:5px;border-color:'.$rgb.'"/>';

$arr =  [
    [
        'roomID' => 4,
        'userID' => '137',
        'row' => '4',
        'col' => '3',
        'status' => 2,
        'updatetime' => '2020-06-24 10:47:35',
        'data' => [
           'roomID' => 4,
           'userID' => '137',
        ]
    ],
    [
        'roomID' => 3,
        'userID' => '100',
        'row' => 0,
        'col' => 0,
        'status' => 6,
        'updatetime' => '2020-06-24 10:47:35',
        'data' => [
            'roomID' => 3,
        'userID' => '100',
        ]
    ],
];

// $arr2 =array_values($arr);
$arr2 = array_map('array_values', $arr);


var_export($arr2);



echo '<hr style="border-width:5px;border-color:'.$rgb.'"/>';


$arr = [

['room_id' => '1', 'rol' => '1' , 'col' => '1'],
['room_id' => '2', 'rol' => '1' , 'col' => '1'],

['room_id' => '1', 'rol' => '2' , 'col' => '1'],
['room_id' => '2', 'rol' => '3' , 'col' => '1'],
['room_id' => '1', 'rol' => '1' , 'col' => '2'],
['room_id' => '2', 'rol' => '1' , 'col' => '3'],

['room_id' => '1', 'rol' => '2' , 'col' => '4'],
['room_id' => '2', 'rol' => '3' , 'col' => '5'],

['room_id' => '1', 'rol' => '3' , 'col' => '1'],
['room_id' => '2', 'rol' => '4' , 'col' => '1'],

['room_id' => '1', 'rol' => '5' , 'col' => '1'],
['room_id' => '2', 'rol' => '6' , 'col' => '1'],
['room_id' => '1', 'rol' => '7' , 'col' => '2'],
['room_id' => '2', 'rol' => '8' , 'col' => '3'],

['room_id' => '1', 'rol' => '9' , 'col' => '4'],
['room_id' => '2', 'rol' => '1' , 'col' => '5'],


];


var_export(array_column($arr, null));


echo '<hr style="border-width:5px;border-color:'.$rgb.'"/>';


echo 0%100;


echo '<hr style="border-width:5px;border-color:'.$rgb.'"/>';


$str = '123.4..5..5.6.7.8.9..0...0.87..54..2..123';
echo substr_count($str, '.');




echo '<hr style="border-width:5px;border-color:'.$rgb.'"/>';


  $format = 'xls';
 if($format == 'Xls'){
      echo 'xls';
  }else if($format == 'Xlsx'){
      echo 'xlsx';
  }else if($format == 'Csv'){
      echo 'xlsx';
 }else{
      echo 'error';
 }

echo '<hr style="border-width:5px;border-color:'.$rgb.'"/>';


$favfruit="Orange";

switch ($favfruit) {
   case "apple":
     echo "Your favorite fruit is apple!";
     break;
   case "banana":
     echo "Your favorite fruit is banana!";
     break;
   case "orange":
     echo "Your favorite fruit is orange!";
     break;
   default:
     echo "Your favorite fruit is neither apple, banana, or orange!";
}





echo '<hr style="border-width:5px;border-color:'.$rgb.'"/>';


$a = [
  ['id' => 1,'name' => 'name_1' , 'age' => 12],
  ['id' => 2,'name' => 'name_2' , 'age' => 13],
  ['id' => 3,'name' => 'name_3' , 'age' => 14],
  ['id' => 10,'name' => 'name_4' , 'age' => 15],
  ['id' => 4,'name' => 'name_5' , 'age' => 16],
  ['id' => 5,'name' => 'name_6' , 'age' => 17],
  ['id' => 6,'name' => 'name_7' , 'age' => 18],
  ['id' => 7,'name' => 'name_8' , 'age' => 14],
  ['id' => 8,'name' => 'name_9' , 'age' => 15],
  ['id' => 9,'name' => 'name_10' , 'age' => 17],
    ];
    
  $arr =  array_column($a,'name','id');
  
  var_export($arr);


echo '<hr style="border-width:5px;border-color:'.$rgb.'"/>';

$diff = array_diff(['3','4','5'],['2','3','4'],['1','2','3']);

var_export($diff);


echo '<hr style="border-width:5px;border-color:'.$rgb.'"/>';



// var_export()

$a = array (1, 2, array ("a", "b", "c"));
$aa = var_export ($a);
/* 输出：
array (
  0 => 1,
  1 => 2,
  2 => 
  array (
    0 => 'a',
    1 => 'b',
    2 => 'c',
  ),
)
*/
echo PHP_EOL;
$b = 3.1;
$v = var_export($b, TRUE);
echo $v;

echo PHP_EOL;
$c = [123.1,'2'];
var_export($c);

/* 输出：3.1*/


//print_r()函数打印出变量易于理解的信息
$array = array(
	array('1','2','3','4','5','6','7','8','9','10'),
	'string',
	'float',
	array('a','b','c','d','e','f','g','h')
);
$float = 12.00;
$string = '这是一个字符串';
 
//print_r($array);
//以上输出
// Array
// (
// 		[0] => Array
// 		(
// 				[0] => 1
// 				[1] => 2
// 				[2] => 3
// 				[3] => 4
// 				[4] => 5
// 				[5] => 6
// 				[6] => 7
// 				[7] => 8
// 				[8] => 9
// 				[9] => 10
// 		)
 
// 		[1] => string
// 		[2] => float
// 		[3] => Array
// 		(
// 				[0] => a
// 				[1] => b
// 				[2] => c
// 				[3] => d
// 				[4] => e
// 				[5] => f
// 				[6] => g
// 				[7] => h
// 		)
 
// )
 
$newArray = print_r($array,true);//这个不会输出，而是把输出的内容返回给变量$newArray
 
//var_dump()打印出变量相关的信息
var_dump($float,$string,$array);
//以上会输出
// float(12)
// string(21) "这是一个字符串"
// array(4) {
// 	[0]=>
// 	array(10) {
// 		[0]=>
// 		string(1) "1"
// 		[1]=>
// 		string(1) "2"
// 		[2]=>
// 		string(1) "3"
// 		[3]=>
// 		string(1) "4"
// 		[4]=>
// 		string(1) "5"
// 		[5]=>
// 		string(1) "6"
// 		[6]=>
// 		string(1) "7"
// 		[7]=>
// 		string(1) "8"
// 		[8]=>
// 		string(1) "9"
// 		[9]=>
// 		string(2) "10"
// 	}
// 	[1]=>
// 	string(6) "string"
// 		[2]=>
// 		string(5) "float"
// 		[3]=>
// 		array(8) {
// 		[0]=>
// 		string(1) "a"
// 		[1]=>
// 		string(1) "b"
// 		[2]=>
// 		string(1) "c"
// 		[3]=>
// 		string(1) "d"
// 		[4]=>
// 		string(1) "e"
// 		[5]=>
// 		string(1) "f"
// 		[6]=>
// 		string(1) "g"
// 		[7]=>
// 		string(1) "h"
// 	}
// }
 
var_dump($float,$string);
//以上输出
// float(12)
// string(21) "这是一个字符串"
 
 
//var_export()函数输出或返回一个变量字符串表示
var_export($array);
//以上输出
// array (
// 		0 =>
// 		array (
// 				0 => '1',
// 				1 => '2',
// 				2 => '3',
// 				3 => '4',
// 				4 => '5',
// 				5 => '6',
// 				6 => '7',
// 				7 => '8',
// 				8 => '9',
// 				9 => '10',
// 		),
// 		1 => 'string',
// 		2 => 'float',
// 		3 =>
// 		array (
// 				0 => 'a',
// 				1 => 'b',
// 				2 => 'c',
// 				3 => 'd',
// 				4 => 'e',
// 				5 => 'f',
// 				6 => 'g',
// 				7 => 'h',
// 		),
// )
$newArray = var_export($array,true);//该函数会把其输出返回给$newArray变量
 
echo PHP_EOL;
//$newArray字符串可以使用eval()函数使其变成php可用的变量值。
eval('$exec_Array='.$newArray.';');


// var_dump($exec_Array);


	var_export($exec_Array);


echo PHP_EOL;

$string = "beautiful";
$time = "winter";

$str = 'This is a $string $time morning!';
echo $str. "<br />";

eval("\$str = \"$str\";");
echo $str;


















?>
</pre>





