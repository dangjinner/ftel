@extends('public.layout')

@section('content')
<div class="single-banner">
    <img src="{{ v(theme::url('assets/images/dang ky online fpt.png')) }}" alt="Đăng ký online FPT" class="img-fluid">
    <div class="bg-menu-banner">
       <div class="container">
          <div class="row">
             <div class="col-lg-3 col-md-3 col-sm-3 col-6">
                <a href="{{ route('pages.support.fptTelevision') }}" class="active">Hỗ trợ thông tin</a>
             </div>
             <div class="col-lg-3 col-md-3 col-sm-3 col-6">
                <a href="{{ route('pages.support.installationInstructions') }}">Hỗ trợ kỹ thuật</a>
             </div>
             <div class="col-lg-3 col-md-3 col-sm-3 col-6">
                <a href="{{ route('pages.support.contact') }}">
                Liên Hệ</a>
             </div>
             <div class="col-lg-3 col-md-3 col-sm-3 col-6">
                <a href="#">
                Phản hồi khách hàng</a>
             </div>
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
                   <li>Hỗ trợ</li>
                   <li>Hướng dẫn sử dụng</li>
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
             <div class="single_testimonial text-center active">
                <a class="productservice__img" href="{{ route('pages.support.fptTelevision') }}">
                <img src="{{ v(theme::url('assets/images/icon/support-info-fpt-1.png')) }}" alt="Hướng dẫn sử dụng FPT" class="img-fluid">
                </a>
                <p>
                   <a href="#" alt="Hướng dẫn sử dụng">Hướng dẫn sử dụng</a>
                </p>
             </div>
             <div class="single_testimonial text-center">
                <a class="productservice__img" href="#">
                <img src="{{ v(theme::url('assets/images/icon/support-info-fpt-2.png')) }}" alt="Hướng dẫn thủ tục FPT" class="img-fluid">
                </a>
                <p>
                   <a href="#" alt="Hướng dẫn thủ tục">Hướng dẫn thủ tục</a>
                </p>
             </div>
             <div class="single_testimonial text-center">
                <a class="productservice__img" href="{{ route('pages.support.privacyPolicy') }}">
                <img src="{{ v(theme::url('assets/images/icon/support-info-fpt-4.png')) }}" alt="Điều khoản bảo mật" class="img-fluid">
                </a>
                <p>
                   <a href="{{ route('pages.support.privacyPolicy') }}" alt="Điều khoản bảo mật">Điều khoản bảo mật</a>
                </p>
             </div>
             <div class="single_testimonial text-center">
                <a class="productservice__img" href="{{ route('pages.support.faq') }}">
                <img src="{{ v(theme::url('assets/images/icon/support-info-fpt-5.png')) }}" alt="Câu hỏi thường gặp" class="img-fluid">
                </a>
                <p>
                   <a href="{{ route('pages.support.faq') }}" alt="Điều khoản bảo mật">Câu hỏi thường gặp</a>
                </p>
             </div>
          </div>
       </div>
    </div>
 </section>
 <div class="product-category-area productservice">
    <div class="container">
       <ul class="product-thing-tab category-tabs slick-custom slick-custom-default">
          <li class="nav-item">
             <a class="nav-link active" id="four-tab"  href="{{ route('pages.support.fptTelevision') }}">
             <span><img src="{{ v(theme::url('assets/images/icon/i-box fpt.png')) }}" alt="Truyền hình FPT" class="img-fluid"></span>
             <span>Truyền hình FPT</span>
             </a>
          </li>
          <li class="nav-item">
             <a class="nav-link" id="five-tab"  href="{{ route('pages.support.camera') }}">
             <span><img src="{{ v(theme::url('assets/images/icon/i-camfc fpt.png')) }}" alt="Camera FPT" class="img-fluid"></span>
             <span>Camera</span>
             </a>
          </li>
          <li class="nav-item">
             <a class="nav-link" id="six-tab"  href="{{route('pages.support.fptPlaybox')}}">
             <span><img src="{{ v(theme::url('assets/images/icon/i-hdbox fpt.png')) }}" alt="fPT Play Box" class="img-fluid"></span>
             <span>FPT Play Box</span>
             </a>
          </li>
          <li class="nav-item">
             <a class="nav-link" id="eight-tab"  href="{{ route('pages.support.hiFpt') }}">
             <span><img src="{{ v(theme::url('assets/images/icon/i-fpt-play fpt.png')) }}" alt="Hi FPT" class="img-fluid"></span>
             <span>Hi FPT</span>
             </a>
          </li>
       </ul>
    </div>
 </div>
 <div class="product-category-area">
    <div class="container">
       <div class="row">
          <div class="col-lg-12">
             <div class="tab-content">
                <div class="tab-pane fade show active" id="four">
                   <!-- Single-Product-Start -->
                   <form action="#" class="cart-form">
                      <!-- Cart Title Start -->
                      <!-- Cart Title End -->
                      <!-- Cart Table Area Start -->
                      <div class="table-desc">
                         <div class="cart-page table-responsive">
                            <table>
                               <thead>
                                  <tr>
                                     <th class="product-name">Tên tài liệu</th>
                                     <th class="product-price">Video</th>
                                     <th class="product-quantity">Tài liệu</th>
                                     <th class="product-remove">Ngày đăng</th>
                                  </tr>
                               </thead>
                               <tbody>
                                  <tr>
                                     <td class="product-name"><a href="#">1 - Hướng dẫn sử dụng Truyền hình FPT - Phiên bản Lucas Onca</a></td>
                                     <td class="product-price"><img src="{{ v(theme::url('assets/images/icon/video fpt.png')) }}" /></td>
                                     <td class="product-total"><img src="{{ v(theme::url('assets/images/icon/view fpt.png')) }}" /></td>
                                     <td class="product-remove"><a href="#">25-09-2017
                                        </a>
                                     </td>
                                  </tr>
                                  <tr>
                                     <td class="product-name"><a href="#">2 - Sao chép điều kiển Tivi</a></td>
                                     <td class="product-price"><img src="{{ v(theme::url('assets/images/icon/video fpt.png')) }}" /></td>
                                     <td class="product-total"><img src="{{ v(theme::url('assets/images/icon/view fpt.png')) }}" /></td>
                                     <td class="product-remove"><a href="#">12-09-2017
                                        </a>
                                     </td>
                                  </tr>
                                  <tr>
                                     <td class="product-name"><a href="#">3 - Trang Home</a></td>
                                     <td class="product-price"><img src="{{ v(theme::url('assets/images/icon/video fpt.png')) }}" /></td>
                                     <td class="product-total"><img src="{{ v(theme::url('assets/images/icon/view fpt.png')) }}" /></td>
                                     <td class="product-remove"><a href="#">12-09-2017
                                        </a>
                                     </td>
                                  </tr>
                                  <tr>
                                     <td class="product-name"><a href="#">4 - Phím Menu</a></td>
                                     <td class="product-price"><img src="{{ v(theme::url('assets/images/icon/video fpt.png')) }}" /></td>
                                     <td class="product-total"><img src="{{ v(theme::url('assets/images/icon/view fpt.png')) }}" /></td>
                                     <td class="product-remove"><a href="#">12-09-2017
                                        </a>
                                     </td>
                                  </tr>
                                  <tr>
                                     <td class="product-name"><a href="#">5 - Thanh Player</a></td>
                                     <td class="product-price"><img src="{{ v(theme::url('assets/images/icon/video fpt.png')) }}" /></td>
                                     <td class="product-total"><img src="{{ v(theme::url('assets/images/icon/view fpt.png')) }}" /></td>
                                     <td class="product-remove"><a href="#">12-09-2017
                                        </a>
                                     </td>
                                  </tr>
                                  <tr>
                                     <td class="product-name"><a href="#">6 - Tài khoản đăng nhập</a></td>
                                     <td class="product-price"><img src="{{ v(theme::url('assets/images/icon/video fpt.png')) }}" /></td>
                                     <td class="product-total"><img src="{{ v(theme::url('assets/images/icon/view fpt.png')) }}" /></td>
                                     <td class="product-remove"><a href="#">12-09-2017
                                        </a>
                                     </td>
                                  </tr>
                                  <tr>
                                     <td class="product-name"><a href="#">7 - Lưu kênh yêu thích</a></td>
                                     <td class="product-price"><img src="{{ v(theme::url('assets/images/icon/video fpt.png')) }}" /></td>
                                     <td class="product-total"><img src="{{ v(theme::url('assets/images/icon/view fpt.png')) }}" /></td>
                                     <td class="product-remove"><a href="#">12-09-2017
                                        </a>
                                     </td>
                                  </tr>
                                  <tr>
                                     <td class="product-name"><a href="#">8 - Truyền hình xem lại</a></td>
                                     <td class="product-price"><img src="{{ v(theme::url('assets/images/icon/video fpt.png')) }}" /></td>
                                     <td class="product-total"><img src="{{ v(theme::url('assets/images/icon/view fpt.png')) }}" /></td>
                                     <td class="product-remove"><a href="#">12-09-2017
                                        </a>
                                     </td>
                                  </tr>
                                  <tr>
                                     <td class="product-name"><a href="#">9 - Đặt lịch nhắc nhở</a></td>
                                     <td class="product-price"><img src="{{ v(theme::url('assets/images/icon/video fpt.png')) }}" /></td>
                                     <td class="product-total"><img src="{{ v(theme::url('assets/images/icon/view fpt.png')) }}" /></td>
                                     <td class="product-remove"><a href="#">12-09-2017
                                        </a>
                                     </td>
                                  </tr>
                                  <tr>
                                     <td class="product-name"><a href="#">10 - Giám sát trẻ em</a></td>
                                     <td class="product-price"><img src="{{ v(theme::url('assets/images/icon/video fpt.png')) }}" /></td>
                                     <td class="product-total"><img src="{{ v(theme::url('assets/images/icon/view fpt.png')) }}" /></td>
                                     <td class="product-remove"><a href="#">12-09-2017
                                        </a>
                                     </td>
                                  </tr>
                                  <tr>
                                     <td class="product-name"><a href="#">11 - Tuỳ chỉnh phụ đề thuyết minh</a></td>
                                     <td class="product-price"><img src="{{ v(theme::url('assets/images/icon/video fpt.png')) }}" /></td>
                                     <td class="product-total"><img src="{{ v(theme::url('assets/images/icon/view fpt.png')) }}" /></td>
                                     <td class="product-remove"><a href="#">12-09-2017
                                        </a>
                                     </td>
                                  </tr>
                                  <tr>
                                     <td class="product-name"><a href="#">12 - FPT Remote App</a></td>
                                     <td class="product-price"><img src="{{ v(theme::url('assets/images/icon/video fpt.png')) }}" /></td>
                                     <td class="product-total"><img src="{{ v(theme::url('assets/images/icon/view fpt.png')) }}" /></td>
                                     <td class="product-remove"><a href="#">12-09-2017
                                        </a>
                                     </td>
                                  </tr>
                                  <tr>
                                     <td class="product-name"><a href="#">13 - Xử lý sự cố đơn giản</a></td>
                                     <td class="product-price"><img src="{{ v(theme::url('assets/images/icon/video fpt.png')) }}" /></td>
                                     <td class="product-total"><img src="{{ v(theme::url('assets/images/icon/view fpt.png')) }}" /></td>
                                     <td class="product-remove"><a href="#">12-09-2017
                                        </a>
                                     </td>
                                  </tr>
                                  <tr>
                                     <td class="product-name"><a href="#">14 - Ứng dụng thiếu nhi</a></td>
                                     <td class="product-price"><img src="{{ v(theme::url('assets/images/icon/video fpt.png')) }}" /></td>
                                     <td class="product-total"><img src="{{ v(theme::url('assets/images/icon/view fpt.png')) }}" /></td>
                                     <td class="product-remove"><a href="#">12-09-2017
                                        </a>
                                     </td>
                                  </tr>
                                  <tr>
                                     <td class="product-name"><a href="#">15 - Ứng dụng giải trí</a></td>
                                     <td class="product-price"><img src="{{ v(theme::url('assets/images/icon/video fpt.png')) }}" /></td>
                                     <td class="product-total"><img src="{{ v(theme::url('assets/images/icon/view fpt.png')) }}" /></td>
                                     <td class="product-remove"><a href="#">12-09-2017
                                        </a>
                                     </td>
                                  </tr>
                                  <tr>
                                     <td class="product-name"><a href="#">16 - Ứng dụng Danet</a></td>
                                     <td class="product-price"><img src="{{ v(theme::url('assets/images/icon/video fpt.png')) }}" /></td>
                                     <td class="product-total"><img src="{{ v(theme::url('assets/images/icon/view fpt.png')) }}" /></td>
                                     <td class="product-remove"><a href="#">12-09-2017
                                        </a>
                                     </td>
                                  </tr>
                                  <tr>
                                     <td class="product-name"><a href="#">17 - Ứng dụng Film+</a></td>
                                     <td class="product-price"><img src="{{ v(theme::url('assets/images/icon/video fpt.png')) }}" /></td>
                                     <td class="product-total"><img src="{{ v(theme::url('assets/images/icon/view fpt.png')) }}" /></td>
                                     <td class="product-remove"><a href="#">12-09-2017
                                        </a>
                                     </td>
                                  </tr>
                                  <tr>
                                     <td class="product-name"><a href="#">18 - Ứng dụng Phim truyện</a></td>
                                     <td class="product-price"><img src="{{ v(theme::url('assets/images/icon/video fpt.png')) }}" /></td>
                                     <td class="product-total"><img src="{{ v(theme::url('assets/images/icon/view fpt.png')) }}" /></td>
                                     <td class="product-remove"><a href="#">12-09-2017
                                        </a>
                                     </td>
                                  </tr>
                                  <tr>
                                     <td class="product-name"><a href="#">19 - Hướng dẫn xem phim sắp hạ</a></td>
                                     <td class="product-price"><img src="{{ v(theme::url('assets/images/icon/video fpt.png')) }}" /></td>
                                     <td class="product-total"><img src="{{ v(theme::url('assets/images/icon/view fpt.png')) }}" /></td>
                                     <td class="product-remove"><a href="#">12-09-2017
                                        </a>
                                     </td>
                                  </tr>
                                  <tr>
                                     <td class="product-name"><a href="#">20 - Ứng dụng thể thao</a></td>
                                     <td class="product-price"><img src="{{ v(theme::url('assets/images/icon/video fpt.png')) }}" /></td>
                                     <td class="product-total"><img src="{{ v(theme::url('assets/images/icon/view fpt.png')) }}" /></td>
                                     <td class="product-remove"><a href="#">24-10-2017
                                        </a>
                                     </td>
                                  </tr>
                                  <tr>
                                     <td class="product-name"><a href="#">21 - Ứng dụng sự kiện</a></td>
                                     <td class="product-price"><img src="{{ v(theme::url('assets/images/icon/video fpt.png')) }}" /></td>
                                     <td class="product-total"><img src="{{ v(theme::url('assets/images/icon/view fpt.png')) }}" /></td>
                                     <td class="product-remove"><a href="#">24-10-2017
                                        </a>
                                     </td>
                                  </tr>
                                  <tr>
                                     <td class="product-name"><a href="#">22 - Karativi</a></td>
                                     <td class="product-price"><img src="{{ v(theme::url('assets/images/icon/video fpt.png')) }}" /></td>
                                     <td class="product-total"><img src="{{ v(theme::url('assets/images/icon/view fpt.png')) }}" /></td>
                                     <td class="product-remove"><a href="#">24-10-2017
                                        </a>
                                     </td>
                                  </tr>
                                  <tr>
                                     <td class="product-name"><a href="#">23 - Karativi Mobile</a></td>
                                     <td class="product-price"><img src="{{ v(theme::url('assets/images/icon/video fpt.png')) }}" /></td>
                                     <td class="product-total"><img src="{{ v(theme::url('assets/images/icon/view fpt.png')) }}" /></td>
                                     <td class="product-remove"><a href="#">24-10-2017
                                        </a>
                                     </td>
                                  </tr>
                               </tbody>
                            </table>
                         </div>
                      </div>
                      <!-- Cart Table Area End -->
                      <!-- Coupon Area Start -->
                      <!-- Coupon Area End -->
                   </form>
                   <!-- Single-Product-End -->
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>
@endsection
