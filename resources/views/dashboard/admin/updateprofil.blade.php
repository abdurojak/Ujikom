@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('subhead')
    <title>Aplikasi Pendaftaran Calon Mahasiswa</title>
@endsection

@section('subcontent')
    <form action="{{ route('save.akun') }}" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{ $users->id ?? '' }}" />
        <div class="grid grid-cols-12 max-w my-3 w-full relative  bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
            <div class="col-span-6">
                <span class="font-semibold">Nama Lengkap</span>
            </div>
            <div class="col-span-6">
                <span class="font-semibold">Nomor HP</span>
            </div>
            <div class="col-span-6 mr-2">
                <x-base.form-input class="!box w-full pr-10" type="text" placeholder="Nama Lengkap" name="name"
                    value="{{ $users->name ?? '' }}" />
            </div>
            <div class="col-span-6">
                <x-base.form-input class="!box w-full pr-10" type="number" placeholder="Nomor HP" name="nohp"
                    value="{{ $users->nohp ?? '' }}" />
            </div>

            <div class="col-span-6 mt-5">
                <span class="font-semibold">Alamat Email</span>
            </div>
            <div class="col-span-6 mt-5">
                <span class="font-semibold">Password</span>
            </div>
            <div class="col-span-6 mr-2">
                <x-base.form-input class="!box w-full pr-10" type="email" placeholder="Nama Lengkap" name="email"
                    value="{{ $users->email ?? ' ' }} " />
            </div>
            <div class="col-span-6">
                <x-base.form-input class="!box w-full pr-10" type="password" placeholder="Nomor HP" name="password" />
            </div>
        </div>
        <div class="flex flex-cols-12 justify-end max-w my-3 mx-1 w-full p-4 md:p-6">
            <div class="grid grid-col-4 mx-1">
                <x-base.button class="mb-2 mr-1 px-10 w-50" variant="primary" rounded data-tw-toggle="modal" type="submit">
                    <x-base.lucide class="mr-2 h-4 w-4" icon="save" />
                    Simpan
                </x-base.button>
            </div>
        </div>
    </form>
@endsection
