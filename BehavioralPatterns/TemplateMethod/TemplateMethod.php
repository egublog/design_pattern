<?php 
abstract class Builder
{

    // Template method
    final public function build()
    {
        $this->test();
        $this->lint();
        $this->assemble();
        $this->deploy();
    }

    abstract public function test();
    abstract public function lint();
    abstract public function assemble();
    abstract public function deploy();
}


class AndroidBuilder extends Builder
{
    public function test()
    {
        echo 'Androidのテストを実行';
    }

    public function lint()
    {
        echo 'AndroidコードのLintを実行';
    }

    public function assemble()
    {
        echo 'Androidビルドのアセンブリを実行';
    }

    public function deploy()
    {
        echo 'Androidビルドをサーバーにデプロイ';
    }
}

class IosBuilder extends Builder
{
    public function test()
    {
        echo 'iOSのテストを実行';
    }

    public function lint()
    {
        echo 'iOSコードのLintを実行';
    }

    public function assemble()
    {
        echo 'iOSビルドのアセンブリを実行';
    }

    public function deploy()
    {
        echo 'iOSビルドをサーバーにデプロイ';
    }
}

$androidBuilder = new AndroidBuilder();
$androidBuilder->build();

// 出力:
// Androidのテストを実行
// AndroidコードのLintを実行
// Androidビルドのアセンブリを実行
// Androidビルドをサーバーにデプロイ

$iosBuilder = new IosBuilder();
$iosBuilder->build();

// 出力:
// iOSのテストを実行
// iOSコードのLintを実行
// iOSビルドのアセンブリを実行
// iOSビルドをサーバーにデプロイ