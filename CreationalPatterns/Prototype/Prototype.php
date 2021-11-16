<?php
// 適当にクラスを作成
class Sheep
{
  protected $name;
  protected $category;

  public function __construct(string $name, string $category = 'オオツノヒツジ')
  {
    $this->name = $name;
    $this->category = $category;
  }

  public function setName(string $name)
  {
    $this->name = $name;
  }

  public function getName()
  {
    return $this->name;
  }

  public function setCategory(string $category)
  {
    $this->category = $category;
  }

  public function getCategory()
  {
    return $this->category;
  }
}

// クローンを試してみる
$original = new Sheep('ジョリー');
echo $original->getName();     // ジョリー
echo $original->getCategory(); // オオツノヒツジ

// クローン後、必要なものを変更する
$cloned = clone $original;
$cloned->setName('ドリー');
echo $cloned->getName();     // ドリー
echo $cloned->getCategory(); // オオツノヒツジ