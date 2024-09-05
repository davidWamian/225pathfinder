html
<head>
    <title>{{ $company->title }}</title>
    <meta name="description" content="{{ $metaDescription }}">
    <meta name="keywords" content="{{ $metaKeywords }}">
    <!-- Autres balises meta -->
</head>

<form action="{{ route('articles.search') }}" method="GET">
    <input type="text" name="query" placeholder="Rechercher des articles..." required>
    <button type="submit">Rechercher</button>
</form>

php
@if($articles->isNotEmpty())
    @foreach($articles as $article)
        <div class="article">
            <h2>{{ $article->title }}</h2>
            <p>{{ $article->content }}</p>
        </div>
    @endforeach
@else
    <p>Aucun article trouvé pour votre recherche.</p>
@endif
