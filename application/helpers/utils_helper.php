<?php
/**
 * Created by PhpStorm.
 * User: eby
 * Date: 08/07/17
 * Time: 21:17
 */
if (!defined('BASEPATH')) exit('No direct script access allowed');

function money_formatter($number)
{
    return "Rp " . number_format($number, 2, ',', '.');
}

//format $how_many_day = "+1 week"
function add_to_future_day($how_many_day)
{
    $date = strtotime(date('Y-m-d'));
    $date = strtotime($how_many_day, $date);
    return date('Y-m-d', $date);
}

function get_diff_two_dates($date_start, $date_end)
{
    if ($date_start > $date_end) {
        return ((abs(strtotime($date_start) - strtotime($date_end))) / (60 * 60 * 24));
    }
    return 0;
}