<?php
print_r($news_item);
//session_start();
echo "<br><br>".$_SESSION['user']."<br>";

//foreach ($news_item as $news){
echo '<h2>' . $news_item['title'] . '</h2>';
echo $news_item['text'];

//}