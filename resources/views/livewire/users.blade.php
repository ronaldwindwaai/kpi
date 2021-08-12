<div>
    <!-- [ Main Content ] start -->
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>{{ $title }}</h5>
            </div>
            <div class="card-body">
                <form id="form" action="{{ route($page.'.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <label class="form-label" for="name">Name</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"  @error('name') aria-invalid="true" @enderror
                                    name="name" required placeholder="Name of User" value="{{ old('name') }}">
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="form-group">
                                <label class="form-label" for="email">Email</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"  @error('email') aria-invalid="true" @enderror
                                    name="email" required placeholder="Email Address" value="{{ old('email') }}">
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="form-group">
                                <label class="form-label" for="password">Password</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"  @error('password') aria-invalid="true" @enderror
                                    name="password" required placeholder="Password" value="{{ old('password') }}">
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="form-group">
                                <label class="form-label" for="confirm-password">Confirm Password</label>
                                <input id="confirm-password" type="password" class="form-control @error('confirm-password') is-invalid @enderror"  @error('confirm-password') aria-invalid="true" @enderror
                                    name="confirm-password" required placeholder="Password" value="{{ old('confirm-password') }}">
                            </div>
                        </div>
                        @if (!empty($roles))
                        <div class="col-md-10">
                            <div class="form-group">
                            <h5>Role</h5>
                            <p>Kindly choose the role of this user.</p>
                            <select class="js-example-basic-multiple col-md-6" name="role_id">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                        @endif
                    </div>
                    <button type="submit" class="btn  btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <!-- [ Form Validation ] end -->
</div>
<!-- [ Main Content ] end -->
</div>
