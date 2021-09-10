<div class="modal fade" id="modal-new-manager" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add A User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="user-modal-form" action="{{ route('users.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <label class="form-label" for="first-name">First Name</label>
                                <input id="first-name" type="text" class="form-control @error('first_name') is-invalid @enderror"
                                    @error('first_name') aria-invalid="true" @enderror name="first_name" required
                                    placeholder="First Name of User" value="{{ old('first_name') }}">
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="form-group">
                                <label class="form-label" for="first-name">Last Name</label>
                                <input id="last-name" type="text" class="form-control @error('last_name') is-invalid @enderror"
                                    @error('last_name') aria-invalid="true" @enderror name="last_name" required
                                    placeholder="Last Name of User" value="{{ old('last_name') }}">
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="form-group">
                                <label class="form-label" for="email">Email</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    @error('email') aria-invalid="true" @enderror name="email" required
                                    placeholder="Email Address" value="{{ old('email') }}">
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="form-group">
                                <label class="form-label" for="password">Password</label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" @error('password')
                                    aria-invalid="true" @enderror name="password" required placeholder="Password"
                                    value="{{ old('password') }}">
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="form-group">
                                <label class="form-label" for="confirm-password">Confirm Password</label>
                                <input id="confirm-password" type="password"
                                    class="form-control @error('confirm-password') is-invalid @enderror"
                                    @error('confirm-password') aria-invalid="true" @enderror name="confirm-password"
                                    required placeholder="Password" value="{{ old('confirm-password') }}">
                            </div>
                        </div>
                        @if (!empty($roles))
                            <div class="col-md-10">
                                <div class="form-group">
                                    <h5>Role</h5>
                                    <p>Kindly choose the role of this user.</p>
                                    <select class="col-md-6" name="role_id">
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        @endif
                    </div>
                    <button type="submit" class="btn  btn-primary">Submit</button>
                    <button type="buton" data-dismiss="modal"
                        class="btn btn-outline-secondary has-ripple">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>
