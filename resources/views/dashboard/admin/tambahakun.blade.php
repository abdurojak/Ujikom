@extends('super.master-layout')

@section('custom-css')
    <style>
        @media print {

            .page-wrapper,
            .page-content-wrapper {
                margin: 0 !important;
            }

            .container {
                margin-top: 0 !important;
            }

            body * {
                visibility: hidden;
                font-size: 10pt;
            }

            .container-fluid,
            .row,
            .card,
            .card-body {
                margin: 12px !important;
                padding: 0 !important;
                box-sizing: border-box;
            }

            #printable-section,
            #printable-section * {
                visibility: visible;
            }

            #printable-section {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                page-break-inside: avoid;
            }
        }
    </style>
@endsection

@section('title', 'Tambah Alat Kesehatan')

@section('content')
    <button onclick="printDocument()" class="btn btn-primary">Print</button>
    <div id="printable-section">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h4 class="mb-0">Data Pendaftaran</h4>
                            </div>
                            <hr>
                            <form method="POST" action="{{ route('pendaftaran.edit.proses') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-12">
                                        <div class="d-flex">
                                            <span class="me-2">1.</span>
                                            <div class="flex-grow-1">
                                                <label for="keterangan">Nama Lengkap (sesuai ijasah disertai gelar)</label>
                                                <input class="form-control select-element" id="nama" type="text"
                                                    name="nama" value="{{ $dataPendaftaran->nama }}" readonly></input>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-12 mb-3">
                                        <div class="d-flex">
                                            <span class="me-2">2.</span>
                                            <div class="flex-grow-1">
                                                <label for="keterangan">Alamat KTP</label>
                                                <textarea class="form-control select-element" id="alamat_ktp" name="alamat_ktp" readonly>{{ $dataPendaftaran->alamat_ktp }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="d-flex">
                                            <span class="me-3">&nbsp;</span>
                                            <div class="flex-grow-1">
                                                <label for="keterangan">Alamat Lengkap Saat Ini</label>
                                                <textarea class="form-control select-element" id="alamat_lengkap" name="alamat_lengkap" readonly>{{ $dataPendaftaran->alamat_lengkap }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-12 col-md-4 mb-2">
                                        <div class="d-flex">
                                            <span class="me-3">&nbsp;</span>
                                            <div class="flex-grow-1">
                                                <label class="form-label">Provinsi</label>
                                                <select class="form-control form-control-sm select-element" name="provinsi"
                                                    id="provinsi1" readonly>
                                                    <option value="{{ $dataPendaftaran->provinsi }}">
                                                        {{ $dataPendaftaran->provinsi }}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 mb-2">
                                        <div class="d-flex">
                                            <span class="me-2">&nbsp;</span>
                                            <div class="flex-grow-1">
                                                <label class="form-label">Kabupaten</label>
                                                <select class="form-control form-control-sm select-element" name="kabupaten"
                                                    id="kabupaten1" readonly>
                                                    <option value="{{ $dataPendaftaran->kabupaten }}">
                                                        {{ $dataPendaftaran->kabupaten }}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 mb-2">
                                        <div class="d-flex">
                                            <span class="me-2">&nbsp;</span>
                                            <div class="flex-grow-1">
                                                <label class="form-label">Kecamatan</label>
                                                <input class="form-control form-control-sm select-element" type="text"
                                                    name="kecamatan" id="kecamatan" placeholder="Masukkan Kecamatan"
                                                    value="{{ $dataPendaftaran->kecamatan }}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-12 col-md-4 mb-2">
                                        <div class="d-flex">
                                            <span class="me-3">&nbsp;</span>
                                            <div class="flex-grow-1">
                                                <label class="form-label">No Telp</label>
                                                <input class="form-control form-control-sm select-element" type="number"
                                                    name="notelp" id="notelp" placeholder="Masukkan Type"
                                                    value="{{ $dataPendaftaran->notelp }}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 mb-2">
                                        <div class="d-flex">
                                            <span class="me-2">&nbsp;</span>
                                            <div class="flex-grow-1">
                                                <label class="form-label">No Hp</label>
                                                <input class="form-control form-control-sm select-element" type="number"
                                                    name="nohp" id="nohp" placeholder="Masukkan Kecamatan"
                                                    value="{{ $dataPendaftaran->nohp }}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 mb-2">
                                        <div class="d-flex">
                                            <span class="me-2">&nbsp;</span>
                                            <div class="flex-grow-1">
                                                <label class="form-label">Email</label>
                                                <input class="form-control form-control-sm select-element" type="email"
                                                    name="email" id="email" placeholder="Masukkan Kecamatan"
                                                    value="{{ $dataPendaftaran->email }}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-12 col-md-6 mb-2">
                                        <div class="d-flex">
                                            <span class="me-2">3.</span> <!-- Menambahkan nomor urut -->
                                            <div class="flex-grow-1">
                                                <label class="form-label">Kewarganegaraan</label>
                                                <select class="form-control form-control-sm select-element"
                                                    name="kewarganegaraan" id="kewarganegaraan" readonly>
                                                    <option value="">Pilih Kewarganegaraan</option>
                                                    <option value="WNI Asli"
                                                        {{ $dataPendaftaran->kewarganegaraan == 'WNI Asli' ? 'selected' : '' }}>
                                                        WNI Asli</option>
                                                    <option value="WNI Keturunan"
                                                        {{ $dataPendaftaran->kewarganegaraan == 'WNI Keturunan' ? 'selected' : '' }}>
                                                        WNI Keturunan</option>
                                                    <option value="WNA"
                                                        {{ $dataPendaftaran->kewarganegaraan == 'WNA' ? 'selected' : '' }}>
                                                        WNA
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6" id="wna-detail-container" style="display: none">
                                        <div class="d-flex">
                                            <span class="me-2">&nbsp;</span>
                                            <!-- Menambahkan span kosong untuk kesejajaran -->
                                            <div class="flex-grow-1">
                                                <label class="form-label">Negara (WNA)</label>
                                                <input class="form-control" id="wna_detail" name="detail"
                                                    placeholder="Masukkan Negara WNA"
                                                    value="{{ $dataPendaftaran->detail }}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-12">
                                        <div class="d-flex">
                                            <span class="me-2">4.</span>
                                            <div class="flex-grow-1">
                                                <label class="form-label">Tanggal Lahir Sesuai Ijazah</label>
                                                <input class="form-control" id="tgl_lahir" name="tgl_lahir"
                                                    placeholder="Masukkan Detail Kewarganegaraan" type="date"
                                                    value="{{ $dataPendaftaran->tgl_lahir }}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-12 mb-1">
                                        <div class="d-flex">
                                            <span class="me-2">5.</span>
                                            <div class="flex-grow-1">
                                                <label class="form-label">Tempat Lahir Sesuai Ijazah</label>
                                                <input class="form-control" id="tempat_lahir" name="tempat_lahir"
                                                    placeholder="Masukkan Detail Kewarganegaraan"
                                                    value="{{ $dataPendaftaran->tempat_lahir }}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-12 col-md-4 mb-1">
                                        <div class="d-flex">
                                            <span class="me-3">&nbsp;</span>
                                            <div class="flex-grow-1">
                                                <label class="form-label">Provinsi</label>
                                                <select class="form-control form-control-sm select-element"
                                                    name="provinsi_lahir" id="provinsi2" readonly>
                                                    <option value="{{ $dataPendaftaran->provinsi_lahir }}">
                                                        {{ $dataPendaftaran->provinsi_lahir }}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 mb-2">
                                        <div class="d-flex">
                                            <span class="me-2">&nbsp;</span>
                                            <div class="flex-grow-1">
                                                <label class="form-label">Kabupaten</label>
                                                <select class="form-control form-control-sm select-element"
                                                    name="kabupaten_lahir" id="kabupaten2" readonly>
                                                    <option value="{{ $dataPendaftaran->kabupaten_lahir }}">
                                                        {{ $dataPendaftaran->kabupaten_lahir }}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 mb-2">
                                        <div class="d-flex">
                                            <span class="me-2">&nbsp;</span>
                                            <div class="flex-grow-1">
                                                <label class="form-label">Negara
                                                </label>
                                                <input class="form-control" id="negara" name="luar_negeri"
                                                    placeholder="Isi bila lahir diluar negeri"
                                                    value="{{ $dataPendaftaran->luar_negeri }}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-12">
                                        <div class="d-flex">
                                            <span class="me-2">6.</span>
                                            <div class="flex-grow-1">
                                                <label class="form-label">Jenis Kelamin</label>
                                                <select class="form-control form-control-sm select-element"
                                                    name="jenis_kelamin" id="jenis_kelamin" readonly>
                                                    <option value="">Pilih Jenis Kelamin</option>
                                                    <option value="Pria"
                                                        {{ $dataPendaftaran->jenis_kelamin == 'Pria' ? 'selected' : '' }}>
                                                        Pria
                                                    </option>
                                                    <option value="Wanita"
                                                        {{ $dataPendaftaran->jenis_kelamin == 'Wanita' ? 'selected' : '' }}>
                                                        Wanita</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-12">
                                        <div class="d-flex">
                                            <span class="me-2">7.</span>
                                            <div class="flex-grow-1">
                                                <label class="form-label">Status Menikah</label>
                                                <select class="form-control form-control-sm select-element"
                                                    name="ismenikah" id="ismenikah" readonly>
                                                    <option value="">Pilih Status</option>
                                                    <option value="Belum Menikah"
                                                        {{ $dataPendaftaran->ismenikah == 'Belum Menikah' ? 'selected' : '' }}>
                                                        Belum Menikah</option>
                                                    <option value="Menikah"
                                                        {{ $dataPendaftaran->ismenikah == 'Menikah' ? 'selected' : '' }}>
                                                        Menikah</option>
                                                    <option value="Lain-lain"
                                                        {{ $dataPendaftaran->ismenikah == 'Lain-lain' ? 'selected' : '' }}>
                                                        Lain-lain (janda/duda)</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-12">
                                        <div class="d-flex">
                                            <span class="me-2">8.</span>
                                            <div class="flex-grow-1">
                                                <label class="form-label">Agama</label>
                                                <select class="form-control form-control-sm select-element" name="agama"
                                                    id="agama" readonly>
                                                    <option value="{{ $dataPendaftaran->agama }}">
                                                        {{ $dataPendaftaran->agama }}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js-content')
    <script>
        function printDocument() {
            window.print();
        }
    </script>
@endsection
