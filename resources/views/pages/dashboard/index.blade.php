@extends('layouts.app')
@section('title')
Dashboard
@endsection
@section('content')
<!-- [ Main Content ] start -->
<div class="row">
    <div class="col-lg-7 col-md-12">
        <!-- support-section start -->
        <div class="row">
            <div class="col-sm-6">
                <div class="card support-bar overflow-hidden">
                    <div class="card-body pb-0">
                        <h2 class="m-0">{{ $meetings }}</h2>
                        <span class="text-c-blue">{{ __('admin/general.dashboard.meetings.title') }}</span>
                        <p class="mb-3 mt-3">Total number of meetings created.</p>
                    </div>
                    <div id="support-chart"></div>
                    <div class="card-footer bg-primary text-white">
                        <div class="row text-center">
                            <div class="col">
                                <h4 class="m-0 text-white">10</h4>
                                <span>{{ __('admin/general.dashboard.meetings.pending') }}</span>
                            </div>
                            <div class="col">
                                <h4 class="m-0 text-white">5</h4>
                                <span>{{ __('admin/general.dashboard.meetings.postponed') }}</span>
                            </div>
                            <div class="col">
                                <h4 class="m-0 text-white">3</h4>
                                <span>{{ __('admin/general.dashboard.meetings.cancelled') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card support-bar overflow-hidden">
                    <div class="card-body pb-0">
                        <h2 class="m-0">{{ $registered }}</h2>
                        <span class="text-c-green">{{ __('admin/general.dashboard.registered.title') }}</span>
                        <p class="mb-3 mt-3">Total number of participants registered.</p>
                    </div>
                    <div id="support-chart1"></div>
                    <div class="card-footer bg-success text-white">
                        <div class="row text-center">
                            <div class="col">
                                <h4 class="m-0 text-white">10</h4>
                                <span>Open</span>
                            </div>
                            <div class="col">
                                <h4 class="m-0 text-white">5</h4>
                                <span>Running</span>
                            </div>
                            <div class="col">
                                <h4 class="m-0 text-white">3</h4>
                                <span>Solved</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- support-section end -->
    </div>
    <div class="col-lg-5 col-md-12">
        <!-- page statustic card start -->
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h4 class="text-c-yellow">{{ $projects }}</h4>
                                <h6 class="text-muted m-b-0">Projects</h6>
                            </div>
                            <div class="col-4 text-right">
                                <i class="feather icon-bar-chart-2 f-28"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-c-yellow">
                        <div class="row align-items-center">
                            <div class="col-9">
                                <p class="text-white m-b-0">% change</p>
                            </div>
                            <div class="col-3 text-right">
                                <i class="feather icon-trending-up text-white f-16"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h4 class="text-c-green">{{ $programmes }}</h4>
                                <h6 class="text-muted m-b-0">Programmes</h6>
                            </div>
                            <div class="col-4 text-right">
                                <i class="feather icon-file-text f-28"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-c-green">
                        <div class="row align-items-center">
                            <div class="col-9">
                                <p class="text-white m-b-0">% change</p>
                            </div>
                            <div class="col-3 text-right">
                                <i class="feather icon-trending-up text-white f-16"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h4 class="text-c-red">{{ $recordings }}</h4>
                                <h6 class="text-muted m-b-0">Recordings</h6>
                            </div>
                            <div class="col-4 text-right">
                                <i class="feather icon-calendar f-28"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-c-red">
                        <div class="row align-items-center">
                            <div class="col-9">
                                <p class="text-white m-b-0">% change</p>
                            </div>
                            <div class="col-3 text-right">
                                <i class="feather icon-trending-down text-white f-16"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h4 class="text-c-blue">{{ $support_request }}</h4>
                                <h6 class="text-muted m-b-0">Support</h6>
                            </div>
                            <div class="col-4 text-right">
                                <i class="feather icon-thumbs-down f-28"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-c-blue">
                        <div class="row align-items-center">
                            <div class="col-9">
                                <p class="text-white m-b-0">% change</p>
                            </div>
                            <div class="col-3 text-right">
                                <i class="feather icon-trending-down text-white f-16"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- page statustic card end -->
    </div>
    @include('includes.full_calendar')
</div>
<!-- [ Main Content ] end -->

@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/plugins/fullcalendar.min.css') }}">
@endsection
@section('js')
<!-- Apex Chart -->
<script src="{{ asset('assets/js/plugins/apexcharts.min.js') }}"></script>
<!-- custom-chart js -->
<script src="{{ asset('assets/js/pages/dashboard-main.js') }}"></script>
<script>
    $(document).ready(function () {
        checkCookie();
    });

    function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        var expires = "expires=" + d.toGMTString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    function getCookie(cname) {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }

    function checkCookie() {
        var ticks = getCookie("modelopen");
        if (ticks != "") {
            ticks++;
            setCookie("modelopen", ticks, 1);
            if (ticks == "2" || ticks == "1" || ticks == "0") {
                $('#exampleModalCenter').modal();
            }
        } else {
            // user = prompt("Please enter your name:", "");
            $('#exampleModalCenter').modal();
            ticks = 1;
            setCookie("modelopen", ticks, 1);
        }
    }

</script>
<!-- [ Full-calendar ] end -->
<!-- Full calendar js -->
<script src="{{ asset('assets/js/plugins/moment.js') }}"></script>
<script src="{{ asset('assets/js/plugins/jquery-ui.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/fullcalendar.min.js') }}"></script>
<script type="text/javascript">
    // Full calendar


    function randomDate() {
        start = new Date()
        end = new Date('2022')
        return new Date(start.getTime() + Math.random() * (end.getTime() - start.getTime()))
    }

    $(window).on('load', function () {
        $('#external-events .fc-event').each(function () {
            $(this).data('event', {
                title: $.trim($(this).text()),
                stick: true
            });
            $(this).draggable({
                zIndex: 999,
                revert: true,
                revertDuration: 0
            });
        });
        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            defaultDate:  new Date(),
            editable: true,
            droppable: true,
            events: {
                url: "{{ route('calendar') }}",
                extraParams: function() {
                    return {
                        cachebuster: new Date().valueOf()
                    };
                 },
            },
            drop: function () {
                if ($('#drop-remove').is(':checked')) {
                    $(this).remove();
                }
            }
        });
    });
</script>
@endsection
