<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- bootsrap --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>{{ config('app.name') }} :: Hasil Test</title>
</head>

<body>

    <h1 class="title-1 text-center">Hasil Seleksi</h1>

    <p class="text-center text-info">Seleksi 2022</p>

    <table class="table table-active">
        <thead>
            <tr>
                <th>Nomor</th>
                <th>Nomor Reg</th>
                <th>Nama</th>
                <th>Jurusan</th>
                <th>Status</th>
            </tr>

        </thead>
        <tbody>
            @php
                $no = 1;
                @endphp
            @foreach ($prints as $print)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $print->no_reg }}</td>
                <td>{{ $print->nama }}</td>
                <td>{{ $print->jurusan->nama_jurusan }}</td>
                <td>
                    @if ($print->lulus == 1)
                        <p class="badge badge-success">Lulus</p>
                    @elseif ($print->lulus == 0)
                    <p class="badge badge-danger">Tidak</p>
                    @else
                    <p class="badge badge-warning">Belum Diseleksi</p>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
