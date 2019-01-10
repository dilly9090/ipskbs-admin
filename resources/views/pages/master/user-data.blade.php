
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <input type="hidden" id="id_user" name="id_user" value="{{$user->id}}">	
                <label>NIP</label>
                <input type="text" name="nip" class="form-control" placeholder="NIP" value="{{($sdm) ? $sdm->nip : ''}}">
            </div>  
            <div class="form-group">	
                <label>Nama</label>
                <input type="text" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap" value="{{($sdm) ? $sdm->nama_lengkap : $user->name}}">
            </div>  
            <div class="form-group">	
                <label>Email</label>
                <input type="text" name="email" class="form-control" placeholder="Email" value="{{($sdm) ? $sdm->email : $user->email}}">
            </div>  
            <div class="form-group">	
                <label>No HP</label>
                <input type="text" name="tempat_lahir" class="form-control" placeholder="HP" value="{{($sdm) ? $sdm->tempat_lahir : ''}}">
            </div>  
            
            <div class="form-group">	
                <label>Dasar Penugasan</label>
                <input type="text" name="status_pegawai" class="form-control" placeholder="Dasar Penugasan" value="{{($sdm) ? $sdm->status_pegawai : ''}}">
            </div>  
            <div class="form-group">	
                <label>Asal Instansi</label>
                <input type="text" name="kedudukan" class="form-control" placeholder="Asal Instansi" value="{{($sdm) ? $sdm->kedudukan : ''}}">
            </div>  
            
        </div>
       
    </div>
