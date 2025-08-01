<x-app>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Tambah Anggota</div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <!-- ID Anggota -->
                            <div class="form-group mb-3">
                                <label for="idAnggota">ID Anggota</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa fa-id-badge"></i></span>
                                    <input type="text" id="idAnggota" class="form-control" placeholder="ID Anggota"
                                        value="A001" readonly>
                                </div>
                            </div>

                            <!-- Nama Anggota -->
                            <div class="form-group mb-3">
                                <label for="nama">Nama Anggota</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                                    <input type="text" id="nama" class="form-control"
                                        placeholder="Nama Anggota">
                                </div>
                            </div>

                            <!-- Jenis Kelamin -->
                            <div class="form-group mb-3">
                                <label for="jk">Jenis Kelamin</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa fa-venus-mars"></i></span>
                                    <select id="jk" class="form-control">
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Kelas -->
                            <div class="form-group mb-3">
                                <label for="kelas">Kelas</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa fa-school"></i></span>
                                    <input type="text" id="kelas" class="form-control" placeholder="Kelas">
                                </div>
                            </div>

                            <!-- No HP -->
                            <div class="form-group mb-3">
                                <label for="nohp">No HP</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                    <input type="text" id="nohp" class="form-control"
                                        placeholder="08xxxxxxxxxx">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-action px-3 pb-3">
                    <button class="btn btn-success"><i class="fa fa-check"></i> Simpan</button>
                    <a href="{{ route('kelola.anggota') }}" class="btn btn-danger">
                        <i class="fa fa-times"></i> Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app>
