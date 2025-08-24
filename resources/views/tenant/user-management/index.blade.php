@extends('layouts.tenant')

@section('header')
    
@endsection

@section('content')
<div class="user-management-container">
    <h2 class="page-title">User Management</h2>
    <div class="search-bar-container">
        <input type="text" placeholder="Search for a keyword" class="search-input">
    </div>
    <div class="table-wrapper">
        <table class="user-management-table">
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Department</th>
                    <th>Email</th>
                    <th>Contact Number</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>2021-00001</td>
                    <td>Rigugel Jameson Alleje</td>
                    <td>COT</td>
                    <td><a href="mailto:rjalleje@ssct.edu.ph" class="email-link">rjalleje@ssct.edu.ph</a></td>
                    <td>0983823471</td>
                    <td class="action-buttons">
                        <a href="#" class="btn-view">View</a>
                        <a href="#" class="btn-edit">Edit</a>
                        <a href="#" class="btn-delete">Delete</a>
                    </td>
                </tr>
                <tr>
                    <td>2021-00002</td>
                    <td>Solana Galvez</td>
                    <td>CEIT</td>
                    <td><a href="mailto:sgalvez@ssct.edu.ph" class="email-link">sgalvez@ssct.edu.ph</a></td>
                    <td>0988384281</td>
                    <td class="action-buttons">
                        <a href="#" class="btn-view">View</a>
                        <a href="#" class="btn-edit">Edit</a>
                        <a href="#" class="btn-delete">Delete</a>
                    </td>
                </tr>
                <tr>
                    <td>2022-0003</td>
                    <td>Charity Rama</td>
                    <td>CAS</td>
                    <td><a href="mailto:crama@ssct.edu.ph" class="email-link">crama@ssct.edu.ph</a></td>
                    <td>0934828848</td>
                    <td class="action-buttons">
                        <a href="#" class="btn-view">View</a>
                        <a href="#" class="btn-edit">Edit</a>
                        <a href="#" class="btn-delete">Delete</a>
                    </td>
                </tr>
                <tr>
                    <td>2022-0004</td>
                    <td>Kim Mercadejas</td>
                    <td>CTE</td>
                    <td><a href="mailto:kmercadeja@ssct.edu.ph" class="email-link">kmercadeja@ssct.edu.ph</a></td>
                    <td>09837471773</td>
                    <td class="action-buttons">
                        <a href="#" class="btn-view">View</a>
                        <a href="#" class="btn-edit">Edit</a>
                        <a href="#" class="btn-delete">Delete</a>
                    </td>
                </tr>
                <tr>
                    <td>2022-0005</td>
                    <td>Rena Rabe</td>
                    <td>CEIT</td>
                    <td><a href="mailto:rrabe@ssct.edu.ph" class="email-link">rrabe@ssct.edu.ph</a></td>
                    <td>09125151098</td>
                    <td class="action-buttons">
                        <a href="#" class="btn-view">View</a>
                        <a href="#" class="btn-edit">Edit</a>
                        <a href="#" class="btn-delete">Delete</a>
                    </td>
                </tr>
                <tr>
                    <td>2021-00006</td>
                    <td>Kim Talictic</td>
                    <td>CEIT</td>
                    <td><a href="mailto:ktalictic@ssct.edu.ph" class="email-link">ktalictic@ssct.edu.ph</a></td>
                    <td>09510911761</td>
                    <td class="action-buttons">
                        <a href="#" class="btn-view">View</a>
                        <a href="#" class="btn-edit">Edit</a>
                        <a href="#" class="btn-delete">Delete</a>
                    </td>
                </tr>
                <tr>
                    <td>2021-00001</td>
                    <td>Kimby Pareja</td>
                    <td>CEIT</td>
                    <td><a href="mailto:kpareja@ssct.edu.ph" class="email-link">kpareja@ssct.edu.ph</a></td>
                    <td>09078832797</td>
                    <td class="action-buttons">
                        <a href="#" class="btn-view">View</a>
                        <a href="#" class="btn-edit">Edit</a>
                        <a href="#" class="btn-delete">Delete</a>
                    </td>
                </tr>
                <tr>
                    <td>2021-00001</td>
                    <td>Soliel Riego</td>
                    <td>CTE</td>
                    <td><a href="mailto:sriego@ssct.edu.ph" class="email-link">sriego@ssct.edu.ph</a></td>
                    <td>09858581581</td>
                    <td class="action-buttons">
                        <a href="#" class="btn-view">View</a>
                        <a href="#" class="btn-edit">Edit</a>
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
.user-management-table {
    width: 104%;
    border-collapse: collapse;
    font-size: 18px;
    text-align: center;
    margin-left: -30px;
}
.user-management-table thead {
    background-color: rgb(88, 173, 247);
    color: black;
}
.user-management-table th,
.user-management-table td {
    padding: 17px;
    border-left: none;
    border-right: none;
    border-bottom: 1px solid #ccc;
}
.user-management-table th {
    font-weight: bold;
    text-transform: uppercase;
}
.user-management-table tbody tr:nth-child(even) {
    background-color: rgb(255, 253, 253);
}
.user-management-table tbody tr:hover {
    background-color: rgb(218, 218, 219);
}
.email-link {
    color: #007bff;
    text-decoration: underline;
}
.email-link:hover {
    color: #0056b3;
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
.btn-edit {
    background-color: #28a745;
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
.btn-edit:hover { background-color: #218838; }
.btn-delete:hover { background-color: #c82333; }
</style>
@endsection
