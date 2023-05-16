<?php

namespace App\Http\Controllers;

use App\Models\Pikr;
use App\Http\Requests\StorePikrRequest;
use App\Http\Requests\UpdatePikrRequest;
use App\Mail\SendEmail;
use App\Models\Desa;
use App\Models\Kabkota;
use App\Models\Kecamatan;
use App\Models\Materi;
use App\Models\Pembina;
use App\Models\Provinsi;
use App\Models\Sarana;
use Illuminate\Http\Request;

class PikrController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('pikr.index', [
      "provinsi" => Provinsi::first(),
      "kabkotas" => Kabkota::all(),
      "pikr" => Pikr::all(),
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('pikr.create', [
      'kabkota' => Kabkota::all(),
      'pembinas' => Pembina::all()
    ]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \App\Http\Requests\StorePikrRequest  $request
   * @return \Illuminate\Http\Response
   */
  public function store(StorePikrRequest $request)
  {
    //
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Pikr  $pikr
   * @return \Illuminate\Http\Response
   */
  public function show(Pikr $pikr)
  {
    $bentuk_kerjasama = [
      'Sponsorship',
      'Narasumber',
    ];

    $sumber_dana = [
      'APBN',
      'APBD',
      'ADD',
      'Swadaya',
    ];


    return \view('pikr.detail', [
      'pikr_info' => $pikr,
      'materi' => Materi::all(),
      'materi_pikr' => $pikr->materi()->first(),
      'sarana' => Sarana::all(),
      'sarana_pikr' => $pikr->sarana()->first(),
      'mitra_s' => $pikr->mitra()->get(),
      'pengurus' => $pikr->pengurus()->get(),
      'provinsi' => Provinsi::all(),
      'kabkota' => Kabkota::all(),
      'kecamatan' => Kecamatan::all(),
      'desa' => Desa::all(),
      'bentuk_kerjasama' => $bentuk_kerjasama,
      'sumber_dana_pikr' => explode(',', $pikr->sumber_dana),
      'sumber_dana' => $sumber_dana,
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Pikr  $pikr
   * @return \Illuminate\Http\Response
   */
  public function edit(Pikr $pikr)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \App\Http\Requests\UpdatePikrRequest  $request
   * @param  \App\Models\Pikr  $pikr
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Pikr $pikr)
  {
    if ($request->has('sosmed')) $pikr->update(['akun_medsos' => $request->sosmed]);
    if ($request->has('pro_pn')) $pikr->update(['pro_pn' => $request->pro_pn]);
    if ($request->has('sumber_dana')) {
      $pikr->update(['sumber_dana' => implode(',', $request->sumber_dana)]);
    } else {
      $pikr->update(['sumber_dana' => "Tidak Ada"]);
    }
    if ($request->has('keterpaduan_kelompok')) $pikr->update(['keterpaduan_kelompok' => $request->keterpaduan_kelompok]);

    return \back()->with('success', 'Berhasil mengubah data PIK-R');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Pikr  $pikr
   * @return \Illuminate\Http\Response
   */
  public function destroy(Pikr $pikr)
  {
    // FIXME: Bagian ini masih bisa dilakukan refactoring agar lebih singkat
    $pikr->delete();

    return \back()->with('success', "Semua Data yang berkaitan dengan $pikr->nama berhasil dihapus");
  }

  public function verify(Pikr $pikr)
  {

    $this->authorize('verify', $pikr);

    if ($pikr->verified) {
      $pikr->update([
        "verified" => false
      ]);

      $dataEmail = [
        'receiver' => $pikr->user->email,
        'title' => 'Membatalkan Verifikasi PIKR',
        'body' => "Akun $pikr->nama sudah dicabut hak aksesnya, anda tidak dapat login di sistem informasi PIK-R"
      ];

      $send_email = new MailController();
      $send_email->sendEmail($dataEmail);

      return back()->with('error', "Berhasil membatalkan verifikasi PIK-R {$pikr->nama}");
    }

    $provinsi = $pikr->desa->kecamatan->kabkota->provinsi->kode;
    $kabkota = $pikr->desa->kecamatan->kabkota->kode;
    $kecamatan = $pikr->desa->kecamatan->kode;
    $unique_code = '5';
    $id = $pikr->id;

    $no_register = \sprintf("%s%s%s%s%s", $provinsi, $kabkota, $kecamatan, $unique_code, $id);

    $pikr->update([
      'no_register' => $no_register,
      'no_urut' => $id
    ]);

    $pikr->update([
      "verified" => true
    ]);

    $dataEmail = [
      'receiver' => $pikr->user->email,
      'title' => 'Verifikasi PIKR Berhasil',
      'body' => "Akun $pikr->nama sudah bisa login"
    ];

    $send_email = new MailController();
    $send_email->sendEmail($dataEmail);

    return back()->with('success', "PIK-R {$pikr->nama} berhasil diverifikasi");
  }

  public function api(Request $request)
  {
    if ($request->ajax()) {
      $desaId = $request->desa;
      $desa = Desa::find($desaId);

      $pikrs = Pikr::where('desa_id', $desaId)->get();

      return ($pikrs->count() !== 0)
        ? response()->json([
          'pikrs' => $pikrs->map(function ($pikr) {
            return [
              ...$pikr->toArray(),
              'pembina' => $pikr->pembina,
              'sk' => $pikr->sk
            ];
          }),
          'desa' => $desa,
          'kecamatan' => $desa->kecamatan,
          'kabkota' => $desa->kecamatan->kabkota,
          'provinsi' => $desa->kecamatan->kabkota->provinsi
        ])
        : response()->json(['error' => 'PIK-R tidak ditemukan']);
    }
  }
}
