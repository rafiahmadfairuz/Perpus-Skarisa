<x-app>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Update Buku</div>
                </div>
                <form action="{{ route('buku.update', $buku->id_buku) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <!-- ID Buku -->
                                <div class="form-group mb-3">
                                    <label for="idBuku">ID Buku</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fa fa-id-badge"></i></span>
                                        <input type="text" id="idBuku" class="form-control"
                                            value="{{ $buku->id_buku }}" readonly>
                                    </div>
                                </div>

                                <!-- Judul Buku -->
                                <div class="form-group mb-3">
                                    <label for="judul">Judul Buku</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fa fa-book"></i></span>
                                        <input type="text" id="judul" name="judul_buku" class="form-control"
                                            value="{{ old('judul_buku', $buku->judul_buku) }}" placeholder="Judul Buku">
                                    </div>
                                    @error('judul_buku')
                                        <small class="text-danger d-flex align-items-center mt-1">
                                            <i class="fa fa-exclamation-circle me-1"></i> {{ $message }}
                                        </small>
                                    @enderror
                                </div>

                                <!-- Pengarang -->
                                <div class="form-group mb-3">
                                    <label for="pengarang">Pengarang</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                                        <input type="text" id="pengarang" name="pengarang" class="form-control"
                                            value="{{ old('pengarang', $buku->pengarang) }}" placeholder="Pengarang">
                                    </div>
                                    @error('pengarang')
                                        <small class="text-danger d-flex align-items-center mt-1">
                                            <i class="fa fa-exclamation-circle me-1"></i> {{ $message }}
                                        </small>
                                    @enderror
                                </div>

                                <!-- Penerbit -->
                                <div class="form-group mb-3">
                                    <label for="penerbit">Penerbit</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fa fa-building"></i></span>
                                        <input type="text" id="penerbit" name="penerbit" class="form-control"
                                            value="{{ old('penerbit', $buku->penerbit) }}" placeholder="Penerbit">
                                    </div>
                                    @error('penerbit')
                                        <small class="text-danger d-flex align-items-center mt-1">
                                            <i class="fa fa-exclamation-circle me-1"></i> {{ $message }}
                                        </small>
                                    @enderror
                                </div>

                                <!-- Tahun Terbit -->
                                <div class="form-group mb-3">
                                    <label for="tahun">Tahun Terbit</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fa fa-calendar-alt"></i></span>
                                        <input type="number" id="tahun" name="th_terbit" class="form-control"
                                            value="{{ old('th_terbit', $buku->th_terbit) }}" placeholder="Tahun Terbit"
                                            min="1000" max="9999">
                                    </div>
                                    @error('th_terbit')
                                        <small class="text-danger d-flex align-items-center mt-1">
                                            <i class="fa fa-exclamation-circle me-1"></i> {{ $message }}
                                        </small>
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
