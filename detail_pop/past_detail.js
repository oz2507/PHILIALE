$(function(){

$(".modal-open-past").click(function(){
	// console.log("modal-open");
	//キーボード操作などにより、オーバーレイが多重起動するのを防止する
	//ボタンからフォーカスを外す
	$(this).blur() ;

	//現在のモーダルウィンドウを削除して新しく起動する [上とどちらか選択]
	if($("#modal-overlay")[0]) $("#modal-overlay").remove() ;

	//オーバーレイ用のHTMLコードを、[body]内の最後に生成する
	$("body").append('<div id="modal-overlay"></div>');

	//[$modal-overlay]をフェードインさせる
	$("#modal-overlay").fadeIn("slow");

	// コンテンツをセンター配置するのを呼ぶ
	centeringModalSyncer();

	//[$modal-content]をフェードインさせる
	$("#modal-content-past").fadeIn("slow");

	//[#modal-overlay]、または[#modal-close]をクリックしたら…
	$( "#modal-overlay,#modal-close" ).unbind().click( function(){

		//[#modal-content-past]と[#modal-overlay]をフェードアウトした後に…
		$( "#modal-content-past,#modal-overlay" ).fadeOut( "slow" , function(){

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

	var cw = $( "#modal-content-past" ).outerWidth();
	var ch = $( "#modal-content-past" ).outerHeight();

	// 真ん中に配置するために左から何px離せばいいかを計算し変数に格納
	var pxleft = ((w - cw)/2);

	// 真ん中に配置するために上から何px離せばいいかを計算し変数に格納
	var pxtop = ((h - ch)/2);

	// #modal-content-pastのCSSにleftの値をpxleftを使って設定
	$("#modal-content-past").css({"left": pxleft + "px"});

	// #modal-content-pastのCSSにtopの値をpxtopを使って設定
	$("#modal-content-past").css({"top": pxtop + "px"});

	}

} ) ;
