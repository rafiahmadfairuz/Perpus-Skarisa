<x-app>
    <div cla    s="row">
        <div class="col-md-12">
            <div class="card">
                <form action="{{ route('anggota.update', $anggota->id_anggota) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-header">
                        <div class="card-title">Update Anggota</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <!-- ID Anggota -->
                                <div class="form-group mb-3">
                                    <label for="idAnggota">ID Anggota</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fa fa-id-badge"></i></span>
                                        <input type="text" id="idAnggota" name="id_anggota" class="form-control"
                                            value="{{ old('id_anggota', $anggota->id_anggota) }}" readonly>
                                    </div>
                                    @error('id_anggota')
                                        <small class="text-danger d-flex align-items-center mt-1">
                                            <i class="fa fa-exclamation-circle me-1"></i> {{ $message }}
                                        </small>
                                    @enderror
                                </div>

                                <!-- Nama Anggota -->
                                <div class="form-group mb-3">
                                    <label for="nama">Nama Anggota</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                                        <input type="text" id="nama" name="nama" class="form-control"
                                            placeholder="Nama Anggota" value="{{ old('nama', $anggota->nama) }}">
                                    </div>
                                    @error('nama')
                                        <small class="text-danger d-flex align-items-center mt-1">
                                            <i class="fa fa-exclamation-circle me-1"></i> {{ $message }}
                                        </small>
                                    @enderror
                                </div>

                                <!-- Jenis Kelamin -->
                                <div class="form-group mb-3">
                                    <label for="jk">Jenis Kelamin</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fa fa-venus-mars"></i></span>
                                        <select id="jk" name="jekel" class="form-control">
                                            <option value="">Pilih Jenis Kelamin</option>
                                            <option value="Laki-Laki" {{ old('jekel', $anggota->jekel) == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                                            <option value="Perempuan" {{ old('jekel', $anggota->jekel) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                        </select>
                                    </div>
                                    @error('jekel')
                                        <small class="text-danger d-flex align-items-center mt-1">
                                            <i class="fa fa-exclamation-circle me-1"></i> {{ $message }}
                                        </small>
                                    @enderror
                                </div>

                                <!-- Kelas -->
                                <div class="form-group mb-3">
                                    <label for="kelas">Kelas</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fa fa-school"></i></span>
                                        <input type="text" id="kelas" name="kelas" class="form-control"
                                            placeholder="Kelas" value="{{ old('kelas', $anggota->kelas) }}">
                                    </div>
                                    @error('kelas')
                                        <small class="text-danger d-flex align-items-center mt-1">
                                            <i class="fa fa-exclamation-circle me-1"></i> {{ $message }}
                                        </small>
                                    @enderror
                                </div>

                                <!-- No HP -->
                                <div class="form-group mb-3">
                                    <label for="nohp">No HP</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                        <input type="text" id="nohp" name="no_hp" class="form-control"
                                            placeholder="08xxxxxxxxxx" value="{{ old('no_hp', $anggota->no_hp) }}">
                                    </div>
                                    @error('no_hp')
                                        <small class="text-danger d-flex align-items-center mt-1">
                                            <i class="fa fa-exclamation-circle me-1"></i> {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-action px-3 pb-3">
                        <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Simpan</button>
                        <a href="{{ route('anggota.index') }}" class="btn btn-danger">
                            <i class="fa fa-times"></i> Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app>
