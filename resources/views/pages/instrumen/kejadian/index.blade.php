@extends('layouts.master')
@section('title')
    <title>Instrumen Bantuan Jaminan Hidup - iPSKBS</title>
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
            <li class="active">Laporan Bantuan Jaminan Hidup</li>
        </ul>
        <ul class="breadcrumb-elements">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-gear position-left"></i>
                    Settings
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-right">
                    <li><a href="{{url('logout')}}"><i class="icon-switch"></i> Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
@endsection

@section('konten')

<div class="row">
    
    @if (Session::has('errors'))
		<div class="col-md-12">
			<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
				<strong>Oops, terjadi kesalahan. </strong>
				<ul style="font-size:12px;margin-top:5px;">
					@if ($errors->has('nama_unit'))
						<li> &nbsp; - {{ $errors->first('nama_unit') }}</li>
					@endif
					
				</ul>
			</div>
		</div>
    @endif
    <div class="col-md-12">
        {{-- <a href="" class="btn btn-xs btn-success pull-right" data-toggle="modal" data-target="#modaltambah">+ Tambah Data</a> --}}
    </div>
	<div class="col-lg-12">
		<!-- Traffic sources -->
		<div class="panel panel-flat" style="min-height:350px !important;">
			<div class="panel-heading">
                <h3 class="panel-title">Daftar Unit</h3>   
                
            </div>
            <div class="container-fluid">
                <table class="table table-basic table-striped" id="table">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">No Laporan</th>
                            <th class="text-center">Nama Petugas</th>
                            <th class="text-center">Asal Instansi</th>
                            <th class="text-center">Jenis Bencana</th>
                            <th class="text-center">Lokasi Pengungsian</th>
                            <th class="text-center">Status Laporan</th>
                            <th>#</th>
                        </tr>
                    </thead>
                @php
                    $no=1;
                @endphp
                <tbody>
                    @foreach ($data as $im)

                        <tr>
                                <td class="text-left"><b>{{$no}}</b></td>
                                <td class="text-left">{{$im->no_laporan}}</td>
                                <td class="text-left">{{isset($im->user->sdm->nama_lengkap) ? ucwords($im->user->sdm->nama_lengkap) : ucwords($im->user->name)}}</td>
                                <td class="text-left">{{isset($im->user->sdm->kedudukan) ? ($im->user->sdm->kedudukan) : 'n/a'}}</td>
                                 <td class="text-left">{{isset($im->jenis->jenis) ? $im->jenis->jenis : 'n/a'}}</td>
                                <td class="text-left">{{$im->lokasi}}</td>
                                <td>
                                    @if ($im->status==0)
                                        <span class="label label-warning">Belum Diverifikasi</span>
                                    @elseif ($im->status=='1')
                                        <span class="label label-success">Laporan Lengkap & Valid</span>
                                    @elseif ($im->status=='1b')
                                        <span class="label label-warning">Laporan Tidak Lengkap</span>
                                    @elseif ($im->status=='2')
                                        <span class="label label-info">Proses Rekomendasi</span>
                                    @elseif ($im->status=='3a')
                                        <span class="label label-success">Disetujui</span>
                                    @elseif ($im->status=='3c')
                                        <span class="label label-danger">Tidak Disetujui</span>
                                    @elseif ($im->status=='4')
                                        <span class="label label-success">Telah Disetujui</span>
                                    @elseif ($im->status=='4a')
                                        <span class="label label-info">Telah DI Bayarkan</span>
                                    @elseif ($im->status=='4b')
                                        <span class="label label-danger">Retur</span>
                                    @endif
                                </td>
                                <td>
                                    <div style="width:100px">
                                        <a class="btn btn-xs btn-success" href="{{url('data-bantuan-jaminan/'.$im->id)}}" style="padding:4px 5px !important" title="Detail Laporan">
                                                    <i class="icon-eye"></i>
                                                </a>
                                        {{-- <a class="btn btn-xs btn-info btn-edit" data-toggle="modal" data-target="#modalubah" data-value="{{ $im->id }}" style="padding:4px 5px !important">
                                                    <i class="icon-pencil"></i>
                                                </a> --}}
                                        <a href="#" class="btn btn-xs btn-danger btn-delete" data-toggle="modal" data-target="#modalhapus" data-value="{{ $im->id }}" style="padding:4px 5px !important">
                                        <i class="icon-trash"></i>
                                    </a>  
                                    </div> 
                                </td>
                            </tr>
                            @php
                                $nosub=1.;
                            @endphp
                       
                        @php
                            $no++;
                        @endphp
                    @endforeach


                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('modal')

	<div class="modal fade" id="modalhapus" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Konfirmasi Hapus Data Unit</h4>
				</div>
				<div class="modal-body">
					<h5>Apakah anda yakin akan menghapus data ini?</h5>
				</div>
				<div class="modal-footer">
					<button type="button" data-dismiss="modal" class="btn btn-default">Batal</button>
					<a class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('form-delete').submit();" style="cursor:pointer;">Ya, Saya Yakin</a>
					<form id="form-delete" method="POST" style="display: none;">
						@csrf
						@method('DELETE')
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection
@section('footscript')
    <script type="text/javascript" src="{{asset('assets/js/plugins/forms/selects/bootstrap_select.min.js')}}"></script>
    <script>
    function pilihkab(val,selector)
    {
        $('#'+selector).load('{{url("/")}}/pilih-kab/'+val,function(){
            $(".selectbox").selectpicker();
        });
    }
    $(document).ready(function(){
        $('#table').DataTable();
        $(".selectbox").selectpicker({
            
        });
    	// binding data to modal edit
        
    });
    
    </script>
<style>
.selectbox {
    width: 100% !important;
}

</style>
@endsection