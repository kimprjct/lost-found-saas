@extends('layouts.tenant')

@section('header')
   
@endsection

@section('content')
<div class="found-requests-container">

    <!-- Title -->
    <h2 class="page-title">Found Requests</h2>

    <!-- Search (straight ubos sa title) -->
    <div class="search-bar-container">
        <input type="text" placeholder="Search for a keyword" class="search-input">
    </div>

    <!-- Table -->
    <div class="table-wrapper">
        <table class="found-requests-table">
            <thead>
                <tr>
                    <th>Item ID</th>
                    <th>Item Name</th>
                    <th>Date Found</th>
                    <th>Found by</th>
                    <th>Location Found</th>
                    <th>Image</th>
                    <th>Verification Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Key</td>
                    <td>Sept. 29, 2024</td>
                    <td>Abigail Smith</td>
                    <td>EB Room 208</td>
                    <td><img src="https://via.placeholder.com/50" alt="Item" class="item-image" /></td>
                    <td class="status-verified">Verified</td>
                    <td class="action-buttons">
                        <a href="#" class="btn-approve">Approve</a>
                        <a href="#" class="btn-reject">Reject</a>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Coach wallet Black</td>
                    <td>Sept. 24, 2024</td>
                    <td>Trisha Uy</td>
                    <td>SNSU Gym</td>
                    <td><img src="https://via.placeholder.com/50" alt="Item" class="item-image" /></td>
                    <td class="status-verified">Verified</td>
                    <td class="action-buttons">
                        <a href="#" class="btn-approve">Approve</a>
                        <a href="#" class="btn-reject">Reject</a>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Cellphone</td>
                    <td>Sept. 25, 2024</td>
                    <td>Kimby Pareja</td>
                    <td>LRC</td>
                    <td><img src="https://via.placeholder.com/50" alt="Item" class="item-image" /></td>
                    <td class="status-pending">Pending</td>
                    <td class="action-buttons">
                        <a href="#" class="btn-view">View</a>
                        <a href="#" class="btn-edit">Edit</a>
                    </td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Flash drive</td>
                    <td>Sept. 26, 2024</td>
                    <td>Kim Talictic</td>
                    <td>EB Room 310</td>
                    <td><img src="https://via.placeholder.com/50" alt="Item" class="item-image" /></td>
                    <td class="status-rejected">Rejected</td>
                    <td class="action-buttons">
                        <a href="#" class="btn-review">Review</a>
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
    font-size: 15px;
    border: 1px solid yellowgreen;
    border-radius: 8px;
    width: 300px;
}

/* table styling */
.found-requests-table {
    width: 104%;
    border-collapse: collapse;
    font-size: 18px;
    text-align: center;
    margin-left: -30px;
}

.found-requests-table thead {
    background-color: rgb(88, 173, 247);
    color: black;
}

.found-requests-table th,
.found-requests-table td {
    padding: 17px;
    border-left: none;
    border-right: none;
    border-bottom: 1px solid #ccc;
}

.found-requests-table th {
    font-weight: bold;
    text-transform: uppercase;
}

.found-requests-table tbody tr:nth-child(even) {
    background-color: rgb(255, 253, 253);
}

.found-requests-table tbody tr:hover {
    background-color: rgb(218, 218, 219);
}

/* status styling */
.status-verified {
    font-weight: normal;
    color: #28a745;
    background: none !important;
}

.status-pending {
    font-weight: normal;
    color: #ffc107;
    background: none !important;
}

.status-rejected {
    font-weight: normal;
    color: #dc3545;
    background: none !important;
}

/* image styling */
.item-image {
    border-radius: 6px;
    width: 50px;
    height: 50px;
    object-fit: cover;
}

.action-buttons {
    display: flex;
    justify-content: center;
    gap: 6px;
}

.btn-approve {
    background-color: #28a745;
    color: white;
    padding: 4px 10px;
    border-radius: 4px;
    text-decoration: none;
    font-size: 13px;
}

.btn-reject {
    background-color: #dc3545;
    color: white;
    padding: 4px 10px;
    border-radius: 4px;
    text-decoration: none;
    font-size: 13px;
}

.btn-view {
    background-color: #17a2b8;
    color: white;
    padding: 4px 10px;
    border-radius: 4px;
    text-decoration: none;
    font-size: 13px;
}

.btn-edit {
    background-color: #007bff;
    color: white;
    padding: 4px 10px;
    border-radius: 4px;
    text-decoration: none;
    font-size: 13px;
}

.btn-review {
    background-color: #6f42c1;
    color: white;
    padding: 4px 10px;
    border-radius: 4px;
    text-decoration: none;
    font-size: 13px;
}

.btn-approve:hover { background-color: #218838; }
.btn-reject:hover { background-color: #c82333; }
.btn-view:hover { background-color: #138496; }
.btn-edit:hover { background-color: #0056b3; }
.btn-review:hover { background-color: #5a32a3; }
</style>
@endsection
