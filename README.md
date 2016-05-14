# phone-message-test
#### 开发环境准备
1. 本功能以LAMP为开发环境，请确保电脑上已安装LAMP,具体安装过程参见[ubuntu下 LAMP的安装](http://www.jianshu.com/p/71f11fce9ab4)。
2. 安装LAMP后，还要确保安装curl。安装过程如下
```
sudo apt-get install curl libcurl3 libcurl3-dev php5-curl
sudo /etc/init.d/apache2 restart //重启Apache服务器
```
####数据库phone_message_test表信息
* code
```
CREATE TABLE `code` (
  `code_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `phonenum` char(11) DEFAULT NULL,
  `code` char(6) DEFAULT NULL,
  `send_time` datetime DEFAULT NULL,
  PRIMARY KEY (`code_id`)
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8; 
```
表code包含四列，code_id记录用户注册的顺序，同时用作主键;phonenum记录手机号码;code记录验证码;send_time记录验证码发送的。


####流程讲解
生活中，我们经常会遇到利用手机验证码验证身份的情况。其大致流程如下：
1.输入手机号码，点击获取验证码后，服务器生成一个验证码，将手机号和验证码作为一条记录插入到数据库中，同时调用第三方短信接口，将验证码发送到手机上。
2.我们接收到验证码后，在网页上填写验证码，点击提交。服务器接受验证码和手机号，在数据库中进行查找，若有符合的记录，则可以确定是本人操作，可放行让其进行余下操作。否则不允许继续操作。

####补充：
1. 以上实战开发忽略了实际情况的细节部分，如时间限制等。着重讲解手机短信验证功能的流程。
2. 本文以API Store中的凯德通短信接口为例。


##License
Apache 









