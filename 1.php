<?php


//еализуйте функцию sumTwo, которая в аргументы принимает Integer[] $nums и Integer $target,
// где $nums это массив целых чисел (count($nums) > 1) и $target искомая сумма значений.
// Возвращает функция массив интов (Integer[]), где указаны индексы элементов из
// $nums сумма которых равна $target. Если элементов удовлетворяющим условиями несколько, то возвращается первое совпадение.
//
//Пример: $nums = [6, 9, 3, 2];
//$target = 11;
//Результат функции: [1, 3];

$nums = [1, 9, 3, 5, 7, 9];
$target = 22;

//unset($nums[2]);
//print_r($nums);

print_r(sumTwo($nums,$target));

function sumTwo (array $nums,int $target):mixed
{
    foreach ($nums as $key => $value) {

        $result = unsetArray($nums, $target, $key, $value);

        if ($result) {
            return ($result);
        }
    }

    return "Нет сочетаний дающих в сумме $target";
}


function unsetArray($nums,$target, $keyEL, $valueEl){

    $tempArr = $nums;
    unset($tempArr[$keyEL]);


   for ($key=$keyEL; $keyEL<count($tempArr); $key++) {

        $result = rekursion($tempArr, $target, $keyEL, $valueEl, $key+1);

        if ($result) {
            return ($result);
        }

        unset($tempArr[$key+1]);

//        echo "<br>";
//        print_r($tempArr);
    }

}



function rekursion(array $array, int $target,$keyEL, $valueEl, $key)
{

    $indexs[] = $keyEL;
    $summ = $valueEl;




    for($key; $key<count($array); $key++)
    {
//        echo"key$key<br>";
//        print_r($array);

        if($array[$key]+$summ < $target && $key != count($array)-1){

            $indexs[] = $key;
            $summ += $array[$key];



        }else if($summ+$array[$key] === $target) {

            $indexs[] = $key;
            return $indexs;

        }

    }




}


print_r(newSumTwo($nums, $target));
function newSumTwo($nums, $target) {

        foreach ($nums as $key => $value) {
            $tempArr = $nums;
            unset($tempArr[$key]);
            $res = $target - $value;

            if (in_array($res, $tempArr)) {
                return [$key, array_search($res, $tempArr)];
            }
        }

    }

