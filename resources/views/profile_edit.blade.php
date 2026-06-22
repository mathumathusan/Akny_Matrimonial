@extends('layouts.master')

@section('content')

<!-- REGISTER -->
<section>
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="login pro-edit-update">
        <div class="container">
            <div class="row">
                <div class="inn">
                    <div class="rhs">
                        <div class="form-login">
                            <form method="POST" action="{{$profile? route('profile.update') : route('profile.store') }}" enctype="multipart/form-data">
                                @csrf

                                <!-- STEP 1 -->
                                <div class="form-step active">
                                    <div class="form-tit">
                                        <h4>Step 1</h4>
                                        <h1>Basic Info</h1>
                                    </div>

                                    <div class="row">
                                        <div class=" col-md-6 form-group">
                                            <label class="lb">Groom / Bride's Name:</label>
                                            <input type="text" class="form-control" name="name" value="{{ $profile->name ?? '' }}" placeholder="Enter the name" required>
                                        </div>
                                        <div class=" col-md-6 form-group">
                                            <label class="lb">Country of residence:</label>
                                            <input type="text" class="form-control" name="country_of_residence" value="{{ $profile->country_of_residence ?? '' }}" placeholder="Enter the country of residence" required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label class="lb">Date of birth:</label>
                                            <input type="date" class="form-control" name="dob" value="{{ $profile->dob ?? '' }}" required>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label class="lb">Gender:</label>
                                            <select class="form-select chosen-select" name="gender" required>
                                                <option value="">Select Gender</option>
                                                <option value="male" {{ ($profile->gender ?? '') == 'male' ? 'selected' : '' }}>Male (ஆண்)</option>
                                                <option value="female" {{ ($profile->gender ?? '') == 'female' ? 'selected' : '' }}>Female (பெண்)</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label class="lb">Height:</label>
                                            <input type="text" class="form-control" name="height" value="{{ $profile->height ?? '' }}" placeholder="Enter the height">
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label class="lb">Weight:</label>
                                            <input type="text" class="form-control" name="weight" value="{{ $profile->weight ?? '' }}" placeholder="Enter the weight">
                                        </div>
                                    </div>

                                    <div class="form-navigation">
                                        <button type="button" class="btn btn-primary next-btn">Next</button>
                                    </div>
                                </div>

                                <!-- STEP 2 -->
                                <div class="form-step">
                                    <div class="form-tit">
                                        <h4>Step 2</h4>
                                        <h1>Advanced Bio</h1>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label class="lb">Religion:</label>
                                            <select class="form-select" name="religion">
                                                <option value="">Select Religion</option>

                                                <option value="hindu" {{ ($profile->religion ?? '') == 'hindu' ? 'selected' : '' }}>Hinduism</option>
                                                <option value="catholic" {{ ($profile->religion ?? '') == 'catholic' ? 'selected' : '' }}>Catholic</option>
                                                <option value="buddhist" {{ ($profile->religion ?? '') == 'buddhist' ? 'selected' : '' }}>Buddhism</option>
                                                <option value="nrc" {{ ($profile->religion ?? '') == 'nrc' ? 'selected' : '' }}>NRC</option>
                                                <option value="others" {{ ($profile->religion ?? '') == 'others' ? 'selected' : '' }}>Others</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label class="lb">Complexion:</label>
                                            <select class="form-select" name="complexion">
                                                <option value="">Select Complexion</option>
                                                <option value="fair" {{ ($profile->complexion ?? '') == 'fair' ? 'selected' : '' }}>Fair</option>
                                                <option value="wheatish" {{ ($profile->complexion ?? '') == 'wheatish' ? 'selected' : '' }}>Wheatish</option>
                                                <option value="wheatish_medium" {{ ($profile->complexion ?? '') == 'wheatish_medium' ? 'selected' : '' }}>Wheatish Medium</option>
                                                <option value="wheatish_brown" {{ ($profile->complexion ?? '') == 'wheatish_brown' ? 'selected' : '' }}>Wheatish Brown</option>
                                                <option value="dark" {{ ($profile->complexion ?? '') == 'dark' ? 'selected' : '' }}>Dark</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label class="lb">Rasi:</label>
                                            <select class="form-select" name="rasi" id="rasi">
                                                <option value="">Select Rasi</option>
                                                {{ ($profile->gender ?? '') == 'male' ? 'selected' : '' }}
                                                <option value="Aries" {{($profile->rasi ?? '') == 'Aries' ? 'selected' : ''}}>Aries - மேஷம்</option>
                                                <option value="Taurus" {{($profile->rasi ?? '') == 'Taurus' ? 'selected' : ''}}>Taurus - ரிஷபம்</option>
                                                <option value="Gemini" {{($profile->rasi ?? '') == 'Gemini' ? 'selected' : ''}}>Gemini - மிதுனம்</option>
                                                <option value="Cancer" {{($profile->rasi ?? '') == 'Cancer' ? 'selected' : ''}}>Cancer - கடகம்</option>
                                                <option value="Leo" {{($profile->rasi ?? '') == 'Leo' ? 'selected' : ''}}>Leo - சிம்மம்</option>
                                                <option value="Virgo" {{($profile->rasi ?? '') == 'Virgo' ? 'selected' : ''}}>Virgo - கன்னி</option>
                                                <option value="Libra" {{($profile->rasi ?? '') == 'Libra' ? 'selected' : ''}}>Libra - துலாம்</option>
                                                <option value="Scorpio" {{($profile->rasi ?? '') == 'Scorpio' ? 'selected' : ''}}>Scorpio - விருச்சிகம்</option>
                                                <option value="Sagittarius" {{($profile->rasi ?? '') == 'Sagittarius' ? 'selected' : ''}}>Sagittarius - தனுசு</option>
                                                <option value="Capricorn" {{($profile->rasi ?? '') == 'Capricorn' ? 'selected' : ''}}>Capricorn - மகரம்</option>
                                                <option value="Aquarius" {{($profile->rasi ?? '') == 'Aquarius' ? 'selected' : ''}}>Aquarius - கும்பம்</option>
                                                <option value="Pisces" {{($profile->rasi ?? '') == 'Pisces' ? 'selected' : ''}}>Pisces - மீனம்</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6 form-group">
                                            <label class="lb">Star (Nakshatra):</label>
                                            <select class="form-select" name="nakshatra" id="nakshatra">
                                                <option value="">Select Star</option>
                                                <option value="Ashwini" {{($profile->nakshatra ?? '') == 'Ashwini' ? 'selected' : ''}}>Ashwini - அச்வினி</option>
                                                <option value="Bharani" {{($profile->nakshatra ?? '') == 'Bharani' ? 'selected' : ''}}>Bharani - பாரணி</option>
                                                <option value="Krittika" {{($profile->nakshatra ?? '') ==  'Krittika' ? 'selected' : ''}}>Krittika - கிருத்திகா</option>
                                                <option value="Rohini" {{($profile->nakshatra ?? '') == 'Rohini' ? 'selected' : ''}}>Rohini - ரோகிணி</option>
                                                <option value="Mrigashirsha" {{($profile->nakshatra ?? '') == 'Mrigashirsha' ? 'selected' : ''}}>Mrigashirsha - மிருகசிரிஷம்</option>
                                                <option value="Ardra" {{($profile->nakshatra ?? '') == 'Ardra' ? 'selected' : ''}}>Ardra - ஆர்த்ரா</option>
                                                <option value="Punarvasu" {{($profile->nakshatra ?? '') == 'Punarvasu' ? 'selected' : ''}}>Punarvasu - புனர்பூசம்</option>
                                                <option value="Pushya" {{($profile->nakshatra ?? '') == 'Pushya' ? 'selected' : ''}}>Pushya - புஷ்யம்</option>
                                                <option value="Ashlesha" {{($profile->nakshatra ?? '') == 'Ashlesha' ? 'selected' : ''}}>Ashlesha - ஆஸ்லேஷா</option>
                                                <option value="Magha" {{($profile->nakshatra ?? '') == 'Magha' ? 'selected' : ''}}>Magha - மகா</option>
                                                <option value="Purva Phalguni" {{($profile->nakshatra ?? '') == 'Purva Phalguni' ? 'selected' : ''}}>Purva Phalguni - பூர்வ பிள்குனி</option>
                                                <option value="Uttara Phalguni" {{($profile->nakshatra ?? '') == 'Uttara Phalguni' ? 'selected' : ''}}>Uttara Phalguni - உத்தர பிள்குனி</option>
                                                <option value="Hasta" {{($profile->nakshatra ?? '') == 'Hasta' ? 'selected' : ''}}>Hasta - ஹஸ்தா</option>
                                                <option value="Chitra" {{($profile->nakshatra ?? '') == 'Chitra' ? 'selected' : ''}}>Chitra - சித்திரா</option>
                                                <option value="Swati" {{($profile->nakshatra ?? '') == 'Swati' ? 'selected' : ''}}>Swati - ஸ்வாதி</option>
                                                <option value="Vishakha" {{($profile->nakshatra ?? '') == 'Vishakha' ? 'selected' : ''}}>Vishakha - விசாகம்</option>
                                                <option value="Anuradha" {{($profile->nakshatra ?? '') == 'Anuradha' ? 'selected' : ''}}>Anuradha - அனுராதா</option>
                                                <option value="Jyeshtha" {{($profile->nakshatra ?? '') == 'Jyeshtha' ? 'selected' : ''}}>Jyeshtha - ஜ்யேஷ்டா</option>
                                                <option value="Mula" {{($profile->nakshatra ?? '') == 'Mula' ? 'selected' : ''}}>Mula - மூலம்</option>
                                                <option value="Purva Ashadha" {{($profile->nakshatra ?? '') == 'Purva Ashadha' ? 'selected' : ''}}>Purva Ashadha - பூர்வாஷாதா</option>
                                                <option value="Uttara Ashadha" {{($profile->nakshatra ?? '') == 'Uttara Ashadha' ? 'selected' : ''}}>Uttara Ashadha - உத்திராஷாதா</option>
                                                <option value="Shravana" {{($profile->nakshatra ?? '') == 'Shravana' ? 'selected' : ''}}>Shravana - திருவோணம்</option>
                                                <option value="Dhanishta" {{($profile->nakshatra ?? '') == 'Dhanishta' ? 'selected' : ''}}>Dhanishta - தனுஷ்டா</option>
                                                <option value="Shatabhisha" {{($profile->nakshatra ?? '') == 'Shatabhisha' ? 'selected' : ''}}>Shatabhisha - சதபிஷா</option>
                                                <option value="Purva Bhadrapada" {{($profile->nakshatra ?? '') == 'Purva Bhadrapada' ? 'selected' : ''}}>Purva Bhadrapada - பூர்வ பத்திரபதா</option>
                                                <option value="Uttara Bhadrapada" {{($profile->nakshatra ?? '') == 'Uttara Bhadrapada' ? 'selected' : ''}}>Uttara Bhadrapada - உத்திர பத்திரபதா</option>
                                                <option value="Revati" {{($profile->nakshatra ?? '') == 'Revati' ? 'selected' : ''}}>Revati - ரேவதி</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label class="lb">Educational Level:</label>
                                            <select class="form-select" name="education_level">
                                                <option value="">Select education level</option>
                                                <option value="less_than_ol">Less than G.C.E O/L</option>
                                                <option value="ol">G.C.E O/L</option>
                                                <option value="al">G.C.E A/L</option>
                                                <option value="degree">Degree or Equivalent</option>
                                                <option value="masters">Master Degree</option>
                                                <option value="phd">PhD or Higher</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label class="lb">Marital Status:</label>
                                            <select class="form-select" name="marital_status">
                                                <option value="">Select Status</option>

                                                <option value="single" {{($profile->marital_status ?? '') == 'single' ? 'selected' : ''}}>Single</option>
                                                <option value="married" {{($profile->marital_status ?? '') == 'married' ? 'selected' : ''}}>Married</option>
                                                <option value="divorced" {{($profile->marital_status ?? '') == 'divorced' ? 'selected' : ''}}>Divorced</option>
                                                <option value="widowed" {{($profile->marital_status ?? '') == 'widowed' ? 'selected' : ''}}>Widowed</option>
                                                <option value="separated" {{($profile->marital_status ?? '') == 'separated' ? 'selected' : ''}}>Separated</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-navigation">
                                        <button type="button" class="btn btn-secondary prev-btn">Previous</button>
                                        <button type="button" class="btn btn-primary next-btn">Next</button>
                                    </div>
                                </div>

                                <!-- STEP 3 -->
                                <div class="form-step">
                                    <div class="form-tit">
                                        <h4>Step 3</h4>
                                        <h1>Additional</h1>
                                    </div>

                                    <div class="row">

                                        <!-- <div class="form-group col-md-6">
                                            <label class="lb">Gender:</label>
                                            <select class="form-select" name="gender">
                                                <option value="male" {{($profile->gender ?? '') == 'male' ? 'selected' : ''}}>Male</option>
                                                <option value="female" {{($profile->gender ?? '') == 'female' ? 'selected' : ''}}>Female</option>
                                            </select>
                                        </div> -->

                                        <div class="form-group col-md-6">
                                            <label class="lb">Job:</label>

                                            <input type="text" class="form-control" name="job" placeholder="Enter the Job" value="{{ ($profile->job ?? '') }}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="lb">Caste:</label>
                                            <select class="form-select" name="caste" id="caste">
                                                <option value="">Select Caste</option>
                                                <option value="A" {{($profile->caste ?? '') == 'A' ? 'selected' : ''}}>A</option>
                                                <option value="B" {{($profile->caste ?? '') == 'B' ? 'selected' : ''}}>B</option>
                                                <option value="C" {{($profile->caste ?? '') == 'C' ? 'selected' : ''}}>C</option>
                                                <option value="D" {{($profile->caste ?? '') == 'D' ? 'selected' : ''}}>D</option>
                                            </select>
                                        </div>
                                    </div>

                                    

                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label class="lb">Register Person Name:</label>
                                            <input type="text" class="form-control" name="register_person_name" placeholder="Enter the name" value="{{ ($profile->register_person_name ?? '') }}">
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label class="lb">Register Person Phone Number:</label>
                                            <input type="tel" class="form-control" name="phone_number" placeholder="Enter the phone number" value="{{ ($profile->phone_number ?? '') }}">
                                        </div>
                                    </div>

                                    <div class="row">
                                        @if($photos->count())
                                        <div class="row">
                                            @foreach($photos as $photo)
                                            <div class="col-md-3">
                                                <img src="{{ asset('storage/'.$photo) }}" width="100">
                                            </div>
                                            @endforeach
                                        </div>
                                        @endif
                                        <div class="col-md-6 form-group">
                                            <label class="lb">Photo:</label>
                                            <input type="file" class="form-control" name="photos[]" accept="image/*" multiple>
                                            <small class="text-muted">You can select multiple images</small>
                                        </div>

                                        @if($profile && $profile->chartphoto)
                                        <div>
                                            <img src="{{ asset('storage/'.$profile->chartphoto) }}" width="120">
                                        </div>
                                        @endif
                                        <div class="col-md-6 form-group">
                                            <label class="lb">Chart:</label>
                                            <input type="file" class="form-control" id="chartphoto" name="chartphoto" accept="image/*">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="lb">Expectation:</label>
                                        <input type="text" class="form-control" id="expectation" name="expectation" placeholder="UK,Canada..." value="{{ ($profile->expectation ?? '') }}">
                                    </div>

                                    <div class="form-navigation">
                                        <button type="button" class="btn btn-secondary prev-btn">Previous</button>
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

@if(session('validation_errors'))
<script>
    Swal.fire({
        title: 'Validation Errors',
        html: `{!! implode('<br>', session('validation_errors')) !!}`,
        icon: 'error',
        confirmButtonText: 'OK'
    });
</script>
@endif

{{-- OTHER ERRORS --}}
@if(session('error'))
<script>
    Swal.fire({
        title: 'Error!',
        text: "{{ session('error') }}",
        icon: 'error',
        confirmButtonText: 'OK'
    });
</script>
@endif

<!-- JS FOR MULTI-STEP -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        let currentStep = 0;
        const steps = document.querySelectorAll(".form-step");
        const nextBtns = document.querySelectorAll(".next-btn");
        const prevBtns = document.querySelectorAll(".prev-btn");
        const form = document.querySelector("form");

        function showStep(step) {
            steps.forEach((s, i) => {
                s.classList.toggle("active", i === step);
            });
        }

        nextBtns.forEach(btn => {
            btn.addEventListener("click", () => {
                if (currentStep < steps.length - 1) {
                    currentStep++;
                    showStep(currentStep);
                }
            });
        });

        prevBtns.forEach(btn => {
            btn.addEventListener("click", () => {
                if (currentStep > 0) {
                    currentStep--;
                    showStep(currentStep);
                }
            });
        });

        showStep(currentStep);
    });
</script>

<style>
    .form-step {
        display: none;
    }

    .form-step.active {
        display: block;
    }

    .form-navigation {
        margin-top: 20px;
    }
</style>



@endsection