/*****************************************************************
 * EffectMgr provides functions to apply image effects using
 * Raphael http://raphaeljs.com .
 */
function EffectMgr(image, height) {
	this.image = image;
	if (height == null) {
		this.raphael = new Raphael(this.image.parentNode, this.image.width, this.image.height * 2);
	} else {
		if (height.indexOf("%") == height.length - 1) {
			this.reflectionHeight = (height.replace("%", "")) * this.image.height / 100;
			this.raphael = new Raphael(this.image.parentNode, this.image.width, this.image.height + this.reflectionHeight);
		} else {
			this.reflectionHeight = height.replace("px", "") * 1;
			this.raphael = new Raphael(this.image.parentNode, this.image.width, this.image.height + this.reflectionHeight);
		}
	}
}
EffectMgr.prototype.displayDefaultReflection = function() {
	this.raphael.image(this.image.src, 0, 0, this.image.width, this.image.height);
	this.raphael.image(this.image.src, 0, this.image.height - 1, this.image.width, this.image.height).scale(1, -1).attr({opacity: .5});
}
EffectMgr.prototype.displayGradientReflection = function(color) {
	this.displayDefaultReflection();
	var gradient = { type: "linear", dots: [{color: color, opacity: .5}, {color: color}], vector: [0, 0, 0, "100%"] };
    this.raphael.rect(-1, this.image.height - 1, this.image.width + 2, this.reflectionHeight + 2).attr({gradient: gradient});
}

/*****************************************************************
 * ImageMgr processes the images within a document, and applies
 * the effect(s) according to the image class name.
 */
function ImageMgr() {
}
ImageMgr.prototype.process = function(images) {
	for (var i = 0; i < images.length; i++) {
		if ((images[i].className.indexOf("reflection") >= 0) &&
		    	(images[i].parentNode.tagName.toLowerCase() == "p" ||
		    	images[i].parentNode.tagName.toLowerCase() == "div") 
		    	) {
		    var classNames = images[i].className.split(" ");
		    for (var j = 0; j < classNames.length; j++) {
		    	if (classNames[j].indexOf("reflection") == 0) {
					images[i].style.display = "none";
					var details = classNames[j].split("-");
					if (details.length == 3) {
						(new EffectMgr(images[i], details[2])).displayGradientReflection(details[1]);
					} else {
						(new EffectMgr(images[i])).displayDefaultReflection();
					}
		    	}
		    }
		}
	}
}

var imageMgr = new ImageMgr();
imageMgr.process(document.images);