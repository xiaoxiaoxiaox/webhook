<?php
/**
 * Url: http://xxcok.com
 * Author: xiaoxiaoxiao
 * Date: 2019/6/2
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
//设置请求超时时间
set_time_limit(0);

//exec('cd /home/www && ls -al && cat .gitconfig && git config --file /home/www/.gitconfig -l 2>&1', $l);
//var_dump($l);
//
//exec("whoami 2>&1&&git config --global user.email '1602882811@qq.com' 2>&1&& git config --global user.email 'xiaoxiaoxiao' 2>&1&&  git config --global -l 2>&1", $test);
//var_dump($test);
//
//exec("cd /home/www/blog  && git config user.name 'xiaoxiaoxiao' && git config user.email '1605882811@qq.com' && git checkout . && git pull origin master 2>&1", $output);
//var_dump($output);
//exit();

include_once __DIR__ . DIRECTORY_SEPARATOR . 'common.php';

$env = get_env('self');

$signature = $_SERVER['HTTP_X_HUB_SIGNATURE'];

//webhook secret
$token = $env['token'] ?? '';

//获取json数据
$json_post  = file_get_contents("php://input");

//生成签名
$sha1 = hash_hmac('sha1', $json_post, $token);

//签名验证
if ($signature !== 'sha1=' . $sha1) {
    echo 'sign error';
    exit();
}

//该目录为git检出目录
$dir = $env['dir'] ?? '';

if (empty($dir)) {
    echo '目录错误';
    exit();
}

//git更新命令
$command = "cd {$dir}  && git config user.name 'xiaoxiaoxiao' ".
    "&& git config user.email '1605882811@qq.com' ".
//    "&& git checkout . && git pull --force origin master 2>&1"; //强制更新
    "&& git checkout . && git fetch --all && git reset --hard origin/master"; //强制覆盖本地分支


//执行命令
exec($command, $output);
var_dump($output);
exit();