@extends('layouts.dashboard.admin')

@section('content')
    <div class="main-content-inner">
        <div class="main-content-wrap">
            <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <h3>User Registration</h3>
                <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                    <li>
                        <a href="#">
                            <div class="text-tiny">Dashboard</div>
                        </a>
                    </li>
                    <li>
                        <i class="icon-chevron-right"></i>
                    </li>
                    <li>
                        <a href="#">
                            <div class="text-tiny">User Registration</div>
                        </a>
                    </li>
                 
                    
                </ul>
            </div>
            <!-- new-category -->
            <div class="wg-box">
                   @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
                @endif
    

                <form class="form-new-user form-style-1" action="{{ route('admin.register.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <fieldset class="name">

                        <div class="body-title">Name <span class="tf-color-1">*</span></div>
                        <input class="flex-grow" type="text" placeholder="name" name="name" tabindex="0"
                            value="{{ old('name') }}" aria-required="true" required="">

                    </fieldset>
                    @error('name')
                        <span class="alert alert-danger text-center">{{ $message }}</span>
                    @enderror

                    <fieldset class="name">

                        <div class="body-title">Email Address<span class="tf-color-1">*</span></div>
                        <input class="flex-grow" type="text" placeholder="Email Address" name="email" tabindex="0"
                            value="{{ old('email') }}" aria-required="true" required="">

                    </fieldset>
                    @error('email')
                        <span class="alert alert-danger text-center">{{ $message }}</span>
                    @enderror



                    <fieldset class="name">

                        <div class="body-title">Password <span class="tf-color-1">*</span></div>
                        <input class="flex-grow" type="password" placeholder="password" tabindex="0"
                            value="{{ old('password') }}" name="password" required autocomplete="new-password">

                    </fieldset>

                    @error('password')
                        <span class="alert alert-danger text-center">{{ $message }}</span>
                    @enderror

                    <fieldset class="name">

                        <div class="body-title">Confrim Password <span class="tf-color-1">*</span></div>
                        <input class="flex-grow" type="password" placeholder="Confrim Password" tabindex="0"
                          name="password_confirmation" required
                        autocomplete="new-password">

                    </fieldset>

                    @error('Confrim Password')
                        <span class="alert alert-danger text-center">{{ $message }}</span>
                    @enderror


                    <div class="bot">
                        <div></div>
                        <button class="tf-button w208" type="submit">User Register</button>
                    </div>


                </form>
            </div>
        </div>
    </div>

@endsection
