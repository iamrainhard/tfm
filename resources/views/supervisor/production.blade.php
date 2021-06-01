@extends('layouts.master')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-5">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
        </div>
    </div>

    <div class="row p-4">
        <h4>Daily Production Management</h4>
    </div>

    <div class="row align-items-center mb-3 p-2">
        <div class="col-md-12">
            <div class="card card-accent-warning">
                <div class="card-body">
                    <form action="/production" method="POST">
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
                            <div class="input-group col-md-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="c-icon cil-line-weight"></i>
                                    </span>
                                </div>
                                <input id="quantity" class="form-control @error('quantity') is-invalid @enderror"
                                       type="number" step="any"
                                       name="quantity" placeholder="Quantity in Kilograms" value="{{ old('quantity') }}"
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

    <div class="row">
        <div class="col-md-12">
            <div class="card card-accent-warning">
                <div class="card-header">Today's Records</div>
                <div class="card-body">
                    @if($prods->isNotEmpty())
                        <table class="table table-responsive-sm table-hover table-outline mb-0">
                            <thead class="thead-light">
                            <tr>
                                <th><i class="c-icon cil-people"></i> Names</th>
                                <th class="text-center">Phone</th>
                                <th class="text-center">Quantity</th>
                                <th class="text-center">Recorded Time</th>
                                <th class="text-center">Edit</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($prods as $prod)
                                <tr>
                                    <td>
                                        <div>{{$prod->user->fname}} {{$prod->user->lname}}</div>
                                        <div class="small text-muted"><span
                                                class="text-capitalize">{{$prod->user->role}}</span> |
                                            Registered:
                                            {{date('M d, Y',strtotime($prod->user->created_at))}}</div>
                                    </td>
                                    <td class="text-center">
                                        <div>{{$prod->user->detail->phone}}</div>
                                    </td>
                                    <td class="text-center">
                                        <div>{{$prod->quantity}}</div>
                                    </td>
                                    <td class="text-center">
                                        <div>{{date('H:i', strtotime($prod->created_at))}}</div>
                                    </td>
                                    <td class="text-center">
                                        <a href="/production/{{$prod->id}}/edit" class="text-primary"><i
                                                class="fa fa-user-edit"></i></a>
                                        |
                                        <a href="/production/delete/{{$prod->id}}" class="text-danger">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="alert alert-danger">
                            No data available. Try Adding new Records!
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>

{{--    <!-- Delete Modal -->--}}
{{--    <div class="modal fade" id="deleteModal" data-backdrop="static" data-keyboard="false" tabindex="-1"--}}
{{--         aria-labelledby="deleteModalLabel" aria-hidden="true">--}}
{{--        <div class="modal-dialog">--}}
{{--            <div class="modal-content">--}}
{{--                <div class="modal-header">--}}
{{--                    <h4 class="modal-title" id="deleteModalLabel">Confirm Picker Delete</h4>--}}
{{--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                        <span aria-hidden="true">&times;</span>--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--                <div class="modal-body">--}}
{{--                    <p>Are You sure you want to delete this User? Press <strong><span class="text-danger">Confirm</span></strong>--}}
{{--                        to continue or Cancel to abort!</p>--}}
{{--                </div>--}}
{{--                <div class="modal-footer">--}}
{{--                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>--}}
{{--                    <button type="button" class="btn btn-danger"--}}
{{--                            onclick="document.getElementById('deleteForm').submit();">Confirm Delete--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection
