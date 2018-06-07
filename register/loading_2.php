<!-- コイン回転アニメーション試作 -->

<!DOCTYPE html>
<html>
<head>
	<style>
		.container {
			width: 100% ;
			height: 100% ;
			line-height: 100% ;
			text-align: center ;
		}

		.logo {
			width: 200px;
			transition: .5s ;
			transform: rotateY( 0deg ) ;
			animation: load 2s linear infinite;
		}

    @keyframes load{
        from{
            transform:rotateY(0deg);
            }
        to{
            transform:rotateY(360deg);
        }
    }

	</style>
</head>
<body>
<!-- テキスト -->
<div class="container">
	<p class="logo">AAOAA</p>
</div>

<!-- 画像 -->
<p class="container">
	<img class="img-circle logo" src="../assets/img/philia2.png">
</p>
</body>
</html>