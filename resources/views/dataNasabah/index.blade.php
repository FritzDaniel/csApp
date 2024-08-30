@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border border-info-subtle">
                <div class="card-header">{{ __('Tambah Nasabah') }}</div>

                <div class="card-body border border-info-subtle">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-bordered table-striped table-dark">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Nasabah</th>
                            <th scope="col">Status</th>
                            <th scope="col">Tanggal dibuat</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @if($data->isEmpty())
                                <tr>
                                    <td>No Data</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            @else
                                @foreach($data as $key => $dt)
                                    <tr>
                                        <td>{{ $key+1 }}.</td>
                                        <td>{{ $dt->nama }}</td>
                                        <td>
                                            @if($dt->status == 0) 
                                                <span class="badge text-bg-primary">Menunggu Approval</span>
                                            @elseif($dt->status == 1) 
                                                <span class="badge text-bg-success">Disetujui</span>
                                            @else 
                                                <span class="badge text-bg-danger">Ditolak</span>
                                            @endif
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($dt->created_at)->format('d-m-Y H:i:s') }}</td>
                                        <td>
                                            <a href="{{ route('detailNasabah', $dt->id) }}" class="btn btn-sm btn-info">Lihat Data</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
