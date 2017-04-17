<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
    <head>
        <title>微信分享代码</title>
        <script type="text/javascript" src="js/jweixin-1.0.0.js"></script>
    </head>
    <body>
        <?php
            // 包含微信分享类
            include 'JSSDK.php';
            $jssdk = new JSSDK($appId,$appSecret);
            $signPackage = $jssdk->getSignPackage();
        ?>
        <script type="text/javascript">
            wx.config({
                debug:true  ,//开启true提示alert 信息
                appId: '<?= $signPackage["appId"];?>',//公众号的唯一标识
                timestamp: '<?= $signPackage["timestamp"];?>',//生成签名的时间戳
                nonceStr: '<?= $signPackage["nonceStr"];?>',//生成签名的随机串
                signature: '<?= $signPackage["signature"];?>',
                jsApiList: [
                    'onMenuShareTimeline',//分享到朋友圈
                    'onMenuShareAppMessage',//分享朋友
                  // 所有要调用的 API 都要加到这个列表中
                ]
            });
            wx.ready(function () {
                // 分享到朋友圈
                wx.onMenuShareTimeline({
                    link: '', // 分享链接
                    title: '', // 分享标题
                    imgUrl: '', // 分享图标
                    success: function () {},
                    error: function () {}
                });
            })
        </script>
    </body>
</html>