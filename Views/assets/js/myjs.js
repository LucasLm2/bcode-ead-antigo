$(function(){
	activeMenu();
});

function activeMenu(){
	var url_atual = window.location.href;
	url_atual = url_atual.split('/');
	$('a[identifier]').each(function(){
		var el = $(this);
		for (let index = 0; index < url_atual.length; index++) {
			if (el.attr('identifier') == url_atual[index]) {
				el.addClass('active');
			}
		}
	});
}