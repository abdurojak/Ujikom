@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('subhead')
    <title>Aplikasi Pendaftaran Calon Mahasiswa</title>
@endsection

@section('subcontent')
    <div class="m-5">
        <h1 class="text-xl font-semibold mb-5">Data Pendaftar</h1>
        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Kewarnegaraan</th>
                    <th>Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Status Menikah</th>
                    <th>Agama</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->kewarnegaraan }}</td>
                        <td>{{ $user->tgl_lahir }}</td>
                        <td>{{ $user->jk }}</td>
                        <td>{{ $user->menikah }}</td>
                        <td>{{ $user->agama }}</td>
                        <td>
                            <div>
                                <x-base.button class="bg-lime-800 text-white" as="a"
                                    href="{{ route('pendaftar.data', ['id' => $user->id]) }}"> <x-base.lucide class="h-4 w-4"
                                        icon="eye" /></x-base.button>
                                <x-base.button variant="primary" as="a"
                                    href="{{ route('edit.data', ['id' => $user->id]) }}"> <x-base.lucide class="h-4 w-4"
                                        icon="pencil" /></x-base.button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Nama</th>
                    <th>Kewarnegaraan</th>
                    <th>Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Status Menikah</th>
                    <th>Agama</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <script>
        $('#example').DataTable({
            dom: 'Bfrtip',
            buttons: [{
                extend: 'excelHtml5',
                text: 'Export Excel',
                className: 'bg-green-500 text-white rounded px-4 py-2 mb-5' // Menggunakan kelas Tailwind
            }],
            initComplete: function(settings, json) {
                $('.dataTables_filter input').addClass(
                    'ml-4 p-2 border border-gray-300 rounded bg-white text-black');
                $('.dataTables_paginate .paginate_button').addClass(
                    'bg-white text-black border border-gray-300 rounded hover:bg-gray-200');
            }
        });
    </script>
@endsection
