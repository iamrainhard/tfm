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


    <div class="row align-items-center p-4 mb-3">
        <h4>Tea Pickers Management</h4>
        <a href="/pickers/create" class="btn btn-primary ml-auto">Add a Picker</a>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-accent-success">
                <div class="card-header">List of all Registered Tea Pickers</div>
                <div class="card-body">
                    @if($pickers->isNotEmpty())
                        <table class="table table-responsive-sm table-hover table-outline mb-0">
                            <thead class="thead-light">
                            <tr>
                                <th><i class="c-icon cil-people"></i> Names</th>
                                <th class="text-center">Nationality</th>
                                <th>Phone</th>
                                <th>E-mail</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Edit</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($pickers as $picker)
                                <tr>
                                    <td>
                                        <div>{{$picker->fname}} {{$picker->lname}}</div>
                                        <div class="small text-muted"><span
                                                class="text-capitalize">{{$picker->role}}</span> |
                                            Registered:
                                            {{date('M d, Y',strtotime($picker->created_at))}}</div>
                                    </td>
                                    <td class="text-center">
                                        @if ($picker->detail->nationality === "ke")
                                            <i class="c-icon c-icon-xl cif-ke"></i>
                                        @elseif ($picker->detail->nationality === "tz")
                                            <i class="c-icon c-icon-xl cif-tz"></i>
                                        @elseif ($picker->detail->nationality === "ug")
                                            <i class="c-icon c-icon-xl cif-ug"></i>
                                        @endif
                                    </td>
                                    <td>
                                        <div>{{$picker->detail->phone}}</div>
                                    </td>
                                    <td>
                                        <div>{{$picker->email}}</div>
                                    </td>
                                    <td class="text-center">
                                        <div class="badge badge-success text-capitalize ">{{$picker->status}}</div>
                                    </td>
                                    <td class="text-center">
                                        <a href="/pickers/{{$picker->id}}" class="text-primary"><i
                                                class="fa fa-user-edit"></i></a>
                                        |
                                        <a href="/pickers/delete/{{$picker->id}}" class="text-danger">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="alert alert-danger">
                            No data available. Try Registering!
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
