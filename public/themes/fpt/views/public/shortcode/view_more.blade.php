<div id="detail-content" class="col-lg-12 col-12" style="display: none;">
    {!! $content !!}
</div>

<div class="col-lg-12 col-12" style="text-align: center;">
    <button id="rut-gon" onclick="closeFunction()"
        style="text-align: center;border: 0px;background: #f37021;border-radius: 30px;padding: 10px 50px 10px 50px;color: #fff;">Rút
        gọn</button>
    <script type="text/javascript">
        function closeFunction(){
                document.getElementById("rut-gon").style.display = 'none';
                document.getElementById("detail-content").style.display = 'none' ;
                document.getElementById("button").style.display = 'block' ;
                    $('html, body').animate({
                    scrollTop: 0
                    }, 600);
            }
            function closeFunctionNotScroll(){
                document.getElementById("rut-gon").style.display = 'none';
                document.getElementById("detail-content").style.display = 'none' ;
                document.getElementById("button").style.display = 'block' ;
            }
            document.addEventListener("DOMContentLoaded", function() {
                closeFunctionNotScroll();
            });
    </script>
</div>
<div class="col-lg-12 col-12" id="button" style="text-align: center;">
    <button onclick="openFunction()"
        style="border: 0px; background-color: red;border-radius: 5px; margin-top: 10px; padding: 5px 20px;    box-shadow: 6px 10px 5px #ccc; ">
        <p id="none" style="display: block;color: #fff">Xem thêm</p>
    </button>

    <script type="text/javascript">
        function openFunction(){
                document.getElementById("rut-gon").style.display = 'inline-block';
                document.getElementById("detail-content").style.display = 'block' ;
                document.getElementById("button").style.display = 'none' ;
            }
    </script>
</div>
