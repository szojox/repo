function pokaz_tekst(id, tekst){
$(id).html(tekst);

}
	function pokaz(id)
{
$(document).ready(function(){
									 $(id).fadeIn("slow");
								});
    }



function ukryj(id) {
	$(document).ready(function(){
									 $(id).fadeOut("slow");
								});
}

function wjedz(id) {
 $(document).ready(function(){
	$(id).fadeIn("fast");
  $(id).animate({left: "50%",opacity:"1"},"fast");

});



}

function wyjedz(id) {
 $(document).ready(function(){
	
  $(id).animate({left: "-50%",opacity:"1"},"fast");
$(id).fadeOut("fast");
});

}

function image(plik, div_id) {
    newImage = new Image();
    
    newImage.src = "http://localhost/"+ plik + "?time=" + new Date().getTime();
document.getElementById(div_id).style.backgroundImage = "url("+newImage.src+")";
}



var pasek_gora = false;
var pasek_dol = false;
var tekst_pasek_dol = `<?php $homepage = file_get_contents('http://localhost/tekst_pasek_dol.txt'); echo $homepage; ?>`;

var video_baza = true;
var logo = true;
var animacja = pasek_gora;
var dol_reklama = false;

if(pasek_dol != check_dol && pasek_dol == true)
{image("grafika.png","pasek_dol");}

if(pasek_gora != check_gora && pasek_gora == true)
{image("belka_gora_img.png","animacja");}

if(logo != check_logo && logo == true)
{image("logo.png","logo");}

if(dol_reklama != check_dol_reklama && dol_reklama == true)
{image("dol_reklama.png","dol_reklama");}

var check_dol_reklama = dol_reklama;
var check_logo = logo;
var check_dol = pasek_dol;
var check_gora = pasek_gora;

var animacja_jest;
					if(animacja == true && animacja_jest == false){	pokaz('#animacja');animacja_jest = true;}
									if(animacja == false){ukryj('#animacja');animacja_jest = false;}

var pasek_dol_jest;
					if(pasek_dol == true && pasek_dol_jest == false){	wjedz('#pasek_dol'); pokaz_tekst('#tekst_pasek_dol', tekst_pasek_dol); pasek_dol_jest = true;}
									if(pasek_dol == false){wyjedz('#pasek_dol');pasek_dol_jest = false;}



var logo_jest;
					if(logo == true && logo_jest == false){	pokaz('#logo'); logo_jest = true;}
									if(logo == false){ukryj('#logo');logo_jest = false;}


var dol_reklama_jest;
					if(dol_reklama == true && dol_reklama_jest == false){	pokaz('#dol_reklama');dol_reklama_jest = true;}
									if(dol_reklama == false){ukryj('#dol_reklama');dol_reklama_jest = false;}
