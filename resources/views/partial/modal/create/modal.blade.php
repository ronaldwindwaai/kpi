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
                <form action="" method="POST">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label" for="programme-title">Programme Title</label>
                                <input type="text" name="programme_title" class="form-control" id="programme-title" placeholder="">
                            </div>
                        </div>
                         <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label" for="project-title">Project Title</label>
                                <input type="text" name="project_title" class="form-control" id="project-title" placeholder="">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label" for="activity-name">Activity Name</label>
                                <input type="text" name="activity_name" class="form-control" id="activity-name" placeholder="">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label" for="date-from">Proposed Date From</label>
                                <input type="text" name="date_from" class="form-control" id="date-from" placeholder="">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label" for="date-to">Proposed Date To</label>
                                <input type="text" name="date_to" class="form-control" id="date-to" placeholder="">
                            </div>
                        </div>
                         <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label" for="venue">Venue</label>
                                <input type="text" name="venue" class="form-control" id="venue" placeholder="">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="file" name="file"/>
                            </div>
                            <button class="btn btn-primary">Submit</button>
                            <button class="btn btn-danger">Clear</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
