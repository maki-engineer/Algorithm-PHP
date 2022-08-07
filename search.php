<?php

class Search{
  private $array;
  private $searchNum;

  public function __construct($array, $searchNum){
    $this->array     = $array;
    $this->searchNum = $searchNum;
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

?>