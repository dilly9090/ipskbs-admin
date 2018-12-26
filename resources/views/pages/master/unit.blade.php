@extends('layouts.master')
@section('title')
    <title>Unit Kerja - SIMANDAT</title>
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
            <li class="active">Master Unit Kerja</li>
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
					@if ($errors->has('singkatan'))
						<li> &nbsp; - {{ $errors->first('singkatan') }}</li>
					@endif
					@if ($errors->has('provinsi'))
						<li> &nbsp; - {{ $errors->first('provinsi') }}</li>
					@endif
					@if ($errors->has('kabupaten'))
						<li> &nbsp; - {{ $errors->first('kabupaten') }}</li>
					@endif
				</ul>
			</div>
		</div>
    @endif
    <div class="col-md-12">
        <a href="" class="btn btn-xs btn-success pull-right" data-toggle="modal" data-target="#modaltambah">+ Tambah Data</a>
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
                            <th class="text-center">Provinsi</th>
                            <th class="text-center">Kabupaten</th>
                            <th class="text-center">Nama Unit</th>
                            <th>#</th>
                        </tr>
                    </thead>
                @php
                    $no=1;
                @endphp
                <tbody>
                    @foreach ($unit as $im)

                        <tr>
                                <td class="text-left"><b>{{$no}}</b></td>
                                <td class="text-left"><b>{{$im->provinsi->name}}</b></td>
                                <td class="text-left"><b>{{$im->kabupaten->name}}</b></td>
                                <td class="text-left"><b>{{$im->nama_unit}}</b></td>
                                
                                <td>
                                    <div style="width:100px">
                                        <a class="btn btn-xs btn-info btn-edit" data-toggle="modal" data-target="#modalubah" data-value="{{ $im->id }}">
                                                    <i class="icon-pencil"></i>
                                                </a>
                                        <a href="#" class="btn btn-xs btn-danger btn-delete" data-toggle="modal" data-target="#modalhapus" data-value="{{ $im->id }}">
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
	<div class="modal fade" id="modaltambah" tabindex="-1" role="dialog">
		<div class="modal-dialog ">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Tambah Data Unit</h4>
				</div>
				<div class="modal-body">
					<form action="{{ route('master-unit.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">	
                                    <label>Provinsi</label>
                                    <select name="provinsi" id="" palceholder="Nama Unit" class="selectbox" style="" onchange="pilihkab(this.value,'div_kab')">
                                        <option value="0">-Provinsi-</option>
                                        @foreach ($provinsi as $item)
                                            
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                            
                                        @endforeach
                                    </select>
                                </div>  
                                <div class="form-group">	
                                    <label>Kabupaten</label>
                                    <div id="div_kab">
                                        <select name="kabupaten" id="" palceholder="Kabupaten/Kota" class="selectbox" style="" >
                                            <option value="0">-Kabupaten-</option>
                                        </select>
                                    </div>
                                </div>  
                                <div class="form-group">	
                                    <label>Nama Unit</label>
                                    <input type="text" name="nama_unit" class="form-control" placeholder="Nama Unit">  
                                </div>  
                                <div class="form-group">	
                                    <label>Singkatan</label>
                                    <input type="text" name="singkatan" class="form-control" placeholder="Singkatan">  
                                </div>  
                                {{-- <div class="form-group">	
                                    <label>Nama Jabatan</label>
                                </div>   --}}
                                <input type="hidden" name="nama_jabatan" class="form-control" placeholder="Nama Jabatan">
                                <input type="hidden" name="id_eselon" class="form-control" placeholder="Nama Jabatan">
                                <input type="hidden" name="eselon" class="form-control" placeholder="Nama Jabatan">
                                {{-- <div class="form-group">	
                                    <label>Eselon</label>
                                    <select name="eselon" id="" palceholder="Eselon" class="selectbox" style="">
                                        <option>- Pilih -</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        
                                    </select>
                                </div>  
                                <div class="form-group">	
                                    <label>Nama Pimpinan</label>
                                    <div class="input-group">
										<span class="input-group-addon"><i class="icon-calendar5"></i></span>
										<select name="id_eselon" id="" palceholder="Pimpinan" class="selectbox" style="">
                                            <option>- Pilih -</option>
                                            @foreach($sdm  as $k =>$v)
                                                <option value="{{$v->id}}">{{$v->nip}} - {{$v->nama_lengkap}}</option>
                                            @endforeach
                                        </select>
									</div>
                                </div>   --}}
                                
                            </div>
                           
                        </div>
						
						
				</div>
				<div class="modal-footer">
					<button type="button" data-dismiss="modal" class="btn btn-default">Batal</button>
					<input type="submit" class="btn btn-success" value="Simpan">
				</div>
				</form>
			</div>
		</div>
	</div>

	<div class="modal fade" id="modalubah" tabindex="-1" role="dialog">
		<div class="modal-dialog ">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Ubah Data SDM</h4>
				</div>
				<div class="modal-body">
					<form id="form-update" method="POST" enctype="multipart/form-data">
						@csrf
						@method('PUT')
						<div class="row">
                            <div class="col-md-12">
                                <div class="form-group">	
                                    <label>Provinsi</label>
                                    <select name="provinsi" id="provinsi" palceholder="Nama Unit" class="selectbox" style="" onchange="pilihkab(this.value,'div_kab_edit')">
                                        <option value="0">-Provinsi-</option>
                                        @foreach ($provinsi as $item)
                                            
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                            
                                        @endforeach
                                    </select>
                                </div>  
                                <div class="form-group">	
                                    <label>Kabupaten</label>
                                    <div id="div_kab_edit">
                                        <select name="kabupaten" id="kabupaten" palceholder="Kabupaten/Kota" class="selectbox" style="" >
                                            <option value="0">-Kabupaten-</option>
                                        </select>
                                    </div>
                                </div>  
                                <div class="form-group">	
                                    <label>Nama Unit</label>
                                    <input type="text" name="nama_unit" id="nama_unit" class="form-control" placeholder="Nama Unit/Subdit/Seksi">  
                                </div>  
                                <div class="form-group">	
                                    <label>Singkatan</label>
                                    <input type="text" name="singkatan" id="singkatan" class="form-control" placeholder="Singkatan">  
                                </div> 
                                <input type="hidden" name="nama_jabatan" class="form-control" placeholder="Nama Jabatan">
                                <input type="hidden" name="id_eselon" class="form-control" placeholder="Nama Jabatan">
                                <input type="hidden" name="eselon" class="form-control" placeholder="Nama Jabatan">
                                
                            </div>
                        </div>  
				</div>
				<div class="modal-footer">
					<button type="button" data-dismiss="modal" class="btn btn-default">Batal</button>
					<input type="submit" class="btn btn-success" value="Simpan Perubahan">
				</div>
				</form>
			</div>
		</div>
	</div>

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
        // $('#table').DataTable();
        $(".selectbox").selectpicker({
            
        });
    	// binding data to modal edit
        $('#table').on('click', '.btn-edit', function(){
            var id = $(this).data('value')
			var kabupaten = $("select#kabupaten").selectpicker();
			var provinsi = $("select#provinsi").selectpicker();
			$.ajax({
                url: "{{ url('master-unit') }}/"+id+"/edit",
                success: function(res) {
					$('#form-update').attr('action', "{{ url('master-unit') }}/"+id)
					$('#nama_unit').val(res.nama_unit);
                    $('#singkatan').val(res.singkatan);
                    $('#kabupaten').val(res.sub_unit);
                    // $('#sub_unit').val(res.sub_unit);
                    // kabupaten.selectpicker('val', res.sub_unit);
                    provinsi.selectpicker('val', res.id_parent);
                   
                }
            })
        })

		// delete action
        $('#table').on('click', '.btn-delete', function(){
            var id = $(this).data('value')
			$('#form-delete').attr('action', "{{ url('master-unit') }}/"+id)			
        })
        
    });
    
    </script>
<style>
.selectbox {
    width: 100% !important;
}

</style>
@endsection