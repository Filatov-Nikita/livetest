<div class="back"><a href="{{route('admin.showListTests')}}">Назад</a></div>
<div class="title"><h2> Редактирование теста: "{{$test->name}}"</h2></div>
<div class="container">
    <form action="" method="POST">
        {{csrf_field()}}
        <div>
            <label for="name">Название</label> <input type="text" name="name" id="name" value="{{$test->name}}">
        </div>
        <input type="submit" value="Сохранить">
    </form>
</div>