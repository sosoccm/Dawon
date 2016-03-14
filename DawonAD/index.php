<?php

    $sub = $_GET["sub"];
    
    if ($sub == "") {
        $sub = "main";
    }
    

?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<!--
    background color: 1fbba6, 1ca895
    font color : 148676
-->
<html>
    <head>
        <title>DawonAD</title>
        <meta charset="UTF-8">
        <meta name="naver-site-verification" content="b7b167f09ad7ef7770106023d5e5481a7da6ee39"/>
        <META NAME="robots" CONTENT="noindex"> 
        <link href="css/reset.css" rel="stylesheet" type="text/css"/>
        <link href="css/main.css" rel="stylesheet" type="text/css"/>
        <script src="scripts/jquery-1.12.1.js" type="text/javascript"></script>
        <script src="scripts/jquery_easing.1.3.js" type="text/javascript"></script>
        <script type="text/javascript" src="http://openapi.map.naver.com/openapi/v2/maps.js?clientId=bldAZ64FPdk8RT8devXz"></script>
        <script>
            $(document).ready(function () {
                var idx = 0;
                var isStop = false;
                var runslide = setInterval(function() {
                    if (isStop) return;
                    if (idx === 2) idx = -1;
                    idx++;
                    $(".inner ul").stop().animate({
                        left: -(idx * 1200)+"px"
                    },1500,"easeOutQuint");
                    
                }, 4000);
                $(".wrap_introslide").hover(function() {
                    isStop = true;
                },function() { isStop = false;});
                $("span.left").click(function () {
                    
                    if (idx === 0) idx = 3;
                    idx--;
                    $(".inner ul").stop().animate({
                        left: -(idx * 1200)+"px"
                    },1500,"easeOutQuint");
                });
                $("span.right").click(function () {
                    if (idx === 2) idx = -1;
                    idx++;
                    $(".inner ul").stop().animate({
                        left: -(idx * 1200)+"px"
                    },1500,"easeOutQuint");
                });
                $("#popup-modal").click(function() {
                    $(this).css({ "display" : "none" });
                    $(this).find(".back").css({"opacity" : "0"});
                    $(this).find("iframe").attr({"src" : ""});
                });
            });
            function validform() {
                var forms = document.mail;
                if (forms.name.value === "") {
                    alert("이름을 입력하세요!");
                    forms.name.focus();
                    return;
                } else
                if (forms.email.value === "") {
                    alert("이메일을 입력하세요!");
                    forms.email.focus();
                    return;
                } else
                if (forms.comment.value === "") {
                    alert("내용을 입력하세요!");
                    forms.comment.focus();
                    return;
                }
                forms.action = "mailto:jinho163@dawonad.com?subject=문의 드립니다.&body="+forms.comment.value;
                forms.submit();
            }
            function scrollLink(obj){
 
                var position = $("#"+obj).offset();
                if (position != undefined) {
                    $('html, body').animate({scrollTop : position.top - 150}, 1000);
                } else {
                    document.location.href = "/?sub=contact";
                }
            }
            
            function OnCardPay() {
                var p = $("#popup-modal");
                p.css({ "display" : "block"});
                p.find(".back").animate({"opacity" : "0.5"},500);
                
                p.find("iframe").attr({"src" : "agspay/main_pay.php"});
            }
            
            try {document.execCommand('BackgroundImageCache', false, true);} catch(e) {}
        </script>
    </head>
    <body>
        <div id="popup-modal" class="modal" style="display:none;">
            <div style="width:100%; height:100%; background-color:black; position:absolute;" class="back"></div>
            <div class="container">
                <a style="position:absolute; right:5px; top:8px;" href="#" onclick="popupclose()"><img style="width:30px;" src="images/btn_close.png" alt=""/></a>
                
                <iframe src="" width="100%" height="100%"></iframe>
            </div>
        </div>
        <div style="position:fixed; left:0px; width:100%; z-index: 1; background-color:white;">
            <div class="top_contents">
                <div style="width:1200px; margin: 0 auto;">
                <span style="float:left;">고객문의: 02-2088-3710 (업무시간외: 010-5796-3710)</span>
                <span style="float:right; margin-left:15px;"><a href="#" onclick="OnCardPay()">카드결제</a></span>
                <span style="float:right;"><a href="#" onclick="scrollLink('contact')">이메일상담신청</a></span>
                
                </div>
            </div>
            <div class="wrap_header">
                <div><a href="/">DAWON<span>AD</span></a></div>
                <ul>
                    <li><a <?php if ($sub == "company") echo 'class="sel"';?> href="?sub=company">회사소개</a></li>
                    <li><a <?php if ($sub == "marketing") echo 'class="sel"';?> href="?sub=marketing">마케팅</a></li>
                    <li><a <?php if ($sub == "business") echo 'class="sel"';?> href="?sub=business">비즈니스</a></li>
                    <li><a <?php if ($sub == "community") echo 'class="sel"';?> href="?sub=community">커뮤니티</a></li>
                    <li><a <?php if ($sub == "contact") echo 'class="sel"';?> href="?sub=contact">연락처</a></li>
                </ul>
            </div>
        </div>
        <div class="wrap_introslide" id='intro' style="padding-top:150px;">
            <div class="inner">
                <ul>
                    <li><img src="images/slide1.png" alt=""/></li>
                    <li><img src="images/slide2.png" alt=""/></li>
                    <li><img src="images/slide3.png" alt=""/></li>
                </ul>
            </div>
            <span class="left"><img src="images/left-arrow-btn.png" alt=""/></span>
            <span class="right"><img src="images/right-arrow-btn.png" alt=""/></span>
        </div>
        
        <?php
            switch($sub) {
                case "company":
                    include 'sub/company.php';
                break;
                case "marketing":
                    include 'sub/marketing.php';
                break;
                case "business":
                    include 'sub/business.php';
                break;
                case "community":
                    include 'sub/community.php';
                break;
                case "contact":
                    include 'sub/contact.php';
                break;
                default:
                    include 'sub/company.php';
                    include 'sub/marketing.php';
                    include 'sub/business.php';
                    include 'sub/community.php';
                    include 'sub/contact.php';
                break;
                
            }
        ?>
        <div class="wrap_footer">
            <div class="left">
                <h1 style="float:left;">DAWON<span>AD</span></h1>
                <div style="color:white;font-size: 12px; float:left;   margin-top: 5px; margin-left: 70px; line-height: 14px;">
                    호명 : 다원애드 ｜대표 : 김진호 ｜ 사업자등록번호: 840-22-00185 | 통신판매업 신고번호 제2016-서울구로-0250 호 </br>
                        주소 : 서울특별시 구로구 구로중앙로 207, 347호 (구로동,오퍼스1)
                        TEL : 02-2088-3170  E-MAIL : dawon@dawonad.com
                </div>

            </div>
            <div style="font-size:14px; font-weight:bold; margin-top:3px; display:block; color:white; float:left; width:1200px; text-align:left; margin-left:13px;">COPYRIGHT @ 2016 DAWON AD ALL RIGHTS RESERVED | 
                <a href="http://www.freepik.com">IMAGE AND ICON DESIGNED BY Freepik</a>
            </div>
        </div>
    </body>
</html>
