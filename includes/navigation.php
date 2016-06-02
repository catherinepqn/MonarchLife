<!-- bootstrap -->
<div id="navigation">
      <ul class="nav navbar-nav">
        <li><a href="/index.php">Home</a></li>
 <li><a href="/about.php">About</a></li>
<li><a href="http://www.odu.edu/">ODU</a></li>
<li><a href="/contact.php">Contact</a></li>
<li><a href="/public_events.php">Public Events</a></li>
<li><a href="/odu_resources.php">ODU Resources</a></li>


        <form id="searchform" method="POST" action="includes/search.php" class="navbar-form navbar-left" role="search">
        <div class="form-group">
        <input type="text" name="search" class="form-control" placeholder="Search">
	<select name="field" class="form-control" >
	<option>Users</option>
	<option>Events</option>
	<option>Resources</option>
	</select>
        </div>
        <input type="submit" class="btn btn-default" value="Search">
      </form>
</ul>
</div>


<?php if(isLoggedin()): ?>
<div id="navigation">
<ul class="nav navbar-nav navbar-right">
<li><a href="/includes/logout.php">Logout</a></li>
</ul>
</div>
<?php else: ?>
<div id="navigation">
<ul class="nav navbar-nav navbar-right">
	  <li><a href="typical_register.php">Register</a></li>
          <li class="divider-vertical"></li>
          <li class="dropdown">
            <a class="dropdown-toggle" href="#" data-toggle="dropdown">Log In <strong class="caret"></strong></a>
            <div class="dropdown-menu" style="padding: 15px; padding-bottom: 0px;">
                <form id="navlogin" action="includes/process_login.php" method="post" name="nav_login_form">
		    <p>Username:</p>
                    </p> <input type="text" align="center" name="username" value=""><br>
		    <p>Password:</p>
                    </p><input type="password" name="password" value="" style="min-width:3em;max-width:25em"><br><br>
		    <center><input type="submit" class="btn btn-info" value="Submit" /></center> 
		    <br>
                </form>
            </div>
          </li>
        </ul>
		</div>
<?php endif; ?>
