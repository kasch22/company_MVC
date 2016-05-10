<?php

class Location
{
    static function redirect($location)
    {
        header('location: '. $location);
    }
}