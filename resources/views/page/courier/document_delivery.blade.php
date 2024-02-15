@extends('layout.main')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/courier/document_delivery.css') }}">
@endsection

@section('content')
    <div class="projects-section">
        <div class="projects-section-header">
            <p>Pengiriman Dokumen</p>
        </div>
        <div class="wrapper">
            <a href="#popup1">
                <button class="add-data-btn">
                    <span class="add-icon">+</span> Add Data
                </button>
            </a>
        </div>
        <div id="popup1" class="overlay">
            <div class="popup">
                <h2>Add Data</h2>
                <a class="close" href="#">&times;</a>
                <div class="content">
                    <form action="/add-delivery" method="post" enctype="multipart/form-data">
                        @csrf
                        <label for="area">Area</label>
                        <input type="text" id="area" name="area">
                    
                        <label for="tanggal-kirim">Tanggal Kirim</label>
                        <input type="date" id="tanggal-kirim" name="tanggal_kirim">

                        <label for="pengirim">Pengirim</label>
                        <input type="text" id="pengirim" name="pengirim">
                        
                        <label for="cabang_pengirim">Cabang Pengirim</label>
                        <input type="text" id="cabang_pengirim" name="cabang_pengirim" required>

                        <label for="tujuan_dokumen">Tujuan Dokumen</label>
                        <input type="text" id="tujuan_dokumen" name="tujuan_dokumen" required>

                        <label for="cabang_tujuan">Cabang Tujuan</label>
                        <select name="cabangtujuan" id="cabang_tujuan">
                            @foreach($branches as $branch)
                                <option value="{{$branch->id}}">{{$branch->name}}</option>
                            @endforeach
                        </select>

                        <label for="kota">Kota</label>
                        <input type="text" id="kota" name="kota" required>

                        <label for="jenis_kiriman">Jenis Kiriman</label>
                        <input type="text" id="jenis_kiriman" name="jenis_kiriman" required>

                        <label for="nama_penerima">Nama Penerima</label>
                        <input type="text" id="nama_penerima" name="nama_penerima" required>

                        <label for="tanggal_terima">Tanggal Terima</label>
                        <input type="date" id="tanggal_terima" name="tanggal_terima" required>
                      
                        <input type="submit" value="Submit">
                    </form>
                </div>
            </div>
        </div>
        <div class="container">
            @foreach ($deliveries as $delivery)
            {{-- @dd($delivery->capital_branch->name) --}}
                <div class="delivery-item">
                    <div><strong>Area</strong>: {{ $delivery->area }}</div>
                    <div><strong>Tanggal Kirim</strong>: {{ $delivery->tanggal_kirim }}</div>
                    <div><strong>Pengirim</strong>: {{ $delivery->pengirim }}</div>
                    <div><strong>Cabang Pengirim</strong>: {{ $delivery->cabang_pengirim }}</div>
                    <div><strong>Tujuan Dokumen</strong>: {{ $delivery->tujuan_dokumen }}</div>
                    <div><strong>Cabang Tujuan</strong>: {{ $delivery->capital_branch->name }}</div>
                    <div><strong>Kota</strong>: {{ $delivery->kota }}</div>
                    <div><strong>Jenis Kiriman</strong>: {{ $delivery->jenis_kiriman }}</div>
                    <div><strong>Nama Penerima</strong>: {{ $delivery->nama_penerima }}</div>
                    <div><strong>Tanggal Terima</strong>: {{ $delivery->tanggal_terima }}</div>
                    <div><strong>Nama Kurir</strong>: {{ $delivery->user->name }}</div>
                    <div class="button-delivery">
                        <div id="wrapper">
                            <a href="#popup-{{ $delivery->id }}">
                                <button class="edit">
                                    Edit
                                </button>
                            </a>
                        </div>
                        <div id="popup-{{ $delivery->id }}" class="overlay">
                            <div class="popup">
                                <h2>Edit Delivery</h2>
                                <a class="close" href="#">&times;</a>
                                <div class="content">
                                    <form action="/edit-delivery" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <input id="id" type="text" name="id" value="{{$delivery->id}}" hidden>

                                        <label for="area">Area</label>
                                        <input type="text" id="area" name="area" value="{{ $delivery->area }}">
                                    
                                        <label for="tanggal-kirim">Tanggal Kirim</label>
                                        <input type="date" id="tanggal-kirim" name="tanggal_kirim" value="{{ $delivery->tanggal_kirim }}">

                                        <label for="pengirim">Pengirim</label>
                                        <input type="text" id="pengirim" name="pengirim" value="{{ $delivery->pengirim }}">
                                        
                                        <label for="cabang_pengirim">Cabang Pengirim</label>
                                        <input type="text" id="cabang_pengirim" name="cabang_pengirim" value="{{ $delivery->cabang_pengirim }}">

                                        <label for="tujuan_dokumen">Tujuan Dokumen</label>
                                        <input type="text" id="tujuan_dokumen" name="tujuan_dokumen" value="{{ $delivery->tujuan_dokumen }}">

                                        <label for="cabang_tujuan">Cabang Tujuan</label>
                                        <select name="cabangtujuan" id="cabang_tujuan">
                                            @foreach($branches as $branch)
                                                <option value="{{$branch->id}}">{{$branch->name}}</option>
                                            @endforeach
                                        </select>

                                        <label for="kota">Kota</label>
                                        <input type="text" id="kota" name="kota" value="{{ $delivery->kota }}">

                                        <label for="jenis_kiriman">Jenis Kiriman</label>
                                        <input type="text" id="jenis_kiriman" name="jenis_kiriman" value="{{ $delivery->jenis_kiriman }}">

                                        <label for="nama_penerima">Nama Penerima</label>
                                        <input type="text" id="nama_penerima" name="nama_penerima" value="{{ $delivery->nama_penerima }}">

                                        <label for="tanggal_terima">Tanggal Terima</label>
                                        <input type="date" id="tanggal_terima" name="tanggal_terima" value="{{ $delivery->tanggal_terima }}">
                                      
                                        <input type="submit" value="Update">
                                    </form>
                                </div>
                            </div>
                        </div>
                        <form action="/delete-delivery/{{ $delivery->id }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="delete">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach 
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('script/delivery.js') }}"></script>
@endsection