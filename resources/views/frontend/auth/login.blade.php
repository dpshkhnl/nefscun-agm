@extends('frontend.layouts.app')

@section('title', __('Login'))

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <x-frontend.card>
                
                    <x-slot name="header">
                    <div class="logo d-flex justify-content-center">
              <a href="https://www.nefscun.org.np/"><img src="/images/banner_logo.png" alt="" class="logo img-fluid" /></a>
            </div>
                    </x-slot>

                    <x-slot name="body">
                        <x-forms.post :action="route('frontend.auth.login')">
                        
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">नेफ्स्कून सदस्यता नं: </label>

                                <div class="col-md-6">
                                    <input type="text" name="email" id="email" class="form-control" placeholder="Nefscun Member" value="{{ old('email') }}" maxlength="255" required autofocus autocomplete="email" />
                                </div>
                            </div><!--form-group-->

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">पासवर्ड </label>

                                <div class="col-md-6">
                                    <input type="password" name="password" id="password" class="form-control" placeholder="{{ __('Password') }}" maxlength="100" required autocomplete="current-password" />
                                </div>
                            </div><!--form-group-->

                      

                            @if(config('boilerplate.access.captcha.login'))
                                <div class="row">
                                    <div class="col">
                                        @captcha
                                        <input type="hidden" name="captcha_status" value="true" />
                                    </div><!--col-->
                                </div><!--row-->
                            @endif

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button class="btn btn-primary" type="submit">@lang('Login')</button>

                                    <x-utils.link :href="route('frontend.auth.password.request')" class="btn btn-link" :text="__('Forgot Your Password?')" />
                                </div>
                            </div><!--form-group-->

                            <div class="text-center">
                                @include('frontend.auth.includes.social')
                            </div>
                        </x-forms.post>
                    </x-slot>
                </x-frontend.card>
            </div><!--col-md-8-->
        </div><!--row-->
    </div><!--container-->
@endsection
