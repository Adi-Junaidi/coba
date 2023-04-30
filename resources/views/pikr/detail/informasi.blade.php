@if ($pikr_info->sk)
    <div class="form-group">
        <label>Nomor SK</label>
        <input class="form-control" disabled value="{{ $pikr_info->sk->no_sk }}">
    </div>
    <div class="form-group">
        <label>Tanggal SK</label>
        <input class="form-control"disabled value="{{ $pikr_info->sk->tanggal_sk }}">
    </div>

    <div class="form-group">
        <label>Dikeluarkan Oleh</label>
        <input class="form-control" disabled value="{{ $pikr_info->sk->dikeluarkan_oleh }}">
    </div>
    @endif
    
    <div class="form-group">
        <label>Sumber Dana</label>
        <input class="form-control" disabled value="{{ $pikr_info->sumber_dana }}">
    </div>
    
    <div class="form-group">
        <label>Keterpaduan Kelompok</label>
        <input class="form-control" disabled value="{{ $pikr_info->keterpaduan_kelompok == 0 ? 'Tidak' : 'Ya' }}">
    </div>

    <div class="form-group">
        <label>Proyek Prioritas Nasional</label>
        <input class="form-control" disabled value="{{ $pikr_info->pro_pn == 0 ? 'Tidak' : 'Ya' }}">
    </div>