@section('content')
    <div class="row gy-4">
        <form method="post">
            @csrf
            <h2>{{ $header ?? '' }}</h2>
            <div class="mb-3">
                <label for="nameTheme" class="form-label">Имя темы:</label>
                <input type="text" class="form-control" id="nameTheme" placeholder="Theme 1" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Описание:</label>
                <textarea class="form-control" id="description" required></textarea>
            </div>
            <div class="mb-3 col-md-3">
                <select class="form-select">
                    <option value="Mac">Mac</option>
                    <option value="Mac">Mac</option>
                </select>
            </div>
            <div class="mb-3 col-md-3">
                <label for="money" class="form-label">Цена:</label>
                <input type="number" class="form-control" name="money" id="money" value="0" placeholder="Theme 1">
            </div>
            <div class="d-flex align-items-start">
                <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <button class="nav-link active" id="v-preview-tab" data-bs-toggle="pill" data-bs-target="#v-sunrise" type="button" role="tab" aria-controls="v-preview" aria-selected="true">Превью</button>
                    <button class="nav-link" id="v-sunrise-tab" data-bs-toggle="pill" data-bs-target="#v-sunrise" type="button" role="tab" aria-controls="v-sunrise" aria-selected="false">Рассвет</button>
                    <button class="nav-link" id="v-day-tab" data-bs-toggle="pill" data-bs-target="#v-day" type="button" role="tab" aria-controls="v-day" aria-selected="false">День</button>
                    <button class="nav-link" id="v-sunset-tab" data-bs-toggle="pill" data-bs-target="#v-sunset" type="button" role="tab" aria-controls="v-sunset" aria-selected="false">Закат</button>
                    <button class="nav-link" id="v-night-tab" data-bs-toggle="pill" data-bs-target="#v-night" type="button" role="tab" aria-controls="v-night" aria-selected="false">Ночь</button>
                </div>
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-preview" role="tabpanel" aria-labelledby="v-preview-tab">Превью</div>
                    <div class="tab-pane fade" id="v-sunrise" role="tabpanel" aria-labelledby="v-sunrise-tab">Рассвет</div>
                    <div class="tab-pane fade" id="v-day" role="tabpanel" aria-labelledby="v-day-tab">День</div>
                    <div class="tab-pane fade" id="v-sunset" role="tabpanel" aria-labelledby="v-sunset-tab">Закат</div>
                    <div class="tab-pane fade" id="v-night" role="tabpanel" aria-labelledby="v-night-tab">Ночь</div>
                </div>
            </div>
            <div class="mb-3">
                <label for="tags" class="form-label">Теги:</label>
                <input type="text" class="form-control" name="tags" id="tags" value="tag1, tag2" placeholder="tag1, tag2" required>
            </div>
            <button class="btn btn-primary" type="submit" name="send" value="true">Отправить</button>
        </form>
    </div>
@endsection

