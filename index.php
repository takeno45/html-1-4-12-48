<?php
ini_set('display_errors', 1);
//クラス
class Post{
  private $text;
  private $likes = 0;
  private static $count = 0;
  public const VERSION = 0.1;

  public function __construct($text){
    $this -> text = $text;
    self::$count++;
  }

  public function show(){
    printf('%s (%d)<br>', $this -> text, $this -> likes);
  }
  public function like(){
    $this->likes++;
  }
  public static function showCount(){
    printf('count: %d<br>', self::$count);
    printf('Version: %.1f<br>', self::VERSION);
  }
}
$posts = [];
$posts[0] = new Post('Hello');
$posts[1] = new Post('Hi');

// $posts[0]->likes--;
$posts[0]->like();

$posts[0]->show();
$posts[1]->show();

post::showCount();
echo Post::VERSION. '<br>';
?>