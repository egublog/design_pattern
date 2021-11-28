<?php
// セキュリティドアをつくる
interface Gate
{
  public function open();
  public function close();
}

class LabGate implements Gate
{
  public function open()
  {
    echo "研究室のドアを開く";
  }

  public function close()
  {
    echo "研究室のドアを閉じる";
  }
}

// セキュアにするproxyを記述
class Security
{
    protected $gate;

    public function __construct(Gate $gate)
    {
        $this->gate = $gate;
    }

    public function open($password)
    {
        if ($this->authenticate($password)) {
            $this->gate->open();
        } else {
            echo "絶対ダメ！開けられません。";
        }
    }

    public function authenticate($password)
    {
        return $password === '$ecr@t';
    }

    public function close()
    {
        $this->gate->close();
    }
}

// 実装例
$door = new Security(new LabGate());
$door->open('invalid'); // 絶対ダメ！開けられません。

$door->open('$ecr@t');  // 研究室のドアを開く
$door->close();         // 研究室のドアを閉じる
