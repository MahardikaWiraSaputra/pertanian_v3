 <div class="content">
    <div class="row">
        <div class="col-12 col-md-6 col-lg-12 col-xl-12">
            <div class="card stats-docs">
                <div class="card-header">
                    <h4 class="card-title d-inline-block">Statistik Pengguna TTE</h4> <a href="<?php echo base_url('administrator/documents/') ?>" class="btn btn-primary float-right">Lihat Semua</a>
                </div>
                <div class="card-body">
                    <div id="tte_stats"></div>
                </div>
            </div>
        </div>
<!--         <div class="col-12 col-md-6 col-lg-4 col-xl-4">
            <div class="card user-panel">
                <div class="card-header bg-white">
                    <h4 class="card-title mb-0">Pengguna TTE</h4>
                </div>
                <div class="card-body">
                    <div class="bar-chart">
                            <div class="chart clearfix" id="show_apis">

                            </div>
                    </div>
                </div>
                <div class="card-footer text-center bg-white"> <a href="#" class="text-muted" id="show_statistik">Lihat Statistik</a></div>
            </div>
        </div> -->
    </div>
</div>


<script type="text/javascript">
    $(function () {
        var chart = new Highcharts.Chart({
            chart: {
                renderTo: 'tte_stats',
                type: 'bar',
            },
            title: {
                text: ''
            },
            xAxis: {
                categories: <?php echo $chart_label; ?>,
                title: {
                    text: null
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Jumlah Perizinan',
                    align: 'high'
                },
                labels: {
                    overflow: 'justify'
                }
            },
            tooltip: {
                valueSuffix: ' Izin'
            },
            plotOptions: {
                bar: {
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            legend: {
                enabled: false,
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'Jumlah Perizinan',
                data: <?php echo $chart_value; ?>,
            }]
        });
    });

 
</script>