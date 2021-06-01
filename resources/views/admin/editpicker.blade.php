@extends("layouts.master")

@section("content")
    <div class="row align-items-center p-4 mb-3">
        <h4>Farm Tea Picker Management</h4>
    </div>

    <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card card-accent-primary">
                    <div class="card-header">
                        <h4>Summary</h4>
                    </div>
                    <div class="card-body">
                            <h5>{{$picker->fname}} {{$picker->lname}}</h5>
                            <p class="text-muted">Full Names</p>
                            <h5>{{$picker->email}}</h5>
                            <p class="text-muted">E-mail Address</p>
                            <h5>{{$picker->detail->phone}}</h5>
                            <p class="text-muted">Phone Number</p>
                            <h5>{{date('M d, Y',strtotime($picker->updated_at))}}</h5>
                            <p class="text-muted">Appointed On</p>

                    </div>
                </div>
            </div>
        <div class="col-md-8">
            <div class="card card-accent-primary">
                <div class="card-header">
                    <h1>Account Information</h1>
                    <p class="text-muted">Edit Tea Picker Information</p>
                </div>
                <div class="card-body">
                            <form id="editForm" action="/pickers/{{$picker->id}}" method="POST">
                                @method('PATCH')
                                @csrf
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="c-icon cil-user"></i>
                                                            </span>
                                    </div>
                                    <input value="{{$picker->fname}}"
                                           class="form-control @error('fname') is-invalid @enderror" name="fname"
                                           type="text" placeholder="First Name">
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
                                    <input value="{{ $picker->lname }}"
                                           class="form-control @error('lname') is-invalid @enderror" name="lname"
                                           type="text" placeholder="Last Name">
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
                                    <input value="{{ $picker->email }}"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           type="email" placeholder="Email">
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
                                    <select class="form-control @error('gender') is-invalid @enderror" name="gender"
                                            type="text" required>
                                        @if($picker->gender === 'm')
                                            <option selected value="m">Male</option>
                                            <option value="f">Female</option>
                                        @else
                                            <option value="m">Male</option>
                                            <option selected value="f">Female</option>
                                        @endif
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
                                        <i id="flag" class="c-icon cil-flag-alt"></i>
                                    </span>
                                    </div>
                                    <select name="nationality" id="nationality"
                                            class="form-control @error('nationality') is-invalid @enderror">
                                        @if($picker->detail->nationality === 'ke')
                                            <option selected value="ke">Kenya</option>
                                            <option value="tz">Tanzania</option>
                                            <option value="ug">Uganda</option>
                                        @elseif($picker->detail->nationality === 'tz')
                                            <option value="ke">Kenya</option>
                                            <option selected value="tz">Tanzania</option>
                                            <option value="ug">Uganda</option>
                                        @else
                                            <option value="ke">Kenya</option>
                                            <option value="tz">Tanzania</option>
                                            <option selected value="ug">Uganda</option>
                                        @endif
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
                                    <input value="{{ $picker->detail->national_id }}"
                                           class="form-control @error('national_id') is-invalid @enderror"
                                           name="national_id" type="text" placeholder="National Id">
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
                                    <input value="{{ $picker->detail->phone }}"
                                           class="form-control @error('phone') is-invalid @enderror" name="phone"
                                           type="text">
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div style="overflow:auto;">
                                    <div style="float:right;">
                                        <button class="btn btn-primary" type="submit">Update Picker</button>
                                    </div>
                                </div>
                            </form>
                </div>
            </div>
        </div>
    </div>


@endsection
