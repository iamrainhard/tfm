@extends("layouts.master")

@section("content")
    {{--    <div class="row align-items-center p-4 mb-3">--}}
    {{--        <h4>Farm Tea Picker Management</h4>--}}
    {{--    </div>--}}

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-accent-primary">
                <div class="card-header">
                    <h1>Payment Record Information</h1>
                    <p class="text-muted">Edit Payment Information</p>
                </div>
                <div class="card-body">
                    <form action="/salary/{{$salary->id}}" method="POST">
                        @method('PATCH')
                        @csrf
                        <div class="row flex-row">
                            <div class="input-group col-md-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="c-icon cil-user"></i>
                                    </span>
                                </div>
                                <select id="name" class="form-control @error('name') is-invalid @enderror"
                                        name="name">
                                    <option selected value="{{$salary->name}}">{{$salary->name}}</option>
                                </select>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="input-group col-md-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="c-icon cil-line-weight"></i>
                                    </span>
                                </div>
                                <input id="salary" class="form-control @error('salary') is-invalid @enderror"
                                       type="number" step="any"
                                       name="salary" placeholder="Salary Amount" value="{{ $salary->salary }}"
                                       autocomplete="salary">
                                @error('salary')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="input-group col-md-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="c-icon cil-line-weight"></i>
                                    </span>
                                </div>
                                <input id="commission"
                                       class="form-control @error('commission') is-invalid @enderror"
                                       type="number" step="any"
                                       name="commission" placeholder="Commission per Kg"
                                       value="{{ $salary->commission }}"
                                       autocomplete="commission">
                                @error('commission')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="ml-auto p-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
