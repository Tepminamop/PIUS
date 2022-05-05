<!DOCTYPE html>
<html>
    <head>
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> 
    </head>
    <body>
    <form method="GET" >
            <p>code filter</p>
            <input type="text" id="codeFilter" name="codeFilter"></input>
            <p>title filter</p>
            <input type="text" id="titleFilter" name="titleFilter"></input>
            <p>tag filter</p>
            <input type="text" id="tagFilter" name="tagFilter"></input>
            <input type="submit"></input>
        </form> 
    <div class="container-fluid">
            <div class="row">
                <div class="col-sm-1" >
                    <p>id</p>
                </div>
                <div class="col-sm-1">
                    <p>title</p>
                </div>
                <div class="col-sm-1">
                    <p>code</p>
                </div>
                <div class="col-sm-3">
                    <p>content</p>
                </div>
                <div class="col-sm-2">
                    <p>created_at</p>
                </div>
                <div class="col-sm">
                    <p>author</p>
                </div>
            </div>
            @foreach($posts as $p)
                <div class="row">
                    <div class="col-sm-1" >
                        <p>{{ $p->id }}</p>
                    </div>
                    <div class="col-sm-1">
                        <p>{{ $p->title }}</p>
                    </div>
                    <div class="col-sm-1">
                        <p>{{ $p->code }}</p>
                    </div>
                    <div class="col-sm-3">
                        <p>{{ $p->content }}</p>
                    </div>
                    <div class="col-sm-2">
                        <p>{{ $p->created_at }}</p>
                    </div>
                    <div class="col-sm">
                        <p>{{ $p->author }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $posts->withQueryString()->links('pagination::bootstrap-5') }} 
    </body>
</html>