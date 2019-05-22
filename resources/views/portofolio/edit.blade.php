@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="container">
	    <div class="col-md-12"><br>
		    <div class="panel panel-primary">
			    <div class="panel-heading"><b>EDIT DATA PORTOFOLIO</b>
			    <br>
			    <br>
			    <div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			    </div>
			    </div>
			    <div class="panel-body">
			  	    <form action="{{ route('portofolio.update',$portofolios->id) }}" method="post" enctype="multipart/form-data">
			  		    <input name="_method" type="hidden" value="PATCH">
        			    @csrf

			  		<div class="form-group {{ $errors->has('judul') ? ' has-error' : '' }}">
			  			<label class="control-label">Judul</label>	
			  			<input type="text" name="judul" class="form-control" value="{{ $portofolios->judul }}"  required>
			  			@if ($errors->has('judul'))
                            <span class="help-block">
                                <strong>{{ $errors->first('judul') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                    	<label class="cc-payment" class="control-label mb-1">Gambar</label>
			  			@if (isset ($portofolios) && $portofolios->gambar)
			  			<p>
			  				<br>
			  				<img src="{{ asset('assetss/img/gambar/' .$portofolios->gambar)}}" style="max-height: 125px; max-width: 125px; margin-top: 7px;" alt="">
			  			</p>
			  			@endif
			  			<input type="file" name="gambar" value="{{ $portofolios->gambar }}">
                    </div>



			  		<div class="form-group {{ $errors->has('deskripsi') ? ' has-error' : '' }}">
			  			<label class="control-label">Deskripsi</label>	
			  			<textarea id="text" type="ckeditor" name="deskripsi" class="ckeditor" required>{{ $portofolios->deskripsi }}</textarea>
			  			@if ($errors->has('deskripsi'))
                            <span class="help-block">
                                <strong>{{ $errors->first('deskripsi') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group">
			  			<button type="submit" class="btn btn-outline-primary">Edit</button>
			  		</div>
			  	</form>
			  </div>
			</div>	
		</div>
	</div>
	<script type="text/javascript" src="{{asset ('ckeditor/ckeditor.js')}}"></script>
</div>
@endsection