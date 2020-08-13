<?php


namespace App\Http\Controllers;


interface Major
{
    const WAITING = 'Chờ xử lý';
    const SHIPPING = 'Đang giao hàng';
    const FINISH = 'Hoàn thành';
    const CANCEL = 'Hủy bỏ';
}
