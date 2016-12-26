function initialize(){var t=document.getElementById("map"),i={center:new google.maps.LatLng($("#map").attr("data-lat"),$("#map").attr("data-lng")),zoom:13,zoomControl:!0,scrollwheel:!1,mapTypeControl:!1,streetViewControl:!1,zoomControlOptions:{style:google.maps.ZoomControlStyle.SMALL},panControl:!1,scaleControl:!1,mapTypeId:google.maps.MapTypeId.ROADMAP},e=new google.maps.Map(t,i),a=new google.maps.LatLng($("#map").attr("data-lat"),$("#map").attr("data-lng"));e.setCenter(a);var s={center:{lat:parseFloat($("#map").attr("data-lat")),lng:parseFloat($("#map").attr("data-lng"))}};new google.maps.Circle({strokeColor:"#11848E",strokeOpacity:.8,strokeWeight:2,fillColor:"#7FDDC4",fillOpacity:.35,map:e,center:s.center,radius:1e3})}google.maps.event.addDomListener(window,"load",initialize),$(function(){$(".ad-gallery").adGallery({height:400,effect:"fade"})}),function(t){function i(t,i,e){var a=parseInt(t.css("top"),10);if("left"==i){var s="-"+this.image_wrapper_height+"px";t.css("top",this.image_wrapper_height+"px")}else{var s=this.image_wrapper_height+"px";t.css("top","-"+this.image_wrapper_height+"px")}return e&&(e.css("bottom","-"+e[0].offsetHeight+"px"),e.animate({bottom:0},2*this.settings.animation_speed)),this.current_description&&this.current_description.animate({bottom:"-"+this.current_description[0].offsetHeight+"px"},2*this.settings.animation_speed),{old_image:{top:s},new_image:{top:a}}}function e(t,i,e){var a=parseInt(t.css("left"),10);if("left"==i){var s="-"+this.image_wrapper_width+"px";t.css("left",this.image_wrapper_width+"px")}else{var s=this.image_wrapper_width+"px";t.css("left","-"+this.image_wrapper_width+"px")}return e&&(e.css("bottom","-"+e[0].offsetHeight+"px"),e.animate({bottom:0},2*this.settings.animation_speed)),this.current_description&&this.current_description.animate({bottom:"-"+this.current_description[0].offsetHeight+"px"},2*this.settings.animation_speed),{old_image:{left:s},new_image:{left:a}}}function a(t,i,e){var a=t.width(),s=t.height(),n=parseInt(t.css("left"),10),o=parseInt(t.css("top"),10);return t.css({width:0,height:0,top:this.image_wrapper_height/2,left:this.image_wrapper_width/2}),{old_image:{width:0,height:0,top:this.image_wrapper_height/2,left:this.image_wrapper_width/2},new_image:{width:a,height:s,top:o,left:n}}}function s(t,i,e){return t.css("opacity",0),{old_image:{opacity:0},new_image:{opacity:1}}}function n(t,i,e){return t.css("opacity",0),{old_image:{opacity:0},new_image:{opacity:1},speed:0}}function o(t,i){this.init(t,i)}function r(t,i){this.init(t,i)}t.fn.adGallery=function(i){var e={loader_image:"loader.gif",start_at_index:0,update_window_hash:!0,description_wrapper:!1,thumb_opacity:.7,animate_first_image:!1,animation_speed:400,width:!1,height:!1,display_next_and_prev:!0,display_back_and_forward:!0,scroll_jump:0,slideshow:{enable:!0,autostart:!1,speed:5e3,start_label:"Start",stop_label:"Stop",stop_on_scroll:!0,countdown_prefix:"(",countdown_sufix:")",onStart:!1,onStop:!1},effect:"slide-hori",enable_keyboard_move:!0,cycle:!0,hooks:{displayDescription:!1},callbacks:{init:!1,afterImageVisible:!1,beforeImageVisible:!1}},a=t.extend(!1,e,i);i&&i.slideshow&&(a.slideshow=t.extend(!1,e.slideshow,i.slideshow)),a.slideshow.enable||(a.slideshow.autostart=!1),t(".ad-thumbs").css("top","0px"),setTimeout(function(){t(".ad-thumbs").css("top","90px")},4e3),t(".ad-nav").hover(function(){t(".ad-thumbs").css("top","0px")},function(){t(".ad-thumbs").css("top","90px")});var s=[];return t(this).each(function(){var t=new o(this,a);s[s.length]=t}),s},o.prototype={wrapper:!1,image_wrapper:!1,gallery_info:!1,nav:!1,loader:!1,preloads:!1,thumbs_wrapper:!1,thumbs_wrapper_width:0,scroll_back:!1,scroll_forward:!1,next_link:!1,prev_link:!1,slideshow:!1,image_wrapper_width:0,image_wrapper_height:0,current_index:-1,current_image:!1,current_description:!1,nav_display_width:0,settings:!1,images:!1,in_transition:!1,animations:!1,init:function(i,e){var a=this;this.wrapper=t(i),this.settings=e,this.setupElements(),this.setupAnimations(),this.settings.width?(this.image_wrapper_width=this.settings.width,this.image_wrapper.width(this.settings.width),this.wrapper.width(this.settings.width)):this.image_wrapper_width=this.image_wrapper.width(),this.settings.height?(this.image_wrapper_height=this.settings.height,this.image_wrapper.height(this.settings.height)):this.image_wrapper_height=this.image_wrapper.height(),this.nav_display_width=this.nav.width(),this.current_index=-1,this.current_image=!1,this.current_description=!1,this.in_transition=!1,this.findImages(),this.settings.display_next_and_prev&&this.initNextAndPrev();var s=function(t){return a.nextImage(t)};this.slideshow=new r(s,this.settings.slideshow),this.controls.append(this.slideshow.create()),this.settings.slideshow.enable?this.slideshow.enable():this.slideshow.disable(),this.settings.display_back_and_forward&&this.initBackAndForward(),this.settings.enable_keyboard_move&&this.initKeyEvents(),this.initHashChange();var n=parseInt(this.settings.start_at_index,10);"undefined"!=typeof this.getIndexFromHash()&&(n=this.getIndexFromHash()),this.loading(!0),this.showImage(n,function(){a.settings.slideshow.autostart&&(a.preloadImage(n+1),a.slideshow.start())}),this.fireCallback(this.settings.callbacks.init)},setupAnimations:function(){this.animations={"slide-vert":i,"slide-hori":e,resize:a,fade:s,none:n}},setupElements:function(){this.controls=this.wrapper.find(".ad-controls"),this.gallery_info=t('<p class="ad-info"></p>'),this.controls.append(this.gallery_info),this.image_wrapper=this.wrapper.find(".ad-image-wrapper"),this.image_wrapper.empty(),this.nav=this.wrapper.find(".ad-nav"),this.thumbs_wrapper=this.nav.find(".ad-thumbs"),this.preloads=t('<div class="ad-preloads"></div>'),this.loader=t('<img class="ad-loader" src="../../images/'+this.settings.loader_image+'">'),this.image_wrapper.append(this.loader),this.loader.hide(),t(document.body).append(this.preloads)},loading:function(t){t?this.loader.show():this.loader.hide()},addAnimation:function(i,e){t.isFunction(e)&&(this.animations[i]=e)},findImages:function(){var i=this;this.images=[];var e=0,a=this.thumbs_wrapper.find("a"),s=a.length;this.settings.thumb_opacity<1&&a.find("img").css("opacity",this.settings.thumb_opacity),a.each(function(a){var s=t(this);s.data("ad-i",a);var n=s.attr("href"),o=s.find("img");i.whenImageLoaded(o[0],function(){var t=o[0].parentNode.parentNode.offsetWidth;0==o[0].width&&(t=100),i.thumbs_wrapper_width+=t,e++}),i._initLink(s),i.images[a]=i._createImageData(s,n)});var n=setInterval(function(){s==e&&(i._setThumbListWidth(i.thumbs_wrapper_width),clearInterval(n))},100)},_setThumbListWidth:function(t){t-=100;var i=this.nav.find(".ad-thumb-list");i.css("width",t+"px");for(var e=1,a=i.height();201>e&&(i.css("width",t+e+"px"),a==i.height());)a=i.height(),e++;i.width()<this.nav.width()&&i.width(this.nav.width())},_initLink:function(i){var e=this;i.click(function(){return e.showImage(i.data("ad-i")),e.slideshow.stop(),!1}).hover(function(){!t(this).is(".ad-active")&&e.settings.thumb_opacity<1&&t(this).find("img").fadeTo(300,1),e.preloadImage(i.data("ad-i"))},function(){!t(this).is(".ad-active")&&e.settings.thumb_opacity<1&&t(this).find("img").fadeTo(300,e.settings.thumb_opacity)})},_createImageData:function(t,i){var e=!1,a=t.find("img");a.data("ad-link")?e=t.data("ad-link"):a.attr("longdesc")&&a.attr("longdesc").length&&(e=a.attr("longdesc"));var s=!1;a.data("ad-desc")?s=a.data("ad-desc"):a.attr("alt")&&a.attr("alt").length&&(s=a.attr("alt"));var n=!1;a.data("ad-title")?n=a.data("ad-title"):a.attr("title")&&a.attr("title").length&&(n=a.attr("title"));var o=!1;return a.attr("data-caption")&&(o=a.attr("data-caption")),{thumb_link:t,image:i,error:!1,preloaded:!1,desc:s,title:n,size:!1,captions:o,link:e}},initKeyEvents:function(){var i=this;t(document).keydown(function(t){39==t.keyCode?(i.nextImage(),i.slideshow.stop()):37==t.keyCode&&(i.prevImage(),i.slideshow.stop())})},getIndexFromHash:function(){if(window.location.hash&&0===window.location.hash.indexOf("#ad-image-")){var t=window.location.hash.replace(/^#ad-image-/g,""),i=this.thumbs_wrapper.find("#"+t);if(i.length)return this.thumbs_wrapper.find("a").index(i);if(!isNaN(parseInt(t,10)))return parseInt(t,10)}},removeImage:function(i){if(0>i||i>=this.images.length)throw"Cannot remove image for index "+i;var e=this.images[i];this.images.splice(i,1);var a=e.thumb_link,s=a[0].parentNode.offsetWidth;this.thumbs_wrapper_width-=s,a.remove(),this._setThumbListWidth(this.thumbs_wrapper_width),this.gallery_info.html(this.current_index+1+" / "+this.images.length),this.thumbs_wrapper.find("a").each(function(i){t(this).data("ad-i",i)}),i==this.current_index&&0!=this.images.length&&this.showImage(0)},removeAllImages:function(){for(var t=this.images.length-1;t>=0;t--)this.removeImage(t)},addImage:function(i,e,a,s,n){a=a||"",s=s||"",n=n||"";var o=t('<li><a href="'+e+'" id="'+a+'"><img src="'+i+'" title="'+s+'" alt="'+n+'"></a></li>'),r=this;this.thumbs_wrapper.find("ul").append(o);var h=o.find("a"),l=h.find("img");l.css("opacity",this.settings.thumb_opacity),this.whenImageLoaded(l[0],function(){var t=l[0].parentNode.parentNode.offsetWidth;0==l[0].width&&(t=100),r.thumbs_wrapper_width+=t,r._setThumbListWidth(r.thumbs_wrapper_width)});var d=this.images.length;h.data("ad-i",d),this._initLink(h),this.images[d]=r._createImageData(h,e),this.gallery_info.html(this.current_index+1+" / "+this.images.length)},initHashChange:function(){var i=this;if("onhashchange"in window)t(window).bind("hashchange",function(){var t=i.getIndexFromHash();"undefined"!=typeof t&&t!=i.current_index&&i.showImage(t)});else{var e=window.location.hash;setInterval(function(){if(window.location.hash!=e){e=window.location.hash;var t=i.getIndexFromHash();"undefined"!=typeof t&&t!=i.current_index&&i.showImage(t)}},200)}},initNextAndPrev:function(){this.next_link=t('<div class="ad-next"><div class="ad-next-image icon-chevron-right icon  icon-size-4 text-contrast"></div></div>'),this.prev_link=t('<div class="ad-prev"><div class="ad-prev-image icon-chevron-left icon  icon-size-4 text-contrast"></div></div>'),this.image_wrapper.append(this.next_link),this.image_wrapper.append(this.prev_link);var i=this;this.prev_link.add(this.next_link).mouseover(function(e){t(this).css("height",i.image_wrapper_height)}).mouseout(function(t){}).click(function(){t(this).is(".ad-next")?(t(".ad-caption").hide(),i.nextImage(),i.slideshow.stop()):(t(".ad-caption").hide(),i.prevImage(),i.slideshow.stop())}).find("div").css("opacity",1)},initBackAndForward:function(){var i=this;this.scroll_forward=t('<div class="ad-forward"></div>'),this.scroll_back=t('<div class="ad-back"></div>'),this.nav.append(this.scroll_forward),this.nav.prepend(this.scroll_back);var e=0,a=!1;t(this.scroll_back).add(this.scroll_forward).click(function(){var e=i.nav_display_width-50;if(i.settings.scroll_jump>0)var e=i.settings.scroll_jump;if(t(this).is(".ad-forward"))var a=i.thumbs_wrapper.scrollLeft()+e;else var a=i.thumbs_wrapper.scrollLeft()-e;return i.settings.slideshow.stop_on_scroll&&i.slideshow.stop(),i.thumbs_wrapper.animate({scrollLeft:a+"px"}),!1}).css("opacity",.6).hover(function(){var s="left";t(this).is(".ad-forward")&&(s="right"),a=setInterval(function(){e++,e>30&&i.settings.slideshow.stop_on_scroll&&i.slideshow.stop();var t=i.thumbs_wrapper.scrollLeft()+1;"left"==s&&(t=i.thumbs_wrapper.scrollLeft()-1),i.thumbs_wrapper.scrollLeft(t)},10),t(this).css("opacity",1)},function(){e=0,clearInterval(a),t(this).css("opacity",.6)})},_afterShow:function(){if(this.gallery_info.html(this.current_index+1+" / "+this.images.length),this.settings.cycle||(this.prev_link.show().css("height",this.image_wrapper_height),this.next_link.show().css("height",this.image_wrapper_height),this.current_index==this.images.length-1&&this.next_link.hide(),0==this.current_index&&this.prev_link.hide()),this.settings.update_window_hash){var t=this.images[this.current_index].thumb_link;t.attr("id")?window.location.hash="#ad-image-"+t.attr("id"):window.location.hash="#ad-image-"+this.current_index}this.fireCallback(this.settings.callbacks.afterImageVisible)},_getContainedImageSize:function(t,i){if(i>this.image_wrapper_height){var e=t/i;i=this.image_wrapper_height,t=this.image_wrapper_height*e}if(i<this.image_wrapper_height){var e=t/i;i=400,t=this.image_wrapper_height*e}if(t>this.image_wrapper_width){var e=i/t;t=this.image_wrapper_width,i=this.image_wrapper_width*e}return{width:t,height:i}},_centerImage:function(t,i,e){if(t.css("top","0px"),e<this.image_wrapper_height){var a=this.image_wrapper_height-e;t.css("top",a/2+"px")}if(t.css("left","0px"),i<this.image_wrapper_width){var a=this.image_wrapper_width-i;t.css("left",a/2+"px")}},_getDescription:function(i){var e=!1;if(i.desc.length||i.title.length){var a="";i.title.length&&(a='<strong class="ad-description-title">'+i.title+"</strong>");var e="";i.desc.length&&(e="<span>"+i.desc+"</span>"),e=t('<p class="ad-image-description">'+a+e+"</p>")}return e},_getCaption:function(i){var e=!1;if(i.desc.length||i.title.length){var a="";i.title.length&&(a='<strong class="ad-caption"> : '+i.title+"</strong>");var e="";i.desc.length&&(e="<span>"+i.desc+"</span>"),e=t('<p class="ad-caption">'+a+e+"</p>")}return e},showImage:function(t,i){if(this.images[t]&&!this.in_transition&&t!=this.current_index){var e=this,a=this.images[t];this.in_transition=!0,a.preloaded?this._showWhenLoaded(t,i):(this.loading(!0),this.preloadImage(t,function(){e.loading(!1),e._showWhenLoaded(t,i)}))}},_showWhenLoaded:function(i,e){if(this.images[i]){var a=this,s=this.images[i],n=t(document.createElement("div")).addClass("ad-image"),n=t(document.createElement("div")).addClass("ad-image"),o=t(new Image).attr("src",s.image);if(s.link){var r=t('<a href="'+s.link+'" target="_blank"></a>');r.append(o),n.append(r)}else n.append(o);this.image_wrapper.prepend(n);var h=this._getContainedImageSize(s.size.width,s.size.height);o.attr("width",h.width),o.attr("height",h.height),n.css({width:h.width+"px",height:h.height+"px"}),this._centerImage(n,h.width,h.height);var l=this._getDescription(s),d=this._getCaption(s);if(l)if(this.settings.description_wrapper||this.settings.hooks.displayDescription)if(this.settings.hooks.displayDescription)this.settings.hooks.displayDescription.call(this,s);else{var c=this.settings.description_wrapper;c.append(l)}else{t(".ad-controls").append(d);var p=h.width-parseInt(l.css("padding-left"),10)-parseInt(l.css("padding-right"),10);l.css("width",p+"px")}this.highLightThumb(this.images[i].thumb_link);var g="right";if(this.current_index<i&&(g="left"),this.fireCallback(this.settings.callbacks.beforeImageVisible),this.current_image||this.settings.animate_first_image){var u=this.settings.animation_speed,m="swing",_=this.animations[this.settings.effect].call(this,n,g,l);if("undefined"!=typeof _.speed&&(u=_.speed),"undefined"!=typeof _.easing&&(m=_.easing),this.current_image){var f=this.current_image,v=this.current_description;f.animate(_.old_image,u,m,function(){f.remove(),v&&v.remove()})}n.animate(_.new_image,u,m,function(){a.current_index=i,a.current_image=n,a.current_description=l,a.in_transition=!1,a._afterShow(),a.fireCallback(e)})}else this.current_index=i,this.current_image=n,a.current_description=l,this.in_transition=!1,a._afterShow(),this.fireCallback(e)}},nextIndex:function(){if(this.current_index==this.images.length-1){if(!this.settings.cycle)return!1;var t=0}else var t=this.current_index+1;return t},nextImage:function(t){var i=this.nextIndex();return i===!1?!1:(this.preloadImage(i+1),this.showImage(i,t),!0)},prevIndex:function(){if(0==this.current_index){if(!this.settings.cycle)return!1;var t=this.images.length-1}else var t=this.current_index-1;return t},prevImage:function(t){var i=this.prevIndex();return i===!1?!1:(this.preloadImage(i-1),this.showImage(i,t),!0)},preloadAll:function(){function t(){e<i.images.length&&(e++,i.preloadImage(e,t))}var i=this,e=0;i.preloadImage(e,t)},preloadImage:function(i,e){if(this.images[i]){var a=this.images[i];if(this.images[i].preloaded)this.fireCallback(e);else{var s=t(new Image);if(s.attr("src",a.image),this.isImageLoaded(s[0]))a.preloaded=!0,a.size={width:s[0].width,height:s[0].height},this.fireCallback(e);else{this.preloads.append(s);var n=this;s.load(function(){a.preloaded=!0,a.size={width:this.width,height:this.height},n.fireCallback(e)}).error(function(){a.error=!0,a.preloaded=!1,a.size=!1})}}}},whenImageLoaded:function(i,e){this.isImageLoaded(i)?e&&e():t(i).load(e)},isImageLoaded:function(t){return"undefined"==typeof t.complete||t.complete?"undefined"==typeof t.naturalWidth||0!=t.naturalWidth:!1},highLightThumb:function(t){this.thumbs_wrapper.find(".ad-active").removeClass("ad-active"),t.addClass("ad-active"),this.settings.thumb_opacity<1&&(this.thumbs_wrapper.find("a:not(.ad-active) img").fadeTo(300,this.settings.thumb_opacity),t.find("img").fadeTo(300,1));var i=t[0].parentNode.offsetLeft;i-=this.nav_display_width/2-t[0].offsetWidth/2,this.thumbs_wrapper.animate({scrollLeft:i+"px"})},fireCallback:function(i){t.isFunction(i)&&i.call(this)}},r.prototype={start_link:!1,stop_link:!1,countdown:!1,controls:!1,settings:!1,nextimage_callback:!1,enabled:!1,running:!1,countdown_interval:!1,init:function(t,i){this.nextimage_callback=t,this.settings=i},create:function(){this.start_link=t('<span class="ad-slideshow-start">'+this.settings.start_label+"</span>"),this.stop_link=t('<span class="ad-slideshow-stop">'+this.settings.stop_label+"</span>"),this.countdown=t('<span class="ad-slideshow-countdown"></span>'),this.controls=t('<div class="ad-slideshow-controls"></div>'),this.photo_list=t('<span class="ad-slideshow-start">Show Photo List <i class="fa fa-caret-down"></i></span>'),this.controls.append(this.photo_list),this.countdown.hide();var i=this;return this.start_link.click(function(){i.start()}),this.stop_link.click(function(){i.stop()}),t(document).keydown(function(t){83==t.keyCode&&(i.running?i.stop():i.start())}),this.controls},disable:function(){this.enabled=!1,this.stop(),this.controls.hide()},enable:function(){this.enabled=!0,this.controls.show()},toggle:function(){this.enabled?this.disable():this.enable()},start:function(){if(this.running||!this.enabled)return!1;return this.running=!0,this.controls.addClass("ad-slideshow-running"),this._next(),this.fireCallback(this.settings.onStart),!0},stop:function(){return this.running?(this.running=!1,this.countdown.hide(),this.controls.removeClass("ad-slideshow-running"),clearInterval(this.countdown_interval),this.fireCallback(this.settings.onStop),!0):!1},_next:function(){var t=this,i=this.settings.countdown_prefix,e=this.settings.countdown_sufix;clearInterval(t.countdown_interval),this.countdown.show().html(i+this.settings.speed/1e3+e);var a=0;this.countdown_interval=setInterval(function(){if(a+=1e3,a>=t.settings.speed){var s=function(){t.running&&t._next(),a=0};t.nextimage_callback(s)||t.stop(),a=0}var n=parseInt(t.countdown.text().replace(/[^0-9]/g,""),10);n--,n>0&&t.countdown.html(i+n+e)},1e3)},fireCallback:function(i){t.isFunction(i)&&i.call(this)}}}(jQuery),function(t,i,e,a){function s(i,e){this.el=i,this.$el=t(this.el),this.options=t.extend({},o,e),this._defaults=o,this._name=n,this.init()}var n="nivoLightbox",o={effect:"fade",theme:"default",keyboardNav:!0,clickOverlayToClose:!0,onInit:function(){},beforeShowLightbox:function(){},afterShowLightbox:function(t){},beforeHideLightbox:function(){},afterHideLightbox:function(){},onPrev:function(t){},onNext:function(t){},errorMessage:"The requested content cannot be loaded. Please try again later."};s.prototype={init:function(){var i=this;t("html").hasClass("nivo-lightbox-notouch")||t("html").addClass("nivo-lightbox-notouch"),"ontouchstart"in e&&t("html").removeClass("nivo-lightbox-notouch"),this.$el.on("click",function(t){i.showLightbox(t)}),this.options.keyboardNav&&t("body").off("keyup").on("keyup",function(e){var a=e.keyCode?e.keyCode:e.which;27==a&&i.destructLightbox(),37==a&&t(".nivo-lightbox-prev").trigger("click"),39==a&&t(".nivo-lightbox-next").trigger("click")}),this.options.onInit.call(this)},showLightbox:function(i){var e=this,a=this.$el,s=this.checkContent(a);if(s){i.preventDefault(),this.options.beforeShowLightbox.call(this);var n=this.constructLightbox();if(n){var o=n.find(".nivo-lightbox-content");if(o){if(t("body").addClass("nivo-lightbox-body-effect-"+this.options.effect),this.processContent(o,a),this.$el.attr("data-lightbox-gallery")){var r=t('[data-lightbox-gallery="'+this.$el.attr("data-lightbox-gallery")+'"]');t(".nivo-lightbox-nav").show(),t(".nivo-lightbox-prev").off("click").on("click",function(i){i.preventDefault();var s=r.index(a);a=r.eq(s-1),t(a).length||(a=r.last()),e.processContent(o,a),e.options.onPrev.call(this,[a])}),t(".nivo-lightbox-next").off("click").on("click",function(i){i.preventDefault();var s=r.index(a);a=r.eq(s+1),t(a).length||(a=r.first()),e.processContent(o,a),e.options.onNext.call(this,[a])})}setTimeout(function(){n.addClass("nivo-lightbox-open"),e.options.afterShowLightbox.call(this,[n])},1)}}}},checkContent:function(t){var i=t.attr("href"),e=i.match(/(youtube|youtu|vimeo)\.(com|be)\/(watch\?v=([\w-]+)|([\w-]+))/);return null!==i.match(/\.(jpeg|jpg|gif|png)$/i)?!0:e?!0:"ajax"==t.attr("data-lightbox-type")?!0:"#"==i.substring(0,1)&&"inline"==t.attr("data-lightbox-type")?!0:"iframe"==t.attr("data-lightbox-type")},processContent:function(e,a){var s=this,n=a.attr("href"),o=n.match(/(youtube|youtu|vimeo)\.(com|be)\/(watch\?v=([\w-]+)|([\w-]+))/);if(e.html("").addClass("nivo-lightbox-loading"),this.isHidpi()&&a.attr("data-lightbox-hidpi")&&(n=a.attr("data-lightbox-hidpi")),null!==n.match(/\.(jpeg|jpg|gif|png)$/i)){var r=t("<img>",{src:n});r.one("load",function(){var a=t('<div class="nivo-lightbox-image" />');a.append(r),e.html(a).removeClass("nivo-lightbox-loading"),a.css({"line-height":t(".nivo-lightbox-content").height()+"px",height:t(".nivo-lightbox-content").height()+"px"}),t(i).resize(function(){a.css({"line-height":t(".nivo-lightbox-content").height()+"px",height:t(".nivo-lightbox-content").height()+"px"})})}).each(function(){this.complete&&t(this).load()}),r.error(function(){var i=t('<div class="nivo-lightbox-error"><p>'+s.options.errorMessage+"</p></div>");e.html(i).removeClass("nivo-lightbox-loading")})}else if(o){var h="",l="nivo-lightbox-video";if("youtube"==o[1]&&(h="http://www.youtube.com/embed/"+o[4],l="nivo-lightbox-youtube"),"youtu"==o[1]&&(h="http://www.youtube.com/embed/"+o[3],l="nivo-lightbox-youtube"),"vimeo"==o[1]&&(h="http://player.vimeo.com/video/"+o[3],l="nivo-lightbox-vimeo"),h){var d=t("<iframe>",{src:h,"class":l,frameborder:0,vspace:0,hspace:0,scrolling:"auto"});e.html(d),d.load(function(){e.removeClass("nivo-lightbox-loading")})}}else if("ajax"==a.attr("data-lightbox-type"))t.ajax({url:n,cache:!1,success:function(a){var s=t('<div class="nivo-lightbox-ajax" />');s.append(a),e.html(s).removeClass("nivo-lightbox-loading"),s.outerHeight()<e.height()&&s.css({position:"relative",top:"50%","margin-top":-(s.outerHeight()/2)+"px"}),t(i).resize(function(){s.outerHeight()<e.height()&&s.css({position:"relative",top:"50%","margin-top":-(s.outerHeight()/2)+"px"})})},error:function(){var i=t('<div class="nivo-lightbox-error"><p>'+s.options.errorMessage+"</p></div>");e.html(i).removeClass("nivo-lightbox-loading")}});else if("#"==n.substring(0,1)&&"inline"==a.attr("data-lightbox-type"))if(t(n).length){var c=t('<div class="nivo-lightbox-inline" />');c.append(t(n).clone().show()),e.html(c).removeClass("nivo-lightbox-loading"),c.outerHeight()<e.height()&&c.css({position:"relative",top:"50%","margin-top":-(c.outerHeight()/2)+"px"}),t(i).resize(function(){c.outerHeight()<e.height()&&c.css({position:"relative",top:"50%","margin-top":-(c.outerHeight()/2)+"px"})})}else{var p=t('<div class="nivo-lightbox-error"><p>'+s.options.errorMessage+"</p></div>");e.html(p).removeClass("nivo-lightbox-loading")}else{if("iframe"!=a.attr("data-lightbox-type"))return!1;var g=t("<iframe>",{src:n,"class":"nivo-lightbox-item",frameborder:0,vspace:0,hspace:0,scrolling:"auto"});e.html(g),g.load(function(){e.removeClass("nivo-lightbox-loading")})}if(a.attr("title")){var u=t("<span>",{"class":"nivo-lightbox-title"});u.text(a.attr("title")),t(".nivo-lightbox-title-wrap").html(u)}else t(".nivo-lightbox-title-wrap").html("")},constructLightbox:function(){if(t(".nivo-lightbox-overlay").length)return t(".nivo-lightbox-overlay");var i=t("<div>",{"class":"nivo-lightbox-overlay nivo-lightbox-theme-"+this.options.theme+" nivo-lightbox-effect-"+this.options.effect}),e=t("<div>",{"class":"nivo-lightbox-wrap"}),a=t("<div>",{"class":"nivo-lightbox-content"}),s=t('<a href="#" class="nivo-lightbox-nav nivo-lightbox-prev">Previous</a><a href="#" class="nivo-lightbox-nav nivo-lightbox-next">Next</a>'),n=t('<a href="#" class="modal-close" data-behavior="modal-close" title="Close" style="font-size:65px;"></a>'),o=t("<div>",{"class":"nivo-lightbox-title-wrap"}),r=0;r&&i.addClass("nivo-lightbox-ie"),e.append(a),e.append(o),i.append(e),i.append(s),i.append(n),t("body").append(i);var h=this;return h.options.clickOverlayToClose&&i.on("click",function(i){(i.target===this||t(i.target).hasClass("nivo-lightbox-content")||t(i.target).hasClass("nivo-lightbox-image"))&&h.destructLightbox()}),n.on("click",function(t){t.preventDefault(),h.destructLightbox()}),i},destructLightbox:function(){var i=this;this.options.beforeHideLightbox.call(this),t(".nivo-lightbox-overlay").removeClass("nivo-lightbox-open"),t(".nivo-lightbox-nav").hide(),t("body").removeClass("nivo-lightbox-body-effect-"+i.options.effect);var e=0;e&&(t(".nivo-lightbox-overlay iframe").attr("src"," "),t(".nivo-lightbox-overlay iframe").remove()),t(".nivo-lightbox-prev").off("click"),t(".nivo-lightbox-next").off("click"),t(".nivo-lightbox-content").empty(),this.options.afterHideLightbox.call(this)},isHidpi:function(){var t="(-webkit-min-device-pixel-ratio: 1.5),                              (min--moz-device-pixel-ratio: 1.5),                              (-o-min-device-pixel-ratio: 3/2),                              (min-resolution: 1.5dppx)";return i.devicePixelRatio>1?!0:!(!i.matchMedia||!i.matchMedia(t).matches)}},t.fn[n]=function(i){return this.each(function(){t.data(this,n)||t.data(this,n,new s(this,i))})}}(jQuery,window,document),$(window).load(function(){$("#status").fadeOut(),$("#preloader").delay(350).fadeOut("slow"),$("body").delay(350).css({overflow:"visible"})}),$("a.gallery").nivoLightbox({effect:"fade",theme:"default",keyboardNav:!0,clickOverlayToClose:!0,onInit:function(){},beforeShowLightbox:function(){},afterShowLightbox:function(t){},beforeHideLightbox:function(){},afterHideLightbox:function(){},onPrev:function(t){},onNext:function(t){},errorMessage:"The requested content cannot be loaded. Please try again later."}),app.controller("rooms_detail",["$scope","$http","$filter",function(t,i,e){function a(e,a,s){var n=t.room_id;$(".js-subtotal-container").show(),i.post("price_calculation",{checkin:a,checkout:e,guest_count:s,room_id:n}).then(function(t){"Not available"==t.data.status?($(".js-subtotal-container").hide(),$("#book_it_disabled").show(),$(".js-book-it-btn-container").hide()):($(".js-subtotal-container").show(),$("#book_it_disabled").hide(),$(".js-book-it-btn-container").show()),$(".js-book-it-status").removeClass("loading"),$("#total_night_price").text(t.data.total_night_price),$("#service_fee").text(t.data.service_fee),$("#total").text(t.data.total),$("#total_night_count").text(t.data.total_nights),$("#rooms_price_amount").text(t.data.rooms_price),$("#rooms_price_amount_1").text(t.data.rooms_price),t.data.additional_guest?($(".additional_price").show(),$("#additional_guest").text(t.data.additional_guest)):$(".additional_price").hide(),t.data.security_fee?($(".security_price").show(),$("#security_fee").text(t.data.security_fee)):$(".security_price").hide(),t.data.cleaning_fee?($(".cleaning_price").show(),$("#cleaning_fee").text(t.data.cleaning_fee)):$(".cleaning_price").hide()})}function s(t,e,a,s){i.post(APP_URL+"/rooms/price_calculation",{checkin:e,checkout:t,guest_count:a,room_id:s}).then(function(t){"Not available"==t.data.status?($(".contacted-before").removeClass("hide"),$(".contacted-before").removeClass("error-block")):($(".contacted-before").addClass("hide"),$(".contacted-before").addClass("error-block"))})}$(function(){$(".slider1").bxSlider({slideWidth:335,minSlides:1,maxSlides:3,slideMargin:1,nextSelector:"#slider-next",prevSelector:"#slider-prev"})}),$(document).ready(function(){$(".bx-prev").addClass("icon icon-chevron-left icon-gray icon-size-2 "),$(".bx-prev").text(""),$(".bx-next").addClass("icon icon-chevron-right icon-gray icon-size-2 "),$(".bx-next").text("")}),$(".expandable-trigger-more").click(function(){$(".all_description").addClass("expanded")}),$(".rooms_amenities_after").hide(),$(".amenities_trigger").click(function(){$(".rooms_amenities_before").hide(),$(".rooms_amenities_after").show()}),setTimeout(function(){var e=t.room_id;i.post("rooms_calendar",{data:e}).then(function(t){$("#room_blocked_dates").val(t.data.not_avilable),$("#calendar_available_price").val(t.data.changed_price),$("#room_available_price").val(t.data.price);var i=$("#room_blocked_dates").val(),e=$("#room_available_price").val(),s=($("#calendar_available_price").val(),t.data.changed_price),n=t.data.currency_symbol;if($("#list_checkin").datepicker({minDate:0,dateFormat:"dd-mm-yy",beforeShowDay:function(t){var a=jQuery.datepicker.formatDate("yy-mm-dd",t),o=new Date;return o.setDate(o.getDate()-1),-1==i.indexOf(a)?"undefined"==typeof s[a]?(s[a]=e,[-1==i.indexOf(a),"highlight",n+s[a]]):t>o?[-1==i.indexOf(a),"highlight",n+s[a]]:[-1==i.indexOf(a)]:[-1==i.indexOf(a)]},onSelect:function(t){var i=$("#list_checkin").datepicker("getDate");i.setDate(i.getDate()+1),$("#list_checkout").datepicker("setDate",i),$("#list_checkout").datepicker("option","minDate",i),setTimeout(function(){$("#list_checkout").datepicker("show")},20);var e=$(this).val(),i=$("#list_checkout").val(),s=$("#number_of_guests").val();$(".js-book-it-status").addClass("loading"),a(i,e,s),$(".tooltip").hide(),t!=new Date&&$(".ui-datepicker-today").removeClass("ui-datepicker-today")}}),$(document).on("mouseenter",".ui-datepicker-calendar .ui-state-hover",function(t){$(".highlight").tooltip({container:"body"})}),jQuery("#list_checkout").datepicker({minDate:1,dateFormat:"dd-mm-yy",beforeShowDay:function(t){var a=jQuery.datepicker.formatDate("yy-mm-dd",t);return-1==i.indexOf(a)?("undefined"==typeof s[a]&&(s[a]=e),[-1==i.indexOf(a),"highlight",n+s[a]]):[-1==i.indexOf(a)]},onSelect:function(){$(".tooltip").hide()},onClose:function(){var t=$("#list_checkin").datepicker("getDate"),i=$("#list_checkout").datepicker("getDate");if(t>=i){var e=$("#list_checkout").datepicker("option","minDate");$("#list_checkout").datepicker("setDate",e)}var i=$(this).val(),t=$("#list_checkin").val(),s=$("#number_of_guests").val();""!=t&&($(".js-book-it-status").addClass("loading"),a(i,t,s))}}),""!=$("#url_checkin").val()&&""!=$("#url_checkout").val()){$("#list_checkin").datepicker("setDate",new Date($("#url_checkin").val())),$("#list_checkout").datepicker("setDate",new Date($("#url_checkout").val())),$("#number_of_guests").val($("#url_guests").val()),$("#message_checkin").datepicker("setDate",new Date($("#url_checkin").val())),$("#message_checkout").datepicker("setDate",new Date($("#url_checkout").val())),$("#message_guests").val($("#url_guests").val());var o=$("#list_checkin").val(),r=$("#list_checkout").val(),h=$("#number_of_guests").val();a(r,o,h)}})},10),$("#number_of_guests").change(function(){var t=$(this).val(),i=$("#list_checkin").val(),e=$("#list_checkout").val();""!=i&&""!=e&&($(".js-book-it-status").addClass("loading"),a(e,i,t))}),$(".additional_price").hide(),$(".security_price").hide(),$(".cleaning_price").hide(),$(".js-subtotal-container").hide(),$("#book_it_disabled").hide(),$("#contact-host-link, #host-profile-contact-btn").click(function(){$(".contact-modal").removeClass("hide")}),setTimeout(function(){
var e=t.room_id,a=e;i.post(APP_URL+"/rooms/rooms_calendar",{data:e}).then(function(t){var i=(t.data.changed_price,t.data.not_avilable);$("#message_checkin").datepicker({minDate:0,dateFormat:"dd-mm-yy",setDate:new Date($("#message_checkin").val()),beforeShowDay:function(t){var t=jQuery.datepicker.formatDate("yy-mm-dd",t);return-1!=$.inArray(t,i)?[!1]:[!0]},onSelect:function(t){var i=$("#message_checkin").datepicker("getDate");i.setDate(i.getDate()+1),$("#message_checkout").datepicker("setDate",i),$("#message_checkout").datepicker("option","minDate",i),setTimeout(function(){$("#message_checkout").datepicker("show")},20);var e=$(this).val(),i=$("#message_checkout").val(),n=$("#message_guests").val();s(i,e,n,a),t!=new Date&&$(".ui-datepicker-today").removeClass("ui-datepicker-today")}}),jQuery("#message_checkout").datepicker({minDate:1,dateFormat:"dd-mm-yy",setDate:new Date($("#message_checkout").val()),beforeShowDay:function(t){var t=jQuery.datepicker.formatDate("yy-mm-dd",t);return-1!=$.inArray(t,i)?[!1]:[!0]},onClose:function(){var t=$("#message_checkin").datepicker("getDate"),i=$("#message_checkout").datepicker("getDate");if(t>=i){var e=$("#message_checkout").datepicker("option","minDate");$("#message_checkout").datepicker("setDate",e)}var i=$(this).val(),t=$("#message_checkin").val(),n=$("#message_guests").val();""!=t&&s(i,t,n,a)}})})},10),$(document).on("click",".rich-toggle-unchecked,.rich-toggle-checked",function(){return"object"==typeof USER_ID?(window.location.href=APP_URL+"/login",!1):($(".wl-modal__modal").removeClass("hide"),$(".wl-modal__col:nth-child(2)").addClass("hide"),$(".row-margin-zero").append('<div id="wish-list-signup-container" style="overflow-y:auto;" class="col-lg-5 wl-modal__col-collapsible"> <div class="loading wl-modal__col"> </div> </div>'),void i.get(APP_URL+"/wishlist_list?id="+t.room_id,{}).then(function(i){$("#wish-list-signup-container").remove(),$(".wl-modal__col:nth-child(2)").removeClass("hide"),t.wishlist_list=i.data}))}),t.wishlist_row_select=function(e){i.post(APP_URL+"/save_wishlist",{data:t.room_id,wishlist_id:t.wishlist_list[e].id,saved_id:t.wishlist_list[e].saved_id}).then(function(i){"null"==i.data?t.wishlist_list[e].saved_id=null:t.wishlist_list[e].saved_id=i.data}),$("#wishlist_row_"+e).hasClass("text-dark-gray")?t.wishlist_list[e].saved_id=null:t.wishlist_list[e].saved_id=1},$(document).on("submit",".wl-modal-footer__form",function(e){e.preventDefault(),$(".wl-modal__col:nth-child(2)").addClass("hide"),$(".row-margin-zero").append('<div id="wish-list-signup-container" style="overflow-y:auto;" class="col-lg-5 wl-modal__col-collapsible"> <div class="loading wl-modal__col"> </div> </div>'),i.post(APP_URL+"/wishlist_create",{data:$(".wl-modal-footer__input").val(),id:t.room_id}).then(function(i){$(".wl-modal-footer__form").addClass("hide"),$("#wish-list-signup-container").remove(),$(".wl-modal__col:nth-child(2)").removeClass("hide"),t.wishlist_list=i.data,e.preventDefault()}),e.preventDefault()}),$(".wl-modal__modal-close").click(function(){var i=e("filter")(t.wishlist_list,{saved_id:null});i.length==t.wishlist_list.length?$("#wishlist-button").prop("checked",!1):$("#wishlist-button").prop("checked",!0),$(".wl-modal__modal").addClass("hide")})}]),$("#view-calendar").click(function(){return $("#list_checkin").trigger("select"),!1}),$(".js-book-it-btn-container").click(function(){var t=$("#list_checkin").val(),i=$("#list_checkout").val();return""==t&&""==i?($("#list_checkin").trigger("select"),!1):void 0}),$(document).ready(function(){var t=$("#pricing").offset().top,i=$("#host-profile").offset().top;$(window).scroll(function(){$(window).scrollTop()>t&&$(window).width()>1e3?($(window).scrollTop()>i?($("#book_it").removeClass("fixed"),$("#book_it").addClass("bottom"),$("#book_it").css("top","1430px")):($("#book_it").css("top","40px"),$("#book_it").removeClass("bottom"),$("#pricing").addClass("fixed"),$("#book_it").addClass("fixed")),$(".subnav").attr("aria-hidden","false")):($("#book_it").css("top","0px"),$("#pricing").removeClass("fixed"),$("#book_it").removeClass("fixed"),$(".subnav").attr("aria-hidden","true"))}),$('[data-behavior="modal-close"]').click(function(){$(".contact-modal").addClass("hide"),$(".contact-modal").attr("aria-hidden","true")})});