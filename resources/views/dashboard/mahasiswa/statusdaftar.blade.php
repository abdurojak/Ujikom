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
                <div class="col-span-7 font-semibold">
                    1. Nama
                    <span class="font-normal text-slate-600">
                        (Sesuai Ijasah Disertai Gelar)
                    </span>
                </div>
                <div class="col-span-5">
                    {{ $user->name }}
                </div>

                <div class="col-span-7 font-semibold">
                    2. Alamat KTP
                </div>
                <div class="col-span-5">
                    {{ $user->alamat_ktp }}
                </div>

                <div class="col-span-7 font-medium ml-10">
                    Alamat Saat Ini
                </div>
                <div class="col-span-5">
                    {{ $user->alamat_domisili }}
                </div>

                <div class="col-span-7 font-medium ml-10">
                    Kecamatan
                </div>
                <div class="col-span-5">
                    {{ $user->kecamatan }}
                </div>

                <div class="col-span-7 font-medium ml-10">
                    Kabupaten
                </div>
                <div class="col-span-5">
                    {{ $user->kabupaten_asal_nama }}
                </div>

                <div class="col-span-7 font-medium ml-10">
                    Provinsi
                </div>
                <div class="col-span-5">
                    {{ $user->provinsi_asal_nama }}
                </div>

                <div class="col-span-7 font-medium ml-10">
                    Nomor Telepon
                </div>
                <div class="col-span-5">
                    {{ $user->notelp }}
                </div>

                <div class="col-span-7 font-medium ml-10">
                    Nomor HP
                </div>
                <div class="col-span-5">
                    {{ $user->nohp }}
                </div>

                <div class="col-span-7 font-medium ml-10">
                    Email
                </div>
                <div class="col-span-5">
                    {{ $user->email }}
                </div>

                <div class="col-span-7 font-semibold">
                    3. Kewarnegaraan
                </div>
                <div class="col-span-5">
                    {{ $user->kewarnegaraan }}
                </div>

                @if ($user->kewarnegaraan == 'WNA')
                    <div class="col-span-7 font-medium ml-10">
                        Negara Kewarnegaraan
                    </div>
                    <div class="col-span-5">
                        {{ $user->kewarnegaraan_negara }}
                    </div>
                @endif

                <div class="col-span-7 font-semibold">
                    4. Tanggal Lahir
                    <span class="font-normal text-slate-600">
                        (Sesuai Ijasah)
                    </span>
                </div>
                <div class="col-span-5">
                    {{ $user->tgl_lahir }}
                </div>

                <div class="col-span-7 font-semibold">
                    5. Tempat Lahir
                    <span class="font-normal text-slate-600">
                        (Sesuai Ijasah)
                    </span>
                </div>
                <div class="col-span-5">
                    {{ $user->tempat_lahir }}
                </div>

                <div class="col-span-7 font-medium ml-10">
                    Kabupaten / Kota Lahir
                </div>
                <div class="col-span-5">
                    {{ $user->kabupaten_lahir_nama }}
                </div>

                <div class="col-span-7 font-medium ml-10">
                    Provinsi
                </div>
                <div class="col-span-5">
                    {{ $user->provinsi_lahir_nama }}
                </div>

                <div class="col-span-7 font-medium ml-10">
                    Negara
                </div>
                <div class="col-span-5">
                    {{ $user->negara }}
                </div>

                <div class="col-span-7 font-semibold">
                    6. Jenis Kelamin
                </div>
                <div class="col-span-5">
                    {{ $user->jk }}
                </div>

                <div class="col-span-7 font-semibold">
                    7. Status menikah
                </div>
                <div class="col-span-5">
                    {{ $user->menikah }}
                </div>

                <div class="col-span-7 font-semibold">
                    8. Agama
                </div>
                <div class="col-span-5">
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
