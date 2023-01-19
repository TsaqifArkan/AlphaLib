<!-- Modal -->
<div class="modal fade" id="modalEditKlasifikasi" tabindex="-1" aria-labelledby="judulModalKlasifikasi"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="judulModalKlasifikasi">Edit Data Klasifikasi</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?= form_open('klasifikasi/edit', ['class' => 'formKlasifikasi']); ?>
            <div class="modal-body">
                <?= csrf_field(); ?>
                <input type="hidden" name="id" id="id" value="<?= esc($klasifikasi['idklasifikasi']); ?>">
                <div class="form-group mb-3">
                    <label for="noKlas" class="form-label">Nomor Klasifikasi</label>
                    <input type="text" class="form-control" name="noKlas" id="noKlas"
                        value="<?= esc($klasifikasi['noklas']); ?>">
                    <div class="invalid-feedback errorNoKlas"></div>
                </div>
                <div class="form-group mb-3">
                    <label for="nama" class="form-label">Nama Klasifikasi</label>
                    <input type="text" class="form-control" name="nama" id="nama"
                        value="<?= esc($klasifikasi['nama']); ?>">
                    <div class="invalid-feedback errorNama"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btnSimpan">Update Data</button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>
<script>
    // Konfigurasi Modal Edit Klasifikasi di modaledit.php
    $(document).ready(function () {
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
                    $('.btnSimpan').html('Update Data')
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
                        $('#modalEditKlasifikasi').modal('hide');
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