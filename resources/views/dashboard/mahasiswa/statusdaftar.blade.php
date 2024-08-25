@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('subhead')
    <title>Aplikasi Pendaftaran Calon Mahasiswa</title>
@endsection

@section('subcontent')
    <div class="m-5 justify-items-center">
        <h1 class="text-2xl font-semibold mb-5 text-center">Detail Pendaftar</h1>
        <div id="printable-section">
            <!-- Menambahkan mx-auto untuk membuat gambar berada di tengah -->
            <img src="http://localhost:8000/{{ $user->file_img }}" class="rounded-md w-1/4 mx-auto">

            <!-- Kontainer utama dengan max width -->

            <div class="grid grid-cols-12 gap-4 mt-5 max-w-4xl text-lg">
                <div class="col-span-6 font-medium">
                    Nama
                </div>
                <div class="col-span-6">
                    {{ $user->name }}
                </div>

                <div class="col-span-6 font-medium">
                    Alamat KTP
                </div>
                <div class="col-span-6">
                    {{ $user->alamat_ktp }}
                </div>

                <div class="col-span-6 font-medium">
                    Alamat Saat Ini
                </div>
                <div class="col-span-6">
                    {{ $user->alamat_domisili }}
                </div>

                <div class="col-span-6 font-medium">
                    Kecamatan
                </div>
                <div class="col-span-6">
                    {{ $user->kecamatan }}
                </div>

                <div class="col-span-6 font-medium">
                    Kabupaten
                </div>
                <div class="col-span-6">
                    {{ $user->kabupaten_asal_nama }}
                </div>

                <div class="col-span-6 font-medium">
                    Provinsi
                </div>
                <div class="col-span-6">
                    {{ $user->provinsi_lahir_nama }}
                </div>

                <div class="col-span-6 font-medium">
                    Nomor Telepon
                </div>
                <div class="col-span-6">
                    {{ $user->notelp }}
                </div>

                <div class="col-span-6 font-medium">
                    Nomor HP
                </div>
                <div class="col-span-6">
                    {{ $user->nohp }}
                </div>

                <div class="col-span-6 font-medium">
                    Email
                </div>
                <div class="col-span-6">
                    {{ $user->email }}
                </div>

                <div class="col-span-6 font-medium">
                    Kewarnegaraan
                </div>
                <div class="col-span-6">
                    {{ $user->kewarnegaraan }}
                </div>

                @if ($user->kewarnegaraan == 'WNA')
                    <div class="col-span-6 font-medium">
                        Negara Kewarnegaraan
                    </div>
                    <div class="col-span-6">
                        {{ $user->kewarnegaraan_negara }}
                    </div>
                @endif

                <div class="col-span-6 font-medium">
                    Tanggal Lahir
                </div>
                <div class="col-span-6">
                    {{ $user->tgl_lahir }}
                </div>

                <div class="col-span-6 font-medium">
                    Tempat Lahir
                </div>
                <div class="col-span-6">
                    {{ $user->tempat_lahir }}
                </div>

                <div class="col-span-6 font-medium">
                    Kabupaten / Kota Lahir
                </div>
                <div class="col-span-6">
                    {{ $user->kabupaten_lahir_nama }}
                </div>

                <div class="col-span-6 font-medium">
                    Provinsi
                </div>
                <div class="col-span-6">
                    {{ $user->provinsi_lahir_nama }}
                </div>

                <div class="col-span-6 font-medium">
                    Negara
                </div>
                <div class="col-span-6">
                    {{ $user->negara }}
                </div>

                <div class="col-span-6 font-medium">
                    Jenis Kelamin
                </div>
                <div class="col-span-6">
                    {{ $user->jk }}
                </div>

                <div class="col-span-6 font-medium">
                    Status menikah
                </div>
                <div class="col-span-6">
                    {{ $user->menikah }}
                </div>

                <div class="col-span-6 font-medium">
                    Agama
                </div>
                <div class="col-span-6">
                    {{ $user->agama }}
                </div>
            </div>
        </div>
        <div class="flex flex-cols-12 justify-end max-w my-3 mx-1 w-full p-4 md:p-6">
            @if (auth()->user()->role == 'mahasiswa')
                <div class="grid grid-col-4 mx-1">
                    <x-base.button class=" mr-1 px-10 w-50" variant="primary" rounded data-tw-toggle="modal" as="a"
                        href="{{ route('mahasiswa.form') }}">
                        <x-base.lucide class="mr-2 h-4 w-4" icon="pencil" />
                        Ubah
                    </x-base.button>
                </div>
            @endif
            <div class="grid grid-col-4 mx-1">
                <x-base.button class=" mr-1 px-10 w-50" variant="primary" rounded data-tw-toggle="modal"
                    onclick="printDocument()">
                    <x-base.lucide class="mr-2 h-4 w-4" icon="printer" />
                    Print
                </x-base.button>
            </div>
        </div>
    </div>
    <script>
        function printDocument() {
            window.print();
        }
    </script>
@endsection
