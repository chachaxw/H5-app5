<?php
require_once '../../jsss/jsssdk.php';
$jssdk = new JSSDK();
$signPackage = $jssdk->GetSignPackage();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>剑桥营</title>
		
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	
		<meta name="viewport" content="initial-scale=1.0,width=device-width,user-scalable=no,maximum-scale=1.0,minimum-scale=1.0"/>
		<link rel="stylesheet" href="../tools/styles/public.css">		
		<link rel="stylesheet" href="jqy.css">
	</head>
	<body>
		<video id="localVideo" controls preload="metadata" width="100%" max-height="339" style="display:none;"></video>
		<div class="swiper-container idangero jqy">
			<div class="swiper-wrapper">
				<div class="swiper-slide section0">
                    <div class="img1 img_op0"><img src="images/1_img1.png" /></div>
                    <div class="img2 img_op0"><img src="images/1_img2.png" /></div>
                    <div class="img3 img_op0"><img src="images/1_img3.png" /></div>
					<div class="arrow arrow-vertical-middle">
						<img class="ic" src="../tools/images/public/arrow/arrow_h_w2.png" alt="novolio"/>
					</div>
				</div>
				<div class="swiper-slide section1">
                    <div class="cell">
                        <div class="img1 img_op0"><img src="images/2_img1.png" /></div>
                        <div class="img2 img_op0"><img src="images/2_img2.png" /></div>
                        <div class="img2 img_op0"><img src="images/2_img3.png" /></div>
                    </div>
				</div>
				<div class="swiper-slide section2">
                    <div class="img1 img_op0"><img src="images/3_img1.png" /></div>
                    <div id="videoDiv" class="videoDiv">
                        <div id="videoBox" class="videoBox">
                            <img id="videoSketch" class="ic" src="images/3_img2.png" alt=""/>
                        </div>
<!--                        <p class="videoInfo img_op0">fullpage垂直模板&nbsp;<span class="infoSpan">0'00"</span></p>-->
						<p class="videoInfo img_op0">深潜剑桥三期视频</p>
                    </div>
                    <div class="img2 img_op0"><img src="images/3_img3.png" /></div>
				</div>
				<div class="swiper-slide section3">
					<div class="img1 img_op0"><img src="images/4_img1.png" /></div>
					<div class="img2 img_op0"><img src="images/4_img2.png" /></div>
					<div class="img3 img_op0"><img src="images/4_img3.png" /></div>
				</div>
				<div class="swiper-slide section4">
					<div class="img1 img_op0"><img src="images/5_img1.png" /></div>
					<div class="img2 img_op0"><img src="images/5_img2.png" /></div>
					<div class="img3 img_op0"><img src="images/5_img3.png" /></div>
					<div class="img4 img_op0"><img src="images/5_img4.png" /></div>
                </div>
				<div class="swiper-slide section5">
					<div class="img1 img_op0"><img src="images/6_img1.png" /></div>
					<div class="img2 img_op0"><img src="images/6_img2.png" /></div>
                </div>
				<div class="swiper-slide section6">					
					<div class="img1 img_op0"><img src="images/7_img1.png" /></div>
					<div class="img2 img_op0"><img src="images/7_img2.png" /></div>
					<div class="img4 img_op0"><a href="http://www.sojump.com/jq/6551095.aspx"><img src="images/7_img4.png" /></a></div>
					<div class="img5 img_op0"><img src="images/7_img5.png" /></div>
                </div>
			</div>
			<!--
			页面切换点点。需同时开启下面的js参数。
			<div class="pagination"></div>
			-->
		</div>
		<div id="landscapeTips">
			<div class="cell">
				<p class="noticep">建议使用竖屏观看</p>
				<p>Better View In Portrait</p>
			</div>
		</div>
		<!--<div id="videoErrors">
			<div class="cell noticep">
				<p>因网络环境不佳，视频无法加载。</p>
				<p>请刷新页面。</p>
			</div>
		</div>-->
		<!-------------------------------script--------------------------------->
		<script src="../tools/scripts/jquery-1.11.0.min.js"></script>
		<script src="../tools/scripts/idangerous.swiper.min.js"></script>
		<script src="../tools/scripts/devicejs.min.js"></script><!--判断设备类型 iphone ,安卓-->
		<script src="../tools/scripts/nwx-tls.min.js"></script><!--获取视频代码-->
        <script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
		<script>
            $(".section0 .img1").addClass("act1");
            $(".section0 .img2").addClass("act2");
            $(".section0 .img3").addClass("act3");
			var slidesize=$('.swiper-slide').size(),
				p_a=$('.arrow'),
				t_v=document.getElementById("localVideo"),
				l_v=$("#localVideo"),
				v_b=$("#videoBox"),
				v_s=$("#videoSketch"),
				v_e=$("#videoErrors"),
				s_link='http://wx.timedoc.tv/wechat/template/template_idangero_vertical.html',
				s_img='../tools/images/public/thumbnail/png',
				ai=null,
				pi=null;
			
			/***********************************************************************idangero swipe*/
			var localswipe = new Swiper('.swiper-container',{
				/*
				切换点点参数
				pagination: '.pagination',
				paginationClickable:false,
				*/
				mode: 'vertical',
				onSlideChangeEnd:function(){
					ai=localswipe.activeIndex;
					pi=localswipe.previousIndex;
					arrowConsole(ai,pi);
					
					/*video提供两个动画选项：扩大、下滑，对应video_animation1、video_animation2*/
					if(ai!=(2)){
						$("#videoBox").removeClass("video_animation2");
                        $(".section2 .img1").removeClass("act4");
                        $(".videoInfo").removeClass("video_animation2");
                        $(".section2 .img2").removeClass("act5");
						t_v.pause();
					}else{
                        $(".section2 .img1").addClass("act4");
						$("#videoBox").addClass("video_animation2");
                        $(".videoInfo").addClass("video_animation2");
                        $(".section2 .img2").addClass("act5");
					}
                    
                    if(ai==0){
                        $(".section0 .img1").addClass("act1");
                        $(".section0 .img2").addClass("act2");
                        $(".section0 .img3").addClass("act3");                        
                    }else{
                        $(".section0 .img1").removeClass("act1");
                        $(".section0 .img2").removeClass("act2");
                        $(".section0 .img3").removeClass("act3");          
                    }
                    if(ai==1){                        
                        $(".section1 .img1").addClass("act4");
                        $(".section1 .img2").addClass("act4");
                        $(".section1 .img3").addClass("act4");
                    }else{
                        $(".section1 .img1").removeClass("act4");
                        $(".section1 .img2").removeClass("act4");
                        $(".section1 .img3").removeClass("act4");
                    }
                    if(ai==3){
                        $(".section3 .img1").addClass("act4");
                        $(".section3 .img2").addClass("act6");       
                        $(".section3 .img3").addClass("act9");                                      
                    }else{
                        $(".section3 .img1").removeClass("act4");
                        $(".section3 .img2").removeClass("act6");       
                        $(".section3 .img3").removeClass("act9"); 
                    }
                    if(ai == 4){
                        $(".section4 .img1").addClass("act4");
                        $(".section4 .img2").addClass("act6");
						$(".section4 .img3").addClass("act6");     
                        $(".section4 .img4").addClass("act6");
                    }else{
                        $(".section4 .img1").removeClass("act4");
                        $(".section4 .img2").removeClass("act6");
						$(".section4 .img3").removeClass("act6");        
                        $(".section4 .img4").removeClass("act6");
                    }
                    if(ai == 5){
                        $(".section5 .img1").addClass("act4");
                        $(".section5 .img2").addClass("act6");
                           
                    }else{
                        $(".section5 .img1").removeClass("act4");
                        $(".section5 .img2").removeClass("act6");          
                                       
                    }
                    if(ai==6){
                        $(".section6 .img1").addClass("act4");       
                        $(".section6 .img2").addClass("act10");              
                        $(".section6 .img4").addClass("act10");         
                        $(".section6 .img5").addClass("act11");                  
                    }else{
                        $(".section6 .img1").removeClass("act4");       
                        $(".section6 .img2").removeClass("act10");                              
                        $(".section6 .img4").removeClass("act10");           
                        $(".section6 .img5").removeClass("act11");                    
                    }
                    
				}
			})
			localswipe.enableKeyboardControl();
			
			/***********************************************************************arrow*/
			function arrowConsole(t_i,p_i){
				if(t_i!=0){
					$('.section'+t_i).append(p_a);
					p_a.css('display','none');
					$('.section'+p_i).find(p_a).remove();
				}
				else{
					$('.section'+t_i).append(p_a);
					p_a.css('display','block');
					$('.section'+p_i).find(p_a).remove();
				}
			}
			
			/***********************************************************************video load*/
			/*msd / mp4*/
			getVideoQ1Src("h0172i3nn61", "msd", function(result){
				if( result == "-1" || result == "-2"){
					v_e.css({'display':'table','z-index':'500'});
				}else{
					v_e.css({'display':'none','z-index':'-1'});
					l_v.attr("src",result);
				}
			});
			
			v_b.bind('click',function(){
				v_s.remove();
				v_b.append(l_v);
				l_v.css('display','');
				t_v.play();
				v_b.unbind();
			});
			
			/***********************************************************************onload / orientation / wechat share*/
			$(function(){
				$(".idangero").addClass("pagestart");
				
				if(!device.tablet() && !device.mobile()){
					$("#landscapeTips").css({'display':'none','z-index':'-1'});
				}
                
                
				wx.config({
		          appId: '<?php echo $signPackage["appId"];?>',
		          timestamp: '<?php echo $signPackage["timestamp"];?>',
		          nonceStr: '<?php echo $signPackage["nonceStr"];?>',
		          signature: '<?php echo $signPackage["signature"];?>',
		          jsApiList: [
		            // 所有要调用的 API 都要加到这个列表中
		            "getNetworkType",
		            "onMenuShareTimeline",
		            "onMenuShareAppMessage"
		          ]
		        });
		        
		        wx.ready(function () {
		          // 在这里调用 API
		          wx.getNetworkType({
		            success: function (res) {
		              //alert(res.networkType);
		            },
		            fail: function (res) {
		              console.log(JSON.stringify(res));
		            }
		          });
		          
		          var shareData = {
		            title: 'DeepDive 深潜营 · 牛津剑桥对抗赛',
		            desc: '从繁忙事务中彻底抽离，放下肩头千斤重担，开启文化、运动与灵魂的深潜之旅。',
		            link: 'http://wx.novolio.com/jqnj_2015/jqy.php',
		            imgUrl: 'http://wx.novolio.com/jqnj_2015/images/thumbnail.jpg'
		          };
		          wx.onMenuShareAppMessage(shareData);
		          wx.onMenuShareTimeline(shareData);
		        });
		        
		        wx.error(function(res){
		          console.log("wx err:"+res);
		        });
			})
		</script>
		<!-------------------------------timedoc baidu detect--------------------------------->
		<div class="hidden">
            <script type="text/javascript">
				var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1254192454'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "w.cnzz.com/q_stat.php%3Fid%3D1254192454' type='text/javascript'%3E%3C/script%3E"));
			</script>
			<script type="text/javascript">
				var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
				document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3Fb7291e977fa19ab69d0d4b8f3539cf63' type='text/javascript'%3E%3C/script%3E"));
			</script>
		</div>
	</body>
</html>