<div>
    <div class="content">
        <div class="container box">
            <h3 align="center">Typeahead Autocomplete Textbox</h3>
            <div class="form-group">
                <input type="text" name="customer" id="customer" class="form-control"
                    placeholder="Enter Customer" />
                <div id="customerList"></div>
            </div>

        </div>
    </div>
</div>

@push('js')
<script>
var path = "{{ url('getbuyer/action') }}";
$('#customer').typeahead({
    source: function(query, process) {
        return $.get(path, {
            query: query
        }, function(data) {
            return process(data);
        });
    }
});

</script>
@endpush