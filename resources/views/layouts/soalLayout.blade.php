@forelse($soal as $value => $item)
    <p>No {{ $value + 1 }}. {{ $item->soal }}</p>
    <input type="hidden" name="no[{{ $value+1 }}]" value="{{ $item->id }}">
    @php
        $jawaban = $item->pilihan_jawaban;
        $pilihanJawaban = explode("," , $jawaban);
        shuffle($pilihanJawaban);
    @endphp
    @foreach($pilihanJawaban as $i)
        <input type="radio" id="{{ $i }}" name="jawaban[{{ $value+1 }}]" value="{{ $i }}">
        <label for="{{ $i }}">{{ $i }}</label><br>
    @endforeach
@empty
    <h1>Soal Belum Ada</h1>
@endforelse