<table style="empty-cells: show; min-width: 100%; border-collapse: collapse; background-color: white;" cellpadding="0" cellspacing="0" border="0">
  <thead>
    <tr style="height:24px" valign="top">
      <td style="text-indent: 0px; vertical-align: middle;text-align: center;" colspan="14">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #000000; font-size: 16px; line-height: 1.1640625; font-weight: bold;">JUMLAH PUSAT INFORMASI DAN KONSELING REMAJA/MAHASISWA (PIK REMAJA) BERDASARKAN MATERI, SARANA DAN KEMITRAAN YANG DIMILIKI SERTA PENDIDIK DAN KONSELOR SEBAYA</span>
      </td>
    </tr>
    <tr style="height:25px" valign="top">
      <td style="text-indent: 0px; text-align: center;" colspan="14">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #000000; font-size: 16px; line-height: 1.1640625; font-weight: bold;">TAHUN: {{ $filters['tahun'] }}</span>
      </td>
    </tr>
    <tr style="height:26px" valign="top">
      <td style="text-indent: 0px; vertical-align: middle;text-align: left;" colspan="14">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #000000; font-size: 12px; line-height: 1.1640625; font-weight: bold;">Prov: GORONTALO</span>
      </td>
    </tr>
    @if ($filters['kabkota_id'])
      <tr style="height:26px" valign="top">
        <td style="text-indent: 0px; vertical-align: middle;text-align: left;" colspan="14">
          <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #000000; font-size: 12px; line-height: 1.1640625; font-weight: bold;">Kab: {{ $kabkota->parsedNama }}</span>
        </td>
      </tr>
      @if ($filters['kecamatan_id'])
        <tr style="height:26px" valign="top">
          <td style="text-indent: 0px; vertical-align: middle;text-align: left;" colspan="14">
            <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #000000; font-size: 12px; line-height: 1.1640625; font-weight: bold;">Kec: {{ $kecamatan->parsedNama }}</span>
          </td>
        </tr>
      @endif
    @endif
    <tr style="height:30px" valign="top">
      <td style="background-color: #085480; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle;text-align: center;" rowspan="2">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 8px; line-height: 1.1640625; font-weight: bold;">KODE</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle;text-align: center;" rowspan="2">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 8px; line-height: 1.1640625; font-weight: bold;">{{ $filters['kabkota_id'] ? ($filters['kecamatan_id'] ? 'DESA' : 'KECAMATAN') : 'KABUPATEN' }}</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle;text-align: center;" rowspan="2">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 8px; line-height: 1.1640625; font-weight: bold;">JUMLAH PIK REMAJA</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle;text-align: center;" colspan="5">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 8px; line-height: 1.1640625; font-weight: bold;">MATERI, SARANA DAN KEMITRAAN YANG DIMILIKI</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle;text-align: center;" rowspan="2">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 8px; line-height: 1.1640625; font-weight: bold;">JUMLAH PENDIDIK SEBAYA</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle;text-align: center;" colspan="2">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 8px; line-height: 1.1640625; font-weight: bold;">PELATIHAN</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle;text-align: center;" rowspan="2">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 8px; line-height: 1.1640625; font-weight: bold;">JUMLAH KONSELOR SEBAYA</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle;text-align: center;" colspan="2">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 8px; line-height: 1.1640625; font-weight: bold;">PELATIHAN</span>
      </td>
    </tr>
    <tr style="height:60px" valign="top">
      <td style="background-color: #085480; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle;text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 8px; line-height: 1.1640625; font-weight: bold;">MATERI PKBR</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle;text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 8px; line-height: 1.1640625; font-weight: bold;">MATERI LAINNYA</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle;text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 8px; line-height: 1.1640625; font-weight: bold;">GENRE KIT</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle;text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 8px; line-height: 1.1640625; font-weight: bold;">SARANA PENYULUHAN LAINNYA</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle;text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 8px; line-height: 1.1640625; font-weight: bold;">JARINGAN DAN KEMITRAAN</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle;text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 8px; line-height: 1.1640625; font-weight: bold;">YA</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle;text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 8px; line-height: 1.1640625; font-weight: bold;">TIDAK</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle;text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 8px; line-height: 1.1640625; font-weight: bold;">YA</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle;text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 8px; line-height: 1.1640625; font-weight: bold;">TIDAK</span>
      </td>
    </tr>
    <tr style="height:21px" valign="top">
      <td style="background-color: #0099FF; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle;text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 8px; line-height: 1.1640625;">1</span>
      </td>
      <td style="background-color: #0099FF; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle;text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 8px; line-height: 1.1640625;">2</span>
      </td>
      <td style="background-color: #0099FF; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle;text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 8px; line-height: 1.1640625;">3</span>
      </td>
      <td style="background-color: #0099FF; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle;text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 8px; line-height: 1.1640625;">4</span>
      </td>
      <td style="background-color: #0099FF; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle;text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 8px; line-height: 1.1640625;">5</span>
      </td>
      <td style="background-color: #0099FF; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle;text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 8px; line-height: 1.1640625;">6</span>
      </td>
      <td style="background-color: #0099FF; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle;text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 8px; line-height: 1.1640625;">7</span>
      </td>
      <td style="background-color: #0099FF; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle;text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 8px; line-height: 1.1640625;">8</span>
      </td>
      <td style="background-color: #0099FF; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle;text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 8px; line-height: 1.1640625;">9</span>
      </td>
      <td style="background-color: #0099FF; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle;text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 8px; line-height: 1.1640625;">10</span>
      </td>
      <td style="background-color: #0099FF; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle;text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 8px; line-height: 1.1640625;">11</span>
      </td>
      <td style="background-color: #0099FF; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle;text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 8px; line-height: 1.1640625;">12</span>
      </td>
      <td style="background-color: #0099FF; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle;text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 8px; line-height: 1.1640625;">13</span>
      </td>
      <td style="background-color: #0099FF; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle;text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 8px; line-height: 1.1640625;">14</span>
      </td>
    </tr>
  </thead>

  <tbody>
    @php
      $total = [
          'pikr' => 0,
          'hasMateri' => 0,
          'hasMateriLainnya' => 0,
          'hasGenreKit' => 0,
          'hasSaranaLainnya' => 0,
          'hasMitra' => 0,
          'pendidikSebaya' => 0,
          'pendidikSebayaHasPelatihan' => 0,
          'pendidikSebayaHasNotPelatihan' => 0,
          'konselorSebaya' => 0,
          'konselorSebayaHasPelatihan' => 0,
          'konselorSebayaHasNotPelatihan' => 0,
      ];
    @endphp
    @forelse ($areas as $area)
      @php
        // pikr yang diambil hanya pikr yang dicreate setelah tahun $filters['tahun']
        $pikrs = $area->pikrs->filter(fn($pikr) => $pikr->created_at->lte(Carbon\Carbon::createFromFormat('Y', $filters['tahun'])));
        $hasMateri = $pikrs->filter(fn($pikr) => $pikr->materi);
        $hasMateriLainnya = $pikrs->filter(fn($pikr) => $pikr->materi_lainnya === '1');
        $hasGenreKit = $pikrs->filter(fn($pikr) => $pikr->sarana && $pikr->sarana->genre_kit);
        $hasSaranaLainnya = $pikrs->filter(fn($pikr) => $pikr->sarana && collect($pikr->sarana->getAttributes())->some(1));
        $hasMitra = $pikrs->filter(fn($pikr) => $pikr->mitra->count());
        $penguruses = $pikrs->flatMap(fn($pikr) => $pikr->pengurus);
        $pendidikSebayas = $penguruses->filter(fn($pengurus) => $pengurus->jabatan === 'Pendidik Sebaya');
        $pendidikSebayasHasPelatihan = $pendidikSebayas->filter(fn($pendidikSebaya) => $pendidikSebaya->pernah_pelatihan);
        $pendidikSebayasHasNotPelatihan = $pendidikSebayas->filter(fn($pendidikSebaya) => !$pendidikSebaya->pernah_pelatihan);
        $konselorSebayas = $penguruses->filter(fn($pengurus) => $pengurus->jabatan === 'Konselor Sebaya');
        $konselorSebayasHasPelatihan = $konselorSebayas->filter(fn($konselorSebaya) => $konselorSebaya->pernah_pelatihan);
        $konselorSebayasHasNotPelatihan = $konselorSebayas->filter(fn($konselorSebaya) => !$konselorSebaya->pernah_pelatihan);
        
        $total['pikr'] += $pikrs->count();
        $total['hasMateri'] += $hasMateri->count();
        $total['hasMateriLainnya'] += $hasMateriLainnya->count();
        $total['hasGenreKit'] += $hasGenreKit->count();
        $total['hasSaranaLainnya'] += $hasSaranaLainnya->count();
        $total['hasMitra'] += $hasMitra->count();
        $total['pendidikSebaya'] += $pendidikSebayas->count();
        $total['pendidikSebayaHasPelatihan'] += $pendidikSebayasHasPelatihan->count();
        $total['pendidikSebayaHasNotPelatihan'] += $pendidikSebayasHasNotPelatihan->count();
        $total['konselorSebaya'] += $konselorSebayas->count();
        $total['konselorSebayaHasPelatihan'] += $konselorSebayasHasPelatihan->count();
        $total['konselorSebayaHasNotPelatihan'] += $konselorSebayasHasNotPelatihan->count();
      @endphp
      <tr style="height:30px" valign="top">
        <td style="border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle;text-align: center;">
          <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #000000; font-size: 10px; line-height: 1.1640625;">{{ $area->kode }}</span>
        </td>
        <td style="border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle;text-align: left;">
          <div style="padding-left:5px;"><span style="white-space: nowrap; font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #000000; font-size: 10px; line-height: 1; *line-height: normal;">{{ $area->parsedNama }}</span></div>
        </td>
        <td style="border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle;text-align: center;">
          <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #000000; font-size: 10px; line-height: 1.1640625;">{{ $pikrs->count() }}</span>
        </td>
        <td style="border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle;text-align: center;">
          <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #000000; font-size: 10px; line-height: 1.1640625;">{{ $hasMateri->count() }}</span>
        </td>
        <td style="border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle;text-align: center;">
          <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #000000; font-size: 10px; line-height: 1.1640625;">{{ $hasMateriLainnya->count() }}</span>
        </td>
        <td style="border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle;text-align: center;">
          <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #000000; font-size: 10px; line-height: 1.1640625;">{{ $hasGenreKit->count() }}</span>
        </td>
        <td style="border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle;text-align: center;">
          <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #000000; font-size: 10px; line-height: 1.1640625;">{{ $hasSaranaLainnya->count() }}</span>
        </td>
        <td style="border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle;text-align: center;">
          <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #000000; font-size: 10px; line-height: 1.1640625;">{{ $hasMitra->count() }}</span>
        </td>
        <td style="border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle;text-align: center;">
          <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #000000; font-size: 10px; line-height: 1.1640625;">{{ $pendidikSebayas->count() }}</span>
        </td>
        <td style="border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle;text-align: center;">
          <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #000000; font-size: 10px; line-height: 1.1640625;">{{ $pendidikSebayasHasPelatihan->count() }}</span>
        </td>
        <td style="border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle;text-align: center;">
          <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #000000; font-size: 10px; line-height: 1.1640625;">{{ $pendidikSebayasHasNotPelatihan->count() }}</span>
        </td>
        <td style="border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle;text-align: center;">
          <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #000000; font-size: 10px; line-height: 1.1640625;">{{ $konselorSebayas->count() }}</span>
        </td>
        <td style="border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle;text-align: center;">
          <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #000000; font-size: 10px; line-height: 1.1640625;">{{ $konselorSebayasHasPelatihan->count() }}</span>
        </td>
        <td style="border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle;text-align: center;">
          <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #000000; font-size: 10px; line-height: 1.1640625;">{{ $konselorSebayasHasNotPelatihan->count() }}</span>
        </td>
      </tr>
    @empty
      <tr style="height:30px" valign="top">
        <td style="border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle;text-align: center;" colspan="14">
          <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #000000; font-size: 10px; line-height: 1.1640625;">Tidak ada data</span>
        </td>
      </tr>
    @endforelse
  </tbody>

  <tfoot>
    <tr style="height:40px" valign="top">
      <td style="background-color: #085480; border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle;text-align: center;" colspan="2">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 12px; line-height: 1.1640625; font-weight: bold;">Jumlah Total</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle;text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 10px; line-height: 1.1640625;">{{ $total['pikr'] }}</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle;text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 10px; line-height: 1.1640625;">{{ $total['hasMateri'] }}</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle;text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 10px; line-height: 1.1640625;">{{ $total['hasMateriLainnya'] }}</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle;text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 10px; line-height: 1.1640625;">{{ $total['hasGenreKit'] }}</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle;text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 10px; line-height: 1.1640625;">{{ $total['hasSaranaLainnya'] }}</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle;text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 10px; line-height: 1.1640625;">{{ $total['hasMitra'] }}</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle;text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 10px; line-height: 1.1640625;">{{ $total['pendidikSebaya'] }}</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle;text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 10px; line-height: 1.1640625;">{{ $total['pendidikSebayaHasPelatihan'] }}</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle;text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 10px; line-height: 1.1640625;">{{ $total['pendidikSebayaHasNotPelatihan'] }}</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle;text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 10px; line-height: 1.1640625;">{{ $total['konselorSebaya'] }}</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle;text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 10px; line-height: 1.1640625;">{{ $total['konselorSebayaHasPelatihan'] }}</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle;text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 10px; line-height: 1.1640625;">{{ $total['konselorSebayaHasNotPelatihan'] }}</span>
      </td>
    </tr>
  </tfoot>
</table>
