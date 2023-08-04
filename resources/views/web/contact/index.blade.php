@extends('layouts.master')
@push('styles')

@endpush
@section('content')

    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow">Home</a>
                    <span></span> Contact us
                </div>
            </div>
        </div>


        @if (session('success'))
            <div class="col-sm-12">
                <div class="alert  alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        @endif

        <section class="pt-50 pb-50">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-10 m-auto">
                        <div class="contact-from-area padding-20-row-col wow FadeInUp">
                            <h3 class="mb-10 text-center">Drop Us a Line</h3>
                            <p class="text-muted mb-30 text-center font-sm">Lorem ipsum dolor sit amet consectetur.</p>
                            <form class="contact-form-style text-center" id="contact-form"
                                  action="{{route('contact.store')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        @auth()
                                            <div class="input-style mb-20">
                                                <input name="name" value="{{Auth::user()->name}}" placeholder=" Name"
                                                       type="text">
                                            </div>
                                        @else
                                            <div class="input-style mb-20">
                                                <input name="name" placeholder=" Name" type="text">
                                            </div>
                                        @endauth

                                        @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                    </div>


                                    <div class="col-lg-6 col-md-6">
                                        @auth()

                                            <div class="input-style mb-20">
                                                <input name="email" value="{{Auth::user()->email}}"
                                                       placeholder="Your Email" type="email">
                                            </div>
                                        @else
                                            <div class="input-style mb-20">
                                                <input name="email" placeholder="Your Email" type="email">
                                            </div>
                                        @endauth

                                        @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <div class="col-lg-6 col-md-6">
                                        <div class="input-style mb-20">
                                            <input name="phone" placeholder="Your Phone" type="tel">
                                        </div>
                                        @error('phone')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-lg-6 col-md-6">
                                        <div class="input-style mb-20">
                                            <input name="subject" placeholder="Subject" type="text">
                                            @error('subject')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>


                                    <div class="col-lg-12 col-md-12">
                                        <div class="textarea-style mb-30">
                                            <textarea name="message" placeholder="Message"></textarea>

                                            @error('message')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <button class="submit submit-auto-width" type="submit">Send message</button>


                                    </div>

                                </div>
                            </form>
                            <p class="form-messege"></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
@push('scripts')

@endpush
