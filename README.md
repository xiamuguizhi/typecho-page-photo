## 前言

很早以前就想折腾一个相册页面，但是没有好看的样式就一直耽搁了。最近看到了 `Time For Typecho相册模板` 很nice啊不过要更换主题感觉太浪费了,后面又发现 `photo page for typecho` 独立页面模板支持两种样式但是他使用的是js动态输出。我就寻思自己折腾一下,就参考了两者搞了相册独立页面模板这样和博客现有主题不冲突两者兼得。

## 声明

主题样式：[https://github.com/wclk/time][1]

参考代码：

- [photo page for typecho][2]
- [php自动读取文件夹下所有图片并分页显示][3]

## 介绍

1.支持延迟加载
2.支持图片分页

## 效果

[预览][4]

![请输入图片描述][5]

## 下载

github:[https://github.com/xiamuguizhi/typecho-page-photo][6]

本站:https://xiamuyourenzhang.cn/usr/uploads/2021/02/1684881163.zip

## 使用

1.下载 ` page-img.php ` 放到主题根目录就可以

2.新建独立页面，选择模板 `Lens风格相册`

![58327-pvunhz7s4n.png](https://xiamuyourenzhang.cn/usr/uploads/2021/02/4112791603.png)

3.一些设置

点击添加字段，填入相对应文字或者链接！

`jianjie`
`myqq`
`myweibo`
`mygithub`

![29434-5og7rl0ktl5.png](https://xiamuyourenzhang.cn/usr/uploads/2021/02/3056446612.png)

![86868-uu82g1zm21.png](https://xiamuyourenzhang.cn/usr/uploads/2021/02/3375218564.png)

3.添加图片格式

`  标题@时间@描述@图片地址  `  一张图片一行,记得换行｛如下:｝

`泉州少林寺@2021年2月 泉州@第一次到了泉州少林寺@http://127.0.0.1/tp/img/ia_100000001765.jpg`

![81773-f39v0ji002d.png](https://xiamuyourenzhang.cn/usr/uploads/2021/02/982965768.png)

## 核心详解

很简单的代码，看完你可以把相册主题改成追番列表什么的 都可以 哈哈

```PHP

	<?php
	 
 
	$page=$_GET['page'];//获取当前页数
	 
	$max=999;//设置每页显示图片最大张数
	 
	 
		$html = $this->row['text']; //获取文章内容纯文本化
		
		$array= explode("\n",$html); //分割换行符,存入数组
			
	 	$i=count($array); //获取数组 array  全部图片数量 分页使用

		
		for ($j=$max*$page;$j<($max*$page+$max)&&$j<$i;++$j){//循环条件控制显示图片张数
			
		$post = explode('@',$array[$j]);   // 分割数组  @ 在存入数组 方便读取

//.$post[0].  标题  .$post[1]. 时间   .$post[2].  描述 .$post[3].  图片地址
		
		echo "<article class=\"thumb img-area\"> <a class=\"image my-photo\"  alt=\"loading\"  data-src=\"https://a-oss.zmki.cn/2020/20200212-fcf30f3d33625.gif\"  href=\"".$post[3]."\" > <img class=\"zmki_px  my-photo\" data-src=\"".$post[3]."\"  /> </a> <h2>".$post[0]."</h2> <p><p>".$post[1]."</p><p>".$post[2]."</p></p> </article>";
		
		
	}


	 
		/**	 照片分页  使用前请设置  $max=999;   还有 把注释去掉    页面输出照片数量 

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

```
![25098-gvyszx5k9e6.png](https://xiamuyourenzhang.cn/usr/uploads/2021/02/91208297.png)


  [1]: https://github.com/wclk/time
  [2]: https://github.com/zzd/photo-page-for-typecho
  [3]: https://blog.csdn.net/on996163/article/details/10897837
  [4]: https://xiamuyourenzhang.cn/page/photoalbum.html
  [5]: https://vkceyugu.cdn.bspapp.com/VKCEYUGU-2fa930c8-feec-4942-ac88-ba3781377bb0/4924de1f-a643-4e75-9898-b6a8debe4121.png
  [6]: https://github.com/xiamuguizhi/typecho-page-photo
