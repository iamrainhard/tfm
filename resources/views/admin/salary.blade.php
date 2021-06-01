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
        <h4>Farm Payments Management</h4>
    </div>
    @if($psalary === null || $ssalary === null)
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
                    <div class="card-header">Salary & Commission Set</div>
                    <div class="card-body">
                        <form action="/salary" method="POST">
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
                                        <option selected disabled value="">Choose Whose for</option>
                                        @if($psalary === null)
                                            <option selected value="picker">Pickers</option>
                                        @elseif($ssalary === null)
                                            <option selected value="supervisor">Supervisor</option>
                                        @endif
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
                                           name="salary" placeholder="Salary Amount" value="{{ old('salary') }}"
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
                                           value="{{ old('commission') }}"
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
    @else
        <div class="row">
            <div class="col-md-12">
                <div class="card card-accent-warning">
                    <div class="card-header">Current Salaries & Commission</div>
                    <div class="card-body">
                        <table class="table table-responsive-sm table-hover table-outline mb-0">
                            <thead class="thead-light">
                            <tr>
                                <th>Name</th>
                                <th class="text-center">Salary</th>
                                <th class="text-center">Commission</th>
                                <th class="text-center">Last Updated On</th>
                                <th class="text-center">Edit</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <div>Picker's Salary & Commission</div>
                                </td>
                                <td class="text-center">
                                    <div>{{$psalary->salary}}</div>
                                </td>
                                <td class="text-center">
                                    <div>{{$psalary->commission}}</div>
                                </td>
                                <td class="text-center">
                                    <div>{{date('M d, Y', strtotime($psalary->updated_at))}}</div>
                                </td>
                                <td class="text-center">
                                    <a href="/salary/{{$psalary->id}}/edit" class="text-primary"><i
                                            class="fa fa-user-edit"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div>Supervisor's Salary & Commission</div>
                                </td>
                                <td class="text-center">
                                    <div>{{$ssalary->salary}}</div>
                                </td>
                                <td class="text-center">
                                    <div>{{$ssalary->commission}}</div>
                                </td>
                                <td class="text-center">
                                    <div>{{date('M d, Y', strtotime($ssalary->updated_at))}}</div>
                                </td>
                                <td class="text-center">
                                    <a href="/salary/{{$ssalary->id}}/edit" class="text-primary"><i
                                            class="fa fa-user-edit"></i></a>
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
