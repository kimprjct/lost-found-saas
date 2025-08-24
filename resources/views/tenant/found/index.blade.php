@extends('layouts.tenant')

@section('content')
<div class="found-items-container">

    <!-- Title -->
    <h2 class="page-title">Manage Found Items</h2>

    <!-- Search (straight ubos sa title) -->
    <div class="search-bar-container">
        <input type="text" placeholder="Search for a keyword" class="search-input">
    </div>

    <!-- Table -->
    <div class="table-wrapper">
        <table class="found-items-table">
            <thead>
                <tr>
                    <th>Item ID</th>
                    <th>Item Name</th>
                    <th>Reported Date</th>
                    <th>Status</th>
                    <th>Location</th>
                    <th>Found by</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Umbrella</td>
                    <td>Sept. 23, 2024</td>
                    <td class="status-found">Found</td>
                    <td>Canteen</td>
                    <td>Rena Rabe</td>
                    <td class="action-buttons">
                        <a href="#" class="btn-view">View</a>
                        <a href="#" class="btn-edit">Edit</a>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Phone Case (realme C55)</td>
                    <td>Sept. 28, 2024</td>
                    <td class="status-found">Found</td>
                    <td>EB Room 209</td>
                    <td>Soliel Reigo</td>
                    <td class="action-buttons">
                        <a href="#" class="btn-view">View</a>
                        <a href="#" class="btn-edit">Edit</a>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Record Book</td>
                    <td>Sept. 29, 2024</td>
                    <td class="status-found">Found</td>
                    <td>Student Center</td>
                    <td>Kimberlyn Pareja</td>
                    <td class="action-buttons">
                        <a href="#" class="btn-view">View</a>
                        <a href="#" class="btn-edit">Edit</a>
                    </td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Money, 100 pesos</td>
                    <td>Sept. 30, 2024</td>
                    <td class="status-found">Found</td>
                    <td>Stair sa Exit</td>
                    <td>Kim Talictic</td>
                    <td class="action-buttons">
                        <a href="#" class="btn-view">View</a>
                        <a href="#" class="btn-edit">Edit</a>
                    </td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Makeup</td>
                    <td>Oct. 01, 2024</td>
                    <td class="status-found">Found</td>
                    <td>Bathroom</td>
                    <td>Michelle Dee</td>
                    <td class="action-buttons">
                        <a href="#" class="btn-view">View</a>
                        <a href="#" class="btn-edit">Edit</a>
                    </td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>Headset</td>
                    <td>Oct. 02, 2024</td>
                    <td class="status-found">Found</td>
                    <td>EB Room 310</td>
                    <td>Ralph Narada</td>
                    <td class="action-buttons">
                        <a href="#" class="btn-view">View</a>
                        <a href="#" class="btn-edit">Edit</a>
                    </td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>Yellow Pad</td>
                    <td>Oct. 03, 2024</td>
                    <td class="status-found">Found</td>
                    <td>Library</td>
                    <td>John Narada</td>
                    <td class="action-buttons">
                        <a href="#" class="btn-view">View</a>
                        <a href="#" class="btn-edit">Edit</a>
                    </td>
                </tr>
                <tr>
                    <td>8</td>
                    <td>Bracelet</td>
                    <td>Oct. 04, 2024</td>
                    <td class="status-found">Found</td>
                    <td><Fieldset:disabled></Fieldset:disabled></td>
                    <td>Riguel Jameson Alleje</td>
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
.found-items-table {
    width: 104%;
    border-collapse: collapse;
    font-size: 18px;
    text-align: center;
    margin-left: -30px;
}

.found-items-table thead {
    background-color: rgb(88, 173, 247);
    color: black;
}

.found-items-table th,
.found-items-table td {
    padding: 17px;
    border-left: none;
    border-right: none;
    border-bottom: 1px solid #ccc;
}

.found-items-table th {
    font-weight: bold;
    text-transform: uppercase;
}

.found-items-table tbody tr:nth-child(even) {
    background-color: rgb(255, 253, 253);
}

.found-items-table tbody tr:hover {
    background-color: rgb(218, 218, 219);
}

/* plain text lang ang Found */
.status-found {
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
