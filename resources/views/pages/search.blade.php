@extends ('layouts.page')

@section('pagecontent')
<h1>Search Results for <span style="text-decoration:underline;">{{$query}}</span></h1>


@if(!$articles->isEmpty())
<h2>Articles</h2>
<div class="row">
	@foreach($articles as $article)
	<div class="col col-md-4 search-article">
		<a href="/article/{{$article->slug}}">{{$article->title}}</a>
	</div>
	@endforeach
</div>
@else
<p>No articles found.</p>
@endif

@stop