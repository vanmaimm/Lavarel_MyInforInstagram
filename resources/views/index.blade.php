<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style type="text/css">
    .oneline {
        display: inline;
    }
    </style>
</head>

<body>
    <div class="container">
        <h1>This is my Instagram</h1>
        <form action="/photos/create" method="GET" role="form">
            @csrf
            <button type="submit" class="btn btn-primary disabled"><i class="fa fa-plus-circle"></i></button>
        </form>
        <hr>
        <div class="row">
            <br>
            @foreach($photo as $photo)
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <img src="storage/{{$photo->image}}" class="img-responsive" style="width:200px; height:250px"
                            alt="a" />
                    </div>
                    <div class="card-header"><b>{{$photo->title}}</b>
                        <br> {{$photo->description}}
                        <form action="/photos/{{$photo->id}}/edit" method="get">
                            @csrf
                            <button type="submit"><i class="fa fa-pencil"></i></button>
                        </form>
                        <form action="/photos/{{$photo->id}}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button type="submit"><i class="fa fa-remove"></i></button>
                        </form>
                    </div>
                    <div class="card-footer" style="display:inline">
                        @foreach($comment as $comments)
                        <p>
                            <?php
                                if($comments->photo_id==$photo->id){
                                echo $comments->name.": ".$comments->message;
                                }
                            ?>
                        </p>
                        @endforeach
                        <span id="demo" name="demo"></span>
                        <form action="/photos/{{$photo->id}}" method="POST">
                            @csrf
                            <input name="comment" id="comment" class="form-control" value="" title="">
                            <button type="submit"><i class="fa fa-arrow-right"></i></button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>