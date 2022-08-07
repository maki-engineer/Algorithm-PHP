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
    $sortCount   = 0;
    $to          = count($array) - 1;

    // 0が昇順、1が降順
    if($this->sortOrderSelection == 0){
      do{
        for($i = 0; $i < $to; $i++){
          //
        }

        $resultCount++;
        $to--;
      }while($sortCount != 0);

      return "Sort Count: ".$resultCount."\nResult: ".$array;
    }elseif($this->sortOrderSelection == 1){
      return $array;
    }else{
      return "ERROR: Specify 0 or 1 for the second argument.";
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

$result = new Sort(array(2, 6, 5, 1, 3, 4, 2, -5), 1);
print_r($result->bubbleSort());

/*
  (2, 6, 5, 1, 3, 4, 2, -5)
->(2, 5, 1, 3, 4, 2, -5, 6)
->(2, 1, 3, 4, 2, -5, 5, 6)
->(1, 2, 3, 2, -5, 4, 5, 6)
->(1, 2, 2, -5, 3, 4, 5, 6)
->(1, 2, -5, 2, 3, 4, 5, 6)
->(1, -5, 2, 2, 3, 4, 5, 6)
->(-5, 1, 2, 2, 3, 4, 5, 6)
= Sort Count: 7
  result: (-5, 1, 2, 2, 3, 4, 5, 6)
*/

?>