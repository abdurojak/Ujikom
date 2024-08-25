@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('subhead')
    <title>Aplikasi Pendaftaran Calon Mahasiswa</title>
@endsection

@section('subcontent')
    <div class="mt-8 grid grid-cols-12 gap-6">
        @isset($user)
        @else
            @php
                $user = auth()->user();
            @endphp
        @endisset
        <div class="col-span-12">
            @if (auth()->user()->role == 'mahasiswa')
                <form method="POST" action="{{ route('pendaftaran') }}" enctype="multipart/form-data">
                @else
                    <form method="POST" action="{{ route('edit-mhsw') }}" enctype="multipart/form-data">
            @endif
            @csrf

            <input type="hidden" name="id" value="{{ $user->id ?? '' }}" />
            <div
                class="grid grid-cols-12 max-w my-3 w-full relative  bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
                <div class="col-span-4">
                    <span class="font-semibold">1. Nama Lengkap</span><br>
                    <span class="text-gray-500">
                        (sesuai ijasah disertai gelar)
                    </span>
                </div>
                <div class="col-span-8">
                    <x-base.form-input class="!box w-full pr-10" type="text" required
                        placeholder="Nama Lengkap Calon Mahasiswa" name="name" value="{{ $user->name }}" />
                </div>
            </div>
            <div
                class="grid grid-cols-12 max-w my-3 w-full relative bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
                <div class="col-span-12 grid grid-cols-12 items-center mb-1">
                    <div class="col-span-4">
                        <span class="font-semibold">2. Alamat KTP</span>
                    </div>
                    <div class="col-span-8">
                        <x-base.form-textarea class="!box w-full pr-10" type="text" placeholder="Alamat Sesuai KTP"
                            required name="alamat_ktp">{{ $user->alamat_ktp }}
                        </x-base.form-textarea>
                    </div>
                </div>
                <div class="col-span-12 grid grid-cols-12 items-center mb-1">
                    <div class="col-span-4 pl-4">
                        <span>Alamat Saat Ini</span>
                    </div>
                    <div class="col-span-8">
                        <x-base.form-textarea class="!box w-full pr-10" type="text" placeholder="Alamat Saat Ini"
                            required name="alamat_domisili">
                            {{ $user->alamat_domisili }}
                        </x-base.form-textarea>
                    </div>
                </div>
                <div class="col-span-12 grid grid-cols-12 items-center mb-1">
                    <div class="col-span-4 pl-4">
                        <span>Provinsi</span>
                    </div>
                    <div class="col-span-8">
                        <x-base.form-select class="w-full" id="provinsi" name="provinsi" required>
                            <option value="">-- Pilih Provinsi --</option>
                            @foreach ($provinsi as $provinsi_tinggal)
                                <option value="{{ $provinsi_tinggal->id }}">{{ $provinsi_tinggal->nama_provinsi }}
                                </option>
                            @endforeach
                        </x-base.form-select>
                    </div>
                </div>
                <div class="col-span-12 grid grid-cols-12 items-center mb-1">
                    <div class="col-span-4 pl-4">
                        <span>Kabupaten / Kota</span>
                    </div>
                    <div class="col-span-8">
                        <x-base.form-select class="w-full" id="kabupaten_kota" name="kabupaten_kota" required>
                            <option value="">-- Pilih Kabupaten/Kota --</option>
                        </x-base.form-select>
                    </div>
                </div>
                <div class="col-span-12 grid grid-cols-12 items-center mb-1">
                    <div class="col-span-4 pl-4">
                        <span>Kecamatan</span>
                    </div>
                    <div class="col-span-8">
                        <x-base.form-input class="!box w-full pr-10" type="text" placeholder="Kecamatan" required
                            name="kecamatan" value="{{ $user->kecamatan }}" />
                    </div>
                </div>
                <div class="col-span-12 grid grid-cols-12 items-center mb-1">
                    <div class="col-span-4 pl-4">
                        <span>Nomor Telepon</span>
                    </div>
                    <div class="col-span-8">
                        <x-base.form-input class="!box w-full pr-10" type="number" placeholder="Nomor Telepon" required
                            name="notelp" value="{{ $user->notelp }}" />
                    </div>
                </div>
                <div class="col-span-12 grid grid-cols-12 items-center mb-1">
                    <div class="col-span-4 pl-4">
                        <span>Nomor HP</span>
                    </div>
                    <div class="col-span-8">
                        <x-base.form-input class="!box w-full pr-10" type="number" placeholder="Nomor HP" required
                            name="nohp" value="{{ $user->nohp }}" />
                    </div>
                </div>
                <div class="col-span-12 grid grid-cols-12 items-center mb-1">
                    <div class="col-span-4 pl-4">
                        <span>Email</span>
                    </div>
                    <div class="col-span-8">
                        <x-base.form-input class="!box w-full pr-10" type="email" placeholder="Email" name="email"
                            required value="{{ $user->email }}" />
                    </div>
                </div>
            </div>
            <div
                class="grid grid-cols-12 max-w my-3 w-full relative  bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
                <div class="col-span-12 grid grid-cols-12 items-center mb-1">
                    <div class="col-span-4">
                        <span class="font-semibold">3. Kewarnegaraan</span>
                    </div>
                    <div class="col-span-8">
                        <input id="wni-radio" type="radio" value="WNI" name="kewarnegaraan"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="wni-radio"
                            class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300 mr-2">WNI</label>

                        <input id="wni-ket-radio" type="radio" value="WNI-Keturunan" name="kewarnegaraan"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="wni-radio" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300 mr-2">WNI
                            Keturunan</label>

                        <input id="wna-radio" type="radio" value="WNA" name="kewarnegaraan"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="wna-radio"
                            class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">WNA</label>
                    </div>
                </div>
                <div class="col-span-12 grid grid-cols-12 items-center mb-1">
                    <div class="col-span-4 pl-4">
                        <span>Negara</span>
                    </div>
                    <div class="col-span-8">
                        <x-base.form-input id="negara-input" class="!box w-full pr-10" type="text"
                            placeholder="Masukan Negara Asal" name="kewarnegaraan_negara"
                            value="{{ $user->kewarnegaraan_negara }}" />
                    </div>
                </div>
            </div>
            <div
                class="grid grid-cols-12 max-w my-3 w-full relative  bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
                <div class="col-span-12 grid grid-cols-12 items-center mb-1">
                    <div class="col-span-4">
                        <span class="font-semibold">4. Tanggal Lahir</span>
                        <span class="text-gray-500">
                            (sesuai ijasah)
                        </span>
                    </div>
                    <div class="col-span-8">
                        <x-base.litepicker class="mx-auto block w-full" data-single-mode="true" name="tgl_lahir"
                            value="{{ $user->tgl_lahir }}" required />
                    </div>
                </div>
            </div>
            <div
                class="grid grid-cols-12 max-w my-3 w-full relative  bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
                <div class="col-span-12 grid grid-cols-12 items-center mb-1">
                    <div class="col-span-4">
                        <span class="font-semibold">5. Tempat Lahir</span>
                        <span class="text-gray-500">
                            (sesuai ijasah)
                        </span>
                    </div>
                    <div class="col-span-8">
                        <input id="dn-radio" type="radio" value="Dalam Negeri" name="tempat_lahir"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="wni-radio" required
                            class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300 mr-2">Dalam Negeri</label>

                        <input id="ln-radio" type="radio" value="Luar Negeri" name="tempat_lahir"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="wna-radio" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Luar
                            Negeri</label>
                    </div>
                </div>
                <div class="col-span-12 grid grid-cols-12 items-center mb-1">
                    <div class="col-span-4 pl-4">
                        <span>Provinsi</span>
                    </div>
                    <div class="col-span-8">
                        <x-base.form-select class="w-full" id="provinsi_lahir" name="id_provinsi_lahir">
                            <option value="">-- Pilih Provinsi --</option>
                            @foreach ($provinsi as $provinsi_lahir)
                                <option value="{{ $provinsi_lahir->id }}">{{ $provinsi_lahir->nama_provinsi }}
                                </option>
                            @endforeach
                        </x-base.form-select>
                    </div>
                </div>
                <div class="col-span-12 grid grid-cols-12 items-center mb-1">
                    <div class="col-span-4 pl-4">
                        <span>Kabupaten / Kota</span>
                    </div>
                    <div class="col-span-8">
                        <x-base.form-select class="w-full" id="kabupaten_kota_lahir" name="id_kotkab_lahir">
                            <option value="">-- Pilih Kabupaten/Kota --</option>
                        </x-base.form-select>
                    </div>
                </div>
                <div class="col-span-12 grid grid-cols-12 items-center mb-1">
                    <div class="col-span-4 pl-4">
                        <span>Negara</span>
                    </div>
                    <div class="col-span-8">
                        <x-base.form-input class="!box w-full pr-10" type="text" placeholder="Negara" required
                            id="negara_lahir" name="negara" value="{{ $user->negara }}" />
                    </div>
                </div>
            </div>
            <div
                class="grid grid-cols-12 max-w my-3 w-full relative  bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
                <div class="col-span-12 grid grid-cols-12 items-center mb-1">
                    <div class="col-span-4">
                        <span class="font-semibold">6. Jenis Kelamin</span>
                    </div>
                    <div class="col-span-8">
                        <input id="pria" type="radio" value="pria" name="jk" required
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="wni-radio"
                            class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300 mr-2">Pria</label>

                        <input id="wanita" type="radio" value="wanita" name="jk" required
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="wna-radio"
                            class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Wanita</label>
                    </div>
                </div>
            </div>
            <div
                class="grid grid-cols-12 max-w my-3 w-full relative  bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
                <div class="col-span-12 grid grid-cols-12 items-center mb-1">
                    <div class="col-span-4">
                        <span class="font-semibold">7. Status Menikah</span>
                    </div>
                    <div class="col-span-8">
                        <input id="belum-menikah" type="radio" value="belum" name="menikah"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="wni-radio" required
                            class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300 mr-2">Belum
                            Menikah</label>
                        <input id="menikah" type="radio" value="menikah" name="menikah" required
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="wna-radio"
                            class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300 mr-2">Menikah</label>

                        <input id="janda-duda" type="radio" value="lainnya" name="menikah" required
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="wna-radio" required
                            class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Lain-lain
                            <span class="text-gray-500">
                                (janda/duda)
                            </span>
                        </label>
                    </div>
                </div>
            </div>
            <div
                class="grid grid-cols-12 max-w my-3 w-full relative  bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
                <div class="col-span-12 grid grid-cols-12 items-center mb-1">
                    <div class="col-span-4">
                        <span class="font-semibold">8. Agama</span>
                    </div>
                    <div class="col-span-8">
                        <x-base.form-select class="w-full" id="agama" name="id_agama" required>
                            <option value="">-- Pilih Agama --</option>
                            @foreach ($agama as $agama)
                                <option value="{{ $agama->id }}">{{ $agama->agama }}
                                </option>
                            @endforeach
                        </x-base.form-select>
                    </div>
                </div>
            </div>
            <div
                class="grid grid-cols-12 max-w my-3 w-full relative  bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
                <div class="col-span-12 grid grid-cols-12 items-center mb-1">
                    <div class="col-span-4">
                        <span class="font-semibold">Foto Ukuran 3x4</span>
                    </div>
                    <div class="col-span-8">
                        <input
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            aria-describedby="file_input_help" id="file_input" type="file" name="file_img">
                    </div>
                </div>
            </div>
            <div class="flex flex-cols-12 justify-end max-w my-3 mx-1 w-full p-4 md:p-6">
                <div class="grid grid-col-4 mx-1">
                    <x-base.button class="mb-2 mr-1 px-10 w-50" variant="primary" rounded data-tw-toggle="modal"
                        type="submit">
                        <x-base.lucide class="mr-2 h-4 w-4" icon="save" />
                        Simpan
                    </x-base.button>
                </div>
            </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        function handleChangeProvinsi(provinsiID, isfromcontroller = false, kabKotID = '') {
            console.log(provinsiID, 'provinsiID')
            if (provinsiID) {
                jQuery.ajax({
                    url: 'http://localhost:8000/get-kabkot/' + provinsiID, // Pastikan URL ini benar
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        jQuery('#kabupaten_kota').empty();
                        jQuery('#kabupaten_kota').append(
                            '<option value="">-- Pilih Kabupaten/Kota --</option>');
                        jQuery.each(data, function(key, value) {
                            let isselect = ''
                            if (kabKotID == value.id) {
                                isselect = 'selected'
                            }
                            jQuery('#kabupaten_kota').append('<option ' + isselect + '  value="' +
                                value.id + '">' + value.nama_kabupaten_kota +
                                '</option>');
                        });
                    }
                });
            } else {
                jQuery('#kabupaten_kota').empty();
                jQuery('#kabupaten_kota').append(
                    '<option value="">-- Pilih Kabupaten/Kota --</option>');
            }

            if (isfromcontroller) {
                $("#provinsi").val(provinsiID)
                $("#kabupaten_kota").val(kabKotID)
                console.log(kabKotID, 'hai')
            }
        }

        function handleChangeAgama(agamaID, isfromcontroller = false) {
            if (isfromcontroller) {
                $("#agama").val(agamaID)
            }
        }

        function handleChangeProvinsiLahir(provinsiID, isfromcontroller = false, kabKotID = '') {
            console.log(provinsiID, 'provinsiID')
            if (provinsiID) {
                jQuery.ajax({
                    url: 'http://localhost:8000/get-kabkot/' + provinsiID, // Pastikan URL ini benar
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        jQuery('#kabupaten_kota_lahir').empty();
                        jQuery('#kabupaten_kota_lahir').append(
                            '<option value="">-- Pilih Kabupaten/Kota --</option>');
                        jQuery.each(data, function(key, value) {
                            let isselect = ''
                            if (kabKotID == value.id) {
                                isselect = 'selected'
                            }
                            jQuery('#kabupaten_kota_lahir').append('<option ' + isselect + '  value="' +
                                value.id + '">' + value.nama_kabupaten_kota +
                                '</option>');
                        });
                    }
                });
            } else {
                jQuery('#kabupaten_kota_lahir').empty();
                jQuery('#kabupaten_kota_lahir').append(
                    '<option value="">-- Pilih Kabupaten/Kota --</option>');
            }

            if (isfromcontroller) {
                $("#provinsi_lahir").val(provinsiID)
                $("#kabupaten_kota_lahir").val(kabKotID)
                console.log(kabKotID, 'hai')
            }
        }
        jQuery(document).ready(function() {
            jQuery('#provinsi').on('change', function() {
                var provinsiID = jQuery(this).val();
                handleChangeProvinsi(provinsiID)
            });

            jQuery('#provinsi_lahir').on('change', function() {
                var provinsiID = jQuery(this).val();
                handleChangeProvinsiLahir(provinsiID)
            });

            handleChangeProvinsi('{{ $user->id_provinsi }}', true, '{{ $user->id_kotkab }}')
            handleChangeProvinsiLahir('{{ $user->id_provinsi_lahir }}', true,
                '{{ $user->id_kotkab_lahir }}')
            handleChangeAgama('{{ $user->id_agama }}', true)
        });

        // JavaScript to handle the change event
        document.addEventListener('DOMContentLoaded', function() {
            const wniRadio = document.getElementById('wni-radio');
            const wniketRadio = document.getElementById('wni-ket-radio');
            const wnaRadio = document.getElementById('wna-radio');
            const negaraInput = document.getElementById('negara-input');
            const dnRadio = document.getElementById('dn-radio');
            const lnRadio = document.getElementById('ln-radio');
            const negara_lahir = document.getElementById('negara_lahir');
            const provinsi = document.getElementById('provinsi_lahir');
            const kabkot = document.getElementById('kabupaten_kota_lahir');
            const pria = document.getElementById('pria');
            const wanita = document.getElementById('wanita');
            const blom = document.getElementById('belum-menikah');
            const nikah = document.getElementById('menikah');
            const jadud = document.getElementById('janda-duda');


            // When WNI is selected
            wniRadio.addEventListener('change', function() {
                if (this.checked) {
                    negaraInput.value = 'Indonesia'; // Set country to Indonesia
                }
            });

            // When WNI Ket is selected
            wniketRadio.addEventListener('change', function() {
                if (this.checked) {
                    negaraInput.value = 'Indonesia'; // Set country to Indonesia
                }
            });

            // When WNA is selected
            wnaRadio.addEventListener('change', function() {
                if (this.checked) {
                    negaraInput.value = ''; // Clear country when WNA is selected
                }
            });

            // When WNI is selected
            dnRadio.addEventListener('change', function() {
                if (this.checked) {
                    negara_lahir.value = 'Indonesia'; // Set country to Indonesia
                    kabkot.disabled = false;
                    provinsi.disabled = false;
                }
            });

            // When WNA is selected
            lnRadio.addEventListener('change', function() {
                if (this.checked) {
                    negara_lahir.value = ''; // Clear country when WNA is selected
                    kabkot.disabled = true;
                    provinsi.disabled = true;
                    kabkot.value = "";
                    provinsi.value = "";
                }
            });

            if ('{{ $user->kewarnegaraan }}' == 'WNI') {
                wniRadio.checked = true
            } else if ('{{ $user->kewarnegaraan }}' == 'WNA') {
                wnaRadio.checked = true
            } else {
                wniketRadio.checked = true
            }

            if ('{{ $user->tempat_lahir }}' == 'Dalam Negeri') {
                dnRadio.checked = true
            } else {
                lnRadio.checked = true
            }

            if ('{{ $user->jk }}' == 'pria') {
                pria.checked = true
            } else {
                wanita.checked = true
            }

            if ('{{ $user->menikah }}' == 'belum') {
                blom.checked = true
            } else if ('{{ $user->menikah }}' == 'menikah') {
                nikah.checked = true
            } else {
                jadud.checked = true
            }

        });
    </script>
@endsection
