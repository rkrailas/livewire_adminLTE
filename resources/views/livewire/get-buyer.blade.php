<div>
    <div class="content">
        <H1>Here</H1>
        <div class="form-group">
            <div class="row mb-2">
                <div class="col">
                    <label>เลขที่ใบกำกับ</label>
                    <input type="text" class="form-control">
                </div>
                <div class="col">
                    <label>เลขที่ใบกำกับ</label>
                    <input type="text" class="form-control">
                </div>
            </div>
            <div class="row mb-2">
                <div class="col">
                    <label>เลขที่ใบกำกับ</label>
                    <input type="text" class="form-control">
                </div>
                <div class="col">
                    <label>เลขที่ใบกำกับ</label>
                    <input type="text" class="form-control">
                </div>
            </div>
        </div>


        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">รหัส</th>
                    <th scope="col">รายละเอียด</th>
                    <th scope="col">บัญชีขาย</th>
                    <th scope="col">จำนวน</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="col">#</th>
                    <td><input type="text" class="form-control" /></td>
                    <td><input type="text" class="form-control" /></td>
                    <td><input type="text" class="form-control" /></td>
                    <td><input type="text" class="form-control" /></td>
                </tr>
                <tr>
                    <th scope="col">#</th>
                    <td><input type="text" class="form-control" /></td>
                    <td><input type="text" class="form-control" /></td>
                    <td><input type="text" class="form-control" /></td>
                    <td><input type="text" class="form-control" /></td>
                </tr>
                <tr>
                    <th scope="col">#</th>
                    <td><input type="text" class="form-control" /></td>
                    <td><input type="text" class="form-control" /></td>
                    <td><input type="text" class="form-control" /></td>
                    <td><input type="text" class="form-control" /></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@push('styles')
<style>
table.table-striped>thead>tr>td,
table.table-striped>tbody>tr>td {
    padding-right: 1px;
    padding-left: 1px;
}
</style>

@endpush