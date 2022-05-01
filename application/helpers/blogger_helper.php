<?php
if (! function_exists("gettopics")) {

    function gettopics()
    {
        $CI = &get_instance();
        $CI->load->model("Blogger_db");
        return $CI->Blogger_db->getAllTopics();
    }
}

if (! function_exists("bloggernavigation")) {

    function bloggernavigation($role = NULL)
    {
        
        
        
        if ($role == "Admin") {

            return '<ul class="nav nav-tabs">
            
  <li class="nav-item">
    <a class="nav-link"   href=' . base_url("/blogger/users/") . '>Users</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href=' . base_url("blogger/posts") . '>Posts</a>
  </li>
   <li class="nav-item">
    <a class="nav-link" href=' . base_url("blogger/topics") . '>Topics</a>
  </li>
   <li class="nav-item">
  <a class="nav-link" href=' . base_url("blogger/create_edit_posts") . '>Create Post</a>
  </li>
      
  <li class="nav-item">
  <a class="nav-link" href=' . base_url("blogger/logout") . '>Logout</a>
  </li>
      
      
</ul>';
        } 
        else if ($role == "Author") {

            return '<ul class="nav nav-tabs">
                
 
  <li class="nav-item">
    <a class="nav-link " href=' . base_url("blogger/posts") . '>Posts</a>
  </li>
   <li class="nav-item">
    <a class="nav-link" href=' . base_url("blogger/topics") . '>Topics</a>
  </li>
   <li class="nav-item">
  <a class="nav-link" href=' . base_url("blogger/create_edit_posts") . '>Create Post</a>
  </li>
      
       <li class="nav-item">
  <a class="nav-link" href=' . base_url("blogger/logout") . '>Logout</a>
  </li>
      
      
</ul>';
        }else{
            
            return '<ul class="nav nav-tabs">
                
                
 
       <li class="nav-item">
  <a class="nav-link" href=' . base_url("blogger/login") . '>Login</a>
  </li>
      
      
</ul>';
        }
    }
}

?>