// Michaelangelo identifies the images for Raphael to paint
com_cliffano_reflection.Michaelangelo = name_edwards_dean_Base.extend({
    constructor: function(gradientBgColor, gradientHeight) {
        this.sai = new com_cliffano_reflection.Sai(gradientBgColor, gradientHeight);
    },
    paint: function(images) {
        for (var i = 0; i < images.length; i++) {
            var classNames = images[i].className.split(' ');
            for (var j = 0; j < classNames.length; j++) {
                if (classNames[j] == 'reflection') {
                    this._wrap(images[i]);
                    this.sai.reflection(images[i]);
                    this._hide(images[i]);
                }
            }
        }
    },
    // inserts a wrapper div between the image and its parent node
    _wrap: function(image) {
        var div = document.createElement('div');
        var parent = image.parentNode;
        parent.replaceChild(div, image);
        div.appendChild(image);
    },
    // hides original image. note: using style.display = 'none' causes problem on IE.
    _hide: function(image) {
        image.style.visibility = 'hidden';
        image.parentNode.className = image.className;
        image.width = 0;
        image.height = 0;
    }
});

// Sai is the interface to Raphael
com_cliffano_reflection.Sai = name_edwards_dean_Base.extend({
    // constructor takes care of plugin configuration values
    constructor: function(gradientBgColor, gradientHeight) {
        this.gradientBgColor = gradientBgColor;
        this.gradientHeight = gradientHeight;
    },
    reflection: function(image) {
        if (this.gradientBgColor !== null && this.gradientHeight !== null) {
            this._reflectionGradient(image, this.gradientHeight, this.gradientBgColor);
        } else {
            this._reflectionDefault(image)
        }
    },
    _reflectionDefault: function(image) {
        raphael = new Raphael(image.parentNode, image.width, image.height * 2);
        raphael.image(image.src, 0, 0, image.width, image.height);
        raphael.image(image.src, 0, image.height, image.width, image.height).scale(1, -1).attr({opacity: .5});
    },
    _reflectionGradient: function(image, height, color) {
        if (height.indexOf('%') == height.length - 1) {
            reflectionHeight = (height.replace('%', '')) * image.height / 100;
        } else {
            reflectionHeight = height.replace('px', '') * 1;
        }
        raphael = new Raphael(image.parentNode, image.width, image.height + reflectionHeight);
        raphael.image(image.src, 0, 0, image.width, image.height);
        raphael.image(image.src, 0, image.height, image.width, image.height).scale(1, -1).attr({opacity: .5});
        raphael.rect(-1, image.height - 1, image.width + 5, reflectionHeight + 5).attr({gradient: '90-' + color + '-' + color, opacity: .5, stroke: 'none'});
    }
});