<?php
require 'vendor/autoload.php';
use Carbon\Carbon;


function standard_date_format($str) {

    printf("Now: %s <br>", Carbon::now()->format('m/d/Y') ); 
    printf("By Format: %s <br>", Carbon::parse(str_replace('-', '/', '03-15-2013')) ); 

      
    $matchPatternDate = '/([a-z]+ [0-9]{1,2}, \d[0-9]{1,3})/';

    $matches = '';    
    
    echo "<br>____________________________<br>";


    preg_match_all($matchPatternDate, strtolower($str), $matches);

        
    print_r($matches[0]);
    
    $dates  = $matches[0]; 



    $result = array_map(function($v) {  
        //echo $v; exit;      
        //
        if(is_string($v) && stristr($v, '-')){
            
            $datecarban = Carbon::parse(str_replace('-', '/', $v));
        }else{
            $datecarban = Carbon::parse($v);
        }
        $date_original = $datecarban->format('Y-m-d H:i:s');
        //
        return $date_original; 
    }, $dates);
    return $result;
}

/*
'm/d/Y',
'm/d/y',
'n/d/Y',
'm/j/Y',
'n/j/Y',
'n/j/y',
'm-d-Y',
'm-d-y',
'n-d-Y',
'm-j-Y',
'n-j-Y',
'n-j-y',
'F d, Y',
'F d Y',
'F d y',
'F d, y',
'F j, Y',
'F j, y',
*/


$str2 = "
1. 03/15/2007
2. 03/15/08
2. 3/15/2009
4. 03/15/2010
5. 3/15/2011
6. 3/15/12
7. 03-15-2013
8. 03-15-14
9. 3-15-2015
10. 03-15-2015
11. 3-15-2017
12. 3-15-18
13. March 15, 2019
14. March 15 2020
15. March 15 21
16. March 15, 22
17. March 15, 2023
18. March 15, 24
19. Mar 15, 25
20. Mar 15 26
20. 15 mar 27
21. 31 dec 28
";

echo '<pre>'; var_dump(standard_date_format($str2));
?>
