 <!-- sidebar (container) -->

<div id="sidebar">
  <!-- sidebar wrap -->
  <div class="wrap">
	{user}{logout}{change_password}
	{date}
     <ul>
	 
		<li><?php //$this->load->view( "sidebar/searchform"); ?></li>
 		<li><?php // $this->load->view( "sidebar/topnote"); ?></li>


	<!--	<li>
		  <ul class="nav">
		    <li class="cat-item"><a href="{site_url}"><span>Rollout<span</a></li>
			<li class="cat-item"><a href="{site_url}blog"><span>Blog<span</a></li>
			<li class="cat-item"><a href="{site_url}forum"><span>Forum</span></a></li>
		  </ul>
		</li> -->

		<!-- <li><img class="logo" src="{site_url}images/logo.gif" /></li> -->

		<!--<li id="linkcat-2" class="linkcat"><h2>Blogroll</h2>
			<ul class="xoxo blogroll">
				<li><a href="development/">Development Blog</a></li>
				<li><a href="documentation">Documentation</a></li>
				<li><a href="plugins">Plugins</a></li>
				<li><a href="ideas">Suggest Ideas</a></li>
				<li><a href="support">Support Forum</a></li>
			</ul>
		</li> -->

				
		<li><?php //$this->load->view( "sidebar/calendar"); ?></li>
		
	</ul>
  </div><!-- /sidebar wrap -->
  <li><img class="logo" src="{site_url}images/logo.gif" /></li>
</div><!-- /sidebar -->

