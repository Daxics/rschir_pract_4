<?php
    header('Content-type: text/plain');
    $num = $_GET['num'];
    $list = explode(',', $num);
    print_list($list);

    $list = insertionSort($list);
    function insertionSort($list) {
        $count = count($list);
        if($count <= 1) {
            return $list;
        }
        for($i = 1; $i < count($list); $i++) {
            $val = $list[$i];
            $j = $i - 1;
            while(isset($list[$j]) && $list[$j]> $val) {
                $list[$j+1] = $list[$j];
                $list[$j] = $val;
                $j--;
            }
        }
        return $list;
    }

    function print_list($list) {
        for ($h = 0; $h < count($list); $h++) {
            echo $list[$h];
            echo " ";
        }
    }
    echo "\n";
    print_list($list);
?>
