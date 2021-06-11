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
        <h4>Farm Revenue Management</h4>
    </div>
    @if($mrevenue === null || $yrevenue === null)
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="alert alert-warning">
                    Please set for all two groups first one at a time!
                </div>
            </div>
        </div>
        <div class="row align-items-center mb-3 p-2">
            <div class="col-md-12">
                <div class="card card-accent-warning">
                    <div class="card-header">Monthly & Yearly Revenue Set</div>
                    <div class="card-body">
                        <form action="/revenue" method="POST">
                            @csrf
                            <div class="row flex-row">
                                <div class="input-group col-md-5">
                                    <select id="name" class="form-control @error('name') is-invalid @enderror"
                                            name="name">
                                        <option selected disabled value="">Choose time</option>
                                        @if($mrevenue === null)
                                            <option selected value="monthly">Monthly Revenue</option>
                                        @elseif($yrevenue === null)
                                            <option selected value="yearly">Yearly Revenue</option>
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
                                           name="amount" placeholder="Revenue Amount per Kg" value="{{ old('amount') }}"
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
    @else
        <div class="row">
            <div class="col-md-12">
                <div class="card card-accent-warning">
                    <div class="card-header">Current Monthly & Yearly Revenue</div>
                    <div class="card-body">
                        <table class="table table-responsive-sm table-hover table-outline mb-0">
                            <thead class="thead-light">
                            <tr>
                                <th>Timespan</th>
                                <th class="text-center">Revenue Set</th>
                                <th class="text-center">Last Updated On</th>
                                <th class="text-center">Edit</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <div>Monthly Revenue</div>
                                </td>
                                <td class="text-center">
                                    <div>{{$mrevenue->amount}}</div>
                                </td>
                                <td class="text-center">
                                    <div>{{date('M d, Y', strtotime($mrevenue->updated_at))}}</div>
                                </td>
                                <td class="text-center">
                                    <a href="/revenue/{{$mrevenue->id}}/edit" class="text-primary"><i
                                            class="fa fa-edit"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div>Yearly Revenue</div>
                                </td>
                                <td class="text-center">
                                    <div>{{$yrevenue->amount}}</div>
                                </td>
                                <td class="text-center">
                                    <div>{{date('M d, Y', strtotime($yrevenue->updated_at))}}</div>
                                </td>
                                <td class="text-center">
                                    <a href="/revenue/{{$yrevenue->id}}/edit" class="text-primary"><i
                                            class="fa fa-edit"></i></a>
                                </td>
                            </tr>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endif


@endsection
