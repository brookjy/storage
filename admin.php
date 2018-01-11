
<!DOCTYPE html><html lang='en' class=''>
<head><script src='//production-assets.codepen.io/assets/editor/live/console_runner-079c09a0e3b9ff743e39ee2d5637b9216b3545af0de366d4b9aad9dc87e26bfd.js'></script><script src='//production-assets.codepen.io/assets/editor/live/events_runner-73716630c22bbc8cff4bd0f07b135f00a0bdc5d14629260c3ec49e5606f98fdd.js'></script><script src='//production-assets.codepen.io/assets/editor/live/css_live_reload_init-2c0dc5167d60a5af3ee189d570b1835129687ea2a61bee3513dee3a50c115a77.js'></script><meta charset='UTF-8'><meta name="robots" content="noindex"><link rel="shortcut icon" type="image/x-icon" href="//production-assets.codepen.io/assets/favicon/favicon-8ea04875e70c4b0bb41da869e81236e54394d63638a1ef12fa558a4a835f1164.ico" /><link rel="mask-icon" type="" href="//production-assets.codepen.io/assets/favicon/logo-pin-f2d2b6d2c61838f7e76325261b7195c27224080bc099486ddd6dccb469b8e8e6.svg" color="#111" /><link rel="canonical" href="https://codepen.io/mic/pen/EyWjod?depth=everything&order=popularity&page=99&q=product&show_forks=false" />
	<link href="https://www.real.de/static/dist/css/core.min.3c4b881f.css" media="all" rel="stylesheet" type="text/css" >
<link href="https://www.real.de/static/dist/css/style.min.33096b31.css" media="all" rel="stylesheet" type="text/css" >
<link href="https://www.real.de/static/dist/css/mainPage.min.4d8c361b.css" media="all" rel="stylesheet" type="text/css" >

<link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,900|Open+Sans:800" rel="stylesheet" media="none" onload="if(media!='all')media='all'">

<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700|Open+Sans:800" rel="stylesheet">

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css'><script src='https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js'></script>
<style class="cp-pen-styles">body {
  font-family: 'Source Sans Pro';
}

::selection {
  background: rgba(0, 0, 0, 0.2);
}

::-moz-selection {
  background: rgba(0, 0, 0, 0.2);
}

.container {
  margin-top: 10rem;
}

.Product {
  position: relative;
  display: flex;
  padding: 1rem 0 1rem 1rem;
  border: 1px solid #d9d9d9;
  border-radius: .4rem;
  font-size: 1.4rem;
  margin-bottom: 1rem;
  transition: all 275ms ease-out;
  overflow: hidden;
}
@media (min-width: 30em) {
  .Product {
    padding: 2rem;
    height: 32rem;
    margin-bottom: 2rem;
  }
}
.Product__badge {
  position: absolute;
  top: -.5rem;
  line-height: 3.2rem;
  color: white;
  text-transform: uppercase;
  font-weight: 700;
  z-index: 2;
}
.Product__badge--tipp, .Product__badge--deal {
  padding: 0 .5rem 0 1rem;
  left: -.5rem;
  font-size: 1rem;
  border-top-left-radius: .2rem;
  border-bottom-left-radius: .2rem;
}
.Product__badge--tipp::after, .Product__badge--deal::after {
  content: '';
  position: absolute;
  top: 0;
  left: 100%;
  width: 0;
  border-width: 1.6rem;
  border-style: solid;
  border-color: transparent;
}
.Product__badge--tipp {
  background: #0057a3;
}
.Product__badge--tipp::after {
  border-left-color: #0057a3;
}
.Product__badge--deal {
  background: #ed1b2f;
}
.Product__badge--deal::after {
  border-left-color: #ed1b2f;
}
.Product__badge--sale {
  width: 3.2rem;
  right: -.5rem;
  background: #f44;
  border-radius: .2rem;
  text-align: center;
}
.Product__badge--sale::after {
  content: '%';
}
.Product__image {
  display: flex;
  justify-content: center;
  width: 6rem;
  height: 6rem;
  margin-right: 1rem;
  margin-bottom: 1rem;
}
@media (min-width: 30em) {
  .Product__image {
    width: 100%;
    height: 12rem;
    margin-right: 0;
  }
  .Product__image img {
    height: 12rem;
  }
}
.Product__content {
  flex: 3;
}
.Product-buy {
  display: flex;
  flex-direction: column;
  flex: 0 1 4rem;
  margin: -1rem 0;
}
@media (min-width: 30em) {
  .Product-buy {
    margin: 0 -2rem;
    flex-flow: row-reverse;
    border: none;
  }
}
.Product-buy__item {
  flex: 1;
  text-align: center;
  line-height: 4rem;
  transition: all 275ms ease-out;
  background: #eee;
}
.Product-buy__item:nth-child(2) {
  font-size: 2rem;
}
.Product-buy__remove {
  color: #aaa;
}
.Product-buy__add:hover {
  background: #349d49;
  color: white;
  cursor: pointer;
}
.Product-buy__count {
  transform: scale(3);
}
.Product--is-active {
  border-color: #349d49;
}
.Product--is-active .Product-buy__item {
  background: #349d49;
  color: white;
  border: 0;
}
.Product--is-active .Product-buy__item:not(:nth-child(2)) {
  cursor: pointer;
}
.Product--is-active .Product-buy__item:not(:nth-child(2)):hover {
  background: #2e8a40;
}
@media (min-width: 30em) {
  .Product {
    flex-direction: column;
  }
  .Product-buy {
    margin-bottom: -2rem;
  }
}
.Product__title {
  font-size: 1.4rem;
  font-weight: 600;
}
.Product__subtitle {
  font-size: 1.2rem;
  color: #737373;
}
.Product__rating {
  margin: 1rem 0;
  color: #fa0;
}
.Product__price {
  display: inline-block;
  position: relative;
  margin-right: 1.5rem;
  font-family: 'Open Sans';
  font-size: 4rem;
  font-weight: 800;
  color: #0057a3;
  letter-spacing: -.02em;
  line-height: 1;
  transform: scaleY(0.9) skewX(-8deg);
}
@media (min-width: 30em) {
  .Product__price {
    display: block;
    text-align: right;
    font-size: 5rem;
  }
}
.Product__price::before, .Product__price::after {
  position: absolute;
}
.Product__price::before {
  content: '';
  display: block;
  right: -.265em;
  top: .525em;
  width: .375em;
  height: .15em;
  background: #0057a3;
  transform: skewX(-5deg);
}
.Product__price::after {
  content: attr(data-cents);
  top: .2em;
  right: -.75em;
  font-size: .425em;
  letter-spacing: 0;
}
.Product__savings {
  color: #f33;
  font-weight: 700;
  font-size: 1.2rem;
}
@media (min-width: 30em) {
  .Product__savings {
    text-align: right;
  }
}
</style></head><body>
<div class="container">

	<div class="row">
		
		<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
		
			<div class="Product">

				<!-- 
<div class="Product__badge Product__badge--tipp">Tipp des Tages</div>
				<div class="Product__badge Product__badge--sale"></div>
-->

				<div class="Product__image">
					<img src="http://lebensmittel-warenkunde.de/assets/images/bananen.jpg" alt="" />
				</div>
				
				<div class="Product__content">
					<div class="Product__title">
						real,- Bio Bananen
					</div>
					<div class="Product__subtitle">
						1 Stück ca. 200g (1Kg = 3,29)
					</div>

					<div class="Product__price" data-cents="69">0,</div>

					<div class="Product__savings">Sie sparen 49%</div>

				</div>

				<div class="Product-buy">
					<div class="Product-buy__item Product-buy__item--count Product-buy__add"><i class="icon-plus"></i></div>
					<div class="Product-buy__item Product-buy__item--count"><span class="Product-buy__count">0</span></div>
					<div class="Product-buy__item Product-buy__item--count Product-buy__remove"><i class="icon-minus"></i></div>
				</div>
				
			</div>
			
		</div>
		
	
		<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
		
			<div class="Product">

				<!-- 
<div class="Product__badge Product__badge--tipp">Tipp des Tages</div>
				<div class="Product__badge Product__badge--sale"></div>
-->

				<div class="Product__image">
					<img src="http://www.schawenzl.de/WebRoot/Store10/Shops/63173958/4E84/815F/706A/50E5/B49D/C0A8/28BE/EEE0/Apfel.png" alt="" />
				</div>
				
				<div class="Product__content">
					<div class="Product__title">
						real,- Bio Apfel
					</div>
					<div class="Product__subtitle">
						1 Stück ca. 200g (1Kg = 3,29)
					</div>

					<div class="Product__price" data-cents="33">0,</div>

					<div class="Product__savings">Sie sparen 49%</div>

				</div>

				<div class="Product-buy">
					<div class="Product-buy__item Product-buy__item--count Product-buy__add"><i class="icon-plus"></i></div>
					<div class="Product-buy__item Product-buy__item--count"><span class="Product-buy__count">0</span></div>
					<div class="Product-buy__item Product-buy__item--count Product-buy__remove"><i class="icon-minus"></i></div>
				</div>
				
			</div>
		
		</div>		

		
		<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
		
			<div class="Product">

				<!-- 
<div class="Product__badge Product__badge--tipp">Tipp des Tages</div>
				<div class="Product__badge Product__badge--sale"></div>
-->

				<div class="Product__image">
					<img src="http://static.myslimcoach.de/img/ll_thumbnails/53.jpg" alt="" />
				</div>
				
				<div class="Product__content">
					<div class="Product__title">
						real,- Bio Paprika
					</div>
					<div class="Product__subtitle">
						1 Stück ca. 200g (1Kg = 3,29)
					</div>

					<div class="Product__price" data-cents="22">2,</div>

					<!-- <div class="Product__savings">Sie sparen 49%</div> -->

				</div>

				<div class="Product-buy">
					<div class="Product-buy__item Product-buy__item--count Product-buy__add"><i class="icon-plus"></i></div>
					<div class="Product-buy__item Product-buy__item--count"><span class="Product-buy__count">0</span></div>
					<div class="Product-buy__item Product-buy__item--count Product-buy__remove"><i class="icon-minus"></i></div>
				</div>
				
			</div>
		
		</div>		
			
		<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
		
			<div class="Product">

				<!-- 
<div class="Product__badge Product__badge--tipp">Tipp des Tages</div>
				<div class="Product__badge Product__badge--sale"></div>
-->

				<div class="Product__image">
					<img src="http://lebensmittel-warenkunde.de/assets/images/bananen.jpg" alt="" />
				</div>
				
				<div class="Product__content">
					<div class="Product__title">
						real,- Bio Bananen
					</div>
					<div class="Product__subtitle">
						1 Stück ca. 200g (1Kg = 3,29)
					</div>

					<div class="Product__price" data-cents="69">0,</div>

					<div class="Product__savings">Sie sparen 49%</div>

				</div>

				<div class="Product-buy">
					<div class="Product-buy__item Product-buy__item--count Product-buy__add"><i class="icon-plus"></i></div>
					<div class="Product-buy__item Product-buy__item--count"><span class="Product-buy__count">0</span></div>
					<div class="Product-buy__item Product-buy__item--count Product-buy__remove"><i class="icon-minus"></i></div>
				</div>
				
			</div>
			
		</div>
		
	
		<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
		
			<div class="Product">

				<!-- 
<div class="Product__badge Product__badge--tipp">Tipp des Tages</div>
				<div class="Product__badge Product__badge--sale"></div>
-->

				<div class="Product__image">
					<img src="http://www.schawenzl.de/WebRoot/Store10/Shops/63173958/4E84/815F/706A/50E5/B49D/C0A8/28BE/EEE0/Apfel.png" alt="" />
				</div>
				
				<div class="Product__content">
					<div class="Product__title">
						real,- Bio Apfel
					</div>
					<div class="Product__subtitle">
						1 Stück ca. 200g (1Kg = 3,29)
					</div>

					<div class="Product__price" data-cents="33">0,</div>

					<div class="Product__savings">Sie sparen 49%</div>

				</div>

				<div class="Product-buy">
					<div class="Product-buy__item Product-buy__item--count Product-buy__add"><i class="icon-plus"></i></div>
					<div class="Product-buy__item Product-buy__item--count"><span class="Product-buy__count">0</span></div>
					<div class="Product-buy__item Product-buy__item--count Product-buy__remove"><i class="icon-minus"></i></div>
				</div>
				
			</div>
		
		</div>		

		
		<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
		
			<div class="Product">

				<!-- 
<div class="Product__badge Product__badge--tipp">Tipp des Tages</div>
				<div class="Product__badge Product__badge--sale"></div>
-->

				<div class="Product__image">
					<img src="http://static.myslimcoach.de/img/ll_thumbnails/53.jpg" alt="" />
				</div>
				
				<div class="Product__content">
					<div class="Product__title">
						real,- Bio Paprika
					</div>
					<div class="Product__subtitle">
						1 Stück ca. 200g (1Kg = 3,29)
					</div>

					<div class="Product__price" data-cents="22">2,</div>

					<!-- <div class="Product__savings">Sie sparen 49%</div> -->

				</div>

				<div class="Product-buy">
					<div class="Product-buy__item Product-buy__item--count Product-buy__add"><i class="icon-plus"></i></div>
					<div class="Product-buy__item Product-buy__item--count"><span class="Product-buy__count">0</span></div>
					<div class="Product-buy__item Product-buy__item--count Product-buy__remove"><i class="icon-minus"></i></div>
				</div>
				
			</div>
		
		</div>		
			
		<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
		
			<div class="Product">

				<!-- 
<div class="Product__badge Product__badge--tipp">Tipp des Tages</div>
				<div class="Product__badge Product__badge--sale"></div>
-->

				<div class="Product__image">
					<img src="http://lebensmittel-warenkunde.de/assets/images/bananen.jpg" alt="" />
				</div>
				
				<div class="Product__content">
					<div class="Product__title">
						real,- Bio Bananen
					</div>
					<div class="Product__subtitle">
						1 Stück ca. 200g (1Kg = 3,29)
					</div>

					<div class="Product__price" data-cents="69">0,</div>

					<div class="Product__savings">Sie sparen 49%</div>

				</div>

				<div class="Product-buy">
					<div class="Product-buy__item Product-buy__item--count Product-buy__add"><i class="icon-plus"></i></div>
					<div class="Product-buy__item Product-buy__item--count"><span class="Product-buy__count">0</span></div>
					<div class="Product-buy__item Product-buy__item--count Product-buy__remove"><i class="icon-minus"></i></div>
				</div>
				
			</div>
			
		</div>
		
	
		<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
		
			<div class="Product">

				<!-- 
<div class="Product__badge Product__badge--tipp">Tipp des Tages</div>
				<div class="Product__badge Product__badge--sale"></div>
-->

				<div class="Product__image">
					<img src="http://www.schawenzl.de/WebRoot/Store10/Shops/63173958/4E84/815F/706A/50E5/B49D/C0A8/28BE/EEE0/Apfel.png" alt="" />
				</div>
				
				<div class="Product__content">
					<div class="Product__title">
						real,- Bio Apfel
					</div>
					<div class="Product__subtitle">
						1 Stück ca. 200g (1Kg = 3,29)
					</div>

					<div class="Product__price" data-cents="33">0,</div>

					<div class="Product__savings">Sie sparen 49%</div>

				</div>

				<div class="Product-buy">
					<div class="Product-buy__item Product-buy__item--count Product-buy__add"><i class="icon-plus"></i></div>
					<div class="Product-buy__item Product-buy__item--count"><span class="Product-buy__count">0</span></div>
					<div class="Product-buy__item Product-buy__item--count Product-buy__remove"><i class="icon-minus"></i></div>
				</div>
				
			</div>
		
		</div>		

		
		<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
		
			<div class="Product">

				<!-- 
<div class="Product__badge Product__badge--tipp">Tipp des Tages</div>
				<div class="Product__badge Product__badge--sale"></div>
-->

				<div class="Product__image">
					<img src="http://static.myslimcoach.de/img/ll_thumbnails/53.jpg" alt="" />
				</div>
				
				<div class="Product__content">
					<div class="Product__title">
						real,- Bio Paprika
					</div>
					<div class="Product__subtitle">
						1 Stück ca. 200g (1Kg = 3,29)
					</div>

					<div class="Product__price" data-cents="22">2,</div>

					<!-- <div class="Product__savings">Sie sparen 49%</div> -->

				</div>

				<div class="Product-buy">
					<div class="Product-buy__item Product-buy__add"><i class="icon-shopping-cart"></i></div>
					<div class="Product-buy__item"><span class="Product-buy__count">0</span></div>
					<div class="Product-buy__item Product-buy__remove"><i class="icon-minus"></i></div>
				</div>
				
			</div>
		
		</div>		
	
	</div>

</div>
<script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script><script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
<script >$('.Product-buy__item').on('click', function() {
	
	var $this = $(this);
	var $product = $this.closest('.Product');
	var $productBuy = $this.closest('.Product-buy');
	var $cartCount = $productBuy.find('.Product-buy__count');
	var $count = parseInt($cartCount.text());
	
	if ($this.hasClass('Product-buy__add')) {
		$cartCount.addClass('Product-buy__count--is-animating');
		$product.addClass('Product--is-active');
		$cartCount.text(++$count);
	}
	
	if ($this.hasClass('Product-buy__remove'))
		$cartCount.text(--$count);
	
	if ($this.hasClass('Product-buy__remove') && $count <= 0) {
		$product.removeClass('Product--is-active');
		$cartCount.text(0);
	}
	
});
	
	







//# sourceURL=pen.js
</script>
</body></html>