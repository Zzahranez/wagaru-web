<!-- Modal update iuran -->
<div class="modal fade" id="Modalupdate{{ $iuran->id }}" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Iuran</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('adminkelolaiuran.update', $iuran->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Input untuk Nama Iuran -->
                    <div class="mb-3">
                        <label for="nama_iuran" class="form-label">Nama Iuran</label>
                        <input type="text" class="form-control" id="nama_iuran" name="nama_iuran"
                            value="{{ old('nama_iuran', $iuran->nama_iuran) }}" required>
                    </div>

                    <!-- Input untuk Jumlah -->
                    <div class="mb-3">
                        <label for="jumlah" class="form-label">Jumlah</label>
                        <input type="number" class="form-control" id="jumlah" name="jumlah"
                            value="{{ old('jumlah', $iuran->jumlah) }}" required>
                    </div>AC

                    <!-- Input untuk Tanggal -->
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal"
                            value="{{ old('tanggal', $iuran->tanggal->format('Y-m-d')) }}" required>
                    </div>

                    <!-- Input untuk Status -->
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" id="status" name="status" required>
                            <option value="belum dibayar" {{ $iuran->status === 'belum dibayar' ? 'selected' : '' }}>
                                Belum Dibayar
                            </option>
                            <option value="selesai" {{ $iuran->status === 'selesai' ? 'selected' : '' }}>
                                Selesai
                            </option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Perbarui</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
