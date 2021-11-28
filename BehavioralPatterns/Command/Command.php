<?php 
// レシーバ
class Bulb
{
    public function turnOn()
    {
        echo "電球がつきました！";
    }

    public function turnOff()
    {
        echo "真っ暗！";
    }
}

interface Command
{
    public function execute();
    public function undo();
    public function redo();
}

// コマンド
class TurnOn implements Command
{
    protected $bulb;

    public function __construct(Bulb $bulb)
    {
        $this->bulb = $bulb;
    }

    public function execute()
    {
        $this->bulb->turnOn();
    }

    public function undo()
    {
        $this->bulb->turnOff();
    }

    public function redo()
    {
        $this->execute();
    }
}

class TurnOff implements Command
{
    protected $bulb;

    public function __construct(Bulb $bulb)
    {
        $this->bulb = $bulb;
    }

    public function execute()
    {
        $this->bulb->turnOff();
    }

    public function undo()
    {
        $this->bulb->turnOn();
    }

    public function redo()
    {
        $this->execute();
    }
}

// Invoker
class RemoteControl
{
    public function submit(Command $command)
    {
        $command->execute();
    }
}

// クライアントで使用する
$bulb = new Bulb();

$turnOn = new TurnOn($bulb);
$turnOff = new TurnOff($bulb);

$remote = new RemoteControl();
$remote->submit($turnOn); // 電球がつきました！
$remote->submit($turnOff); // 真っ暗！