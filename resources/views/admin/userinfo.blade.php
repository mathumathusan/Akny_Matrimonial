<div class="container p-4 align-items-center"
    style="max-width: 800px; margin: auto; border: 1px solid #ddd; border-radius: 12px; box-shadow: 0 0 10px rgba(128, 128, 128, 0.3); background-color: #ffffff; overflow: hidden;">
    <!-- Header with photo and name -->
    <div class="d-flex align-items-center mb-4 flex-wrap">
        <img src="{{ asset('storage/' . $user->photo) }}" alt="User Photo"
            style="width: 80px; height: 80px; border-radius: 50%; object-fit: cover; box-shadow: 0 0 5px rgba(0,0,0,0.1);">
        <h4 class="ms-4 mb-0 mt-3 mt-md-0 text-primary text-wrap pl-3">{{ $user->name }}</h4>
    </div>

    <!-- Responsive User Info Table -->
    <div class="table-responsive">
        <table class="table table-borderless mb-0">
            <tbody>
                @php
                    $fields = [
                        'Date of Birth' => \Carbon\Carbon::parse($user->dob)->format('Y/m/d'),
                        'Gender' => $user->gender,
                        'Religion' => $user->religion,
                        'Rasi' => $user->rasi,
                        'Nakshatra' => $user->nakshatra,
                        'Education Level' => $user->education_level,
                        'Height' => $user->height,
                        'Weight' => $user->weight,
                        'Complexion' => $user->complexion,
                        'Caste' => $user->caste,
                        'Job' => $user->job,
                        'Marital Status' => $user->marital_status,
                        'Phone Number' => $user->phone_number,
                        'Register Person' => $user->register_person_name,
                        'Country of Residence' => $user->country_of_residence,
                        'Expectation' => is_array(json_decode($user->expectation, true))
                            ? implode(', ', json_decode($user->expectation, true))
                            : $user->expectation,
                    ];
                @endphp

                @foreach ($fields as $label => $value)
                    <tr>
                        <th class="text-muted" style="width: 200px; vertical-align: top;">{{ $label }}</th>
                        <td style="word-break: break-word;">{{ $value }}</td>
                    </tr>
                @endforeach

                <tr>
                    <th class="text-muted">Chart Photo</th>
                    <td>
                        @if ($user->chartphoto)
                            <a href="{{ asset('storage/' . $user->chartphoto) }}" target="_blank">
                                <img src="{{ asset('storage/' . $user->chartphoto) }}" alt="Chart Photo"
                                    style="width: 120px;  border: 1px solid #ccc; border-radius: 8px;">
                            </a>
                        @else
                            <span class="text-muted">N/A</span>
                        @endif
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
</div>
