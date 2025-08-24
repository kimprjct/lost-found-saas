@extends('layouts.tenant')

@section('header')
 
@endsection

@section('content')
<div class="claim-history-container">
    <h2 class="page-title">Claim History</h2>
    <div class="search-bar-container">
        <input type="text" placeholder="Search for a keyword" class="search-input">
    </div>
    <div class="table-wrapper">
        <table class="claim-history-table">
            <thead>
                <tr>
                    <th>Claim ID</th>
                    <th>Item Name</th>
                    <th>Claimant</th>
                    <th>Claim Date</th>
                    <th>Claim Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Bag</td>
                    <td>Maria Jose</td>
                    <td><a href="#" class="date-link">Sept. 24, 2024</a></td>
                    <td class="status-completed">Completed</td>
                    <td class="action-buttons">
                        <a href="#" class="btn-view">View</a>
                        <a href="#" class="btn-delete">Delete</a>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Key</td>
                    <td>Aighyne Pareja</td>
                    <td><a href="#" class="date-link">Sept. 25, 2024</a></td>
                    <td class="status-completed">Completed</td>
                    <td class="action-buttons">
                        <a href="#" class="btn-view">View</a>
                        <a href="#" class="btn-delete">Delete</a>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Money</td>
                    <td>Abigail Smith</td>
                    <td><a href="#" class="date-link">Sept. 26, 2024</a></td>
                    <td class="status-pending">Pending</td>
                    <td class="action-buttons">
                        <a href="#" class="btn-view">View</a>
                        <a href="#" class="btn-delete">Delete</a>
                    </td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Wallet</td>
                    <td>Trisha Uy</td>
                    <td><a href="#" class="date-link">Sept. 29, 2024</a></td>
                    <td class="status-completed">Completed</td>
                    <td class="action-buttons">
                        <a href="#" class="btn-view">View</a>
                        <a href="#" class="btn-delete">Delete</a>
                    </td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Umbrella</td>
                    <td>Kimby Pareja</td>
                    <td><a href="#" class="date-link">Sept. 30, 2024</a></td>
                    <td class="status-completed">Completed</td>
                    <td class="action-buttons">
                        <a href="#" class="btn-view">View</a>
                        <a href="#" class="btn-delete">Delete</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<style>
.page-title {
    margin: 0 0 10px 0;
    font-size: 30px;
    font-weight: bold;
}
.search-bar-container {
    margin-bottom: 10px;
    margin-top: -90px;
}
.search-input {
    padding: 10px 20px;
    font-size: 15px;
    border: 1px solid yellowgreen;
    border-radius: 8px;
    width: 300px;
}
.claim-history-table {
    width: 104%;
    border-collapse: collapse;
    font-size: 18px;
    text-align: center;
    margin-left: -30px;
}
.claim-history-table thead {
    background-color: rgb(88, 173, 247);
    color: black;
}
.claim-history-table th,
.claim-history-table td {
    padding: 17px;
    border-left: none;
    border-right: none;
    border-bottom: 1px solid #ccc;
}
.claim-history-table th {
    font-weight: bold;
    text-transform: uppercase;
}
.claim-history-table tbody tr:nth-child(even) {
    background-color: rgb(255, 253, 253);
}
.claim-history-table tbody tr:hover {
    background-color: rgb(218, 218, 219);
}
.date-link {
    color: #007bff;
    text-decoration: underline;
}
.date-link:hover {
    color: #0056b3;
}
.status-completed {
    font-weight: normal;
    color: #28a745;
    background: none !important;
}
.status-pending {
    font-weight: normal;
    color: #ffc107;
    background: none !important;
}
.action-buttons {
    display: flex;
    justify-content: center;
    gap: 6px;
}
.btn-view {
    background-color: #17a2b8;
    color: white;
    padding: 4px 10px;
    border-radius: 4px;
    text-decoration: none;
    font-size: 13px;
}
.btn-delete {
    background-color: #dc3545;
    color: white;
    padding: 4px 10px;
    border-radius: 4px;
    text-decoration: none;
    font-size: 13px;
}
.btn-view:hover { background-color: #138496; }
.btn-delete:hover { background-color: #c82333; }
</style>
@endsection
