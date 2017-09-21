
<aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">
                  <li>
                      <a class="" href="<?php echo base_url()?>Admin/Home">
                          <i class="icon_house_alt"></i>
                          <span>Home</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="<?php echo base_url()?>Admin/Menu/manageMenu" class="">
                          <i class="icon_menu"></i>
                          <span>Menu</span>

                      </a>

                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_documents_alt"></i>
                          <span>Pages</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="<?php echo base_url()?>Admin/Page/createPage">Create a new Page</a></li>

                          <li><a class="" href="<?php echo base_url()?>Admin/Page/managePage"><span>Manage Page</span></a></li>

                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="<?php echo base_url()?>Admin/PageSection/managePageSection" class="">
                          <i class="icon_documents_alt"></i>
                          <span>Pages Sections</span>

                      </a>

                  </li>
                  <li class="sub-menu">
                      <a href="<?php echo base_url()?>Admin/Department/manageDepartment" class="">
                          <i class="icon_book"></i>
                          <span>Departments</span>

                      </a>

                  </li>

                  <li class="sub-menu">
                      <a href="<?php echo base_url()?>Admin/Course/manageCourse" class="">
                          <i class="icon_book_alt"></i>
                          <span>Courses</span>

                      </a>

                  </li>
                  <li class="sub-menu">
                      <a href="<?php echo base_url()?>Admin/CourseSection/manageCourseSec" class="">
                          <i class="icon_book_alt"></i>
                          <span>Course Sections</span>

                      </a>

                  </li>
                  <li class="sub-menu">
                      <a href="<?php echo base_url()?>Admin/Faculty/manageFaculty" class="">
                          <i class="icon_group"></i>
                          <span>Faculty</span>

                      </a>


                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_group"></i>
                          <span>Users</span>

                      </a>

                  </li>
                  <li class="sub-menu">
                      <a href="<?php echo base_url()?>Admin/Event/manageEvent" class="">
                          <i class="icon_clock"></i>
                          <span>Events</span>

                      </a>

                  </li>

                  <li class="sub-menu">
                      <a href="<?php echo base_url()?>Admin/News/manageNews" class="">
                          <i class="icon_tag"></i>
                          <span>News</span>

                      </a>

                  </li>

                  <li class="sub-menu">
                      <a href="<?php echo base_url()?>Admin/Photo/managePhoto" class="">
                          <i class="icon_image"></i>
                          <span>Photo</span>

                      </a>

                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_genius"></i>
                          <span>Affiliations</span>

                      </a>

                  </li>



                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_comment"></i>
                          <span>Feedbacks</span>

                      </a>

                  </li>

                  <li class="sub-menu">
                      <a href="<?php echo base_url()?>Admin/CollegeInfo/createCollegeInfo" class="">
                          <i class="icon_info"></i>
                          <span>College Info</span>

                      </a>

                  </li>

              </ul>
              <!-- sidebar menu end-->
          </div>
</aside>
<script>

    $(function() {

//        var pgurl = window.location.href;
//        var pgurl1 = '<?php //echo $this->uri->segment(2);?>//'
//        $(".sidebar-menu li").each(function(){
//
//            if(pgurl==''){
//                $(".sidebar-menu li:eq(1)").addClass("active");
//            }else {
//
//                if ($('a', this).attr("href") == pgurl || $('a', this).attr("href") == '') {
//                    $(this).addClass("active");
//                    $(pgurl1).addClass("active");
//
//                }
//
//            }
//        })

        $this.parents("ul").find("a").removeClass('active');
    });

</script>
