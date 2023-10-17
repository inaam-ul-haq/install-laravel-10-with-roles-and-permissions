</div>

<script>
    $(document).ready(function() {
        $('#myTable').DataTable({
            responsive: true
        });
    });
</script>
{{-- dynamic slots here for scripts --}}
@isset($scripts)
    {{ $scripts }}
@endisset

</body>

</html>
