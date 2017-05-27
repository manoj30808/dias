@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in as <strong style="color:blue;"> @role('admin') Admin @endrole @role('user') User @endrole </strong> Role
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
