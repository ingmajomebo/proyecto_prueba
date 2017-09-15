@extends('layouts.app')

@section('content')
<div class="app app-default">

    <div class="app-container app-login">
        <div class="flex-center">
            <div class="app-header"></div>
            <div class="app-body">

                <div class="app-block" style="border-top: 5px solid #0254a0;">
                              <div class="app-form">
                                <div class="form-header">
                                  <div class="app-brand"><span class="highlight">Banshee S.A</span> Admin</div>
                              </div>
                            <form action="{{ url('login')}}" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">   
                                  <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">
                                          <i class="fa fa-user" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="email" placeholder="Username" aria-describedby="basic-addon1" value="{{ old('email') }}" required autofocus />

                                  </div>
                                  @if ($errors->has('email'))
                                      <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                      </span>
                                  @endif
                                    <div class="input-group">
                                      <span class="input-group-addon" id="basic-addon2">
                                        <i class="fa fa-key" aria-hidden="true"></i></span>
                                        <input type="Password" class="form-control" name="password" placeholder="Password" aria-describedby="basic-addon2" required />
                                        @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                <div class="text-center">
                                    <input type="submit" class="btn btn-success btn-submit" value="Login">
                                </div>
                            </form><br>
                            <div class="app-footer">
                                    <a class="forgot-password button button-clear button-block" href="{{ url('password/reset')}}">
                                     Olvide mi contraseña?
                                    </a>
                            </div>
                             <div class="form-line">
                                <div class="title">OR</div>
                            </div>

                    </div>
                </div>
             </div>
        </div>
    </div>
</div>
@endsection
