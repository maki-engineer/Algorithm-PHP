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

  // 線形探索法
  public function linearSearch(){
    $array             = $this->array;
    $searchNum         = $this->searchNum;
    $resultSearchCount = 0;
    $resultBool        = false;
    $errorArray        = array();

    echo("Linear Search\n");

    // エラー処理
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

    // エラー出力
    if(!empty($errorArray)){
      echo("\n");

      foreach($errorArray as $errorMessage){
        echo($this->cecho("ERROR", 41).$this->cecho($errorMessage, 31)."\n");
      }

      return;
    }

    $arraySize = count($array);      // 要素数記憶
    array_push($array, $searchNum);  // 番兵格納

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

    if($resultBool){
      sleep(2);
      return "\n\n".$this->cecho("SUCCESS", 42).$this->cecho("\nSearch Count: ".$resultSearchCount, 32);
    }else{
      sleep(2);
      return "\n\n".$this->cecho("No value was specified.", 43);
    }
  }

  // 2分探索法
  public function binarySearch(){}

  // ハッシュ表探索
  public function HashTableSearch(){}

  // オープンアドレス法
  public function OpenAddress(){}

  // ハッシュチェイン法
  public function hashChain(){}
}

// クラス生成
$binarySearchResult                                           = new Search(array(1, 2, 3, 4, 5, 6, 7), 5);
$notAscendingOrderOrDescendingOrderErrorResultForBinarySearch = new Search(array(6, 9, 3, 4, 1, 0, -7), 4);
$otherSearchResult                                            = new Search(array(6, 9, 3, 4, 1, 0, -7), 4);
$canNotSearchResult                                           = new Search(array(6, 9, 3, 4, 1, 0, -7), 8);
$firstArgumentErrorResult                                     = new Search(404, 4);
$firstEmptyErrorResult                                        = new Search(array(), 4);
$secondArgumentErrorResult                                    = new Search(array(6, 9, 3, 4, 1, 0, -7), array(4, 0, 4));
$firstArgumentErrorAndSecondArgumentErrorResult               = new Search(404, array(4, 0, 4));
$firstEmptyErrorAndSecondArgumentErrorResult                  = new Search(array(), array(4, 0, 4));
$notSetErrorResult                                            = new Search();

// 結果出力
// 線形探索法
{
  // 正常系: 指定されたデータの探索回数が返される
  // echo($otherResult->linearSearch());
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
{}

// ハッシュ表探索
{}

// オープンアドレス法
{}

// ハッシュチェイン法
{}

?>