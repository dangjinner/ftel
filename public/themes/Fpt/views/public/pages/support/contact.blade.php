@extends('public.layout')

@section('css')
<style>
    #map_canvas {
        height: 500px;
        width: 100%;
    }

    .custom-combobox {
        position: relative;
        display: inline-block;
        width: 100%;
    }

    .custom-combobox-toggle {
        position: absolute;
        top: 0;
        bottom: 0;
        margin-left: -1px;
        padding: 0;
    }

    .custom-combobox-input {
        margin: 0;
        padding: 5px 10px;
        width: 90%;
        background-color: #ffffff;
    }

    .item-localtion {
        padding-bottom: 20px;
    }

    .text-pink {
        color: #fd6436;
    }

    #store-locator {
        height: 400px;
        overflow: auto;
    }

    #store-locator::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        border-radius: 10px;
        background-color: #F5F5F5;
    }

    #store-locator::-webkit-scrollbar {
        width: 12px;
        background-color: #F5F5F5;
    }

    #store-locator::-webkit-scrollbar-thumb {
        border-radius: 10px;
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, .3);
        background-color: #555;
    }

    .choose-province {
        color: #606060;
        font-size: 16px;
        font-weight: 600;
    }

    .choose-province i {
        font-size: 1.2rem;
        margin-right: 5px;
    }
    .margin-35 {
        padding: 35px 0;
    }
    .social-contact > div > div > div{
        min-height: 70px;
        padding-top: 5px;
        margin-bottom: 30px;
        float: left;
        width: 72px;
    }
    .social-contact > div > div > div:nth-of-type(2) {
        width: calc(100% - 72px);
        padding-top: 12px;
    }
    .social-contact> div>div>div.pad-hotline {
        padding-top: 8px;
    }
    .social-contact p {
        color: #f37021;
        margin-bottom: 0;
    }
    .social-contact a.number-call {
        font-size: 31px;
        line-height: 31px;
    }
    .social-contact a {
        color: #00f;
    }
</style>
@endsection
@section('content')
<div class="single-banner">
    <img src="{{ v(theme::url('assets/images/dang ky online fpt.png')) }}" alt="Đăng ký online FPT" class="img-fluid">
    <div class="bg-menu-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-6">
                    <a href="{{ route('pages.support.fptTelevision') }}">Hỗ trợ thông tin</a>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-6">
                    <a href="{{ route('pages.support.installationInstructions') }}">Hỗ trợ kỹ thuật</a>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-6">
                    <a href="{{ route('pages.support.contact') }}" class="active">
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
                        <li>
                            <h1>
                                <a href="{{ route('pages.support.contact') }}">Liên hệ 24/7</a>
                            </h1>
                        </li>
                        <li>Địa điểm giao dịch</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="feature news maps">
    <div class="container">

        <div class="row">

            <div class="col-lg-12 maps__title">
                <div class="block-title block__orange">
                    <h2>
                        <span class="block__image">
                            <img src="{{ Theme::url('images/map1.png') }}">
                        </span>
                        ĐIỂM GIAO DỊCH
                    </h2>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="form-group">
                    <h3 style="font-size: 25px;" class="text-uppercase">Bản đồ</h3>
                </div>
                <div id="map_canvas">
                </div>
            </div>
            <div class="col-lg-5">
                <div class="form-group">
                    <h3 style="font-size: 25px;" class="text-uppercase">Danh sách điểm giao dịch</h3>
                </div>
                <div class="store-locator-wrapper">
                    <div class="form-group">
                        <label class="choose-province">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            Chọn tỉnh thành
                        </label>
                        <div class="ui-widget">
                            <select id="province" class="form-control form-control" name="province" name="province">
                                @foreach ($provinces as $key => $value)
                                    <option value="{{$key}}">{{$value}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div id="store-locator-wrapper">
                        <div id="store-locator"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div>
    <div class="box-bg-white margin-35">
        <div class="container social-contact container-fluid">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12 display-tbl-d" style="height: 100px;">
                    <div class="pad-l-r-5"><img alt="hi fpt"
                            src="{{ v(theme::url('assets/images/hi_fpt.png')) }}"></div>

                    <div class="pad-l-r-5 pad-hotline">
                        <p class="text-uppercase">Ứng dụng CSKH</p>
                        <a class="number-call" href="{{setting('fpt_setting_hifpt_support_url')}}" target="_blank"
                            rel="noreferrer noopener">Hi
                            FPT</a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12 display-tbl-d" style="height: 100px;">
                    <div class="pad-l-r-5"><img alt="hotline"
                            src="{{ v(theme::url('assets/images/fpt_hotline.png')) }}"></div>

                    <div class="pad-l-r-5 pad-hotline">
                        <p class="text-uppercase">Hotline bán hàng</p>
                        <a class="number-call" href="{{setting('fpt_setting_hotline_sale_support_url')}}">0978888659</a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12 display-tbl-d" style="height: 100px;">
                    <div class="pad-l-r-5"><img alt="call-center"
                            src="{{ v(theme::url('assets/images/call_contact.png')) }}"></div>

                    <div class="pad-l-r-5 pad-hotline">
                        <p class="text-uppercase">Hỗ trợ kỹ thuật</p>
                        <a class="number-call" href="{{setting('fpt_setting_hotline_sale_tech_support_url')}}">1900 6600</a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12 display-tbl-d" style="height: 100px;">
                    <div class="pad-l-r-5"><img alt="email"
                            src="{{ v(theme::url('assets/images/mail.png')) }}"></div>

                    <div class="pad-l-r-5">
                        <p class="text-uppercase">Email</p>
                        <a class="txt-ellipsis" href="{{setting('fpt_setting_email_support_url')}}">info@fpttelecom.net.vn</a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12 display-tbl-d" style="height: 100px;">
                    <div class="pad-l-r-5"><img alt="livechat"
                            src="{{ v(theme::url('assets/images/live_chat.png')) }}"></div>

                    <div class="pad-l-r-5">
                        <p class="text-uppercase">Live Chat</p>
                        <a href="{{setting('fpt_setting_live_chat_support_url')}}" class="txt-ellipsis" id="chatbox_trigger">Giải đáp mọi thắc mắc</a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12 display-tbl-d" style="height: 100px;">
                    <div class="pad-l-r-5"><img alt="facebook"
                            src="{{ v(theme::url('assets/images/fb.png')) }}"></div>

                    <div class="pad-l-r-5">
                        <p class="text-uppercase">facebook</p>
                        <a class="txt-ellipsis" href="{{setting('fpt_setting_fb_support_url')}}" target="_blank"
                            rel="noreferrer noopener">www.facebook.com/fpttelecom.net.vn</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
{{-- AIzaSyAFzPNhREuUZn3Ppl16zaMsJCys1HbmwCM --}}
<script async defer
    src="https://maps.googleapis.com/maps/api/js?v=3.33&key=AIzaSyBbXUP_zG6YVRItVpg4_e8DZvj-JctbGwY&libraries=places&callback=initMap&language=vi">
</script>
{{-- <script src="{{ v(theme::url('assets/js/storeLocators.js')) }}"></script> --}}
<script src="{{ v(theme::url('assets/js/province.js')) }}"></script>
<script type="text/javascript">
    var storeLocators;
        $.ajax({
            async: false,
            method: 'GET',
            url: "{{ route('pages.getStoreBrach') }}",
            success: function(data){
                storeLocators = data;
            },
            error: function(e){
                console.log(e);
        }
    });
    // console.log(storeLocators[0].name);
    var map;
    var geocoder = null;
    var directionsService = null;
    var directionsDisplay = null;
    var poly = null;
    var markers = new Array();
    var storeIcon = "{{ v(theme::url('assets/images/map.png')) }}";
    var userLocator = null;
    var userLocatorMarker = null;
    var matchedLocators = null;
    var userLocatorCode = null;
    var infoWindow = null;

    function initMap() {

        geocoder = new google.maps.Geocoder();
        directionsService = new google.maps.DirectionsService;
        directionsDisplay = new google.maps.DirectionsRenderer;

        var lat = provinces[0].lat;
        var lng = provinces[0].lng;
        //alert(lat + ' ' + lng);
        var options = {
            zoom: 10,
            scrollwheel: false,
            disableDoubleClickZoom: true,
            center: {lat: parseFloat(lat), lng: parseFloat(lng)},
            mapTypeControl: false,
            mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
            navigationControl: true,
            scaleControl: true,
            zoomControl: true,
            mapTypeId: google.maps.MapTypeId.ROADMAP

        };
        map = new google.maps.Map(document.getElementById('map_canvas'), options);

        getUserPostition();

        //loadByProvince(1);
    }

    function getUserPostition() {

        if (navigator.geolocation) {

            navigator.geolocation.getCurrentPosition(function(position) {

                var pos = {
                  lat: position.coords.latitude,
                  lng: position.coords.longitude
                };

                userLocator = pos;
                console.log(userLocator);
                if (userLocator) {
                    setUserLocator(pos);
                }

            }, function(error) {
                //alert('ERROR(' + error.code + '): ' + error.message);
                loadByProvince(1);
                //handleLocationError(true, infoWindow, map.getCenter());
            });

        } else {
            loadByProvince(1);
            // Browser doesn't support Geolocation
            //handleLocationError(false, infoWindow, map.getCenter());
        }

        loadByProvince(2);
    }

    function setUserLocator(pos) {

        $.getJSON('https://maps.googleapis.com/maps/api/geocode/json?key=AIzaSyBbXUP_zG6YVRItVpg4_e8DZvj-JctbGwY&latlng=' + pos.lat +  ',' + pos.lng  + '&sensor=false', null, function (data) {

            if (!data.error_message) {

                if (data.results.length == 0) {

                } else {

                    for (var i = 0; i < data.results.length; i++) {

                        if (data.results[i].types[0] == 'administrative_area_level_1') {
                            var address = data.results[i].address_components;

                            if (address[0].long_name == "Hanoi") {
                                userLocatorCode = "Ha Noi"
                            } else {
                                userLocatorCode = address[0].long_name;
                            }

                        }
                    }

                    //alert(userLocatorCode);

                    if (userLocatorCode != undefined) {

                        $('#province option').each(function() {
                            //console.log($(this).text());
                            if($(this).val() == userLocatorCode) {
                                $(this).prop('selected', true);
                                $('.ui-autocomplete-input').focus().val($(this).text());

                                loadByProvince();

                                map.setCenter(pos);

                                return;
                            }
                        });

                    } else {
                        setUserLocatorByGeoCode(pos);
                    }
                }
            } else {
                // Check API quota limited
                // console.log(data.error_message);
                setUserLocatorByGeoCode(pos);
            }

        });

    }

    function setUserLocatorByGeoCode(pos) {

        var geocoder = new google.maps.Geocoder;

        geocoder.geocode({'location': pos}, function(results, status) {

                if (status === 'OK') {

                        for (var i = 0; i < results.length; i++) {

                            if (results[i].types[0] == 'administrative_area_level_1') {
                                var address = results[i].address_components;
                                userLocatorCode = address[0].long_name;

                                if (address[0].long_name == "Hanoi") {
                                    userLocatorCode = "HNI"
                                }

                            }
                        }



                    if (userLocatorCode != undefined) {

                        $('#province option').each(function() {
                            if($(this).text() == userLocatorCode) {

                                $(this).prop('selected', true);

                                loadByProvince();

                                map.setCenter(pos);

                                return;
                            }
                        });

                    }

                } else {
                }
        });

    }

    function setStoreLocators(addresses) {

        if (map != undefined) {

            if (addresses != undefined && addresses.length > 0) {

                for (var i = 0; i < addresses.length; i++) {

                      if (addresses[i].lat != '' && addresses[i].lng != '') {
                        var latlng = new google.maps.LatLng(addresses[i].lat, addresses[i].lng);
                        var marker = new google.maps.Marker({
                                id: addresses[i].id,
                                position: latlng,
                                map: map,
                                icon: storeIcon,
                                title: addresses[i].address
                            });

                        markers.push(marker);

                        var data = addresses[i];
                        infoWindow = new google.maps.InfoWindow();

                        (function (marker, data) {
                            google.maps.event.addListener(marker, 'click', function (e) {

                                var content = '<div class="store-locator-popup">';
                                content += '<div class="text-pink" style="font-size: 13px; font-weight: 400;"><strong>' + data.name  + '</strong></div>';
                                content += '<div><strong>Địa chỉ:</strong> ' + data.address  + '</a></div>';
                                content += '<div><strong>Hotline bán hàng:</strong> <a href="tel:' + data.hotline_sales + '" class="normal-text">' + data.hotline_sales + '</a></div>';
                                content += '<div><strong>Hỗ trợ kỹ thuật:</strong> <a href="tel:' + data.switchboard_cskh + '" class="normal-text">' + data.switchboard_cskh + '</a></div>';
                                content += '<div><strong>Giờ làm việc:</strong> ' + data.time_work + '</div>';

                                content += '</div>';
                                infoWindow.setContent(content);
                                infoWindow.open(map, marker);
                            });
                        })(marker, data);

                    } else {

                    }

                }
            }
        }
    }

    // 1: default
    // 2: get user locator
    function loadByProvince(loadType) {

        $('#store-locator').empty();

        var provinceId = $('#province option:selected').val();
        var addresses = new Array();

        var province = jQuery.map(provinces, function(obj) {
            if (obj.id == provinceId) {
                return obj;
            }
        });

        if (province != undefined) {
            var province = province[0];
            console.log(province);
            var provinceName = province.name;
            // var provinceId = province.id;
            var zoom = province.zoom;

            if (map != undefined) {
                clearMakers();
                map.setCenter({lat: parseFloat(province.lat), lng: parseFloat(province.lng)});
                map.setZoom(zoom);
            }

            matchedLocators = jQuery.map(storeLocators, function(obj) {
                if (obj.province_id == provinceId) {
                    return obj;
                }
            });


            var shortestLocator = null;

            if (matchedLocators && matchedLocators.length > 0) {

                var makerInd = 0;


                $.each(matchedLocators, function (i, row) {

                    addresses.push({id: row.id, name : row.name, address : row.address, hotline_sales : row.hotline_sales, switchboard_cskh : row.switchboard_cskh, time_work : row.time_work, lat : row.latitude, lng : row.longitude});

                    $('#store-locator').append('<div class="item-localtion">');
                    $('#store-locator').append('<div onclick="showMarker(' + row.id + ')"><span class="text-pink" style="cursor: pointer"><strong>' + row.name + '</strong></span></div>');

                    $('#store-locator').append('<div><strong>Địa chỉ:</strong> ' + row.address + '</div>');
                    $('#store-locator').append('<div><strong>Hotline bán hàng:</strong> <a href="tel:' + row.hotline_sales + '" class="normal-text">' + row.hotline_sales + '</div>');
                    $('#store-locator').append('<div><strong>Hỗ trợ kỹ thuật:</strong> <a href="tel:' + row.switchboard_cskh + '" class="normal-text">' + row.switchboard_cskh + '</div>');
                    $('#store-locator').append('<div><strong>Giờ làm việc:</strong> ' + row.time_work + '</div>');

                    $('#store-locator').append('</div>');
                });

                setStoreLocators(addresses);

            } else {

                $('#store-locator').append('<div class="item-localtion">');

                $('#store-locator').append('<div><strong>Không tìm thấy kết quả</strong></div>');
                $('#store-locator').append('<div><strong></strong></div>');

                $('#store-locator').append('</div>');

                setStoreLocators(addresses);

            }

        }

        $('#province').prop('disabled', false);

    }
    function calculateAndDisplayRoute(directionsService, directionsDisplay, origin, destination) {

        directionsService.route({
          origin: origin,
          destination: destination,
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {

            var path = new google.maps.MVCArray();
            poly = new google.maps.Polyline({ map: map, strokeColor: '#ff8200' });

            for (var i = 0, len = response.routes[0].overview_path.length; i < len; i++) {
                path.push(response.routes[0].overview_path[i]);
            }

            poly.setPath(path);

          } else {
                //alert('Directions request failed due to ' + status);
          }
        });
    }

    function clearMakers() {
        for (var i = 0; i < markers.length; i++) {
          markers[i].setMap(null);
        }

        if (userLocatorMarker != undefined) {
            userLocatorMarker.setMap(null);
        }

        if (poly != undefined) {
            poly.setMap(null);
        }

        markers = new Array();
    }

    function showMarker(markerId) {
        var ind = -1;
        for (var i = 0; i < markers.length; i++) {

            if (markers[i].id == markerId) {
                ind = i;
            }
        }
        if (ind > -1) {
            console.log(markers[ind].getPosition());
            google.maps.event.trigger(markers[ind], 'click');
            map.setCenter(markers[ind].getPosition());
        } else {

        }
    }

    $(document).ready(function (event) {
        // $('#province').select2();
        $('#province').on('change', function(){
            var selected = $('#province option:selected').val();
            if (selected) {
                    //clearMakers();
                    //$('#province-loading-block').show();
                    $(this).prop('disabled', true);
                    loadByProvince(3);
                }
        });
        // $('#province').combobox({
        //     select: function (event, ui) {
        //         console.log('select');
        //         var selected = $('#province option:selected').val();
        //         if (selected) {
        //             $(this).prop('disabled', true);


        //             loadByProvince(3);
        //         }

        //     }
        // });
    });


</script>
@endsection
