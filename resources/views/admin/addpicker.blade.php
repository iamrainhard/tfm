@extends("layouts.master")

@section("content")
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-accent-info ">
                <div class="card-header">
                    <h4 class="" id="pickersRegister"><strong>Tea Picker Account Registration</strong></h4>
                </div>
                <div class="card-body">
                    <form id="regForm" action="{{ route('pickers.store') }}" method="POST">
                        @csrf
                        <div class="tab">
                            <h1>Account Information</h1>
                            <p class="text-muted">Enter login information</p>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="c-icon cil-user"></i>
                                                            </span>
                                </div>
                                <input value="{{ old('fname') }}"
                                       class="form-control @error('fname') is-invalid @enderror" name="fname"
                                       type="text" placeholder="First Name"
                                       oninput="this.className = 'form-control'">
                                @error('fname')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="c-icon cil-user"></i>
                                                            </span>
                                </div>
                                <input value="{{ old('lname') }}"
                                       class="form-control @error('lname') is-invalid @enderror" name="lname"
                                       type="text" placeholder="Last Name"
                                       oninput="this.className = 'form-control'">
                                @error('fname')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="c-icon cil-envelope-open"></i>
                                                            </span>
                                </div>
                                <input value="{{ old('email') }}"
                                       class="form-control @error('email') is-invalid @enderror" name="email"
                                       type="email" placeholder="Email"
                                       oninput="this.className = 'form-control'">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="c-icon cil-user"></i>
                                                            </span>
                                </div>
                                <select value="{{ old('gender') }}"
                                        class="form-control @error('gender') is-invalid @enderror" name="gender"
                                        type="text"
                                        oninput="this.className = 'form-control'" required>
                                    <option value="" selected disabled>Choose Gender</option>
                                    <option value="m">Male</option>
                                    <option value="f">Female</option>
                                </select>
                                @error('gender')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="c-icon cil-lock-locked"></i>
                                                            </span>
                                </div>
                                <input class="form-control @error('password') is-invalid @enderror" name="password"
                                       type="password" placeholder="Password"
                                       oninput="this.className = 'form-control'">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="c-icon cil-lock-locked"></i>
                                                            </span>
                                </div>
                                <input class="form-control @error('password_confirmation') is-invalid @enderror"
                                       name="password_confirmation" type="password"
                                       placeholder="Repeat password"
                                       oninput="this.className = 'form-control'">
                            </div>
                        </div>

                        <div class="tab">
                            <h1>Personal Details</h1>
                            <p class="text-muted">Enter Personal information</p>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i id="flag" class="c-icon"></i>
                                    </span>
                                </div>
                                <select value="{{ old('nationality') }}" name="nationality" id="nationality"
                                        class="form-control @error('nationality') is-invalid @enderror"
                                        oninput="selectFlag()">
                                    <option value="" selected disabled>Choose Country</option>
                                    <option value="ke">Kenya</option>
                                    <option value="tz">Tanzania</option>
                                    <option value="ug">Uganda</option>
                                </select>
                                @error('nationality')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="c-icon cil-user"></i>
                                    </span>
                                </div>
                                <input value="{{ old('national_id') }}"
                                       class="form-control @error('national_id') is-invalid @enderror"
                                       name="national_id" type="text" placeholder="National Id"
                                       oninput="this.className = 'form-control'">
                                @error('national_id')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="c-icon cil-mobile"></i>
                                    </span>
                                </div>
                                <input value="{{ old('phone') }}"
                                       class="form-control @error('phone') is-invalid @enderror" name="phone"
                                       type="text" placeholder="Phone Number E.g 255...."
                                       oninput="this.className = 'form-control'">
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="">
                            <div style="overflow:auto;">
                                <div style="float:right;">
                                    <button class="btn btn-primary" type="button" id="prevBtn" onclick="nextPrev(-1)">
                                        Previous
                                    </button>
                                    <button class="btn btn-success" type="button" id="nextBtn" onclick="nextPrev(1)">
                                        Next
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Circles which indicates the steps of the form: -->
                        <div style="text-align:center;margin-top:40px;">
                            <span class="step"></span>
                            <span class="step"></span>
                        </div>


                    </form>

                </div>
            </div>
        </div>
    </div>














@endsection
