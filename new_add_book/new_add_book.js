// 読んだ本

$(function(){

$(".modal-open").click(function(){

	//キーボード操作などにより、オーバーレイが多重起動するのを防止する
	//ボタンからフォーカスを外す
	$(this).blur() ;

	//現在のモーダルウィンドウを削除して新しく起動する [上とどちらか選択]
	if($("#modal-overlay")[0]) $("#modal-overlay").remove() ;

	//オーバーレイ用のHTMLコードを、[body]内の最後に生成する
	$("body").append('<div id="modal-overlay"></div>');

	//[$modal-overlay]をフェードインさせる
	$("#modal-overlay").fadeIn("slow");

	//[$modal-content]をフェードインさせる
	$("#modal-content").fadeIn("slow");

	//[#modal-overlay]、または[#modal-close]をクリックしたら…
	$( "#modal-overlay,#modal-close" ).unbind().click( function(){

		//[#modal-content]と[#modal-overlay]をフェードアウトした後に…
		$( "#modal-content,#modal-overlay" ).fadeOut( "slow" , function(){

			//[#modal-overlay]を削除する
			$('#modal-overlay').remove() ;

		} ) ;

	} ) ;

} ) ;


//リサイズされたら、センタリングをする関数[centeringModalSyncer()]を実行する
$( window ).resize( centeringModalSyncer ) ;

// センターにするには片側の余白を計算し、話すひつお用がある
// センターに配置するための関数
function centeringModalSyncer(){

	// 画面の幅を取得し変数に格納
	var w2 = $(window).width();

	// 画面の高さを取得し変数に格納
	var h2 = $(window).height();

	// コンテンツの幅を取得し変数に格納
	// var cw = $("#modal-content-past").outerWidth({margin:true});

	// コンテンツの高さを取得し変数に格納
	// var ch = $("#modal-content-past").outerHeight({margin:true});

	var cw2 = $( ".modal-content" ).outerWidth();
	var ch2 = $( ".modal-content" ).outerHeight();

	// 真ん中に配置するために左から何px離せばいいかを計算し変数に格納
	var pxleft2 = ((w2 - cw2)/2);

	// 真ん中に配置するために上から何px離せばいいかを計算し変数に格納
	var pxtop2 = ((h2 - ch2)/2);

	// #modal-content-pastのCSSにleftの値をpxleftを使って設定
	$(".modal-content").css({"left": pxleft2 + "px"});

	// #modal-content-pastのCSSにtopの値をpxtopを使って設定
	$(".modal-content").css({"top": pxtop2 + "px"});

	}

} ) ;







$(function(){

$(".book_add_btn").click(function(){

	//modal_contentをフェードアウト
	$( "#modal-content" ).fadeOut() ;


	//キーボード操作などにより、オーバーレイが多重起動するのを防止する
	//ボタンからフォーカスを外す
	$(this).blur() ;

	//オーバーレイ用のHTMLコードを、[body]内の最後に生成する
	$("body").append('<div id="modal-overlay"></div>');


	// コンテンツをセンター配置するのを呼ぶ
	centeringModalSyncer();

	//[$modal-content]をフェードインさせる
	$("#modal-content2").fadeIn("slow");

	//[#modal-overlay]、または[#modal-close]をクリックしたら…
	$( "#modal-overlay,#modal-close" ).unbind().click( function(){

		//[#modal-content]と[#modal-overlay]をフェードアウトした後に…
		$( "#modal-content2,#modal-overlay" ).fadeOut( "slow" , function(){

			//[#modal-overlay]を削除する
			$('#modal-overlay').remove() ;

		} ) ;

	} ) ;

} ) ;


//リサイズされたら、センタリングをする関数[centeringModalSyncer()]を実行する
$( window ).resize( centeringModalSyncer ) ;

// センターにするには片側の余白を計算し、話すひつお用がある
// センターに配置するための関数
function centeringModalSyncer(){

	// 画面の幅を取得し変数に格納
	var w = $(window).width();

	// 画面の高さを取得し変数に格納
	var h = $(window).height();

	// コンテンツの幅を取得し変数に格納
	// var cw = $("#modal-content-past").outerWidth({margin:true});

	// コンテンツの高さを取得し変数に格納
	// var ch = $("#modal-content-past").outerHeight({margin:true});

	var cw = $( ".modal-content2" ).outerWidth();
	var ch = $( ".modal-content2" ).outerHeight();

	// 真ん中に配置するために左から何px離せばいいかを計算し変数に格納
	var pxleft = ((w - cw)/2);

	// 真ん中に配置するために上から何px離せばいいかを計算し変数に格納
	var pxtop = ((h - ch)/2);

	// #modal-content-pastのCSSにleftの値をpxleftを使って設定
	$(".modal-content2").css({"left": pxleft + "px"});

	// #modal-content-pastのCSSにtopの値をpxtopを使って設定
	$(".modal-content2").css({"top": pxtop + "px"});

	}

} ) ;


// 読みたい本

$(function(){

$(".modal-open2").click(function(){

	//キーボード操作などにより、オーバーレイが多重起動するのを防止する
	//ボタンからフォーカスを外す
	$(this).blur() ;

	//現在のモーダルウィンドウを削除して新しく起動する [上とどちらか選択]
	if($("#modal-overlay")[0]) $("#modal-overlay").remove() ;

	//オーバーレイ用のHTMLコードを、[body]内の最後に生成する
	$("body").append('<div id="modal-overlay"></div>');

	//[$modal-overlay]をフェードインさせる
	$("#modal-overlay").fadeIn("slow");

	//[$modal-content]をフェードインさせる
	$("#modal-content3").fadeIn("slow");

	//[#modal-overlay]、または[#modal-close]をクリックしたら…
	$( "#modal-overlay,#modal-close" ).unbind().click( function(){

		//[#modal-content]と[#modal-overlay]をフェードアウトした後に…
		$( "#modal-content3,#modal-overlay" ).fadeOut( "slow" , function(){

			//[#modal-overlay]を削除する
			$('#modal-overlay').remove() ;

		} ) ;

	} ) ;

} ) ;


//リサイズされたら、センタリングをする関数[centeringModalSyncer()]を実行する
$( window ).resize( centeringModalSyncer ) ;

// センターにするには片側の余白を計算し、話すひつお用がある
// センターに配置するための関数
function centeringModalSyncer(){

	// 画面の幅を取得し変数に格納
	var w2 = $(window).width();

	// 画面の高さを取得し変数に格納
	var h2 = $(window).height();

	// コンテンツの幅を取得し変数に格納
	// var cw = $("#modal-content-past").outerWidth({margin:true});

	// コンテンツの高さを取得し変数に格納
	// var ch = $("#modal-content-past").outerHeight({margin:true});

	var cw2 = $( ".modal-content3" ).outerWidth();
	var ch2 = $( ".modal-content3" ).outerHeight();

	// 真ん中に配置するために左から何px離せばいいかを計算し変数に格納
	var pxleft2 = ((w2 - cw2)/2);

	// 真ん中に配置するために上から何px離せばいいかを計算し変数に格納
	var pxtop2 = ((h2 - ch2)/2);

	// #modal-content-pastのCSSにleftの値をpxleftを使って設定
	$(".modal-content3").css({"left": pxleft2 + "px"});

	// #modal-content-pastのCSSにtopの値をpxtopを使って設定
	$(".modal-content3").css({"top": pxtop2 + "px"});

	}

} ) ;







$(function(){

$(".book_add_btn2").click(function(){

	//modal_contentをフェードアウト
	$( "#modal-content3" ).fadeOut() ;


	//キーボード操作などにより、オーバーレイが多重起動するのを防止する
	//ボタンからフォーカスを外す
	$(this).blur() ;

	//オーバーレイ用のHTMLコードを、[body]内の最後に生成する
	$("body").append('<div id="modal-overlay"></div>');


	// コンテンツをセンター配置するのを呼ぶ
	centeringModalSyncer();

	//[$modal-content]をフェードインさせる
	$("#modal-content4").fadeIn("slow");

	//[#modal-overlay]、または[#modal-close]をクリックしたら…
	$( "#modal-overlay,#modal-close" ).unbind().click( function(){

		//[#modal-content]と[#modal-overlay]をフェードアウトした後に…
		$( "#modal-content4,#modal-overlay" ).fadeOut( "slow" , function(){

			//[#modal-overlay]を削除する
			$('#modal-overlay').remove() ;

		} ) ;

	} ) ;

} ) ;


//リサイズされたら、センタリングをする関数[centeringModalSyncer()]を実行する
$( window ).resize( centeringModalSyncer ) ;

// センターにするには片側の余白を計算し、話すひつお用がある
// センターに配置するための関数
function centeringModalSyncer(){

	// 画面の幅を取得し変数に格納
	var w = $(window).width();

	// 画面の高さを取得し変数に格納
	var h = $(window).height();

	// コンテンツの幅を取得し変数に格納
	// var cw = $("#modal-content-past").outerWidth({margin:true});

	// コンテンツの高さを取得し変数に格納
	// var ch = $("#modal-content-past").outerHeight({margin:true});

	var cw = $( ".modal-content4" ).outerWidth();
	var ch = $( ".modal-content4" ).outerHeight();

	// 真ん中に配置するために左から何px離せばいいかを計算し変数に格納
	var pxleft = ((w - cw)/2);

	// 真ん中に配置するために上から何px離せばいいかを計算し変数に格納
	var pxtop = ((h - ch)/2);

	// #modal-content-pastのCSSにleftの値をpxleftを使って設定
	$(".modal-content4").css({"left": pxleft + "px"});

	// #modal-content-pastのCSSにtopの値をpxtopを使って設定
	$(".modal-content4").css({"top": pxtop + "px"});

	}

} ) ;



