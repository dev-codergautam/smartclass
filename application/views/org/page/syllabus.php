<main class="card p-3">
    <div class="col-lg-12 mt-3">
        <h4>Syllabus</h4>
        <hr>
    </div>
    <?php if(!empty($course)): ?>
        <div class="col-lg-12 mt-4">
            <table id="pass" class="table table-hover table-sm table-bordered" cellspacing="0" width="100%">
                <thead class="text-white bg-info">
                    <tr>
                        <th width="15%">Course Name</th>
                        <th width="15%">Course Code</th>
                        <th width="70%">Subject</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($course as $course): ?>
                    <?php $courseId = $course->courseId ?> 
                    <tr>
                        <td><?php echo $course->courseName; ?></td>
                        <td><?php echo $course->courseCode; ?></td>
                        <td>
                            <?php $syllabus = $this->admin_datawork->get_data('syllabus', ['syCourseName' => $courseId]); ?>
                            <?php if($this->admin_datawork->count_data('syllabus',['syCourseName' => $courseId]) != 0): ?>
                            <?php foreach($syllabus as $syllabus): ?>
                                <?php $data['subname'] = $this->admin_datawork->get_id('subjects', ['subId' => $syllabus->sySubjectName]); ?>
                            <?= $data['subname']['subName']; ?>, &nbsp; &nbsp; &nbsp;
                            <?php endforeach; ?>
                            <?php else: ?>
                            <p>Sorry not any subject added in this course Please add Now </p>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php else: ?>
        <div class="col-lg-12">
            <div class="jumbotron text-center">
                <h4>There isn't any category available</h4>
            </div>
        </div>
        <?php endif; ?>
</main>

<script type="text/javascript">
    $(document).ready(function() {
        $('#pass').DataTable({
            "pageLength": 10
        });
    });
</script>
