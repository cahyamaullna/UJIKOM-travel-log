@extends('layouts.master')
@section('content')
                <div class="container-fluid">

                    <!-- Page Heading -->
                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                   
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Perjalanan</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">

                            <a href="{{ route('note.create')}}"> <button class="btn btn-primary" >tambah</button></a>
                            <br>
                            <br>
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Waktu</th>
                                            <th>Lokasi</th>
                                            <th>suhu Tubuh</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($notes as $note)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $note->date }}</td>
                                            <td>{{ $note->time }}</td>
                                            <td>{{ $note->note }}</td>
                                            <td>{{ $note->suhu }}</td>
                                            <td>
                                            <form action="{{ route('note.destroy',$note->id) }}" method="POST">
                                                
                                                <a class="btn btn-warning" href="{{ route('note.edit',$note->id) }}">Edit</a>
                                
                                                @csrf
                                                @method('DELETE')
                                    
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                            </td>
                                        </tr>
                                    </tbody>
                                @endforeach
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
@endsection