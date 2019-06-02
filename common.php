<?php
/**
 * Url: http://xxcok.com
 * Author: xiaoxiaoxiao
 * Date: 2019/6/2
 * Time: 11:17
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
/**
 * 获取环境配置
 * @param string $name
 * @return array
 */
function get_env(string $name = 'self') :array
{
    $info = parse_ini_file(__DIR__. DIRECTORY_SEPARATOR . '.env', true);

    $result = $info[$name] ?? [];

    return $result;
}