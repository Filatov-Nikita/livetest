<div class="back"><a href="{{route('admin.showTestPage', ['id' => $test_id])}}">Назад</a></div>
<div class="title"><h2> Редактирование вопроса: "{{$question->name}}"</h2></div>
<div class="container">
    <form action="" method="POST">
        {{csrf_field()}}
        <div>
            <label for="name">Название</label> <input type="text" name="name" id="name" value="{{$question->name}}">
        </div>
        <input type="submit" value="Сохранить">
    </form>
</div>