<div class='box-body'>
    <!-- Name -->
    <div class='row'>
    <div class="User-title"><h1 class="user-title-inner ">User</h1></div>
        <div class='col-sm-6'>
            <div class="{{ $errors->has('name') ? 'has-error' : '' }}">
                <label class="control-label col-lg-3" for="name">Name</label>
                <div class="col-lg-8 input-box">
                    {!! Form::text('name',null,array('class'=>'form-control')) !!}
                    {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
                </div>
            </div>
        </div>
        <div class='col-sm-6'>
            <!-- Email -->
            <div class="{{ $errors->has('email') ? 'has-error' : '' }}">
                <label class="control-label col-lg-3" for="first_name">Email address</label>
                <div class="col-lg-8 input-box">
                    {!! Form::text('email',null,array('class'=>'form-control')) !!}
                    {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                </div>
            </div>
        </div>
    </div>

        <!-- Passowrd -->
    <div class='row'>
        <div class='col-sm-6'>
            <div class="{{ $errors->has('password') ? 'has-error' : '' }}">
                <label class="control-label col-lg-3" for="first_name">Password</label>
                <div class="col-lg-8 input-box">
                    {!! Form::password('password',array('class'=>'form-control')) !!}
                    {!! $errors->first('password', '<span class="help-block">:message</span>') !!}
                </div>
            </div>
        </div>

        <!-- Confirm Passowrd -->
        <div class='col-sm-6'>
            <div class="{{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                <label class="control-label col-lg-3" for="first_name">Confirm Password</label>
                <div class="col-lg-8 input-box">
                    {!! Form::password('password_confirmation',array('class'=>'form-control')) !!}
                    {!! $errors->first('password_confirmation', '<span class="help-block">:message</span>') !!}
                </div>
            </div>
        </div>
    </div>
    <div class='row'>
        <!--Role  -->
        <div class='col-sm-6'>
            <div class="{{ $errors->has('role_id') ? 'has-error' : '' }}">
                <label class="control-label col-lg-3" for="role_id">Select Roles</label>
                <div class="col-lg-8 input-box">
                    {!! Form::select('role_id[]',$roles,null,array('multiple'=>'multiple','class'=>'form-control')) !!}
                    {!! $errors->first('role_id[]', '<span class="help-block">:message</span>') !!}
                </div>
            </div>
        </div>
    </div>
</div>