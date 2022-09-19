$(function(){
    positionSidebar()
	openSidebar();
	closeSidebar();
	dropdownMenu();
});

function positionSidebar(){
	var displayHeight = $(window).height()-179;
	$("#mySidebar").height(displayHeight);

	$(window).scroll(function(){
		var scrollTop = $(this).scrollTop();
		if(scrollTop > 180){
			document.getElementById("mySidebar").style.position = "fixed";
			document.getElementById("mySidebar").style.top = "0";
			document.getElementById("buttonOpen").style.position = "fixed";
			document.getElementById("buttonOpen").style.top = "5px";
			document.getElementById("mySidebar").style.height = (displayHeight + 179)+"px";
		} else {
			document.getElementById("mySidebar").style.position = "static";
			document.getElementById("buttonOpen").style.position = "static";
			document.getElementById("mySidebar").style.height = (displayHeight + scrollTop)+"px";
		}
	});
}

function openSidebar(){
	$('.openbtn').click(function(){
		document.getElementById("mySidebar").style.width = "250px";
		if (window.matchMedia("(min-width: 540px)").matches) {
			document.getElementById("main").style.marginRight = "250px";
		} else {
			document.getElementById("main").style.display = "none";
		}
		document.getElementById("buttonOpen").style.display = "none";
	});
}

function closeSidebar(){
	$('.closebtn').click(function(){
		document.getElementById("mySidebar").style.width = "0";
		if (window.matchMedia("(min-width: 540px)").matches) {
			document.getElementById("main").style.marginRight = "40px";
		} else {
			document.getElementById("main").style.display = "block";
		}
		document.getElementById("main").style.marginRight = "40px";
		document.getElementById("buttonOpen").style.display = "block";
	});
}

function dropdownMenu(){
	var dropdown = document.getElementsByClassName("dropdown-btn");
	var i;
	for (i = 0; i < dropdown.length; i++) {
		dropdown[i].addEventListener("click", function() {
			this.classList.toggle("active");
			var dropdownContent = this.nextElementSibling;
			if (dropdownContent.style.display === "none") {
				dropdownContent.style.display = "block";
			} else {
				dropdownContent.style.display = "none";
			}
		});
	}
}