function expand(img) 
{
	document.getElementById("expandedImg").src = img.src;
}

var photos = [["img/homepage/950Lombard-big-1.jpg", 
				"img/homepage/950Lombard-big-2.jpg", 
				"img/homepage/950Lombard-big-3.jpg", 
				"img/homepage/950Lombard-big-4.jpg", 
				"img/homepage/950Lombard-big-5.jpg", 
				"img/homepage/950Lombard-big-6.jpg", 
				"img/homepage/950Lombard-big-7.jpg", 
				"img/homepage/950Lombard-big-8.jpg"],
				["img/homepage/950Lombard-big-1.jpg", 
				"img/homepage/950Lombard-big-2.jpg", 
				"img/homepage/950Lombard-big-3.jpg", 
				"img/homepage/950Lombard-big-4.jpg", 
				"img/homepage/950Lombard-big-5.jpg", 
				"img/homepage/950Lombard-big-6.jpg", 
				"img/homepage/950Lombard-big-7.jpg", 
				"img/homepage/950Lombard-big-8.jpg"]];

var street = ["950 Lombard St", "950 Lombard St"];

var city = ["San Francisco, CA 94133, Russian Hill", "San Francisco, CA 94133, Russian Hill"];

var bedroom = [6, 6];

var bathroom = [3, 3];

var sqrt = [5000, 5000];

var price = ["$40,500,000", "$40,500,000"];

var descriptions = ["RESIDENCE 950...San Francisco's Newest Masterpiece. Nestled atop a magical park-like setting on one of the City's largest residential lots, this world-class urban estate has been brilliantly re-imagined for the future. A dramatic 40 foot cantilevered infinity pool reflects the shimmering Bay and glittering lights of the City's famed Skyline, while dazzling views of iconic landmarks from Salesforce Tower to The Transamerica Pyramid and beyond provide a stunning panorama surrounding the fabulous resort-like indoor/ outdoor flow of living, dining and entertainment spaces- easily accommodating 300+ guests. The super-advanced, technology enabled health and wellness environment of this sustainably built LEED Platinum Certified, exquisitely designed property, as well as the spa-like guest cottage with steam, sauna, massage room, outdoor shower and hot tub, await the most discerning of owners. Experience the magic of one of California's most extraordinary private residences...",
					"RESIDENCE 950...San Francisco's Newest Masterpiece. Nestled atop a magical park-like setting on one of the City's largest residential lots, this world-class urban estate has been brilliantly re-imagined for the future. A dramatic 40 foot cantilevered infinity pool reflects the shimmering Bay and glittering lights of the City's famed Skyline, while dazzling views of iconic landmarks from Salesforce Tower to The Transamerica Pyramid and beyond provide a stunning panorama surrounding the fabulous resort-like indoor/ outdoor flow of living, dining and entertainment spaces- easily accommodating 300+ guests. The super-advanced, technology enabled health and wellness environment of this sustainably built LEED Platinum Certified, exquisitely designed property, as well as the spa-like guest cottage with steam, sauna, massage room, outdoor shower and hot tub, await the most discerning of owners. Experience the magic of one of California's most extraordinary private residences..."];
var temp;

window.onload = function()
{
	temp = document.querySelectorAll("body > div:not(#slideshow)");
}

var index = 0;
var index2 = 0;

function getIndex(x) 
{ 
    console.log(Array.from(x.parentNode.children).indexOf(x));
    index2 = Array.from(x.parentNode.children).indexOf(x); 
    index = 0;
	document.getElementById("slideshow").style.top = (document.documentElement.scrollTop + 30) + 'px';

    slide();
}

var count  = 0;

function descriptionExpand()
{
	var desc = document.getElementById('description');
	
	if(desc.style.height == '0px' || count == 0)
	{
		desc.style.height = 'auto';
		desc.style.zIndex = '2';
		desc.style.top = '0px';
		document.getElementById('descriptionBtn').style.transform = 'rotate(90deg)';
		count++;
	}

	else
	{
		desc.style.height = '0px';
		desc.style.zIndex = '-1';
		desc.style.top = '-60px';
		document.getElementById('descriptionBtn').style.transform = 'rotate(-90deg)';
	}
}

function plusSlides(step)
{
	index += step;

	if(index > photos[index2].length - 1)
		index = 0;

	if(index < 0)
		index = photos[index2].length - 1;

	slide();
}

function slide()
{
	document.getElementById("slideshowImg").src = photos[index2][index];
	document.getElementById("slideshow").style.display = "block";
	document.getElementById("street").innerHTML = street[index2];
	document.getElementById("price").innerHTML = price[index2];
	document.getElementById("city").innerHTML = city[index2];
	document.getElementById("bedroom").innerHTML = 'Bedrooms: ' + bedroom[index2];
	document.getElementById("bathroom").innerHTML = 'Bathrooms: ' + bathroom[index2];
	document.getElementById("sqrt").innerHTML = 'Sqrt: ' + sqrt[index2];
	document.getElementById("descriptionText").innerHTML = descriptions[index2];
	pageNumber();
}

function blurOthers()
{

	for (var i = 0; i < temp.length; i++) {
		temp[i].style.filter = 'blur(5px)';
	}

	document.getElementById("footer-wrapper").style.filter = 'blur(5px)';
}

function unBlurOthers() 
{
	
	for (var i = 0; i < temp.length; i++) {
		temp[i].style.filter = 'blur(0px)';
	}

	document.getElementById("footer-wrapper").style.filter = 'blur(0px)';	
}

function pageNumber()
{
	document.getElementById("pageNum").innerHTML = (index + 1) + '/' + photos[index2].length;
}

