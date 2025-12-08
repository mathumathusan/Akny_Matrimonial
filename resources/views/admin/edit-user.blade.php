@include('admin.head')
<body>
<div class="container-scroller">

@include('admin.sidebar')

<div class="container-fluid page-body-wrapper">

@include('admin.navbar')

<div class="main-panel">
<div class="content-wrapper">

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="card">
    <div class="card-body">
        <h4>Edit Profile</h4>

        <form action="{{ url('/users/'.$user->id.'/update') }}" method="POST">
            @csrf

            <div class="row">

                <div class="col-md-6">
                    <label>Name</label>
                    <input name="name" class="form-control" value="{{ $user->name }}">
                </div>

                <div class="col-md-6">
                    <label>Phone</label>
                    <input name="phone_number" class="form-control" value="{{ $user->phone_number }}">
                </div>

                <div class="col-md-6">
                    <label>Country</label>
                    <input name="country_of_residence" class="form-control" value="{{ $user->country_of_residence }}">
                </div>

                <div class="col-md-6">
                    <label>DOB</label>
                    <input type="date" name="dob" class="form-control" value="{{ $user->dob }}">
                </div>

                <div class="col-md-6">
                    <label>Gender</label>
                    <input name="gender" class="form-control" value="{{ $user->gender }}">
                </div>

                <div class="col-md-6">
                    <label>Height</label>
                    <input name="height" class="form-control" value="{{ $user->height }}">
                </div>

                <div class="col-md-6">
                    <label>Weight</label>
                    <input name="weight" class="form-control" value="{{ $user->weight }}">
                </div>

                <div class="col-md-6">
                    <label>Religion</label>
                    <input name="religion" class="form-control" value="{{ $user->religion }}">
                </div>

                <div class="col-md-6">
                    <label>Complexion</label>
                    <input name="complexion" class="form-control" value="{{ $user->complexion }}">
                </div>

                <div class="col-md-6">
                    <label>Education Level</label>
                    <input name="education_level" class="form-control" value="{{ $user->education_level }}">
                </div>

                <div class="col-md-6">
                    <label>Job</label>
                    <input name="job" class="form-control" value="{{ $user->job }}">
                </div>

                <div class="col-md-6">
                    <label>Caste</label>
                    <input name="caste" class="form-control" value="{{ $user->caste }}">
                </div>

                <div class="col-md-12">
                    <label>Expectation</label>
                    <textarea name="expectation" class="form-control">{{ $user->expectation }}</textarea>
                </div>

            </div>

            <button class="btn btn-success mt-3">Update Profile</button>
        </form>
    </div>
</div>

<!-- Photos -->
<div class="card mt-4">
    <div class="card-body">
        <h4>User Photos</h4>

        <div class="row">
            @foreach($photos as $photo)
            <div class="col-md-3 mb-3 text-center">
                <img src="{{ asset('storage/'.$photo->photo_path) }}" class="img-fluid rounded">

                <button class="btn btn-danger btn-sm mt-2 delete-photo"
                        data-id="{{ $photo->id }}">
                    Delete
                </button>
            </div>
            @endforeach
        </div>

        <form action="{{ url('/users/'.$user->id.'/upload-photo') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="photo" class="form-control" required>
            <button class="btn btn-primary mt-2">Upload Photo</button>
        </form>
    </div>
</div>

<!-- Chart Photo -->
<div class="card mt-4">
    <div class="card-body">
        <h4>Chart Photo</h4>

        @if($user->chartphoto)
        <div class="text-center mb-3">
            <img src="{{ asset('storage/'.$user->chartphoto) }}" class="img-fluid rounded" style="max-height:300px;">
            <form action="{{ url('/users/'.$user->id.'/delete-chartphoto') }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger mt-2" onclick="return confirm('Delete this chart photo?')">Delete Chart Photo</button>
            </form>
        </div>
        @endif

        <form action="{{ url('/users/'.$user->id.'/update-chartphoto') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="chartphoto" class="form-control" required>
            <button class="btn btn-primary mt-2">Update Chart Photo</button>
        </form>
    </div>
</div>




<!-- Delete User -->
<form action="{{ url('/users/'.$user->id.'/delete') }}" method="POST" class="mt-4">
    @csrf
    @method('DELETE')
    <button class="btn btn-danger" onclick="return confirm('Delete this user?')">Delete User</button>
</form>

</div>

@include('admin.footer')

</div>
</div>
</div>

@include('admin.script')

<script>
// Delete photo AJAX
$('.delete-photo').click(function () {
    let id = $(this).data('id');

    if (!confirm('Delete this photo?')) return;

    $.ajax({
        url: '/users/photo/' + id,
        method: 'DELETE',
        data: {
            _token: '{{ csrf_token() }}'
        },
        success: function () {
            location.reload();
        }
    });
});
</script>

</body>
