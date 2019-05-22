@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="container">
        <div class="col-md-12">
            <div clas="pane panel-active">
                <div class="panel-heading">
                    <div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	    </div>
                </div>
                <div class="panel-body">
                    <div class="form-grup">
                        <label class="control-label">Judul</label>
                        <input type="text" name="judul" class="form-control" value="{{$portofolios->judul }}"  readonly>
                    </div>
                    
                    <div class="form-grup">
                        <label class="control-label">Gambar</label>
                        <input type="text" name="gambar" class="form-control" value="{{$portofolios->gambar }}"  readonly>
                    </div>
                   
                    <div class="form-grup">
                        <label class="control-label">Deskripsi</label>
                        <input type="text" name="deskripsi" class="form-control" value="{{$portofolios->deskripsi }}"  readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection