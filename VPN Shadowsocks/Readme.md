# 说明文档
--

## 一 云服务器服务的安装和配置

---
* 首先: 服务器所在区的网络访问没有限制如 google.com
* 按照说明文档在服务器搭建服务(ShadowsocksR一键安装脚本.pdf). 安装完毕后会输出配置项
* 在服务器实例配置中 (以阿里云为例子:)
    * 登录阿里云后台
    * 在`云服务器 ECS`菜单中找到`网络和安全`点击`安全组`配置`安全组规则`
    * 添加`安全组规则` (入方向) 其中 `端口范围` 字段填写在安装服务的时候生成的端口(也可以在安装服务的时候指定端口), 其他字段参考原配置
## 二 客户端配置

---
Windows 客户端压缩包`client/ShadowsocksR-win-4.9.0.zip`, 下载地址: [https://github.com/shadowsocks/shadowsocks-windows/releases](https://github.com/shadowsocks/shadowsocks-windows/releases)

Android 客户端安装包 `client/shadowsocks--universal-4.6.1.apk`, 下载地址: [https://github.com/shadowsocks/shadowsocks-android/releases](https://github.com/shadowsocks/shadowsocks-android/releases)

* 配置: 服务器IP 填写服务器外网IP, 其余项安照服务安装完毕后的输出的选项配置

* Chrome 浏览器插件配置
    * 插件文件`Chrome Plugin/ProxyWwitchYomegav2316.zip`
    