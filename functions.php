<?php
function my_strlen($str){
    $index = 0;
    while(@my_isset($str[$index])){
        $index++;
    }
    return $index;
}

function my_sizeof($arrs){
    $count = 0;
    foreach($arrs as $arr){
        $count++;
    }
    return $count;
}

function my_isset($str){
    if($str == null){
        return false;
    }
    else{
        return true;
    }
}

function my_strpos($str,$char,$index=0){
    $searchlen = my_strlen($char);
    for($i =0;$i<my_strlen($str);$i++){
        $substr = my_substr($str,$i,$searchlen);
        if($substr == $char){
            return $i;
        }
    }
}

function my_str_repeat($str,$times){
    $repeated = '';
    for($i= 0;$i<$times;$i++){
        $repeated .= $str;
    }
    return $repeated;
}

function my_str_contain($str, $search){
    $searchlen = my_strlen($search);
    for($i =0;$i<my_strlen($str);$i++){
        $substr = my_substr($str,$i,$searchlen);
        if($substr == $search){
            return true;
        }
    }
}

function my_strtr($str,$from,$to){
    $newstr="";
    for($i = 0;$i<my_strlen($str);$i++){
        if($str[$i] == $from){
            $str[$i] = $to;
        }
    }
    return $str;
}
function my_str_splite($str,$length = 1){
    $arr = [];
    for ($i = 0; $i < my_strlen($str); $i += $length) {
        $val = '';
        for ($j = 0; $j < $length; $j++) {
            if (($i + $j) < my_strlen($str)) {
                $val .= $str[$i + $j];
            }
        }
        $arr[] = $val;
    }
        return $arr;
}

function my_substr($str,$start,$length=""){
    $substr="";
    if($length == "" ){
        if($start < 0){
            for($i = my_strlen($str) - ($start * -1) ;$i<my_strlen($str);$i++){
                $substr .= $str[$i];
            }
        }
        else{
            for($i = $start;$i<my_strlen($str);$i++){
                $substr .= $str[$i];
            }
        }
    }
    else{
        $count = 0;
        if($length == null || $length == 0 || $length == false){
            $substr ="";
        }
        elseif($start < 0 && $length < 0){
            for($i = my_strlen($str) - ($start * -1);$i < my_strlen($str) - ($length * -1) ;$i++){
                if($count < my_strlen($str) - ($length * -1)){
                    $substr .= $str[$i];
                    $count++;
                }
                else{
                    break;
                }
            }
        }
        elseif($start > 0 && $length < 0){
            for($i = $start;$i < my_strlen($str) - ($length * -1) ;$i++){
                if($count < my_strlen($str) - ($length * -1)){
                    $substr .= $str[$i];
                    $count++;
                }
                else{
                    break;
                }
            }
        }
        elseif($start < 0 && $length > 0){
            for($i = my_strlen($str) - ($start * -1);$i < my_strlen($str);$i++){
                if($count < $length){
                    $substr .= $str[$i];
                    $count++;
                }
                else{
                    break;
                }
            }
        }
        else{
            for($i = $start;$i <my_strlen($str) ;$i++){
                if($count < $length){
                    $substr .= $str[$i];
                    $count++;
                }
                else{
                    break;
                }
            }
        }
    }
    return $substr;
}

function my_chunk_split($str,$length=1,$char=""){
    $chunk = "";
    if($length == 1 && $char == ""){
        return $str;
    }

    elseif($length > 1 && $char == ""){
        $arr = my_str_splite($str,$length);
        foreach($arr as $ar){
            $chunk .= $ar;
            $chunk .= " ";
        }
        return $chunk;
    }
    elseif($length >=1 && $char !== ""){
        $arr = my_str_splite($str,$length);
        foreach($arr as $ar){
            $chunk .= $ar;
            $chunk .= $char;
        }
        return $chunk;
    }
}

function my_pow($num,$power){
    return $num ** $power;
}

function my_abs($num){
    return $num < 0 ? $num * -1 : $num;
}

function my_str_ends_with($str,$ends){
    $strlen = my_strlen($str);
    $endsLength = my_strlen($ends);
    $endpos = $strlen - $endsLength;
    if($ends == ""){
        return true;
    }
    else{
        $substr = my_substr($str,$endpos);
        return $substr == $ends ? true : false;
    }
}

function my_str_starts_with($str,$start){
    if($start = ""){
        return true;
    }
    else{
        $startsLength = my_strlen($start);
        $substr = my_substr($str,0,$startsLength);
        return $substr === $start ? true : false;
    }
}

function my_strToUpper($str){
    $strToUpper = "";
    $arr = ['A'=> 'a','B'=>'b','C'=>'c','D'=>'d',
            'E'=>'e','F'=>'f','G'=>'g','H'=>'h',
            'I'=>'i','J'=>'j','K'=>'k','L'=>'l',
            'M'=>'m','N'=>'n','O'=>'o','P'=>'p',
            'Q'=>'q','R'=>'r','S'=>'s','T'=>'t',
            'U'=>'u','V'=>'v','W'=>'w','X'=>'x'
            ,'Y'=>'y','Z'=>'z'];
    for($i = 0;$i<my_strlen($str);$i++){
        foreach($arr as $key => $value){
            if($str[$i] == $key || $str[$i] == $value){
                $strToUpper .= $key;
            }
        }
    }
    return $strToUpper;
}

function my_strToLower($str){
    $strToUpper = "";
    $arr = ['A'=> 'a','B'=>'b','C'=>'c','D'=>'d',
            'E'=>'e','F'=>'f','G'=>'g','H'=>'h',
            'I'=>'i','J'=>'j','K'=>'k','L'=>'l',
            'M'=>'m','N'=>'n','O'=>'o','P'=>'p',
            'Q'=>'q','R'=>'r','S'=>'s','T'=>'t',
            'U'=>'u','V'=>'v','W'=>'w','X'=>'x'
            ,'Y'=>'y','Z'=>'z'];
    for($i = 0;$i<my_strlen($str);$i++){
        foreach($arr as $key => $value){
            if($str[$i] == $key || $str[$i] == $value){
                $strToUpper .= $value;
            }
        }
    }
    return $strToUpper;
}

function my_ucfirst($str){
            $newstr = "";
            $ord = my_ord($str[0]);
            if($ord <= 90){
                return $str; 
            }
            else{
                $ord -= 32;
                $chr = my_chr($ord);
                $newstr .= $chr;
                for ($i=1; $i < my_strlen($str) ; $i++) { 
                    $newstr .= $str[$i];
                }
                return $newstr;
            }
}

function my_lcfirst($str){
    $newstr = "";
            $ord = my_ord($str[0]);
            if($ord > 90){
                return $str; 
            }
            else{
                $ord += 32;
                $chr = my_chr($ord);
                $newstr .= $chr;
                for ($i=1; $i < my_strlen($str) ; $i++) { 
                    $newstr .= $str[$i];
                }
                return $newstr;
            }
}

function my_min(int|float ...$nums){
    $min = $nums[0];
    for($i =0;$i<my_strlen($nums);$i++){
        if($min > $nums[$i]){
            $min = $nums[$i];
        }
    }
    return $min;
}

function my_max(int|float ...$nums){
    $min = $nums[0];
    for($i =0;$i<my_strlen($nums);$i++){
        if($min < $nums[$i]){
            $min = $nums[$i];
        }
    }
    return $min;
}

function my_floor(int|float $num){
        if($num > 0){
            $newnum = (int) $num;
        }
        else{
            $newnum = (int) ($num - 1);
        }
        return $newnum;
}

function my_ceil(int|float $num){
    if(is_float($num)){
        return $num > 0 ? (int) ($num + 1) : (int) ($num);
    }
    else{
        return $num;
    }
}

function my_intdiv(int $num1,int $num2){
    return (int) ($num1/$num2);
}

function my_implode($seprator="",array $arr){
    $str = "";
    $arrlen = my_sizeof($arr) -1;
    foreach($arr as $ar){
        $str .= $ar;
        $str .= $seprator;
    }
    $substr = my_substr($str,0,my_strlen($str)-1);
    return $substr;
}

function my_str_pad(string $str,int $length,$char=" ",$padflag=STR_PAD_RIGHT){
    $fullpad = "";
    // $remainLen2 = $length - my_strlen($str);
    if($length <= 0 || $length < my_strlen($str) ||  $length == my_strlen($str) ){
        return $str;
    }
    elseif($padflag == STR_PAD_LEFT){
        for($j=0;$j<$length-my_strlen($str);$j++){
            $fullpad .= $char; 
        }
        for($i=0;$i<my_strlen($str);$i++){
            $fullpad .= $str[$i]; 
        }
    }
    elseif($padflag == STR_PAD_BOTH){
        $remainLen = $length - my_strlen($str);
        if($remainLen %2 != 0){
            $right = (int) ($remainLen/2) + 1;
            $left = (int) ($remainLen/2);
                for($j=0;$j<$left;$j++){
                    $fullpad .= $char;
                }
                for($i=0;$i<my_strlen($str);$i++){
                    $fullpad .= $str[$i]; 
                }
                for($j=0;$j<$right;$j++){
                        $fullpad .= $char;
                    } 
        }
        else{
            for($j=0;$j<$remainLen/2;$j++){
                $fullpad .= $char;
            }
            for($i=0;$i<my_strlen($str);$i++){
                $fullpad .= $str[$i]; 
            }
            for($j=0;$j<$remainLen/2;$j++){
                    $fullpad .= $char;
                } 
        }
    }
    else{
        for($i=0;$i< my_strlen($str);$i++){
            $fullpad .= $str[$i]; 
        }
        for($j=0;$j<$length - my_strlen($str);$j++){
            $fullpad .= $char;
        }
    }
    return $fullpad;
}

function my_strcmp(string $str1,string $str2){
    $count=0;
    for($i =0;$i<my_strlen($str1);$i++){
        $count += ord($str1[$i]);
    }

    $count2=0;
    for($i =0;$i<my_strlen($str2);$i++){
        $count2 += ord($str2[$i]);
    }
    if($count < $count2){
        return -1;
    }
    elseif($count > $count2){
        return 1;
    }
    elseif($count == $count2){
        return 0;
    }
}
function my_array_reverse(array $arr,$reserve_key=false){
    $newarr = [];
    $arrlen = my_sizeof($arr);
    $key = my_array_key($arr);
    $value = my_array_values($arr);
    if($reserve_key == true){
        for($i = $arrlen - 1;$i >= 0;$i--){
            $newarr[$key[$i]] = $value[$i];
        }
        return $newarr;
    }
    else{
        for($i = $arrlen - 1;$i >= 0;$i--){
            $newarr[] = $value[$i];
        }
        return $newarr;
    }
}

function my_arr_pad(array $arr,$value,$str){
    $newarr = [];
    if($value < 0){
        for($i=0;$i< $value*-1 - my_strlen($arr);$i++){
            $newarr[] = $str; 
        }
        foreach($arr as $ar){
            $newarr[] = $ar;
        }
        return $newarr;
    }
    elseif($value < my_strlen($arr) && $value > 0 ){
        return $arr;
    }
    else{
        foreach($arr as $ar){
            $newarr[] = $ar;
        }
        for($i=0;$i<$value - my_strlen($arr);$i++){
            $newarr[] = $str; 
        }
        return $newarr;
    }
}

function my_array_key(array $arr,$value='',$type=false){
    $newarr = [];
    if($value ==''){
        foreach($arr as $key => $val){
            $newarr[] = $key;
        }
        return $newarr;
    }
    elseif($value != "" && $type == false){
        foreach($arr as $key => $val){
            if($val == $value){
                $newarr[] = $key;
            }
        }
        return $newarr;
    }
    else{
        foreach($arr as $key => $val){
            if($val === $value){
                $newarr[] = $key;
            }
        }
        return $newarr;
    }
}

function my_array_values(array $arr){
    $newarr = [];
    foreach($arr as $ar){
        $newarr[] = $ar;
    }
    return $newarr;
}

function my_array_flip(array $arr){
    $newarr = [];
    foreach($arr as $key => $value){
        $newarr[$value] = $key;
    }
    return $newarr;
}

function my_in_array($search,array $arr,$type=false){
    if($type == false){
        foreach($arr as $val){
            if($val == $search){
                return true;
            }
        }
    }
    else{
        foreach($arr as $val){
            if($val === $search){
                return true;
            }
        }
    }
}

function my_array_key_exits($search,array $arr){
    foreach($arr as $key => $val){
        if($key == $search){
            return true;
        }
    }
}

function my_array_product(array $arr){
    foreach($arr as $ar){
        if(!is_numeric($ar)){
            return 0;
        }
    }
    $multply = $arr[0] * $arr[1];
        for($i =2;$i<my_sizeof($arr);$i+=1){
            $multply *= $arr[$i];
        }
        return $multply;
}

function my_array_intersect(array $arr1 , array $arr2){
    $newarr = [];
    foreach($arr1 as $key => $value){
        if(my_in_array($value,$arr2)){
            $newarr[$key] = $value;
        }
    }
    return $newarr;
}

function my_array_intersect_key(array $arr1 , array $arr2){
    $newarr = [];
    $keyarr = my_array_key($arr2);
    foreach($arr1 as $key => $value){
        if(my_in_array($key,$keyarr)){
            $newarr[$key] = $value;
        }

    }
    return $newarr;
}

function my_array_key_first(array $arr){
    $firstkey = my_array_key($arr);
    return $firstkey[0];
}

function my_array_key_last($arr){
    $lastkey = my_array_key($arr);
    return $lastkey[my_sizeof($arr) - 1];
}

function my_array_search($search, $arr){
    foreach($arr as $key => $value){
        if($value == $search){
            return $key;
        }
    }
}

function my_array_push(& $arr,...$items){
    foreach($items as $item){
        $arr[] = $item;
    }
}

function my_ord(string $chr){
    $arr = [
        65 => "A",
        "B","C","D","E","F","G","H","I","J","K","L","M","N","O","P"
        ,"Q","R","S","T","U","V","W","X","Y","Z",
        97 => "a",
        "b","c","d","e","f","g","h","i","j","k","l","m","n","o","p"
        ,"q","r","s","t","u","v","w","x","y","z"
    ];
    foreach($arr as $key => $value){
        if($chr === $value){
            return $key;
        }
    }
}

function my_chr(int $num){
    $arr = [
        65 => "A",
        "B","C","D","E","F","G","H","I","J","K","L","M","N","O","P"
        ,"Q","R","S","T","U","V","W","X","Y","Z",
        97 => "a",
        "b","c","d","e","f","g","h","i","j","k","l","m","n","o","p"
        ,"q","r","s","t","u","v","w","x","y","z"
    ];
    foreach($arr as $key => $value){
        if($num === $key){
            return $value;
        }
    }
}
function my_array_change_key_case($arr,$case=CASE_LOWER){
    $newarr = [];
    if($case == CASE_LOWER){
        foreach($arr as $key => $value){
            $newarr[my_strToLower($key)] = $value;
        }
    }
    else{
        foreach($arr as $key => $value){
            $newarr[my_strToUpper($key)] = $value;
        }
    }
    return $newarr;
}

function my_array_combined(array $key , $value){
    $keylen = my_sizeof($key);
    $valuelen = my_sizeof($value);
    $newarr = [];
    if($keylen != $valuelen){
        return false;
    }
    else{
        for($i=0;$i<$keylen;$i++){
            $newarr[$key[$i]] = $value[$i];
        }
        return $newarr;
    }
}

function my_array_count_values(array $arr){
    $newarr = [];
    foreach($arr as $ar){
        $count = 0;
        for ($i=0; $i < my_strlen($arr); $i++) { 
            if($ar == $arr[$i]){
                $count++;
            }
        }
        $newarr[$ar] = $count; 
    }
    return $newarr;
}

function my_array_is_list($arr){
    $keys = my_array_key($arr);
    $count = 0;
    for ($i=0; $i <my_sizeof($arr); $i++) { 
        if($key[$i] === $i){
            $count++;
        }
    }
    if($count == my_sizeof($arr)){
        return true;
    }
    else{
        return false;
    }
}
