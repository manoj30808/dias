 @extends('layouts.app')
@section('content')
<section class="content">
    <div class="row">
        <div class="col-sm-12">
          <div class="box box-white">

                <!-- form start -->
                {!! Form::open(array('url'=>"user",'class'=>'form-horizontal')) !!}
                    @include('users.user.partials.form')
                
                    <div class="box-footer">
                        <button type="submit" name="save" class="btn btn-success">Save</button>
                        <a class="btn btn-danger" href="{{ url('user') }}">Cancel</a>
                    </div>
                {!! Form::close() !!}

            </div>
        </div>
    </div>
</section>    
@stop