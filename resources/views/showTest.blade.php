<style>
    .smallLi {
        list-style: none;
        margin-left: -25px;
        padding: 8px 0;
    }

    .bigLi {
        margin-bottom: 15px;
    }
</style>
<div><a href="{{route('client.getActivesTests')}}">Назад</a></div>
<div class="title"><h1>Тест: "{{$test->name}}"</h1></div>
<div class="container">
    <form action="" method="POST">
        {{csrf_field()}}
        @include('parts.listQuestions')
        @if($test->questions->where('active', 1)->first())
        <div><input type="submit" value="Завершить"></div>
        @endif
    </form>
</div>