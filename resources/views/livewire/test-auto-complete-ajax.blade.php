<div>
    <div class="content">
        <div class="container box">
            <h3 align="center">Ajax Autocomplete Textbox</h3>
            <div class="form-group">
                <input type="text" name="customer" id="customer" class="form-control"
                    placeholder="Enter Customer" />
                <div id="customerList"></div>
            </div>
            {{ csrf_field() }}
        </div>
    </div>
</div>

@push('js')
<script>
$(document).ready(function(){
    $('#customer').keyup(function(){
        var query = $(this).val();
        if(query != '')
        {
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url:"{{ url('autocomplete/fetch') }}",
                method:"POST",
                data:{query:query, _token:_token},
                success:function(data)
                {
                    $('#customerList').fadeIn();
                    $('#customerList').html(data);
                }
            })
        }
    });

    $(document).on('click', 'li', function(){
        $('#customer').val($(this).text());
        $('#customerList').fadeOut();
    });

});

</script>
@endpush