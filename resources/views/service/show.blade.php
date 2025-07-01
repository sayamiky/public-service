<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Unggah Dokumen</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body border-bottom pb-2 mb-3">
                        <h6 class="text-secondary mb-3">Data Citizen</h6>
                        <ul class="list-group list-group-flush mb-0">
                            <li class="list-group-item px-0 py-1"><strong>Nama:</strong> {{ Auth::user()->name }}</li>
                            <li class="list-group-item px-0 py-1"><strong>NIK:</strong> {{ Auth::user()->nik }}</li>
                            <li class="list-group-item px-0 py-1"><strong>Tempat Lahir:</strong> {{ Auth::user()->citizen->birth_place }}</li>
                            <li class="list-group-item px-0 py-1"><strong>Tanggal Lahir:</strong> {{ Auth::user()->citizen->birth_date }}</li>
                            <li class="list-group-item px-0 py-1"><strong>Jenis Kelamin:</strong> {{ Auth::user()->citizen->gender }}</li>
                            <li class="list-group-item px-0 py-1"><strong>Alamat:</strong> {{ Auth::user()->citizen->address }}</li>
                            <li class="list-group-item px-0 py-1"><strong>Kelurahan:</strong> {{ Auth::user()->citizen->village }}</li>
                            <li class="list-group-item px-0 py-1"><strong>Kecamatan:</strong> {{ Auth::user()->citizen->district }}</li>
                            <li class="list-group-item px-0 py-1"><strong>Agama:</strong> {{ Auth::user()->citizen->religion }}</li>
                            <li class="list-group-item px-0 py-1"><strong>Status Perkawinan:</strong> {{ Auth::user()->citizen->marital_status }}</li>
                            <li class="list-group-item px-0 py-1"><strong>Pekerjaan:</strong> {{ Auth::user()->citizen->occupation }}</li>
                            <li class="list-group-item px-0 py-1"><strong>Layanan:</strong> {{ $service->name }}</li>
                        </ul>
                    </div>
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Unggah Dokumen</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('service-request.store', $service->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <input type="hidden" name="service_id" value="{{ $service->id }}">
                                <label for="document" class="form-label">Pilih Dokumen (PDF, JPG, PNG)</label>
                                <input class="form-control @error('document') is-invalid @enderror" type="file"
                                    id="document" name="document" accept=".pdf,.jpg,.jpeg,.png" required>
                                @error('document')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">
                                    Maksimal ukuran file: 2MB.
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Unggah</button>
                        </form>
                        @if (session('success'))
                            <div class="alert alert-success mt-3">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger mt-3">
                                {{ session('error') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
