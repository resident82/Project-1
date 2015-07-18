<?php include ("config.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Карта с точками пользователей</title>
<script src="http://api-maps.yandex.ru/1.1/index.xml?key=ACuF2EkBAAAAzahYCgIASLsFm9n8EPvNjaTc8nAWiETKgYcAAAAAAAAAAAC-q61vWtIK3Kzt2yQ9qFaGJGKzXw==" type="text/javascript"></script>
    
<script type="text/javascript">

        window.onload = function () {
             var map = new YMaps.Map(document.getElementById("YMapsID"));
            map.setCenter(new YMaps.GeoPoint(43.99150,56.31534), 12);


            map.addControl(new YMaps.TypeControl());
            map.addControl(new YMaps.ToolBar());
            map.addControl(new YMaps.Zoom());
            map.addControl(new YMaps.ScaleLine());
            map.enableScrollZoom();

            map.removeAllOverlays();
            var ml = new YMaps.YMapsML( 'create_YMapsML-2.php' );
            map.addOverlay(ml);

            YMaps.Events.observe(ml, ml.Events.Fault, function (error) {
                alert('Ошибка: ' + error);
            });
            
            YMaps.Events.observe(map, map.Events.Click, function (map, mEvent) {
                var myHtml = "Значение: " + mEvent.getGeoPoint() + "<br>"+'<form id="formadd" name="formadd_point" method="post" action="outpoint2-2.php"><p>Название: <input name="namepoint" type="text" size="20" maxlength="80" /></p><p>Описание: <textarea name="descriptpoint" cols="20" rows="5"></textarea></p><input name="pcoord" type="hidden" value="'+mEvent.getGeoPoint()+'" /><p><input name="subpoint" type="submit" value="Добавить" /></p></form>';
                map.openBalloon(mEvent.getGeoPoint(), myHtml);
            }); 
                        
 }
    </script>
    
</head>

<body>

    <div id="YMapsID" style="width:600px;height:400px"></div>
</body>

</html>