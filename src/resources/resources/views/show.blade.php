@extends('layouts.app')

<!-- ５段階評価とコメント -->
@section('content')
<div class="container">
	<h1>{{ $shop->name }}</h1>
	<p>{{ $shop->description }}</p>

	<h2>レビュー</h2>
	@foreach($reviews as $review)
	<div class="review">
		<strong>{{ $review->user->name }}</strong>
		<span>{{ $review->rating }} / 5</span>
		<p>{{ $review->comment }}</p>
	</div>
	@endforeach

	@auth
	<h2>レビューを投稿</h2>
	<form method="POST" action="{{ route('reviews.store', $shop->id) }}">
		@csrf
		<div class="form-group">
			<label for="rating">評価</label>
			<select name="rating" id="rating" required>
				<option value="">選択してください</option>

				@for ($i = 1; $i <= 5; $i++) <option value="{{ $i }}">{{ $i }}</option>
					@endfor
			</select>
		</div>
		<div class="form-group">
			<label for="comment">コメント</label>
			<textarea name="comment" id="comment"></textarea>
		</div>
		<button type="submit">送信</button>
	</form>
	@endauth
</div>
@endsection