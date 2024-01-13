@include('layouts.dashboardLayout.header')
@include('layouts.dashboardLayout.sidebar')
@include('layouts.dashboardLayout.body')
<style>
    .pagination {
    display: flex;
    justify-content: center;
    margin-top: 20px;
}

.pagination li {
    margin: 0 5px;
    list-style-type: none;
}

.pagination a, .pagination span {
    padding: 8px 12px;
    font-size: 14px;
    color: #333;
    text-decoration: none;
    border: 1px solid #ddd;
    border-radius: 4px;
}

.pagination .active span {
    background-color: #007bff;
    color: #fff;
    border: 1px solid #007bff;
}
</style>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
    <div class="d-block mb-4 mb-md-0">
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item">
                    <a href="#">
                        <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Transactions</li>
            </ol>
        </nav>
        <h2 class="h4">All Users</h2>
    </div>
</div>

<div class="card card-body border-0 shadow table-wrapper table-responsive">
    <table class="table table-hover">
        <thead>
            <tr class="text-center">
                <th class="border-gray-200">#</th>
                <th class="border-gray-200">Username</th>
                <th class="border-gray-200">Name</th>
                <th class="border-gray-200">Email</th>
                <th class="border-gray-200">City</th>
                <th class="border-gray-200">Street</th>
                <th class="border-gray-200">ZipCode</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user )
            <tr>
                <td>
                    <a href="#" class="fw-bold">
                            {{$user['id']}}
                        </a>
                </td>
                <td>
                    <span class="fw-normal">{{$user['username']}}</span>
                </td>
                <td><span class="fw-normal">{{$user['name']}}</span></td>
                <td><span class="fw-bold">{{$user['email']}}</span></td>
                <td><span class="">{{$user['address']['city']}}</span></td>
                <td><span class="">{{$user['address']['street']}}</span></td>
                <td><span class="">{{$user['address']['zipcode']}}</span></td>

            </tr>
            @endforeach

        </tbody>
    </table>
    {{ $users->links() }}


</div>
@include('layouts.dashboardLayout.footer')
