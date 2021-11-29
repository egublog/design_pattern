<?php 

// テキストエディター
class EditorMemento
{
    protected $content;

    public function __construct(string $content)
    {
        $this->content = $content;
    }

    public function getContent()
    {
        return $this->content;
    }
}

// mementoオブジェクトを使うエディター
class Editor
{
    protected $content = '';

    public function type(string $words)
    {
        $this->content = $this->content . ' ' . $words;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function save()
    {
        return new EditorMemento($this->content);
    }

    public function restore(EditorMemento $memento)
    {
        $this->content = $memento->getContent();
    }
}

$editor = new Editor();

// 何か入力する
$editor->type('最初の文です。');
$editor->type('次の文です。');

// 後で戻したいステートを保存する: 「最初の文です。」「次の文です。」
$saved = $editor->save();

// もう少し入力する
$editor->type('3番目の文です。');

// Contentを出力して保存
echo $editor->getContent(); // 「最初の文です。」「次の文です。」「3番目の文です。」

// 最後に保存したステートに戻す
$editor->restore($saved);

$editor->getContent(); // 「最初の文です。」「次の文です。」