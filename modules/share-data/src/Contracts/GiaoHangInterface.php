<?php

namespace Luccui\ShareData\Contracts;

interface GiaoHangInterface {
  public function phiVanChuyen($maPhuongXa, $maQuanHuyen, $maTinhThanh, $loaiDichVu = 0);
}