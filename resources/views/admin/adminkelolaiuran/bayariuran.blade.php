<!-- Modal Tambah Iuran -->
<button class="btn btn-primary" data-toggle="modal" data-target="#Modaltmbh" style="background-color: #7da4a1; border-color: #7da4a1; color: white;">
    <i class ="fas fa-plus mr-2"></i>Lihat
</button>

<div class="modal fade" id="Modaltmbh" tabindex="-1" role="dialog" aria-labelledby="ModaltmbhLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModaltmbhLabel">Bayar iuran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('iuran.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4 p-3 border rounded shadow" style="background-color: #f8f9fa;">
                        <h5 class="font-weight-bold text-primary">Informasi Pembayaran</h5>
                        <p class="text-muted">
                            Untuk kemudahan Anda, lakukan pembayaran iuran melalui:
                        </p>
                        <ul class="list-unstyled">
                            <li class="mb-2">
                                <strong>DANA:</strong> 
                                <span style="color: #28a745; font-weight: bold;">0981 2638 96123</span>
                            </li>
                            <li class="mb-2">
                                <strong>Transfer Bank:</strong>
                            </li>
                            <ul class="list-unstyled ml-3">
                                <li>
                                    <strong>BCA:</strong> 
                                    <span style="color: #007bff; font-weight: bold;">1029 7310 4718741</span>
                                </li>
                                <li>
                                    <strong>Mandiri:</strong> 
                                    <span style="color: #007bff; font-weight: bold;">1123 0913 10923</span>
                                </li>
                            </ul>
                        </ul>
                        {{-- <label for="bukti_pembayaran" class="form-label">Unggah Bukti Pembayaran</label>
                        <p class="text-muted">
                            Silakan unggah bukti pembayaran Anda di sini. Pastikan file yang diunggah adalah gambar (JPG, PNG, dll).
                        </p>
                        <input type="file" class="form-control" id="bukti_pembayaran" name="bukti_pembayaran" accept="image/*" required> --}}
                    </div>

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
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color: #7da4a1; border-color: #7da4a1; color: white;">Tutup</button>
            </div>
        </div>
    </div>
</div>