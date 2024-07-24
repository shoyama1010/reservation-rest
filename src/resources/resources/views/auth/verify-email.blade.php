<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>メールアドレスの確認</title>
	<link rel="stylesheet" href="{{ asset('css/verify-email.css') }}">
</head>

<body>
	<div class="container">
		<div class="header">
			<h1>メールアドレスの確認</h1>
		</div>
		<div class="content">
			<p>続行する前に、メールで送信された確認リンクをクリックしてください。</p>
			<p>もしメールが届かない場合は、再度送信ボタンをクリックしてください。</p>

			@if (session('resent'))
			<p style="color: green;">新しい確認リンクがあなたのメールアドレスに送信されました。</p>
			@endif

			<form method="POST" action="{{ route('verification.resend') }}">
				@csrf
				<button type="submit" class="button">確認メールを再送信</button>
			</form>
		</div>
	</div>
</body>

</html>