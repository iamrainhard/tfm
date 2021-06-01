@extends("layouts.master")

@section("content")
    <div class="row justify-content-center">
        <div class="col-md-5">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
        </div>
    </div>


    <div class="row align-items-center p-4 mb-3">
        <h4>Farm Supervisor Management</h4>
        @if($supervisors->isEmpty())
            <a href="" class="btn btn-primary ml-auto" data-target="#appointModal" data-toggle="modal">Appoint a Supervisor</a>
        @else
            <a href="" class="btn btn-danger ml-auto" data-target="#appointModal" data-toggle="modal">Change Supervisor</a>
        @endif
    </div>

    <div class="row justify-content-center">
        @if($supervisors->isNotEmpty())
            <div class="col-md-4">
                <div class="card card-accent-primary">
                    <div class="card-header">
                        <h4>Summary</h4>
                    </div>
                    <div class="card-body">
                        @forelse($supervisors as $supervisor)
                            <h5>{{$supervisor->fname}} {{$supervisor->lname}}</h5>
                            <p class="text-muted">Full Names</p>
                            <h5>{{$supervisor->email}}</h5>
                            <p class="text-muted">E-mail Address</p>
                            <h5>{{$supervisor->detail->phone}}</h5>
                            <p class="text-muted">Phone Number</p>
                            <h5>{{date('M d, Y',strtotime($supervisor->updated_at))}}</h5>
                            <p class="text-muted">Appointed On</p>
                        @empty
                            <div></div>
                        @endforelse

                    </div>
                </div>
            </div>
        @endif
        <div class="col-md-8">
            <div class="card card-accent-primary">
                <div class="card-header">
                    <h1>Account Information</h1>
                    <p class="text-muted">Edit Supervisor Information</p>
                </div>
                <div class="card-body">
                    @if($supervisors->isEmpty())
                        <div class="alert alert-danger">
                            No Supervisor Appointed Yet! Try Appointing First.
                        </div>
                    @else
                        @foreach($supervisors as $supervisor)
                            <form id="editForm" action="/supervisor/edit/{{$supervisor->id}}" method="POST">
                                @method('PATCH')
                                @csrf
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="c-icon cil-user"></i>
                                                            </span>
                                    </div>
                                    <input value="{{$supervisor->fname}}"
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
                                    <input value="{{ $supervisor->lname }}"
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
                                    <input value="{{ $supervisor->email }}"
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
                                        @if($supervisor->gender === 'm')
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
                                        @if($supervisor->detail->nationality === 'ke')
                                            <option selected value="ke">Kenya</option>
                                            <option value="tz">Tanzania</option>
                                            <option value="ug">Uganda</option>
                                        @elseif($supervisor->detail->nationality === 'tz')
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
                                    <input value="{{ $supervisor->detail->national_id }}"
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
                                    <input value="{{ $supervisor->detail->phone }}"
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
                                        <button class="btn btn-primary" type="submit">Update Supervisor</button>
                                    </div>
                                </div>
                            </form>
                        @endforeach
                    @endif

                </div>
            </div>
        </div>
    </div>

    <!-- Appoint Modal -->
    <div class="modal fade" id="appointModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
         aria-labelledby="appointModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="/supervisor/appoint" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title" id="appointModalLabel">Appoint a Farm Supervisor</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="input-group ">
                            <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="c-icon cil-user"></i>
                                    </span>
                            </div>
                            <select id="user_id" class="form-control @error('user_id') is-invalid @enderror"
                                    name="user_id" required>
                                <option selected disabled value="">Choose a Picker</option>
                                @forelse($pickers as $picker)
                                    <option value="{{$picker->id}}">{{$picker->fname}} {{$picker->lname}}</option>
                                @empty
                                    <option class="text-danger" disabled value="">No active Picker Found!</option>
                                @endforelse
                            </select>
                            @error('user_id')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Confirm Appointment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
