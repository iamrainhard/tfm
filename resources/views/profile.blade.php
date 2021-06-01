@extends("layouts.master")

@section("content")
    <div class="row">
        <div class="col-sm-6 col-md-4">
            <div class="card border-primary">
                <div class="card-header text-center">
                    <div class="c-avatar">
                        <img class="c-avatar-img" src="/images/avatar.png" alt="User">
                    </div>
                    <div class="text-capitalize">
                        <strong>User Profile</strong>
                    </div>
                </div>
                <div class="card-body">
                    <div><strong>First Name:</strong> <span class="text-capitalize">{{Auth::user()->fname}}</span></div>
                    <div><strong>Last Name:</strong> <span class="text-capitalize">{{Auth::user()->lname}}</span></div>
                    @if(Auth::user()->role !== 'admin')
                        <div>
                            <strong>Phone Number:</strong>
                            <span class="text-capitalize">{{Auth::user()->detail->phone}}</span>
                        </div>
                    @endif
                    <div><strong>E-mail Address:</strong> <span>{{Auth::user()->email}}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6"></div>
    </div>









@endsection
