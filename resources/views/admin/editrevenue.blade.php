@extends("layouts.master")

@section("content")
    {{--    <div class="row align-items-center p-4 mb-3">--}}
    {{--        <h4>Farm Tea Picker Management</h4>--}}
    {{--    </div>--}}

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-accent-primary">
                <div class="card-header">
                    <h1>Revenue Information</h1>
                    <p class="text-muted">Edit Revenue Information</p>
                </div>
                <div class="card-body">
                    <form action="/revenue/{{$revenue->id}}" method="POST">
                        @method('PATCH')
                        @csrf
                        <div class="row flex-row">
                            <div class="input-group col-md-5">
                                <select id="name" class="form-control @error('name') is-invalid @enderror"
                                        name="name">
                                    @if($revenue->name ==='monthly')
                                        <option selected value="{{$revenue->name}}">Monthly Revenue</option>
                                    @else
                                        <option selected value="{{$revenue->name}}">Yearly Revenue</option>
                                    @endif
                                </select>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="input-group col-md-5">
                                <input id="amount" class="form-control @error('amount') is-invalid @enderror"
                                       type="number" step="any"
                                       name="amount" placeholder="Revenue Amount" value="{{ $revenue->amount }}"
                                       autocomplete="amount">
                                @error('amount')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="ml-auto">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
