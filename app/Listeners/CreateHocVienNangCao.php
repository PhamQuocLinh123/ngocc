<?php

namespace App\Listeners;

use App\Events\HocVienCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\HocVienNangCao;

class CreateHocVienNangCao
{
    /**
     * Handle the event.
     *
     * @param  HocVienCreated  $event
     * @return void
     */
    public function handle(HocVienCreated $event)
    {
        $hocVien = $event->hocVien;

        if ($hocVien->ung_dung_cntt === 'Nâng cao') {
            $data = [
                'hoc_vien_id' => $hocVien->id,
                'ho_ten' => $hocVien->ho_ten,
                'can_cuoc_cong_dan' => $hocVien->can_cuoc_cong_dan,
                'ngay_cap_cccd' => $hocVien->ngay_cap_cccd,
                'noi_cap_cccd' => $hocVien->noi_cap_cccd,
                'ngay_sinh' => $hocVien->ngay_sinh,
                'dan_toc' => $hocVien->dan_toc,
                'so_dien_thoai' => $hocVien->so_dien_thoai,
                'sinh_vien_khoa' => $hocVien->sinh_vien_khoa,
                'nganh_hoc' => $hocVien->nganh_hoc,
                'ngay_dang_ky' => $hocVien->ngay_dang_ky,
                'ghi_chu' => $hocVien->ghi_chu,
                'noi_sinh' => $hocVien->noi_sinh,
                'gioi_tinh' => $hocVien->gioi_tinh,
            ];

            // Trong CreateHocVienNangCao Listener
            if ($hocVien->anh) {
                $data['anh'] = 'anhhocvien/' . $hocVien->anh; // Đường dẫn đầy đủ đến tệp ảnh
            }

            HocVienNangCao::create($data);
        }
    }
}