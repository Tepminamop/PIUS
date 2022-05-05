<!DOCTYPE html>
<html>
    <head>
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> 
    </head>
    <body>
    <div class="container-fluid">
        <div class="row">
                @foreach ($tags as $tag)
                    <div class="col-sm-1">
                        <p>{{ $tag->title }}</p>
                    </div>
                @endforeach
            </div>

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
                <div class="row">
                    <div class="col-sm-1" >
                        <p>{{ $curPost->id }}</p>
                    </div>
                    <div class="col-sm-1">
                        <p>{{ $curPost->title }}</p>
                    </div>
                    <div class="col-sm-1">
                        <p>{{ $curPost->code }}</p>
                    </div>
                    <div class="col-sm-3">
                        <p>{{ $curPost->content }}</p>
                    </div>
                    <div class="col-sm-2">
                        <p>{{ $curPost->created_at }}</p>
                    </div>
                    <div class="col-sm">
                        <p>{{ $curPost->author }}</p>
                    </div>
                </div>
        </div> 
    </body>
</html>


