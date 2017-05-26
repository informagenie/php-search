<?php

/**
 * Entoure toutes les occurrences $mark dans $content par la balise <mark></mark>
 *
 * @param String $mark
 * @param String $content
 * @return string
 */
function mark($mark, $content)
{
    return utf8_encode(preg_replace("#$mark#i", "<mark>$0</mark>", utf8_decode($content)));
}