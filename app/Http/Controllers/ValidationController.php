<?php

namespace App\Http\Controllers;

use App\Models\Pikr;
use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ValidationController extends Controller
{
  public function validatePikr()
  {
    return \view('validation.pikr', [
      'pikr' => Pikr::all()->filter(fn ($pikr) => $pikr->kecamatan->id === auth()->user()->pembina->kecamatan->id)
    ]);
  }

  public function validateKegiatan()
  {
    return \view('validation.kegiatan', [
      'laporan' => Laporan::all(),
    ]);
  }

  public function denyPikr(Request $request, Pikr $pikr)
  {

    $validator = Validator::make($request->all(), [
      'reason' => 'required',
    ]);

    if ($validator->fails()) {
      return back()->with('fail', 'Deskripsi jangan di kosongkan');
    }

    $dataEmail = [
      'receiver' => $pikr->user->email,
      'title' => 'Menolak Pendaftaran PIKR',
      'body' => "Maaf, PIK-R $pikr->nama tidak dapat diterima pengajuannya dengan alasan: $request->reason"
    ];

    $send_email = new MailController();
    $send_email->sendEmail($dataEmail);

    $pikr->user->delete();
    $pikr->delete();

    return \back()->with('success', 'Berhasil menolak validasi pikr');
  }

  public function denyReport(Request $request, Laporan $report)
  {
    $validator = Validator::make($request->all(), [
      'reason' => 'required',
    ]);

    if ($validator->fails()) {
      return back()->with('fail', 'Deskripsi jangan di kosongkan');
    }

    $dataEmail = [
      'receiver' => $report->pikr->user->email,
      'title' => 'Menolak Data Pelaporan PIKR',
      'body' => "Maaf, Data Pelaporan Bulan tahun $report->bulan_lapor - $report->tahun_lapor tidak dapat diterima pengajuannya dengan alasan: $request->reason"
    ];

    $send_email = new MailController();
    $send_email->sendEmail($dataEmail);

    if ($report->pelayananInformasi) {
      foreach ($report->pelayananInformasi as $item) $item->delete();
    }
    if ($report->konseling) {
      foreach ($report->konseling as $item) $item->delete();
    }
    if ($report->konselingKelompok) {
      foreach ($report->konselingKelompok as $item) $item->delete();
    }

    $report->delete();

    return \back()->with('success', 'Berhasil menolak data pelaporan pikr');
  }
}
