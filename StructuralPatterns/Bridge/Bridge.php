<?php

// WebPageという階層を作成
interface WebPage
{
  public function __construct(Theme $theme);
  public function getContent();
}

class About implements WebPage
{
  protected $theme;

  public function __construct(Theme $theme)
  {
    $this->theme = $theme;
  }

  public function getContent()
  {
    return $this->theme->getColor() . "のAboutページ";
  }
}

class Careers implements WebPage
{
  protected $theme;

  public function __construct(Theme $theme)
  {
    $this->theme = $theme;
  }

  public function getContent()
  {
    return $this->theme->getColor() . "のCareersページ";
  }
}

// 独立したThemeという階層を作る
interface Theme
{
    public function getColor();
}

class DarkTheme implements Theme
{
    public function getColor()
    {
        return 'Dark Black';
    }
}
class LightTheme implements Theme
{
    public function getColor()
    {
        return 'Off white';
    }
}
class AquaTheme implements Theme
{
    public function getColor()
    {
        return 'Light blue';
    }
}

// 2つの階層を使う
$darkTheme = new DarkTheme();

$about = new About($darkTheme);
$careers = new Careers($darkTheme);

echo $about->getContent();   // "Dark BlackのAboutページ";
echo $careers->getContent(); // "Dark BlackのCareersページ";