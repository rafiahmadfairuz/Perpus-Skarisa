<x-app>
    <h3 class="fw-bold">Dashboard Administrator</h3>

    <div class="row">
        <div class="col-md-3 mt-3 ">
            <div class="card card-secondary bg-primary-gradient h-100">
                <div class="card-body skew-shadow d-flex flex-column justify-content-between">
                    <div class="d-flex align-items-center mb-3">
                        <div class="me-3">
                            <i class="fas fa-book fa-2x text-white"></i>
                        </div>
                        <h3 class="fw-bold mb-0 text-white">Buku</h3>
                    </div>
                    <h2 class="mb-3 text-white">6</h2>
                    <a href="{{ route('kelola.buku') }}" class="text-small text-uppercase fw-bold op-8 text-white">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-3 mt-3 ">
            <div class="card card-secondary bg-warning-gradient h-100">
                <div class="card-body bubble-shadow d-flex flex-column justify-content-between">
                    <div class="d-flex align-items-center mb-3">
                        <div class="me-3">
                            <i class="fas fa-users fa-2x text-white"></i>
                        </div>
                        <h3 class="fw-bold mb-0 text-white">Anggota</h3>
                    </div>
                    <h2 class="mb-3 text-white">6</h2>
                    <a href="{{ route('kelola.anggota') }}" class="text-small text-uppercase fw-bold op-8 text-white">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-3 mt-3 ">
            <div class="card card-secondary bg-success-gradient h-100">
                <div class="card-body curves-shadow d-flex flex-column justify-content-between">
                    <div class="d-flex align-items-center mb-3">
                        <div class="me-3">
                            <i class="fas fa-exchange-alt fa-2x text-white"></i>
                        </div>
                        <h3 class="fw-bold mb-0 text-white">Sirkulasi</h3>
                    </div>
                    <h2 class="mb-3 text-white">2</h2>
                    <a href="{{ route('sirkulasi') }}" class="text-small text-uppercase fw-bold op-8 text-white">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-3 mt-3 ">
            <div class="card card-secondary bg-danger-gradient h-100">
                <div class="card-body skew-shadow d-flex flex-column justify-content-between">
                    <div class="d-flex align-items-center mb-3">
                        <div class="me-3">
                            <i class="fas fa-file-alt fa-2x text-white"></i>
                        </div>
                        <h3 class="fw-bold mb-0 text-white">Laporan</h3>
                    </div>
                    <h2 class="mb-3 text-white">4</h2>
                    <a href="{{ route('laporan.sirkulasi') }}" class="text-small text-uppercase fw-bold op-8 text-white">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app>
