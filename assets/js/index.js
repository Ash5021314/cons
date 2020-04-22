//============================Galery Main Page Start======================

popup = {
	init: function () {
		$("figure").click(function () {
			popup.open($(this));
		});

		$(document)
			.on("click", ".popup img", function () {
				return false;
			})
			.on("click", ".popup", function () {
				popup.close();
			});
	},
	open: function ($figure) {
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
			backgroundImage: "url(" + src + ")",
		});
		$bg.css({
			backgroundImage: "url(" + src + ")",
		});
		setTimeout(function () {
			$(".popup").addClass("pop");
		}, 10);
	},
	close: function () {
		$(".gallery, .popup").removeClass("pop");
		setTimeout(function () {
			$(".popup").remove();
		}, 100);
	},
};

popup.init();
//============================Galery Main Page END======================

//====================================slider Big Start==============================

$(function () {
	// slider type
	$t = "slide"; // opitions are fade and slide
	//variables
	($f = 1000), // fade in/out speed
		($s = 1000), // slide transition speed (for sliding carousel)
		($d = 5000); // duration per slide

	$n = $(".slide, .slide1, .slide2").length; //number of slides
	$w = $(".slide, .slide1, .slide2").width(); // slide width
	$c = $(".container").width(); // container width
	$ss = $n * $w; // slideshow width
	$y = $(".change-name").text();
	// if($n == )
	var bb;
	for (var i = 0; i < $n; i++) {
		bb = [i];
	}

	function timer() {
		$(".timer").animate(
			{
				width: $w,
			},
			$d
		);
		$(".timer").animate(
			{
				width: 0,
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
			left: "0",
		};

		$(".slide, .slide1, .slide2").css(setCSS);

		//show first item
		$(".slide, .slide1, .slide2").eq($i).show();

		setInterval(function () {
			timer();
			$(".slide, .slide1, .slide2").eq($i).fadeOut($f);
			if ($i == $n - 1) {
				$i = 0;
			} else {
				$i++;
			}
			$(".slide, .slide1, .slide2")
				.eq($i)
				.fadeIn($f, function () {
					$(".timer").css({
						width: "0",
					});
				});
		}, $d);
	}

	function slide() {
		timer();
		var setSlideCSS = {
			float: "left",
			display: "inline-block",
			width: $c,
		};
		var setSlideShowCSS = {
			width: $ss, // set width of slideshow container
		};
		$(".slide").css(setSlideCSS);
		$(".slide1").css(setSlideCSS);
		$(".slide2").css(setSlideCSS);

		$(".slideshow").css(setSlideShowCSS);
		$(".slideshow1").css(setSlideShowCSS);
		$(".slideshow2").css(setSlideShowCSS);
		setInterval(function () {
			timer();
			$(".slideshow").animate(
				{
					left: -$w,
				},
				$s,
				function () {
					// to create infinite loop
					$(".slideshow").css("left", 0).append($(".slide:first"));
				}
			);
			$(".slideshow1").animate(
				{
					left: -$w,
				},
				$s,
				function () {
					// to create infinite loop
					$(".slideshow1").css("left", 0).append($(".slide1:first"));
				}
			);
			$(".slideshow2").animate(
				{
					left: -$w,
				},
				$s,
				function () {
					// to create infinite loop
					$(".slideshow2").css("left", 0).append($(".slide2:first"));
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

$("#myCarousel").on("slide.bs.carousel", function (e) {
	var $e = $(e.relatedTarget);
	var idx = $e.index();
	var itemsPerSlide = 4;
	var totalItems = $(".carousel-item").length;

	if (idx >= totalItems - (itemsPerSlide - 1)) {
		var it = itemsPerSlide - (totalItems - idx);
		for (var i = 0; i < it; i++) {
			// append slides to end
			if (e.direction == "left") {
				$(".carousel-item").eq(i).appendTo(".carousel-inner");
			} else {
				$(".carousel-item").eq(0).appendTo(".carousel-inner");
			}
		}
	}
});

$("#myCarousel").carousel({
	interval: 2000,
});

//====================================Small carousel Slider End==============================

//====================================Small carousel Slider Start 2 ==============================

$("#myCarousel_1").on("slide.bs.carousel", function (e) {
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
				$(".carousel-item_1").eq(i).appendTo(".carousel-inner_1");
			} else {
				$(".carousel-item_1").eq(0).appendTo(".carousel-inner_1");
			}
		}
	}
});

$("#myCarousel_1").carousel({
	interval: 2000,
});

//====================================Small carousel Slider End 2 ==============================

//====================================Hide/Show text Start ==============================

$(".toogle-text1").hide();

$(document).ready(function () {
	$(".toggle-button1").click(function () {
		$(this).prev().toggleClass("toogle-show");
		$(this).toggleClass("rotate");
	});
});
$("#toogle-text2").hide();

//====================================Hide/Show text End ==============================

$(document).ready(function () {
	$(".regular").slick({
		dots: false,
		infinite: true,
		slidesToShow: 4,
		slidesToScroll: 1,
	});
	$(".imgId").click(function () {
		var as = $(this).attr("data-id");
		$("html, body").animate(
			{ scrollTop: $("#col-" + as + "").offset().top },
			1000
		);
	});
});
$(document).scroll(function () {
	$("#to_top").css("opacity", $(document).scrollTop() / 500);
});

$("#to_top").click(function () {
	$("html, body").animate({ scrollTop: 0 }, 1000);
});
// $(".header-exople, .find-button").click(function () {
// 	$("html, body").animate(
// 		{
// 			scrollTop: $(".scroll-section").offset().top,
// 		},
// 		1000
// 	);
// });
$(".pic").hover(
	function () {
		$(this).children().css({ display: "block", cursor: "pointer" });
	},
	function () {
		$(this).children().css({ display: "none" });
	}
);

$(".pas").click(function () {
	$(".pas").each(function () {
		$(this).removeClass("active");
		$(this).attr("src", "../assets/images/pasiv.png");
	});
	$(this).addClass("active");
	if ($(this).hasClass("active")) {
		$(this).attr("src", "../assets/images/activ.png");
	}
});
$(".mapHref").click(function () {
	$(".image-holder").css({ left: `-${$(this).index() * 400}px` });
	$(".hidd").css({ left: `-${$(this).index() * 200}px` });
});
