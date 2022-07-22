
               <div class="modal fade" id="addpersonel" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content" >
                            <div class="modal-header">
                                    <h3 class="modal-title" id="myModalLabel">Add Personel</h3>
                                      
                                    </div>
                                            <div class="modal-body" >
                                           
                                                                    <form method="POST" action="{{ route('register') }}">
                                                                        @csrf

                                                                                <div class="input-group">
                                                                                    <div class="input-group-prepend">
                                                                                        <span class="input-group-text" id="title" style="width:170px;">Name</span>
                                                                                    </div>
                                                                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                                                                    @error('name')
                                                                                        <span class="invalid-feedback" role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                               <br>
                                                                                <div class="input-group">
                                                                                    <div class="input-group-prepend">
                                                                                        <span class="input-group-text" id="title" style="width:170px;">Email</span>
                                                                                    </div>
                                                                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                                                                    @error('email')
                                                                                        <span class="invalid-feedback" role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                                <br>

                                                                                <div class="input-group">
                                                                                    <div class="input-group-prepend">
                                                                                        <span class="input-group-text" id="title" style="width:170px;">Password</span>
                                                                                    </div>
                                                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                                                                @error('password')
                                                                                    <span class="invalid-feedback" role="alert">
                                                                                        <strong>{{ $message }}</strong>
                                                                                    </span>
                                                                                @enderror
                                                                                </div>

                                                                                <br>
                                                                    
                                                                                <div class="input-group">
                                                                                    <div class="input-group-prepend">
                                                                                        <span class="input-group-text" id="title" style="width:170px;">Confirm Password</span>
                                                                                    </div>
                                                                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                                                                  
                                                                                 </div>

                                                                        
                                                                         

                                                                        <div class="modal-footer">
                                                                            <button type="submit" class="btn btn-primary">Save Report</button>
                                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                        </div>
                                                                    </form>
                                            </div>

                           
                            </div>
                        </div>
                    </div>
                </div>