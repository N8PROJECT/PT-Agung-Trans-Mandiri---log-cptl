@extends('layout.main')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/users.css') }}">
@endsection

@section('content')
    <div class="projects-section">
        <div class="projects-section-header">
            <p>User Administration</p>
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
                <h2>Add User</h2>
                <a class="close" href="#">&times;</a>
                <div class="content">
                    <form action="/add-user" method="post" enctype="multipart/form-data">
                        @csrf
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name">
                    
                        <label for="email">Email</label>
                        <input type="text" id="email" name="email">

                        <label for="password">Password</label>
                        <input type="password" id="password" name="password">

                        <label for="status">Status</label>
                        <select name="status" id="status">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>

                        <label for="role">Role</label>
                        <select name="role" id="role">
                            <option value="admin">admin</option>
                            <option value="courier">courier</option>
                        </select>

                        <input type="submit" value="Submit">
                    </form>
                </div>
            </div>
        </div>
        <div class="filter-section">
            <label for="filter">Filter by Role:</label>
            <select name="filter" id="filter">
                <option value="all">All</option>
                <option value="admin">Admin</option>
                <option value="courier">Courier</option>
            </select>
        </div>
        <div class="projects-section-line">
            <div class="table-responsive-vertical shadow-z-1">
                <!-- Table starts here -->
                <table id="table" class="table table-hover table-mc-light-blue">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Role</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $index => $user)
                            <tr class="user-row" data-role="{{ $user->role }}">
                                <td data-title="No">{{ $index +1 }}</td>
                                <td data-title="Name">{{ $user->name }}</td>
                                <td data-title="Email">{{ $user->email }}</td>
                                <td data-title="Status">{{ $user->status }}</td>
                                <td data-title="Role">{{ $user->role }}</td>
                                <td data-title="Edit">
                                    <div id="wrapper">
                                        <a href="#popup-{{ $user->id }}">
                                            <button class="edit">
                                                Edit
                                            </button>
                                        </a>
                                    </div>
                                    <div id="popup-{{ $user->id }}" class="overlay">
                                        <div class="popup">
                                            <h2>Edit User</h2>
                                            <a class="close" href="#">&times;</a>
                                            <div class="content">
                                                {{-- @dd($user) --}}
                                                <form action="/edit-user" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <input id="id" type="text" name="id" value="{{$user->id}}" hidden>

                                                    <label for="name">Name</label>
                                                    <input type="text" id="name" name="name" value="{{ $user->name }}">
                                                
                                                    <label for="email">Email</label>
                                                    <input type="text" id="email" name="email" value="{{ $user->email }}">

                                                    <label for="password">Password</label>
                                                    <input type="password" id="password" name="password" value="{{ $user->password }}">

                                                    <label for="status">Status</label>
                                                    <select name="status" id="status">
                                                        <option value="active" {{ $user->status === 'active' ? 'selected' : '' }}>Active</option>
                                                        <option value="inactive" {{ $user->status === 'inactive' ? 'selected' : '' }}>Inactive</option>
                                                    </select>

                                                    <label for="role">Role</label>
                                                    <select name="role" id="role">
                                                        <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>admin</option>
                                                        <option value="courier" {{ $user->role === 'courier' ? 'selected' : '' }}>courier</option>
                                                    </select>

                                                    <input type="submit" value="Update">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td data-title="Delete">
                                    <form action="/delete-user/{{ $user->id }}" method="POST">
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

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const filterSelect = document.getElementById('filter');

            filterSelect.addEventListener('change', function () {
                const selectedRole = filterSelect.value;
                const users = document.querySelectorAll('.user-row');

                users.forEach(function (user) {
                    if (selectedRole === 'all' || user.dataset.role === selectedRole) {
                        user.style.display = 'table-row';
                    } else {
                        user.style.display = 'none';
                    }
                });
            });
        });
    </script>
@endsection