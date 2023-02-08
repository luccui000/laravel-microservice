<?php

namespace App\Contracts;


interface GiaoHangInterface {
    public function phiVanChuyen($maPhuongXa, $maQuanHuyen, $maTinhThanh, $loaiDichVu = 0);
}
