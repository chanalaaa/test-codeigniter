<?php 
//print_r($acc_query);
//session_start();


echo '<br><h2>login success!</h2>';
//echo $username;
//echo "<br>hello : ".$_SESSION['user']."<br>";
echo "<br>hello : ".$this->session->userdata('user')."<br>"; 
echo '<br><a href="login">< back</a>';
echo '<br><a href="login/clear_sess">clear session</a>';
