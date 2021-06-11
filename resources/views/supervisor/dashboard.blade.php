@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-sm-6 col-lg-3">
                    <div class="card text-white bg-gradient-info">
                        <div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
                            <div>
                                <div class="text-value-lg">{{$pickerNums}}</div>
                                <div class="pb-4 text-capitalize">Total Registered Pickers</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card text-white bg-gradient-primary">
                        <div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
                            <div>
                                <div class="text-value-lg">{{$sumProds}} Kg</div>
                                <div class="pb-4 text-capitalize">Total Production</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card text-white bg-gradient-success">
                        <div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
                            <div>
                                <div class="text-value-lg">{{$salary->salary}} Tsh</div>
                                <div class="pb-4 text-capitalize">Current Monthly Salary</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="card card-accent-warning">
                        <div class="card-header">Latest Five Records</div>
                        <div class="card-body">
                            @if($latestProds->isNotEmpty())
                                <table class="table table-responsive-sm table-hover table-outline mb-0">
                                    <thead class="thead-light">
                                    <tr>
                                        <th><i class="c-icon cil-calendar"></i> Date of Record</th>
                                        <th><i class="c-icon cil-user"></i> Picked By</th>
                                        <th class="text-center">Quantity</th>
                                        <th class="text-center">Extra Quantity</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($latestProds as $prod)
                                        <tr>
                                            <td>
                                                <div>{{date('M d, Y H:i',strtotime($prod->created_at))}}</div>
                                            </td>
                                            <td>
                                                <div>{{$prod->user->fname}} {{$prod->user->lname}}</div>
                                            </td>
                                            <td class="text-center">
                                                <div>{{$prod->quantity}} Kg</div>
                                            </td>
                                            <td class="text-center">
                                                @if($prod->quantity > 17)
                                                    <div>{{$prod->quantity - 17}} Kg</div>
                                                @else
                                                    <div>0 Kg</div>
                                                @endif
                                            </td>
                                        </tr>

                                    @endforeach
                                    </tbody>
                                </table>
                            @else
                                <div class="alert alert-danger">
                                    No data available. Start by recording some!
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
