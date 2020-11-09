<?php
    function getforTime($date){
        $second = time()-$date;
        $year= floor($second/(3600*24*30*12));
         if($year>0){
            $second= $second%(3600*24*30*12);
            $mon= floor($second/(3600*24*30));
            $second= $second%(3600*24*30);
            $day = floor($second/(3600*24));
            $second = $second%(3600*24);//除去整天之后剩余的时间
            $hour = floor($second/3600);
            $second = $second%3600;//除去整小时之后剩余的时间 
            $minute = floor($second/60);
            //$second = $second%60;//除去整分钟之后剩余的时间 
            //返回字符串
            return $year.'年'.$mon.'月'.$day.'天'.$hour.'小时'.$minute.'分钟';
             //return $year.'年后';
         }else{
             $mon= floor($second/(3600*24*30)); 
             if($mon>0){
                 $second= $second%(3600*24*30);
                $day = floor($second/(3600*24));
                $second = $second%(3600*24);//除去整天之后剩余的时间
                $hour = floor($second/3600);
                $second = $second%3600;//除去整小时之后剩余的时间 
                $minute = floor($second/60);
               return $mon.'月'.$day.'天'.$hour.'小时'.$minute.'分钟';
             }else{
               $day = floor($second/(3600*24));
               if($day>0){
                      $second = $second%(3600*24);//除去整天之后剩余的时间
                   $hour = floor($second/3600);
                   $second = $second%3600;//除去整小时之后剩余的时间 
                   $minute = floor($second/60);
                   return $day.'天'.$hour.'小时'.$minute.'分钟';
               }else{
                   $hour = floor($second/3600);
                   if($hour>0){
                          $second = $second%3600;//除去整小时之后剩余的时间 
                       $minute = floor($second/60);
                       return $hour.'小时'.$minute.'分钟';
                   }else{
                       $minute = floor($second/60);
                        if($minute>0){
                           return $minute.'分钟';
                        }else{
                           return $second.'秒';
                        }
                   }
               }
             }
         }
    }
	require 'mcstatslib/MinecraftQuery.php';
	require 'mcstatslib/MinecraftQueryException.php';
	require('config.php');
	use xPaw\MinecraftQuery;
	use xPaw\MinecraftQueryException;
	
	$Query = new MinecraftQuery( );
		$Query->Connect( $_serverip, $_serverport );
		$info = $Query->GetInfo( );
		$pl = $Query->GetPlayers( );
		if ($info["Version"] = $_serverversion )
	    {
	        $OnlineStatus = "在線";
	    }
	    else
	    {
	        $OnlineStatus = "離線";
	    }
    function get_server_cpu_usage(){
        $load = sys_getloadavg();
        return $load[0];
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Itim" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <title>~江流~ 服務器監測站點</title>
	<style>
	*{font-family: 'courier', cursive;}
	</style>
  </head>
  <body>
    <body style="background-color:#212529;">
	<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <br>
      <p align="center"><font color = "white">服務器狀態:</font></p>
	  <table class="table table-bordered table-dark">
	  <thead>
	  <th>服務器名:  <?PHP echo $info["HostName"];?> </th>
	  <th><?PHP echo "服務器在線狀態:  ".getforTime(strtotime('2020-11-9'));?></th>
	  </thead>
	  <thead>
	  <th>地址:  <?PHP echo "Gaea.ml".":".$info["HostPort"];?> </th>
	  <th>服務器在線狀態:   <?PHP echo $OnlineStatus;?></th>
	  </thead>
	  <thead>
	  <th>服務器版本:  <?PHP echo $info["Version"];?> </th>
	  <th>CPU佔用:  <?PHP echo get_server_cpu_usage();?></th>
	  </thead>
	  <thead>
	  </thead>
	  <thread>
	  <th><?PHP echo "服務器操作系統:  ".PHP_OS; ?> </th>
	  <th><?PHP echo "頁面版本:   ".$_SERVER ['SERVER_SOFTWARE']; ?> </th>
	  </thread>
  </table>
	  
    </div>
  </div>
</div>
  </body>
</html>	  
