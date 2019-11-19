<main class="card p-3">
    <div class="col-lg-12 mt-3">
        <h4>Course</h4>
        <hr>
    </div>
    <div class="col-lg-12 mt-4">
        <table id="pass" class="table table-hover table-sm table-bordered" cellspacing="0" width="100%">
            <thead class="text-white bg-info">
                <tr>
                    <th width="10%">#</th>
                    <th width="40%">Course Name</th>
                    <th width="40%">Course Code</th>
                    <th width="10%">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1. </td>
                    <td>ADCA</td>
                    <td>001</td>
                    <td><a class="btn btn-sm btn-outline-info" href="#"><i class="fa fa-eye"></i></a></td>
                </tr>
            </tbody>
        </table>
    </div>

</main>
<script type="text/javascript">
    $(document).ready(function() {
        $('#pass').DataTable({
            "pageLength": 10
        });
    });

</script>
