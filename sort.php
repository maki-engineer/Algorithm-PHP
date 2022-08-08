<?php

class Sort{
  private $array;
  private $sortOrderSelection;

  public function __construct($array = "no data.", $sortOrderSelection = "no data."){
    $this->array              = $array;
    $this->sortOrderSelection = $sortOrderSelection;
  }

  // 色付け関数
  private function cecho($m, $c = 30) {
    return sprintf("\033[%dm %s \033[m", $c, $m);
  }

  // バブルソート
  public function bubbleSort(){
    $array              = $this->array;
    $sortOrderSelection = $this->sortOrderSelection;
    $resultCount        = 0;
    $errorArray         = array();

    echo("Bubble Sort");

    // エラー処理
    if(($array == "no data.") || ($sortOrderSelection == "no data.")){
      array_push($errorArray, ": No value has been set. Set the array containing the value in the first argument and the specify integer of 0 or 1 in the second argument.");
    }

    // 第1引数のエラー処理
    {
      // 配列かチェック
      if(($array != "no data.") && (!is_array($array))){
        array_push($errorArray, ": A value other than an array is specified in the first argument. Specify the array containing the elements in the first argument.");
      }
      // 空チェック
      if(empty($array)){
        array_push($errorArray, ": The contents of the array of the first argument is empty. set the element.");
      }
    }

    // 第2引数のエラー処理
    {
      // 整数かチェック
      if(($sortOrderSelection != "no data.") && (!is_int($sortOrderSelection))){
        array_push($errorArray, ": A value other than an integer is specified in the second argument. Specify integer of 0 or 1 for the second argument.");
      }
      // 0か1のどっちかかチェック
      if((is_int($sortOrderSelection)) && ($sortOrderSelection > 1)){
        array_push($errorArray, ": An integer other than 0 or 1 is specified in the second argument. Specify integer of 0 or 1 for the second argument.");
      }
    }

    // エラー出力
    if(!empty($errorArray)){
      echo("\n\n");

      foreach($errorArray as $errorMessage){
        echo($this->cecho("ERROR", 41).$this->cecho($errorMessage, 31)."\n");
      }

      return;
    }

    // 0が昇順、1が降順、それ以外はエラー
    if($sortOrderSelection == 0){
      echo("\nto Ascending Order...\n\n");

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
          sleep(2);
          echo("[".implode(", ", $array)."] >> ".$resultCount."\n");
        }

      }while($count != 0);

      sleep(2);
      return "\n".$this->cecho("SUCCESS", 42).$this->cecho("\nSort Count: ".$resultCount, 32).$this->cecho("\nResult: [".implode(", ", $array)."]", 32);
    }elseif($sortOrderSelection == 1){
      echo("\nto Descending Order...\n\n");

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
          sleep(2);
          echo("[".implode(", ", $array)."] >> ".$resultCount."\n");
        }

      }while($count != 0);

      sleep(2);
      return "\n".$this->cecho("SUCCESS", 42).$this->cecho("\nSort Count: ".$resultCount, 32).$this->cecho("\nResult: [".implode(", ", $array)."]", 32);
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
$ascendingOrderResult                                = new Sort(array(2, 6, 5, 1, 3, 4, 2, -5), 0);
$descendingOrderResult                               = new Sort(array(2, 6, 5, 1, 3, 4, 2, -5), 1);
$firstArgumentErrorResult                            = new Sort(404, 1);
$firstEmptyErrorResult                               = new Sort([], 0);
$secondArgumentErrorResult                           = new Sort(array(2, 6, 5, 1, 3, 4, 2, -5), array(4, 0, 4));
$secondNotZeroAndOneErrorResult                      = new Sort(array(2, 6, 5, 1, 3, 4, 2, -5), 404);
$firstArgumentErrorAndSecondArgumentErrorResult      = new Sort(404, array(4, 0, 4));
$firstArgumentErrorAndSecondNotZeroAndOneErrorResult = new Sort(404, 404);
$firstEmptyErrorAndSecondArgumentErrorResult         = new Sort([], array(4, 0, 4));
$firstEmptyErrorAndSecondNotZeroAndOneErrorResult    = new Sort([], 404);
$notSetErrorResult                                   = new Sort();

// 結果出力
// バブルソート
{
  // 正常系:渡された配列を昇順にする
  // echo($ascendingOrderResult->bubbleSort());
  /*
  Bubble Sort
  to Ascending Order...

  [2, 5, 1, 3, 4, 2, -5, 6] >> 1
  [2, 1, 3, 4, 2, -5, 5, 6] >> 2
  [1, 2, 3, 2, -5, 4, 5, 6] >> 3
  [1, 2, 2, -5, 3, 4, 5, 6] >> 4
  [1, 2, -5, 2, 3, 4, 5, 6] >> 5
  [1, -5, 2, 2, 3, 4, 5, 6] >> 6
  [-5, 1, 2, 2, 3, 4, 5, 6] >> 7

  SUCCESS
  Sort Count: 7
  Result: [-5, 1, 2, 2, 3, 4, 5, 6]

  */

  // 正常系:渡された配列を降順にする
  // echo($descendingOrderResult->bubbleSort());
  /*
  Bubble Sort
  to Descending Order...

  [6, 2, 5, 4, 1, 3, 2, -5] >> 1
  [6, 5, 2, 4, 3, 1, 2, -5] >> 2
  [6, 5, 4, 2, 3, 2, 1, -5] >> 3
  [6, 5, 4, 3, 2, 2, 1, -5] >> 4

  SUCCESS
  Sort Count: 4
  Result: [6, 5, 4, 3, 2, 2, 1, -5]
  */

  // 第1引数に配列以外をセットした場合のエラー
  // echo($firstArgumentErrorResult->bubbleSort());
  /*
  Bubble Sort

  ERROR: A value other than an array is specified in the first argument. Specify the array containing the elements in the first argument.

  */

  // 第1引数に空の配列をセットした場合のエラー
  // echo($firstEmptyErrorResult->bubbleSort());
  /*
  Bubble Sort

  ERROR: The contents of the array of the first argument is empty. set the element.

  */

  // 第2引数に整数以外をセットした場合のエラー
  // echo($secondArgumentErrorResult->bubbleSort());
  /*
  Bubble Sort

  ERROR: A value other than an integer is specified in the second argument. Specify 0 or 1 for the second argument.

  */

  // 第2引数に0と1以外をセットした場合のエラー
  // echo($secondNotZeroAndOneErrorResult->bubbleSort());
  /*
  Bubble Sort

  ERROR: An integer other than 0 or 1 is specified in the second argument. Specify integer of 0 or 1 for the second argument.

  */

  // 第1引数に配列以外かつ第2引数に整数以外をセットした場合のエラー
  // echo($firstArgumentErrorAndSecondArgumentErrorResult->bubbleSort());
  /*
  Bubble Sort

  ERROR: A value other than an array is specified in the first argument. Specify the array containing the elements in the first argument.
  ERROR: A value other than an integer is specified in the second argument. Specify integer of 0 or 1 for the second argument.

  */

  // 第1引数に配列以外かつ第2引数に0か1以外をセットした場合のエラー
  // echo($firstArgumentErrorAndSecondNotZeroAndOneErrorResult->bubbleSort());
  /*
  Bubble Sort

  ERROR: A value other than an array is specified in the first argument. Specify the array containing the elements in the first argument.
  ERROR: An integer other than 0 or 1 is specified in the second argument. Specify integer of 0 or 1 for the second argument.

  */

  // 第1引数に空配列かつ第2引数に整数以外をセットした場合のエラー
  // echo($firstEmptyErrorAndSecondArgumentErrorResult->bubbleSort());
  /*
  Bubble Sort

  ERROR: The contents of the array of the first argument is empty. set the element.
  ERROR: A value other than an integer is specified in the second argument. Specify integer of 0 or 1 for the second argument.

  */

  // 第1引数に空配列かつ第2引数に0か1以外をセットした場合のエラー
  // echo($firstEmptyErrorAndSecondNotZeroAndOneErrorResult->bubbleSort());
  /*
  Bubble Sort

  ERROR: The contents of the array of the first argument is empty. set the element.
  ERROR: An integer other than 0 or 1 is specified in the second argument. Specify integer of 0 or 1 for the second argument.

  */

  // 引数をセットしていない場合のエラー
  // echo($notSetErrorResult->bubbleSort());
  /*
  Bubble Sort

  ERROR: No value has been set. Set the array containing the value in the first argument and the specify integer of 0 or 1 in the second argument.

  */
}

// 選択ソート
{}

// 挿入ソート
{}

// シェルソート
{}

// クイックソート
{}

// マージソート
{}

// ヒープソート
{}

?>