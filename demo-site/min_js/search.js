app.directive("postsPagination",function(){return{restrict:"E",template:'<ul class="pagination"><li ng-show="currentPage != 1"><a href="javascript:void(0)" ng-click="search_result(1)">&laquo;</a></li><li ng-show="currentPage != 1"><a href="javascript:void(0)" ng-click="search_result(currentPage-1)">&lsaquo; Prev</a></li><li ng-repeat="i in range" ng-class="{active : currentPage == i}"><a href="javascript:void(0)" ng-click="search_result(i)">{{i}}</a></li><li ng-show="currentPage != totalPages"><a href="javascript:void(0)" ng-click="search_result(currentPage+1)">Next &rsaquo;</a></li><li ng-show="currentPage != totalPages"><a href="javascript:void(0)" ng-click="search_result(totalPages)">&raquo;</a></li></ul>'}}).controller("search-page",["$scope","$http","$compile","$filter",function(e,a,t,o){function i(e,a){var t=window.location.href;if(t.indexOf(e+"=")>=0){var o=t.substring(0,t.indexOf(e)),i=t.substring(t.indexOf(e));i=i.substring(i.indexOf("=")+1),i=i.indexOf("&")>=0?i.substring(i.indexOf("&")):"",t=o+e+"="+a+i}else t+=t.indexOf("?")<0?"?"+e+"="+a:"&"+e+"="+a;history.pushState(null,null,t)}function s(e){e=e.replace(/[\[]/,"\\[").replace(/[\]]/,"\\]");var a=new RegExp("[\\?&]"+e+"=([^&#]*)"),t=a.exec(location.search);return null===t?"":decodeURIComponent(t[1].replace(/\+/g," "))}function r(){autocomplete=new google.maps.places.Autocomplete(document.getElementById("header-search-form"),{types:["geocode"]}),google.maps.event.addListener(autocomplete,"place_changed",function(){var a=$("#header-search-form").val(),t=a.replace(" ","+");i("location",t);var o=autocomplete.getPlace(),s=o.geometry.location.lat(),r=o.geometry.location.lng();e.cLat=s,e.cLong=r,e.search_result(),l()})}function l(){if(""==e.zoom)var a=10;else var a=e.zoom;if(0==$("#lat").val())var a=1;if(""==e.cLat&&""==e.cLong)var t=$("#lat").val(),o=$("#long").val();else var t=e.cLat,o=e.cLong;var i=new google.maps.LatLng(t,o),s={scrollwheel:!1,center:i,zoom:a,zoomControl:!0,zoomControlOptions:{position:google.maps.ControlPosition.LEFT_TOP,style:google.maps.ZoomControlStyle.SMALL},mapTypeControl:!1,streetViewControl:!1,navigationControl:!1};u=new google.maps.Map(document.getElementById("map_canvas"),s),google.maps.event.addListener(u,"click",function(){_.close()});var r=document.createElement("div");new n(r,u);u.controls[google.maps.ControlPosition.LEFT_TOP].push(r),google.maps.event.addListener(u,"dragend",function(){e.zoom=u.getZoom();var a=u.getZoom(),t=u.getBounds(),o=t.getSouthWest().lat(),i=t.getSouthWest().lng(),s=t.getNorthEast().lat(),r=t.getNorthEast().lng(),l=t.getCenter().lat(),n=t.getCenter().lng();e.cLat=t.getCenter().lat(),e.cLong=t.getCenter().lng();var c=a+"~"+t+"~"+o+"~"+i+"~"+s+"~"+r+"~"+l+"~"+n;localStorage.setItem("map_lat_long",c);var d="";$(".map-auto-refresh-checkbox:checked").each(function(e){d=$(this).val()}),"true"==d?e.search_result():($(".map-auto-refresh").addClass("hide"),$(".map-manual-refresh").removeClass("hide"))}),google.maps.event.addListener(u,"zoom_changed",function(){e.zoom=u.getZoom();var a=u.getZoom(),t=u.getBounds(),o=t.getSouthWest().lat(),i=t.getSouthWest().lng(),s=t.getNorthEast().lat(),r=t.getNorthEast().lng(),l=t.getCenter().lat(),n=t.getCenter().lng();e.cLat=t.getCenter().lat(),e.cLong=t.getCenter().lng();var c=a+"~"+t+"~"+o+"~"+i+"~"+s+"~"+r+"~"+l+"~"+n;localStorage.setItem("map_lat_long",c);var d="";$(".map-auto-refresh-checkbox:checked").each(function(e){d=$(this).val()}),"true"==d?e.search_result():($(".map-auto-refresh").addClass("hide"),$(".map-manual-refresh").removeClass("hide"))})}function n(e,a){var t=document.createElement("div");t.style.position="relative",t.style.padding="5px",t.style.margin="-65px 0px 0px 50px",t.style.fontSize="14px",t.innerHTML='<div class="map-refresh-controls google"><a   class="map-manual-refresh btn btn-primary  hide" style="background-color:#ff5a5f;color: #ffffff;">Redo Search Here<i class="icon icon-refresh icon-space-left"></i></a><div class="panel map-auto-refresh"><label class="checkbox"><input type="checkbox" checked="checked" name="redo_search" value="true" class="map-auto-refresh-checkbox"><small>Search as I move the map</small></label></div></div>',e.appendChild(t),google.maps.event.addDomListener(t,"click",function(){})}function c(a){var t=e.checkout,o=e.checkin;g(null),v=[],angular.forEach(a.data,function(e){var a='<div id="info_window_'+e.id+'" class="listing listing-map-popover" data-price="'+e.rooms_price.currency.symbol+'" data-id="'+e.id+'" data-user="'+e.user_id+'" data-url="/rooms/'+e.id+'" data-name="'+e.name+'" data-lng="'+e.rooms_address.longitude+'" data-lat="'+e.rooms_address.latitude+'"><div class="panel-image listing-img">';a+='<a class="media-photo media-cover" target="listing_'+e.id+'" href="'+APP_URL+"/rooms/"+e.id+"?checkin="+o+"&checkout="+t+'"><div class="listing-img-container media-cover text-center"><img id="marker_image_'+e.id+'" rooms_image = "" alt="'+e.name+'" class="img-responsive-height" data-current="0" src="'+APP_URL+"/images/"+e.photo_name+'"></div></a>',a+='<div class="target-prev target-control block-link marker_slider"  data-room_id="'+e.id+'"><i class="icon icon-chevron-left icon-size-2 icon-white"></i></div><a class="link-reset panel-overlay-bottom-left panel-overlay-label panel-overlay-listing-label" target="listing_'+e.id+'" href="'+APP_URL+"rooms/"+e.id+"?checkin="+o+"&checkout="+t+'"><div>';var i="";"instant_book"==e.booking_type&&(i='<span aria-label="Book Instantly" data-behavior="tooltip" class="h3 icon-beach"><i class="icon icon-instant-book icon-flush-sides"></i></span>'),a+='<sup class="h6 text-contrast">'+e.rooms_price.currency.symbol+'</sup><span class="h3 text-contrast price-amount">'+e.rooms_price.night+'</span><sup class="h6 text-contrast"></sup>'+i+'</div></a><div class="target-next target-control marker_slider block-link" data-room_id="'+e.id+'"><i class="icon icon-chevron-right icon-size-2 icon-white"></i></div></div>',a+='<div class="panel-body panel-card-section"><div class="media"><h3 class="h5 listing-name text-truncate row-space-top-1" itemprop="name" title="'+e.name+'">'+e.name+"</a></h3>";var s="";""!=e.overall_star_rating&&(s=" · "+e.overall_star_rating);var r="",l=e.reviews_count>1?"s":"";0!=e.reviews_count&&(r=" · "+e.reviews_count+" review"+l),a+='<div class="text-muted listing-location text-truncate" itemprop="description"><a class="text-normal link-reset" href="'+APP_URL+"/rooms/"+e.id+'">'+e.room_type_name+s+r+"</a></div></div></div></div>";var n=e.rooms_address.latitude,c=e.rooms_address.longitude,g=new google.maps.LatLng(n,c),h=e.name,p=(e.rooms_price.currency.symbol,e.rooms_price.night,new google.maps.Marker({position:g,map:u,icon:m("normal"),title:h,zIndex:1}));v.push(p),google.maps.event.addListener(p,"mouseover",function(){p.setIcon(m("hover"))}),google.maps.event.addListener(p,"mouseout",function(){p.setIcon(m("normal"))}),d(p,a)})}function d(e,a){f=new InfoBubble({maxWidth:3e3});var t=a;google.maps.event.addListener(e,"click",function(){f.isOpen()&&(f.close(),f=new InfoBubble({maxWidth:3e3})),f.addTab("",t);var a=0;f.setBorderRadius(a);var o=300;f.setMaxWidth(o);var i=300;f.setMaxHeight(i);var s=282;f.setMinWidth(s);var r=245;f.setMinHeight(r),f.open(u,e)})}function m(e){var a="map-pin-set-3460214b477748232858bedae3955d81.png";"hover"==e&&(a="hover-map-pin-set-3460214b477748232858bedae3955d81.png");var t=new google.maps.MarkerImage("images/"+a,new google.maps.Size(50,50),new google.maps.Point(0,0),new google.maps.Point(9,20));return t}function g(e){for(var a=0;a<v.length;a++)v[a].setMap(e)}e.current_date=new Date,e.totalPages=0,e.currentPage=1,e.range=[],$(document).on("click",'[id^="wishlist-widget-icon-"]',function(){if("object"==typeof USER_ID)return window.location.href=APP_URL+"/login",!1;var t=$(this).data("name"),o=$(this).data("img"),i=$(this).data("address"),s=$(this).data("host_img");e.room_id=$(this).data("room_id"),$(".background-listing-img").css("background-image","url("+o+")"),$(".host-profile-img").attr("src",s),$(".wl-modal-listing__name").text(t),$(".wl-modal-listing__address").text(i),$(".wl-modal-footer__input").val(i),$(".wl-modal__modal").removeClass("hide"),$(".wl-modal__col:nth-child(2)").addClass("hide"),$(".row-margin-zero").append('<div id="wish-list-signup-container" style="overflow-y:auto;" class="col-lg-5 wl-modal__col-collapsible"> <div class="loading wl-modal__col"> </div> </div>'),a.get(APP_URL+"/wishlist_list?id="+$(this).data("room_id"),{}).then(function(a){$("#wish-list-signup-container").remove(),$(".wl-modal__col:nth-child(2)").removeClass("hide"),e.wishlist_list=a.data})}),e.wishlist_row_select=function(t){a.post(APP_URL+"/save_wishlist",{data:e.room_id,wishlist_id:e.wishlist_list[t].id,saved_id:e.wishlist_list[t].saved_id}).then(function(a){"null"==a.data?e.wishlist_list[t].saved_id=null:e.wishlist_list[t].saved_id=a.data}),$("#wishlist_row_"+t).hasClass("text-dark-gray")?e.wishlist_list[t].saved_id=null:e.wishlist_list[t].saved_id=1},$(document).on("submit",".wl-modal-footer__form",function(t){t.preventDefault(),$(".wl-modal__col:nth-child(2)").addClass("hide"),$(".row-margin-zero").append('<div id="wish-list-signup-container" style="overflow-y:auto;" class="col-lg-5 wl-modal__col-collapsible"> <div class="loading wl-modal__col"> </div> </div>'),a.post(APP_URL+"/wishlist_create",{data:$(".wl-modal-footer__input").val(),id:e.room_id}).then(function(a){$(".wl-modal-footer__form").addClass("hide"),$("#wish-list-signup-container").remove(),$(".wl-modal__col:nth-child(2)").removeClass("hide"),e.wishlist_list=a.data,t.preventDefault()}),t.preventDefault()}),$(".wl-modal__modal-close").click(function(){var a=o("filter")(e.wishlist_list,{saved_id:null});a.length==e.wishlist_list.length?$("#wishlist-widget-"+e.room_id).prop("checked",!1):$("#wishlist-widget-"+e.room_id).prop("checked",!0),$(".wl-modal__modal").addClass("hide")}),$(document).ready(function(){localStorage.removeItem("map_lat_long");var a=[];$(".room-type:checked").each(function(e){a[e]=$(this).val()});var t=[];$(".property_type:checked").each(function(e){t[e]=$(this).val()});var o=[];$(".amenities:checked").each(function(e){o[e]=$(this).val()}),$(".search_tag").addClass("hide"),""!=a&&$(".room-type_tag").removeClass("hide"),""!=o&&$(".amenities_tag").removeClass("hide"),""!=t&&$(".property_type_tag").removeClass("hide");var i=$("#location").val();$("#header-search-form").val(i),$("#slider-3").slider({range:!0,min:min_slider_price,max:max_slider_price,values:[min_slider_price_value,max_slider_price_value],slide:function(e,a){$("#min_value").val(a.values[0]),$("#min_text").val(a.values[0]),max_slider_price==a.values[1]?$("#max_text").html(a.values[1]+"+"):$("#max_text").html(a.values[1]),$("#max_value").val(a.values[1])},stop:function(a,t){$("#min_value").val(t.values[0]),$("#min_text").html(t.values[0]),max_slider_price==t.values[1]?$("#max_text").html(t.values[1]+"+"):$("#max_text").html(t.values[1]),$("#max_value").val(t.values[1]),e.search_result()}}).find(".ui-slider-handle").removeClass("ui-slider-handle").removeClass("ui-state-default").removeClass("ui-corner-all").addClass("airslide-handle"),$("#slider-3").removeClass("ui-slider").removeClass("ui-slider-horizontal").removeClass("ui-widget").removeClass("ui-widget-content").removeClass("ui-corner-all"),$("#slider-3").find(".ui-slider-range").removeClass("ui-slider-range").removeClass("ui-widget-header").removeClass("ui-corner-all").addClass("airslide-progress"),$("#slider-3").append('<div class="airslide-background"></div>'),$(".airslide-progress").css("z-index","1"),$(".show-more").click(function(){$(this).children("span").toggleClass("hide"),$(this).parent().parent().children("div").children().toggleClass("filters-more")}),$("#more_filters").click(function(){$(".toggle-group").css("display","block"),$(".toggle-hide").css("display","none")})});var h=(s("location"),window.location.href.replace("/s","/searchResult"));pageNumber=1,void 0===pageNumber&&(pageNumber="1"),$(".search-results").addClass("loading"),a.get(h).then(function(a){$(".search-results").removeClass("loading"),e.room_result=a.data,e.totalPages=a.data.last_page,e.currentPage=a.data.current_page;for(var t=[],o=1;o<=a.data.last_page;o++)t.push(o);e.range=t,c(a.data)}),e.on_mouse=function(e){v[e].setIcon(m("hover"))},e.out_mouse=function(e){v[e].setIcon(m("normal"))},e.search_result=function(t){void 0===t&&(t="1");var o=$("#max_value").val(),r=$("#min_value").val(),l=[];$(".room-type:checked").each(function(e){l[e]=$(this).val()}),""==l&&$(".room-type_tag").addClass("hide");var n=[];$(".property_type:checked").each(function(e){n[e]=$(this).val()}),""==n&&$(".property_type_tag").addClass("hide");var d=[];$(".amenities:checked").each(function(e){d[e]=$(this).val()}),""==d&&$(".amenities_tag").addClass("hide");var m=$("#checkin").val(),g=$("#checkout").val(),h=$("#map-search-min-beds").val(),u=$("#map-search-min-bathrooms").val(),p=$("#map-search-min-bedrooms").val(),v=$("#guest-select").val();if("null"!=$.trim(localStorage.getItem("map_lat_long")))var _=localStorage.getItem("map_lat_long");else var _="";i("room_type",l),i("property_type",n),i("amenities",d),i("checkin",m),i("checkout",g),i("guest",v),i("beds",h),i("bathrooms",u),i("bedrooms",p),i("min_price",r),i("max_price",o),i("page",t),$(".search_tag").addClass("hide"),""!=l&&$(".room-type_tag").removeClass("hide"),""!=d&&$(".amenities_tag").removeClass("hide"),""!=n&&$(".property_type_tag").removeClass("hide");var f=s("location");$(".search-results").addClass("loading"),a.post("searchResult?page="+t,{location:f,min_price:r,max_price:o,amenities:d,property_type:n,room_type:l,beds:h,bathrooms:u,bedrooms:p,checkin:m,checkout:g,guest:v,map_details:_}).then(function(a){e.room_result=a.data,e.checkin=m,e.checkout=g,e.totalPages=a.data.last_page,e.currentPage=a.data.current_page;for(var t=[],o=1;o<=a.data.last_page;o++)t.push(o);e.range=t,$(".search-results").removeClass("loading"),c(a.data)})},e.apply_filter=function(){$(".toggle-hide").css("display","block"),$(".toggle-group").css("display","none"),e.search_result()},e.remove_filter=function(a){$("."+a).removeAttr("checked");var t=a.replace("-","_"),o="";i(t,o),$("."+a+"_tag").addClass("hide"),e.search_result()},r(),e.zoom="",e.cLat="",e.cLong="";var u,p="",v=[],_=new google.maps.InfoWindow({content:p});l();var f;$(".footer-toggle").click(function(){$(".footer-container").slideToggle("fast",function(){$(".footer-container").is(":visible")?($(".open-content").hide(),$(".close-content").show()):($(".open-content").show(),$(".close-content").hide())})}),$(document).on("click",".map-manual-refresh",function(){$(".map-manual-refresh").addClass("hide"),$(".map-auto-refresh").removeClass("hide"),e.search_result()}),$(document).on("click",".rooms-slider",function(){var e=$(this).attr("data-room_id"),t=$("#rooms_image_"+e).attr("rooms_image"),o=$("#rooms_image_"+e).attr("src");if(""==$.trim(t))$(this).parent().addClass("loading"),a.post("rooms_photos",{rooms_id:e}).then(function(a){angular.forEach(a.data,function(e){t=""==$.trim(t)?e.name:t+","+e.name}),$("#rooms_image_"+e).attr("rooms_image",t);var i=o.split("rooms/"+e+"/"),s=t.split(","),r=s.length,l=0,n="";if(angular.forEach(s,function(e){$.trim(e)==$.trim(i[1])&&(n=l),l++}),1==$(this).is(".target-prev"))var c=n-1,d=r-1;else var c=n+1,d=0;if("undefined"!=typeof s[c]&&"null"!=$.trim(s[c]))var m=s[c];else var m=s[d];var g=i[0]+"rooms/"+e+"/"+m;$(".panel-image").removeClass("loading"),$("#rooms_image_"+e).attr("src",g)});else{$(this).parent().addClass("loading");var i=o.split("rooms/"+e+"/"),s=t.split(","),r=s.length,l=0,n="";if(angular.forEach(s,function(e){$.trim(e)==$.trim(i[1])&&(n=l),l++}),1==$(this).is(".target-prev"))var c=n-1,d=r-1;else var c=n+1,d=0;if("undefined"!=typeof s[c]&&"null"!=$.trim(s[c]))var m=s[c];else var m=s[d];var g=i[0]+"rooms/"+e+"/"+m;$(".panel-image").removeClass("loading"),$("#rooms_image_"+e).attr("src",g)}}),$(document).on("click",".marker_slider",function(){var e=$(this).attr("data-room_id"),t=$("#marker_image_"+e).attr("rooms_image"),o=$("#marker_image_"+e).attr("src");if(""==$.trim(t))$(this).parent().addClass("loading"),a.post("rooms_photos",{rooms_id:e}).then(function(a){angular.forEach(a.data,function(e){t=""==$.trim(t)?e.name:t+","+e.name}),$("#marker_image_"+e).attr("rooms_image",t);var i=o.split("rooms/"+e+"/"),s=t.split(","),r=s.length,l=0,n="";if(angular.forEach(s,function(e){$.trim(e)==$.trim(i[1])&&(n=l),l++}),1==$(this).is(".target-prev"))var c=n-1,d=r-1;else var c=n+1,d=0;if("undefined"!=typeof s[c]&&"null"!=$.trim(s[c]))var m=s[c];else var m=s[d];var g=i[0]+"rooms/"+e+"/"+m;$(".panel-image").removeClass("loading"),$("#marker_image_"+e).attr("src",g)});else{$(this).parent().addClass("loading");var i=o.split("rooms/"+e+"/"),s=t.split(","),r=s.length,l=0,n="";if(angular.forEach(s,function(e){$.trim(e)==$.trim(i[1])&&(n=l),l++}),1==$(this).is(".target-prev"))var c=n-1,d=r-1;else var c=n+1,d=0;if("undefined"!=typeof s[c]&&"null"!=$.trim(s[c]))var m=s[c];else var m=s[d];var g=i[0]+"rooms/"+e+"/"+m;$(".panel-image").removeClass("loading"),$("#marker_image_"+e).attr("src",g)}}),$(document).on("change",'[id^="map-search"]',function(){var e=0;$('[id^="map-search"]').each(function(){$(this).is(":checkbox")?$(this).is(":checked")&&e++:""!=$(this).val()&&e++}),0==e?$("#more_filter_submit").attr("disabled","disabled"):$("#more_filter_submit").removeAttr("disabled")}),$(document).on("click","#cancel-filter",function(){$('[id^="map-search"]').each(function(){$(this).is(":checkbox")?$(this).attr("checked",!1):$(this).val("")}),$("#more_filter_submit").attr("disabled","disabled"),$(".toggle-hide").css("display","block"),$(".toggle-group").css("display","none"),e.search_result()})}]);