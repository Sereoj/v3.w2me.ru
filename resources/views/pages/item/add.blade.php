@section('content')
    <div class="row gy-4">
        <form method="post">
            @csrf
            <h2>{{ $header ?? '' }}</h2>
            <div class="mb-3">
                <label for="nameTheme" class="form-label">Имя темы:</label>
                <input type="text" class="form-control" id="nameTheme" placeholder="Theme 1">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Описание:</label>
                <textarea class="form-control" id="description" rows="3"></textarea>
            </div>
            <div class="d-flex align-items-start">
                <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <button class="nav-link active" id="v-sunrise-tab" data-bs-toggle="pill" data-bs-target="#v-sunrise" type="button" role="tab" aria-controls="v-sunrise" aria-selected="true">Рассвет</button>
                    <button class="nav-link" id="v-day-tab" data-bs-toggle="pill" data-bs-target="#v-day" type="button" role="tab" aria-controls="v-day" aria-selected="false">День</button>
                    <button class="nav-link" id="v-sunset-tab" data-bs-toggle="pill" data-bs-target="#v-sunset" type="button" role="tab" aria-controls="v-sunset" aria-selected="false">Закат</button>
                    <button class="nav-link" id="v-night-tab" data-bs-toggle="pill" data-bs-target="#v-night" type="button" role="tab" aria-controls="v-night" aria-selected="false">Ночь</button>
                </div>
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-sunrise" role="tabpanel" aria-labelledby="v-sunrise-tab">Рассвет</div>
                    <div class="tab-pane fade" id="v-day" role="tabpanel" aria-labelledby="v-day-tab">День</div>
                    <div class="tab-pane fade" id="v-sunset" role="tabpanel" aria-labelledby="v-sunset-tab">Закат</div>
                    <div class="tab-pane fade" id="v-night" role="tabpanel" aria-labelledby="v-night-tab">Ночь</div>
                </div>
            </div>
        </form>
    </div>
@endsection

