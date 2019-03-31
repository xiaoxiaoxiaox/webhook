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

$gitPost = json_decode(file_get_contents("php://input"));

$dir = '/home/www/blog';//该目录为git检出目录
$command = "cd {$dir}  && git checkout  master  && git pull origin master";
//$handle = popen($comm, 'r');
//$read = stream_get_contents($handle);
//echo "'$handle'; " . gettype($handle) . "\n";
//pclose($handle);
//echo json_encode($read);
echo exec('whoami');

echo exec($command);