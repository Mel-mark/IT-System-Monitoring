@extends('layouts.app')

@section('content')
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                                <div class="input-group mb-3">
                                       <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" >
                                       <div class="input-group-append">
                                              <div class="input-group-text">
                                                     <i class="fas fa-user" style="font-size:25px;"></i>
                                              </div>
                                       </div>
                                </div>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                           

                                <div class="input-group mb-3">
                                                 <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                                                 <div class="input-group-append">
                                                        <div class="input-group-text">
                                                               <span class="fas fa-lock"  style="font-size:25px;"></span>
                                                        </div>
                                                 </div>
                                          </div>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            <div >
                                <div>
                                    <div class="form-check" style="float:left;">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                    <div style="float:right;">
                                            <!-- @if (Route::has('password.request'))
                                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                                    {{ __('Forgot Your Password?') }}
                                                </a>
                                            @endif -->
                                    </div>
                                </div>
                            </div>
                            <br>
                            <br>
                        <div class="row mb-0">
                            <div >
                                <button type="submit"  class="btn btn-primary btn-block" style="float:left">Log in</button>
                            </form>
                            <form method="POST" action="{{ route('login') }}">
                            @csrf
                                <input type="text" class="form-control" name="email" id="email" value="guest@gmail.com" hidden>
                                <input type="password" class="form-control" name="password" value="12345678"  hidden>
                                <button type="submit" type="button" class="btn btn-primary btn-block" style="float:right;margin-top:-25px;"> 
                                    Log in as guest
                                </button>
                              
                            </form>

                                  
                                  
                                
                            </div>
                        </div>
                 
               
@endsection
