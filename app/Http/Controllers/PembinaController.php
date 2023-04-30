<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Jabatan;
use App\Models\Kabkota;
use App\Models\Pembina;
use App\Models\Provinsi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PembinaController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $this->authorize('viewAll', Pembina::class);

    return view('pembina.index', [
      "provinsi" => Provinsi::find(1),
      "kabkota" => Kabkota::all(),
      "desa" => Desa::all(),
      "jabatans" => Jabatan::all(),
      "pembina" => Pembina::all(),
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    // FIXME: lakukan validasi
    $desa = Desa::find($request->desaId);
    $kecamatan = $desa->kecamatan;
    $kabkota = $kecamatan->kabkota;
    $provinsi = $kabkota->provinsi;

    $kodeJabatan = Jabatan::find($request->jabatanId)->kode;
    $kodeProvinsi = $provinsi->kode;
    $kodeKabKot = $kabkota->kode;
    $kodeKecamatan = $kecamatan->kode;
    $nomorUrut = '01';

    $noRegister = $kodeProvinsi . $kodeKabKot . $kodeKecamatan . $kodeJabatan . $nomorUrut;
    Pembina::create([
      "user_id" => User::create([
        'nama' => $request->nama,
        'username' => $request->username,
        'email' => $request->email,
        'password' => Hash::make($request->password),

      ]),
      "no_register" => $noRegister,
      "nama" => $request->nama,
      "no_urut" => $nomorUrut,
      "jabatan_id" => $request->jabatanId,
      "desa_id" => $request->desaId
    ]);

    return response()->json([
      'nomor_urut' => $kecamatan->toJson(),
      'status' => 'success',
      'message' => 'Berhasil menambah pembina'
    ]);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Pembina  $pembina
   * @return \Illuminate\Http\Response
   */
  public function show(Request $request)
  {
    // if ($request->ajax()) {
    $keyword = $request->keyword;
    $desaId = $request->desa;

    $pembina = Pembina::when($desaId, function ($q, $desaId) {
      $q->where('desa_id', $desaId);
    })->when($keyword, function ($q, $keyword) {
      $q->where("nama", "LIKE", "%" . $keyword . "%")
        ->orWhere("no_register", "LIKE", "%" . $keyword . "%");
    })
      // ->get();
      ->paginate(10);

    $count = count($pembina);

    return ($count != 0)
      ? view('partials.table-pembina', ["pembina" => $pembina])
      : '<tr><th colspan="5" class="text-center">Maaf data tidak ditemukan</th></tr>';
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Pembina  $pembina
   * @return \Illuminate\Http\Response
   */
  public function edit(Pembina $pembina)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Pembina  $pembina
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Pembina $pembina)
  {
    // FIXME: perbaiki validasi
    $validated = $request->validate([
      'nama' => 'required',
      'jabatan_id' => 'required'
    ]);

    $pembina->nama = $validated["nama"];
    $pembina->jabatan_id = $validated['jabatan_id'];
    $pembina->save();

    return back()->with('success', 'Berhasil mengupdate data pembina ' . $validated["nama"]);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Pembina  $pembina
   * @return \Illuminate\Http\Response
   */
  public function destroy(Pembina $pembina)
  {
    
    if($pembina->pikr->isNotEmpty()){
      return \back()->with('fail', 'Tidak dapat menghapus pembina, terdapat PIK-R yang terkait dengan pembina tersebut');
    }
    
    $nama = $pembina->nama;
    $pembina->delete();
    User::where('id', $pembina->user_id)->delete();
    return back()->with('success', 'Berhasil menghapus data pembina ' . $nama);
  }

  public function api(Request $request)
  {
    if ($request->ajax()) {
      $keyword = $request->keyword;
      $desaId = $request->desa;

      $pembinas = Pembina::when($desaId, function ($q, $desaId) {
        $q->where('desa_id', $desaId);
      })->when($keyword, function ($q, $keyword) {
        $q->where("nama", "LIKE", "%" . $keyword . "%")
          ->orWhere("no_register", "LIKE", "%" . $keyword . "%");
      })
        ->get();

      return ($pembinas->count() != 0)
        ? response()->json($pembinas)
        : response()->json(['error' => 'Pembina tidak ditemukan']);
    }
  }
}
