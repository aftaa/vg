<?php if(!defined('IN_AWEBCOM'))die('Access Denied'); ?><html style="height:100%;width:684px">
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $charset;?>" />
<link rel="stylesheet" href="templates/<?php echo $CFG['tplname'];?>/style/map.css" type="text/css" />
<script type="text/javascript" src="js/common.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
  var map;
  var geocoder;
  var centerChangedLast;
  var reverseGeocodedLast;
  var currentReverseGeocodeResponse;

  function initialize() {
    var latlng = new google.maps.LatLng(55.59438948151133,37.52661462500001,11);
    var myOptions = {
      zoom: 6,
      center: latlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
    geocoder = new google.maps.Geocoder();


    setupEvents();
    centerChanged();
  }

  function setupEvents() {
    reverseGeocodedLast = new Date();
    centerChangedLast = new Date();

    setInterval(function() {
      if((new Date()).getSeconds() - centerChangedLast.getSeconds() > 1) {
        if(reverseGeocodedLast.getTime() < centerChangedLast.getTime())
          reverseGeocode();
      }
    }, 1000);

    google.maps.event.addListener(map, 'zoom_changed', function() {
      document.getElementById("zoom_level").innerHTML = map.getZoom();
    });

    google.maps.event.addListener(map, 'center_changed', centerChanged);

    google.maps.event.addDomListener(document.getElementById('crosshair'),'dblclick', function() {
       map.setZoom(map.getZoom() + 1);
    });

  }

  function getCenterLatLngText() {
    return '(' + map.getCenter().lat() +', '+ map.getCenter().lng() +')';
  }

  function centerChanged() {
    centerChangedLast = new Date();
    var latlng = getCenterLatLngText();
    document.getElementById('latlng').innerHTML = latlng;
    document.getElementById('formatedAddress').innerHTML = '';
  Vup("mappoint").value = '' + map.getCenter().lat() +', '+ map.getCenter().lng() +'';
    currentReverseGeocodeResponse = null;
  }
  

  
  function reverseGeocode() {
    reverseGeocodedLast = new Date();
    geocoder.geocode({latLng:map.getCenter()},reverseGeocodeResult);
  }

  function reverseGeocodeResult(results, status) {
    currentReverseGeocodeResponse = results;
    if(status == 'OK') {
      if(results.length == 0) {
        document.getElementById('formatedAddress').innerHTML = 'None';
      } else {
        document.getElementById('formatedAddress').innerHTML = results[0].formatted_address;
      Vup("address").value = results[0].formatted_address;
      }
    } else {
      document.getElementById('formatedAddress').innerHTML = 'Error';
    }
  }


  function geocode() {
    var address = document.getElementById("address").value;
    geocoder.geocode({
      'address': address,
      'partialmatch': true}, geocodeResult);
  }

  function geocodeResult(results, status) {
    if (status == 'OK' && results.length > 0) {
      map.fitBounds(results[0].geometry.viewport);
    } else {
      alert("<?php echo $L['geocode_status'];?>: " + status);
    }
  }

  function addMarkerAtCenter() {
    var marker = new google.maps.Marker({
        position: map.getCenter(),
         icon: 'templates/<?php echo $CFG['tplname'];?>/images/icons/icon-custom-marker.png',
        map: map
    });

    var text = '<?php echo $L['coordinates'];?>: ' + getCenterLatLngText();
    if(currentReverseGeocodeResponse) {
      var addr = '';
      if(currentReverseGeocodeResponse.size == 0) {
        addr = 'None';
      } else {
        addr = currentReverseGeocodeResponse[0].formatted_address;
      }
      text = text + '<br>' + '<?php echo $L['address'];?>: <br>' + addr;
    }

    var infowindow = new google.maps.InfoWindow({ content: text });

    google.maps.event.addListener(marker, 'click', function() {
      infowindow.open(map,marker);
    });
  }

</script>
</head>
<body onload="initialize()" style='width:684px'>
<table cellpadding="0" cellspacing="1"  width="684px" class="gridTable">
<tr>
<tr class="gridHeader" colspan="2" style="text-align: left">
   <p style="   height: 38px;
    font-size: 13px;
    background-color: #fff;
    font-weight: 600;">Что бы установить метку на карте: Введите Ваш адрес, нажмите кнопку ПОИСК, нажмите МАРКЕР, закройте карту.</p>
    </tdtr
<td class="gridHeader" colspan="2" style="text-align: left">
  <?php echo $L['your_address'];?>: <input type="text" class="inputText" style="width:684px;" id="address"/>
  <input type="button" class="btn" value="<?php echo $L['f_search'];?>" onclick="geocode()">
  <input type="button" class="btn" value="<?php echo $L['marker'];?>" onclick="addMarkerAtCenter()"/>
    </td>
</tr>
  </table>
  <div id="map" style="width:684px; height:373">
    <div id="map_canvas" style="width:684px; height:373"></div>
    <div id="crosshair"></div>
  </div>

<table cellpadding="0" cellspacing="1" width="684px" class="gridTable">
<tr class="gridTr1">
<td class="gridHeader"><?php echo $L['coordinates'];?>:</td>
<td class="gridHeader"><div id="latlng"></div></td></tr>
<tr class="gridTr1">
<td class="gridHeader"><?php echo $L['address'];?>:</td>
<td class="gridHeader"><div id="formatedAddress"></div></td></tr>
<tr class="gridTr1">
<td class="gridHeader"><?php echo $L['scale'];?>:</td>
<td class="gridHeader"><div id="zoom_level">12</div></td>
</tr>
<?php if($mark=='1') { ?>
<tr class="gridTr1">
<td class="gridHeader" colspan="2" style="text-align: center">
<input type="button" value="<?php echo $L['chose'];?>" onclick="closemap();" class="btn f_red">
    </td>
</tr>
<?php } ?>
  
  </table>

<script type="text/javascript">
var map_id = 'mymap';
var p1 = '<?php echo $p1;?>';
var p2 = '<?php echo $p2;?>';
var mark = 'mark';
var show = '<?php echo $show;?>';
var title = '<?php echo $title;?>';
var content = '<?php echo $content;?>';
var width = <?php echo $width;?>;
var height = <?php echo $height;?>;
var view_level = <?php echo $level;?>;
</script>
<script language="javascript">
function closemap() {
    if(!confirm('<?php echo $L['your_address_confirm'];?>')) return false;
  parent.Yubox.close();
}
</script>

</body>
</html>