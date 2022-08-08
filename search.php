<?php

class Search{
  private $array;
  private $searchNum;

  public function __construct($array, $searchNum){
    $this->array     = $array;
    $this->searchNum = $searchNum;
  }

  // 色付け関数
  private function cecho($m, $c = 30) {
    return sprintf("\033[%dm %s \033[m", $c, $m);
  }

  // 線形探索法
  public function linearSearch(){}

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


// 結果出力
// 線形探索法
{}

// 2分探索法
{}

// ハッシュ表探索
{}

// オープンアドレス法
{}

// ハッシュチェイン法
{}

?>