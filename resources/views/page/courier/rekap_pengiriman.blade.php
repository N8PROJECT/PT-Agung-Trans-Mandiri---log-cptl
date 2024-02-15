@extends('layout.main')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/courier/rekap_pengiriman.css') }}">
@endsection

@section('content')
    <div class="projects-section">
        <div class="projects-section-header">
            <p>Report</p>
        </div>
        <div class="form-container">
            <form action="/export" method="GET">
                <label for="start_date">Start Date:</label>
                <input type="date" id="start_date" name="start_date">
    
                <label for="end_date">End Date:</label>
                <input type="date" id="end_date" name="end_date">
    
                <button type="submit">Export Data</button>
            </form>
        </div>
    </div>
@endsection