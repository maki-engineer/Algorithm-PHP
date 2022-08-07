<?php

class Sort{
  private $array;
  private $sortOrderSelection;

  public function __construct($array, $sortOrderSelection){
    $this->array              = $array;
    $this->sortOrderSelection = $sortOrderSelection;
  }

  // バブルソート
  public function bubbleSort(){
    $array       = $this->array;
    $resultCount = 0;

    print_r("------------------------------------------------------------\nBubble Sort");

    // 第1引数に配列以外が渡されたときのエラー処理
    if(!is_array($array)){
      return "\n\nERROR: Specify an array for the first argument.\n------------------------------------------------------------\n";
    }

    // 0が昇順、1が降順、それ以外はエラー
    if($this->sortOrderSelection == 0){
      print_r("\nto Ascending Order...\n\n");

      $to = count($array) - 1;

      do{
        $count = 0;

        for($i = 0; $i < $to; $i++){
          if($array[$i] > $array[$i + 1]){
            $exchange      = $array[$i];
            $array[$i]     = $array[$i + 1];
            $array[$i + 1] = $exchange;
            $count++;
          }
        }

        if($count != 0){
          $resultCount++;
          $to--;
          print_r("[".implode(", ", $array)."] >> ".$resultCount."\n");
        }

      }while($count != 0);

      return "\nSort Count: ".$resultCount."\nResult: [".implode(", ", $array)."]\n------------------------------------------------------------\n";
    }elseif($this->sortOrderSelection == 1){
      print_r("\nto Descending Order...\n\n");

      $to = 0;

      do{
        $count = 0;

        for($i = count($array) - 1; $i > $to; $i--){
          if($array[$i] > $array[$i - 1]){
            $exchange      = $array[$i];
            $array[$i]     = $array[$i - 1];
            $array[$i - 1] = $exchange;
            $count++;
          }
        }

        if($count != 0){
          $resultCount++;
          $to++;
          print_r("[".implode(", ", $array)."] >> ".$resultCount."\n");
        }

      }while($count != 0);

      return "\nSort Count: ".$resultCount."\nResult: [".implode(", ", $array)."]\n------------------------------------------------------------\n";
    }else{
      return "\n\nERROR: Specify 0 or 1 for the second argument.\n------------------------------------------------------------\n";
    }
  }

  // 選択ソート
  public function selectionSort(){
    $array = $this->array;

    // 0が昇順、1が降順
    if($this->sortOrderSelection == 0){
      return $array;
    }elseif($this->sortOrderSelection == 1){
      return $array;
    }else{
      return "ERROR: Specify 0 or 1 for the second argument.";
    }
  }

  // 挿入ソート
  public function insertionSort(){
    $array = $this->array;

    // 0が昇順、1が降順
    if($this->sortOrderSelection == 0){
      return $array;
    }elseif($this->sortOrderSelection == 1){
      return $array;
    }else{
      return "ERROR: Specify 0 or 1 for the second argument.";
    }
  }

  // シェルソート
  public function shellSort(){
    $array = $this->array;

    // 0が昇順、1が降順
    if($this->sortOrderSelection == 0){
      return $array;
    }elseif($this->sortOrderSelection == 1){
      return $array;
    }else{
      return "ERROR: Specify 0 or 1 for the second argument.";
    }
  }

  // クイックソート
  public function quickSort(){
    $array = $this->array;

    // 0が昇順、1が降順
    if($this->sortOrderSelection == 0){
      return $array;
    }elseif($this->sortOrderSelection == 1){
      return $array;
    }else{
      return "ERROR: Specify 0 or 1 for the second argument.";
    }
  }

  // マージソート
  public function mergeSort(){
    $array = $this->array;

    // 0が昇順、1が降順
    if($this->sortOrderSelection == 0){
      return $array;
    }elseif($this->sortOrderSelection == 1){
      return $array;
    }else{
      return "ERROR: Specify 0 or 1 for the second argument.";
    }
  }

  // ヒープソート
  public function heapSort(){}
}

// クラス生成
$ascendingOrderResult      = new Sort(array(2, 6, 5, 1, 3, 4, 2, -5), 0);
$descendingOrderResult     = new Sort(array(2, 6, 5, 1, 3, 4, 2, -5), 1);
$secondArgumentErrorResult = new Sort(array(2, 6, 5, 1, 3, 4, 2, -5), 2);
$firstArgumentErrorResult  = new Sort(404, 2);

// 結果出力
// バブルソート
print_r($ascendingOrderResult->bubbleSort());
/*
------------------------------------------------------------
Bubble Sort
to Ascending Order...

[2, 5, 1, 3, 4, 2, -5, 6] >> 1
[2, 1, 3, 4, 2, -5, 5, 6] >> 2
[1, 2, 3, 2, -5, 4, 5, 6] >> 3
[1, 2, 2, -5, 3, 4, 5, 6] >> 4
[1, 2, -5, 2, 3, 4, 5, 6] >> 5
[1, -5, 2, 2, 3, 4, 5, 6] >> 6
[-5, 1, 2, 2, 3, 4, 5, 6] >> 7

Sort Count: 7
Result: [-5, 1, 2, 2, 3, 4, 5, 6]
------------------------------------------------------------
*/
print_r($descendingOrderResult->bubbleSort());
/*
------------------------------------------------------------
Bubble Sort
to Descending Order...

[6, 2, 5, 4, 1, 3, 2, -5] >> 1
[6, 5, 2, 4, 3, 1, 2, -5] >> 2
[6, 5, 4, 2, 3, 2, 1, -5] >> 3
[6, 5, 4, 3, 2, 2, 1, -5] >> 4

Sort Count: 4
Result: [6, 5, 4, 3, 2, 2, 1, -5]
------------------------------------------------------------
*/
print_r($secondArgumentErrorResult->bubbleSort());
/*
------------------------------------------------------------
Bubble Sort

ERROR: Specify 0 or 1 for the second argument.
------------------------------------------------------------
*/
print_r($firstArgumentErrorResult->bubbleSort());
/*
------------------------------------------------------------
Bubble Sort

ERROR: Specify an array for the first argument.
------------------------------------------------------------
*/

?>