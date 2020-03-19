<div id="query"><div id="wrapper-query"><div id="query-header-container"><div id="query-header"><div id="header-grid"><h2>ask things</h2></div><div id="header-brief-grid"><p>Like our project or have a query?<br>We love to gossip about things. Call us or meet us. We offer tea, snacks and biscuits! </p></div></div></div><div id="social-container"><div id="wrap-social"><section id="social-header"><h2>We Are social</h2></section><section id="social-buttons"><ul><li><img src="images/google.png"></li><li><img src="images/facebook.png" class="left-fix"></li><li><img src="images/twitter.png" class="left-fix"></li><li><img src="images/instagram.png" class="left-fix"></li><li><img src="images/linkedin.png" class="left-fix"></li></ul></section></div></div><hr class="style2"/><div id="header-query-main-container"><h2 class="hello">Say Hello ..</h2> </div><div id="align-query-main-container"><div id="query-main-container"><div id="query-left-part"><form name="message" id="message-form" method="post" action="javascript:void(0)"><div id="form-wrapper"><section id="set-up"><div id="grid-field"><input type="text" name="name" id="name" placeholder="Your Name" autocomplete="off" tabindex="1" class="input-text"><input type="email" name="email" style="background:#fff;" id="myemail" placeholder="Your e-mail address" autocomplete="off" tabindex="2" class="input-text"><input type="tel" name="telephone" id="telephone" placeholder="Your contact (optional)" autocomplete="off" tabindex="3" class="input-text"><input type="text" name="subject" id="subject" placeholder="Purpose (optional)" autocomplete="off" tabindex="4" class="input-text"></div><div id="grid-field"><div id="set-up-more" class="cfix"><section id="target"><h2 style="margin-top:0px;">Send To:</h2> <select id="sendto"><option value="hide">-- Choose --</option><option value="fun">Adventure Planning</option><option value="techdeptt">Tech Department</option><option value="ceo">CEO</option><option value="feedback">Staff</option><option value="videodeptt">Videography Department</option> <option value="query">General Query</option><option value="complaints">Complaints & Feedback</option></select></section><script type="text/javascript">/*Reference: http://codepen.io/wallaceerick/pen/ctsCz?editors=1100*/$("select").each(function(){var t=$(this),e=$(this).children("option").length;t.addClass("select-hidden"),t.wrap('<div class="select"></div>'),t.after('<div class="select-styled"></div>');var i=t.next("div.select-styled");i.text(t.children("option").eq(0).text());for(var l=$("<ul/>",{"class":"select-options"}).insertAfter(i),s=0;e>s;s++)$("<li/>",{text:t.children("option").eq(s).text(),rel:t.children("option").eq(s).val()}).appendTo(l);var c=l.children("li");i.click(function(t){t.stopPropagation(),$(this).toggleClass("active").next("ul.select-options").toggle()}),c.click(function(e){e.stopPropagation(),i.text($(this).text()).removeClass("active"),t.val($(this).attr("rel")),l.hide()}),$(document).click(function(){i.removeClass("active"),l.hide()})});</script> <section id="set-up-extra"><h2>Priority:</h2> <div id="custom-radio" class="low"><input type="radio" id="radio1" name="radio" value="1" class="radio-sel"/><label for="radio1"><span></span>Low</label></div><div id="custom-radio" class="med"><input type="radio" id="radio2" class="radio-sel" name="radio" value="2"/><label for="radio2"><span></span>Medium</label></div><div id="custom-radio" class="high"><input type="radio" id="radio3" class="radio-sel" name="radio"/><label for="radio3" value="3"><span></span>High</label></div></section></div></div><div id="grid-field" class="m-bird"><img id="flyingbird" src="images/m-bird.png"></div></section><section id="m-box"><textarea name="words" id="words" placeholder="Write something cool .. " tabindex="5" class="input-text-message"></textarea></section></div><section id="buttons"><input type="reset" name="reset" id="resetbtn" class="resetbtn" value="Reset"><input type="button" name="submit" id="submitbtn" class="submitbtn" tabindex="7" value="Submit!"><div style="clear:both;"></div></section> </form></div><div id="query-right-part"><div id="query-map"><iframe id="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2621.4505271072!2d74.83619506383558!3d34.12534083973894!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38e185b026966941%3A0x1d82ba47bd1fa1e1!2sNational+Institute+of+Technology!5e0!3m2!1sen!2sin!4v1453568168006" frameborder="0" allowfullscreen></iframe></div><div id="query-more"> <hr class="style1" id="pad-fix-hr"><h2>Get in touch direct?</h2><p id="contact-email">kumararvind@gmail.com</p><p id="contact-email">alawadhi.anmol@gmail.com</p><p id="contact-tel">+91 9086993679</p><p id="contact-social"></p></div></div><div style="clear:both;"></div></div></div></div></div>
<script language="javascript">
$var1=0;
$(".submitbtn").click(function(){
 
if($var1==0){
$(".submitbtn").val('Sending..');
 
var b=$("#name").val();		
var c=$("#myemail").val();	
var d=$("#telephone").val();	
var e=$("#subject").val();			
var f=$("#words").val();	 
var r=$("input[type='radio'][name='radio']:checked").val(); 
var s=$("#sendto > option:selected").val(); 
var g="b="+b+"&c="+c+"&d="+d+"&e="+e+"&f="+f+"&r="+r+"&s="+s;
$.ajax({type:"POST",url:"html/sendto.php",data:g,success:function(n){  
if(n==1){

$(".submitbtn").val('Sent!'); 
        $var1=1;
document.getElementById("flyingbird").style.transform="rotatey(180deg)";
document.getElementById("flyingbird").style.transitionDuration="0.5s";
var bc2= function($b,sp){
$b.animate({"top":"-80px"},sp)};
$(function(){
	bc2($("#flyingbird"),1000);
}); 
setTimeout(function(){ 
document.getElementById("flyingbird").style.display="none"; 
},1200);
$('#words').val("Sent.");
} 
}})  
}});
</script>