$(document).ready(function(){
    $('#table').DataTable();
});

$(document).ready(function() {
// modal untuk menampilkan detail data registrasi kegiatan pik-r
const coba = $(document).on("click", "#detail1", function() {

    $("#section1").html(`
    <div class="card">
    <div class="card-body">
        <div class="row g-2 mb-3">
        <div class="col-md">
            <div class="d-flex justify-content-end ">
            <button class="btn btn-primary" type="submit"><span class="fa-fw select-all fas me-2"></span>Tambah Data</button>
            </div>
        </div>
        </div> 
        <table class="table" id="table1">
        <thead>
            <tr>
            <th>No.</th>
            <th>No. Register</th>
            <th>Nama</th>
            <th>Bulan Lapor</th>
            <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>
                <span id="noreg">12345678</span>
                </td>
                <td>
                <span id="nama">PIK-R As-Salam</span>
                </td>
                <td>
                <span id="Bulan Lapor">Januari 2023</span>
                </td>
                <td>
                <button class="btn btn-info btn-sm" id="detail" data-bs-toggle="modal" data-bs-target="#modal1" type="button">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom" title="Detail">
                    <span class="fa-fw select-all fas"></span>
                    </span>
                </button>
                </td>
            </tr>
        </tbody>
        </table>
        <div class="d-flex">
            <button class="btn btn-primary mt-2" type="button">Kembali</button>
        </div>
    </div>
    </div>
    `);

    if(coba.length !== 0){
        $('#table1').DataTable();
    }

    // var noreg = $(this).data("noreg");
    // var nama = $(this).data("nama");

    // $("#noRegister").val(noreg);
    // $("#name").val(nama);
})

})
