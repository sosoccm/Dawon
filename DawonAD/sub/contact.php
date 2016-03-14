<!-- Contact -->
<div class="infocontainer" id="contact" style="height:600px; background-color:#51bad7; margin-bottom:0px;">
    <h1 style="color:white;">CONTACT US</h1>
    <div class="contactbox">
        <div class="box" style="width:360px;margin-left:80px;">
            <span>이메일 상담</span>
            <form name="mail" method="post" enctype="text/plain">
                <input type="text" name="name" placeholder="이름" required>
                <input type="text" name="email"  placeholder="이메일" required>
                <textarea type="textarea" name="comment"  size="50" placeholder="내용" required style="height:150px;padding-top:10px;"></textarea>
                <input onclick="validform()"  type="button" value="보내기">
            </form>
        </div>
        <div class="box" style="margin-left:230px;">
            <span style="width:460px;">찾아오시는 길</span>
            <div style="font-size:14px; color:white;">주소: 서울시 구로구 구로중앙로 207  구로오퍼스1 347호</div>
            <div id = "testMap" style="border:1px solid #000; width:460px; height:300px; margin-top:20px;"></div>
            <script type="text/javascript">
                        var oPoint = new nhn.api.map.LatLng(37.5037643, 126.8797661);
                        nhn.api.map.setDefaultPoint('LatLng');
                        oMap = new nhn.api.map.Map('testMap' ,{
                                                point : oPoint,
                                                zoom : 11,
                                                enableWheelZoom : true,
                                                enableDragPan : true,
                                                enableDblClickZoom : false,
                                                mapMode : 0,
                                                activateTrafficMap : false,
                                                activateBicycleMap : false,
                                                minMaxLevel : [ 1, 14 ],
                                                size : new nhn.api.map.Size(460, 300)
                                        });
                                        var markerCount = 0;
                        
                        var oSize = new nhn.api.map.Size(28, 37);
                        var oOffset = new nhn.api.map.Size(14, 37);
                        var oIcon = new nhn.api.map.Icon('http://static.naver.com/maps2/icons/pin_spot2.png', oSize, oOffset);
                        
                        var mapInfoTestWindow = new nhn.api.map.InfoWindow(); // - info window 생성
                        mapInfoTestWindow.setVisible(false); // - infowindow 표시 여부 지정.
                        oMap.addOverlay(mapInfoTestWindow);     // - 지도에 추가.     
                        
                        var oLabel = new nhn.api.map.MarkerLabel(); // - 마커 라벨 선언.
                        oMap.addOverlay(oLabel); // - 마커 라벨 지도에 추가. 기본은 라벨이 보이지 않는 상태로 추가됨.

                        mapInfoTestWindow.attach('changeVisible', function(oCustomEvent) {
                                if (oCustomEvent.visible) {
                                        oLabel.setVisible(false);
                                }
                        });
        
        
                        oMap.attach('mouseenter', function(oCustomEvent) {
                                var oTarget = oCustomEvent.target;
                                // 마커위에 마우스 올라간거면
                                if (oTarget instanceof nhn.api.map.Marker) {
                                        var oMarker = oTarget;
                                        oLabel.setVisible(true, oMarker); // - 특정 마커를 지정하여 해당 마커의 title을 보여준다.
                                }
                        });
        
                        oMap.attach('mouseleave', function(oCustomEvent) {
                                var oTarget = oCustomEvent.target;
                                // 마커위에서 마우스 나간거면
                                if (oTarget instanceof nhn.api.map.Marker) {
                                        oLabel.setVisible(false);
                                }
                        });
                        
                        var oMarker = new nhn.api.map.Marker(oIcon, { title : "다원애드 - 구로오퍼스1 347호" });
                        oMarker.setPoint(new nhn.api.map.LatLng(37.5045167, 126.8773125));
                        oMap.addOverlay(oMarker);
        
                        oMap.attach('click', function(oCustomEvent) {
                                mapInfoTestWindow.setVisible(false);
                                // 마커 클릭하면
                                if (oTarget instanceof nhn.api.map.Marker) {
                                        // 겹침 마커 클릭한거면
                                        if (oCustomEvent.clickCoveredMarker) {
                                                return;
                                        }
                                        // - InfoWindow 에 들어갈 내용은 setContent 로 자유롭게 넣을 수 있습니다. 외부 css를 이용할 수 있으며, 
                                        // - 외부 css에 선언된 class를 이용하면 해당 class의 스타일을 바로 적용할 수 있습니다.
                                        // - 단, DIV 의 position style은 absolute가 되면 안되며, 
                                        // - absolute의 경우 autoPosition이 동작하지 않습니다. 
                                        mapInfoTestWindow.setContent('<DIV style="border-top:1px solid; border-bottom:2px groove black; border-left:1px solid; border-right:2px groove black;margin-bottom:1px;color:black;background-color:white; width:auto; height:auto;">'+
                                        '<span style="color: #000000 !important;display: inline-block;font-size: 12px !important;font-weight: bold !important;letter-spacing: -1px !important;white-space: nowrap !important; padding: 2px 2px 2px 2px !important">' + 
                                        'Hello World <br /> ' + oTarget.getPoint()
                                        +'<span></div>');
                                        mapInfoTestWindow.setPoint(oTarget.getPoint());
                                        mapInfoTestWindow.setVisible(true);
                                        mapInfoTestWindow.setPosition({right : 15, top : 30});
                                        mapInfoTestWindow.autoPosition();
                                        return;
                                }
                                
                        });
                </script>
        </div>
    </div>
</div>