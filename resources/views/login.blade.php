@extends('layouts.master')


@section('content')

<!-- LOGIN -->
<section>
    <div class="login">
        <div class="container">
            <div class="row">

                <div class="inn">
                    <div class="lhs">
                        <div class="tit">
                            <h2>Now <b>Find <br> your life partner</b> Easy and fast.</h2>
                        </div>
                        <div class="im">
                            <img src="images/ban1.jpg" alt="">
                        </div>
                        <div class="log-bg">&nbsp;</div>
                    </div>
                    <div class="rhs">
                        <div>
                            <div class="form-tit">
                                <h4>Start for free</h4>
                                <h1>Sign in to Matrimony</h1>
                                <p>Not a member? <a href="/signup">Sign up now</a></p>
                            </div>
                            <div class="form-login">
                                <form method="POST" action="{{ url('/login') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label class="lb">Email:</label>
                                        <input type="email" class="form-control" id="email"
                                            placeholder="Enter email" name="email" value="{{ old('email') }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="lb">Password:</label>
                                        <input type="password" class="form-control" id="pwd"
                                            placeholder="Enter password" name="password" required>
                                    </div>
                                    <div class="form-group form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember
                                            me
                                        </label>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Sign in</button>
                                </form>
                            </div>
                            @if ($errors->any())
                            <div class="alert alert-danger mt-2">
                                {{ $errors->first() }}
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- END -->

@endsection