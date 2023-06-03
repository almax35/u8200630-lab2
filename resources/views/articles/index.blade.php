<!DOCTYPE html>
<html>
<head>
    <title>Список статей</title>
</head>
<body>
    <h1>Список статей</h1>

    <form action="{{ route('articles.index') }}" method="get">
        <label for="slug">Символьный код:</label>
        <input type="text" name="slug" id="slug" value="{{ request('slug') }}" />

        <label for="title">Название:</label>
        <input type="text" name="title" id="title" value="{{ request('title') }}" />

        <label for="tag">Тег:</label>
        <input type="text" name="tag" id="tag" value="{{ request('tag') }}" />

        <button type="submit">Фильтровать</button>
    </form>

    <ul>
        @foreach ($articles as $article)
            <li>
                <strong>{{ $article->title }}</strong><br>
                <em>Символьный код:</em> {{ $article->slug }}<br>
                <em>Дата создания:</em> {{ $article->created_at }}<br>
                <!-- Если фильтруем по запросу,то выводим все поля и теги-->
                @if (request('slug') && $article->slug === request('slug'))
                    <em>Теги:</em>
                    @forelse ($article->tags->sortBy('name') as $tag)
                        {{ $tag->name }}
                        @if (!$loop->last)
                            ,
                        @endif
                    @empty
                        Нет тегов
                    @endforelse
                @endif
            </li>
        @endforeach
    </ul>
    {{ $articles->links() }}
</body>
</html>