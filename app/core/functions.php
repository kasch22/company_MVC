<?php
// Global functions


//escape function  for sanitizing
function s($string)
{
    return htmlentities($string, ENT_QUOTES, 'UTF-8');
}


