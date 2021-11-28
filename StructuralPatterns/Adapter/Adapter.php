<?php
interface Lion
{
  public function roar();
}

class AfricanLion implements Lion
{
  public function roar()
  {
  }
}

class AsianLion implements Lion
{
  public function roar()
  {
  }
}

class Hunter
{
  public function hunt(Lion $lion)
  {
  }
}

// これをゲームに加える必要がある
class WildDog
{
    public function bark()
    {
    }
}

// 野犬をadapterでラップして、ゲームとの互換性を得られるようにする
class WildDogAdapter implements Lion
{
    protected $dog;

    public function __construct(WildDog $dog)
    {
        $this->dog = $dog;
    }

    public function roar()
    {
        $this->dog->bark();
    }
}

// 実装例
$wildDog = new WildDog();
$wildDogAdapter = new WildDogAdapter($wildDog);

$hunter = new Hunter();
$hunter->hunt($wildDogAdapter);