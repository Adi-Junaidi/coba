<table style="empty-cells: show; min-width: 100%; border-collapse: collapse; background-color: white;" cellpadding="0" cellspacing="0" border="0">
  <thead>
    <tr style="height:46px" valign="top">
      <td style="text-indent: 0px; vertical-align: middle; text-align: center;" colspan="14">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #000000; font-size: 16px; line-height: 1.1640625; font-weight: bold;">JUMLAH REMAJA HADIR KONSELING PADA PUSAT INFORMASI DAN KONSELING REMAJA DAN MAHASISWA (PIK REMAJA)</span>
      </td>
    </tr>
    <tr style="height:26px" valign="top">
      <td style="text-indent: 0px; vertical-align: middle; text-align: center;" colspan="14">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #000000; font-size: 16px; line-height: 1.1640625; font-weight: bold;">BULAN: {{ strtoupper($filters['bulan']['nama']) }} - {{ $filters['tahun'] }}</span>
      </td>
    </tr>
    <tr style="height:26px" valign="top">
      <td style="text-indent: 0px; vertical-align: middle; text-align: left;" colspan="14">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #000000; font-size: 12px; line-height: 1.1640625; font-weight: bold;">Prov: GORONTALO</span>
      </td>
    </tr>
    @if ($filters['kabkota_id'])
      <tr style="height:26px" valign="top">
        <td style="text-indent: 0px; vertical-align: middle; text-align: left;" colspan="14">
          <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #000000; font-size: 12px; line-height: 1.1640625; font-weight: bold;">Kab: {{ $kabkota->parsedNama }}</span>
        </td>
      </tr>
      @if ($filters['kecamatan_id'])
        <tr style="height:26px" valign="top">
          <td style="text-indent: 0px; vertical-align: middle; text-align: left;" colspan="14">
            <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #000000; font-size: 12px; line-height: 1.1640625; font-weight: bold;">Kec: {{ $kecamatan->parsedNama }}</span>
          </td>
        </tr>
      @endif
    @endif
    <tr style="height:31px" valign="top">
      <td style="background-color: #085480; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle; text-align: center;" rowspan="3">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 8px; line-height: 1.1640625; font-weight: bold;">KODE</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle; text-align: center;" rowspan="3">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 8px; line-height: 1.1640625; font-weight: bold;">{{ $filters['kabkota_id'] ? ($filters['kecamatan_id'] ? 'DESA' : 'KECAMATAN') : 'KABUPATEN' }}</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle; text-align: center;" colspan="6">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 8px; line-height: 1.1640625; font-weight: bold;">JUMLAH REMAJA YANG MENDAPAT KONSELING INDIVIDU</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle; text-align: center;" colspan="6">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 8px; line-height: 1.1640625; font-weight: bold;">JUMLAH REMAJA YANG MENDAPAT KONSELING KELOMPOK</span>
      </td>
    </tr>
    <tr style="height:29px" valign="top">
      <td style="background-color: #085480; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle; text-align: center;" colspan="2">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 8px; line-height: 1.1640625; font-weight: bold;">JENIS KELAMIN</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle; text-align: center;" colspan="3">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 8px; line-height: 1.1640625; font-weight: bold;">KATEGORI UMUR</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle; text-align: center;" rowspan="2">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 8px; line-height: 1.1640625; font-weight: bold;">TOTAL</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle; text-align: center;" colspan="2">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 8px; line-height: 1.1640625; font-weight: bold;">JENIS KELAMIN</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle; text-align: center;" colspan="3">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 8px; line-height: 1.1640625; font-weight: bold;">KATEGORI UMUR</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle; text-align: center;" rowspan="2">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 8px; line-height: 1.1640625; font-weight: bold;">TOTAL</span>
      </td>
    </tr>
    <tr style="height:31px" valign="top">
      <td style="background-color: #085480; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle; text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 8px; line-height: 1.1640625; font-weight: bold;">LAKI-LAKI</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle; text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 8px; line-height: 1.1640625; font-weight: bold;">PEREMPUAN</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle; text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 8px; line-height: 1.1640625; font-weight: bold;">10 - 14</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle; text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 8px; line-height: 1.1640625; font-weight: bold;">15 - 19</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle; text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 8px; line-height: 1.1640625; font-weight: bold;">20 - 24</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle; text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 8px; line-height: 1.1640625; font-weight: bold;">LAKI-LAKI</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle; text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 8px; line-height: 1.1640625; font-weight: bold;">PEREMPUAN</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle; text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 8px; line-height: 1.1640625; font-weight: bold;">10 - 14</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle; text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 8px; line-height: 1.1640625; font-weight: bold;">15 - 19</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle; text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 8px; line-height: 1.1640625; font-weight: bold;">20 - 24</span>
      </td>
    </tr>
    <tr style="height:21px" valign="top">
      <td style="background-color: #0099FF; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle; text-align: center;">
        <span style="color: #FFFFFF; font-size: 8px; line-height: 1.1640625;">1</span>
      </td>
      <td style="background-color: #0099FF; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle; text-align: center;">
        <span style="color: #FFFFFF; font-size: 8px; line-height: 1.1640625;">2</span>
      </td>
      <td style="background-color: #0099FF; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle; text-align: center;">
        <span style="color: #FFFFFF; font-size: 8px; line-height: 1.1640625;">3</span>
      </td>
      <td style="background-color: #0099FF; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle; text-align: center;">
        <span style="color: #FFFFFF; font-size: 8px; line-height: 1.1640625;">4</span>
      </td>
      <td style="background-color: #0099FF; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle; text-align: center;">
        <span style="color: #FFFFFF; font-size: 8px; line-height: 1.1640625;">5</span>
      </td>
      <td style="background-color: #0099FF; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle; text-align: center;">
        <span style="color: #FFFFFF; font-size: 8px; line-height: 1.1640625;">6</span>
      </td>
      <td style="background-color: #0099FF; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle; text-align: center;">
        <span style="color: #FFFFFF; font-size: 8px; line-height: 1.1640625;">7</span>
      </td>
      <td style="background-color: #0099FF; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle; text-align: center;">
        <span style="color: #FFFFFF; font-size: 8px; line-height: 1.1640625;">8</span>
      </td>
      <td style="background-color: #0099FF; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle; text-align: center;">
        <span style="color: #FFFFFF; font-size: 8px; line-height: 1.1640625;">9</span>
      </td>
      <td style="background-color: #0099FF; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle; text-align: center;">
        <span style="color: #FFFFFF; font-size: 8px; line-height: 1.1640625;">10</span>
      </td>
      <td style="background-color: #0099FF; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle; text-align: center;">
        <span style="color: #FFFFFF; font-size: 8px; line-height: 1.1640625;">11</span>
      </td>
      <td style="background-color: #0099FF; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle; text-align: center;">
        <span style="color: #FFFFFF; font-size: 8px; line-height: 1.1640625;">12</span>
      </td>
      <td style="background-color: #0099FF; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle; text-align: center;">
        <span style="color: #FFFFFF; font-size: 8px; line-height: 1.1640625;">13</span>
      </td>
      <td style="background-color: #0099FF; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle; text-align: center;">
        <span style="color: #FFFFFF; font-size: 8px; line-height: 1.1640625;">14</span>
      </td>
    </tr>
  </thead>

  <tbody>
    @php
      $total = [
          'konselingIndividu' => [
              'cowok' => 0,
              'cewek' => 0,
              'remaja-awal' => 0,
              'remaja-tengah' => 0,
              'remaja-akhir' => 0,
              'total' => 0,
          ],
          'konselingKelompok' => [
              'cowok' => 0,
              'cewek' => 0,
              'remaja-awal' => 0,
              'remaja-tengah' => 0,
              'remaja-akhir' => 0,
              'total' => 0,
          ],
      ];
    @endphp
    @forelse ($areas as $area)
      @php
        $laporans = $area->pikrs->flatMap(fn($pikr) => $pikr->verified_laporans)->filter(fn($laporan) => $laporan->bulan_lapor === $filters['bulan']['kode'] && $laporan->tahun_lapor === $filters['tahun']);
        $konselingIndividus = $laporans->flatMap(fn($laporan) => $laporan->konseling);
        $konselingKelompoks = $laporans->flatMap(fn($laporan) => $laporan->konselingKelompok);
        
        // Konseling Individu
        $konselingIndividuCowok = $konselingIndividus->reduce(fn($total, $konselingIndividu) => $total + $konselingIndividu->jumlah_cowok) ?? 0;
        $konselingIndividuCewek = $konselingIndividus->reduce(fn($total, $konselingIndividu) => $total + $konselingIndividu->jumlah_cewek) ?? 0;
        $konselingIndividuRemajaAwal = $konselingIndividus->reduce(fn($total, $konselingIndividu) => $total + $konselingIndividu->jumlah_rawal) ?? 0;
        $konselingIndividuRemajaTengah = $konselingIndividus->reduce(fn($total, $konselingIndividu) => $total + $konselingIndividu->jumlah_rtengah) ?? 0;
        $konselingIndividuRemajaAkhir = $konselingIndividus->reduce(fn($total, $konselingIndividu) => $total + $konselingIndividu->jumlah_rakhir) ?? 0;
        $konselingIndividuTotal = $konselingIndividuCowok + $konselingIndividuCewek;
        
        // Konseling Kelompok
        $konselingKelompokCowok = $konselingKelompoks->reduce(fn($total, $konselingKelompok) => $total + $konselingKelompok->jumlah_cowok) ?? 0;
        $konselingKelompokCewek = $konselingKelompoks->reduce(fn($total, $konselingKelompok) => $total + $konselingKelompok->jumlah_cewek) ?? 0;
        $konselingKelompokRemajaAwal = $konselingKelompoks->reduce(fn($total, $konselingKelompok) => $total + $konselingKelompok->jumlah_rawal) ?? 0;
        $konselingKelompokRemajaTengah = $konselingKelompoks->reduce(fn($total, $konselingKelompok) => $total + $konselingKelompok->jumlah_rtengah) ?? 0;
        $konselingKelompokRemajaAkhir = $konselingKelompoks->reduce(fn($total, $konselingKelompok) => $total + $konselingKelompok->jumlah_rakhir) ?? 0;
        $konselingKelompokTotal = $konselingKelompokCowok + $konselingKelompokCewek;
        
        $total['konselingIndividu']['cowok'] += $konselingIndividuCowok;
        $total['konselingIndividu']['cewek'] += $konselingIndividuCewek;
        $total['konselingIndividu']['remaja-awal'] += $konselingIndividuRemajaAwal;
        $total['konselingIndividu']['remaja-tengah'] += $konselingIndividuRemajaTengah;
        $total['konselingIndividu']['remaja-akhir'] += $konselingIndividuRemajaAkhir;
        $total['konselingIndividu']['total'] += $konselingIndividuTotal;
        $total['konselingKelompok']['cowok'] += $konselingKelompokCowok;
        $total['konselingKelompok']['cewek'] += $konselingKelompokCewek;
        $total['konselingKelompok']['remaja-awal'] += $konselingKelompokRemajaAwal;
        $total['konselingKelompok']['remaja-tengah'] += $konselingKelompokRemajaTengah;
        $total['konselingKelompok']['remaja-akhir'] += $konselingKelompokRemajaAkhir;
        $total['konselingKelompok']['total'] += $konselingKelompokTotal;
      @endphp
      <tr style="height:30px" valign="top">
        <td style="border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle; text-align: center;">
          <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #000000; font-size: 10px; line-height: 1.1640625;">{{ $area->kode }}</span>
        </td>
        <td style="border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle; text-align: left;">
          <div style="padding-left:5px;"><span style="white-space: nowrap; font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #000000; font-size: 10px; line-height: 1; *line-height: normal;">{{ $area->parsedNama }}</span></div>
        </td>
        <td style="border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle; text-align: center;">
          <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #000000; font-size: 10px; line-height: 1.1640625;">{{ $konselingIndividuCowok }}</span>
        </td>
        <td style="border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle; text-align: center;">
          <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #000000; font-size: 10px; line-height: 1.1640625;">{{ $konselingIndividuCewek }}</span>
        </td>
        <td style="border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle; text-align: center;">
          <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #000000; font-size: 10px; line-height: 1.1640625;">{{ $konselingIndividuRemajaAwal }}</span>
        </td>
        <td style="border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle; text-align: center;">
          <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #000000; font-size: 10px; line-height: 1.1640625;">{{ $konselingIndividuRemajaTengah }}</span>
        </td>
        <td style="border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle; text-align: center;">
          <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #000000; font-size: 10px; line-height: 1.1640625;">{{ $konselingIndividuRemajaAkhir }}</span>
        </td>
        <td style="border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle; text-align: center;">
          <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #000000; font-size: 10px; line-height: 1.1640625;">{{ $konselingIndividuTotal }}</span>
        </td>
        <td style="border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle; text-align: center;">
          <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #000000; font-size: 10px; line-height: 1.1640625;">{{ $konselingKelompokCowok }}</span>
        </td>
        <td style="border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle; text-align: center;">
          <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #000000; font-size: 10px; line-height: 1.1640625;">{{ $konselingKelompokCewek }}</span>
        </td>
        <td style="border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle; text-align: center;">
          <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #000000; font-size: 10px; line-height: 1.1640625;">{{ $konselingKelompokRemajaAwal }}</span>
        </td>
        <td style="border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle; text-align: center;">
          <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #000000; font-size: 10px; line-height: 1.1640625;">{{ $konselingKelompokRemajaTengah }}</span>
        </td>
        <td style="border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle; text-align: center;">
          <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #000000; font-size: 10px; line-height: 1.1640625;">{{ $konselingKelompokRemajaAkhir }}</span>
        </td>
        <td style="border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle; text-align: center;">
          <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #000000; font-size: 10px; line-height: 1.1640625;">{{ $konselingKelompokTotal }}</span>
        </td>
      </tr>
    @empty
      <tr style="height:30px" valign="top">
        <td style="border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle; text-align: center;" colspan="14">
          <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #000000; font-size: 10px; line-height: 1.1640625;">Tidak ada data</span>
        </td>
      </tr>
    @endforelse
  </tbody>

  <tfoot>
    <tr style="height:30px" valign="top">
      <td style="background-color: #085480; border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle; text-align: center;" colspan="2">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 12px; line-height: 1.1640625; font-weight: bold;">JUMLAH TOTAL</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle; text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 10px; line-height: 1.1640625;">{{ $total['konselingIndividu']['cowok'] }}</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle; text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 10px; line-height: 1.1640625;">{{ $total['konselingIndividu']['cewek'] }}</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle; text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 10px; line-height: 1.1640625;">{{ $total['konselingIndividu']['remaja-awal'] }}</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle; text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 10px; line-height: 1.1640625;">{{ $total['konselingIndividu']['remaja-tengah'] }}</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle; text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 10px; line-height: 1.1640625;">{{ $total['konselingIndividu']['remaja-akhir'] }}</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle; text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 10px; line-height: 1.1640625;">{{ $total['konselingIndividu']['total'] }}</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle; text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 10px; line-height: 1.1640625;">{{ $total['konselingKelompok']['cowok'] }}</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle; text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 10px; line-height: 1.1640625;">{{ $total['konselingKelompok']['cewek'] }}</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle; text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 10px; line-height: 1.1640625;">{{ $total['konselingKelompok']['remaja-awal'] }}</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle; text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 10px; line-height: 1.1640625;">{{ $total['konselingKelompok']['remaja-tengah'] }}</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle; text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 10px; line-height: 1.1640625;">{{ $total['konselingKelompok']['remaja-akhir'] }}</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle; text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 10px; line-height: 1.1640625;">{{ $total['konselingKelompok']['total'] }}</span>
      </td>
    </tr>
  </tfoot>
</table>
