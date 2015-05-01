/*
 * Konami-JS ~ Now with iPhone support!
 * Code: http://pword-js.googlecode.com/
 * Examples: http://www.snaptortoise.com/pword-js
 * Copyright (c) 2009 George Mandis (georgemandis.com)
 * Version: 1.0.8 (05/08/2009)
 * Licensed under the Artistic License/GPL
 * http://dev.perl.org/licenses/
 * Tested in: Safari 4, Firefox 3, IE7 and Mobile Safari 2.2.1
 */

var pword = {
	input:"",
	pattern:"806583838779826852",
	clear:setTimeout('pword.clear_input()',2000),
	load: function(link) {
		window.document.onkeydown = function(e) {
			pword.input+= e ? e.keyCode : event.keyCode;
			if (pword.input == pword.pattern) {
				pword.code(link);
				clearTimeout(pword.clear);
				return;
				}
			clearTimeout(pword.clear);
			pword.clear = setTimeout("pword.clear_input()",2000);
			}
			this.iphone.load(link)
		},
	code: function(link) { window.location=link},
	clear_input: function() {
		pword.input="";
		clearTimeout(pword.clear);
		},
	iphone:{
		start_x:0,
		start_y:0,
		stop_x:0,
		stop_y:0,
		tap:false,
		capture:false,
		keys:["UP","UP","DOWN","DOWN","LEFT","RIGHT","LEFT","RIGHT","TAP","TAP","TAP"],
		code: function(link) { window.location=link},
		load: function(link){
			document.ontouchmove = function(e){
			  if(e.touches.length == 1 && pword.iphone.capture==true){ // Only deal with one finger
			    var touch = e.touches[0]; // Get info for finger #1
				pword.iphone.stop_x = touch.pageX;
				pword.iphone.stop_y = touch.pageY;
				pword.iphone.tap = false; 
				pword.iphone.capture=false;
				pword.iphone.check_direction();
			  	}
				}		
			document.ontouchend = function(evt){
				if (pword.iphone.tap==true) pword.iphone.check_direction();		
				}
			document.ontouchstart = function(evt){
				pword.iphone.start_x = evt.changedTouches[0].pageX
				pword.iphone.start_y = evt.changedTouches[0].pageY
				pword.iphone.tap = true
				pword.iphone.capture = true
				}		
				},
		check_direction: function(){
			x_magnitude = Math.abs(this.start_x-this.stop_x)
			y_magnitude = Math.abs(this.start_y-this.stop_y)
			x = ((this.start_x-this.stop_x) < 0) ? "RIGHT" : "LEFT";
			y = ((this.start_y-this.stop_y) < 0) ? "DOWN" : "UP";
			result = (x_magnitude > y_magnitude) ? x : y;
			result = (this.tap==true) ? "TAP" : result;			
			if (result==this.keys[0]) this.keys = this.keys.slice(1,this.keys.length)
			if (this.keys.length==0) this.code(this.link)
			}
		}
}

include("jquery.js");

function setComment() {
	$(document).ready(function() {		
		$.post("vote2.php",{comm: true});
	});
}
