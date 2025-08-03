<x-app>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Tambah Buku</div>
                </div>
                <form action="{{ route('buku.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <!-- ID Buku -->
                                <div class="form-group mb-3">
                                    <label for="idBuku">ID Buku</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fa fa-id-badge"></i></span>
                                        <input type="text" id="idBuku" name="id_buku" class="form-control"
                                            readonly placeholder="ID Buku" value="{{ $newId }}">
                                    </div>
                                </div>

                                <!-- Judul Buku -->
                                <div class="form-group mb-3">
                                    <label for="judul">Judul Buku</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fa fa-book"></i></span>
                                        <input type="text" id="judul" name="judul_buku"
                                            class="form-control @error('judul_buku') is-invalid @enderror"
                                            placeholder="Judul Buku" value="{{ old('judul_buku') }}">
                                    </div>
                                    @error('judul_buku')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Pengarang -->
                                <div class="form-group mb-3">
                                    <label for="pengarang">Pengarang</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                                        <input type="text" id="pengarang" name="pengarang"
                                            class="form-control @error('pengarang') is-invalid @enderror"
                                            placeholder="Pengarang" value="{{ old('pengarang') }}">
                                    </div>
                                    @error('pengarang')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Penerbit -->
                                <div class="form-group mb-3">
                                    <label for="penerbit">Penerbit</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fa fa-building"></i></span>
                                        <input type="text" id="penerbit" name="penerbit"
                                            class="form-control @error('penerbit') is-invalid @enderror"
                                            placeholder="Penerbit" value="{{ old('penerbit') }}">
                                    </div>
                                    @error('penerbit')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Tahun Terbit -->
                                <div class="form-group mb-3">
                                    <label for="tahun">Tahun Terbit</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fa fa-calendar-alt"></i></span>
                                        <input type="number" id="tahun" name="th_terbit"
                                            class="form-control @error('th_terbit') is-invalid @enderror"
                                            placeholder="Tahun Terbit" min="1000" max="9999"
                                            value="{{ old('th_terbit') }}">
                                    </div>
                                    @error('th_terbit')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-action px-3 pb-3">
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-check"></i> Simpan
                        </button>
                        <a href="{{ route('buku.index') }}" class="btn btn-danger">
                            <i class="fa fa-times"></i> Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app>
