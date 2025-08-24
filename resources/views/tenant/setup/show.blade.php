@extends('layouts.tenant')

@section('header')
    
@endsection

@section('content')
<style>
    /* Common card style */
    .card {
        color: white;
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        text-align: center;
    }
    .card h2 {
        font-size: 36px;
        margin: 0;
        font-weight: bold;
    }
    .card p {
        margin-bottom: 10px;
        font-weight: 500;
        width: 300px;
    }

    /* Top row (3 cards) */
    .top-cards-row {
        display: flex;
        gap: 40px;
        margin-bottom: 30px;
        width: 80px;
        margin-left: 100px;
    }
    .top-cards-row .card {
        flex: 1;
    }

    /* Bottom row (2 cards) */
    .bottom-cards-row {
        display: flex;
        justify-content: center;
        gap: 40px;
        margin-bottom: 30px;
        width: 80px;
        margin-left: 600px;
    }
    .bottom-cards-row .card {
        flex: 0.7; /* smaller width than top cards */
    }

    /* Colors */
    .red { background-color: #b91c1c; }
    .yellow { background-color: #f59e0b; color: white; } /* font white */
    .purple { background-color: #9333ea; }
    .green { background-color: #16a34a; }
    .blue { background-color: #1e3a8a; }

    /* Recent activities */
    .recent-activities {
        background: white;
        border: 1px solid #ddd;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }
    .recent-activities h3 {
        background: #f5f5f5;
        padding: 12px 16px;
        font-weight: bold;
        border-bottom: 1px solid #ddd;
    }
    .recent-activities table {
        width: 100%;
        border-collapse: collapse;
    }
    .recent-activities th, .recent-activities td {
        padding: 10px 12px;
        text-align: left;
        border-bottom: 1px solid #eee;
    }
    .btn-view {
        background: #2563eb;
        color: white;
        padding: 6px 12px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
    }
    .btn-view:hover {
        background: #1d4ed8;
    }
</style>

<div class="p-6">
    <h2 style="font-size: 20px; font-weight: bold; margin-bottom: 20px;">DASHBOARD</h2>

    <!-- Row 1: 3 cards -->
    <div class="top-cards-row">
        <div class="card red">
            <p>Total Number of Found Items</p>
            <h2>10</h2>
        </div>
        <div class="card yellow">
            <p>Pending Verifications</p>
            <h2>5</h2>
        </div>
        <div class="card purple">
            <p>Total Number of Lost Items</p>
            <h2>15</h2>
        </div>
    </div>

    <!-- Row 2: 2 smaller cards -->
    <div class="bottom-cards-row">
        <div class="card green">
            <p>Items Claimed</p>
            <h2>8</h2>
        </div>
        <div class="card blue">
            <p>Unclaimed Items</p>
            <h2>7</h2>
        </div>
    </div>

    <!-- Recent Activities -->
    <div class="recent-activities">
        <h3>Recent Activities</h3>
        <table>
            <thead>
                <tr>
                    <th>Icon</th>
                    <th>Activity Description</th>
                    <th>Date/Time</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>🔍</td>
                    <td>Wallet reported lost by Maria Batumbakal</td>
                    <td>Oct. 5, 2024 | 10:20 AM</td>
                    <td><button class="btn-view">View</button></td>
                </tr>
                <tr>
                    <td>📂</td>
                    <td>Folder found by Maria Theresa</td>
                    <td>Oct. 5, 2024 | 9:01 AM</td>
                    <td><button class="btn-view">View</button></td>
                </tr>
                <tr>
                    <td>☂️</td>
                    <td>Umbrella claimed by Soliel Riego</td>
                    <td>Oct. 4, 2024 | 9:30 AM</td>
                    <td><button class="btn-view">View</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
