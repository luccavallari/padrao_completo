//========================================================================
//                                FUNÇÕES
//========================================================================
function sticky_footer() {
	var mFoo = $("footer");
	if ((($(document.body).height() + mFoo.outerHeight()) < $(window).height() && mFoo.css("position") == "fixed") || ($(document.body).height() < $(window).height() && mFoo.css("position") != "fixed")) {
		mFoo.css({ position: "fixed", bottom: "0px" });
	} else {
		mFoo.css({ position: "static" });
	}
}

function selecionaImg(el){
	var inp = document.getElementById(el);
	$('.img-container > img').attr({'src':$(inp).val()});
	$('.img-container').removeClass('esconde');
	$("#modalImages").modal('hide');
}

function alturaAside(){
	var altHeader = $("header").height(),
		largTela = $(window).width(),
		altFooter = $("footer").height(),
		altLi = $("ul.nav-pills li").outerHeight(),
		altLogo = $("#logo").outerHeight(),
		altTela = $(window).height(),
		altAside = altTela - (altHeader + altFooter);
		// altAside = altTela - (altLogo + altLi);
	if(largTela <= 767){
		if($("aside #abreFechaMenu").hasClass('active'))
			$("aside").css({'min-height':altTela, 'margin-left': 0});
		else
			$("aside").css({'min-height':altTela, 'margin-left': -300});
	}
	else{
		$("aside").css({'min-height':altAside, 'margin-left': 0});
	}
}

function linkTopAtivo(link) {
    if (!($(link).parent().hasClass("active"))) {
        $("ul.navbar-nav li a").parent().removeClass("active");
        $(link).parent().addClass("active");
    }
}

function linkLatAtivo(link) {
    if (!($(link).parent().hasClass("active"))) {
        $("ul.nav-pills li a").parent().removeClass("active");
        $(link).parent().addClass("active");
    }
}



//************************************************************************
//                            INÍCIO DO SCRIPT
//************************************************************************
$(document).ready(function()
{
	$('#example').DataTable({
		responsive: true,
		language:{
			"url": "//cdn.datatables.net/plug-ins/1.10.9/i18n/Portuguese-Brasil.json"
		},
		order: [[0, 'desc']]
	});


	sticky_footer();
	alturaAside();
	$(window).scroll(function(){
		sticky_footer();
		alturaAside();
	});
	$(window).resize(function(){
		sticky_footer();
		alturaAside();
	});
	$(window).load(function(){
		sticky_footer();
		alturaAside();
	});

	$("ul.navbar-nav li a").click(function(event){
		event.preventDefault();
		linkTopAtivo(this);
	});

	$("ul.nav-pills li a").click(function(event){
		event.preventDefault();
		linkLatAtivo(this);
	});

	$("#mostraSenha").click(function(e){
		e.preventDefault();
		$("#mostraSenha span").toggleClass('exibirS');

		if($("#mostraSenha span").hasClass('exibirS')){
			$("#txtSenha").attr('type','text');
			$("#mostraSenha span").removeClass('glyphicon-eye-open').addClass('glyphicon-eye-close');
		}
		else{
			$("#txtSenha").attr('type','password');
			$("#mostraSenha span").removeClass('glyphicon-eye-close').addClass('glyphicon-eye-open');
		}
	});

	$("#txtCPF").mask("000.000.000-00").blur(function(){
		if($(this).length < 14)
			$(this).val("");
	});

	$("#txtTelefone").mask("(00)0000-0000").blur(function(){
		if($(this).length < 12)
			$(this).val("");
	});

	$("#txtCelular").mask("(00)00000-0009").blur(function(){
		if($(this).length < 12)
			$(this).val("");
	});

	$("#txtNum").mask("999999");

	$("#abreFechaMenu").click(function(){
		$(this).toggleClass('active');

		if($(this).hasClass('active')){
			$("aside").animate({'margin-left':'0px'});
		}
		else{
			$("aside").animate({'margin-left':'-300px'});
		}
	});

	$('[data-toggle="tooltip"]').tooltip();

	$("#formFoto").submit(function(){
		// e.preventDefault();
		var url = "http://localhost:8080/monteiroformaturas/controle/home/upload/",
			dados = new FormData($("#formFoto")[0]);
			dados.append('nome', "IMAGEM DO CORAÇÃO");
			dados.append('csrf_test_name', $("input[name='csrf_test_name']").val());

		$.ajax({
			url: url,
			type: 'POST',
			dataType: 'json',
			data: dados,
			cache: false,
			contentType: false,
			processData: false,
			xhr: function() {
				var xhr = $.ajaxSettings.xhr();

				xhr.upload.addEventListener("progress", function(evt) {
					if (evt.lengthComputable) {
						var percent = Math.round( (evt.loaded / evt.total) * 100 );
						$(".progress").removeClass('esconde');
						$(".progress-bar").attr({"aria-valuenow": percent}).css({width:percent+"%"}).html(percent+"%");
						console.log('Percentual atual: ' + percent);
					}
				}, false);

				return xhr;
			},
			success: function(dados){
				console.table(dados);
				$(".progress").addClass('esconde');
				$(".img-container > img").attr("src", dados.img);
				$(".img-container, .img-preview").removeClass('esconde');
			},
			error: function(er)
			{
				alert('Erro ao realizar o upload.');
				console.log(er.responseText);
			}
		})
		// .done(function() {
		//$("#formFoto").append("<img src='"+resp.img+"'>");
		// });
	// 	.fail(function() {
	// 		console.log("error");
	// 	})
	// 	.always(function() {
	// 		console.log("complete");
	// 	});
		return false;
	});

	$("#abreGaleria").click(function(){
		var url = 'upload.php';
		$.ajax({
			url: url,
			type: 'POST',
			dataType: 'json',
			data: {value: '1'},
			success: function(dados){
				console.log(dados.msg);
				$("#modalImages .modal-body").html(dados.thumbs);
			},
			error: function(er){
				alert("Erro ao buscar as imagens");
				console.log(er.responseText);
			}
		});
	});

	$("#formCat").submit(function(){
		var link = "http://localhost:8080/monteiroformaturas/controle/galeria/insereCategoria/",
			dados = $(this).serialize();

		$.ajax({
			url: link,
			type: 'POST',
			dataType: 'json',
			data: dados,
			success: function(resp){
				if(resp.msg!="OK"){
					alert("Ocorreu um erro ao inserir as informações. Por favor, tente novamente mais tarde!");
					console.log(resp.msg);
					console.table(resp);
				}
				else
				{
					alert("Cadastro realizado com Sucesso!");
					window.location = "http://localhost:8080/monteiroformaturas/controle/galeria/categoria/";
				}
			},
			error: function(er){
				console.log(er.responseText);
			}
		});
		return false;
	});
	// function selecionaImg(el){
	// 	$('.img-container > img').attr('src',$(el).val());
	// 	$("#modalImages").modal('hide');
	// }

	$(".imgSel").change(function(){
		$('.img-container > img').attr('src',$(this).val());
		$("#modalImages").modal('hide');
	});

	// $(".img-container > img").cropper({
	// 	aspectRatio: 16 / 9,
	// 	preview: ".img-preview",
	// 	crop: function(data) {
	// 		$("#dataX").val(Math.round(data.x));
	// 		$("#dataY").val(Math.round(data.y));
	// 		$("#dataHeight").val(Math.round(data.height));
	// 		$("#dataWidth").val(Math.round(data.width));
	// 		$("#dataRotate").val(Math.round(data.rotate));
	// 	}
	// });

});