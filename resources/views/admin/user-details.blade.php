<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .bg-gradient-info {
            background: linear-gradient(135deg, #17a2b8, #117a8b);
        }

        .hover-scale img {
            transition: transform 0.3s ease;
        }

        .hover-scale:hover img {
            transform: scale(1.1);
        }

        .table-borderless th {
            width: 40%;
        }

        .status-badge {
            font-size: 0.85rem;
        }
    </style>
</head>

<body class="bg-light p-4">
    <div class="container">
        <div class="card shadow-lg rounded-4 border-0">
            <div class="card-header bg-gradient-info text-white rounded-top-4">
                <h5 class="mb-0"><i class="bi bi-person-circle me-2"></i>User Details - {{ $user->name }}</h5>
            </div>
            <div class="card-body p-4">
                <div class="row">
                    <!-- User Info Table -->
                    <div class="col-md-6 mb-4 mb-md-0">
                        <table class="table table-borderless table-sm">
                            <tbody>
                                <tr><th class="text-muted">ID</th><td>{{ $user->id }}</td></tr>
                                <tr><th class="text-muted">User ID</th><td>{{ $user->user_id }}</td></tr>
                                <tr><th class="text-muted">Name</th><td>{{ $user->name }}</td></tr>
                                <tr><th class="text-muted">Phone</th><td>{{ $user->phone_number }}</td></tr>
                                <tr><th class="text-muted">Country</th><td>{{ $user->country_of_residence }}</td></tr>
                                <tr><th class="text-muted">DOB</th><td>{{ $user->dob }}</td></tr>
                                <tr><th class="text-muted">Gender</th><td>{{ $user->gender }}</td></tr>
                                <tr><th class="text-muted">Height</th><td>{{ $user->height }}</td></tr>
                                <tr><th class="text-muted">Weight</th><td>{{ $user->weight }}</td></tr>
                                <tr><th class="text-muted">Religion</th><td>{{ $user->religion }}</td></tr>
                                <tr><th class="text-muted">Complexion</th><td>{{ $user->complexion }}</td></tr>
                                <tr><th class="text-muted">Rasi</th><td>{{ $user->rasi }}</td></tr>
                                <tr><th class="text-muted">Nakshatra</th><td>{{ $user->nakshatra }}</td></tr>
                                <tr><th class="text-muted">Education</th><td>{{ $user->education_level }}</td></tr>
                                <tr><th class="text-muted">Marital Status</th><td>{{ $user->marital_status }}</td></tr>
                                <tr><th class="text-muted">Job</th><td>{{ $user->job }}</td></tr>
                                <tr><th class="text-muted">Caste</th><td>{{ $user->caste }}</td></tr>
                                <tr><th class="text-muted">Registered By</th><td>{{ $user->register_person_name }}</td></tr>
                                <tr><th class="text-muted">Expectation</th><td>{{ $user->expectation }}</td></tr>
                                <tr>
                                    <th class="text-muted">Approval Status</th>
                                    <td>
                                        @if($user->isApprove)
                                            <span class="badge bg-success status-badge">Approved</span>
                                        @else
                                            <span class="badge bg-warning status-badge">Pending</span>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        @if($user->chartphoto)
                        <div class="mt-3">
                            <h6>Chart Photo</h6>
                            <img src="{{ asset('storage/' . $user->chartphoto) }}" class="img-fluid rounded shadow-sm">
                        </div>
                        @endif
                    </div>

                    <!-- User Photos -->
                    <div class="col-md-6">
                        <h6 class="mb-3">Photos</h6>
                        <div class="row g-2">
                            @forelse($photos as $photo)
                            <div class="col-6">
                                <div class="position-relative overflow-hidden rounded-3 shadow-sm hover-scale">
                                    <img src="{{ asset('storage/' . $photo->photo_path) }}" class="img-fluid w-100">
                                </div>
                            </div>
                            @empty
                            <p class="text-muted">No photos uploaded.</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
