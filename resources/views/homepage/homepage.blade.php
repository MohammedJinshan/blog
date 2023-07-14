<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div>
        <h1>Blog</h1>
        <div>
            <h3>Articles </h3>
        </div>
        <div>
            <table class="table" id="">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Image</th>

                    </tr>

                </thead>

                <tbody>
                    @foreach ($articles as $article)
                        <tr>
                            <td>{{ $article->id }}</td>
                            <td>{{ $article->title ?? '--' }}</td>
                            <td>{{ $article->description ?? '--' }}</td>
                            <td><img src={{ $article->image }} alt="Girl in a jacket" width="50" height="50">
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div>
            <h3>Categories </h3>
        </div>
        <div>
            <table class="table" id="">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                    </tr>

                </thead>

                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->title ?? '--' }}</td>
                            <td>{{ $category->article->title ?? 'No tag Found !' }}</td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div>
            <h3>Tags </h3>
        </div>
        <div>
            <table class="table" id="">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>

                    </tr>

                </thead>

                <tbody>
                    @foreach ($tags as $tag)
                        <tr>
                            <td>{{ $tag->id }}</td>
                            <td>{{ $tag->title ?? '--' }}</td>
                            <td>{{ $tag->article->title ?? 'No tag Found !' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
