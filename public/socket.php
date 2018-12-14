<?php
/**
 * Created by PhpStorm.
 * User: xiaoyao
 * Date: 2018/11/29
 * Time: 上午8:45
 */



set_time_limit(0);

$ip = '127.0.0.1';
$port = '7082';


$sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP) or die("socket_create() 失败的原因是:" . socket_strerror(socket_last_error()) . "/n");
var_dump($socket);


//绑定到socket端口
$result = socket_bind($sock, $ip, $port) or die("socket_bind() 失败的原因是:" . socket_strerror(socket_last_error()) . "/n");

$result = socket_listen($sock, 4) or die("socket_listen() 失败的原因是:" . socket_strerror(socket_last_error()) . "/n");
echo "OK\nBinding the socket on $address:$port ... ";
echo "OK\nNow ready to accept connections.\nListening on the socket ... \n";
do { // never stop the daemon
    //它接收连接请求并调用一个子连接Socket来处理客户端和服务器间的信息
    $msgsock = socket_accept($sock) or  die("socket_accept() failed: reason: " . socket_strerror(socket_last_error()) . "/n");

    //读取客户端数据
    echo "Read client data \n";
    //socket_read函数会一直读取客户端数据,直到遇见\n,\t或者\0字符.PHP脚本把这写字符看做是输入的结束符.
    $buf = socket_read($msgsock, 8192);
    echo "Received msg: $buf   \n";

    //数据传送 向客户端写入返回结果
    $msg = "welcome \n";
    socket_write($msgsock, $msg, strlen($msg)) or die("socket_write() failed: reason: " . socket_strerror(socket_last_error()) ."/n");
    //一旦输出被返回到客户端,父/子socket都应通过socket_close($msgsock)函数来终止
    socket_close($msgsock);
} while (true);
socket_close($sock);
