<?php 
// ドアを作る

// インターフェースと実装クラスを定義
interface Door
{
    public function getDescription();
}

class WoodenDoor implements Door
{
    public function getDescription()
    {
        echo '私は木のドアです';
    }
}

class IronDoor implements Door
{
    public function getDescription()
    {
        echo '私は鉄のドアです';
    }
}

// ドアの種類に応じた取り付け職人(fitting expert)を定義
interface DoorFittingExpert
{
    public function getDescription();
}

class Welder implements DoorFittingExpert
{
    public function getDescription()
    {
        echo '私が取り付けられるのは鉄のドアだけです';
    }
}

class Carpenter implements DoorFittingExpert
{
    public function getDescription()
    {
        echo '私が取り付けられるのは木のドアだけです';
    }
}

// 関連するオブジェクト（木製ドアのfactoryは木製ドアと木製ドア取付職人を1つずつ作成し、鉄製ドアのfactoryは鉄製ドアと鉄製ドア取付職人を1つずつ作成する、など）をファミリーごとにまとめることができる
interface DoorFactory
{
    public function makeDoor(): Door;
    public function makeFittingExpert(): DoorFittingExpert;
}

// 木製ドアのファクトリーは大工と木製ドアを返す
class WoodenDoorFactory implements DoorFactory
{
    public function makeDoor(): Door
    {
        return new WoodenDoor();
    }

    public function makeFittingExpert(): DoorFittingExpert
    {
        return new Carpenter();
    }
}

// 鉄製ドアのファクトリーで鉄製ドアとそれに合う取付職人を取得
class IronDoorFactory implements DoorFactory
{
    public function makeDoor(): Door
    {
        return new IronDoor();
    }

    public function makeFittingExpert(): DoorFittingExpert
    {
        return new Welder();
    }
}

// 使用例
$woodenFactory = new WoodenDoorFactory();

$door = $woodenFactory->makeDoor();
$expert = $woodenFactory->makeFittingExpert();

$door->getDescription();   // 出力: 私は木のドアです
$expert->getDescription(); // 出力: 私が取り付けられるのは木のドアだけです

// 鉄製ドアの場合も同様
$ironFactory = new IronDoorFactory();

$door = $ironFactory->makeDoor();
$expert = $ironFactory->makeFittingExpert();

$door->getDescription();   // 出力: 私は鉄のドアです
$expert->getDescription(); // 出力: 私が取り付けられるのは鉄製ドアだけです