<x-app>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Update Buku</div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <!-- ID Buku -->
                            <div class="form-group mb-3">
                                <label for="idBuku">ID Buku</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa fa-id-badge"></i></span>
                                    <input type="text" id="idBuku" class="form-control" placeholder="ID Buku"
                                        value="B001" readonly>
                                </div>
                            </div>
                            <!-- Judul Buku -->
                            <div class="form-group mb-3">
                                <label for="judul">Judul Buku</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa fa-book"></i></span>
                                    <input type="text" id="judul" class="form-control" placeholder="Judul Buku">
                                </div>
                            </div>
                            <!-- Pengarang -->
                            <div class="form-group mb-3">
                                <label for="pengarang">Pengarang</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                                    <input type="text" id="pengarang" class="form-control" placeholder="Pengarang">
                                </div>
                            </div>
                            <!-- Penerbit -->
                            <div class="form-group mb-3">
                                <label for="penerbit">Penerbit</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa fa-building"></i></span>
                                    <input type="text" id="penerbit" class="form-control" placeholder="Penerbit">
                                </div>
                            </div>
                            <!-- Tahun Terbit -->
                            <div class="form-group mb-3">
                                <label for="tahun">Tahun Terbit</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa fa-calendar-alt"></i></span>
                                    <input type="number" id="tahun" class="form-control" placeholder="Tahun Terbit"
                                        min="1000" max="9999">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-action px-3 pb-3">
                    <button class="btn btn-success"><i class="fa fa-check"></i> Simpan</button>
                    <a href="{{ route('kelola.buku') }}" class="btn btn-danger">
                        <i class="fa fa-times"></i> Batal
                    </a>


                </div>
            </div>
        </div>
    </div>
</x-app>
