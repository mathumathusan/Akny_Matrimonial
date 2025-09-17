@extends('layouts.master')


@section('content')

<!-- PROFILE -->
<section>
    <div class="profi-pg profi-ban">
        <div class="">
            <div class="">
                <div class="profile">
                    <div class="pg-pro-big-im">
                        <div class="s1">
                       <img src="{{ isset($profile->photos[0]) ? asset('storage/' . $profile->photos[0]) : asset('images/default-profile.jpg') }}"
                                loading="lazy" class="pro" alt="">
                        </div>
                        <div class="s3">
                            <a href="#!" class="cta fol cta-chat">Chat now</a>
                            <span class="cta cta-sendint" data-toggle="modal" data-target="#sendInter">Send interest</span>
                        </div>
                    </div>
                </div>

                <div class="profi-pg profi-bio">
                    <div class="lhs">
                        <!-- Intro -->
                        <div class="pro-pg-intro">
                            <h1>{{ $profile->name }}</h1>
                            <div class="pro-info-status">
                                <span class="stat-1"><b>{{ $profile->viewers ?? 0 }}</b> viewers</span>
                                <span class="stat-2">
                                    {{-- <b>{{ $profile->is_online ? 'Available' : 'Offline' }}</b>--}}
                                </span>
                            </div>
                            <ul>
                                <li>
                                    <div>
                                        <img src="{{ asset('images/icon/pro-city.png') }}" alt="">
                                        <span>City: <strong>{{ $profile->country_of_residence }}</strong></span>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <img src="{{ asset('images/icon/pro-age.png') }}" alt="">
                                       <span>Age: <strong>{{ \Carbon\Carbon::parse($profile->dob)->age }}</strong></span>

                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <img src="{{ asset('images/icon/pro-city.png') }}" alt="">
                                        <span>Height: <strong>{{ $profile->height }}</strong></span>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <img src="{{ asset('images/icon/pro-city.png') }}" alt="">
                                        <span>Job: <strong>{{ $profile->job }}</strong></span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- END Intro -->

                        <!-- About -->
                        <div class="pr-bio-c pr-bio-abo">
                            <h3>About</h3>
                            <p>{{ $profile->expectation?? 'No bio available.' }}</p>
                        </div>
                        <!-- END About -->

                        <!-- Photo Gallery -->
                        <div class="pr-bio-c pr-bio-gal" id="gallery">
                            <h3>Photo gallery</h3>
                            <div id="image-gallery">
                                @forelse($profile->photos as $photo)
                                <div class="pro-gal-imag">
                                    <div class="img-wrapper">
                                        <a href="{{ asset($photo) }}">
                                            <img src="{{ asset('storage/'.$photo) }}"  class="img-responsive" alt="">
                                       
                                        </a>
                                        <div class="img-overlay">
                                            <i class="fa fa-arrows-alt"></i>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <p>No photos uploaded.</p>
                                @endforelse
                            </div>
                        </div>
                        <!-- END Photo Gallery -->

                        <!-- Contact Info -->
                        <div class="pr-bio-c pr-bio-conta">
                            <h3>Contact info</h3>
                            <ul>
                                <li><span><i class="fa fa-mobile"></i><b>Phone:</b> {{ $profile->phone_number ?? 'N/A' }}</span></li>
                             
                                
                            </ul>
                        </div>
                        <!-- END Contact Info -->

                        <!-- Personal Info -->
                        <div class="pr-bio-c pr-bio-info">
                            <h3>Personal information</h3>
                            <ul>
                                <li><b>Name:</b> {{ $profile->name }}</li>
                                <li><b>Date of birth:</b> {{ $profile->dob ?? 'N/A' }}</li>
                                <li><b>Height:</b> {{ $profile->height }}</li>
                                <li><b>Weight:</b> {{ $profile->weight ?? 'N/A' }}</li>
                                <li><b>Degree:</b> {{ $profile->education_level ?? 'N/A' }}</li>
                                <li><b>Religion:</b> {{ $profile->religion ?? 'N/A' }}</li>
                                <li><b>Profession:</b> {{ $profile->profession ?? 'N/A' }}</li>
                                <li><b>Color:</b> {{ $profile->complexion ?? 'N/A' }}</li>
                                <li><b>Position:</b> {{ $profile->Job ?? 'N/A' }}</li>
                                
                            </ul>
                        </div>
                        <!-- END Personal Info -->

                        <!-- Hobbies -->
                        <div class="pr-bio-c pr-bio-hob">
                            <h3>Hobbies</h3>
                            {{--
                            <ul>
                                @if(!empty($profile->hobbies))
                                @foreach(explode(',', $profile->hobbies) as $hobby)
                                <li><span>{{ trim($hobby) }}</span></li>
                                @endforeach
                                @else
                                <li><span>No hobbies listed</span></li>
                                @endif
                            </ul>--}}
                        </div>
                        <!-- END Hobbies -->

                        <!-- Social Media -->
                        <div class="pr-bio-c menu-pop-soci pr-bio-soc">
                            <h3>Social media</h3>
                            {{--
                            <ul>
                                @if(!empty($profile->facebook)) <li><a href="{{ $profile->facebook }}"><i class="fa fa-facebook"></i></a></li> @endif
                                @if(!empty($profile->twitter)) <li><a href="{{ $profile->twitter }}"><i class="fa fa-twitter"></i></a></li> @endif
                                @if(!empty($profile->whatsapp)) <li><a href="{{ $profile->whatsapp }}"><i class="fa fa-whatsapp"></i></a></li> @endif
                                @if(!empty($profile->linkedin)) <li><a href="{{ $profile->linkedin }}"><i class="fa fa-linkedin"></i></a></li> @endif
                                @if(!empty($profile->youtube)) <li><a href="{{ $profile->youtube }}"><i class="fa fa-youtube-play"></i></a></li> @endif
                                @if(!empty($profile->instagram)) <li><a href="{{ $profile->instagram }}"><i class="fa fa-instagram"></i></a></li> @endif
                            </ul> -}}
                        </div>
                        <!-- END Social Media -->

                    </div>

                    <!-- RHS Section -->
                    <div class="rhs">
                        <!-- Help Box -->
                        <div class="prof-rhs-help">
                            <div class="inn">
                                <h3>Tell us your Needs</h3>
                                <p>Tell us what kind of service or experts you are looking.</p>
                                <a href="{{ route('register') }}">Register for free</a>
                            </div>
                        </div>
                        <!-- Related Profiles -->
                        <div class="slid-inn pr-bio-c wedd-rel-pro">
                            <h3>Related profiles</h3>
                            <ul class="slider3">
                                {{-- Example related profiles loop --}}
                                @foreach($relatedProfiles ?? [] as $rel)
                                <li>
                                    <div class="wedd-rel-box">
                                        <div class="wedd-rel-img">
                                            <img src="{{ $rel->photos[0] ?? asset('images/default-profile.jpg') }}" alt="">
                                            <span class="badge badge-success">{{ $rel->age }} Years old</span>
                                        </div>
                                        <div class="wedd-rel-con">
                                            <h5>{{ $rel->name }}</h5>
                                            <span>City: <b>{{ $rel->city }}</b></span>
                                        </div>
                                        <a href="{{ route('profile.show', $rel->id) }}" class="fclick"></a>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- END Related Profiles -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END PROFILE -->

<!-- Interest Modal -->
<div class="modal fade" id="sendInter">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title seninter-tit">Send interest to <span class="intename">{{ $profile->name }}</span></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body seninter">
                <div class="lhs">
                    <img src="{{ $profile->photos[0] ?? asset('images/default-profile.jpg') }}" alt="" class="intephoto1">
                </div>
                <div class="rhs">
                    <h4><span class="intename1">{{ $profile->name }}</span> can view the below details</h4>
                    <ul>
                        <li>
                            <div class="chbox"><input type="checkbox" id="pro_about" checked><label for="pro_about">About section</label></div>
                        </li>
                        <li>
                            <div class="chbox"><input type="checkbox" id="pro_photo"><label for="pro_photo">Photo gallery</label></div>
                        </li>
                        <li>
                            <div class="chbox"><input type="checkbox" id="pro_contact"><label for="pro_contact">Contact info</label></div>
                        </li>
                        <li>
                            <div class="chbox"><input type="checkbox" id="pro_person"><label for="pro_person">Personal info</label></div>
                        </li>
                        <li>
                            <div class="chbox"><input type="checkbox" id="pro_hobbi"><label for="pro_hobbi">Hobbies</label></div>
                        </li>
                        <li>
                            <div class="chbox"><input type="checkbox" id="pro_social"><label for="pro_social">Social media</label></div>
                        </li>
                    </ul>
                    <div class="form-floating">
                        <textarea class="form-control" id="comment" name="text" placeholder="Comment goes here"></textarea>
                        <label for="comment">Write some message to <span class="intename">{{ $profile->name }}</span></label>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Send interest</button>
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancel</button>
            </div>

        </div>
    </div>
</div>
<!-- END Interest Modal -->

@endsection