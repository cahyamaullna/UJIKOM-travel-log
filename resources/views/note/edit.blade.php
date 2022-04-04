@extends('layouts.master')
  
@section('content') 
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        
    <div class="card-body">
                         <form action="{{ route('note.update', $note->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                         <div class="mb-3">
                                <label class="form-label">Tanggal</label>
                                <input type="date" class="form-control" name="date" value="{{$note->date}}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Jam</label>
                                <input type="time" class="form-control" name="time" value="{{$note->time}}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Lokasi yang dikunjungi</label>
                                <input type="text" class="form-control" name="note" value="{{$note->note}}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Suhu Tubuh</label>
                                <input type="number" class="form-control" name="suhu" value="{{$note->suhu}}">
                            </div>
                            <a class="btn btn-info" href="{{ route('note.index') }}">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                         </div>
                        </form>
@endsection