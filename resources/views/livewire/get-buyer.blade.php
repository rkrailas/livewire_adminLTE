<div>
    <div class="content">
        <div class="container box">
            <h3 align="center">Typeahead Autocomplete</h3>
            <div class="form-group">
                <input type="text" name="customer" id="customer" class="form-control input-lg"
                    placeholder="Enter Customer" />
                <div id="customerList"></div>
            </div>
            {{ csrf_field() }}
        </div>
    </div>
</div>

@push('js')
    <script>

    var path = "{{ url('getbuyer/action') }}";

    $('#customer').typeahead({

        source: function(query, process){

            return $.get(path, {query:query}, function(data){

                return process(data);

            });
            
        }        

    });

    </script>
@endpush