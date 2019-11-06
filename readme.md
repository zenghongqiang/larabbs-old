# larabbs

## 项目简介



使⽤laravel框架创建论坛系统。实现多⻆⾊⽤⼾权限系统、管理员后台



## 安全性

###  XSS 防御
XSS 也称跨站脚本攻击 (Cross Site Scripting)，恶意攻击者往 Web 页面里插入恶意 JavaScript 代码，当用户浏览该页之时，嵌入其中 Web 里面的 JavaScript 代码会被执行，从而达到恶意攻击用户的目的。

一种比较常见的 XSS 攻击是 Cookie 窃取。我们都知道网站是通过 Cookie 来辨别用户身份的，一旦恶意攻击者能在页面中执行 JavaScript 代码，他们即可通过 JavaScript 读取并窃取你的 Cookie，拿到你的 Cookie 以后即可伪造你的身份登录网站。
有两种方法可以避免 XSS 攻击：
 - 第一种，对用户提交的数据进行过滤；
 - 第二种，Web 网页显示时对数据进行特殊处理，一般使用 `htmlspecialchars()` 输出。
 
Laravel 的 Blade 语法 `{{ }}` 会自动调用 PHP `htmlspecialchars` 函数来避免 XSS 攻击。但是因为我们支持 WYSIWYG 编辑器，我们使用的是 `{!! !!}` 来打印用户提交的话题内容：
```html
<div class="topic-body">
    {!! $topic->body !!}
</div>
```
Blade 的 `{!! !!}` 语法是直接数据，不会对数据做任何处理。在我们这种场景下，因为业务逻辑的特殊性，第二种方法不适用，我们将使用第一种方法，对用户提交的数据进行过滤来避免 XSS 攻击。
