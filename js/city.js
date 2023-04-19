/**
* Philippine Provinces & Cities/Municipalities on HTML Dropdown
*
* @ version 1.0.0
* @ author Marvic R. Macalintal
*/
var cities = {
	'Jizzax' : [
		'Arnasoy','Baxmal','Dostlik','Gallaorol','Forish','Mirzachol','Paxtakor','Zomin','Zafarobod','Yangiobod','Sharof Rashidov','Zarbdor'
		],
	'Sirdaryo' : [
		'Boyovut', 'Guliston', 'Oqoltin', 'Sardoba', 'Sayxunobod', 'Sirdaryo', 'Xovos','Yangiyer'
		],
	'Toshkent' : [
		'Bektemir', 'Chilonzor', 'Mirobod', 'Mirzo Ulugbek', 'Olmazor', 'Sergeli','Shayhontohur','Uchtepa','Yakkasaroy','Yashnaobod','Yunusobod'
		],
	'Andijon' : [
		'Andijon', 'Asaka', 'Baliqchi', 'Boz','Buloqboshi.'
		],
	'Fargona' : [
		'Beshariq' , 'Bogdod' , 'Buvayda', 'Dangara', 'Furqat','Oltiariq'
		],
	'Samarqand' : [
		'Bulungur' ,'Ishtixon' ,'Jomboy ','Kattaqorgon' ,'Narpay',' Nurobod' ,'Oqdaryo' ,'Pastdargom' ,'Paxtachi',' Poyariq','Qoshrabot'
		],
	'Namangan' : [
		'Chortoq' , 'Chust' , 'Kosonsoy', 'Mingbuloq', 'Namangan','Norin'
		]
 }

 var City = function() {

	this.p = [],this.c = [],this.a = [],this.e = {};
	window.onerror = function() { return true; }
	
	this.getProvinces = function() {
		for(let province in cities) {
			this.p.push(province);
		}
		return this.p;
	}
	this.getCities = function(province) {
		if(province.length==0) {
			console.error('Please input province name');
			return;
		}
		for(let i=0;i<=cities[province].length-1;i++) {
			this.c.push(cities[province][i]);
		}
		return this.c;
	}
	this.getAllCities = function() {
		for(let i in cities) {
			for(let j=0;j<=cities[i].length-1;j++) {
				this.a.push(cities[i][j]);
			}
		}
		this.a.sort();
		return this.a;
	}
	this.showProvinces = function(element) {
		var str = '<option selected disabled>Select Province</option>';
		for(let i in this.getProvinces()) {
			str+='<option>'+this.p[i]+'</option>';
		}
		this.p = [];		
		document.querySelector(element).innerHTML = '';
		document.querySelector(element).innerHTML = str;
		this.e = element;
		return this;
	}
	this.showCities = function(province,element) {
		var str = '<option selected disabled>Select City / Municipality</option>';
		var elem = '';
		if((province.indexOf(".")!==-1 || province.indexOf("#")!==-1)) {
			elem = province;
		}
		else {
			for(let i in this.getCities(province)) {
				str+='<option>'+this.c[i]+'</option>';
			}
			elem = element;
		}
		this.c = [];
		document.querySelector(elem).innerHTML = '';
		document.querySelector(elem).innerHTML = str;
		document.querySelector(this.e).onchange = function() {		
			var Obj = new City();
			Obj.showCities(this.value,elem);
		}
		return this;
	}
}
