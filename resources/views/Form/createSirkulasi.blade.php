<x-app>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Tambah Sirkulasi</div>
                </div>
                <div class="card-body">
                    <form action="{{ route('sirkulasi.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <!-- ID Sirkulasi -->
                                <div class="form-group mb-3">
                                    <label for="idSirkulasi">ID Sirkulasi</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fa fa-random"></i></span>
                                        <input type="text" id="idSirkulasi" class="form-control" name="id_sirkulasi"
                                            value="{{ old('id_sirkulasi', $newId ?? 'S001') }}" readonly>
                                    </div>
                                </div>

                                <!-- Nama Peminjam -->
                                <div class="form-group mb-3">
                                    <label for="peminjam">Nama Peminjam</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                                        <select id="peminjam" name="id_anggota" class="form-select">
                                            <option value="">-- Pilih Peminjam --</option>
                                            @foreach ($anggotas as $anggota)
                                                <option value="{{ $anggota->id_anggota }}"
                                                    {{ old('id_anggota') == $anggota->id_anggota ? 'selected' : '' }}>
                                                    {{ $anggota->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('id_anggota')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Buku -->
                                <div class="form-group mb-3">
                                    <label for="buku">Buku</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fa fa-book"></i></span>
                                        <select id="buku" name="id_buku" class="form-select">
                                            <option value="">-- Pilih Buku --</option>
                                            @foreach ($bukus as $buku)
                                                <option value="{{ $buku->id_buku }}"
                                                    {{ old('id_buku') == $buku->id_buku ? 'selected' : '' }}>
                                                    {{ $buku->judul_buku }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('id_buku')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Tanggal Pinjam -->
                                <div class="form-group mb-3">
                                    <label for="tanggalPinjam">Tanggal Pinjam</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                        <input type="date" id="tanggalPinjam" name="tgl_pinjam"
                                            class="form-control" value="{{ old('tgl_pinjam') }}">
                                    </div>
                                    @error('tgl_pinjam')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="card-action px-3 pb-3">
                            <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Simpan</button>
                            <a href="{{ route('sirkulasi') }}" class="btn btn-danger">
                                <i class="fa fa-times"></i> Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app>
