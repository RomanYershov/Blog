@extends('layouts.app')
@section('content')

    <div class="container">
        <h1 class="text-center">Latest news</h1>
        @foreach($news as $n)
            <div class="news">
                <img src="{{$n->image}}" alt="">
                <h2 class="text-center">News title</h2>
                <p>{{$n->text}}</p>
                <div class="date">{{$n->created_at}}</div>
                <div class="author">{{$n->user->name}}</div>
                <h3 class="text-center">Comments</h3>
                <div class="comments">
                    <div class="comment text-center" >
                        <div class="text">
                            @foreach($n->comments as $comment)
                                <p>{{$comment->comment}}</p>
                                <h4>{{$comment->user->name}}</h4>
                                @endforeach
                        </div>


                    </div>
                    <form action="/comment" method="POST">
                        {{csrf_field()}}
                        <textarea name="comment" id="" cols="100" rows="10" class="text-center"></textarea><br>
                        <input type="hidden" value="{{$n->id}}" name="news_id">
                        <input type="submit">
                    </form>
                </div>
            </div>
        @endforeach
    </div>
 {{$news->links()}}
@endsection

<style>
    .comments{
        margin: 50px 0;
    }
    .comentee{
        float: right;
    }
    .news{
        background-color: #eee;
        height: auto;
        padding: 20px;
        border-radius: 50px;
        margin-bottom: 15px;
    }
    .author{
        float: right;
        border-radius: 20px;
        padding: 5px;
        background-color: #2a88bd;
        color: wheat;

    }
   .news img{
       height: 200px;
        float: left;
        margin: 50px;
    }
    p{
        text-align: justify;
    }
    h2{
        font-weight: bold;
        font-style: italic;
        margin: 0px;
    }
</style>