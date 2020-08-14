<?php


namespace App\Http\Controllers;


interface Major
{
    const WAITING = 'Chờ xử lý';
    const SHIPPING = 'Đang giao hàng';
    const FINISH = 'Hoàn thành';
    const CANCEL = 'Hủy bỏ';
    const STATUSES = [
        0 => self::FINISH,
        1 => self::CANCEL,
        2 => self::SHIPPING,
        3 => self::WAITING
    ];
}
