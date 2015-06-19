<html ng-app="app">
<head>
	
	<script src="<? echo site_url("js/angular.min.js"); ?>"></script>
	<script src="<? echo site_url("js/appctrl.js"); ?>"></script>

</head>
<body ng-controller="appctrl">
	
	<br><br>angular form : 
	<input type="text" ng-model="testang">
	<h2><?php echo $title ?></h2>
	<p>{{datatest['set']}} : {{testang}}</p>
	<h2><a href="<?php echo "news/login" ?>">Login</a></h2>
	<h2><a href="<?php echo "news/create" ?>">Create</a></h2>
	<?php foreach ($news as $news_item): ?>

        <h3><?php echo $news_item['title'] ?></h3>
        <div class="main">
                <?php echo $news_item['text'] ?>
        </div>
        <p><a href="<?php echo site_url('news/'.$news_item['slug'])?>">View article</a></p>
        

		
<?php endforeach ?>
</body>

</html>
