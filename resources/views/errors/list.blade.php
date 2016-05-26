@if($errors -> any())
    <ul class="aleart aleart-danger">
        @foreach($errors -> all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif