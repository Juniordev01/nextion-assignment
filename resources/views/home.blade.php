@include('layouts.dashboardLayout.header')
@include('layouts.dashboardLayout.sidebar')
@include('layouts.dashboardLayout.body')



<div class="row" style="margin-top: 20px;">
    <div class="col-lg-12">
        <div class="card bg-yellow-100 border-0 shadow">
            <div class="card-header d-sm-flex flex-row align-items-center flex-0">
                <div class="d-block mb-3 mb-sm-0">
                    <div class="fs-5 fw-normal mb-2">User</div>
                    <h2 class="fs-3 fw-extrabold" id="userCount"></h2>
                    <div class="small">
                        <span class="fas fa-angle-up text-success"></span>
                    </div>
                </div>

            </div>
            <div class="card-body">
                <canvas id="userChart"></canvas>
            </div>
        </div>
    </div>
</div>

<script>
    var userCount = <?php echo $userCountFromDatabase; ?>;

    document.getElementById('userCount').textContent = userCount;

    var ctx = document.getElementById('userChart').getContext('2d');
    var userChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Users'],
            datasets: [{
                label: 'User Count',
                data: [userCount],
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                legend: {
                    display: false
                }
            },
            maintainAspectRatio: false,
            height: 150
        }
    });
</script>

@extends('layouts.dashboardLayout.footer')
