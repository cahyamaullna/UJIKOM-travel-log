@extends('layouts.master')
@section('content')
                    <div class="card shadow mb-4">
                   
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tambah Data</h6>
                        </div>
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
                         <form action="{{ route('note.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                         <div class="mb-3">
                                <label class="form-label">Tanggal</label>
                                <input type="date" class="form-control" name="date">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Jam</label>
                                <input type="time" class="form-control" name="time">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Lokasi yang dikunjungi</label>
                                <input type="text" class="form-control" name="note">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Suhu Tubuh</label>
                                <input type="number" class="form-control" name="suhu">
                            </div>
                            <a class="btn btn-info" href="{{ route('note.index') }}">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                         </div>
                    </div>
@endsection