
<html>
<head>
    <!-- Bootstrap -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/assets/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="/assets/css/custom.min.css" rel="stylesheet">
    <link href="/assets/css/custom.css" rel="stylesheet">
</head>
<body class="login">

<div id="fullscreen_bg" class="fullscreen_bg"/>

<div class="container">

    <form class="form-signin" method="POST" action="{{ url('/handelLogin') }}">
        {{ csrf_field() }}
        <h1 class="form-signin-heading text-muted">Sign In</h1>
        <div class="{{ $errors->has('username') ? ' has-error' : '' }}">
        <input name="username" type="text" class="col-lg-offset-1 form-control" placeholder="Username" required="" autofocus="" >
            @if ($errors->has('username'))
                <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

        <input name="password" type="password" class=" col-lg-offset-1 form-control" placeholder="Password" required="">
            @if ($errors->has('password'))
                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
            @endif
        </div>
        <button class="col-lg-offset-1 btn btn-lg btn-primary btn-block" type="submit">
            Sign In
        </button>
    </form>

</div>




</body>


</html>