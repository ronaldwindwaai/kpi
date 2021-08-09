@extends('layouts.app')
@section('title')
    {{ $title }}
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/daterangepicker.css') }}">
@endsection
@section('js')
    <!-- jquery-validation Js -->
    <script src="{{ asset('assets/js/plugins/jquery.validate.min.js') }}"></script>
    <!-- form-picker-custom Js -->
    <script src="{{ asset('assets/js/pages/form-validation.js') }}"></script>
    <!-- select2 Js -->
    <script src="{{ asset('assets/js/plugins/select2.full.min.js') }}"></script>
    <!-- form-select-custom Js -->
    <script src="{{ asset('assets/js/pages/form-select-custom.js') }}"></script>

    <script src="{{ asset('assets/js/plugins/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/daterangepicker.js') }}"></script>
    <script src="{{ asset('assets/js/pages/ac-datepicker.js') }}"></script>

    <script src="{{ asset('assets/js/plugins/jquery.bootstrap.wizard.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#besicwizard').bootstrapWizard({
                withVisible: false,
                'nextSelector': '.button-next',
                'previousSelector': '.button-previous',
                'firstSelector': '.button-first',
                'lastSelector': '.button-last'
            });
            $('#btnwizard').bootstrapWizard({
                withVisible: false,
                'nextSelector': '.button-next',
                'previousSelector': '.button-previous',
                'firstSelector': '.button-first',
                'lastSelector': '.button-last'
            });
            $('#progresswizard').bootstrapWizard({
                withVisible: false,
                'nextSelector': '.button-next',
                'previousSelector': '.button-previous',
                'firstSelector': '.button-first',
                'lastSelector': '.button-last',
                onTabShow: function(tab, navigation, index) {
                    var $total = navigation.find('li').length;
                    var $current = index + 1;
                    var $percent = ($current / $total) * 100;
                    $('#progresswizard .progress-bar').css({
                        width: $percent + '%'
                    });
                }
            });
            $('#validationwizard').bootstrapWizard({
                withVisible: false,
                'nextSelector': '.button-next',
                'previousSelector': '.button-previous',
                'firstSelector': '.button-first',
                'lastSelector': '.button-last',
                onNext: function(tab, navigation, index) {
                    if (index == 1) {
                        if (!$('#validation-t-name').val()) {
                            $('#validation-t-name').focus();
                            $('.form-1').addClass('was-validated');
                            return false;
                        }
                        if (!$('#validation-t-email').val()) {
                            $('#validation-t-email').focus();
                            $('.form-1').addClass('was-validated');
                            return false;
                        }
                        if (!$('#validation-t-pwd').val()) {
                            $('#validation-t-pwd').focus();
                            $('.form-1').addClass('was-validated');
                            return false;
                        }
                    }
                    if (index == 2) {
                        if (!$('#validation-t-address').val()) {
                            $('#validation-t-address').focus();
                            $('.form-2').addClass('was-validated');
                            return false;
                        }
                    }
                }
            });
            $('#tabswizard').bootstrapWizard({
                'nextSelector': '.button-next',
                'previousSelector': '.button-previous',
            });
            $('#verticalwizard').bootstrapWizard({
                'nextSelector': '.button-next',
                'previousSelector': '.button-previous',
            });
        });
    </script>

    @include('shared.message.error-reporting')

    <script>
        $('.schedule').click(function() {
            schedule_type = $('input[name="type_of_meeting"]:checked').val();
            switch (schedule_type) {
                case 'single-day': {
                    break;
                }
            }
        });
    </script>
@endsection
@section('content')
    <!-- [ Main Content ] start -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Add Meeting Information</h5>
                </div>
                <div class="card-body">
                    <div class="bt-wizard" id="progresswizard">
                        <ul class="nav nav-pills nav-fill mb-3">
                            <li class="nav-item"><a href="#progress-t-tab1" class="nav-link"
                                    data-toggle="tab">Programme/Activity General Information</a></li>
                            <li class="nav-item"><a href="#progress-t-tab2" class="nav-link" data-toggle="tab">Budget &
                                    Actual Provisions for Participants</a></li>
                            <li class="nav-item"><a href="#progress-t-tab3" class="nav-link" data-toggle="tab">Consultants &
                                    Support Personnel</a></li>
                        </ul>
                        <div id="bar" class="bt-wizard progress mb-3" style="height:6px">
                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="0" aria-valuemin="0"
                                aria-valuemax="100" style="width: 0%;"></div>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane active show" id="progress-t-tab1">
                                <form>
                                    <div class="form-group row">
                                        <label for="name-of-the-meeting" class="col-sm-3 col-form-label">Name of the
                                            Meeting</label>
                                        <div class="col-sm-9">
                                            <input id="name-of-the-meeting" type="text"
                                                class="form-control @error('name_of_the_meeting') is-invalid @enderror"
                                                @error('name_of_the_meeting') aria-invalid="true" @enderror
                                                name="name_of_the_meeting" required placeholder="Name of the Meeting"
                                                value="{{ old('name_of_the_meeting') }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="type-of-meeting" class="col-sm-3 col-form-label">Type of Meeting</label>
                                        <div class="col-sm-9">
                                            <select class="js-example-basic-multiple col-md-6" id="type-of-meeting"
                                                name="type_of_meeting" required @error('type_of_meeting') is-invalid
                                                    @enderror" @error('type_of_meeting') aria-invalid="true" @enderror>
                                                    @foreach ($type_of_meetings as $type_meeting)
                                                        <option value="{{ $type_meeting }}">{{ $type_meeting }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="meeting_dates" class="col-sm-3 col-form-label">Meeting Dates</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="dates" name="dates" class="form-control datetimes"
                                                    required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="programme" class="col-sm-3 col-form-label">Programme</label>
                                            <div class="col-sm-9">
                                                <select class="js-example-basic-multiple col-md-6" id="programme-officer"
                                                    name="programme_id" required @error('programme_id') is-invalid @enderror"
                                                    @error('programme_id') aria-invalid="true" @enderror>
                                                    @foreach ($programmes as $programme)
                                                        <option value="{{ $programme->id }}">{{ $programme->title }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="programme-officer" class="col-sm-3 col-form-label">Programme
                                                Officer</label>
                                            <div class="col-sm-9">
                                                <select class="js-example-basic-multiple col-md-6" id="programme-officer"
                                                    name="programme_officer_id" required @error('prgramme_officer_id')
                                                        is-invalid @enderror" @error('programme_officer_id') aria-invalid="true"
                                                    @enderror>
                                                    @foreach ($programmes as $programme)
                                                        <option value="{{ $programme->programme_officer->id }}">
                                                            {{ $programme->programme_officer->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="project" class="col-sm-3 col-form-label">Project</label>
                                            <div class="col-sm-9">
                                                <select class="js-example-basic-multiple col-md-6" id="project"
                                                    name="project_id" required @error('project_id') is-invalid @enderror"
                                                    @error('prject_id') aria-invalid="true" @enderror>
                                                    @foreach ($projects as $project)
                                                        <option value="{{ $project->id }}">{{ $project->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="host" class="col-sm-3 col-form-label">Host</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="host" class="form-control" id="host" placeholder="Host"
                                                    required @error('host') is-invalid @enderror" @error('host')
                                                aria-invalid="true" @enderror>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="participant-type" class="col-sm-3 col-form-label">Proposed Participants
                                            / Delegates</label>
                                        <div class="col-sm-9">
                                            <textarea name="participant_type" class="form-control" id="participant-type"
                                                placeholder="Proposed Particiapnts or Delegates for the meeting" required
                                                @error('participant_type') is-invalid @enderror" @error('participant_type')
                                            aria-invalid="true" @enderror></textarea>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <div class="tab-pane" id="progress-t-tab2">
                            <form>
                                <div class="form-group row">
                                    <label for="proposed-funder" class="col-sm-3 col-form-label">Proposed Funder</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="proposed_funder" class="form-control"
                                            id="proposed-funder" placeholder="Proposed Funding" required
                                            @error('proposed_funder') is-invalid @enderror" @error('proposed_funder')
                                        aria-invalid="true" @enderror>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="budget-line" class="col-sm-3 col-form-label">Budget Line</label>
                                <div class="col-sm-9">
                                    <textarea name="budget_line" class="form-control" id="budget-line"
                                        placeholder="Budget Line" required @error('budget_line') is-invalid
                                            @enderror" @error('budget_line') aria-invalid="true" @enderror></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="dsa-rate" class="col-sm-3 col-form-label">Proposed DSA Rate</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="dsa_rate" class="form-control" id="dsa-rate"
                                            placeholder="Proposed DSA rate" @error('dsa_rate') is-invalid @enderror"
                                            @error('dsa_rate') aria-invalid="true" @enderror />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="original-budget-rate" class="col-sm-3 col-form-label">Original Budget
                                        Rate</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="original_budget_rate" class="form-control"
                                            id="original-budget-rate" placeholder="Original Budget Rate"
                                            @error('original_budget_rate') is-invalid @enderror"
                                            @error('original_budget_rate') aria-invalid="true" @enderror />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="reason-for-variance-budget" class="col-sm-3 col-form-label">Reasons for
                                        Variance of Budget</label>
                                    <div class="col-sm-9">
                                        <textarea name="reasons_for_variance_budget" row="3" class="form-control"
                                            id="reason-for-variance-budget" placeholder="Reasons for Variance of Budget"
                                            required @error('reasons_for_variance_budget') is-invalid @enderror"
                                            @error('reasons_for_variance_budget') aria-invalid="true"
                                            @enderror></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="proposed-number-of-participants"
                                        class="col-sm-3 col-form-label">Proposed Number of Participants</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="num_of_participants" class="form-control"
                                            id="proposed-number-of-participants"
                                            placeholder="Proposed Number of Participants" required
                                            @error('num_of_participants') is-invalid @enderror"
                                            @error('num_of_participants') aria-invalid=" true" @enderror />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="number-of-participants-per-original-budget"
                                        class="col-sm-3 col-form-label">Number of Participants Per Original
                                        Budget</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="num_of_participants_per_original_budget"
                                            class="form-control" id="proposed-number-of-participants"
                                            placeholder="Number of Participants Per Original Budget" required
                                            @error('num_of_participants_per_original_budget') is-invalid @enderror"
                                            @error('num_of_participants_per_original_budget') aria-invalid=" true"
                                            @enderror />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="reason-for-variance-participants"
                                        class="col-sm-3 col-form-label">Reasons for Variance for Number of
                                        Participants</label>
                                    <div class="col-sm-9">
                                        <textarea name="reason_for_variance_num_participants" row="3"
                                            class="form-control" id="reason-for-variance-participants"
                                            placeholder="Reasons for Variance for Number of Participants" required
                                            @error('reason_for_variance_num_participants') is-invalid @enderror"
                                            @error('reason_for_variance_num_participants') aria-invalid="true"
                                            @enderror></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="proposed-funding-for-the-difference"
                                        class="col-sm-3 col-form-label">Proposed Funding for the Difference</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="proposed_funding_for_difference" class="form-control"
                                            id="proposed-funding-for-the-difference"
                                            placeholder="Proposed Funding for the Difference"
                                            @error('proposed_funding_for_difference') is-invalid @enderror"
                                            @error('proposed_funding_for_difference') aria-invalid="true" @enderror />
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="progress-t-tab3">
                            <form>
                                @if (!empty($resources))
                                    <div class="form-group row">
                                        <label for="proposed-funding-for-the-difference"
                                            class="col-sm-3 col-form-label">Resources</label>
                                        <div class="col-sm-9">
                                            <p>Kindly select the resources this meeting will require.</p>
                                            <select class="js-example-basic-multiple col-md-6 multiple"
                                                multiple="multiple" name="resource_id">
                                                @foreach ($resources as $resource)
                                                    <option value="{{ $resource->id }}">{{ $resource->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                @endif
                                <!-- <i class="feather icon-check-circle display-3 text-success"></i>
                                    <h5 class="mt-3">Registration Done! . .</h5>
                                    <p>Lorem Ipsum is simply dummy text of the printing</p>
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2">
                                        <label class="custom-control-label" for="customCheck2">Subscribe Newslatter</label>
                                    </div>-->
                            </form>
                        </div>
                        <div class="row justify-content-between btn-page">
                            <div class="col-sm-6">
                                <a href="#!" class="btn btn-primary button-previous">Previous</a>
                            </div>
                            <div class="col-sm-6 text-md-right">
                                <a href="#!" class="btn btn-primary button-next">Next</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- [ Main Content ] end -->
@endsection
