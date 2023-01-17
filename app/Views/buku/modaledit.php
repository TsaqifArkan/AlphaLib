<!-- Modal -->
<div class="modal fade" id="modalEditBuku" tabindex="-1" aria-labelledby="judulModalBuku" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="judulModalBuku">Edit Data Buku</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?= form_open('buku/edit', ['class' => 'formBuku']); ?>
            <div class="modal-body">
                <?= csrf_field(); ?>
                <input type="hidden" name="id" id="id" value="<?= esc($buku['idbuku']); ?>">
                <div class="form-group mb-3">
                    <label for="judul" class="form-label">Judul</label>
                    <input type="text" class="form-control" name="judul" id="judul" value="<?= esc($buku['judul']); ?>">
                    <div class="invalid-feedback errorJudul"></div>
                </div>
                <div class="form-group mb-3">
                    <label for="isbn" class="form-label">ISBN</label>
                    <input type="text" class="form-control" name="isbn" id="isbn" value="<?= esc($buku['isbn']); ?>">
                    <div class="invalid-feedback errorISBN"></div>
                </div>
                <div class="form-group mb-3">
                    <label for="pengarang" class="form-label">Pengarang</label>
                    <input type="text" class="form-control" name="pengarang" id="pengarang"
                        value="<?= esc($buku['pengarang']); ?>">
                    <div class="invalid-feedback errorPengarang"></div>
                </div>
                <div class="form-group mb-3">
                    <label for="penerbit" class="form-label">Penerbit</label>
                    <input type="text" class="form-control" name="penerbit" id="penerbit"
                        value="<?= esc($buku['penerbit']); ?>">
                    <div class="invalid-feedback errorPenerbit"></div>
                </div>
                <div class="form-group mb-3">
                    <label for="tempatTerbit" class="form-label">Tempat Terbit</label>
                    <input type="text" class="form-control" name="tempatTerbit" id="tempatTerbit"
                        value="<?= esc($buku['tempatterbit']); ?>">
                    <div class="invalid-feedback errorTempatTerbit"></div>
                </div>
                <div class="form-group mb-3">
                    <label for="jmlHal" class="form-label">Jumlah Halaman</label>
                    <input type="text" class="form-control" name="jmlHal" id="jmlHal"
                        value="<?= esc($buku['jmlhal']); ?>">
                    <div class="invalid-feedback errorJmlHal"></div>
                </div>
                <div class="form-group mb-3">
                    <label for="thnTerbit" class="form-label">Tahun Terbit</label>
                    <input type="number" class="form-control" name="thnTerbit" id="thnTerbit" min="1970" max="2500"
                        value="<?= esc($buku['thnterbit']); ?>">
                    <div class="invalid-feedback errorThnTerbit"></div>
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
    // Konfigurasi Modal Edit Buku di modaledit.php
    $(document).ready(function () {
        $('.formBuku').submit(function (e) {
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

                        if (response.error.judul) {
                            $('#judul').addClass('is-invalid');
                            $('.errorJudul').html(response.error.judul);
                        } else {
                            $('#judul').removeClass('is-invalid');
                            $('#judul').addClass('is-valid');
                            $('.errorJudul').html('');
                        }

                        if (response.error.isbn) {
                            $('#isbn').addClass('is-invalid');
                            $('.errorISBN').html(response.error.isbn);
                        } else {
                            $('#isbn').removeClass('is-invalid');
                            $('#isbn').addClass('is-valid');
                            $('.errorISBN').html('');
                        }

                        if (response.error.pengarang) {
                            $('#pengarang').addClass('is-invalid');
                            $('.errorPengarang').html(response.error.pengarang);
                        } else {
                            $('#pengarang').removeClass('is-invalid');
                            $('#pengarang').addClass('is-valid');
                            $('.errorPengarang').html('');
                        }

                        if (response.error.penerbit) {
                            $('#penerbit').addClass('is-invalid');
                            $('.errorPenerbit').html(response.error.penerbit);
                        } else {
                            $('#penerbit').removeClass('is-invalid');
                            $('#penerbit').addClass('is-valid');
                            $('.errorPenerbit').html('');
                        }

                        if (response.error.tempatTerbit) {
                            $('#tempatTerbit').addClass('is-invalid');
                            $('.errorTempatTerbit').html(response.error.tempatTerbit);
                        } else {
                            $('#tempatTerbit').removeClass('is-invalid');
                            $('#tempatTerbit').addClass('is-valid');
                            $('.errorTempatTerbit').html('');
                        }

                        if (response.error.jmlHal) {
                            $('#jmlHal').addClass('is-invalid');
                            $('.errorJmlHal').html(response.error.jmlHal);
                        } else {
                            $('#jmlHal').removeClass('is-invalid');
                            $('#jmlHal').addClass('is-valid');
                            $('.errorJmlHal').html('');
                        }

                        if (response.error.thnTerbit) {
                            $('#thnTerbit').addClass('is-invalid');
                            $('.errorThnTerbit').html(response.error.thnTerbit);
                        } else {
                            $('#thnTerbit').removeClass('is-invalid');
                            $('#thnTerbit').addClass('is-valid');
                            $('.errorThnTerbit').html('');
                        }

                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: 'SUCCESS !',
                            text: response.flashData
                        });
                        $('#modalEditBuku').modal('hide');
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
            return false;
        });
    });
</script>