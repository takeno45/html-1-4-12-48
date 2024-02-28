<?php
ini_set('display_errors', 1);
abstract class MainPost{
  abstract public function show();
  protected $text;
  
  public function __construct($text) {
    $this -> text =$text;
  }
}
//親クラス
class Post extends MainPost{

  public function show() {
    printf('%s<br>',$this -> text);
  }
}
//子クラス
class SponserPost extends MainPost{
  private $sponser;

  public function __construct($text,$sponser){
    parent::__construct($text);
    $this -> sponser = $sponser;
  }
  
  
  public function show() {
    printf('%s by %s<br>',$this -> text,$this -> sponser);
  }
}

$posts = [];
$posts[0] = new Post('Hello');
$posts[1] = new Post('Hi!');
$posts[2] = new SponserPost('Good Morning','wingNoah');

function Allpost(Mainpost $post){
  $post -> show();
}

foreach ($posts as $post){
  AllPost($post);
}
// $posts[0]->show();
// $posts[1]->show();
// $posts[2]->show();
?>