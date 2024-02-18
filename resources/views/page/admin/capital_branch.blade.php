@extends('layout.main')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/capital_branch.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
@endsection

@section('content')
    <div class="projects-section">
        <div class="projects-section-header">
            <p>Capital Branch</p>
        </div>
        <div id="wrapper">
            <p><a class="button" href="#popup1">+ Add Branch</a></p>
        </div>
        <div class="filter-section">
            <form class="search" action="{{ route('locations') }}" method="get">
                <label for="">Search</label>
                <input type="text" name="search" placeholder="Cari Cabang...">

                <button type="submit">Search</button>
            </form>
        </div>
        <div id="popup1" class="overlay">
            <div class="popup">
                <h2>Add Capital Branch</h2>
                <a class="close" href="#">&times;</a>
                <div class="content">
                    <form action="/add-branch" method="post" enctype="multipart/form-data">
                        @csrf
                        <label for="lokasi">Lokasi</label>
                        <input type="text" id="lokasi" name="name">
                    
                        <label for="kode-cabang">Kode Cabang</label>
                        <input type="text" id="kode-cabang" name="code">
                      
                        <input type="submit" value="Submit">
                    </form>
                </div>
            </div>
        </div>
        <div class="projects-section-line">
            <div class="table-responsive-vertical shadow-z-1">
                <!-- Table starts here -->
                <table id="table" class="table table-hover table-mc-light-blue">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Code</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($capital_branches as $index => $cp)
                            <tr>
                                <td data-title="No">{{ $index +1 }}</td>
                                <td data-title="Name">{{ $cp->name }}</td>
                                <td data-title="Email">{{ $cp->code }}</td>
                                <td data-title="Edit">
                                    <div id="wrapper">
                                        <a href="#popup-{{ $cp->id }}">
                                            <button class="edit">
                                                Edit
                                            </button>
                                        </a>
                                    </div>
                                    <div id="popup-{{ $cp->id }}" class="overlay">
                                        <div class="popup">
                                            <h2>Edit Capital Branch</h2>
                                            <a class="close" href="#">&times;</a>
                                            <div class="content">
                                                <form action="/edit-branch" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <input id="id" type="text" name="id" value="{{$cp->id}}" hidden>

                                                    <label for="lokasi">Lokasi</label>
                                                    <input type="text" id="lokasi" name="name" value="{{ $cp->name }}">
                                                
                                                    <label for="kode-cabang">Kode Cabang</label>
                                                    <input type="text" id="kode-cabang" name="code" value="{{ $cp->code }}">
                                                  
                                                    <input type="submit" value="Update">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td data-title="Delete">
                                    <form action="/delete-branch/{{ $cp->id }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button class="delete">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection