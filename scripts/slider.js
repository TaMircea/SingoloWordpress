$(document).ready(function() {
    var Slider = function(id) {
      var $window = $(window);
      this.width= $window.width();
      this.currentSlide = 1;
      this.$slider = $(id+'.slideshow');
      this.$slideContainer = $('.slideshow_container',this.$slider);
      this.$slides = $('.slideshow_slide',this.$slideContainer);
      this.$btnPrev = $('.btn-prev',this.$slider);
      this.$btnNext = $('.btn-next',this.$slider);
      this.$content = $('.slide-content', this.$slides)
      this.anim=1000;
      this.interval;
      var that=this;
      this.totalWidth=0;
      this.widthRefresher=function(){
        that.width= $window.width(); 
      };
      this.widthRefresher();
      this.$slides.width(this.width);
      this.sliderInit();
      this.goNext=function(){
        that.$slideContainer.animate({'margin-left': '-='+that.width}, that.anim,function(){
          that.currentSlide++;
          if (that.currentSlide === that.$slides.length+1) {
            that.currentSlide = 1;
            that.$slideContainer.css('margin-left', -that.width);
          }
        });
      };
      this.goPrev=function(){
        that.$slideContainer.animate({'margin-left': '+='+that.width},that.anim,function(){
          that.currentSlide--;
          if (that.currentSlide < 1) {
            that.currentSlide = that.$slides.length;
            that.$slideContainer.css('margin-left',-1*(that.totalWidth-(2*that.width)) );
          }
        });
      };
      this.backgroundChanger=function(){
        var randColor1 = 'rgb(' + (Math.floor(Math.random() * 256))
        + ',' + (Math.floor(Math.random() * 256)) 
        + ',' + (Math.floor(Math.random() * 256)) + ')';
        var randColor2 = 'rgb(' + (Math.floor(Math.random() * 256))
        + ',' + (Math.floor(Math.random() * 256)) 
        + ',' + (Math.floor(Math.random() * 256)) + ')';
                
        that.$slideContainer.css("background", 'linear-gradient(to bottom right,'+ randColor1+','+ randColor2+')');
      };

      this.$btnNext.on('click',function(){
        that.goNext();
        that.backgroundChanger();
      });
      this.$btnPrev.on('click',function(){
        that.goPrev();
        that.backgroundChanger();
      });
      this.$slides.on('click', function(){
        that.$content.toggle();
      })
      window.addEventListener('resize', function(event){
        that.widthRefresher();
        that.$slideContainer.children().width(that.width);
        that.setContainerWidth();
        that.$slideContainer.css('margin-left',-that.width)
    });
   };

    Slider.prototype.totalWidthCalc= function(){
      var that = this;
      that.totalWidth=0;
      $.each(that.$slideContainer.children(),
        function(){
          that.totalWidth+=that.width+4; 
        });
    };  
    Slider.prototype.setContainerWidth=function(){
      var that = this;
      that.totalWidthCalc();
      that.$slideContainer.width(that.totalWidth);
    };
    Slider.prototype.sliderInit=function(){
      var that = this;      
      that.$slides.eq(0).clone().attr( 'id', 'Last' ).appendTo(that.$slideContainer);
      that.$slides.eq(-1).clone().attr( 'id', 'First' ).prependTo(that.$slideContainer);
      that.$slideContainer.css('margin-left',-that.width);
      
      that.setContainerWidth();
    };
    Slider.prototype.pauseSlider=function(){
      var that = this;
      clearInterval(that.interval);
    };
    Slider.prototype.startSlider=function(){
      var that = this;
      clearInterval(that.interval);
        that.interval = setInterval(function(){
          that.goNext()},3000);
    };
    var slider1 = new Slider('#slide-1');
});

