@push('style')
  <style>
    table {
      text-align: center;
      vertical-align: middle;
      line-height: 1.1640625;
      font-family: Arial, Helvetica, sans-serif;
    }

    table :where(td, th) {
      padding: .2em .6em;
    }

    thead th {
      background-color: #085480;
      color: #fff;
      border: 1px solid #fff !important;
    }

    thead th span {
      font-size: .6em;
      text-transform: uppercase;
    }

    .table-heading {
      font-size: 16px;
      font-weight: bold;
    }

    tbody {
      background-color: #fff;
      color: #000;
      font-size: 10px;
      text-transform: uppercase;
    }

    tbody td {
      border: 1px solid #0AF0FC !important;
      padding: .5em 1em;
    }

    tfoot {
      background-color: #085480;
      color: #fff;
      font-size: 12px;
    }

    tfoot td {
      border: 1px solid #0AF0FC !important;
    }
  </style>
@endpush

<table cellpadding="0" cellspacing="0" border="0">
  <thead>
    <tr>
      <td colspan="13">
        <span class="table-heading">JUMLAH PUSAT INFORMASI DAN KONSELING REMAJA/MAHASISWA (PIK REMAJA)<br>BERDASARKAN IDENTITAS DAN INFORMASI KELOMPOK KEGIATAN</span>
      </td>
    </tr>
    <tr>
      <td colspan="13">
        <span class="table-heading">TAHUN: 2023</span>
      </td>
    </tr>
    <tr>
      <td style="text-align: left;" colspan="13">
        <span style="font-size: 12px;  font-weight: bold;">Prov: GORONTALO</span>
      </td>
    </tr>

    <tr>
      <th rowspan="3">
        <span>kode</span>
      </th>
      <th rowspan="3">
        <span>kabupaten</span>
      </th>
      <th rowspan="3">
        <span>jumlah pik remaja</span>
      </th>
      <th colspan="2">
        <span>kepemilikan sk pengukuhan</span>
      </th>
      <th colspan="5">
        <span>basis</span>
      </th>
      <th colspan="2">
        <span>keterpaduan kelompok</span>
      </th>
      <th rowspan="3">
        <span>jumlah pik remaja pro pn</span>
      </th>
    </tr>
    <tr>
      <th rowspan="2">
        <span>ada</span>
      </th>
      <th rowspan="2">
        <span>tidak</span>
      </th>
      <th colspan="3">
        <span>jalur pendidikan</span>
      </th>
      <th colspan="2">
        <span>jalur masyarakat</span>
      </th>
      <th rowspan="2">
        <span>ya</span>
      </th>
      <th rowspan="2">
        <span>tidak</span>
      </th>
    </tr>
    <tr>
      <th>
        <span>smp/ setara</span>
      </th>
      <th>
        <span>sma/ setara</span>
      </th>
      <th>
        <span>perguruan tinggi</span>
      </th>
      <th>
        <span>organisasi keagamaan</span>
      </th>
      <th>
        <span>lsm/ organisasi kepemudaan/ organisasi kemasyarakatan</span>
      </th>
    </tr>

    <tr>
      <td style="background-color: #0099FF; border: 1px solid #fff;">
        <span style="color: #fff; font-size: 8px; ">1</span>
      </td>
      <td style="background-color: #0099FF; border: 1px solid #fff;">
        <span style="color: #fff; font-size: 8px; ">2</span>
      </td>
      <td style="background-color: #0099FF; border: 1px solid #fff;">
        <span style="color: #fff; font-size: 8px; ">3</span>
      </td>
      <td style="background-color: #0099FF; border: 1px solid #fff;">
        <span style="color: #fff; font-size: 8px; ">4</span>
      </td>
      <td style="background-color: #0099FF; border: 1px solid #fff;">
        <span style="color: #fff; font-size: 8px; ">5</span>
      </td>
      <td style="background-color: #0099FF; border: 1px solid #fff;">
        <span style="color: #fff; font-size: 8px; ">6</span>
      </td>
      <td style="background-color: #0099FF; border: 1px solid #fff;">
        <span style="color: #fff; font-size: 8px; ">7</span>
      </td>
      <td style="background-color: #0099FF; border: 1px solid #fff;">
        <span style="color: #fff; font-size: 8px; ">8</span>
      </td>
      <td style="background-color: #0099FF; border: 1px solid #fff;">
        <span style="color: #fff; font-size: 8px; ">9</span>
      </td>
      <td style="background-color: #0099FF; border: 1px solid #fff;">
        <span style="color: #fff; font-size: 8px; ">10</span>
      </td>
      <td style="background-color: #0099FF; border: 1px solid #fff;">
        <span style="color: #fff; font-size: 8px; ">11</span>
      </td>
      <td style="background-color: #0099FF; border: 1px solid #fff;">
        <span style="color: #fff; font-size: 8px; ">12</span>
      </td>
      <td style="background-color: #0099FF; border: 1px solid #fff;">
        <span style="color: #fff; font-size: 8px; ">13</span>
      </td>
    </tr>
  </thead>

  <tbody>
    @php
      $totalPikr = 0;
      $totalAdaSK = 0;
      $totalAdaKeterpaduanKelompok = 0;
      $totalPropn = 0;
      $totalSmp = 0;
      $totalSma = 0;
      $totalPerguruanTinggi = 0;
      $totalOrKeagamaan = 0;
      $totalOrmas = 0;
    @endphp
    @foreach ($kabkotas as $kabkota)
      @php
        $pikrs = $kabkotaPikrs[$kabkota->id];
        $total = $pikrs->count();
        $adaSK = $pikrs->filter(fn($pikr) => !!$pikr->sk)->count();
        $adaKeterpaduanKelompok = $pikrs->filter(fn($pikr) => !!$pikr->keterpaduan_kelompok)->count();
        $smp = $pikrs->filter(fn($pikr) => $pikr->basis === 'Jalur Pendidikan - SMP/Sederajat')->count();
        $sma = $pikrs->filter(fn($pikr) => $pikr->basis === 'Jalur Pendidikan - SMA/Sederajat')->count();
        $perguruanTinggi = $pikrs->filter(fn($pikr) => $pikr->basis === 'Jalur Pendidikan - Perguruan Tinggi')->count();
        $orKeagamaan = $pikrs->filter(fn($pikr) => $pikr->basis === 'Jalur Masyarakat - Organisasi Keagamaan')->count();
        $ormas = $pikrs->filter(fn($pikr) => $pikr->basis === 'Jalur Masyarakat - LSM/Organisasi Kepemudaan/Organisasi Kemasyarakatan')->count();
        $propn = $pikrs->filter(fn($pikr) => $pikr->pro_pn)->count();
        
        $totalPikr += $total;
        $totalAdaSK += $adaSK;
        $totalAdaKeterpaduanKelompok += $adaKeterpaduanKelompok;
        $totalSmp += $smp;
        $totalSma += $sma;
        $totalPerguruanTinggi += $perguruanTinggi;
        $totalOrKeagamaan += $orKeagamaan;
        $totalOrmas += $ormas;
        $totalPropn += $propn;
      @endphp
      <tr>
        <td>
          <span>{{ $kabkota->kode }}</span>
        </td>
        <td style="text-align: left;">
          <span>{{ $kabkota->nama }}</span>
        </td>
        <td>
          <span>{{ $total }}</span>
        </td>
        <td>
          <span>{{ $adaSK }}</span>
        </td>
        <td>
          <span>{{ $total - $adaSK }}</span>
        </td>
        <td>
          <span>{{ $smp }}</span>
        </td>
        <td>
          <span>{{ $sma }}</span>
        </td>
        <td>
          <span>{{ $perguruanTinggi }}</span>
        </td>
        <td>
          <span>{{ $orKeagamaan }}</span>
        </td>
        <td>
          <span>{{ $ormas }}</span>
        </td>
        <td>
          <span>{{ $adaKeterpaduanKelompok }}</span>
        </td>
        <td>
          <span>{{ $total - $adaKeterpaduanKelompok }}</span>
        </td>
        <td>
          <span>{{ $propn }}</span>
        </td>
      </tr>
    @endforeach
  </tbody>

  <tfoot>
    <tr>
      <td colspan="2">
        <span style="font-weight: bold;">Jumlah Total</span>
      </td>
      <td>
        <span>{{ $totalPikr }}</span>
      </td>
      <td>
        <span>{{ $totalAdaSK }}</span>
      </td>
      <td>
        <span>{{ $totalPikr - $totalAdaSK }}</span>
      </td>
      <td>
        <span>{{ $totalSmp }}</span>
      </td>
      <td>
        <span>{{ $totalSma }}</span>
      </td>
      <td>
        <span>{{ $totalPerguruanTinggi }}</span>
      </td>
      <td>
        <span>{{ $totalOrKeagamaan }}</span>
      </td>
      <td>
        <span>{{ $totalOrmas }}</span>
      </td>
      <td>
        <span>{{ $totalAdaKeterpaduanKelompok }}</span>
      </td>
      <td>
        <span>{{ $totalPikr - $totalAdaKeterpaduanKelompok }}</span>
      </td>
      <td>
        <span>{{ $totalPropn }}</span>
      </td>
    </tr>
  </tfoot>
</table>
