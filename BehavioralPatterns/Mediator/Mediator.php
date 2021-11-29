<?php

//チャットルームと互いにメッセージを送信するユーザーを作成する

interface ChatRoomMediator
{
  public function showMessage(User $user, string $message);
}

// mediator
class ChatRoom implements ChatRoomMediator
{
  public function showMessage(User $user, string $message)
  {
    $time = date('M d, y H:i');
    $sender = $user->getName();

    echo $time . '[' . $sender . ']:' . $message;
  }
}


class User
{
  protected $name;
  protected $chatMediator;

  public function __construct(string $name, ChatRoomMediator $chatMediator)
  {
    $this->name = $name;
    $this->chatMediator = $chatMediator;
  }

  public function getName()
  {
    return $this->name;
  }

  public function send($message)
  {
    $this->chatMediator->showMessage($this, $message);
  }
}

// 実装例
$mediator = new ChatRoom();

$john = new User('John Doe', $mediator);
$jane = new User('Jane Doe', $mediator);

$john->send('こんちは！');
$jane->send('よう！');

// Output will be
// Feb 14, 10:58 [John]: こんちは！
// Feb 14, 10:58 [Jane]: よう！