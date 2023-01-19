<!-- Modal -->
<div class="modal fade" id="modalTambahKlasifikasi" tabindex="-1" aria-labelledby="judulModalKlasifikasi"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="judulModalKlasifikasi">Tambah Data Klasifikasi</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?= form_open('klasifikasi/tambah', ['class' => 'formKlasifikasi']); ?>
            <div class="modal-body">
                <?= csrf_field(); ?>
                <div class="form-group mb-3">
                    <label for="noKlas" class="form-label">Nomor Klasifikasi</label>
                    <input type="text" class="form-control" name="noKlas" id="noKlas">
                    <div class="invalid-feedback errorNoKlas"></div>
                </div>
                <div class="form-group mb-3">
                    <label for="nama" class="form-label">Nama Klasifikasi</label>
                    <input type="text" class="form-control" name="nama" id="nama">
                    <div class="invalid-feedback errorNama"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btnSimpan">Tambah Data</button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>
<script>
    // Konfigurasi Modal Tambah Klasifikasi di modaltambah.php
    $(document).ready(function () {
        $('#modalTambahKlasifikasi').on('shown.bs.modal', function () {
            $('#noKlas').focus();
        })
        $('.formKlasifikasi').submit(function (e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: "JSON",
                beforeSend: function () {
                    $('.btnSimpan').attr('disable', 'disabled');
                    $('.btnSimpan').html('<i class="fa-solid fa-spin fa-fw fa-spinner"></i>')
                },
                complete: function () {
                    $('.btnSimpan').removeAttr('disable');
                    $('.btnSimpan').html('Tambah Data')
                },
                success: function (response) {
                    if (response.error) {

                        if (response.error.noKlas) {
                            $('#noKlas').addClass('is-invalid');
                            $('.errorNoKlas').html(response.error.noKlas);
                        } else {
                            $('#noKlas').removeClass('is-invalid');
                            $('#noKlas').addClass('is-valid');
                            $('.errorNoKlas').html('');
                        }

                        if (response.error.nama) {
                            $('#nama').addClass('is-invalid');
                            $('.errorNama').html(response.error.nama);
                        } else {
                            $('#nama').removeClass('is-invalid');
                            $('#nama').addClass('is-valid');
                            $('.errorNama').html('');
                        }

                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: 'SUCCESS !',
                            text: response.flashData
                        });
                        $('#modalTambahKlasifikasi').modal('hide');
                        tableKlasifikasi();
                    }
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    // alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                    var tab = window.open('about:blank', '_blank');
                    tab.document.write(xhr.responseText); // where 'html' is a variable containing your HTML
                    tab.document.close(); // to finish loading the page
                }
            });
            return false;
        });
    });
</script>