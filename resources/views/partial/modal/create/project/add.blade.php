<div class="modal fade" id="modal-report" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Department</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="validation-form123" action="{{ route('projects.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <label class="form-label" for="programme-title">Programme Title</label>
                                <input id="programme-title" type="text" class="form-control @error('programme_title') is-invalid @enderror" name="programme_title"
                                    required placeholder="Name of the Programme">
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="form-group">
                                <label class="form-label" for="project-title">Project Title</label>
                                <input id="project-title" type="text" class="form-control" name="project_title"
                                    placeholder="Title of the Project" required>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="form-group">
                                <label class="form-label" for="activity-name">Activity Name</label>
                                <input id="activity-name" type="text" class="form-control" name="activity_name"
                                    placeholder="Name of the Activity" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="date-from">Proposed Date From</label>
                                <input id="date-from" type="date" class="form-control" name="date_from"
                                    placeholder="Proposed date from.." required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="date-to">Proposed Date To</label>
                                <input id="date-to" type="date" class="form-control" name="date_to"
                                    placeholder="Proposed date to.." required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="venue">Venue</label>
                                <input type="text" class="form-control" name="venue" placeholder="Venue" required>
                            </div>
                        </div>
                        @if (!empty($resources))
                        <div class="col-md-10">
                            <h5>Resources</h5>
                            <p>Kindly select the resources that you will need</p>
                            <select class="js-example-basic-multiple col-md-6" multiple="multiple" name="resource_id[]">
                                @foreach ($resources as $resource)
                                <option value="{{ $resource->id }}">{{ $resource->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        @endif

                        <div class="col-md-10">
                            <div class="form-group">
                                <label class="form-label">Upload Documentation</label>
                                <div>
                                    <input type="file" name="file" class="validation-file">
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn  btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
