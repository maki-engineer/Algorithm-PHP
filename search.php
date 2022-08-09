<?php

class Search{
  private $array;
  private $searchNum;

  public function __construct($array = "no data.", $searchNum = "no data."){
    $this->array     = $array;
    $this->searchNum = $searchNum;
  }

  // 色付け関数
  private function cecho($m, $c = 30) {
    return sprintf("\033[%dm %s \033[m", $c, $m);
  }

  // エラー処理関数
  private function errorMessage(){
    $array             = $this->array;
    $searchNum         = $this->searchNum;
    $errorArray        = array();

    // 引数が渡されてるかどうか
    if(($array == "no data.") || ($searchNum == "no data.")){
      array_push($errorArray, ": No value has been set. Set the array containing the value in the first argument and the you want to search integer in the second argument.");
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
      if(($searchNum != "no data.") && (!is_int($searchNum))){
        array_push($errorArray, ": A value other than an integer is specified in the second argument. Specify an integer.");
      }
    }

    return $errorArray;
  }

  // 線形探索法
  public function linearSearch(){
    $array             = $this->array;
    $searchNum         = $this->searchNum;
    $resultSearchCount = 0;
    $resultBool        = false;
    $errorArray        = $this->errorMessage();

    echo("Linear Search\n");

    // エラー出力
    if(!empty($errorArray)){
      echo("\n");

      foreach($errorArray as $errorMessage){
        echo($this->cecho("ERROR", 41).$this->cecho($errorMessage, 31)."\n");
      }

      echo("\n");

      return;
    }

    $arraySize = count($array);      // 要素数記憶
    array_push($array, $searchNum);  // 番兵格納

    // 探索実行
    for($i = 0; $i < count($array); $i++){
      if($array[$i] == $searchNum){
        if($i != $arraySize){
          $resultSearchCount++;
          $resultBool = true;
          sleep(2);
          echo("\n[".$array[$i]."] << now data  ".$resultSearchCount."  search data >> [".$searchNum."] ".$this->cecho("matched!", 32));
          break;
        }
      }else{
        $resultSearchCount++;
        sleep(2);
        echo("\n[".$array[$i]."] << now data  ".$resultSearchCount."  search data >> [".$searchNum."]");
      }
    }

    // 結果表示
    if($resultBool){
      sleep(2);
      return "\n\n".$this->cecho("SUCCESS", 42).$this->cecho("\nSearch Count: ".$resultSearchCount, 32);
    }else{
      sleep(2);
      return "\n\n".$this->cecho("No value was specified.", 43);
    }
  }

  // 2分探索法
  public function binarySearch(){
    $array             = $this->array;
    $searchNum         = $this->searchNum;
    $errorArray        = array();

    echo("Binary Search\n");

    // 引数が渡されてるかどうか
    if(($array == "no data.") || ($searchNum == "no data.")){
      array_push($errorArray, ": No value has been set. Set the array containing the value in the first argument and the you want to search integer in the second argument.");
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
      // 昇順か降順かどうか
      $checkNotAscendingOrderOrDescendingOrder = false;

      if((!empty($array)) && (is_array($array))){
        for($i = 0; $i < count($array) - 1; $i++){
          if(abs($array[$i] - $array[$i + 1]) != 1){
            $checkNotAscendingOrderOrDescendingOrder = true;
            break;
          }
        }
      }

      if($checkNotAscendingOrderOrDescendingOrder){
        array_push($errorArray, ": An array that is not sorted in ascending or descending order is specified in the first argument. Specify an array that is sorted in ascending or descending order.");
      }
    }

    // 第2引数のエラー処理
    {
      // 整数かチェック
      if(($searchNum != "no data.") && (!is_int($searchNum))){
        array_push($errorArray, ": A value other than an integer is specified in the second argument. Specify an integer.");
      }
    }

    // エラー出力
    if(!empty($errorArray)){
      echo("\n");

      foreach($errorArray as $errorMessage){
        echo($this->cecho("ERROR", 41).$this->cecho($errorMessage, 31)."\n");
      }

      echo("\n");

      return;
    }

    // 探索実行
    $resultSearchCount = 0;
    $notSearch         = true;
    $canNotSearch      = false;
    $from              = 0;
    $to                = count($array) - 1;

    // 昇順か降順か
    if($array[0] - $array[1] == -1){
      while($notSearch){
        $middleIndex = floor(($from + $to) / 2);
        $middleNum   = $array[$middleIndex];
  
        sleep(2);
  
        if($searchNum == $middleNum){
          $resultSearchCount++;
  
          echo("\n[".$middleNum."] << now data  ".$resultSearchCount."  search data >> [".$searchNum."] ".$this->cecho("matched!", 32));
  
          $notSearch = false;
        }else{
          $resultSearchCount++;
  
          echo("\n[".$middleNum."] << now data  ".$resultSearchCount."  search data >> [".$searchNum."]");
  
          if($from == $to){
            $canNotSearch = true;
            $notSearch    = false;
          }else{
            if($searchNum < $middleNum){
              $to   = $middleIndex - 1;
            }else{
              $from = $middleIndex + 1;
            }
          }
        }
      }
    }else{
      while($notSearch){
        $middleIndex = floor(($from + $to) / 2);
        $middleNum   = $array[$middleIndex];
  
        sleep(2);
  
        if($searchNum == $middleNum){
          $resultSearchCount++;
  
          echo("\n[".$middleNum."] << now data  ".$resultSearchCount."  search data >> [".$searchNum."] ".$this->cecho("matched!", 32));
  
          $notSearch = false;
        }else{
          $resultSearchCount++;
  
          echo("\n[".$middleNum."] << now data  ".$resultSearchCount."  search data >> [".$searchNum."]");
  
          if($from == $to){
            $canNotSearch = true;
            $notSearch    = false;
          }else{
            if($searchNum < $middleNum){
              $from = $middleIndex + 1;
            }else{
              $to   = $middleIndex - 1;
            }
          }
        }
      }
    }

    // 結果表示
    sleep(2);
    if($canNotSearch){
      return "\n\n".$this->cecho("No value was specified.", 43);
    }else{
      return "\n\n".$this->cecho("SUCCESS", 42).$this->cecho("\nSearch Count: ".$resultSearchCount, 32);
    }
  }

  // ハッシュ表探索
  public function hashTableSearch(){
    $array             = $this->array;
    $searchNum         = $this->searchNum;
    $resultSearchCount = 1;
    $resultBool        = false;
    $errorArray        = $this->errorMessage();

    echo("Hash Table Search\n");

    // エラー出力
    if(!empty($errorArray)){
      echo("\n");

      foreach($errorArray as $errorMessage){
        echo($this->cecho("ERROR", 41).$this->cecho($errorMessage, 31)."\n");
      }

      echo("\n");

      return;
    }

    // 探索実行

    if(count($array) != 10){
      echo("\n");
      return $this->cecho("ERROR", 41).": The number of elements in the array of the first argument is not 10. To use the hash table search function, specify an array with 10 elements as the first argument."."\n\n";
    }

    $hashNum = ($searchNum % 10) + 1;
    if($hashNum == 10){
      $hashNum = 0;
    }

    sleep(2);

    if($array[$hashNum] == $searchNum){
      $resultBool =true;
      echo("\n[".$array[$hashNum]."] << now data  ".$resultSearchCount."  search data >> [".$searchNum."] ".$this->cecho("matched!", 32));
    }else{
      echo("\n[".$array[$hashNum]."] << now data  ".$resultSearchCount."  search data >> [".$searchNum."]");
    }

    // 結果表示
    sleep(2);

    if($resultBool){
      return "\n\n".$this->cecho("SUCCESS", 42).$this->cecho("\nSearch Count: ".$resultSearchCount, 32);
    }else{
      return "\n\n".$this->cecho("No value was specified.", 43);
    }
  }

  // オープンアドレス法
  public function openAddress(){}

  // ハッシュチェイン法
  public function hashChain(){}
}

// クラス生成
$binarySearchToAscendingOrderResult                                       = new Search(array(1, 2, 3, 4, 5, 6, 7), 5);
$binarySearchToDescendingOrderResult                                      = new Search(array(7, 6, 5, 4, 3, 2, 1), 6);
$notAscendingOrderOrDescendingOrderErrorResultForBinarySearch             = new Search(array(6, 9, 3, 4, 1, 0, -7), 4);
$canNotSearchResultForBinarySearchToAscendingOrder                        = new Search(array(1, 2, 3, 4, 5, 6, 7), 8);
$canNotSearchResultForBinarySearchToDescendingOrder                       = new Search(array(7, 6, 5, 4, 3, 2, 1), 8);
$firstNotAscendingOrderOrDescendingOrderErrorAndSecondArgumentErrorResult = new Search(array(6, 9, 3, 4, 1, 0, -7), array(4, 0, 4));
$hashTableSearchResult                                                    = new Search(array(19, 120, 961, 72, 283, 404, 765, 346, 27, 88), 765);
$canNotSearchResultFotHashTableSearch                                     = new Search(array(19, 120, 961, 72, 283, 404, 765, 346, 27, 88), 43);
$notTenErrorResultFotHashTableSearch                                      = new Search(array(6, 9, 3, 4, 1, 0, -7), 4);
$firstArgumentNotTenErrorAndSecondArgumentErrorResult                     = new Search(array(6, 9, 3, 4, 1, 0, -7), array(4, 0, 4));
$otherSearchResult                                                        = new Search(array(6, 9, 3, 4, 1, 0, -7), 4);
$canNotSearchResult                                                       = new Search(array(6, 9, 3, 4, 1, 0, -7), 8);
$firstArgumentErrorResult                                                 = new Search(404, 4);
$firstEmptyErrorResult                                                    = new Search(array(), 4);
$secondArgumentErrorResult                                                = new Search(array(6, 9, 3, 4, 1, 0, -7), array(4, 0, 4));
$firstArgumentErrorAndSecondArgumentErrorResult                           = new Search(404, array(4, 0, 4));
$firstEmptyErrorAndSecondArgumentErrorResult                              = new Search(array(), array(4, 0, 4));
$notSetErrorResult                                                        = new Search();

// 結果出力
// 線形探索法
{
  // 正常系: 指定されたデータの探索回数が返される
  // echo($otherSearchResult->linearSearch());
  /*
  Linear Search

  [6] << now data  1  search data >> [4]
  [9] << now data  2  search data >> [4]
  [3] << now data  3  search data >> [4]
  [4] << now data  4  search data >> [4]  matched!

  SUCCESS        
  Search Count: 4 
  */

  // 正常系: 指定されたデータが見つからなかった時はメッセージのみが返される
  // echo($canNotSearchResult->linearSearch());
  /*
  Linear Search

  [6] << now data  1  search data >> [8]
  [9] << now data  2  search data >> [8]
  [3] << now data  3  search data >> [8]
  [4] << now data  4  search data >> [8]
  [1] << now data  5  search data >> [8]
  [0] << now data  6  search data >> [8]
  [-7] << now data  7  search data >> [8]

  No value was specified. 
  */

  // 第1引数に配列以外をセットした場合のエラー
  // echo($firstArgumentErrorResult->linearSearch());
  /*
  Linear Search

  ERROR  : A value other than an array is specified in the first argument. Specify the array containing the elements in the first argument.

  */

  // 第1引数に空配列をセットした場合のエラー
  // echo($firstEmptyErrorResult->linearSearch());
  /*
  Linear Search

  ERROR  : The contents of the array of the first argument is empty. set the element.

  */

  // 第2引数に整数以外をセットした場合のエラー
  // echo($secondArgumentErrorResult->linearSearch());
  /*
  Linear Search

  ERROR  : A value other than an integer is specified in the second argument. Specify an integer.

  */

  // 第1引数に配列以外かつ第2引数に整数以外をセットした場合のエラー
  // echo($firstArgumentErrorAndSecondArgumentErrorResult->linearSearch());
  /*
  Linear Search

  ERROR  : A value other than an array is specified in the first argument. Specify the array containing the elements in the first argument. 
  ERROR  : A value other than an integer is specified in the second argument. Specify an integer.

  */

  // 第1引数に空配列かつ第2引数に整数以外をセットした場合のエラー
  // echo($firstEmptyErrorAndSecondArgumentErrorResult->linearSearch());
  /*
  Linear Search

  ERROR  : The contents of the array of the first argument is empty. set the element.
  ERROR  : A value other than an integer is specified in the second argument. Specify an integer.

  */

  // 引数をセットしていない場合のエラー
  // echo($notSetErrorResult->linearSearch());
  /*
  Linear Search

  ERROR  : No value has been set. Set the array containing the value in the first argument and the you want to search integer in the second argument.

  */
}

// 2分探索法
{
  // 正常系: 指定されたデータの探索回数が返される 昇順
  // echo($binarySearchToAscendingOrderResult->binarySearch());
  /*
  Binary Search

  [4] << now data  1  search data >> [5]
  [6] << now data  2  search data >> [5]
  [5] << now data  3  search data >> [5]  matched! 

  SUCCESS  
  Search Count: 3
  */

  // 正常系: 指定されたデータの探索回数が返される 降順
  // echo($binarySearchToDescendingOrderResult->binarySearch());
  /*
  Binary Search

  [4] << now data  1  search data >> [6]
  [6] << now data  2  search data >> [6]  matched! 

  SUCCESS  
  Search Count: 2
  */

  // 正常系: 指定されたデータが見つからなかった時はメッセージのみが返される 昇順
  // echo($canNotSearchResultForBinarySearchToAscendingOrder->binarySearch());
  /*
  Binary Search

  [4] << now data  1  search data >> [8]
  [6] << now data  2  search data >> [8]
  [7] << now data  3  search data >> [8]

  No value was specified. 
  */

  // 正常系: 指定されたデータが見つからなかった時はメッセージのみが返される 降順
  // echo($canNotSearchResultForBinarySearchToDescendingOrder->binarySearch());
  /*
  Binary Search

  [4] << now data  1  search data >> [8]
  [6] << now data  2  search data >> [8]
  [7] << now data  3  search data >> [8]

  No value was specified. 
  */

  // 第1引数に配列以外をセットした場合のエラー
  // echo($firstArgumentErrorResult->binarySearch());
  /*
  Binary Search

  ERROR  : A value other than an array is specified in the first argument. Specify the array containing the elements in the first argument. 

  */

  // 第1引数に空配列をセットした場合のエラー
  // echo($firstEmptyErrorResult->binarySearch());
  /*
  Binary Search

  ERROR  : The contents of the array of the first argument is empty. set the element. 
  ERROR  : An integer that is not included in the array of the first argument is specified in the second argument. Specify an integer contained in the array specified in the first argument.

  */

  // 第1引数に昇順か降順に並べられてない配列をセットした場合のエラー
  // echo($notAscendingOrderOrDescendingOrderErrorResultForBinarySearch->binarySearch());
  /*
  Binary Search

  ERROR  : An array that is not sorted in ascending or descending order is specified in the first argument. Specify an array that is sorted in ascending or descending order. 

  */

  // 第2引数に整数以外をセットした場合のエラー
  // echo($secondArgumentErrorResult->binarySearch());
  /*
  Binary Search

  ERROR  : An array that is not sorted in ascending or descending order is specified in the first argument. Specify an array that is sorted in ascending or descending order. 
  ERROR  : A value other than an integer is specified in the second argument. Specify an integer. 

  */

  // 第1引数に配列以外かつ第2引数に整数以外をセットした場合のエラー
  // echo($firstArgumentErrorAndSecondArgumentErrorResult->binarySearch());
  /*
  Binary Search

  ERROR  : A value other than an array is specified in the first argument. Specify the array containing the elements in the first argument. 
  ERROR  : A value other than an integer is specified in the second argument. Specify an integer. 

  */

  // 第1引数に空配列かつ第2引数に整数以外をセットした場合のエラー
  // echo($firstEmptyErrorAndSecondArgumentErrorResult->binarySearch());
  /*
  Binary Search

  ERROR  : The contents of the array of the first argument is empty. set the element. 
  ERROR  : A value other than an integer is specified in the second argument. Specify an integer. 

  */

  // 第1引数に空配列かつ第2引数に第1引数の配列の中の整数が含まれていない整数をセットした場合のエラー
  // echo($firstEmptyErrorAndSecondArgumentCanNotSearchErrorResult->binarySearch());
  /*
  Binary Search

  ERROR  : The contents of the array of the first argument is empty. set the element. 
  ERROR  : An integer that is not included in the array of the first argument is specified in the second argument. Specify an integer contained in the array specified in the first argument. 

  */

  // 第1引数に昇順か降順に並べられてない配列かつ第2引数に整数以外をセットした場合のエラー
  // echo($firstNotAscendingOrderOrDescendingOrderErrorAndSecondArgumentErrorResult->binarySearch());
  /*
  
  ERROR  : An array that is not sorted in ascending or descending order is specified in the first argument. Specify an array that is sorted in ascending or descending order. 
  ERROR  : A value other than an integer is specified in the second argument. Specify an integer. 
  */

  // 引数をセットしていない場合のエラー
  // echo($notSetErrorResult->binarySearch());
  /*
  Linear Search

  ERROR  : No value has been set. Set the array containing the value in the first argument and the you want to search integer in the second argument.

  */
}

// ハッシュ表探索
{
  // 正常系: 指定されたデータの探索回数が返される
  // echo($hashTableSearchResult->hashTableSearch());
  /*
  Hash Table Search

  [19] << now data  1  search data >> [19]  matched! 

  SUCCESS  
  Search Count: 1
  */

  // 正常系: 指定されたデータが見つからなかった時はメッセージのみが返される
  // echo($canNotSearchResultFotHashTableSearch->hashTableSearch());
  /*
  Hash Table Search

  [283] << now data  1  search data >> [43]

  No value was specified. 
  */

  // 第1引数に配列以外をセットした場合のエラー
  // echo($firstArgumentErrorResult->hashTableSearch());
  /*
  Hash Table Search

  ERROR  : A value other than an array is specified in the first argument. Specify the array containing the elements in the first argument. 

  */

  // 第1引数に空配列をセットした場合のエラー
  // echo($firstEmptyErrorResult->hashTableSearch());
  /*
  Hash Table Search

  ERROR  : The contents of the array of the first argument is empty. set the element. 

  */

  // 第1引数の配列の個数が10個じゃなかった場合のエラー
  // echo($notTenErrorResultFotHashTableSearch->hashTableSearch());
  /*
  Hash Table Search

  ERROR : The number of elements in the array of the first argument is not 10. To use the hash table search function, specify an array with 10 elements as the first argument.

  */

  // 第2引数に整数以外をセットした場合のエラー
  // echo($secondArgumentErrorResult->hashTableSearch());
  /*
  Hash Table Search

  ERROR  : A value other than an integer is specified in the second argument. Specify an integer. 

  */

  // 第1引数に配列以外かつ第2引数に整数以外をセットした場合のエラー
  // echo($firstArgumentErrorAndSecondArgumentErrorResult->hashTableSearch());
  /*
  Hash Table Search

  ERROR  : A value other than an array is specified in the first argument. Specify the array containing the elements in the first argument. 
  ERROR  : A value other than an integer is specified in the second argument. Specify an integer. 

  */

  // 第1引数に空配列かつ第2引数に整数以外をセットした場合のエラー
  // echo($firstEmptyErrorAndSecondArgumentErrorResult->hashTableSearch());
  /*
  Hash Table Search

  ERROR  : The contents of the array of the first argument is empty. set the element. 
  ERROR  : A value other than an integer is specified in the second argument. Specify an integer. 

  */

  // 第1引数の配列の個数が10個じゃないかつ第2引数に整数以外をセットした場合のエラー
  // echo($firstArgumentNotTenErrorAndSecondArgumentErrorResult->hashTableSearch());
  /*
  Hash Table Search

  ERROR  : A value other than an integer is specified in the second argument. Specify an integer. 

  */

  // 引数をセットしていない場合のエラー
  // echo($notSetErrorResult->hashTableSearch());
  /*
  Linear Search

  ERROR  : No value has been set. Set the array containing the value in the first argument and the you want to search integer in the second argument.

  */
}

// オープンアドレス法
{}

// ハッシュチェイン法
{}

?>