/*****************************************************************
 * EffectMgr provides functions to apply image effects using
 * Raphael http://raphaeljs.com .
 */
function EffectMgr(image, heightPct) {
	this.image = image;
	this.heightPct = heightPct;
	this.raphael = new Raphael(this.image.parentNode, this.image.width, this.image.height + (this.heightPct * this.image.height / 100));
}
EffectMgr.prototype.displayDefaultReflection = function() {
	this.raphael.image(this.image.src, 0, 0, this.image.width, this.image.height);
	this.raphael.image(this.image.src, 0, this.image.height - 1, this.image.width, this.image.height).scale(1, -1).attr({opacity: .5});
}
EffectMgr.prototype.displayGradientReflection = function(color) {
	this.displayDefaultReflection();
	var gradient = { type: "linear", dots: [{color: color, opacity: .5}, {color: color}], vector: [0, 0, 0, "100%"] };
    this.raphael.rect(-1, this.image.height - 1, this.image.width + 2, (this.heightPct * this.image.height / 100) + 2).attr({gradient: gradient});
}

/*****************************************************************
 * ImageMgr processes the images within a document, and applies
 * the effect(s) according to the image class name.
 */
function ImageMgr() {
}
ImageMgr.prototype.process = function(images) {
	for (var i = 0; i < images.length; i++) {
		if (images[i].className.indexOf('reflection') >= 0) {
		    if (images[i].parentNode.tagName.toLowerCase() == "p" || images[i].parentNode.tagName.toLowerCase() == "div") {
				images[i].style.display = "none";
				var effectMgr = new EffectMgr(images[i], 30);
				effectMgr.displayGradientReflection("white");
			}
		}
	}
}

var imageMgr = new ImageMgr();
imageMgr.process(document.images);