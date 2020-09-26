<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h4 class="page-title mb-0">Dashboard</h4>
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="#">J&M Médica</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </div>

            </div>

        </div>
    </div>
</div>
<!-- end row -->

<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card mini-stats">
            <div class="p-3 mini-stats-content">
                <div class="mb-4">
                    <div class="float-right text-right">

                    </div>
                </div>
            </div>
            <div class="ml-3 mr-3">
                <div class="bg-white p-3 mini-stats-desc rounded">
                    <h5 class="float-right mt-0">$ </h5>
                    <h6 class="mt-0 mb-3">Ventas</h6>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card mini-stats">
            <div class="p-3 mini-stats-content">
                <div class="mb-4">
                    <div class="float-right text-right">

                    </div>
                </div>
            </div>
            <div class="ml-3 mr-3">
                <div class="bg-white p-3 mini-stats-desc rounded">
                    <h5 class="float-right mt-0">$ </h5>
                    <h6 class="mt-0 mb-3">Crédito</h6>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card mini-stats">
            <div class="p-3 mini-stats-content">
                <div class="mb-4">
                    <div class="float-right text-right">

                    </div>
                </div>
            </div>
            <div class="ml-3 mr-3">
                <div class="bg-white p-3 mini-stats-desc rounded">
                    <h5 class="float-right mt-0">$ </h5>
                    <h6 class="mt-0 mb-3">Transferencia</h6>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card mini-stats">
            <div class="p-3 mini-stats-content">
                <div class="mb-4">
                    <div class="float-right text-right">

                    </div>
                </div>
            </div>
            <div class="ml-3 mr-3">
                <div class="bg-white p-3 mini-stats-desc rounded">
                    <h5 class="float-right mt-0">$ </h5>
                    <h6 class="mt-0 mb-3">Efectivo</h6>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- end row -->

<div class="row">

    <div class="col-12 col-md-4">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Title</h3>
                        <canvas id="myChart" width="400" height="400"></canvas>
                        <script>
                            var ctx = document.getElementById('myChart').getContext('2d');
                            var chart = new Chart(ctx, {
                                // The type of chart we want to create
                                type: 'pie',

                                // The data for our dataset
                                data: {
                                    labels: ['Banco', 'Caja'],
                                    datasets: [{
                                        label: 'Flujo de caja',
                                        backgroundColor: [
                                            'rgb(21,140,164)',
                                            'rgb(22,49,90)',
                                        ],
                                        borderColor: 'rgb(208,219,226)',
                                        data: [40, 60]
                                    }]
                                },

                                // Configuration options go here
                                options: {}
                            });
                        </script>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <div class="col-12 col-md-8">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Flujo de dinero</h3>
                        <center>
                            <table class="table table-striped table-inverse table-responsive">
                                <thead class="thead-inverse">
                                    <tr>
                                        <th width="80%">Total en banco</th>
                                        <th width="20%">12,3456.00</th>

                                    </tr>
                                    <tr>
                                        <th width="80%">Total en caja</th>
                                        <th width="20%">12,3456.00</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td width="80%" scope="row">Total</td>
                                        <td width="20%">12,3456.00</td>

                                    </tr>

                                </tbody>
                            </table>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>