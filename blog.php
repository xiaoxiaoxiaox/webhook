<?php
/**
 * Url: http://xxcok.com
 * Author: xiaoxiaoxiao
 * Date: 2019/3/31
 * Time: 9:48
 *
 *  .--,       .--,
 * ( (  \.---./  ) )
 *  '.__/o   o\__.'
 *     {=  ^  =}
 *      >  -  <
 *     /       \
 *    //       \\
 *   //|   .   |\\
 *   "'\       /'"_.-~^`'-.
 *      \  _  /--'         `
 *    ___)( )(___
 *   (((__) (__)))    高山仰止,景行行止.虽不能至,心向往之。
 * -----------------------------------------------------
 */
error_reporting(E_ALL);

$signature = $_SERVER['HTTP_X_HUB_SIGNATURE'];

//webhook secret
$token = 123456;

//获取json数据
$json_post  = file_get_contents("php://input");

//生成签名
$sha1 = hash_hmac('sha1', $json_post, $token);

var_dump($signature);
var_dump($sha1);
var_dump($json_post);

//签名验证
if ($signature !== 'sha1=' . $sha1) {
    die('sign error');
}

die(1);

//该目录为git检出目录
$dir = '/home/www/blog';

//git更新命令
$command = "cd {$dir}  && git checkout master  && git pull origin master 2>&1";

//执行命令
exec($command, $output);
var_dump($output);