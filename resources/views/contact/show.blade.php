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
                        <label class="control-label">Alamat</label>
                        <input type="text" name="alamat" class="form-control" value="{{$kontak->alamat }}"  readonly>
                    </div>
                    <div class="form-grup">
                        <label class="control-label">No Telepon</label>
                        <input type="text" name="no_tel" class="form-control" value="{{$kontak->no_tel }}"  readonly>
                    </div>
                    <div class="form-grup">
                        <label class="control-label">Email</label>
                        <input type="text" name="email" class="form-control" value="{{$kontak->email }}"  readonly>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection