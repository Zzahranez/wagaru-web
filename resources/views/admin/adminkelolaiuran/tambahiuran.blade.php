<!-- Modal Tambah Iuran -->
<button class="btn btn-primary" data-toggle="modal" data-target="#Modaltmbh">
    <i class="fas fa-plus mr-2"></i>Tambah Iuran
</button>

<div class="modal fade" id="Modaltmbh" tabindex="-1" role="dialog" aria-labelledby="ModaltmbhLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModaltmbhLabel">Tambah Iuran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="{{ route('adminkelolaiuran.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nama_iuran" class="form-label">Nama Iuran</label>
                        <input type="text" class="form-control" id="nama_iuran" name="nama_iuran" placeholder="Masukkan nama iuran" required>
                    </div>
                    <div class="mb-3">
                        <label for="jumlah" class="form-label">Jumlah</label>
                        <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Masukkan jumlah" required>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Tambah</button>
                    @if ($errors->any())
                        <div class="alert alert-danger mt-3">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
