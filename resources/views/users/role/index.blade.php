@extends('layouts.app')
@include($view_path.'.partials.menu')

@section('content')
<!-- Main content -->
    <section class="content">
        @include($view_path.'.partials.search')

            
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="pull-left">
                            <h3 class="box-title">Listing</h3>
                        </div>
                        <div class="pull-right">
                            <h3 class="box-title">
                                <a class="btn btn-sm btn-primary" href="{{'role/create'}}">
                                    Add Role
                                </a>
                            </h3>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-condensed">    
                        @if($items->count())
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Display Name</th>
                                    <th width="160"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $value)
                                <tr>
                                    <td>{{$srno++ }}</td>
                                    <th>{{$value->name}}</th>
                                    <td>{{$value->display_name}}</td>
                                    <td>
                                    {!! Form::open(array('url' => $ctrl_url.'/'.$value->id,'method'=>'delete','class'=>'form-inline')) !!}
                                    <a class="btn btn-small btn-primary" href="{{url($ctrl_url.'/'.$value->id.'/permission')}}">
                                    <span class="glyphicon glyphicon-lock"></span></a>
                                     <a href="{{url($ctrl_url.'/'.$value->id.'/edit')}}" class="btn btn-small btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
                                    <button type="submit" class="btn btn-danger delete-confirm"><span class="glyphicon glyphicon-trash"></span></button>

                                    {!! Form::close() !!}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            @else
                            <tbody>
                                <tr>
                                    <th>There are no records</th>
                                </tr>
                            </tbody>
                            @endif
                        </table>
                    {!! $items->appends(Request::except(array('page')))->render() !!}
                </div>
            </div>
        </div>
    </div>
</section>
@stop
