<?php
/**
 * Template Name: Blue Station

 */
?>
<?php get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
 <script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=AIzaSyD8Ya8J0kgCuNjR-903WTdPe3da2L_ChXg"
            type="text/javascript"></script>
    <script type="text/javascript">
    //<![CDATA[
    var circle = null;
    var circle2 = null;
    var map;
    var geocoder;
	
	var watson1 = new GIcon(); 
    watson1.image = '<?php echo bloginfo('url'); ?>/map/images/pin/Ptt-Pin.png';
    watson1.shadow = '<?php echo bloginfo('url'); ?>/map/images/pin/PinShadow.png';
    watson1.iconSize = new GSize(30, 31);
    watson1.shadowSize = new GSize(44, 33);
    watson1.iconAnchor = new GPoint(12, 8);
    watson1.infoWindowAnchor = new GPoint(5, 1);
	
	var watson2 = new GIcon(); 
    watson2.image = '<?php echo bloginfo('url'); ?>/map/images/pin/Ptt-NGV.png';
    watson2.shadow = '<?php echo bloginfo('url'); ?>/map/images/pin/PinShadow.png';
    watson2.iconSize = new GSize(30, 31);
    watson2.shadowSize = new GSize(44, 33);
    watson2.iconAnchor = new GPoint(12, 8);
    watson2.infoWindowAnchor = new GPoint(5, 1);
	
	var boots = new GIcon(); 
    boots.image = '<?php echo bloginfo('url'); ?>/map/images/pin/Ptt-Pin.png';
    boots.shadow = '<?php echo bloginfo('url'); ?>/map/images/pin/PinShadow.png';
    boots.iconSize = new GSize(32, 32);
    boots.shadowSize = new GSize(44, 42);
    boots.iconAnchor = new GPoint(12, 8);
    boots.infoWindowAnchor = new GPoint(5, 1);
	
    var customIcons = [];
	customIcons[0] = watson1;
	customIcons[1] = watson1;
	customIcons[2] = watson1;
	customIcons[3] = watson1;
	customIcons[4] = watson1;
	customIcons[5] = watson1;
	customIcons[6] = watson1;
	customIcons[7] = watson2;

     function load() {
      if (GBrowserIsCompatible()) {
	map = new GMap2(document.getElementById("google-map"));
	geocoder = new GClientGeocoder();
	map.addMapType(G_PHYSICAL_MAP);
	map.addControl(new GLargeMapControl());
	map.addControl(new GMapTypeControl());
	map.setCenter(new GLatLng(13.745972,100.534662), 12);
    }
}

function searchLocationsNear() {
map = new GMap2(document.getElementById("google-map"));
geocoder = new GClientGeocoder();
map.addMapType(G_PHYSICAL_MAP);
map.addControl(new GLargeMapControl());
map.addControl(new GMapTypeControl());

var productSearch = document.getElementById('selectMapsProduct').value;
var serviceSearch = document.getElementById('selectMapsService').value;
var locationSearch = document.getElementById('selectMapsLocation').value;
//alert(productSearch+"=="+serviceSearch+"=="+serviceSearch);
var searchUrl = "<?php echo bloginfo('url'); ?>/map/phpsqlajax_markers.php?productSearch=" + productSearch + "&serviceSearch=" + serviceSearch + "&locationSearch=" + locationSearch ;
GDownloadUrl(searchUrl, function(data) {
//alert(data);
var xml = GXml.parse(data);
var markers = xml.documentElement.getElementsByTagName('marker');

var sidebar3 = document.getElementById('station-result');
sidebar3.innerHTML = '';
if (markers.length == 0) {
sidebar3.innerHTML = '<p>ไม่พบข้อมูล</p>';
map.setCenter(new GLatLng(13.745972,100.534662), 12);
return;
}

var bounds = new GLatLngBounds();
for (var i = 0; i < markers.length; i++) {
var fid = markers[i].getAttribute("id");
var name = markers[i].getAttribute("name");
var address = markers[i].getAttribute("address");
var phone = markers[i].getAttribute("phone");
var gasohol95 = markers[i].getAttribute("gasohol95");
var gasohole85 = markers[i].getAttribute("gasohole85");
var gasohol91 = markers[i].getAttribute("gasohol91");
var gasohole20 = markers[i].getAttribute("gasohole20");
var jiffy = markers[i].getAttribute("jiffy");
var cafe_amazon = markers[i].getAttribute("cafe_amazon");
var pro_check = markers[i].getAttribute("pro_check");
var location = markers[i].getAttribute("location");
//alert(name+"=="+address);
var type = "เปิด";
var point = new GLatLng(parseFloat(markers[i].getAttribute("lat")),
parseFloat(markers[i].getAttribute("lng")));
var marker = createMarker(point, name, address, type,gasohol95,gasohole85,gasohol91,gasohole20,jiffy,cafe_amazon,pro_check,location,productSearch);
map.addOverlay(marker);

var sidebarEntry = createSidebarEntry(marker, name, address,gasohol95,gasohole85,gasohol91,gasohole20,jiffy,cafe_amazon,pro_check);
sidebar3.appendChild(sidebarEntry);
bounds.extend(point);
}
map.setCenter(bounds.getCenter(), map.getBoundsZoomLevel(bounds));
//map.setCenter(bounds.getCenter(), 11);
});
}

    function createMarker(point, name, address, type,gasohol95,gasohole85,gasohol91,gasohole20,jiffy,cafe_amazon,pro_check,location,idMap) {
	
	//if (idMap!=7)
	  	var marker = new GMarker(point,customIcons[idMap]);
	/*else
		var marker = new GMarker(point,watson2);*/
	  var html_img ='';
	 if (gasohol95!=0)
	  {
	  	html_img += "<img src='<?php bloginfo('template_url'); ?>/images/yellow-symbol.png' style='margin: 3px; vertical-align: middle;' />";
	  }
	  if (gasohole85!=0)
	  {
	  	html_img += "<img src='<?php bloginfo('template_url'); ?>/images/purple-symbol.png' style='margin: 3px; vertical-align: middle;' />";
	  }
	   if (gasohol91!=0)
	  {
	  	html_img += "<img src='<?php bloginfo('template_url'); ?>/images/green-symbol.png' style='margin: 3px; vertical-align: middle;' />";
	  }
	   if (gasohole20!=0)
	  {
	  	html_img += "<img src='<?php bloginfo('template_url'); ?>/images/limegreen-symbol.png' style='margin: 3px; vertical-align: middle;' />";
	  }
	   if(jiffy!=0 ||cafe_amazon!=0 || pro_check!=0){
	  	 html_img +="<br />";
	  }
	  if (jiffy!=0)
	  {
	  	 html_img += "<img src='<?php bloginfo('template_url'); ?>/images/jiffy.png' style='margin: 3px; vertical-align: middle;' />";
	  }
	   if (cafe_amazon!=0)
	  {
	  	 html_img += "<img src='<?php bloginfo('template_url'); ?>/images/cafe-amazon.png' style='margin: 3px; vertical-align: middle;' />";
	  }
	   if (pro_check!=0)
	  {
	  	 html_img += "<img src='<?php bloginfo('template_url'); ?>/images/procheck.png' style='margin: 3px; vertical-align: middle;' />";
	  }
	   var html = "<h3 style='font-size:18px;color:#0F84D1'>"+name +"</h3><p>"+ address +"<br/><span class='blue'>โทรศัพท์ 02 373 1164</span><br/>"+ html_img +"</p>";
	  GEvent.addListener(marker, 'click', function() {
				marker.openInfoWindowHtml(html);
			  });
			return marker;
    }
function createSidebarEntry(marker, name, address,gasohol95,gasohole85,gasohol91,gasohole20,jiffy,cafe_amazon,pro_check) {
  var div = document.createElement('div');
  div.className += "station-list";
 // var html = "<ul><li style='color:#67AE3D;'>" + name + "</li></ul>";
/* var html_img ='';
	 if (gasohol95!=0)
	  {
	  	html_img += "<img src='<?php bloginfo('template_url'); ?>/images/yellow-symbol.png' style='margin: 3px; vertical-align: middle;' />";
	  }
	  if (gasohole85!=0)
	  {
	  	html_img += "<img src='<?php bloginfo('template_url'); ?>/images/purple-symbol.png' style='margin: 3px; vertical-align: middle;' />";
	  }
	   if (gasohol91!=0)
	  {
	  	html_img += "<img src='<?php bloginfo('template_url'); ?>/images/green-symbol.png' style='margin: 3px; vertical-align: middle;' />";
	  }
	   if (gasohole20!=0)
	  {
	  	html_img += "<img src='<?php bloginfo('template_url'); ?>/images/limegreen-symbol.png' style='margin: 3px; vertical-align: middle;' />";
	  }
	  if(jiffy!=0 ||cafe_amazon!=0 || pro_check!=0){
	  	 html_img +="<br />";
	  }
	  if (jiffy!=0)
	  {
	  	 html_img += "<img src='<?php bloginfo('template_url'); ?>/images/jiffy.png' style='margin: 3px; vertical-align: middle;' />";
	  }
	   if (cafe_amazon!=0)
	  {
	  	 html_img += "<img src='<?php bloginfo('template_url'); ?>/images/cafe-amazon.png' style='margin: 3px; vertical-align: middle;' />";
	  }
	   if (pro_check!=0)
	  {
	  	 html_img += "<img src='<?php bloginfo('template_url'); ?>/images/procheck.png' style='margin: 3px; vertical-align: middle;' />";
	  }*/
 //var html = "<div class='search-list'><h3 style='font-size:18px;'>"+ name +"</h3><p>"+ address +"<br/><span class='blue'>โทรศัพท์ 02 373 1164</span><br/>"+ html_img +"</p></div>";
  var html = "<p class='station-name'><strong>ชื่อ : </strong>" + name + "</p> <p><strong>ที่อยู่ :</strong> " + address +"</p>";
  div.innerHTML = html;
  div.style.cursor = 'pointer';
  div.style.marginBottom = '5px';
  GEvent.addDomListener(div, 'click', function() {
    GEvent.trigger(marker, 'click');
  });
  /*GEvent.addDomListener(div, 'mouseover', function() {
    div.style.backgroundColor = '#282928';
  });
  GEvent.addDomListener(div, 'mouseout', function() {
    div.style.backgroundColor = '#595A59';
  });*/
  return div;
}
window.onload=load;
    //]]>
  </script>
<div id="content-wrapper">

<?php get_sidebar('left')?>

<div class="right-content-box">
	<h2><?php the_title();?> <small>สถานีบริการ บลู สเตชั่น</small></h2>
	<div id="map">
<!--		<iframe id="google-map" width="695" height="475" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.th/?ie=UTF8&amp;ll=13.038965,101.490104&amp;spn=35.498649,64.907227&amp;t=m&amp;z=5&amp;output=embed"></iframe>-->
		<div id="google-map"></div>
		<div id="search-station">
			<form action="" id="search-station-form">
				<h2>ค้นหาสถานีบริการ</h2>
				<table>
					<tr>
						<td>ผลิตภัณฑ์ :</td>
						<td>
						<select name="selectMapsProduct" id="selectMapsProduct" >
						<option value="0">เลือกผลิตภัณฑ์</option>
						<?php
							$sql = "select id,name from markers_product";
							$result = mysql_query($sql);
							if (mysql_num_rows($result)>0)
							{
								while($row=mysql_fetch_assoc($result))
								{
									echo '<option value="'.$row["id"].'">'.$row["name"].'</option>';
								}
							}
						?>
						</select>
						</td>
					</tr>
					<tr>
						<td>บริการ :</td>
						<td>
						<select name="selectMapsService" id="selectMapsService" >
						<option value="0">เลือกบริการ</option>
						<?php
							$sql = "select id,name from markers_service";
							$result = mysql_query($sql);
							if (mysql_num_rows($result)>0)
							{
								while($row=mysql_fetch_assoc($result))
								{
									echo '<option value="'.$row["id"].'">'.$row["name"].'</option>';
								}
							}
						?>
						</select>
						</td>
					</tr>
					<tr>
						<td>จังหวัด :</td>
						<td>
						<select name="selectMapsLocation" id="selectMapsLocation" >
						<option value="0">เลือกจังหวัด</option>
						<?php
							$sql = "select id,province from markers_provinces";
							$result = mysql_query($sql);
							if (mysql_num_rows($result)>0)
							{
								while($row=mysql_fetch_assoc($result))
								{
									echo '<option value="'.$row["id"].'">'.$row["province"].'</option>';
								}
							}
						?>
						</select>
						</td>
					</tr>
					<tr>
						<td></td>
						<td><input type="button" class="blue-button" value="Search" onClick="searchLocationsNear()" /></td>
					</tr>
				</table>
			</form>
			<div id="station-result">
				
			</div>
		</div>
		<br class="clear"/>
	</div>
</div>
<div class="right-content-box">
	<h2>Products <small>ผลิตภัณฑ์</small></h2>
	<div id="ptt-product">
		<img src="<?php bloginfo('template_directory'); ?>/images/gasohol-e85.jpg" alt=""/>
		<img src="<?php bloginfo('template_directory'); ?>/images/gasohol-e20.jpg" alt=""/>
		<img src="<?php bloginfo('template_directory'); ?>/images/gasohol-91.jpg" alt=""/>
		<img src="<?php bloginfo('template_directory'); ?>/images/gasoline-91.jpg" alt=""/>
		<img src="<?php bloginfo('template_directory'); ?>/images/gasoline-95.jpg" alt=""/>
		<img src="<?php bloginfo('template_directory'); ?>/images/gasohol-95.jpg" alt=""/>
		<img src="<?php bloginfo('template_directory'); ?>/images/diesel.jpg" alt=""/>
		<img src="<?php bloginfo('template_directory'); ?>/images/diesel-95.jpg" alt=""/>
		<br/>
		<img src="<?php bloginfo('template_directory'); ?>/images/ngv.jpg" alt=""/>
	</div>
</div>
<div class="right-content-box">
	<h2>Service <small>บริการ</small></h2>
	<div id="service">
		<div id="service-logo">
			<img src="<?php bloginfo('template_directory'); ?>/images/logo-jiffy.jpg" alt=""/>
			<img src="<?php bloginfo('template_directory'); ?>/images/logo-cafe-amazon.jpg" alt=""/>
			<img src="<?php bloginfo('template_directory'); ?>/images/logo-procheck.jpg" alt=""/>
		</div>
	</div>
</div>

<?php get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>