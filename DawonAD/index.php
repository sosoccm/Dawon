<?php

    $sub = $_GET["sub"];
    
    if ($sub == "") {
        $sub = "company";
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
        <link href="css/reset.css" rel="stylesheet" type="text/css"/>
        <link href="css/main.css" rel="stylesheet" type="text/css"/>
        <script src="scripts/jquery-1.12.1.js" type="text/javascript"></script>
        <script src="scripts/jquery_easing.1.3.js" type="text/javascript"></script>
        <script src="scripts/jquery.placeholder.js" type="text/javascript"></script>
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
                
            });
            function validform() {
                var forms = document.mail;
                if (forms.name.value === "") {
                    alert("이름을 입력하세요!");
                    forms.name.focus();
                    return;
                } else
                if (forms.mail.value === "") {
                    alert("이메일을 입력하세요!");
                    forms.mail.focus();
                    return;
                } else
                if (forms.comment.value === "") {
                    alert("내용을 입력하세요!");
                    forms.comment.focus();
                    return;
                }
            
                forms.submit();
            }
            
        </script>
    </head>
    <body>
        <div style="position:fixed; left:0px; width:100%; z-index: 1; background-color:white;">
            <div class="wrap_header">
                <div>DAWON<span>AD</span></div>
                <ul>
                    <li><a <?php  echo 'class="sel"';?> href="?sub=company">회사소개</a></li>
                    <li><a href="?sub=marketing">마케팅</a></li>
                    <li><a href="?sub=business">비즈니스</a></li>
                    <li><a href="?sub=community">커뮤니티</a></li>
                    <li><a href="?sub=contact">연락처</a></li>
                </ul>
            </div>
        </div>
        <div class="wrap_introslide" id='intro' style="padding-top:90px;">
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
            }
        ?>
        
        
        
        <div class="wrap_footer">
            <div class="left">
                <h1 style="float:left;">DAWON<span>AD</span></h1>
                <div style="color:white;font-size: 14px; float:left;   margin-top: 5px; margin-left: 70px; line-height: 18px;">
                    상호명 : 다원애드 ｜대표: 김진호 ｜ 사업자등록번호: 840-22-00185 </br>
                        주소: 서울시 구로구 구로중앙로 207 오퍼스1 347호 
                        TEL:1234-4568  E-MAIL : 123@ABC.COM
                </div>

            </div>
            <div style="font-size:18px; font-weight:bold; margin-top:10px; display:block; color:white; float:left; width:1200px; text-align:center;">COPYRIGHT @ 2016 DAWON AD ALL RIGHTS RESERVED | 
                <a href="http://www.freepik.com">IMAGE AND ICON DESIGNED BY Freepik</a>
            </div>
        </div>
    </body>
</html>
