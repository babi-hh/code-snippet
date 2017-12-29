# PHP The right way Notes

## PSR 规范

### PSR-1 基础编码规范
#### 1 概览
---
* PHP 代码文件**必须**以`<?php` 或 `<?=` 标签开始
* PHP 文件必须已 `不带BOM的UTF-8` 编码
* 类的命名遵循`UserModel` 大驼峰的命名规范
* 类常量必须大写, 单词用下划线分割
* 方法命名遵循小写驼峰`getUserInfo`

#### 2文件
---
##### 2.1 PHP标签
PHP标签**必须**使用`<?php ?>` 长标签或 `<?=?>`短标签
##### 2.2 字符编码
PHP代码**必须**且只可使用`不带BOM的UTF-8`编码
##### 2.3 副作用
一个PHP文件中**应该**要不就只定义新的声明, 如类/函数/常量等不产生副作用的操作, 要不只产生`副作用`的操作, 但不要两者兼有
[副作用]: 仅仅用过包含文件, 不直接声明类/函数/常量等, 而执行的逻辑操作
[副作用] 包含去不仅限于
* 生成输出
* 直接的`require`或`include`
* 链接外部服务
* 修改ini配置
* 修改全局或静态变量
* 读写文件等

### PSR-2 编码风格规范
---
#### 1概览
* 代码**必须**遵循**PSR-1**中的编码规范
* 代码**必须**使用4个 空格符而不是[Tab键]缩进
* 每个`namespace`和`use`语句后, **必须**插入一个空白行
* 类属性和方法**必须**添加访问修饰符(`private`, `protected`, `public`), `abstract`以及`final` **必须**声明在访问修饰符前面, 而`static`**必须**在访问修饰符之后

#### 2通则
---
* **必须**遵循`PSR-1`中的规范
* **必须**使用LF作为行的结束符
* **必须**以一个空白行作为结束
* 纯PHP文件**必须**省略最后的`?>`结束标签
```php
    <?php
    namespace Vendor\Package;

    use FooClass;
    use BarClass as Bar;
    use OtherVendor\OtherPackage\BazClass;

    class ClassName extends ParentClass implements \ArrayAccess, \Countable
    {
        // 这里面是常量、属性、类方法
    }
```

#PHP
---
## 依赖管理
### Conposer与Packagist
Composer是个**杰出**的依赖管理器
Linux 全局安装, 即 把可执行文件复制到 /usr/local/bin/
`sudo mv composer.phar /usr/local/bin/conposer`
### 更新依赖
---
Composer会建立一个composer.lock文件, 在你第一次执行 php composer install 时, 存放下载的每个依赖包精确的版本编号. 加入你要分享你的项目给其他开发者, 并且composer.lock文件也在分享的文件中的话. 其他开发者只需执行`php composer.phar install`这个命令便可以得到与自己一样的依赖版本

### PEAR 介绍
---
PEAR是另一个常用的依赖包管理器
PEAR需要扩展包有专属的结构, 开发者开发扩展包的时候提前考虑为PEAR定制, 否则后面将无法使用PEAR
PEAR安装扩展包的时候, 是全局安装的, 意味着一旦安装了某个扩展包, 同一台服务器商定所有项目都能使用, 当然, 当需要不同版本的时候就会有冲突

### 使用UTF-8编码
---
#### PHP层的UTF-8
当处理一些Unicode字符串的时候, 请务必使用`mb_xx`函数

#### 数据库层面的UTF-8
---
为了确保字符串从PHP到MySql都是用UTF-8, 确保数据库和表都是用utf8mb4
* utf8mb4(完整的utf8) 4个字节
* utf8 3个字节 一般情况都能适用, 但遇到特殊汉字表情等就无法使用了, 可以根据情况使用`utf8mb4`来替代
---
### 浏览器层面的UTF-8
一个很好的做法是使用 Header: Content-Type 相应头中进行设置, 因为这么速度会更快

## 依赖注入
### 基本概念
* **依赖注入** 通过构造注入, 函数调用或属性的设置来提供组件的依赖关系(动态的将某种依赖关系注入到对象中)
* **解耦**  将两个或多个原来相互影响的现在让他们独立发展, 各自干各自的活互不影响
* **控制反转** 通过配置文件将控制权交给容器去实现了程序之间的低耦合

## 安全
* [阅读 OWASP 安全指南](https://www.owasp.org/index.php/Guide_Table_of_Contents)
* [生存手册: PHP安全](http://phpsecurity.readthedocs.org/en/latest/index.html)

### 密码哈希
* **加盐**处理
* 使用 `password_hash()` 已经处理好了加盐
* `password_verify()` 

### 数据过滤
---
* 使用`filter_xxx()` 系统函数来有效的过滤接收的数据
* 使用`strip_tags()`来去除HTML标签或者使用`htmlentities()`或是`htmlspecialchars()`来对特殊字符本别进行转义从而得到各自的HTML实体
* 最后 接收外部输入来从文件系统中加在文件. 这时候需要过滤掉 `/`,`../`, `null字符`或其他文件路径的字符

## 缓存
### Opcode 缓存
当一个PHP文件被解释执行的时候, 首先是被编译成名为Opcodes的中间码, 然后才被底层的虚拟机执行. 如果PHP文件没有被修改过, opcode始终是一样的.

---
### 对象缓存
有时缓存代码中的单个对象会很有用, 比如有些需要很大开销获取的数据或者一些结果集不怎么变化的数据查询. 可以使用APCu 或者 Memcached

---
2017-12-29 13:45

