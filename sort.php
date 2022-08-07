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

    // 0が昇順、1が降順
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
        }

        print_r("[".implode(", ", $array)."]\n");
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
        }

        print_r("[".implode(", ", $array)."]\n");
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
$ascendingOrderResult  = new Sort(array(2, 6, 5, 1, 3, 4, 2, -5), 0);
$descendingOrderResult = new Sort(array(2, 6, 5, 1, 3, 4, 2, -5), 1);
$errorResult           = new Sort(array(2, 6, 5, 1, 3, 4, 2, -5), 2);

// 結果出力
// バブルソート
print_r($ascendingOrderResult->bubbleSort());
print_r($descendingOrderResult->bubbleSort());
print_r($errorResult->bubbleSort());

?>