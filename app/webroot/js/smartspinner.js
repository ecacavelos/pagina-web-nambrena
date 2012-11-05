(function($) {
    $.fn.extend({
        spinit: function(options) {
            var settings = $.extend({ min: 0, max: 100, initValue: 0, callback: null, stepInc: 1, pageInc: 10, width: 50, height: 15, btnWidth: 10, mask: '' }, options);
            return this.each(function() {
                var UP = 38;
                var DOWN = 40;
                var PAGEUP = 33;
                var PAGEDOWN = 34;
                var mouseCaptured = false;
                var mouseIn = false;
                var interval;
                var direction = 'none';
                var isPgeInc = false;
                var value = Math.max(settings.initValue, settings.min);
                var el = $(this).val(value).css('width', (settings.width) + 'px').css('height', settings.height + 'px').addClass('smartspinner');
                raiseCallback(value);
                if (settings.mask != '') el.val(settings.mask);
                $.fn.reset = function(val) {
                    if (isNaN(val)) val = 0;
                    value = Math.max(val, settings.min);
                    $(this).val(value);
                    raiseCallback(value);
                };
                function setDirection(dir) {
                    direction = dir;
                    isPgeInc = false;
                    switch (dir) {
                        case 'up':
                            setClass('up');
                            break;
                        case 'down':
                            setClass('down');
                            break;
                        case 'pup':
                            isPgeInc = true;
                            setClass('up');
                            break;
                        case 'pdown':
                            isPgeInc = true;
                            setClass('down');
                            break;
                        case 'none':
                            setClass('');
                            break;
                    }
                }
                el.focusin(function() {
                    el.val(value);
                });
                el.click(function(e) {
                    mouseCaptured = true;
                    isPgeInc = false;
                    clearInterval(interval);
                    onValueChange();
                    // David
                    //el.val(value.toFixed(1));
                    el.select();
                });
                el.mouseenter(function(e) {
                    el.val(value);
                    /* if (el.val().toString().search('.' != -1)){
                    	el.val(value.toFixed(1));
                    }
                    else {
						el.val(value);
                    */                    
                });
                el.mousemove(function(e) {
                    if (e.pageX > (el.offset().left + settings.width) - settings.btnWidth - 4) {
                        if (e.pageY < el.offset().top + settings.height / 2)
                            setDirection('up');
                        else
                            setDirection('down');
                    }
                    else
                        setDirection('none');
                });
                el.mousedown(function(e) {
                    isPgeInc = false;
                    clearInterval(interval);
                    interval = setInterval(onValueChange, 100);
                });
                el.mouseup(function(e) {
                    mouseCaptured = false;
                    isPgeInc = false;
                    clearInterval(interval);
                });
                el.mouseleave(function(e) {
                    setDirection('none');
                    
                    if(el.val() == ""){                    	
                    	value = 1;                    	
                    }
                    el.val(value);
			
                    if (settings.mask != '') el.val(settings.mask);                    
                });
                el.keydown(function(e) {
                    switch (e.which) {
                        case UP:
                            setDirection('up');
                            onValueChange();
                            break; // Arrow Up
                        case DOWN:
                            setDirection('down');
                            onValueChange();
                            break; // Arrow Down
                        case PAGEUP:
                            setDirection('pup');
                            onValueChange();
                            break; // Page Up
                        case PAGEDOWN:
                            setDirection('pdown');
                            onValueChange();
                            break; // Page Down
                        case 46:
							if (el.val().toString().indexOf('.',0) == -1) {
								var inputIndex = el.get(0).selectionStart;
		                    	var preTemp = 0;
								switch(inputIndex){
									case 1:
										if (el.val().toString().length == 1){
											preTemp = parseFloat(el.val().toString().charAt(0) + '.');
										}							
										if (el.val().toString().length == 2 || el.val().toString().length == 3){
											preTemp = parseFloat(el.val().toString().charAt(0) + '.' + el.val().toString().charAt(1));
										}
										break;
									case 2:
										if (el.val().toString().length == 2){
											preTemp = parseFloat(el.val() + '.');
										}
										if (el.val().toString().length == 3){
											preTemp = parseFloat(el.val().toString().substr(0,2) + '.' + el.val().toString().charAt(2));
										}
										break;
									default:
										break;	
								}
								//alert(preTemp);
		                    	var temp = preTemp;                        
		                        if (temp >= settings.min && temp <= settings.max) {
		                            value = temp;
		                            raiseCallback(value);
		                        }
		                        else {
		                            e.preventDefault();
		                        }
							}
							else {
								e.preventDefault();
							}                        
                        	break;
                        case 8:
                        	if (window.getSelection() == el.val()){
                        		var temp = "";
								value = "";
								el.val(value);
								raiseCallback(value);
								return false;
                        	}
                        	//e.preventDefault();
                        	//alert("holo");
							var inputIndex = el.get(0).selectionStart;
							var preTemp = 0;                    	
							//alert(inputIndex + " Length: " + el.val().toString().length);
							switch(inputIndex){
								case 0:
									preTemp = parseFloat(el.val());
									break;
								case 1:
									if (el.val().toString().length == 1){
										preTemp = parseFloat(0);
									}
									if (el.val().toString().length == 2){
										preTemp = parseFloat(el.val().toString().charAt(1));
									}
									if (el.val().toString().length == 3){                    				
										preTemp = parseFloat('0.' + el.val().toString().substr(2,el.val().toString().length-2));
									}
									if (el.val().toString().length == 4){                    				
										preTemp = parseFloat(el.val().toString().substr(1,3));
									}                    			
									break;
								case 2:
									if (el.val().toString().length == 2){                    				
										preTemp = parseFloat(el.val().toString().charAt(0));
									}
									if (el.val().toString().length >= 3){                    				
										preTemp = parseFloat(el.val().toString().charAt(0) + el.val().toString().substr(2,el.val().toString().length-2));
									}
									break;
								case 3:
									if (el.val().toString().length == 4){
										preTemp = parseFloat(Math.min(el.val().toString().substr(0,2) + el.val().toString().substr(3,el.val().toString().length-2), settings.max));
									}
									else if (el.val().toString().length == 3){
										preTemp = parseFloat(el.val().toString().substr(0,2));
									}
									else {
										preTemp = parseFloat(el.val().toString().charAt(0));
									}
									break;
								case 4:
									preTemp = parseFloat(el.val().toString().substr(0,3));
								default:
									preTemp = parseFloat(el.val().toString().charAt(0) + el.val().toString().charAt(1) + el.val().toString().charAt(2));
									break;
							}                    	                    	
							//alert(el.val());
							//alert(preTemp);
							
							//if(el.val() != ""){                    		
								var temp = preTemp;								
							/*} else {
								empty_flag = true;
								alert("shake");
								var temp = "";
								value = "";
								el.val(value);
								raiseCallback(value);
								return false;
							}*/
							
							if (temp >= settings.min && temp <= settings.max) {
								value = temp;
								raiseCallback(value);
							}
							else {
								e.preventDefault();
							}                        
                        	break;
                        default:
                            setDirection('none');
                            break;
                    }
                });
                el.keyup(function(e) {
                    setDirection('none');
                });
                el.keypress(function(e) {
                    if (el.val() == settings.mask) el.val(value);
                    var sText = getSelectedText();
                    if (sText != '') {
                        sText = el.val().replace(sText, '');
                        el.val(sText);
                    }
                    if (e.which == 8) {
                    	if (el.val() == "") {
	                		var temp = "";
							value = "";
							el.val(value);
							raiseCallback(value);
							return false;
						}                    	
                    }
                    if (e.which >= 48 && e.which <= 57) {
                    	//alert(el.val() + e.which);
                    	var inputIndex = el.get(0).selectionStart;
                    	var preTemp = 0; 
                		//alert("false");
                    	switch(inputIndex){
                    		case 0:
                    			preTemp = parseFloat((e.which - 48) + el.val());
                    			break;
                    		case 1:
                    			if (el.val().toString().length < 3){
                    				preTemp = parseFloat(el.val() + (e.which - 48));
                    			}
                    			if (el.val().toString().length == 3){
                    				preTemp = parseFloat(el.val().toString().charAt(0) + (e.which - 48) + el.val().toString().substr(1,el.val().toString().length-1));
                    			}
                    			break;
                    		case 2:
                    			if (el.val().toString().length < 3){
                    				preTemp = parseFloat(el.val() + (e.which - 48));
                    			}
                    			break;
							case 3:
                    			if (el.val().toString().length == 3){
                    				preTemp = parseFloat(el.val() + (e.which - 48));
                    			}
                    			break;                    			
							default:
								break;
                    	}                    	
                    	//alert(preTemp);
                    	var temp = preTemp;
                        //var temp = parseFloat(el.val() + (e.which - 48));
                        if (temp >= settings.min && temp <= settings.max) {
                            value = temp;
                            raiseCallback(value);
                        }
                        else {
                            e.preventDefault();
                        }
                    } else {
                    	// filtramos las letras minusculas, las mayusculas, la coma y el signo menos
                    	if ((e.which >= 97) && (e.which <= 122) || (e.which >= 65) && (e.which <= 90) || (e.which == 44) || (e.which == 45)){                    	
                    		return false;
                    	}
                    }
                });
                el.blur(function() {
                    if (settings.mask == '') {
                        if (el.val() == '')
                            el.val(settings.min);
                    }
                    else {
                        el.val(settings.mask);
                    }
                });
                el.bind("mousewheel", function(e) {
                    if (e.wheelDelta >= 120) {
                        setDirection('down');
                        onValueChange();
                    }
                    else if (e.wheelDelta <= -120) {
                        setDirection('up');
                        onValueChange();
                    }

                    e.preventDefault();
                });
                if (this.addEventListener) {
                    this.addEventListener('DOMMouseScroll', function(e) {
                        if (e.detail > 0) {
                            setDirection('down');
                            onValueChange();
                        }
                        else if (e.detail < 0) {
                            setDirection('up');
                            onValueChange();
                        }
                        e.preventDefault();
                    }, false);
                }

                function raiseCallback(val) {
                    if (settings.callback != null) settings.callback(val);
                }
                function getSelectedText() {

                    var startPos = el.get(0).selectionStart;
                    var endPos = el.get(0).selectionEnd;
                    var doc = document.selection;

                    if (doc && doc.createRange().text.length != 0) {
                        return doc.createRange().text;
                    } else if (!doc && el.val().substring(startPos, endPos).length != 0) {
                        return el.val().substring(startPos, endPos);
                    }
                    return '';
                }
                function setValue(a, b) {
                    if (a >= settings.min && a <= settings.max) {
                        value = b;
                    } el.val(value.toFixed(1));
                }
                function onValueChange() {
                    if (direction == 'up') {
                        value += settings.stepInc;
                        if (value > settings.max) value = settings.max;
                        setValue(parseFloat(el.val()), value);
                    }
                    if (direction == 'down') {
                        value -= settings.stepInc;
                        if (value < settings.min) value = settings.min;
                        setValue(parseFloat(el.val()), value);
                    }
                    if (direction == 'pup') {
                        value += settings.pageInc;
                        if (value > settings.max) value = settings.max;
                        setValue(parseFloat(el.val()), value);
                    }
                    if (direction == 'pdown') {
                        value -= settings.pageInc;
                        if (value < settings.min) value = settings.min;
                        setValue(parseFloat(el.val()), value);
                    }
                    raiseCallback(value);
                }
                function setClass(name) {
                    el.removeClass('up').removeClass('down');
                    if (name != '') el.addClass(name);
                }
            });
        }
    });
})(jQuery);