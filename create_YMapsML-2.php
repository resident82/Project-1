<?php 

header("Content-type: text/xml");
include ("config.php");

echo '<?xml version="1.0" encoding="utf-8"?>
<ymaps xmlns="http://maps.yandex.ru/ymaps/1.x" xmlns:gml="http://www.opengis.net/gml" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://maps.yandex.ru/schemas/ymaps/1.x/ymaps.xsd">
    <Representation xmlns="http://maps.yandex.ru/representation/1.x"> 
        <Style gml:id="pointmaps">
            <iconStyle>
                <href>http://webmap-blog.ru/files/001_20.gif</href>
                <size x="24" y="24"/>
                <offset x="-12" y="-12"/>
            </iconStyle>
            
            <balloonContentStyle>
                <template>#balloonTemplate</template>
            </balloonContentStyle>
        </Style>
        
        <Template gml:id="balloonTemplate">
            <text><![CDATA[
                    <div style="font-size:12px;">
                        <div style="color:#ff0303;font-weight:bold">$[name]</div> 
                        <div>$[metaDataProperty.AnyMetaData.adress]</div>                        
                    </div>]]></text>
        </Template>
    </Representation>

    <GeoObjectCollection>
        <gml:name>Объекты карте</gml:name>
        <style>#pointmaps</style>
        <gml:featureMembers>';

$result = mysql_query("SELECT * FROM mappoint");
			if(mysql_num_rows($result)>0)
            {
			while ($mar = mysql_fetch_array($result))
            {

$exp_str1 = explode("<br>", $mar['descriptions']);

$mar['descriptions'] = implode($exp_str1, ", ");


echo '<GeoObject>';
echo '<gml:name>', $mar['name'], '</gml:name>';
echo '<gml:metaDataProperty>';
echo '<AnyMetaData>';
echo '<adress>', $mar['descriptions'], '</adress>';
echo '</AnyMetaData>';
echo '</gml:metaDataProperty>';
echo '<gml:Point>';
echo '<gml:pos>', $mar[cx], ' ', $mar[cy], '</gml:pos>';
echo '</gml:Point>'; 
echo '</GeoObject>';

echo "\n";

}

}

echo '</gml:featureMembers></GeoObjectCollection></ymaps>';

?>