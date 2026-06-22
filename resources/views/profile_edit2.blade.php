@extends('layouts.master')

@section('content')

<!-- REGISTER / PROFILE EDIT -->
<section class="profile-section">

    @if(session('success'))
    <div class="alert-success-bar">
        <i class="ti ti-circle-check"></i> {{ session('success') }}
    </div>
    @endif

    <div class="container">
        <div class="form-outer">

            {{-- Step Progress Bar --}}
            <div class="step-bar" style="margin-top: 80px;  ">
                <div class="step-item active" id="step-indicator-0">
                    <div class="step-circle"><i class="ti ti-user"></i></div>
                    <span class="step-label">Basic info</span>
                </div>
                <div class="step-connector"></div>
                <div class="step-item" id="step-indicator-1">
                    <div class="step-circle"><i class="ti ti-book"></i></div>
                    <span class="step-label">Advanced bio</span>
                </div>
                <div class="step-connector"></div>
                <div class="step-item" id="step-indicator-2">
                    <div class="step-circle"><i class="ti ti-photo"></i></div>
                    <span class="step-label">Additional</span>
                </div>
            </div>

            {{-- Form Card --}}
            <div class="form-card">
                <form method="POST"
                      action="{{ $profile ? route('profile.update') : route('profile.store') }}"
                      enctype="multipart/form-data"
                      id="profileForm">
                    @csrf

                    {{-- ===================== STEP 1 ===================== --}}
                    <div class="form-step active" id="step-0">
                        <div class="step-header">
                            <h2>Basic info</h2>
                            <p>Tell us about the bride or groom's basic details</p>
                        </div>

                        <div class="grid-2">
                            <div class="field">
                                <label>Groom / Bride's name <span class="req">*</span></label>
                                <input type="text" name="name"
                                       value="{{ $profile->name ?? '' }}"
                                       placeholder="Full name" required>
                            </div>
                            <div class="field">
                                <label>Country of residence <span class="req">*</span></label>
                                <input type="text" name="country_of_residence"
                                       value="{{ $profile->country_of_residence ?? '' }}"
                                       placeholder="e.g. Sri Lanka" required>
                            </div>
                        </div>

                        <div class="grid-2">
                            <div class="field">
                                <label>Date of birth <span class="req">*</span></label>
                                <input type="date" name="dob"
                                       value="{{ $profile->dob ?? '' }}" required>
                            </div>
                            <div class="field">
                                <label>Gender <span class="req">*</span></label>
                                <select name="gender" required>
                                    <option value="">Select gender</option>
                                    <option value="male"   {{ ($profile->gender ?? '') == 'male'   ? 'selected' : '' }}>Male (ஆண்)</option>
                                    <option value="female" {{ ($profile->gender ?? '') == 'female' ? 'selected' : '' }}>Female (பெண்)</option>
                                </select>
                            </div>
                        </div>

                        <div class="grid-2">
                            <div class="field">
                                <label>Height</label>
                                <input type="text" name="height"
                                       value="{{ $profile->height ?? '' }}"
                                       placeholder="e.g. 5ft 6in">
                            </div>
                            <div class="field">
                                <label>Weight</label>
                                <input type="text" name="weight"
                                       value="{{ $profile->weight ?? '' }}"
                                       placeholder="e.g. 60 kg">
                            </div>
                        </div>

                        <div class="nav-row">
                            <span></span>
                            <button type="button" class="btn btn-primary next-btn">
                                Next <i class="ti ti-arrow-right"></i>
                            </button>
                        </div>
                    </div>

                    {{-- ===================== STEP 2 ===================== --}}
                    <div class="form-step" id="step-1">
                        <div class="step-header">
                            <h2>Advanced bio</h2>
                            <p>Religion, astrology, and personal background</p>
                        </div>

                        <div class="grid-2">
                            <div class="field">
                                <label>Religion</label>
                                <select name="religion">
                                    <option value="">Select religion</option>
                                    <option value="hindu"    {{ ($profile->religion ?? '') == 'hindu'    ? 'selected' : '' }}>Hinduism</option>
                                    <option value="catholic" {{ ($profile->religion ?? '') == 'catholic' ? 'selected' : '' }}>Catholic</option>
                                    <option value="buddhist" {{ ($profile->religion ?? '') == 'buddhist' ? 'selected' : '' }}>Buddhism</option>
                                    <option value="nrc"      {{ ($profile->religion ?? '') == 'nrc'      ? 'selected' : '' }}>NRC</option>
                                    <option value="others"   {{ ($profile->religion ?? '') == 'others'   ? 'selected' : '' }}>Others</option>
                                </select>
                            </div>
                            <div class="field">
                                <label>Complexion</label>
                                <select name="complexion">
                                    <option value="">Select complexion</option>
                                    <option value="fair"           {{ ($profile->complexion ?? '') == 'fair'           ? 'selected' : '' }}>Fair</option>
                                    <option value="wheatish"       {{ ($profile->complexion ?? '') == 'wheatish'       ? 'selected' : '' }}>Wheatish</option>
                                    <option value="wheatish_medium"{{ ($profile->complexion ?? '') == 'wheatish_medium'? 'selected' : '' }}>Wheatish medium</option>
                                    <option value="wheatish_brown" {{ ($profile->complexion ?? '') == 'wheatish_brown' ? 'selected' : '' }}>Wheatish brown</option>
                                    <option value="dark"           {{ ($profile->complexion ?? '') == 'dark'           ? 'selected' : '' }}>Dark</option>
                                </select>
                            </div>
                        </div>

                        <div class="grid-2">
                            <div class="field">
                                <label>Rasi</label>
                                <select name="rasi" id="rasi">
                                    <option value="">Select rasi</option>
                                    <option value="Aries"       {{ ($profile->rasi ?? '') == 'Aries'       ? 'selected' : '' }}>Aries - மேஷம்</option>
                                    <option value="Taurus"      {{ ($profile->rasi ?? '') == 'Taurus'      ? 'selected' : '' }}>Taurus - ரிஷபம்</option>
                                    <option value="Gemini"      {{ ($profile->rasi ?? '') == 'Gemini'      ? 'selected' : '' }}>Gemini - மிதுனம்</option>
                                    <option value="Cancer"      {{ ($profile->rasi ?? '') == 'Cancer'      ? 'selected' : '' }}>Cancer - கடகம்</option>
                                    <option value="Leo"         {{ ($profile->rasi ?? '') == 'Leo'         ? 'selected' : '' }}>Leo - சிம்மம்</option>
                                    <option value="Virgo"       {{ ($profile->rasi ?? '') == 'Virgo'       ? 'selected' : '' }}>Virgo - கன்னி</option>
                                    <option value="Libra"       {{ ($profile->rasi ?? '') == 'Libra'       ? 'selected' : '' }}>Libra - துலாம்</option>
                                    <option value="Scorpio"     {{ ($profile->rasi ?? '') == 'Scorpio'     ? 'selected' : '' }}>Scorpio - விருச்சிகம்</option>
                                    <option value="Sagittarius" {{ ($profile->rasi ?? '') == 'Sagittarius' ? 'selected' : '' }}>Sagittarius - தனுசு</option>
                                    <option value="Capricorn"   {{ ($profile->rasi ?? '') == 'Capricorn'   ? 'selected' : '' }}>Capricorn - மகரம்</option>
                                    <option value="Aquarius"    {{ ($profile->rasi ?? '') == 'Aquarius'    ? 'selected' : '' }}>Aquarius - கும்பம்</option>
                                    <option value="Pisces"      {{ ($profile->rasi ?? '') == 'Pisces'      ? 'selected' : '' }}>Pisces - மீனம்</option>
                                </select>
                            </div>
                            <div class="field">
                                <label>Star (nakshatra)</label>
                                <select name="nakshatra" id="nakshatra">
                                    <option value="">Select star</option>
                                    <option value="Ashwini"           {{ ($profile->nakshatra ?? '') == 'Ashwini'           ? 'selected' : '' }}>Ashwini - அச்வினி</option>
                                    <option value="Bharani"           {{ ($profile->nakshatra ?? '') == 'Bharani'           ? 'selected' : '' }}>Bharani - பாரணி</option>
                                    <option value="Krittika"          {{ ($profile->nakshatra ?? '') == 'Krittika'          ? 'selected' : '' }}>Krittika - கிருத்திகா</option>
                                    <option value="Rohini"            {{ ($profile->nakshatra ?? '') == 'Rohini'            ? 'selected' : '' }}>Rohini - ரோகிணி</option>
                                    <option value="Mrigashirsha"      {{ ($profile->nakshatra ?? '') == 'Mrigashirsha'      ? 'selected' : '' }}>Mrigashirsha - மிருகசிரிஷம்</option>
                                    <option value="Ardra"             {{ ($profile->nakshatra ?? '') == 'Ardra'             ? 'selected' : '' }}>Ardra - ஆர்த்ரா</option>
                                    <option value="Punarvasu"         {{ ($profile->nakshatra ?? '') == 'Punarvasu'         ? 'selected' : '' }}>Punarvasu - புனர்பூசம்</option>
                                    <option value="Pushya"            {{ ($profile->nakshatra ?? '') == 'Pushya'            ? 'selected' : '' }}>Pushya - புஷ்யம்</option>
                                    <option value="Ashlesha"          {{ ($profile->nakshatra ?? '') == 'Ashlesha'          ? 'selected' : '' }}>Ashlesha - ஆஸ்லேஷா</option>
                                    <option value="Magha"             {{ ($profile->nakshatra ?? '') == 'Magha'             ? 'selected' : '' }}>Magha - மகா</option>
                                    <option value="Purva Phalguni"    {{ ($profile->nakshatra ?? '') == 'Purva Phalguni'    ? 'selected' : '' }}>Purva Phalguni - பூர்வ பிள்குனி</option>
                                    <option value="Uttara Phalguni"   {{ ($profile->nakshatra ?? '') == 'Uttara Phalguni'   ? 'selected' : '' }}>Uttara Phalguni - உத்தர பிள்குனி</option>
                                    <option value="Hasta"             {{ ($profile->nakshatra ?? '') == 'Hasta'             ? 'selected' : '' }}>Hasta - ஹஸ்தா</option>
                                    <option value="Chitra"            {{ ($profile->nakshatra ?? '') == 'Chitra'            ? 'selected' : '' }}>Chitra - சித்திரா</option>
                                    <option value="Swati"             {{ ($profile->nakshatra ?? '') == 'Swati'             ? 'selected' : '' }}>Swati - ஸ்வாதி</option>
                                    <option value="Vishakha"          {{ ($profile->nakshatra ?? '') == 'Vishakha'          ? 'selected' : '' }}>Vishakha - விசாகம்</option>
                                    <option value="Anuradha"          {{ ($profile->nakshatra ?? '') == 'Anuradha'          ? 'selected' : '' }}>Anuradha - அனுராதா</option>
                                    <option value="Jyeshtha"          {{ ($profile->nakshatra ?? '') == 'Jyeshtha'          ? 'selected' : '' }}>Jyeshtha - ஜ்யேஷ்டா</option>
                                    <option value="Mula"              {{ ($profile->nakshatra ?? '') == 'Mula'              ? 'selected' : '' }}>Mula - மூலம்</option>
                                    <option value="Purva Ashadha"     {{ ($profile->nakshatra ?? '') == 'Purva Ashadha'     ? 'selected' : '' }}>Purva Ashadha - பூர்வாஷாதா</option>
                                    <option value="Uttara Ashadha"    {{ ($profile->nakshatra ?? '') == 'Uttara Ashadha'    ? 'selected' : '' }}>Uttara Ashadha - உத்திராஷாதா</option>
                                    <option value="Shravana"          {{ ($profile->nakshatra ?? '') == 'Shravana'          ? 'selected' : '' }}>Shravana - திருவோணம்</option>
                                    <option value="Dhanishta"         {{ ($profile->nakshatra ?? '') == 'Dhanishta'         ? 'selected' : '' }}>Dhanishta - தனுஷ்டா</option>
                                    <option value="Shatabhisha"       {{ ($profile->nakshatra ?? '') == 'Shatabhisha'       ? 'selected' : '' }}>Shatabhisha - சதபிஷா</option>
                                    <option value="Purva Bhadrapada"  {{ ($profile->nakshatra ?? '') == 'Purva Bhadrapada'  ? 'selected' : '' }}>Purva Bhadrapada - பூர்வ பத்திரபதா</option>
                                    <option value="Uttara Bhadrapada" {{ ($profile->nakshatra ?? '') == 'Uttara Bhadrapada' ? 'selected' : '' }}>Uttara Bhadrapada - உத்திர பத்திரபதா</option>
                                    <option value="Revati"            {{ ($profile->nakshatra ?? '') == 'Revati'            ? 'selected' : '' }}>Revati - ரேவதி</option>
                                </select>
                            </div>
                        </div>

                        <div class="grid-2">
                            <div class="field">
                                <label>Educational level</label>
                                <select name="education_level">
                                    <option value="">Select education level</option>
                                    <option value="less_than_ol" {{ ($profile->education_level ?? '') == 'less_than_ol' ? 'selected' : '' }}>Less than G.C.E O/L</option>
                                    <option value="ol"           {{ ($profile->education_level ?? '') == 'ol'           ? 'selected' : '' }}>G.C.E O/L</option>
                                    <option value="al"           {{ ($profile->education_level ?? '') == 'al'           ? 'selected' : '' }}>G.C.E A/L</option>
                                    <option value="degree"       {{ ($profile->education_level ?? '') == 'degree'       ? 'selected' : '' }}>Degree or equivalent</option>
                                    <option value="masters"      {{ ($profile->education_level ?? '') == 'masters'      ? 'selected' : '' }}>Master's degree</option>
                                    <option value="phd"          {{ ($profile->education_level ?? '') == 'phd'          ? 'selected' : '' }}>PhD or higher</option>
                                </select>
                            </div>
                            <div class="field">
                                <label>Marital status</label>
                                <select name="marital_status">
                                    <option value="">Select status</option>
                                    <option value="single"    {{ ($profile->marital_status ?? '') == 'single'    ? 'selected' : '' }}>Single</option>
                                    <option value="married"   {{ ($profile->marital_status ?? '') == 'married'   ? 'selected' : '' }}>Married</option>
                                    <option value="divorced"  {{ ($profile->marital_status ?? '') == 'divorced'  ? 'selected' : '' }}>Divorced</option>
                                    <option value="widowed"   {{ ($profile->marital_status ?? '') == 'widowed'   ? 'selected' : '' }}>Widowed</option>
                                    <option value="separated" {{ ($profile->marital_status ?? '') == 'separated' ? 'selected' : '' }}>Separated</option>
                                </select>
                            </div>
                        </div>

                        <div class="nav-row">
                            <button type="button" class="btn btn-ghost prev-btn">
                                <i class="ti ti-arrow-left"></i> Previous
                            </button>
                            <button type="button" class="btn btn-primary next-btn">
                                Next <i class="ti ti-arrow-right"></i>
                            </button>
                        </div>
                    </div>

                    {{-- ===================== STEP 3 ===================== --}}
                    <div class="form-step" id="step-2">
                        <div class="step-header">
                            <h2>Additional details</h2>
                            <p>Job, caste, photos, and expectations</p>
                        </div>

                        <div class="grid-2">
                            <div class="field">
                                <label>Job / Occupation</label>
                                <input type="text" name="job"
                                       value="{{ $profile->job ?? '' }}"
                                       placeholder="e.g. Software engineer">
                            </div>
                            <div class="field">
                                <label>Caste</label>
                                <select name="caste" id="caste">
                                    <option value="">Select caste</option>
                                    <option value="A" {{ ($profile->caste ?? '') == 'A' ? 'selected' : '' }}>A</option>
                                    <option value="B" {{ ($profile->caste ?? '') == 'B' ? 'selected' : '' }}>B</option>
                                    <option value="C" {{ ($profile->caste ?? '') == 'C' ? 'selected' : '' }}>C</option>
                                    <option value="D" {{ ($profile->caste ?? '') == 'D' ? 'selected' : '' }}>D</option>
                                </select>
                            </div>
                        </div>

                        <div class="grid-2">
                            <div class="field">
                                <label>Register person name</label>
                                <input type="text" name="register_person_name"
                                       value="{{ $profile->register_person_name ?? '' }}"
                                       placeholder="Contact person's name">
                            </div>
                            <div class="field">
                                <label>Register person phone</label>
                                <input type="tel" name="phone_number"
                                       value="{{ $profile->phone_number ?? '' }}"
                                       placeholder="+94 7X XXX XXXX">
                            </div>
                        </div>

                        {{-- Existing photos --}}
                        @if(isset($photos) && $photos->count())
                        <div class="section-label">Current photos</div>
                        <div class="existing-photos">
                            @foreach($photos as $photo)
                            <div class="existing-photo-thumb">
                                <img src="{{ asset('storage/'.$photo) }}" alt="Profile photo">
                            </div>
                            @endforeach
                        </div>
                        @endif

                        <div class="section-label">Upload photos</div>
                        <div class="grid-2">
                            <div>
                                <label class="upload-box" for="photos">
                                    <i class="ti ti-photo"></i>
                                    <span class="upload-title">Profile photos</span>
                                    <span class="upload-hint">Click to select multiple images</span>
                                </label>
                                <input type="file" id="photos" name="photos[]" accept="image/*" multiple style="display:none">
                                <p class="file-tip" id="photosLabel">No files selected</p>
                            </div>
                            <div>
                                @if($profile && $profile->chartphoto)
                                <div class="existing-chart-thumb">
                                    <img src="{{ asset('storage/'.$profile->chartphoto) }}" alt="Chart">
                                </div>
                                @endif
                                <label class="upload-box" for="chartphoto">
                                    <i class="ti ti-file-chart"></i>
                                    <span class="upload-title">Jathaga chart</span>
                                    <span class="upload-hint">Click to upload chart image</span>
                                </label>
                                <input type="file" id="chartphoto" name="chartphoto" accept="image/*" style="display:none">
                                <p class="file-tip" id="chartLabel">No file selected</p>
                            </div>
                        </div>

                        <div class="field" style="margin-top: 1rem;">
                            <label>Expectations (countries / preferences)</label>
                            <input type="text" name="expectation"
                                   value="{{ $profile->expectation ?? '' }}"
                                   placeholder="e.g. UK, Canada, Germany...">
                        </div>

                        <div class="nav-row">
                            <button type="button" class="btn btn-ghost prev-btn">
                                <i class="ti ti-arrow-left"></i> Previous
                            </button>
                            <button type="submit" class="btn btn-success">
                                <i class="ti ti-check"></i> Submit profile
                            </button>
                        </div>
                    </div>

                </form>
            </div>
            {{-- End form-card --}}

        </div>
    </div>
</section>

{{-- SweetAlert: Validation errors --}}
@if(session('validation_errors'))
<script>
    Swal.fire({
        title: 'Validation errors',
        html: `{!! implode('<br>', session('validation_errors')) !!}`,
        icon: 'error',
        confirmButtonText: 'OK'
    });
</script>
@endif

{{-- SweetAlert: Other errors --}}
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

<script>
document.addEventListener("DOMContentLoaded", function () {
    let current = 0;
    const steps      = document.querySelectorAll(".form-step");
    const indicators = document.querySelectorAll(".step-item");

    function goTo(n) {
        steps[current].classList.remove("active");
        indicators[current].classList.remove("active");
        indicators[current].classList.add("done");

        current = n;

        steps[current].classList.add("active");
        indicators[current].classList.add("active");
        indicators[current].classList.remove("done");

        // Mark all previous steps as done, future steps as untouched
        indicators.forEach((item, i) => {
            if (i < current) {
                item.classList.add("done");
                item.classList.remove("active");
            } else if (i > current) {
                item.classList.remove("done", "active");
            }
        });

        window.scrollTo({ top: 0, behavior: "smooth" });
    }

    document.querySelectorAll(".next-btn").forEach(btn => {
        btn.addEventListener("click", () => {
            if (current < steps.length - 1) goTo(current + 1);
        });
    });

    document.querySelectorAll(".prev-btn").forEach(btn => {
        btn.addEventListener("click", () => {
            if (current > 0) goTo(current - 1);
        });
    });

    // File input labels
    document.getElementById("photos").addEventListener("change", function () {
        const label = document.getElementById("photosLabel");
        label.textContent = this.files.length
            ? this.files.length + " file(s) selected"
            : "No files selected";
    });

    document.getElementById("chartphoto").addEventListener("change", function () {
        const label = document.getElementById("chartLabel");
        label.textContent = this.files.length ? this.files[0].name : "No file selected";
    });
});
</script>

<style>
/* ============================
   SECTION WRAPPER
============================ */
.profile-section {
    background: #f7f6fb;
    min-height: 100vh;
    padding: 2.5rem 0 4rem;
}

.alert-success-bar {
    background: #e1f5ee;
    color: #0f6e56;
    border-left: 4px solid #0f6e56;
    padding: 0.75rem 1.25rem;
    font-size: 14px;
    font-weight: 500;
    margin-bottom: 1.5rem;
    border-radius: 6px;
    display: flex;
    align-items: center;
    gap: 8px;
}

.form-outer {
    max-width: 800px;
    margin: 0 auto;
    padding: 0 1rem;
}

/* ============================
   STEP PROGRESS BAR
============================ */
.step-bar {
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 2.5rem;
    gap: 0;
}

.step-connector {
    flex: 1;
    max-width: 120px;
    height: 2px;
    background: #ddd;
    transition: background 0.3s;
}

.step-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 8px;
}

.step-circle {
    width: 44px;
    height: 44px;
    border-radius: 50%;
    border: 2px solid #ddd;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    color: #aaa;
    background: #fff;
    transition: all 0.3s;
    position: relative;
    z-index: 1;
}

.step-label {
    font-size: 12px;
    font-weight: 500;
    color: #aaa;
    white-space: nowrap;
    transition: color 0.3s;
}

/* Active step */
.step-item.active .step-circle {
    border-color: #534AB7;
    color: #534AB7;
    background: #EEEDFE;
    box-shadow: 0 0 0 4px rgba(83, 74, 183, 0.12);
}
.step-item.active .step-label { color: #534AB7; }

/* Completed step */
.step-item.done .step-circle {
    border-color: #534AB7;
    background: #534AB7;
    color: #fff;
}
.step-item.done .step-label { color: #534AB7; }

/* Connector turns purple when left step is done */
.step-item.done + .step-connector { background: #534AB7; }

/* ============================
   FORM CARD
============================ */
.form-card {
    background: #fff;
    border-radius: 16px;
    border: 1px solid #ece9f8;
    padding: 2.5rem;
    box-shadow: 0 4px 24px rgba(83, 74, 183, 0.07);
}

/* ============================
   STEP SHOW/HIDE
============================ */
.form-step { display: none; }
.form-step.active { display: block; }

/* ============================
   STEP HEADER
============================ */
.step-header {
    margin-bottom: 1.75rem;
    padding-bottom: 1rem;
    border-bottom: 1px solid #f0eefb;
}
.step-header h2 {
    margin: 0 0 4px;
    font-size: 22px;
    font-weight: 600;
    color: #2d2b4e;
}
.step-header p {
    margin: 0;
    font-size: 14px;
    color: #888;
}

/* ============================
   GRID LAYOUT
============================ */
.grid-2 {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1rem;
    margin-bottom: 1rem;
}

@media (max-width: 560px) {
    .grid-2 { grid-template-columns: 1fr; }
    .form-card { padding: 1.5rem; }
}

/* ============================
   FIELDS
============================ */
.field {
    display: flex;
    flex-direction: column;
    gap: 6px;
}

.field label {
    font-size: 13px;
    font-weight: 600;
    color: #555;
}

.req { color: #e24b4a; }

.field input,
.field select {
    height: 42px;
    padding: 0 14px;
    border-radius: 8px;
    border: 1.5px solid #e0ddf5;
    background: #faf9ff;
    color: #2d2b4e;
    font-size: 14px;
    outline: none;
    transition: border-color 0.2s, box-shadow 0.2s;
    -webkit-appearance: none;
    appearance: none;
}

.field select {
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24' fill='none' stroke='%23888' stroke-width='2.5'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 14px center;
    padding-right: 36px;
}

.field input:focus,
.field select:focus {
    border-color: #7F77DD;
    box-shadow: 0 0 0 3px rgba(127, 119, 221, 0.15);
    background: #fff;
}

.field input::placeholder { color: #bbb; }

/* ============================
   SECTION LABEL
============================ */
.section-label {
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 0.08em;
    text-transform: uppercase;
    color: #888;
    margin: 1.5rem 0 0.75rem;
}

/* ============================
   EXISTING PHOTOS
============================ */
.existing-photos {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin-bottom: 1rem;
}

.existing-photo-thumb img,
.existing-chart-thumb img {
    width: 80px;
    height: 80px;
    object-fit: cover;
    border-radius: 8px;
    border: 1.5px solid #e0ddf5;
}

.existing-chart-thumb { margin-bottom: 8px; }

/* ============================
   UPLOAD BOX
============================ */
.upload-box {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 8px;
    border: 1.5px dashed #c9c4f0;
    border-radius: 10px;
    padding: 1.5rem 1rem;
    cursor: pointer;
    background: #faf9ff;
    text-align: center;
    transition: border-color 0.2s, background 0.2s;
}

.upload-box:hover {
    border-color: #7F77DD;
    background: #EEEDFE;
}

.upload-box i {
    font-size: 28px;
    color: #7F77DD;
}

.upload-title {
    font-size: 14px;
    font-weight: 600;
    color: #534AB7;
}

.upload-hint {
    font-size: 12px;
    color: #999;
}

.file-tip {
    font-size: 12px;
    color: #aaa;
    margin: 6px 0 0 4px;
}

/* ============================
   NAV BUTTONS
============================ */
.nav-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 2rem;
    padding-top: 1.25rem;
    border-top: 1px solid #f0eefb;
}

.btn {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    padding: 0 22px;
    height: 42px;
    border-radius: 8px;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
    border: 1.5px solid transparent;
    transition: all 0.18s;
    text-decoration: none;
}

.btn-ghost {
    background: transparent;
    border-color: #e0ddf5;
    color: #555;
}
.btn-ghost:hover {
    background: #f3f2fc;
    border-color: #c9c4f0;
}

.btn-primary {
    background: #534AB7;
    border-color: #534AB7;
    color: #fff;
}
.btn-primary:hover {
    background: #3C3489;
    border-color: #3C3489;
}

.btn-success {
    background: #0F6E56;
    border-color: #0F6E56;
    color: #fff;
}
.btn-success:hover {
    background: #085041;
    border-color: #085041;
}
</style>

@endsection