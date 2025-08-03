<x-app>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Tambah Pengguna</div>
                </div>
                <form action="{{ route('pengguna.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <!-- Nama Pengguna -->
                                <div class="form-group mb-3">
                                    <label for="namaPengguna">Nama Pengguna</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                                        <input type="text" name="nama_pengguna" id="namaPengguna"
                                            class="form-control" value="{{ old('nama_pengguna') }}"
                                            placeholder="Nama Pengguna">
                                    </div>
                                    @error('nama_pengguna')
                                        <small class="text-danger d-flex align-items-center mt-1">
                                            <i class="fa fa-exclamation-circle me-1"></i> {{ $message }}
                                        </small>
                                    @enderror
                                </div>

                                <!-- Username -->
                                <div class="form-group mb-3">
                                    <label for="username">Username</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fa fa-user-circle"></i></span>
                                        <input type="text" name="username" id="username" class="form-control"
                                            value="{{ old('username') }}" placeholder="Username">
                                    </div>
                                    @error('username')
                                        <small class="text-danger d-flex align-items-center mt-1">
                                            <i class="fa fa-exclamation-circle me-1"></i> {{ $message }}
                                        </small>
                                    @enderror
                                </div>

                                <!-- Password -->
                                <div class="form-group mb-3">
                                    <label for="password">Password</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fa fa-lock"></i></span>
                                        <input type="password" name="password" id="password" class="form-control"
                                            placeholder="Password">
                                    </div>
                                    @error('password')
                                        <small class="text-danger d-flex align-items-center mt-1">
                                            <i class="fa fa-exclamation-circle me-1"></i> {{ $message }}
                                        </small>
                                    @enderror
                                </div>

                                <!-- Level -->
                                <div class="form-group mb-3">
                                    <label for="level">Level</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fa fa-shield-alt"></i></span>
                                        <select name="level" id="level" class="form-control">
                                            <option value="">-- Pilih Level --</option>
                                            <option value="Administrator"
                                                {{ old('level') == 'Administrator' ? 'selected' : '' }}>Administrator
                                            </option>
                                            <option value="Petugas" {{ old('level') == 'Petugas' ? 'selected' : '' }}>
                                                Petugas</option>
                                        </select>
                                    </div>
                                    @error('level')
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
                        <a href="{{ route('pengguna.index') }}" class="btn btn-danger">
                            <i class="fa fa-times"></i> Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app>
