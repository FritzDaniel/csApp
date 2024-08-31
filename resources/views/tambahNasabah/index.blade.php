@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <h4>There were some problems with your input!</h4>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </div>
            @endif

            <div class="card border border-info-subtle">
                <div class="card-header">{{ __('Tambah Nasabah') }}</div>

                <div class="card-body border border-info-subtle">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('storeNasabah') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="nama" value="{{ old('nama') }}" placeholder="Nama lengkap">
                            @if ($errors->has('nama'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nama') }}</strong>
                                </span>
                            @endif
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Tempat Lahir</label>
                            <input type="text" class="form-control" name="tempat_lahir" value="{{ old('tempat_lahir') }}" placeholder="Tempat Lahir">
                            @if ($errors->has('tempat_lahir'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('tempat_lahir') }}</strong>
                                </span>
                            @endif
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" placeholder="Tanggal Lahir">
                            @if ($errors->has('tanggal_lahir'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('tanggal_lahir') }}</strong>
                                </span>
                            @endif
                        </div>    
                        <br>
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <br>
                            <div class="p-2">
                                <input type="radio" name="jenis_kelamin" value="laki-laki" checked> Laki-Laki
                            </div>
                            <div class="p-2">
                                <input type="radio" name="jenis_kelamin" value="wanita"> Wanita
                            </div>
                        </div>    
                        <br>
                        <div class="form-group">
                            <label>Pekerjaan</label>
                            <input type="text" class="form-control" name="pekerjaan" value="{{ old('pekerjaan') }}" placeholder="Pekerjaan">
                            @if ($errors->has('pekerjaan'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('pekerjaan') }}</strong>
                                </span>
                            @endif
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Alamat Lengkap</label>
                            <br> <br>
                            <label>Provinsi</label>
                            <select name="provinsi" id="provinsi" class="form-control" onchange="getKota()" required>
                                <option value="">Pilih Provinsi</option>
                                @if(!$provinsi->isEmpty())
                                    @foreach ($provinsi as $item)
                                        <option value="{{ $item->id }}">{{ $item->provinsi }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Kota</label>
                            <select name="kota" id="kota" class="form-control" onchange="getKecamatan()" disabled required>
                                <option value="">Pilih Kota</option>
                                @if(!$kota->isEmpty())
                                    @foreach ($kota as $item)
                                        <option value="{{ $item->id }}">{{ $item->kota }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Kecamatan</label>
                            <select name="kecamatan" id="kecamatan" onchange="getKelurahan()" class="form-control" disabled required>
                                <option value="">Pilih Kecamatan</option>
                            </select>
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Kelurahan</label>
                            <select name="kelurahan" id="kelurahan" class="form-control" disabled required>
                                <option value="">Pilih Kelurahan</option>
                            </select>
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Nama Jalan</label>
                            <input type="text" class="form-control" name="nama_jalan" value="{{ old('nama_jalan') }}" placeholder="Nama Jalan">
                            @if ($errors->has('nama_jalan'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nama_jalan') }}</strong>
                                </span>
                            @endif
                        </div>
                        <br>
                        <div class="form-group">
                            <label>RT</label>
                            <input type="text" class="form-control" name="rt" value="{{ old('rt') }}" placeholder="RT">
                            @if ($errors->has('rt'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('rt') }}</strong>
                                </span>
                            @endif
                        </div>
                        <br>
                        <div class="form-group">
                            <label>RW</label>
                            <input type="text" class="form-control" name="rw" value="{{ old('rw') }}" placeholder="RW">
                            @if ($errors->has('rw'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('rw') }}</strong>
                                </span>
                            @endif
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Nominal Setor</label>
                            <input type="number" class="form-control" name="nominal_setor" value="{{ old('nominal_setor') }}" placeholder="Nominal Setor">
                            @if ($errors->has('nominal_setor'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nominal_setor') }}</strong>
                                </span>
                            @endif
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="submit" value="Save" class="btn btn-md btn-success">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('script')
    <script>
        const API_BASE_URL = "http://localhost:8000/api";

        function getKota() {
            const provinsiId = document.getElementById("provinsi").value;
            const kotaDropdown = document.getElementById("kota");

            kotaDropdown.innerHTML = '<option value="">Pilih Kota</option>';
            document.getElementById("kecamatan").innerHTML = '<option value="">Pilih Kecamatan</option>';
            document.getElementById("kelurahan").innerHTML = '<option value="">Pilih Kelurahan</option>';

            if (provinsiId) {
                fetch(`${API_BASE_URL}/kota/get/${provinsiId}`)
                    .then(response => response.json())
                    .then(data => {
                        JSON.stringify(data);
                        kotaDropdown.disabled = false;
                        data.data.forEach(kota => {
                            let option = document.createElement("option");
                            option.value = kota.id;
                            option.text = kota.kota;
                            kotaDropdown.add(option);
                        });
                    })
                    .catch(error => console.error("Error:", error));
            } else {
                kotaDropdown.disabled = true;
                document.getElementById("kecamatan").disabled = true;
                document.getElementById("kelurahan").disabled = true;
            }
        }

        function getKecamatan() {
            const kotaId = document.getElementById("kota").value;
            const kecamatanDropdown = document.getElementById("kecamatan");

            kecamatanDropdown.innerHTML = '<option value="">Pilih Kecamatan</option>';
            document.getElementById("kelurahan").innerHTML = '<option value="">Pilih Kelurahan</option>';

            if (kotaId) {
                fetch(`${API_BASE_URL}/kecamatan/get/${kotaId}`)
                    .then(response => response.json())
                    .then(data => {
                        JSON.stringify(data);
                        kecamatanDropdown.disabled = false;
                        data.data.forEach(kecamatan => {
                            let option = document.createElement("option");
                            option.value = kecamatan.id;
                            option.text = kecamatan.kecamatan;
                            kecamatanDropdown.add(option);
                        });
                    })
                    .catch(error => console.error('Error:', error));
            } else {
                kecamatanDropdown.disabled = true;
                document.getElementById("kelurahan").disabled = true;
            }
        }

        function getKelurahan() {
            const kecamatanId = document.getElementById("kecamatan").value;
            const kelurahanDropdown = document.getElementById("kelurahan");

            kelurahanDropdown.innerHTML = '<option value="">Pilih Kelurahan</option>';

            if (kecamatanId) {
                fetch(`${API_BASE_URL}/kelurahan/get/${kecamatanId}`)
                    .then(response => response.json())
                    .then(data => {
                        JSON.stringify(data);
                        kelurahanDropdown.disabled = false;
                        data.data.forEach(kelurahan => {
                            let option = document.createElement("option");
                            option.value = kelurahan.id;
                            option.text = kelurahan.kelurahan;
                            kelurahanDropdown.add(option);
                        });
                    })
                    .catch(error => console.error('Error:', error));
            } else {
                kelurahanDropdown.disabled = true;
            }
        }
    </script>
@endsection