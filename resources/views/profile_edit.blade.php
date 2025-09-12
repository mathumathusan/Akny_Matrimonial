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
                            <form method="POST" action="{{ route('profile.store') }}" enctype="multipart/form-data">
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
                                            <input type="text" class="form-control" name="name" placeholder="Enter the name" required>
                                        </div>
                                        <div class=" col-md-6 form-group">
                                            <label class="lb">Country of residence:</label>
                                            <input type="text" class="form-control" name="country_of_residence" placeholder="Enter the country of residence" required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label class="lb">Date of birth:</label>
                                            <input type="date" class="form-control" name="dob" required>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label class="lb">Gender:</label>
                                            <select class="form-select chosen-select" name="gender" required>
                                                <option value="">Select Gender</option>
                                                <option value="male">Male (ஆண்)</option>
                                                <option value="female">Female (பெண்)</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label class="lb">Height:</label>
                                            <input type="text" class="form-control" name="height" placeholder="Enter the height">
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label class="lb">Weight:</label>
                                            <input type="text" class="form-control" name="weight" placeholder="Enter the weight">
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
                                                <option value="hindu">Hinduism</option>
                                                <option value="catholic">Catholic</option>
                                                <option value="nrc">NRC</option>
                                                <option value="others">Others</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label class="lb">Complexion:</label>
                                            <select class="form-select" name="complexion">
                                                <option value="">Select Complexion</option>
                                                <option value="fair">Fair</option>
                                                <option value="wheatish">Wheatish</option>
                                                <option value="wheatish_medium">Wheatish Medium</option>
                                                <option value="wheatish_brown">Wheatish Brown</option>
                                                <option value="dark">Dark</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label class="lb">Rasi:</label>
                                            <select class="form-select" name="rasi" id="rasi">
                                                <option value="">Select Rasi</option>
                                                <option value="A">A</option>
                                                <option value="B">B</option>
                                                <option value="C">C</option>
                                                <option value="D">D</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label class="lb">Star (Nakshatra):</label>
                                            <select class="form-select" name="nakshatra" id="nakshatra">
                                                <option value="">Select Star</option>
                                                <option value="A">A</option>
                                                <option value="B">B</option>
                                                <option value="C">C</option>
                                                <option value="D">D</option>
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
                                                <option value="single">Single</option>
                                                <option value="married">Married</option>
                                                <option value="divorced">Divorced</option>
                                                <option value="widowed">Widowed</option>
                                                <option value="separated">Separated</option>
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
                                        <div class="form-group col-md-6">
                                            <label class="lb">Job:</label>
                                            <input type="text" class="form-control" name="job" placeholder="Enter the Job">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label class="lb">Caste:</label>
                                            <select class="form-select" name="caste" id="caste">
                                                <option value="">Select Caste</option>
                                                <option value="A">A</option>
                                                <option value="B">B</option>
                                                <option value="C">C</option>
                                                <option value="D">D</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label class="lb">Register Person Name:</label>
                                            <input type="text" class="form-control" name="register_person_name" placeholder="Enter the name">
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label class="lb">Register Person Phone Number:</label>
                                            <input type="tel" class="form-control" name="phone_number" placeholder="Enter the phone number">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label class="lb">Photo:</label>
                                            <input type="file" class="form-control" name="photos[]" accept="image/*" multiple>
                                            <small class="text-muted">You can select multiple images</small>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label class="lb">Chart:</label>
                                            <input type="file" class="form-control" id="chartphoto" name="chartphoto" accept="image/*">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="lb">Expectation:</label>
                                        <input type="text" class="form-control" id="expectation" name="expectation" placeholder="UK,Canada...">
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
.form-step { display: none; }
.form-step.active { display: block; }
.form-navigation { margin-top: 20px; }
</style>

@endsection
