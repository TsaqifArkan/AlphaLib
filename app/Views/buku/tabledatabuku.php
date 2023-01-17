<div class="table-responsive">
    <table class="table table-bordered table-hover" id="dataTable-Buku">
        <thead class="ave-bg-th">
            <tr>
                <th class="text-uppercase fw-bold">No</th>
                <th class="text-uppercase fw-bold">Judul</th>
                <th class="text-uppercase fw-bold">ISBN</th>
                <th class="text-uppercase fw-bold">Pengarang</th>
                <th class="text-uppercase fw-bold">Penerbit</th>
                <th class="text-uppercase fw-bold">Tempat Terbit</th>
                <th class="text-uppercase fw-bold">Jumlah Halaman</th>
                <th class="text-uppercase fw-bold">Tahun Terbit</th>
                <th class="text-uppercase fw-bold head-aksi">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($datas as $i => $data): ?>
                <tr>
                    <td><?= $i + 1; ?></td>
                    <td><?= esc($data['judul']); ?></td>
                    <td><?= esc($data['isbn']); ?></td>
                    <td><?= esc($data['pengarang']); ?></td>
                    <td><?= esc($data['penerbit']); ?></td>
                    <td><?= esc($data['tempatterbit']); ?></td>
                    <td><?= esc($data['jmlhal']); ?></td>
                    <td><?= esc($data['thnterbit']); ?></td>
                    <td>
                        <a href="#" class="btn btn-info btn-sm" data-bs-toggle="tooltip" data-bs-placement="bottom"
                            title="Detail"><i class="fa-solid fa-circle-info"></i></a>
                        <button class="btn btn-warning btn-sm" data-bs-toggle="tooltip" data-bs-placement="bottom"
                            title="Edit" onclick="ubah('<?= esc($data['idbuku']); ?>')"><i
                                class="fa-solid fa-pen-to-square"></i></button>
                        <button class="btn btn-danger btn-sm" data-bs-toggle="tooltip" data-bs-placement="bottom"
                            title="Hapus" onclick="hapus('<?= esc($data['idbuku']); ?>')"><i
                                class="fa-solid fa-trash"></i></button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<script>
    $(document).ready(function () {
        $('#dataTable-Buku').DataTable({
            "pageLength": 25,
            "columnDefs": [
                {
                    // targets: [0, 1, 2, 3, 4, 5, 6, 7],
                    targets: "_all",
                    className: 'dt-head-center'
                },
                {
                    targets: [0, 6, 7, 8],
                    className: 'dt-body-center'
                }
            ]
        });
    });

    // Konfigurasi Tombol Edit
    function ubah(id) {
        $.ajax({
            type: "POST",
            url: "<?= base_url('buku/formedit'); ?>",
            data: {
                id: id
            },
            dataType: "JSON",
            success: function (response) {
                if (response.data) {
                    $('.viewModalBuku').html(response.data).show();
                    $('#modalEditBuku').modal('show');
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                // alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                var tab = window.open('about:blank', '_blank');
                tab.document.write(xhr.responseText); // where 'html' is a variable containing your HTML
                tab.document.close(); // to finish loading the page
            }
        });
    }

    // Konfigurasi Tombol Hapus
    function hapus(id) {
        Swal.fire({
            title: 'Apakah kamu yakin?',
            text: "Data yang sudah dihapus tidak bisa dikembalikan lagi!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('buku/delete'); ?>",
                    data: {
                        id: id
                    },
                    dataType: "JSON",
                    success: function (response) {
                        if (response.flashData) {
                            Swal.fire({
                                icon: 'success',
                                title: 'SUCCESS !',
                                text: response.flashData
                            })
                            tableBuku();
                        }
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        // alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                        var tab = window.open('about:blank', '_blank');
                        tab.document.write(xhr.responseText); // where 'html' is a variable containing your HTML
                        tab.document.close(); // to finish loading the page
                    }
                });
            }
        })
    }

</script>