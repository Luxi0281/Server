<html lang="{{ strtolower(app()->getLocale()) }}">
@include('auth_includes.head')
<body>
<!-- Material form login -->

<form class="form-signin" method="post" action="{{ url('/login') }}" style = "margin-bottom: 200px;" autocomplete="off">
	{!! csrf_field() !!}
      <div class="text-center mb-5">
        <img class="mb-4 wow animated rollIn" src="https://i.imgur.com/rnicYbw.png" alt="" width="128" height="128">
        <h1 class="h3 mb-3 font-weight-normal">{!! trans('auth.header') !!}</h1>
		<h5>@lang('auth.form_header')</h5>
      </div>

    <!-- Material input email -->
    <div class="md-form has-feedback{{ $errors->has('email') ? ' error' : '' }}">
        <i class="fa fa-envelope prefix has-feedback{{ $errors->has('email') ? ' error' : '' }}"></i>
        <input type="email" id="materialFormLoginEmailEx" class="form-control" name="email" autocomplete="off" value="{{ old('email') }}">
        <label for="materialFormLoginEmailEx">@lang('auth.email')</label>
		@if ($errors->has('email'))
         <span class="help-block">
             <i class="slowRotate fas fa-times-circle mr-2" style = "color: #ff3547"></i><strong class = "text-danger">{{ $errors->first('email') }}</strong>
         </span>
        @endif
    </div>

    <!-- Material input password -->
    <div class="md-form has-feedback{{ $errors->has('password') ? ' error' : '' }}">
        <i class="fa fa-lock prefix has-feedback{{ $errors->has('password') ? ' error' : '' }}"></i>
        <input type="password" id="materialFormLoginPasswordEx" class="form-control" name="password" autocomplete="off">
        <label for="materialFormLoginPasswordEx">@lang('auth.password')</label>
		@if ($errors->has('password'))
           <span class="help-block">
             <i class="slowRotate fas fa-times-circle mr-2" style = "color: #ff3547;"></i><strong class = "text-danger">{{ $errors->first('password') }}</strong>
           </span>
        @endif
    </div>
    <div class="form-check my-4 ml-3">
           <input class="form-check-input" type="checkbox" id="defaultCheck12" style = "display: none;">
           <label for="defaultCheck12" class="ml-3">@lang('auth.rememberMe')</label>
     </div>
    <div class="text-center mt-4">
        <button type="submit" class="mt-2 mb-3 btn btn-lg btn-success btn-block center-block"><i class="fas fa-sign-in-alt mr-1"></i>@lang('auth.signIn')</button>
    </div>
</form>
<!-- Material form login -->
</body>
@include('auth_includes.scripts')
</html>