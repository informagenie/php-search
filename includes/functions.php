<?php
function mark($mark, $content)
{
return utf8_encode(preg_replace("#$mark#i", "<mark>$0</mark>", utf8_decode($content)));
}