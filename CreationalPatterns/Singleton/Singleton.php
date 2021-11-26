<?php

// 適当にクラスを作成
final class President
{
  private static $instance;

  private function __construct()
  {
    // コンストラクタを隠す
  }

  public static function getInstance(): President
  {
    if (!self::$instance) {
      self::$instance = new self();
    }

    return self::$instance;
  }

  private function __clone()
  {
    // クローンを無効にする
  }

  private function __wakeup()
  {
    // unserializeを無効にする
  }
}

// 同じインスタンスであることを確認
$president1 = President::getInstance();
$president2 = President::getInstance();

var_dump($president1 === $president2); // true
