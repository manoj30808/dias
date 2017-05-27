@extends('layouts.app')
@include($view_path.'.partials.menu')
@section('content')
<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Update Permission</h3>
            </div>
            <div class="panel-body">
                {!! Form::model($item, array('method' => 'PATCH', 'url' => $ctrl_url.'/'.$item['id'],'class'=>'form-horizontal')) !!}
                    @include($view_path.'.partials.form')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@stop