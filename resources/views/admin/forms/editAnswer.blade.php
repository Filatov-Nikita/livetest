<div class="back"><a href="{{route('admin.showTestPage', ['id' => $test_id])}}">Назад</a></div>
<div class="title"><h2> Редактирование ответа: "{{$answer->text}}"</h2></div>
<div class="container">
    <form action="" method="POST">
        {{csrf_field()}}
        <div>
            <label for="text">Текст</label> <input type="text" name="text" id="text" value="{{$answer->text}}">
        </div>
        <input type="submit" value="Сохранить">
    </form>
</div>