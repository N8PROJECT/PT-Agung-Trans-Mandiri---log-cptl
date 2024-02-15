@extends('layout.main')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/report-pengiriman.css') }}">
@endsection

@section('content')
    <div class="projects-section">
        <div class="projects-section-header">
            <p>Report</p>
        </div>
        <div class="form-container">
            <form action="/export-admin" method="GET">
                <label for="start_date">Start Date:</label>
                <input type="date" id="start_date" name="start_date">

                <label for="end_date">End Date:</label>
                <input type="date" id="end_date" name="end_date">

                <label for="User">User:</label>
                <select name="kurir" id="" class="select-box">
                    <option value="all">All Couriers</option>
                    @foreach ($kurir as $kr)
                        <option value="{{ $kr->id }}">{{ $kr->name }}</option>
                    @endforeach
                </select>

                <button type="submit">Export Data</button>
            </form>
        </div>
    </div>
@endsection