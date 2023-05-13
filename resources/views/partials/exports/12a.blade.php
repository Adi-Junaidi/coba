<table style="empty-cells: show; min-width: 100%; border-collapse: collapse; background-color: white;" cellpadding="0" cellspacing="0" border="0">
  <thead>
    <tr style="height:21px" valign="top">
      <td style="text-indent: 0px; vertical-align: middle;text-align: center;" colspan="13">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #000000; font-size: 16px; line-height: 1.1640625; font-weight: bold;">JUMLAH PUSAT INFORMASI DAN KONSELING REMAJA/MAHASISWA (PIK REMAJA) BERDASARKAN IDENTITAS DAN INFORMASI KELOMPOK KEGIATAN</span>
      </td>
    </tr>
    <tr style="height:25px" valign="top">
      <td style="text-indent: 0px; text-align: center;" colspan="13">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #000000; font-size: 16px; line-height: 1.1640625; font-weight: bold;">TAHUN: {{ $filters['tahun'] }}</span>
      </td>
    </tr>
    <tr style="height:26px" valign="top">
      <td style="text-indent: 0px; vertical-align: middle;text-align: left;" colspan="13">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #000000; font-size: 12px; line-height: 1.1640625; font-weight: bold;">Prov: GORONTALO</span>
      </td>
    </tr>
    @if ($filters['kabkota_id'])
      <tr style="height:26px" valign="top">
        <td style="text-indent: 0px; vertical-align: middle;text-align: left;" colspan="13">
          <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #000000; font-size: 12px; line-height: 1.1640625; font-weight: bold;">Kab: {{ $kabkota->parsedNama }}</span>
        </td>
      </tr>
      @if ($filters['kecamatan_id'])
        <tr style="height:26px" valign="top">
          <td style="text-indent: 0px; vertical-align: middle;text-align: left;" colspan="13">
            <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #000000; font-size: 12px; line-height: 1.1640625; font-weight: bold;">Kec: {{ $kecamatan->parsedNama }}</span>
          </td>
        </tr>
      @endif
    @endif
    <tr style="height:30px" valign="top">
      <td style="background-color: #085480; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle;text-align: center;" rowspan="3">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFCFC; font-size: 8px; line-height: 1.1640625; font-weight: bold;">KODE</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle;text-align: center;" rowspan="3">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFCFC; font-size: 8px; line-height: 1.1640625; font-weight: bold;">{{ $filters['kabkota_id'] ? ($filters['kecamatan_id'] ? 'DESA' : 'KECAMATAN') : 'KABUPATEN' }}</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle;text-align: center;" rowspan="3">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFCFC; font-size: 8px; line-height: 1.1640625; font-weight: bold;">JUMLAH PIK REMAJA</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle;text-align: center;" colspan="2">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFCFC; font-size: 8px; line-height: 1.1640625; font-weight: bold;">KEPEMILIKAN SK PENGUKUHAN</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle;text-align: center;" colspan="5">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFCFC; font-size: 8px; line-height: 1.1640625; font-weight: bold;">BASIS</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle;text-align: center;" colspan="2">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFCFC; font-size: 8px; line-height: 1.1640625; font-weight: bold;">KETERPADUAN KELOMPOK</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle;text-align: center;" rowspan="3">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFCFC; font-size: 8px; line-height: 1.1640625; font-weight: bold;">JUMLAH PIK REMAJA PRO PN</span>
      </td>
    </tr>
    <tr style="height:30px" valign="top">
      <td style="background-color: #085480; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle;text-align: center;" rowspan="2">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFCFC; font-size: 8px; line-height: 1.1640625; font-weight: bold;">ADA</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle;text-align: center;" rowspan="2">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFCFC; font-size: 8px; line-height: 1.1640625; font-weight: bold;">TIDAK</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle;text-align: center;" colspan="3">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFCFC; font-size: 8px; line-height: 1.1640625; font-weight: bold;">JALUR PENDIDIKAN</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle;text-align: center;" colspan="2">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFCFC; font-size: 8px; line-height: 1.1640625; font-weight: bold;">JALUR MASYARAKAT</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle;text-align: center;" rowspan="2">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFCFC; font-size: 8px; line-height: 1.1640625; font-weight: bold;">YA</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle;text-align: center;" rowspan="2">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFCFC; font-size: 8px; line-height: 1.1640625; font-weight: bold;">TIDAK</span>
      </td>
    </tr>
    <tr style="height:50px" valign="top">
      <td style="background-color: #085480; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle;text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFCFC; font-size: 8px; line-height: 1.1640625; font-weight: bold;">SMP/ SETARA</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle;text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFCFC; font-size: 8px; line-height: 1.1640625; font-weight: bold;">SMA/ SETARA</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle;text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFCFC; font-size: 8px; line-height: 1.1640625; font-weight: bold;">PERGURUAN TINGGI</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle;text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFCFC; font-size: 8px; line-height: 1.1640625; font-weight: bold;">ORGANISASI KEAGAMAAN</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle;text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFCFC; font-size: 8px; line-height: 1.1640625; font-weight: bold;">LSM/ ORGANISASI KEPEMUDAAN/ ORGANISASI KEMASYARAKATAN</span>
      </td>
    </tr>
    <tr style="height:17px" valign="top">
      <td style="background-color: #0099FF; border: 1px solid #FFFCFC; text-indent: 0px; vertical-align: middle;text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFCFC; font-size: 8px; line-height: 1.1640625;">1</span>
      </td>
      <td style="background-color: #0099FF; border: 1px solid #FFFCFC; text-indent: 0px; vertical-align: middle;text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFCFC; font-size: 8px; line-height: 1.1640625;">2</span>
      </td>
      <td style="background-color: #0099FF; border: 1px solid #FFFCFC; text-indent: 0px; vertical-align: middle;text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFCFC; font-size: 8px; line-height: 1.1640625;">3</span>
      </td>
      <td style="background-color: #0099FF; border: 1px solid #FFFCFC; text-indent: 0px; vertical-align: middle;text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFCFC; font-size: 8px; line-height: 1.1640625;">4</span>
      </td>
      <td style="background-color: #0099FF; border: 1px solid #FFFCFC; text-indent: 0px; vertical-align: middle;text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFCFC; font-size: 8px; line-height: 1.1640625;">5</span>
      </td>
      <td style="background-color: #0099FF; border: 1px solid #FFFCFC; text-indent: 0px; vertical-align: middle;text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFCFC; font-size: 8px; line-height: 1.1640625;">6</span>
      </td>
      <td style="background-color: #0099FF; border: 1px solid #FFFCFC; text-indent: 0px; vertical-align: middle;text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFCFC; font-size: 8px; line-height: 1.1640625;">7</span>
      </td>
      <td style="background-color: #0099FF; border: 1px solid #FFFCFC; text-indent: 0px; vertical-align: middle;text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFCFC; font-size: 8px; line-height: 1.1640625;">8</span>
      </td>
      <td style="background-color: #0099FF; border: 1px solid #FFFCFC; text-indent: 0px; vertical-align: middle;text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFCFC; font-size: 8px; line-height: 1.1640625;">9</span>
      </td>
      <td style="background-color: #0099FF; border: 1px solid #FFFCFC; text-indent: 0px; vertical-align: middle;text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFCFC; font-size: 8px; line-height: 1.1640625;">10</span>
      </td>
      <td style="background-color: #0099FF; border: 1px solid #FFFCFC; text-indent: 0px; vertical-align: middle;text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFCFC; font-size: 8px; line-height: 1.1640625;">11</span>
      </td>
      <td style="background-color: #0099FF; border: 1px solid #FFFCFC; text-indent: 0px; vertical-align: middle;text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFCFC; font-size: 8px; line-height: 1.1640625;">12</span>
      </td>
      <td style="background-color: #0099FF; border: 1px solid #FFFCFC; text-indent: 0px; vertical-align: middle;text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFCFC; font-size: 8px; line-height: 1.1640625;">13</span>
      </td>
    </tr>
  </thead>

  <tbody>
    @php
      $total = [
          'pikrs' => 0,
          'hasSK' => 0,
          'isSMP' => 0,
          'isSMA' => 0,
          'isPerguruanTinggi' => 0,
          'isOrganisasiKeagamaan' => 0,
          'isOrmas' => 0,
          'hasKeterpaduanKelompok' => 0,
          'hasPropn' => 0,
      ];
    @endphp
    @forelse ($areas as $area)
      @php
        // pikr yang diambil hanya pikr yang dicreate setelah tahun $filters['tahun']
        $pikrs = $area->pikrs->filter(fn($pikr) => $pikr->created_at->lte(Carbon\Carbon::createFromFormat('Y', $filters['tahun'])));
        $hasSK = $pikrs->filter(fn($pikr) => !!$pikr->sk);
        $isSMP = $pikrs->filter(fn($pikr) => $pikr->basis === 'Jalur Pendidikan - SMP/Sederajat');
        $isSMA = $pikrs->filter(fn($pikr) => $pikr->basis === 'Jalur Pendidikan - SMA/Sederajat');
        $isPerguruanTinggi = $pikrs->filter(fn($pikr) => $pikr->basis === 'Jalur Pendidikan - Perguruan Tinggi');
        $isOrganisasiKeagamaan = $pikrs->filter(fn($pikr) => $pikr->basis === 'Jalur Masyarakat - Organisasi Keagamaan');
        $isOrmas = $pikrs->filter(fn($pikr) => $pikr->basis === 'Jalur Masyarakat - LSM/Organisasi Kepemudaan/Organisasi Kemasyarakatan');
        $hasKeterpaduanKelompok = $pikrs->filter(fn($pikr) => !!$pikr->keterpaduan_kelompok);
        $hasPropn = $pikrs->filter(fn($pikr) => $pikr->pro_pn);
        
        $total['pikrs'] += $pikrs->count();
        $total['hasSK'] += $hasSK->count();
        $total['isSMP'] += $isSMP->count();
        $total['isSMA'] += $isSMA->count();
        $total['isPerguruanTinggi'] += $isPerguruanTinggi->count();
        $total['isOrganisasiKeagamaan'] += $isOrganisasiKeagamaan->count();
        $total['isOrmas'] += $isOrmas->count();
        $total['hasKeterpaduanKelompok'] += $hasKeterpaduanKelompok->count();
        $total['hasPropn'] += $hasPropn->count();
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
          <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #000000; font-size: 10px; line-height: 1.1640625;">{{ $hasSK->count() }}</span>
        </td>
        <td style="border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle;text-align: center;">
          <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #000000; font-size: 10px; line-height: 1.1640625;">{{ $pikrs->count() - $hasSK->count() }}</span>
        </td>
        <td style="border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle;text-align: center;">
          <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #000000; font-size: 10px; line-height: 1.1640625;">{{ $isSMP->count() }}</span>
        </td>
        <td style="border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle;text-align: center;">
          <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #000000; font-size: 10px; line-height: 1.1640625;">{{ $isSMA->count() }}</span>
        </td>
        <td style="border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle;text-align: center;">
          <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #000000; font-size: 10px; line-height: 1.1640625;">{{ $isPerguruanTinggi->count() }}</span>
        </td>
        <td style="border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle;text-align: center;">
          <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #000000; font-size: 10px; line-height: 1.1640625;">{{ $isOrganisasiKeagamaan->count() }}</span>
        </td>
        <td style="border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle;text-align: center;">
          <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #000000; font-size: 10px; line-height: 1.1640625;">{{ $isOrmas->count() }}</span>
        </td>
        <td style="border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle;text-align: center;">
          <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #000000; font-size: 10px; line-height: 1.1640625;">{{ $hasKeterpaduanKelompok->count() }}</span>
        </td>
        <td style="border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle;text-align: center;">
          <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #000000; font-size: 10px; line-height: 1.1640625;">{{ $pikrs->count() - $hasKeterpaduanKelompok->count() }}</span>
        </td>
        <td style="border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle;text-align: center;">
          <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #000000; font-size: 10px; line-height: 1.1640625;">{{ $hasPropn->count() }}</span>
        </td>
      </tr>
    @empty
      <tr style="height:30px" valign="top">
        <td style="border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle;text-align: center;" colspan="13">
          <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #000000; font-size: 10px; line-height: 1.1640625;">Tidak ada data</span>
        </td>
      </tr>
    @endforelse
  </tbody>

  <tfoot>
    <tr style="height:30px" valign="top">
      <td style="background-color: #085480; border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle;text-align: center;" colspan="2">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 12px; line-height: 1.1640625; font-weight: bold;">Jumlah Total</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle;text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 10px; line-height: 1.1640625;">{{ $total['pikrs'] }}</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle;text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 10px; line-height: 1.1640625;">{{ $total['hasSK'] }}</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle;text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 10px; line-height: 1.1640625;">{{ $total['pikrs'] - $total['hasSK'] }}</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle;text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 10px; line-height: 1.1640625;">{{ $total['isSMP'] }}</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle;text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 10px; line-height: 1.1640625;">{{ $total['isSMA'] }}</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle;text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 10px; line-height: 1.1640625;">{{ $total['isPerguruanTinggi'] }}</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle;text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 10px; line-height: 1.1640625;">{{ $total['isOrganisasiKeagamaan'] }}</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle;text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 10px; line-height: 1.1640625;">{{ $total['isOrmas'] }}</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle;text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 10px; line-height: 1.1640625;">{{ $total['hasKeterpaduanKelompok'] }}</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle;text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 10px; line-height: 1.1640625;">{{ $total['pikrs'] - $total['hasKeterpaduanKelompok'] }}</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle;text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 10px; line-height: 1.1640625;">{{ $total['hasPropn'] }}</span>
      </td>
    </tr>
  </tfoot>
</table>
