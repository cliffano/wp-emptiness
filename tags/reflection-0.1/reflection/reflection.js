/*****************************************************************
 * BitpressEffectMgr provides functions to apply image effects using
 * Raphael http://raphaeljs.com .
 */
function BitpressEffectMgr(image, height) {
	this.image = image;
	if (height == null) {
		this.reflectionHeight = this.image.height;
	} else {
		if (height.indexOf("%") == height.length - 1) {
			this.reflectionHeight = (height.replace("%", "")) * this.image.height / 100;
		} else {
			this.reflectionHeight = height.replace("px", "") * 1;
		}
	}
	this.raphael = new Raphael(this.image.parentNode, this.image.width, this.image.height + this.reflectionHeight);
}
BitpressEffectMgr.prototype.displayDefaultReflection = function() {
	this.raphael.image(this.image.src, 0, 0, this.image.width, this.image.height);
	this.raphael.image(this.image.src, 0, this.image.height, this.image.width, this.image.height).scale(1, -1).attr({opacity: .5});
}
BitpressEffectMgr.prototype.displayGradientReflection = function(color) {
	this.displayDefaultReflection();
	var gradient = { type: "linear", dots: [{color: color, opacity: .5}, {color: color}], vector: [0, 0, 0, "100%"] };
    this.raphael.rect(0, this.image.height, this.image.width, this.reflectionHeight + 1).attr({gradient: gradient, stroke: null});
}

/*****************************************************************
 * BitpressImageMgr processes the images within a document, and applies
 * the reflection effect.
 */
function BitpressImageMgr(gradientBgColor, gradientHeight) {
	this.gradientBgColor = gradientBgColor;
	this.gradientHeight = gradientHeight;
}
BitpressImageMgr.prototype.process = function(images) {
	for (var i = 0; i < images.length; i++) {
		if ((images[i].className.indexOf("reflection") >= 0) &&
		    	(images[i].parentNode.tagName.toLowerCase() == "p" ||
		    	images[i].parentNode.tagName.toLowerCase() == "div") 
		    	) {
		    var classNames = images[i].className.split(" ");
		    for (var j = 0; j < classNames.length; j++) {
		    	if (classNames[j] == "reflection") {
					images[i].style.display = "none";
					images[i].parentNode.className = images[i].className;
				    if (this.gradientBgColor != null && this.gradientHeight != null) {
				    	(new BitpressEffectMgr(images[i], this.gradientHeight)).displayGradientReflection(this.gradientBgColor);
				    } else {
				    	(new BitpressEffectMgr(images[i])).displayDefaultReflection();
				    }
		    	}
		    }
		}
	}
}