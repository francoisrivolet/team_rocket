<?php require_once($_SERVER['DOCUMENT_ROOT']."/imie/boutique/views/aside.php"); ?>

<div class="container-fluid">
	<div class="row">
		<form class="form-horizontal" method="post">
		    	<h1 id="connexion-titre">Connexion</h1>
		    	<div class="form-group">
		      		<label for="inputEmail" class="col-xs-2 control-label">Email</label>
		      		<div class="col-sm-10 col-md-6 ">
		        		<input type="text" class="form-control" id="inputEmail" name="email" placeholder="Email">
					</div>
			    </div>
			    <div class="form-group">
			      	<label for="inputPassword" class="col-xs-2 control-label">Password</label>
			      	<div class="col-sm-10 col-md-6">
			        	<input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password">
			        </div>
			    </div>
			    <div class="form-group">
				    <div class="col-md-10 col-md-offset-2">
				        <input class="btn btn-primary" type="submit" name="connexion" value="Connexion" />
				        <a href="index.php?c=users&a=inscription">S'inscire ?</a>
			      	</div>
			    </div>
		</form>
	</div>
</div>
