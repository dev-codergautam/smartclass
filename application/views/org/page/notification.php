<main class="card p-3">
    <div class="col-lg-12 mt-3">
        <h4 class="float-left">Notification</h4>
        <h4 class="float-right"></h4>
    </div>
    <hr>
    <div class="col-lg-12 mt-4">
        <table id="pass" class="table table-hover table-sm table-bordered" cellspacing="0" width="100%">
            <thead class="text-white bg-info">
                <tr>
                    <th width="10%">Date</th>
                    <th width="10%">Time</th>
                    <th width="70%">Notification</th>
                    <th width="10%" class="text-center">Link</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($notification as $notice): ?>
                <tr>
                    <td>
                        <?= $notice->notificationDate ?>
                    </td>
                    <td>
                        <?= $notice->notificationTime ?>
                    </td>
                    <td>
                        <?= $notice->notificationTitle ?>
                    </td>
                    <td class="text-center">
                        <?php $url =  $notice->notificationURL; ?>
                        <?php if($url != ""): ?>
                        <a class="btn btn-sm mr-1 btn-info" target="_blank" href=" <?= $notice->notificationURL; ?>"><i class="fa fa-link"></i></a>
                        <?php else: ?>
                        <?php endif ?>
                    </td>
                </tr>
                <?php endforeach; ?>
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
