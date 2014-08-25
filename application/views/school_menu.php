<!-- begin #sidebar -->
<div id="sidebar" class="sidebar">
    <!-- begin sidebar scrollbar -->
    <div data-scrollbar="true" data-height="100%">
        <!-- begin sidebar user -->
        <ul class="nav">
            <li class="nav-profile">
                <!--                <div class="image">
                                    <a href="javascript:;"><img src="assets/img/user-11.jpg" alt="" /></a>
                                </div>
                                <div class="info">
                                    Sean Ngu
                                    <small>Front end developer</small>
                                </div>-->
            </li>
        </ul>
        <!-- end sidebar user -->
        <!-- begin sidebar nav -->
        <ul class="nav">
            <li class="nav-header">Navigation</li>
            <li class="has-sub active">
                <a href="javascript:;">
                    <i class="fa fa-suitcase"></i> 
                    <b class="caret pull-right"></b>
                    <span>SUBJECTS </span> 
                </a>

                <ul class="sub-menu">
                    <li><a href="<?= site_url('admin/opertions/subjects'); ?>">
                            Add Subject</a></li>
                    <li><a href="<?= site_url('admin/list_details/subjects'); ?>">View Subjects</a></li>
                     <li><a href="<?= site_url('admin/set_class_subject/subjects'); ?>">Assign subjects to class</a></li>


                </ul>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <i class="fa fa-suitcase"></i> 
                    <b class="caret pull-right"></b>
                    <span>Class</span> 
                </a>
                <ul class="sub-menu">
                    <li><a href="<?= site_url('admin/opertions/class'); ?>">
                            Add Class </a></li>
                    <li><a href="<?= site_url('admin/opertions/section'); ?>">
                            Add Section</a></li>
                    <li><a href="<?= site_url('admin/list_details/class'); ?>">View Classes List</a></li>
                    <li><a href="<?= site_url('admin/list_details/section'); ?>">View Sections List</a></li>
                   
                    

                </ul>
            </li>
           <li class="has-sub">
                <a href="javascript:;">
                    <i class="fa fa-suitcase"></i> 
                    <b class="caret pull-right"></b>
                    <span>EXAMS </span> 
                </a>

                <ul class="sub-menu">
                    <li><a href="<?= site_url('admin/opertions/exams'); ?>">
                            Add Exam</a></li>
                    <li><a href="<?= site_url('admin/list_details/exams'); ?>">View Exams</a></li>
                    <li><a href="<?= site_url('admin/set_class_subject/exams'); ?>">Assign exams to class</a></li>


                </ul>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <i class="fa fa-cogs"></i>
                    <b class="caret pull-right"></b>
                    <span>STUDENTS </span>
                </a>
                <ul class="sub-menu">
                    <li><a href="<?= site_url('admin/student_add'); ?>">Add Student</a></li>
                    <li><a href="<?= site_url('admin/test'); ?>">Add Student Details</a></li>
                    <li><a href="<?= site_url('admin/selected_student'); ?>">View Student Details</a></li>
                    

                </ul>
            </li>
            
      

        </ul>
        <!-- end sidebar nav -->
    </div>
    <!-- end sidebar scrollbar -->
</div>
<!-- end #sidebar -->

<script>
    $(function(){
       var url = window.location.href;
       var active_link= $('.nav a').filter(function() {
       var arr = url.split("admin");
       //alert(arr[0] + ':'+ arr[1]);
       var arr2=arr[1].split("/");
       //alert(arr2.length);
       //For edit page urls
       if(arr2.length == 4){
            url=arr[0]+"admin"+arr2[0]+"/"+arr2[1]+"/"+arr2[2];
            console.log(url);
        }
        return this.href == url;
        });
        $(".nav li.active").removeClass("active");
        active_link.parent().addClass('active');
         
        active_link.parent().parent().parent().addClass('active');
    });

</script>   