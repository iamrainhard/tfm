@extends("layouts.master")

@section("content")
{{--    <div class="row align-items-center p-4 mb-3">--}}
{{--        <h4>Farm Tea Picker Management</h4>--}}
{{--    </div>--}}

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-accent-primary">
                <div class="card-header">
                    <h1>Production Record Information</h1>
                    <p class="text-muted">Edit Production Information</p>
                </div>
                <div class="card-body">
                    <form action="/production/{{$prod->id}}" method="POST">
                        @method('PATCH')
                        @csrf
                        <div class="row flex-row">
                            <div class="input-group col-md-6">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="c-icon cil-user"></i>
                                    </span>
                                </div>
                                <select id="user_id" class="form-control @error('user_id') is-invalid @enderror"
                                        name="user_id">
                                    <option selected value="{{$prod->user_id}}">{{$prod->user->fname}} {{$prod->user->lname}}</option>
                                </select>
                                @error('user_id')
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
                                <input id="quantity" class="form-control @error('quantity') is-invalid @enderror"
                                       type="number" step="any"
                                       name="quantity" placeholder="Quantity in Kilograms" value="{{ $prod->quantity }}"
                                       autocomplete="quantity">
                                @error('quantity')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
