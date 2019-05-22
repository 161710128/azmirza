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
                        <label class="control-label">Nama</label>
                        <input type="text" name="nama" class="form-control" value="{{$careers->nama }}"  readonly>
                    </div>
                    <div class="form-grup">
                        <label class="control-label">Email</label>
                        <input type="text" name="email" class="form-control" value="{{$careers->email }}"  readonly>
                    </div>
                    <div class="form-grup">
                        <label class="control-label">No Telepon</label>
                        <input type="text" name="no_tel" class="form-control" value="{{$careers->no_tel }}"  readonly>
                    </div>
                    <div class="form-grup">
                        <label class="control-label">CV</label>
                        <input type="text" name="cv" class="form-control" value="{{$careers->cv }}"  readonly>
                    </div>
                    <div class="form-grup">
                        <label class="control-label">Subyek</label>
                        <input type="text" name="subyek" class="form-control" value="{{$careers->subyek }}"  readonly>
                    </div>
                    <div class="form-grup">
                        <label class="control-label">Deskripsi</label>
                        <input type="text" name="deskripsi" class="form-control" value="{{$careers->deskripsi }}"  readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection