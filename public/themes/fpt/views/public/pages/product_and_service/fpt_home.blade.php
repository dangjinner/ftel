@extends('public.layout')

@section('content')
<div class="single-banner">
    <img src="{{ $category_services->parent->banner->path }}" alt="" class="img-fluid">
    <div class="bg-menu-banner">
      <div class="container">
         <div class="row">
           @foreach($primaryMenu[0]->children()->get() as $menuItem)
                    <div class="col-lg-3 col-md-3 col-sm-3 col-6">
                        <a href="{{ $menuItem->url }}" @if($loop->iteration == 4) class="active" @endif>{{ $menuItem->name }}</a>
                    </div>
            @endforeach
         </div>
      </div>
    </div>
 </div>
 <div class="breadcrumbs_area">
    <div class="container">
       <div class="row">
          <div class="col-12">
             <div class="breadcrumb_content">
                <ul>
                   <li>
                      <h1><a href="{{ route('home') }}">Trang chủ</a></h1>
                   </li>
                   <li>Sản phẩm dịch vụ</li>
                   <li>Smart Home</li>
                   <li>Fpt Ihome</li>
                </ul>
             </div>
          </div>
       </div>
    </div>
 </div>
 <section class="productservice productservice--1">
    <div class="container">
      <div class="col-lg-12 col-12">
         <div class="testimonial-carousel--1 slick-custom slick-custom-default nav-top">
            <div class="single_testimonial text-center ">
               <a class="productservice__img" href="{{ route('pages.fptCamera') }}">
               <img src="{{ v(theme::url('assets/images/icon/cap quang ca nhan fpt.png'))}}" alt="" class="img-fluid">
               </a>
               <p>
                  <a href="{{ route('pages.fptCamera') }}" alt="FPT Camera">FPT Camera</a>
               </p>
            </div>
            <div class="single_testimonial text-center active">
               <a class="productservice__img" href="{{ route('pages.fptIhome') }}">
               <img src="{{ v(theme::url('assets/images/icon/cap quang doanh nghiep fpt.png'))}}" alt="" class="img-fluid">
               </a>
               <p>
                  <a href="{{ route('pages.fptIhome') }}" alt="Cáp quang doanh nghiệp">FPT iHome</a>
               </p>
            </div>
         </div>
      </div>
    </div>
 </section>
 <section class="fpt__ihome">
    {!! $category_services->intro !!}
 </section>
@include('public.sections.support')
@endsection
