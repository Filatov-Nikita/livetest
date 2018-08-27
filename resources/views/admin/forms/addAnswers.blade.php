<div class="back"><a href="{{route('admin.showTestPage', ['id' => $test_id])}}">Назад</a></div>
<div class="title"><h2> Добавление ответа к вопросу: "{{$question->name}}"</h2></div>
<div class="container">
    <form action="" method="POST">
        {{csrf_field()}}
        <div>
            <label for="text">Текст</label> <input type="text" name="text" id="text">
        </div>
        <input type="submit" value="Сохранить">
    </form>
</div>