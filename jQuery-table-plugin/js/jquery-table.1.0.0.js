// 用来给表格增加样式的插件
;(function ($) {
$.fn.table = function (options) {
	// 默认参数配置
	var defaults = {
		evenRowClass:'evenRow',
		oddRowClass:'oddRow',
		currentRowClass:'currentRow',
		eventType:'mouseover',
	};
	// 参数合并
	var options = $.extend(defaults, options);

	this.each(function () {
		// todo
		var _this = $(this);
		// 奇数行增加Class
		_this.find('tr:even').addClass(options.evenRowClass);
		// 偶数行增加Class
		_this.find('tr:odd').addClass(options.oddRowClass);

		// 鼠标事件
		_this.find('tr').bind(options.eventType,function () {
			$(this).addClass(options.currentRowClass).siblings().removeClass(options.currentRowClass)
		})
		
	})
	// 返回对象 以供进行其他链式操作
	return this;
}

})(jQuery);