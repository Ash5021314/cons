//============================Galery Main Page Start======================

popup = {
	init: function() {
		$("figure").click(function() {
			popup.open($(this));
		});

		$(document)
			.on("click", ".popup img", function() {
				return false;
			})
			.on("click", ".popup", function() {
				popup.close();
			});
	},
	open: function($figure) {
		$(".gallery").addClass("pop");
		$popup = $('<div class="popup" />').appendTo($("body"));
		$fig = $figure.clone().appendTo($(".popup"));
		$bg = $('<div class="bg" />').appendTo($(".popup"));
		$close = $(
			'<div class="close"><svg><use xlink:href="#close"></use></svg></div>'
		).appendTo($fig);
		$shadow = $('<div class="shadow" />').appendTo($fig);
		src = $("img", $fig).attr("src");
		$shadow.css({
			backgroundImage: "url(" + src + ")"
		});
		$bg.css({
			backgroundImage: "url(" + src + ")"
		});
		setTimeout(function() {
			$(".popup").addClass("pop");
		}, 10);
	},
	close: function() {
		$(".gallery, .popup").removeClass("pop");
		setTimeout(function() {
			$(".popup").remove();
		}, 100);
	}
};

popup.init();
//============================Galery Main Page END======================

//====================================slider Big Start==============================

$(function() {
	// slider type
	$t = "slide"; // opitions are fade and slide
	//variables
	($f = 1000), // fade in/out speed
		($s = 1000), // slide transition speed (for sliding carousel)
		($d = 5000); // duration per slide

	$n = $(".slide, .slide1").length; //number of slides
	$w = $(".slide, .slide1").width(); // slide width
	$c = $(".container").width(); // container width
	$ss = $n * $w; // slideshow width
	$y = $(".change-name").text();
	// if($n == )
	console.log($y);
	var bb;
	for (var i = 0; i < $n; i++) {
		bb = [i];
		console.log(bb);
	}

	function timer() {
		$(".timer").animate(
			{
				width: $w
			},
			$d
		);
		$(".timer").animate(
			{
				width: 0
			},
			0
		);
	}

	// fading function
	function fadeInOut() {
		timer();
		$i = 0;
		var setCSS = {
			position: "absolute",
			top: "0",
			left: "0"
		};

		$(".slide, .slide1").css(setCSS);

		//show first item
		$(".slide, .slide1")
			.eq($i)
			.show();

		setInterval(function() {
			timer();
			$(".slide, .slide1")
				.eq($i)
				.fadeOut($f);
			if ($i == $n - 1) {
				$i = 0;
			} else {
				$i++;
			}
			$(".slide, .slide1")
				.eq($i)
				.fadeIn($f, function() {
					$(".timer").css({
						width: "0"
					});
				});
		}, $d);
	}

	function slide() {
		timer();
		var setSlideCSS = {
			float: "left",
			display: "inline-block",
			width: $c
		};
		var setSlideShowCSS = {
			width: $ss // set width of slideshow container
		};
		$(".slide").css(setSlideCSS);
		$(".slide1").css(setSlideCSS);

		$(".slideshow").css(setSlideShowCSS);
		$(".slideshow1").css(setSlideShowCSS);
		setInterval(function() {
			timer();
			$(".slideshow").animate(
				{
					left: -$w
				},
				$s,
				function() {
					// to create infinite loop
					$(".slideshow")
						.css("left", 0)
						.append($(".slide:first"));
				}
			);
			$(".slideshow1").animate(
				{
					left: -$w
				},
				$s,
				function() {
					// to create infinite loop
					$(".slideshow1")
						.css("left", 0)
						.append($(".slide1:first"));
				}
			);
		}, $d);
	}

	if ($t == "fade") {
		fadeInOut();
	}
	if ($t == "slide") {
		slide();
	} else {
	}
});
//====================================slider Big END==============================

//====================================Small carousel Slider Start 1 ==============================

$("#myCarousel").on("slide.bs.carousel", function(e) {
	var $e = $(e.relatedTarget);
	var idx = $e.index();
	var itemsPerSlide = 4;
	var totalItems = $(".carousel-item").length;

	if (idx >= totalItems - (itemsPerSlide - 1)) {
		var it = itemsPerSlide - (totalItems - idx);
		for (var i = 0; i < it; i++) {
			// append slides to end
			if (e.direction == "left") {
				$(".carousel-item")
					.eq(i)
					.appendTo(".carousel-inner");
			} else {
				$(".carousel-item")
					.eq(0)
					.appendTo(".carousel-inner");
			}
		}
	}
});

$("#myCarousel").carousel({
	interval: 2000
});

// $(document).ready(function() {
//   /* show lightbox when clicking a thumbnail */
//   $('a.thumb').click(function(event) {
//     event.preventDefault();
//     var content = $('.modal-body');
//     content.empty();
//     var title = $(this).attr("title");
//     $('.modal-title').html(title);
//     content.html($(this).html());
//     $(".modal-profile").modal({
//       show: true
//     });
//   });

// });
//====================================Small carousel Slider End==============================

//====================================Small carousel Slider Start 2 ==============================

$("#myCarousel_1").on("slide.bs.carousel", function(e) {
	console.log("asd");
	var $e = $(e.relatedTarget);
	var idx = $e.index();
	var itemsPerSlide = 4;
	var totalItems = $(".carousel-item_1").length;

	if (idx >= totalItems - (itemsPerSlide - 1)) {
		var it = itemsPerSlide - (totalItems - idx);
		for (var i = 0; i < it; i++) {
			// append slides to end
			if (e.direction == "left") {
				$(".carousel-item_1")
					.eq(i)
					.appendTo(".carousel-inner_1");
			} else {
				$(".carousel-item_1")
					.eq(0)
					.appendTo(".carousel-inner_1");
			}
		}
	}
});

$("#myCarousel_1").carousel({
	interval: 2000
});

// $(document).ready(function() {
//   /* show lightbox when clicking a thumbnail */
//   $('a.thumb_1').click(function(event) {
//     event.preventDefault();
//     var content = $('.modal-body');
//     content.empty();
//     var title = $(this).attr("title");
//     $('.modal-title').html(title);
//     content.html($(this).html());
//     $(".modal-profile").modal({
//       show: true
//     });
//   });

// });
//====================================Small carousel Slider End 2 ==============================

//====================================Hide/Show text Start ==============================

$(".toogle-text1").hide();

$(document).ready(function() {
	$(".toggle-button1").click(function() {
		$(this)
			.prev()
			.toggleClass("toogle-show");
	});
});
$("#toogle-text2").hide();

//====================================Hide/Show text End ==============================

$(document).ready(function() {
	$(".regular").slick({
		dots: false,
		infinite: true,
		slidesToShow: 4,
		slidesToScroll: 1
	});
});
