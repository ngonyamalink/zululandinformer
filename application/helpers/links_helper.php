<?php
if (! function_exists("links")) {

    function links()
    {
        return '<div class="sidebar-social" align="center">

<ul>
<li>
<a href=' . base_url("welcome/index/0/1") . ' title="Buy & Sell" target="_blank" rel="nofollow"><i class="fa fa-shopping-cart"></i>
  <span>Buy & Sell</span></a></li>

<li><a href=' . base_url("welcome/index/0/2") . ' title="Buy & Sell" target="_blank" rel="nofollow"><i class="fa fa-car"></i><span>Travelling</span></a>
</li>
        
<li><a href=' . base_url("welcome/index/0/3") . ' title="Get Music" target="_blank" rel="nofollow"><i class="fa fa-music"></i><span>Get Music</span></a>
</li>
        
<li><a href="https://ngonyamalink.co.za/lostandfoundza/" title="Lost & Found" target="_blank" rel="nofollow"><i class="fa fa-hand-o-up"></i><span>Lost & Found</span></a>
</li>
        
<li><a href="URL-HERE" title="Advertising" target="_blank" rel="nofollow"><i class="fa fa-bullhorn"></i><span>Advertising</span></a>
</li>

<li><a href=' . base_url("welcome/careers") . ' title="Careers Central" target="_blank" rel="nofollow"><i class="fa fa-graduation-cap"></i><span>Careers Central</span></a> 
</li>

 
</ul>
</div>';
    }
}

?>