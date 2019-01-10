@extends('layouts.master')
@section('title')
    <title>Instrumen Laporan Kejadian - iPSKBS</title>
@endsection

@section('head-section')
    <div class="page-header-content">
        <div class="page-title">
            <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Dashboard</h4>
        </div>
        <div class="heading-elements">
            <div class="heading-btn-group">
                <a href="#" class="btn btn-link btn-float text-size-small has-text"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
                <a href="#" class="btn btn-link btn-float text-size-small has-text"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
                <a href="#" class="btn btn-link btn-float text-size-small has-text"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
            </div>
        </div>
    </div>
@endsection
@section('breadcumb')
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a></li>
            <li>Instrumen</li>
            <li class="active">Laporan Kejadian Bencana Sosial</li>
        </ul>
        <ul class="breadcrumb-elements">
            <li class="">
                <a href="{{url('data-bantuan-jaminan')}}" class=""><span class="label label-info"><< Kembali</span></a>
            </li>
        </ul>
    </div>
@endsection

@section('konten')

<div class="row">
    
    @if (Session::has('pesan'))
		<div class="col-md-12">
			<div class="alert alert-info alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
				<strong>Informasi </strong>
				<ul style="font-size:12px;margin-top:5px;">
						<li>{{ Session::get('pesan') }}</li>
					
				</ul>
			</div>
		</div>
    @endif
   
    <div class="col-md-12">    
        <div class="panel panel-flat" style="min-height:350px !important;">
			<div class="panel-heading">
                <h3 class="panel-title">Detail Laporan</h3>   
                
            </div>
            <div class="container-fluid">
                <div class="row" style="padding:10px;">
                    <div class="col-md-7">
                        <h3>Data</h3>
                        <div class="row" style="margin-bottom:10px;border-bottom:1px solid #eee;">
                            <div class="col-md-4">No Laporan</div>
                            <div class="col-md-1 text-right">:</div>
                            <div class="col-md-7"><b>{{$data->no_laporan}}</b></div>
                        </div>
                        <div class="row" style="margin-bottom:10px;border-bottom:1px solid #eee;">
                            <div class="col-md-4">Nama Petugas</div>
                            <div class="col-md-1 text-right">:</div>
                            <div class="col-md-7"><b>{{isset($data->user->sdm->nama_lengkap) ? ucwords($data->user->sdm->nama_lengkap) : ucwords($data->user->name)}}</b></div>
                        </div>
                        <div class="row" style="margin-bottom:10px;border-bottom:1px solid #eee;">
                            <div class="col-md-4">Asal Instansi</div>
                            <div class="col-md-1 text-right">:</div>
                            <div class="col-md-7"><b>{{isset($data->user->sdm->kedudukan) ? ($data->user->sdm->kedudukan) : 'n/a'}}</b></div>
                        </div>
                        <div class="row" style="margin-bottom:10px;border-bottom:1px solid #eee;">
                            <div class="col-md-4">Jenis Bencana</div>
                            <div class="col-md-1 text-right">:</div>
                            <div class="col-md-7"><b>{{isset($data->jenis->jenis) ? $data->jenis->jenis : 'n/a'}}</b></div>
                        </div>
                        
                        <div class="row" style="margin-bottom:10px;border-bottom:1px solid #eee;">
                            <div class="col-md-4">Lokasi Pengungsi</div>
                            <div class="col-md-1 text-right">:</div>
                            <div class="col-md-7"><b>{{$data->lokasi}}</b></div>
                        </div>
                        <div class="row" style="margin-bottom:10px;border-bottom:1px solid #eee;">
                            <div class="col-md-4">Kronologi Kejadian</div>
                            <div class="col-md-1 text-right">:</div>
                            <div class="col-md-7"><b>{{$data->kronologis}}</b></div>
                        </div>
                        <div class="row" style="margin-bottom:10px;border-bottom:1px solid #eee;">
                            <div class="col-md-4">Jumlah Pengungsi</div>
                            <div class="col-md-1 text-right">:</div>
                            <div class="col-md-7"><b>{{$data->total_pengungsi}} Orang</b></div>
                        </div>
                        <div class="row" style="margin-bottom:10px;border-bottom:1px solid #eee;">
                            <div class="col-md-4">Jumlah Dewasa (Laki-laki)</div>
                            <div class="col-md-1 text-right">:</div>
                            <div class="col-md-7"><b>{{$data->total_dewasa_lk}} Orang</b></div>
                        </div>
                        <div class="row" style="margin-bottom:10px;border-bottom:1px solid #eee;">
                            <div class="col-md-4">Jumlah Dewasa (Perempuan)</div>
                            <div class="col-md-1 text-right">:</div>
                            <div class="col-md-7"><b>{{$data->total_dewasa_pr}} Orang</b></div>
                        </div>
                        <div class="row" style="margin-bottom:10px;border-bottom:1px solid #eee;">
                            <div class="col-md-4">Jumlah Anak-anak (Laki-laki)</div>
                            <div class="col-md-1 text-right">:</div>
                            <div class="col-md-7"><b>{{$data->total_anak_lk_6_17}} Orang</b></div>
                        </div>
                        <div class="row" style="margin-bottom:10px;border-bottom:1px solid #eee;">
                            <div class="col-md-4">Jumlah Anak-anak (perempuan)</div>
                            <div class="col-md-1 text-right">:</div>
                            <div class="col-md-7"><b>{{$data->total_anak_pr_6_17}} Orang</b></div>
                        </div>
                        <div class="row" style="margin-bottom:10px;border-bottom:1px solid #eee;">
                            <div class="col-md-4">Jumlah Balita</div>
                            <div class="col-md-1 text-right">:</div>
                            <div class="col-md-7"><b>{{$data->total_balita_0_5}} Orang</b></div>
                        </div>
                        <div class="row" style="margin-bottom:10px;border-bottom:1px solid #eee;">
                            <div class="col-md-4">Jumlah Lansia</div>
                            <div class="col-md-1 text-right">:</div>
                            <div class="col-md-7"><b>{{$data->total_lansia}} Orang</b></div>
                        </div>
                    </div>  
                    <div class="col-md-5">
                        <h3>STATUS LAPORAN</h3>
                        <div class="row" style="width:95%">
                            @if ($data->status==0)
                                <div class="col-md-12" style="margin-bottom:0px;">
                                    <div class="alert alert-danger text-center" style="padding:0px 10px 10px;margin-bottom:5px;margin-bottom:5px;">
                                        <h2>Belum Diverifikasi</h2>
                                    </div>  
                                </div>
                                <div class="col-md-6" style="margin-top:0px;padding-top:0px;">
                                    <button type="button" class="btn bg-blue-700 btn-float btn-float-lg legitRipple" style="font-size:30px;width:100%;height:40px;padding-top:5px;" data-popup="tooltip" title="" data-original-title="Klik Untuk Verifikasi" onclick="verifikasi({{$data->id}})">
                                        <i class="icon-check"></i>
                                    </button>
                                </div>
                                <div class="col-md-6" style="margin-top:0px;padding-top:0px;">
                                    <button type="button" class="btn bg-danger-700 btn-float btn-float-lg legitRipple" style="font-size:30px;width:100%;height:40px;padding-top:5px;" data-popup="tooltip" title="" data-original-title="Data Tidak Lengkap" onclick="tidaklengkap({{$data->id}})">
                                        <i class="icon-cross"></i>
                                    </button>
                                </div>
                            @elseif($data->status=='1')
                                <div class="col-md-12">
                                    <div class="alert alert-success text-center" style="padding:0px 10px 10px;margin-bottom:5px">
                                        <h2>Sudah Diverifikasi</h2>
                                    </div>  
                                </div>
                                <div class="col-md-9" style="">
                                    <a href="{{url('cetak-laporan-bj/'.$data->id)}}" class="btn bg-blue-700 btn-float btn-float-lg legitRipple" style="font-size:30px;width:100%;height:40px;padding-top:5px;" data-popup="tooltip" title="" data-original-title="Cetak Berkas">
                                        <i class="icon-printer"></i>
                                    </a>
                                </div>   
                                <div class="col-md-3" style="">
                                    <a href="javascript:uploadnodin({{$data->id}})" class="btn bg-green-700 btn-float btn-float-lg legitRipple" style="font-size:30px;width:100%;height:40px;padding-top:5px;" data-popup="tooltip" title="" data-original-title="Upload Nota Dinas Kasubdit">
                                        <i class="icon-upload"></i>
                                    </a>
                                </div>   
                            @elseif($data->status=='2')
                                <div class="col-md-12">
                                    <div class="alert alert-info text-center" style="padding:0px 10px 10px;margin-bottom:5px">
                                        <h2>Proses Rekomendasi</h2>
                                    </div>  
                                </div>
                                <div class="col-md-4" style="">
                                    <a href="javascript:disposisidir({{$data->id}})" class="btn bg-blue-700 btn-float btn-float-lg legitRipple" style="font-size:30px;width:100%;height:40px;padding-top:5px;" data-popup="tooltip" title="" data-original-title="Setujui Laporan">
                                        <i class="icon-check"></i> Disetujui
                                    </a>
                                </div>   
                                <div class="col-md-4" style="">
                                    <a href="#" class="btn bg-orange-700 btn-float btn-float-lg legitRipple" style="font-size:30px;width:100%;height:40px;padding-top:5px;" data-popup="tooltip" title="" data-original-title="Sedang Di Telaah ">
                                        <i class="icon-exclamation"></i> Ditelaah
                                    </a>
                                </div>   
                                <div class="col-md-4" style="">
                                    <a href="javascript:ditolak({{$data->id}})" class="btn bg-danger-700 btn-float btn-float-lg legitRipple" style="font-size:30px;width:100%;height:40px;padding-top:5px;" data-popup="tooltip" title="" data-original-title="Laporan Ditolak">
                                        <i class="icon-cross"></i> Ditolak
                                    </a>
                                </div>  
                             @elseif($data->status=='3a')
                                <div class="col-md-12">
                                    <div class="alert alert-success text-center" style="padding:0px 10px 10px;margin-bottom:5px">
                                        <h2>Telah Di Setujui</h2>
                                    </div>  
                                </div>
                                <div class="col-md-12" style="">
                                    <a href="javascript:uploadsk({{$data->id}})" class="btn bg-blue-700 btn-float btn-float-lg legitRipple" style="font-size:30px;width:100%;height:40px;padding-top:5px;" data-popup="tooltip" title="" data-original-title="Unggah SK">
                                        <i class="icon-upload"></i> Unggah SK
                                    </a>
                                </div>  
                             @elseif($data->status=='4')
                                <div class="col-md-12">
                                    <div class="alert alert-success text-center" style="padding:0px 10px 10px;margin-bottom:5px">
                                        <h2><i class="icon-check"></i> Laporan Telah Di Setujui</h2>
                                    </div>  
                                </div>
                               
                            @elseif($data->status=='1b')
                                <div class="col-md-12">
                                    <div class="alert alert-warning text-center" style="padding:0px 10px 10px">
                                        <h2>Laporan Tidak Lengkap</h2>
                                    </div>  
                                </div>
                            @elseif($data->status=='3b')
                                <div class="col-md-12">
                                    <div class="alert alert-danger text-center" style="padding:0px 10px 10px">
                                        <h2>Laporan Tidak Disetujui</h2>
                                    </div>  
                                </div>
                                
                            @else    
                            @endif
                            @if ($data->nodin_kasubdit!=null)
                                <div class="row" style="padding-left:20px;margin-top:10px;">
                                    <div class="col-md-4">File Disposisi Kasubdit</div>
                                    <div class="col-md-1">:</div>
                                        <div class="col-md-7"><a href="{{url('lihat-dokumen/'.$data->nodin_kasubdit)}}" target="_blank">{{$data->nodin_kasubdit}}</a></div>
                                </div>
                            @endif
                            @if ($data->nodin_kasubdit!=null)
                                <div class="row" style="padding-left:20px;margin-top:10px;">
                                    <div class="col-md-4">File Disposisi Direktur</div>
                                    <div class="col-md-1">:</div>
                                        <div class="col-md-7"><a href="{{url('lihat-dokumen/'.$data->nodin_direktur)}}" target="_blank">{{$data->nodin_direktur}}</a></div>
                                </div>
                                <div class="row" style="padding-left:20px;margin-top:10px;">
                                    <div class="col-md-4">Disposisi Direktur</div>
                                    <div class="col-md-1">:</div>
                                    <div class="col-md-7"><b>{{$data->disposisi_direktur}}</b></div>
                                </div>
                            @endif
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('modal')
<div class="modal fade" id="modalverifikasi" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Konfirmasi Verifikasi Data Laporan</h4>
				</div>
				<div class="modal-body">
					<h5>Apakah anda yakin akan memverifikasi data ini?</h5>
				</div>
				<div class="modal-footer">
					<button type="button" data-dismiss="modal" class="btn btn-default">Batal</button>
					<a class="btn btn-info" onclick="event.preventDefault(); document.getElementById('form-verifikasi').submit();" style="cursor:pointer;">Ya, Saya Yakin</a>
					<form id="form-verifikasi" method="POST" style="display: none;">
						@csrf
						
					</form>
				</div>
			</div>
		</div>
	</div>
<div class="modal fade" id="modaluploadnodin" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Upload Nota Dinas Kasubdit</h4>
				</div>
				<div class="modal-body">
                    <form id="form-upload" method="POST" style="" enctype="multipart/form-data">
						@csrf
                        <div class="form-group">	
                            <label>File Nota Dinas</label>
                            <input type="file" name="notadinas" id="notadinas" class="form-control" placeholder="Nota Dinas">
                        </div>
                    </form>
				</div>
				<div class="modal-footer">
					<button type="button" data-dismiss="modal" class="btn btn-default">Batal</button>
					<a class="btn btn-info" onclick="event.preventDefault(); document.getElementById('form-upload').submit();" style="cursor:pointer;">Ya, Saya Yakin</a>
				</div>
			</div>
		</div>
	</div>
<div class="modal fade" id="modaluploadsk" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Upload SK Direktur</h4>
				</div>
				<div class="modal-body">
                    <form id="form-upload-sk" method="POST" style="" enctype="multipart/form-data">
						@csrf
                        <div class="form-group">	
                            <label>File SK</label>
                            <input type="file" name="sk" id="sk" class="form-control" placeholder="SK">
                        </div>
                    </form>
				</div>
				<div class="modal-footer">
					<button type="button" data-dismiss="modal" class="btn btn-default">Batal</button>
					<a class="btn btn-info" onclick="event.preventDefault(); document.getElementById('form-upload-sk').submit();" style="cursor:pointer;">Ya, Saya Yakin</a>
				</div>
			</div>
		</div>
	</div>
<div class="modal fade" id="modaldisposisi" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Disposisi Direktur</h4>
				</div>
				<div class="modal-body">
                    <form id="form-disposisi" method="POST" style="" enctype="multipart/form-data">
						@csrf
                        <div class="form-group">	
                            <textarea class="form-control" cols="40" rows="8" name="disposisi" id="disposisi"></textarea>
                        </div>
                    </form>
				</div>
				<div class="modal-footer">
					<button type="button" data-dismiss="modal" class="btn btn-default">Batal</button>
					<a class="btn btn-info" onclick="event.preventDefault(); document.getElementById('form-disposisi').submit();" style="cursor:pointer;">Ya, Saya Yakin</a>
				</div>
			</div>
		</div>
	</div>
@endsection
@section('footscript')
<script>
    function verifikasi(id)
    {
        $('#form-verifikasi').attr('action', "{{ url('data-bantuan-jaminan-verifikasi') }}/"+id)	
        $('#modalverifikasi').modal('show');
    }
    function tidaklengkap(id)
    {
        $('#form-verifikasi').attr('action', "{{ url('data-bantuan-jaminan-tidak-lengkap') }}/"+id)	
        $('#modalverifikasi').modal('show');
    }
    function uploadnodin(id)
    {
        $('#form-upload').attr('action', "{{ url('data-bantuan-jaminan-upload-nodin') }}/"+id)	
        $('#modaluploadnodin').modal('show');
    }
    function uploadsk(id)
    {
        $('#form-upload-sk').attr('action', "{{ url('data-bantuan-jaminan-upload-sk') }}/"+id)	
        $('#modaluploadsk').modal('show');
    }
    function disposisidir(id)
    {
        $('#form-disposisi').attr('action', "{{ url('data-bantuan-jaminan-disposisi') }}/"+id)	
        $('#modaldisposisi').modal('show');
    }
</script>
@endsection
