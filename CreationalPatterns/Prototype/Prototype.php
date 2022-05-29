<?php
class Status {
  public int $level;
}

class Player {
  public string $name;
  public Status $status;
}


$status = new Status();
$status->level = 20;

$player1 = new Player();
$player1->name = "佐藤";
$player1->status = $status;


$player2 = $player1;

$player2->name = "田中";
$player2->status->level = 10000;

// clone を使わないと、shallow copy になるので、$player1は、レベル20の佐藤にならない
var_dump($player1); // 名前は田中、レベルは10000
var_dump($player2); // 名前は田中、レベルは10000