<x-app>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Tambah Pengguna</div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <!-- Nama Pengguna -->
                            <div class="form-group mb-3">
                                <label for="namaPengguna">Nama Pengguna</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                                    <input type="text" id="namaPengguna" class="form-control"
                                        placeholder="Nama Pengguna">
                                </div>
                            </div>
                            <!-- Username -->
                            <div class="form-group mb-3">
                                <label for="username">Username</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa fa-user-circle"></i></span>
                                    <input type="text" id="username" class="form-control" placeholder="Username">
                                </div>
                            </div>
                            <!-- Password -->
                            <div class="form-group mb-3">
                                <label for="password">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa fa-lock"></i></span>
                                    <input type="password" id="password" class="form-control" placeholder="Password">
                                </div>
                            </div>
                            <!-- Level -->
                            <div class="form-group mb-3">
                                <label for="level">Level</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa fa-shield-alt"></i></span>
                                    <select id="level" class="form-control">
                                        <option value="">-- Pilih Level --</option>
                                        <option value="admin">Administrator</option>
                                        <option value="petugas">Petugas</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-action px-3 pb-3">
                    <button class="btn btn-success"><i class="fa fa-check"></i> Simpan</button>
                    <a href="{{ route('pengguna.sistem') }}" class="btn btn-danger">
                        <i class="fa fa-times"></i> Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app>
