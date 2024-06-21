<?php
$str = "he2006<H1 >";
$str = filter_var($str, FILTER_SANITIZE_SPECIAL_CHARS);
echo $str;
echo 'oi';
