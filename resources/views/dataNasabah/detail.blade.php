@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border border-info-subtle">
                <div class="card-header">{{ __('Detail Nasabah') }}</div>

                <div class="card-body border border-info-subtle">
                   
                    <h4>{{ $data->nama }}</h4>
                    <p>Tempat lahir: {{ $data->tempat_lahir }}</p>
                    <p>Tanggal lahir: {{ \Carbon\Carbon::parse($data->tanggal)->format('d-m-Y H:i:s') }}</p>
                    <p>Jenis kelamin: {{ $data->jenis_kelamin }}</p>
                    <p>Pekerjaan: {{ $data->pekerjaan }}</p>
                    <p>Alamat Tinggal: {{ $data->nama_jalan }}, {{ $data->Provinsi->provinsi }}, {{ $data->Kota->kota }}, {{ $data->Kecamatan->kecamatan }}, {{ $data->Kelurahan->kelurahan }}, RT {{ $data->rt }}, RW {{ $data->rw }}</p>
                    <p>Nominal setor: Rp. {{ number_format($data->nominal_setor) }}/-</p>
                    <p>
                        Status: 
                        @if($data->status == 0) 
                            <span class="badge text-bg-primary">Menunggu Approval</span>
                        @elseif($data->status == 1) 
                            <span class="badge text-bg-success">Disetujui</span>
                        @else 
                            <span class="badge text-bg-danger">Ditolak</span>
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
