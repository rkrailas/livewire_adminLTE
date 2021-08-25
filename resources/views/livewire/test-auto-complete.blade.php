<div>
    <div class="container">
        <div class="form-group">
            <label>Customer : </label>
                <div class="input-field">
                    <input type="text" id="searchhere_id" class="form-control" placeholder="Enter Customer" />
                </div>
            <label>Customer Code : </label>
            <input type="text" id="cust_code_id" class="form-control" /><br />
            <label>Customer Name : </label>
            <input type="text" id="cust_name" class="form-control" /><br />
        </div>
    </div>
</div>

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

<!-- <style>

.input-field ul  {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

.input-field li {
   float: left;
}

.input-field li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.input-field li a:hover:not(.active) {
  background-color: #111;
}

.input-field .active {
  background-color: #4CAF50;
}

</style> -->

@endpush

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js">
</script>

<script type="text/javascript">
$(document).ready(function() {
    //ดึงข้อมูล Customer
    $.ajax({
        type: 'get',
        url: 'findcustomers',
        success: function(response) {
            //console.log(response);

            //material css
            //convert array to object
            var cusArray = response;
            var dataCust = {};
            var dataCust2 = {};
            for (var i = 0; i < cusArray.length; i++) {
                dataCust[cusArray[i].name] =
                null; //ควรเป็น customerid + name เพราะอาจจะเจอ name ที่ซ้ำกัน
                dataCust2[cusArray[i].name] = cusArray[i];
            }
            //console.log("dataCust2");
            //console.log(dataCust2);

            $('input#searchhere_id').autocomplete({
                data: dataCust,
                onAutocomplete: function(reqdata) {
                    console.log(reqdata);
                    $('#cust_code_id').val(dataCust2[reqdata]['customerid']);
                    $('#cust_name').val(dataCust2[reqdata]['name']);
                }
            });
        }
    })
});
</script>

@endpush