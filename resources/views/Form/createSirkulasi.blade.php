<x-app>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Tambah Sirkulasi</div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <!-- ID Sirkulasi -->
                            <div class="form-group mb-3">
                                <label for="idSirkulasi">ID Sirkulasi</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa fa-random"></i></span>
                                    <input type="text" id="idSirkulasi" class="form-control"
                                        placeholder="ID Sirkulasi" value="S001" readonly>
                                </div>
                            </div>
                            <!-- Nama Peminjam -->
                            <div class="form-group mb-3">
                                <label for="peminjam">Nama Peminjam</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                                    <select id="peminjam" class="form-select">
                                        <option value="">-- Pilih Peminjam --</option>
                                        <option value="1">Ahmad Fairuz</option>
                                        <option value="2">Budi Santoso</option>
                                        <option value="3">Citra Lestari</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Buku -->
                            <div class="form-group mb-3">
                                <label for="buku">Buku</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa fa-book"></i></span>
                                    <select id="buku" class="form-select">
                                        <option value="">-- Pilih Buku --</option>
                                        <option value="B001">Belajar PHP</option>
                                        <option value="B002">Mastering Laravel</option>
                                        <option value="B003">HTML & CSS Dasar</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Tanggal Pinjam -->
                            <div class="form-group mb-3">
                                <label for="tanggalPinjam">Tanggal Pinjam</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                    <input type="date" id="tanggalPinjam" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-action px-3 pb-3">
                    <button class="btn btn-success"><i class="fa fa-check"></i> Simpan</button>
                    <a href="{{ route('sirkulasi') }}" class="btn btn-danger">
                        <i class="fa fa-times"></i> Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app>
