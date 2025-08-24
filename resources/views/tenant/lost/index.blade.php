@extends('layouts.tenant')

@section('content')
<div class="lost-items-container">

    <!-- Title -->
    <h2 class="page-title">Manage Lost Items</h2>

    <!-- Search (straight ubos sa title) -->
    <div class="search-bar-container">
        <input type="text" placeholder="Search for a keyword" class="search-input">
    </div>

    <!-- Table -->
    <div class="table-wrapper">
        <table class="lost-items-table">
            <thead>
                <tr>
                    <th>Item ID</th>
                    <th>Item Name</th>
                    <th>Reported Date</th>
                    <th>Status</th>
                    <th>Location</th>
                    <th>Lost by</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Key</td>
                    <td>Sept. 24, 2024</td>
                    <td class="status-lost">Lost</td>
                    <td>EB Room 208</td>
                    <td>Riguel Jameson Alleje</td>
                    <td class="action-buttons">
                        <a href="#" class="btn-view">View</a>
                        <a href="#" class="btn-edit">Edit</a>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Wallet</td>
                    <td>Sept. 24, 2024</td>
                    <td class="status-lost">Lost</td>
                    <td>SNSU Gym</td>
                    <td>Solana Galvez</td>
                    <td class="action-buttons">
                        <a href="#" class="btn-view">View</a>
                        <a href="#" class="btn-edit">Edit</a>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Cellphone</td>
                    <td>Sept. 25, 2024</td>
                    <td class="status-lost">Lost</td>
                    <td>LRC</td>
                    <td>Charity Rama</td>
                    <td class="action-buttons">
                        <a href="#" class="btn-view">View</a>
                        <a href="#" class="btn-edit">Edit</a>
                    </td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Flash drive</td>
                    <td>Sept. 26, 2024</td>
                    <td class="status-lost">Lost</td>
                    <td>EB Room 310</td>
                    <td>Kim Mercadejas</td>
                    <td class="action-buttons">
                        <a href="#" class="btn-view">View</a>
                        <a href="#" class="btn-edit">Edit</a>
                    </td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Umbrella</td>
                    <td>Sept. 27, 2024</td>
                    <td class="status-lost">Lost</td>
                    <td>Library</td>
                    <td>Maria Santos</td>
                    <td class="action-buttons">
                        <a href="#" class="btn-view">View</a>
                        <a href="#" class="btn-edit">Edit</a>
                    </td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>Notebook</td>
                    <td>Sept. 28, 2024</td>
                    <td class="status-lost">Lost</td>
                    <td>Canteen</td>
                    <td>Juan Dela Cruz</td>
                    <td class="action-buttons">
                        <a href="#" class="btn-view">View</a>
                        <a href="#" class="btn-edit">Edit</a>
                    </td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>Bag</td>
                    <td>Sept. 29, 2024</td>
                    <td class="status-lost">Lost</td>
                    <td>Main Gate</td>
                    <td>Ana Lopez</td>
                    <td class="action-buttons">
                        <a href="#" class="btn-view">View</a>
                        <a href="#" class="btn-edit">Edit</a>
                    </td>
                </tr>
                <tr>
                    <td>8</td>
                    <td>Calculator</td>
                    <td>Sept. 30, 2024</td>
                    <td class="status-lost">Lost</td>
                    <td>Math Dept.</td>
                    <td>Carlos Mendoza</td>
                    <td class="action-buttons">
                        <a href="#" class="btn-view">View</a>
                        <a href="#" class="btn-edit">Edit</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Inline CSS -->
<style>
/* title */
.page-title {
    margin: 0 0 10px 0;
    font-size: 30px;
    font-weight: bold;
}

/* search bar styling */
.search-bar-container {
    margin-bottom: 10px;
    margin-top: -90px;
}
.search-input {
    padding: 10px 20px;
    font-size: 1p5x;
    border: 1px solid yellowgreen;
    border-radius: 8px;
    width: 300px;
}

/* table styling */
.lost-items-table {
    width: 104%;
    border-collapse: collapse;
    font-size: 18px;
    text-align: center;
    margin-left: -30px;
}

.lost-items-table thead {
    background-color: rgb(88, 173, 247);
    color: black;
}

.lost-items-table th,
.lost-items-table td {
    padding: 17px;
    border-left: none;
    border-right: none;
    border-bottom: 1px solid #ccc;
}

.lost-items-table th {
    font-weight: bold;
    text-transform: uppercase;
}

.lost-items-table tbody tr:nth-child(even) {
    background-color: rgb(255, 253, 253);
}

.lost-items-table tbody tr:hover {
    background-color: rgb(218, 218, 219);
}

/* plain text lang ang Lost */
.status-lost {
    font-weight: normal;
    color: black;
    background: none !important;
}

.action-buttons {
    display: flex;
    justify-content: center;
    gap: 6px;
}

.btn-view {
    background-color: #1e73be;
    color: white;
    padding: 4px 10px;
    border-radius: 4px;
    text-decoration: none;
    font-size: 13px;
}

.btn-edit {
    background-color: #e74c3c;
    color: white;
    padding: 4px 10px;
    border-radius: 4px;
    text-decoration: none;
    font-size: 13px;
}

.btn-view:hover { background-color: #155a91; }
.btn-edit:hover { background-color: #c0392b; }
</style>
@endsection
