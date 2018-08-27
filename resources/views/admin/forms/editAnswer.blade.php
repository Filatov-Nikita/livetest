<div class="back"><a href="{{route('admin.showTestPage', ['id' => $test_id])}}">Назад</a></div>
<div class="title"><h2> Редактирование ответа: "{{$answer->text}}"</h2></div>
<div class="container">
    <form action="" method="POST">
        {{csrf_field()}}
        <div><label for="text">Текст</label> <input type="text" name="text" id="text" value="{{$answer->text}}"></div>
        <div><label for="correct">Правильный ответ?</label> <input type="checkbox" name="correct" id="correct" {{$answer->correct ? 'checked' : NULL}}></div>
        <input type="submit" value="Сохранить">
    </form>
</div>