@extends('layout.main')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/edit-user.css') }}">
@endsection

@section('content')
    <form action="{{ url('edit-user', $user->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <input id="id" type="text" name="id" value="{{$user->id}}" hidden>

        <label for="name">Name</label>
        <input type="text" id="name" name="name" value="{{ $user->name }}">
                                                
        <label for="email">Email</label>
        <input type="text" id="email" name="email" value="{{ $user->email }}">

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

        <fieldset>
            <legend>Permissions</legend>
            <div class="admin-permission">
                <h3>Admin</h3>
                <label>
                    <input type="checkbox" name="permissions[]" value="admin_dashboard" {{ isset($user->permissions) && is_array(json_decode($user->permissions, true)) && in_array('admin_dashboard', json_decode($user->permissions, true)) ? 'checked' : '' }}>
                    Admin Dashboard
                </label>
                <label>
                    <input type="checkbox" name="permissions[]" value="capital_branch" {{ isset($user->permissions) && is_array(json_decode($user->permissions, true)) && in_array('capital_branch', json_decode($user->permissions, true)) ? 'checked' : '' }}>
                    Capital Branch
                </label>
                <label>
                    <input type="checkbox" name="permissions[]" value="users" {{ isset($user->permissions) && is_array(json_decode($user->permissions, true)) && in_array('users', json_decode($user->permissions, true)) ? 'checked' : '' }}>
                    Users
                </label>
                <label>
                    <input type="checkbox" name="permissions[]" value="report_pengiriman" {{ isset($user->permissions) && is_array(json_decode($user->permissions, true)) && in_array('report_pengiriman', json_decode($user->permissions, true)) ? 'checked' : '' }}>
                    Report Pengiriman
                </label>
            </div>
            <div class="courier-permission">
                <h3>Courier</h3>
                <label>
                    <input type="checkbox" name="permissions[]" value="courier_dashboard" {{ isset($user->permissions) && is_array(json_decode($user->permissions, true)) && in_array('courier_dashboard', json_decode($user->permissions, true)) ? 'checked' : '' }}>
                    Courier Dashboard
                </label>
                <label>
                    <input type="checkbox" name="permissions[]" value="document_delivery" {{ isset($user->permissions) && is_array(json_decode($user->permissions, true)) && in_array('document_delivery', json_decode($user->permissions, true)) ? 'checked' : '' }}>
                    Document Delivery
                </label>
                <label>
                    <input type="checkbox" name="permissions[]" value="rekap_pengiriman" {{ isset($user->permissions) && is_array(json_decode($user->permissions, true)) && in_array('rekap_pengiriman', json_decode($user->permissions, true)) ? 'checked' : '' }}>
                    Rekap Pengiriman
                </label>
            </div>
                                                        
        </fieldset>

        <div class="button">
            <input type="submit" value="Update">
            <a href="/users">Back</a>
        </div>
        
    </form>
@endsection