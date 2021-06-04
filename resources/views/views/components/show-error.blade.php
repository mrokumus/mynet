@if ($errors->any())
    <ul class="alert alert-danger m-1 col-12 p-2 text-center" id="alert">
        @foreach ( $errors->all() as $error)
            <li style="list-style-type: none;">{{ __(ucfirst($error)) }}</li>
        @endforeach
    </ul>
@endif
<script>
    setTimeout(function () {
        $('#alert').remove();
    }, 5000);
</script>

