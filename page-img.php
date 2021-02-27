<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php
/**
 * Lens风格相册
 *
 * @package custom
 */
?>
<!-- 
作者：夏目贵志
https://xiamuyourenzhang.cn/article/35.html
时间:2021-02-26 版权所有，请勿删除 
-->
<!-- jsdelivr公共CDN -->
<?php
function usePublicCdn()
{
	echo "https://cdn.jsdelivr.net/gh/xiamuguizhi/typecho-page-photo@0.1";
}
?>  
<!DOCTYPE html>
<html>
	<head>
<title><?php $this->title() ?> - <?php $this->options->title() ?></title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
<?php $this->header(); ?>
		<link rel="stylesheet" type="text/css" href="<?php usePublicCdn(); ?>/assets/css/fontawesome-all.min.css" />
		<link rel="stylesheet" type="text/css" href="<?php usePublicCdn(); ?>/assets/css/main.css" />
		<link rel="stylesheet" type="text/css" href="<?php usePublicCdn(); ?>/assets/css/noscript.css" />
		<noscript><link rel="stylesheet" href="<?php usePublicCdn(); ?>/assets/css/noscript.css" /></noscript>
		<link rel="stylesheet" href="<?php usePublicCdn(); ?>/assets/css/main.css" />
		<link rel="stylesheet" href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css">
		<link rel="stylesheet" href="//at.alicdn.com/t/font_1635479_m8o2ir6mitf.css">
		<script src="https://at.alicdn.com/t/font_1635479_m8o2ir6mitf.js"></script>  
	</head>
	<body class="is-preload">
		<!-- Wrapper -->
		<div id="wrapper">
				<!-- Header -->
					<header id="header">
						<h1><a href="<?php $this->options->siteUrl(); ?>"><strong><?php $this->options->title() ?></strong></a>の时光相册</h1>
						<nav>
							<ul>
								<li><a type="button" id="fullscreen" class="btn btn-default visible-lg visible-md" alt="切换全屏"><svg  class="icon-zmki zmki_dh zmki_wap" aria-hidden="true"><use xlink:href="#icon-zmki-ziyuan-copy"></use></svg></a></li>
								<li><a href="#footer" class="icon solid fa-info-circle">关于</a></li>
							</ul>
						</nav>
					</header>
					<!-- Main -->
			<div id="main" >	
					
	<?php
	 
 
	$page=$_GET['page'];//获取当前页数
	 
	$max=999;//设置每页显示图片最大张数
	 
	$path="./img"; //图片所在目录
	 
		$html = $this->row['text']; //文章纯文本化
		
		$array= explode("\n",$html); //分割换行符,存入数组
			
	 	$i=count($array); //获取数组 array  全部图片数量

		
		for ($j=$max*$page;$j<($max*$page+$max)&&$j<$i;++$j){//循环条件控制显示图片张数
			
		$post = explode('@',$array[$j]); 	
		
		echo "<article class=\"thumb img-area\"> <a class=\"image my-photo\"  alt=\"loading\"  data-src=\"".$post[3]."\"  href=\"".$post[3]."\" > <img class=\"zmki_px  my-photo\" data-src=\"".$post[3]."\"  /> </a> <h2>".$post[0]."</h2> <p><p>".$post[1]."</p><p>".$post[2]."</p></p> </article>";
		
		
	}


	 
		/**	 照片分页  使用前请设置  $max=999;  页面输出照片数量 

		$Previous_page=$page-1;
		 
		$next_page=$page+1;
		 
		if ($Previous_page<0){
		 
			echo "上页";
		 
			echo "<a href=?page=$next_page>下页</a>";
		 
		}
		 
			else if ($page<=$i/$max-2){
		 
			  echo "<a href=?page=$Previous_page>上页</a>";
		 
			  echo "<a href=?page=$next_page>下页</a>";}
		 
				else{
		 
				  echo " <a href=?page=$Previous_page>上页</a>";
		 
				  echo "下页";
		 
				}

		**/	 

	?>			
			

				  				</div> 

 				<!-- Footer -->
					<footer id="footer" class="panel">
						<div class="inner split">
							<div class="inner split">
							<div>
								<section>
									<h2>关于相册</h2>
									<p><?php $this->fields->jianjie()?></p>
								</section>
								<section>
									<h2>联系我</h2>
									<ul class="icons">								
									<li><a href="<?php $this->options->siteUrl(); ?>" target="_blank" class="icon brands fa-telegram"><span class="label">HOOME</span></a></li>
									<li><a href="<?php $this->fields->myqq()?>"  target="_blank" class="icon brands fa-qq"><span class="label">QQ</span></a></li>
									<li><a href="<?php $this->fields->myweibo()?>"  target="_blank" class="icon brands fa-weibo"><span class="label">weibo</span></a></li>
									<li><a href="<?php $this->fields->mygithub()?> "  target="_blank" class="icon brands fa-github"><span class="label">GitHub</span></a></li>
										</ul>
								</section> 
								<span style="color: #b5b5b5; font-size: 0.8em;">
									</span>								
									<p class="copyright">
									&copy; Design HTML UP  Modify BY <a href="https://xiamuyourenzhang.cn/">Xiamu</a>  Theme:<a href="https://xiamuyourenzhang.cn/">Time</a>.
								</p>
								<div>
							</div>
							</div>
							<div>
					</footer>
</div>	
<script type="text/javascript">
function isInSight(el) {
  const bound = el.getBoundingClientRect();
  const clientHeight = window.innerHeight;
  //如果只考虑向下滚动加载
  //const clientWidth=window.innerWeight;
  return bound.top <= clientHeight + 100;
}

let index = 0;
function checkImgs() {
  const imgs = document.querySelectorAll('.my-photo');
  for (let i = index; i < imgs.length; i++) {
    if (isInSight(imgs[i])) {
      loadImg(imgs[i]);
      index = i;
    }
  }
  // Array.from(imgs).forEach(el => {
  //   if (isInSight(el)) {
  //     loadImg(el);
  //   }
  // })
}

function loadImg(el) {
  if (!el.src) {
    const source = el.dataset.src;
    el.src = source;
  }
}

function throttle(fn, mustRun = 10) {
  const timer = null;
  let previous = null;
  return function() {
    const now = new Date();
    const context = this;
    const args = arguments;
    if (!previous) {
      previous = now;
    }
    const remaining = now - previous;
    if (mustRun && remaining >= mustRun) {
      fn.apply(context, args);
      previous = now;
    }
  }
}
 		</script>
		  <script>
    window.onload=checkImgs;
    window.onscroll = throttle(checkImgs);
  </script>
</div> 
		<!-- Scripts -->
			<script src="<?php usePublicCdn(); ?>/assets/js/jquery.min.js"></script>
			<script src="<?php usePublicCdn(); ?>/assets/js/jquery.poptrox.min.js"></script>
			<script src="<?php usePublicCdn(); ?>/assets/js/browser.min.js"></script>
			<script src="<?php usePublicCdn(); ?>/assets/js/breakpoints.min.js"></script>
			<script src="<?php usePublicCdn(); ?>/assets/js/util.js"></script>
			<script src="<?php usePublicCdn(); ?>/assets/js/main.js"></script>
			
	</body>
</html>
