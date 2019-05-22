@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="container">
	    <div class="col-md-12"><br>
                <div class="panel panel-primary">
                    <div class="panel-heading"><b>TAMHBAH DATA CAREER<b>
                    <br>
			        <br> 
                    <div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
                    </div>
                </div>
			    <div class="panel-body">
			  	    <form action="{{ route('career.store') }}" method="post" enctype="multipart/form-data">
			  		    @csrf
			  		    <div class="form-group {{ $errors->has('nama') ? ' has-error' : '' }}">
			  			    <label class="control-label">Nama</label>	
			  			    <input type="text" name="nama" class="form-control"  required>
						  
			  			    @if ($errors->has('nama'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nama') }}</strong>
                                </span>
                            @endif
			  		    </div>

                          <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
			  			    <label class="control-label">Email</label>	
			  			    <input type="text" name="email" class="form-control"  required>
						  
			  			    @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                          </div>

                          <div class="form-group {{ $errors->has('no_tel') ? ' has-error' : '' }}">
			  			    <label class="control-label">No Telepon</label>	
			  			    <input type="text" name="no_tel" class="form-control"  required>
						  
			  			    @if ($errors->has('no_tel'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('no_tel') }}</strong>
                                </span>
                            @endif
                          </div>
                          
                          <div class="form-group {{ $errors->has('cv') ? ' has-error' : '' }}">
			  			    <label for="cc-payment" class="control-label mb-1">CV</label>
                            <input type="file" name="cv" class="form-control" required>
                              
			  			    @if ($errors->has('vc'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('vc') }}</strong>
                                </span>
                            @endif
                          </div>

                          <div class="form-group {{ $errors->has('subyek') ? ' has-error' : '' }}">
			  			    <label class="control-label">Subyek</label>	
			  			    <input type="text" name="subyek" class="form-control"  required>
						  
			  			    @if ($errors->has('subyek'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('subyek') }}</strong>
                                </span>
                            @endif
                          </div>

			  		      <div class="form-group {{ $errors->has('deskripsi') ? ' has-error' : '' }}">
			  			    <label class="control-label">Deskripsi</label>	
                            <textarea id="text" type="ckeditor" name="deskripsi" class="ckeditor"  required></textarea>
                              
			  			    @if ($errors->has('deskripsi'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('deskripsi') }}</strong>
                                </span>
                            @endif
			  		      </div>

			  		    <div class="form-group">
			  			    <button type="submit" class="btn btn-outline-primary">Tambah</button>
			  		    </div>
			  	    </form>
			    </div>	
	    </div>
    </div>
	<script type="text/javascript" src="{{asset ('ckeditor/ckeditor.js')}}"></script>
</div>
@endsection