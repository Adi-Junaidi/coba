<table style="empty-cells: show; min-width: 100%; border-collapse: collapse; background-color: white;" cellpadding="0" cellspacing="0" border="0">
  <thead>
    <tr style="height:46px" valign="top">
      <td style="text-indent: 0px; vertical-align: middle; text-align: center;" colspan="10">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #000000; font-size: 16px; line-height: 1.1640625; font-weight: bold;">JUMLAH PUSAT INFORMASI DAN KONSELING REMAJA DAN MAHASISWA (PIK REMAJA) YANG MELAKUKAN PERTEMUAN DAN REMAJA HADIR PERTEMUAN</span>
      </td>
    </tr>
    <tr style="height:26px" valign="top">
      <td style="text-indent: 0px; vertical-align: middle; text-align: center;" colspan="10">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #000000; font-size: 16px; line-height: 1.1640625; font-weight: bold;">BULAN: {{ strtoupper($filters['bulan']['nama']) }} - {{ $filters['tahun'] }}</span>
      </td>
    </tr>
    <tr style="height:26px" valign="top">
      <td style="text-indent: 0px; vertical-align: middle; text-align: left;" colspan="10">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #000000; font-size: 12px; line-height: 1.1640625; font-weight: bold;">Prov: GORONTALO</span>
      </td>
    </tr>
    @if ($filters['kabkota_id'])
      <tr style="height:26px" valign="top">
        <td style="text-indent: 0px; vertical-align: middle; text-align: left;" colspan="10">
          <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #000000; font-size: 12px; line-height: 1.1640625; font-weight: bold;">Kab: {{ $kabkota->parsedNama }}</span>
        </td>
      </tr>
    @endif
    <tr style="height:30px" valign="top">
      <td style="background-color: #085480; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle; text-align: center;" rowspan="2">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 8px; line-height: 1.1640625; font-weight: bold;">KODE</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle; text-align: center;" rowspan="2">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFCFC; font-size: 8px; line-height: 1.1640625; font-weight: bold;">KABUPATEN</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle; text-align: center;" colspan="3">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 8px; line-height: 1.1640625; font-weight: bold;">PIK REMAJA</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle; text-align: center;" colspan="2">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 8px; line-height: 1.1640625; font-weight: bold;">JUMLAH PIK REMAJA YANG MENYAJIKAN MATERI</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle; text-align: center;" rowspan="2">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 8px; line-height: 1.1640625; font-weight: bold;">JUMLAH PERTEMUAN</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle; text-align: center;" rowspan="2">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 8px; line-height: 1.1640625; font-weight: bold;">JUMLAH REMAJA HADIR DALAM PERTEMUAN</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle; text-align: center;" rowspan="2">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 8px; line-height: 1.1640625; font-weight: bold;">JUMLAH PERTEMUAN MATERI PKBR OLEH PIK REMAJA</span>
      </td>
    </tr>
    <tr style="height:80px" valign="top">
      <td style="background-color: #085480; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle; text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 8px; line-height: 1.1640625; font-weight: bold;">YANG ADA</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle; text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 8px; line-height: 1.1640625; font-weight: bold;">YANG LAPOR</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle; text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 8px; line-height: 1.1640625; font-weight: bold;">%</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle; text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 8px; line-height: 1.1640625; font-weight: bold;">PKBR</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle; text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 8px; line-height: 1.1640625; font-weight: bold;">LAINNYA</span>
      </td>
    </tr>
    <tr style="height:17px" valign="top">
      <td style="background-color: #0099FF; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle; text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 10px; line-height: 1.1640625;">1</span>
      </td>
      <td style="background-color: #0099FF; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle; text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 10px; line-height: 1.1640625;">2</span>
      </td>
      <td style="background-color: #0099FF; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle; text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 10px; line-height: 1.1640625;">3</span>
      </td>
      <td style="background-color: #0099FF; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle; text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 10px; line-height: 1.1640625;">4</span>
      </td>
      <td style="background-color: #0099FF; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle; text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 10px; line-height: 1.1640625;">5=4/3*100</span>
      </td>
      <td style="background-color: #0099FF; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle; text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 10px; line-height: 1.1640625;">6</span>
      </td>
      <td style="background-color: #0099FF; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle; text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 10px; line-height: 1.1640625;">7</span>
      </td>
      <td style="background-color: #0099FF; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle; text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 10px; line-height: 1.1640625;">8</span>
      </td>
      <td style="background-color: #0099FF; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle; text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 10px; line-height: 1.1640625;">9</span>
      </td>
      <td style="background-color: #0099FF; border: 1px solid #FFFFFF; text-indent: 0px; vertical-align: middle; text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 10px; line-height: 1.1640625;">10</span>
      </td>
    </tr>
  </thead>

  <tbody>
    @php
      $total = [
          'pikrs' => 0,
          'reported' => 0,
          'percentage' => 0,
          'servedPKBR' => 0,
          'servedLainnya' => 0,
          'jumlahPertemuan' => 0,
          'jumlahRemaja' => 0,
          'jumlahPertemuanPKBR' => 0,
      ];
    @endphp
    @forelse ($areas as $area)
      @php
        $pikrs = $area->pikrs;
        // pikr yang melapor pasti memiliki setidaknya satu laporan yang verified di bulan yang dipilih
        $reported = $pikrs->filter(fn($pikr) => $pikr->verified_laporans->filter(fn($laporan) => $laporan->bulan_lapor === $filters['bulan']['kode'])->count() > 0);
        
        $percentage = 0;
        // avoid division by zero
        if ($pikrs->count() > 0) {
            $percentage = ($reported->count() / $pikrs->count()) * 100;
        }
        
        // pikr yang menyajikan materi PKBR dan materi Lainnya
        // it's painful I know, but at least it works I'm okay for now
        $servedPKBR = $pikrs->filter(fn($pikr) => $pikr->verified_laporans->filter(fn($laporan) => $laporan->bulan_lapor === $filters['bulan']['kode'])->contains(fn($laporan) => $laporan->pelayananInformasi->contains(fn($pelayananInformasi) => !!$pelayananInformasi->materi) || $laporan->konseling->contains(fn($konseling) => !!$konseling->materi) || $laporan->konselingKelompok->contains(fn($konselingKelompok) => !!$konselingKelompok->materi)));
        $servedLainnya = $pikrs->filter(fn($pikr) => $pikr->verified_laporans->filter(fn($laporan) => $laporan->bulan_lapor === $filters['bulan']['kode'])->contains(fn($laporan) => $laporan->pelayananInformasi->contains(fn($pelayananInformasi) => !!$pelayananInformasi->materi_lainnya) || $laporan->konseling->contains(fn($konseling) => !!$konseling->materi_lainnya) || $laporan->konselingKelompok->contains(fn($konselingKelompok) => !!$konselingKelompok->materi_lainnya)));
        
        $laporans = $pikrs->flatMap(fn($pikrs) => $pikrs->verified_laporans)->filter(fn($laporan) => $laporan->bulan_lapor === $filters['bulan']['kode']);
        $jumlahPertemuan = $laporans->reduce(fn($total, $laporan) => $total + $laporan->pelayananInformasi->count() + $laporan->konseling->count() + $laporan->konselingKelompok->count()) ?? 0;
        $jumlahRemaja = $laporans->reduce(fn($total, $laporan) => $total + $laporan->pelayananInformasi->reduce(fn($total, $pelayananInformasi) => $total + $pelayananInformasi->jumlah_peserta) + $laporan->konseling->reduce(fn($total, $konseling) => $total + $konseling->jumlah_cowok + $konseling->jumlah_cewek) + $laporan->konselingKelompok->reduce(fn($total, $konselingKelompok) => $total + $konselingKelompok->jumlah_cowok + $konselingKelompok->jumlah_cewek)) ?? 0;
        $jumlahPertemuanPKBR = $laporans->reduce(fn($total, $laporan) => $total + $laporan->pelayananInformasi->filter(fn($pelayananInformasi) => !!$pelayananInformasi->materi)->count() + $laporan->konseling->filter(fn($konseling) => !!$konseling->materi)->count() + $laporan->konselingKelompok->filter(fn($konselingKelompok) => !!$konselingKelompok->materi)->count()) ?? 0;
        
        $total['pikrs'] += $pikrs->count();
        $total['reported'] += $reported->count();
        $total['percentage'] += $percentage;
        $total['servedPKBR'] += $servedPKBR->count();
        $total['servedLainnya'] += $servedLainnya->count();
        $total['jumlahPertemuan'] += $jumlahPertemuan;
        $total['jumlahRemaja'] += $jumlahRemaja;
        $total['jumlahPertemuanPKBR'] += $jumlahPertemuanPKBR;
      @endphp
      <tr style="height:30px" valign="top">
        <td style="border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle; text-align: center;">
          <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #000000; font-size: 10px; line-height: 1.1640625;">{{ $area->kode }}</span>
        </td>
        <td style="border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle; text-align: left;">
          <div style="padding-left:5px;"><span style="white-space: nowrap; font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #000000; font-size: 10px; line-height: 1; *line-height: normal;">{{ $area->parsedNama }}</span></div>
        </td>
        <td style="border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle; text-align: center;">
          <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #000000; font-size: 10px; line-height: 1.1640625;">{{ $pikrs->count() }}</span>
        </td>
        <td style="border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle; text-align: center;">
          <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #000000; font-size: 10px; line-height: 1.1640625;">{{ $reported->count() }}</span>
        </td>
        <td style="border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle; text-align: center;">
          <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #000000; font-size: 10px; line-height: 1.1640625;">{{ number_format($percentage, 2, '.', '') }}</span>
        </td>
        <td style="border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle; text-align: center;">
          <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #000000; font-size: 10px; line-height: 1.1640625;">{{ $servedPKBR->count() }}</span>
        </td>
        <td style="border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle; text-align: center;">
          <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #000000; font-size: 10px; line-height: 1.1640625;">{{ $servedLainnya->count() }}</span>
        </td>
        <td style="border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle; text-align: center;">
          <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #000000; font-size: 10px; line-height: 1.1640625;">{{ $jumlahPertemuan }}</span>
        </td>
        <td style="border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle; text-align: center;">
          <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #000000; font-size: 10px; line-height: 1.1640625;">{{ $jumlahRemaja }}</span>
        </td>
        <td style="border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle; text-align: center;">
          <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #000000; font-size: 10px; line-height: 1.1640625;">{{ $jumlahPertemuanPKBR }}</span>
        </td>
      </tr>
    @empty
      <tr style="height:30px" valign="top">
        <td style="border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle; text-align: center;" colspan="10">
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
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 10px; line-height: 1.1640625;">{{ $total['pikrs'] }}</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle; text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 10px; line-height: 1.1640625;">{{ $total['reported'] }}</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle; text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 10px; line-height: 1.1640625;">{{ number_format($total['percentage'], 2, '.', '') }}</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle; text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 10px; line-height: 1.1640625;">{{ $total['servedPKBR'] }}</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle; text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 10px; line-height: 1.1640625;">{{ $total['servedLainnya'] }}</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle; text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 10px; line-height: 1.1640625;">{{ $total['jumlahPertemuan'] }}</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle; text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 10px; line-height: 1.1640625;">{{ $total['jumlahRemaja'] }}</span>
      </td>
      <td style="background-color: #085480; border: 1px solid #0AF0FC; text-indent: 0px; vertical-align: middle; text-align: center;">
        <span style="font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 10px; line-height: 1.1640625;">{{ $total['jumlahPertemuanPKBR'] }}</span>
      </td>
    </tr>
  </tfoot>
</table>
