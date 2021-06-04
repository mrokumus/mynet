@if(session()->has('success'))
    <div class="alert alert-success p-2 text-center" id="alert">
        {{ __(ucfirst(session()->get('success'))) }}
    </div>
@endif
<script>
    setTimeout(function() {
        $('#alert').remove();
    }, 3000);
</script>
