@extends('layout.main')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/admin_dashboard.css') }}">
@endsection

@section('content')
    <div class="projects-section">
        <div class="projects-section-header">
            <p>Dashboard</p>
            <p class="time">{{ $formattedDate }}</p>
        </div>
    <div class="projects-section-line">
        <div class="projects-status">
            <div class="item-status">
                <span class="status-number">{{ $activeUsersCount }}</span>
                <span class="status-type">Active Users</span>
            </div>
            <div class="item-status">
                <span class="status-number">{{ $inactiveUsersCount }}</span>
                <span class="status-type">Inactive Users</span>
            </div>
            <div class="item-status">
                <span class="status-number">{{ $totalDeliveriesThisMonth }}</span>
                <span class="status-type">Total Transaction / Month</span>
            </div>
            <div class="item-status">
                <span class="status-number">{{ $totalDeliveriesThisYear }}</span>
                <span class="status-type">Total Transaction / Year</span>
            </div>
        </div>
    </div>
@endsection