@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-sm-6 col-lg-3">
                    <div class="card text-white bg-primary">
                        <div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
                            <div>
                                <div class="text-value-lg">9.823 Kg</div>
                                <div>This Month</div>
                            </div>
                        </div>
                        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                            <div class="chartjs-size-monitor">
                                <div class="chartjs-size-monitor-expand">
                                    <div class=""></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink">
                                    <div class=""></div>
                                </div>
                            </div>
                            <canvas class="chart chartjs-render-monitor" id="card-chart1" height="70"
                                    style="display: block; width: 347px; height: 70px;" width="347"></canvas>
                            <div id="card-chart1-tooltip" class="c-chartjs-tooltip top bottom"
                                 style="opacity: 0; left: 83.9824px; top: 127.858px;">
                                <div class="c-tooltip-header">
                                    <div class="c-tooltip-header-item">May</div>
                                </div>
                                <div class="c-tooltip-body">
                                    <div class="c-tooltip-body-item"><span class="c-tooltip-body-item-color"
                                                                           style="background-color: rgb(50, 31, 219);"></span><span
                                            class="c-tooltip-body-item-label">My First dataset</span><span
                                            class="c-tooltip-body-item-value">51</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card text-white bg-info">
                        <div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
                            <div>
                                <div class="text-value-lg">9.823 Kg</div>
                                <div>Total Picked</div>
                            </div>
                        </div>
                        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                            <div class="chartjs-size-monitor">
                                <div class="chartjs-size-monitor-expand">
                                    <div class=""></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink">
                                    <div class=""></div>
                                </div>
                            </div>
                            <canvas class="chart chartjs-render-monitor" id="card-chart1" height="70"
                                    style="display: block; width: 347px; height: 70px;" width="347"></canvas>
                            <div id="card-chart1-tooltip" class="c-chartjs-tooltip top bottom"
                                 style="opacity: 0; left: 83.9824px; top: 127.858px;">
                                <div class="c-tooltip-header">
                                    <div class="c-tooltip-header-item">May</div>
                                </div>
                                <div class="c-tooltip-body">
                                    <div class="c-tooltip-body-item"><span class="c-tooltip-body-item-color"
                                                                           style="background-color: rgb(50, 31, 219);"></span><span
                                            class="c-tooltip-body-item-label">My First dataset</span><span
                                            class="c-tooltip-body-item-value">51</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card text-white bg-warning">
                        <div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
                            <div>
                                <div class="text-value-lg">9.823 Tsh</div>
                                <div>Current Salary</div>
                            </div>
                        </div>
                        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                            <div class="chartjs-size-monitor">
                                <div class="chartjs-size-monitor-expand">
                                    <div class=""></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink">
                                    <div class=""></div>
                                </div>
                            </div>
                            <canvas class="chart chartjs-render-monitor" id="card-chart1" height="70"
                                    style="display: block; width: 347px; height: 70px;" width="347"></canvas>
                            <div id="card-chart1-tooltip" class="c-chartjs-tooltip top bottom"
                                 style="opacity: 0; left: 83.9824px; top: 127.858px;">
                                <div class="c-tooltip-header">
                                    <div class="c-tooltip-header-item">May</div>
                                </div>
                                <div class="c-tooltip-body">
                                    <div class="c-tooltip-body-item"><span class="c-tooltip-body-item-color"
                                                                           style="background-color: rgb(50, 31, 219);"></span><span
                                            class="c-tooltip-body-item-label">My First dataset</span><span
                                            class="c-tooltip-body-item-value">51</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card text-white bg-danger">
                        <div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
                            <div>
                                <div class="text-value-lg">9.823 Tsh</div>
                                <div>Current Commission</div>
                            </div>
                        </div>
                        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                            <div class="chartjs-size-monitor">
                                <div class="chartjs-size-monitor-expand">
                                    <div class=""></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink">
                                    <div class=""></div>
                                </div>
                            </div>
                            <canvas class="chart chartjs-render-monitor" id="card-chart1" height="70"
                                    style="display: block; width: 347px; height: 70px;" width="347"></canvas>
                            <div id="card-chart1-tooltip" class="c-chartjs-tooltip top bottom"
                                 style="opacity: 0; left: 83.9824px; top: 127.858px;">
                                <div class="c-tooltip-header">
                                    <div class="c-tooltip-header-item">May</div>
                                </div>
                                <div class="c-tooltip-body">
                                    <div class="c-tooltip-body-item"><span class="c-tooltip-body-item-color"
                                                                           style="background-color: rgb(50, 31, 219);"></span><span
                                            class="c-tooltip-body-item-label">My First dataset</span><span
                                            class="c-tooltip-body-item-value">51</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
