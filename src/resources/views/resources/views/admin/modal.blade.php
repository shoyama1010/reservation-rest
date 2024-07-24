<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>モーダル画面の実装</title>
	<link rel="stylesheet" href="{{ asset('css/modal.css') }}">
</head>

<body>
	@include('header')
	<!-- ログインモーダルを開くためのトリック -->
	<input type="checkbox" id="modal-toggle-login" class="modal-toggle">
	<div class="modal">
		<div class="modal-content">
			<span class="close" onclick="document.getElementById('modal-toggle-login').checked = false;">&times;</span>
			@include('auth.login') <!-- ログインフォーム -->
		</div>
	</div>

	<!-- 登録モーダルを開くためのトリック -->
	<input type="checkbox" id="modal-toggle-register" class="modal-toggle">
	<div class="modal">
		<div class="modal-content">
			<span class="close" onclick="document.getElementById('modal-toggle-register').checked = false;">&times;</span>
			@include('auth.register') <!-- 登録フォーム -->
		</div>
	</div>
</body>

</html>