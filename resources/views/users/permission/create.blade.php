@extends('layouts.app')
@section('content')
<section class="content">
    <div class="row">
        <div class="col-sm-12">
          <div class="box box-white">

                <!-- form start -->
                {!! Form::open(array('url'=>$ctrl_url,'class'=>'form-horizontal')) !!}
                    @include('users.permission.partials.form')
                
                    <div class="box-footer">
                        <div class="pull-left">
                            <button type="submit" name="save" class="btn btn-success">Save</button>
                            <a class="btn btn-danger" href="{{ url($ctrl_url) }}">Cancel</a>
                        </div>
                    </div>
                {!! Form::close() !!}

            </div>
        </div>
    </div>
</section>    
@stop