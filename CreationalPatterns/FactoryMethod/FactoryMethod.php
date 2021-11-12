<?php 

// 面接の例

// 面接官（Interviewer）のインターフェイスと実装
interface Interviewer
{
    public function askQuestions();
}

class Developer implements Interviewer
{
    public function askQuestions()
    {
        echo 'デザインパターンについて尋ねる';
    }
}

class CommunityExecutive implements Interviewer
{
    public function askQuestions()
    {
        echo 'コミュニティ育成について尋ねる';
    }
}

// 採用担当の管理職
abstract class HiringManager
{

    // Factory method
    abstract protected function makeInterviewer(): Interviewer;

    public function takeInterview()
    {
        $interviewer = $this->makeInterviewer();
        $interviewer->askQuestions();
    }
}

// 子クラスも拡張可能になり、必要な面接官を提供できるようになる
class DevelopmentManager extends HiringManager
{
    protected function makeInterviewer(): Interviewer
    {
        return new Developer();
    }
}

class MarketingManager extends HiringManager
{
    protected function makeInterviewer(): Interviewer
    {
        return new CommunityExecutive();
    }
}

// 実際に使用する
$devManager = new DevelopmentManager();
$devManager->takeInterview();       // 出力: デザインパターンについて尋ねる

$marketingManager = new MarketingManager();
$marketingManager->takeInterview(); // コミュニティ育成について尋ねる