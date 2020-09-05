<?php
require 'Layouts/header.php';
require_once './functions.php';

if (isset($_SESSION["language"])) {
    $idioma = $_SESSION["language"];
}

switch ($idioma) {
    case "es":
        //echo "PAGE ES";
        $disqusLang = "es_AR	";
        break;
    case "en":
        //echo "PAGE EN";
        $disqusLang = "en_US";
        break;
    case "br":
        //echo "PAGE BR";
        $disqusLang = "pt_BR";
        break;
    case "it":
        //echo "PAGE IT";
        $disqusLang = "it";
        break;
    default:
        //echo "PAGE EN - Setting Default";
        $disqusLang = "es_AR";
        break;
}

?>
<head>
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-148932330-1">
    </script>
    <script>
        window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-148932330-1');
    </script>
</head>
<body>
	<br>
    <div class="site-main-container">
        <div class="container no-padding">
            <div class="row">
                <div class="col-lg-12 post-list">
                    <div class="popular-post-wrap">
                    	<br>
                            <div id="disqus_thread"></div>
                            
                            
                            <script>
                            	    var disqus_config = function () {
        this.language = "<?php echo $disqusLang ?>";
		this.page.url = window.location.href;  // Replace PAGE_URL with your page's canonical URL variable
        this.page.url = window.location.href; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };
                                (function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://postaproject-org.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
                            </script>
                            <noscript>
                                Please enable JavaScript to view the
                                <a href="https://disqus.com/?ref_noscript">
                                    comments powered by Disqus.
                                </a>
                            </noscript>
                        </div>
                </div>
            </div>
        </div>
    </div>
</body>
<br>
<?php require 'Views/Layouts/footer.php';?>
