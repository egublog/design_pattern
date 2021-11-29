<?php

class JobPost
{
  protected $title;

  public function __construct(string $title)
  {
    $this->title = $title;
  }

  public function getTitle()
  {
    return $this->title;
  }
}

class JobSeeker implements Observer
{
  protected $name;

  public function __construct(string $name)
  {
    $this->name = $name;
  }

  public function onJobPosted(JobPost $job)
  {
    // 求人が投稿されたときの処理を何か書く
    echo 'こんにちは、' . $this->name . 'さん。新しい求人が投稿されました: ' . $job->getTitle();
  }
}

class JobPostings implements Observable
{
  protected $observers = [];

  protected function notify(JobPost $jobPosting)
  {
    foreach ($this->observers as $observer) {
      $observer->onJobPosted($jobPosting);
    }
  }

  public function attach(Observer $observer)
  {
    $this->observers[] = $observer;
  }

  public function addJob(JobPost $jobPosting)
  {
    $this->notify($jobPosting);
  }
}

// 登録者の作成
$johnDoe = new JobSeeker('John Doe');
$janeDoe = new JobSeeker('Jane Doe');

// 投稿のパブリッシャーを作成して登録者をアタッチする
$jobPostings = new JobPostings();
$jobPostings->attach($johnDoe);
$jobPostings->attach($janeDoe);

// 求人を1つ追加して、求職者に通知されるかどうかをチェック
$jobPostings->addJob(new JobPost('ソフトウェアエンジニア'));

// Output
// こんにちは、John Doeさん。新しい求人が投稿されました: ソフトウェアエンジニア
// こんにちは、Jane Doeさん。新しい求人が投稿されました: ソフトウェアエンジニア