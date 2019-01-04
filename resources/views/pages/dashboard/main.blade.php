<!-- Main charts -->
<?php
$InstrumenLaporanKejadian=\App\Models\InstrumenLaporanKejadian::all();
$InstrumenJHPKBS=\App\Models\InstrumenJHPKBS::all();
$InstrumenAssesmentPemulian=\App\Models\InstrumenAssesmentPemulian::all();
$InstrumenAssesment=\App\Models\InstrumenAssesment::all();
?>
					<div class="row">
						<div class="col-md-3">
							<div class="panel panel-body border-top-info text-center">
								<h6 class="no-margin text-semibold">Lap. Kejadian Bencana Sosial</h6>
								
								<a href="{{url('data-laporan')}}" class="btn bg-blue-700 btn-float btn-float-lg legitRipple" style="margin-top:20px;font-size:30px">{{number_format($InstrumenLaporanKejadian->count(),0,',','.')}}</a>
								
							</div>
						</div>
						<div class="col-md-3">
							<div class="panel panel-body border-top-info text-center">
								<h6 class="no-margin text-semibold">Bantuan Santunan Kematian</h6>
								
								<a href="{{url('data-bantuan-santunan')}}" class="btn bg-teal-700 btn-float btn-float-lg legitRipple" style="margin-top:20px;font-size:30px">{{number_format($InstrumenAssesment->count(),0,',','.')}}</a>
								
							</div>
						</div>
						<div class="col-md-3">
							<div class="panel panel-body border-top-info text-center">
								<h6 class="no-margin text-semibold">Bantuan Jaminan Hidup</h6>
								
								<a href="{{url('data-bantuan-jaminan')}}" class="btn bg-indigo-400 btn-float btn-float-lg legitRipple" style="margin-top:20px;font-size:30px">{{number_format($InstrumenJHPKBS->count(),0,',','.')}}</a>
								
							</div>
						</div>
						<div class="col-md-3">
							<div class="panel panel-body border-top-info text-center">
								<h6 class="no-margin text-semibold">Bantuan Bahan Bangunan</h6>
								
								<a href="{{url('data-bantuan-bahan-bangunan')}}" class="btn bg-purple-400 btn-float btn-float-lg legitRipple" style="margin-top:20px;font-size:30px">{{number_format($InstrumenAssesmentPemulian->count(),0,',','.')}}</a>
								
							</div>
						</div>
					</div>
					<!-- /main charts -->
<script>
var ctx = document.getElementById("myChart1").getContext('2d');
Chart.defaults.global.defaultFontFamily = "Lato";
Chart.defaults.global.defaultFontSize = 12;
Chart.defaults.global.defaultFontColor = '#fff';

var dData = {
    
    datasets: [
        {
            data: [133.3, 300.2],
            backgroundColor: [
                "#ffc300",
                "#004aaa",
            ]
        }]
};

var pieChart = new Chart(ctx, {
  type: 'pie',
  data: dData
});
</script>