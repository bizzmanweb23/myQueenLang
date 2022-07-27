@extends('layouts.app')

@section('content')
<!-- Scroll Top -->
<a id="scroll-top" href="#top" title="Top" role="button" class="scroll-top"><i class="d-icon-arrow-up"></i></a>

<!-- MobileMenu -->
<div class="mobile-menu-wrapper">
    <div class="mobile-menu-overlay">
    </div>
    <!-- End of Overlay -->
    <a class="mobile-menu-close" href="#"><i class="d-icon-times"></i></a>
    <!-- End of CloseButton -->
    <div class="mobile-menu-container scrollable">
        <form action="#" class="input-wrapper">
            <input type="text" class="form-control" name="search" autocomplete="off"
                placeholder="Search your keyword..." required />
            <button class="btn btn-search" type="submit">
                <i class="d-icon-search"></i>
            </button>
        </form>
        <!-- End of Search Form -->
        <ul class="mobile-menu mmenu-anim">
            <li>
                <a href="{{url('/')}}">Home</a>
            </li>
            <li>
                <a href="{{url('about')}}">About</a>
            </li>
           
            <li>
                <a href="{{url('products')}}">Products</a>
                <ul>
                    <li><a href="{{url('products')}}">MQ Freckle Essence</a></li>
                    <li><a href="{{url('products')}}">MQ Anti-Blue Light Exquisite Spray</a></li>
                    <li><a href="{{url('products')}}">Coconut Oil Amino Acid Facial Cleanser</a></li>
                    <li><a href="{{url('products')}}">MQ Avocado Neckline Repair Message Cream</a></li>
                    <li><a href="{{url('products')}}">MQ Medical Mask</a></li>
                    
                </ul>
            </li>
          
         
            <li>
                <a href="{{url('contact')}}">Contact </a>
            </li>
            
        </ul>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
