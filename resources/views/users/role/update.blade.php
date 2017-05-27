@extends('layouts.app')
@section('content')
<section class="content">
    <div class="row">
        <div class="col-sm-12">
          <div class="box box-white">

                <!-- form start -->
                {!! Form::model($item, array('method' => 'PATCH', 'url' => 'role/'.$item['id'],'class'=>'form-horizontal')) !!}
                    @include('users.role.partials.form')

                    <div class="box-footer">
                        <button type="submit" name="save" class="btn btn-success">Update</button>
                        <a class="btn btn-danger" href="{{ url('role') }}">Cancel</a>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</section>    
@stop