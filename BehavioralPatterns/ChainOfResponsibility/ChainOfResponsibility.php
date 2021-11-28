<?php
// 銀行口座をつくる
abstract class Account
{
  protected $successor;
  protected $balance;

  public function setNext(Account $account)
  {
    $this->successor = $account;
  }

  public function pay(float $amountToPay)
  {
    if ($this->canPay($amountToPay)) {
      echo sprintf('%sで%sドル支払われました。' . PHP_EOL, get_called_class(), $amountToPay);
    } elseif ($this->successor) {
      echo sprintf('%sで支払いできません。次の支払い方法に進みます。' . PHP_EOL, get_called_class());
      $this->successor->pay($amountToPay);
    } else {
      throw new Exception('残高が十分なアカウントがありません');
    }
  }

  public function canPay($amount): bool
  {
    return $this->balance >= $amount;
  }
}

class Bank extends Account
{
  protected $balance;

  public function __construct(float $balance)
  {
    $this->balance = $balance;
  }
}

class Paypal extends Account
{
  protected $balance;

  public function __construct(float $balance)
  {
    $this->balance = $balance;
  }
}

class Bitcoin extends Account
{
  protected $balance;

  public function __construct(float $balance)
  {
    $this->balance = $balance;
  }
}


// 次のようにチェインを形成する
//      $bank->$paypal->$bitcoin
//
// 銀行払い（bank）を優先
//      銀行払いできない場合はpaypalにする
//      paypalで払えない場合はbit coinにする

$bank = new Bank(100);          // Bank（残高: 100）
$paypal = new Paypal(200);      // Paypal（残高: 200）
$bitcoin = new Bitcoin(300);    // Bitcoin（残高: 300）

$bank->setNext($paypal);
$paypal->setNext($bitcoin);

// 最優先の支払い方法を試す（ここではBank）
$bank->pay(259);

// 出力は次のようになる:
// ==============
// Bankで支払いできません。次の支払い方法に進みます。
// PayPalで支払いできません。次の支払い方法に進みます。
// Bitcoinで259ドル支払われました。