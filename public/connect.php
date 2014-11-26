<?php
// OBS!! Detta måste ändras i framtoden till mysqli.

error_reporting(E_ALL ^ E_DEPRECATED);
mysql_connect('localhost', 'root', '');
mysql_select_db('nyhetsbrev');
mysql_set_charset("utf8");
