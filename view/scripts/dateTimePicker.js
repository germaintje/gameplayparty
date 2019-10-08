/**
 * @@@
 * DateTimePicker / Available Calendar (version)
 */
'use strict';

(function(factory) {
  if (typeof define === 'function' && define.amd) {
		// AMD. Register as an anonymous module.
		define(['jquery'], factory);
  } else if (typeof exports === 'object') {
    // CommonJS
    factory(require('jquery'));
  } else {
    // Browser globals
    factory(jQuery);
  }
}(function($) {
	var plugin_name = 'calendar',
			data_key = 'plugin_' + plugin_name,
			defaults = {
				modifier: 'datetimepicker', // wrapper class
				day_name: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'], //  0-6 = sunday -> saturday
				day_first: 0,
				month_name: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
				paging: ['<i class="prev"></i>', '<i class="next"></i>'],
				unavailable: [], // static data - to merge with dynamic data
				adapter: null, // host to get json data of unavailable date
				month: null, // month of calendar = month in js + 1, month in js = 0-11
				year: null, // year of calendar
				num_next_month: 0, // number of next month to show
				num_prev_month: 0, // number of prev month to show
				num_of_week: 6, // number of week need to show on calendar number/auto
				onSelectDate: function(date, month, year){}, // trigger on select
			};

	var Plugin = function(options){
		var date = new Date();

		this.options = options;
		this.$element = $(options.element);
		this.options.year = this.$element.data('year') || this.options.year || date.getFullYear();
		this.options.month = this.$element.data('month') || this.options.month || date.getMonth() + 1;
		this.options.month--;

		// for plugin
		this.unavailable = []; // for check for unavailable dates

		this.init.call(this);
		return this;
	};

	Plugin.prototype = {
		init: function(){
			var _this = this;

			// re-sort day_name & create day_index
			this.day_index = [];
			this.options.day_name = this.options.day_name.slice(this.options.day_first).concat(this.options.day_name.slice(0, this.options.day_first));
			for (var i = 0; i < this.options.day_name.length; i++){
				this.day_index.push((this.options.day_first + i + 7) % 7);
			}
			this.update();
		},

		/**
		 * Update data, get json from adapter, generate search keywords & send to adapter
		 * @return {[type]} [description]
		 */
		update: function(){
			var _this = this, months = this.getMonths();

			// get data
			if (typeof this.options.adapter === 'string'){
				$.getJSON(this.options.adapter, {
					keys: $(months).map(function(item){
						// format search key from js to database store
						return this.year + '-' + (this.month <= 8?'0':'') + (this.month + 1);
					}).toArray()
				}, function(data){
					_this.unavailable = _this.options.unavailable.concat(data);
					_this.draw(months);
				});
			}else{
				this.unavailable = this.options.unavailable;
				this.draw(months);
			}
		},

		/**
		 * Draw months list to element
		 * @param  {[type]} months array of {month: ..., year: ...} object
		 * @return {[type]}        [description]
		 */
		draw: function(months){
			this.$element.empty();
			for (var i in months){
				this.$element.append(this.getCalendar(months[i].month, months[i].year));
			}
		},

		/**
		 * Get list of months need to show
		 * @return {[type]} [description]
		 */
		getMonths: function(){
			var date = new Date(), result = [];
			for (var i = this.options.month - this.options.num_prev_month; i <= this.options.month + this.options.num_next_month; i++){
				date.setFullYear(this.options.year);
        		date.setDate(1);
				date.setMonth(i);
				result.push({
					month: date.getMonth(),
					year: date.getFullYear()
				});
			}
			return result;
		},

		/**
		 * Load previous month
		 * @return {[type]} [description]
		 */
		prevMonth: function(){
			this.options.month--;
			this.update();
		},

		/**
		 * Load next month
		 * @return {[type]} [description]
		 */
		nextMonth: function(){
			this.options.month++;
			this.update();
		},

		/**
		 * [getCalendar description]
		 * @param  {[type]} month 0 - 11 (Jan - Dec)
		 * @param  {[type]} year  full year
		 * @return {[type]}       dom element
		 */
		getCalendar: function(month, year){
			var _this = this, date = new Date();
			date.setFullYear(year);
      		date.setDate(1);
			date.setMonth(month);
      			
			var day_first = date.getDay();

			// total date
			date.setMonth(date.getMonth() + 1);
			date.setDate(0);
			var total_date = date.getDate();

			// begin date
			var date_start = this.day_index.indexOf(day_first);

			// total week need to show
			var total_week;
			if (!isNaN(this.options.num_of_week)){
				total_week = 6;
			}else{
				total_week = Math.ceil((date_start + total_date)/7);
			}

			// draw
			return $('<div>').addClass(this.options.modifier).append([
				$('<div>').addClass('paging').append(function(){
					return [
						$('<span>').addClass('prev').append(_this.options.paging[0]).click(function(){
							_this.prevMonth();
						}),
						$('<div>').addClass('month-name').append([_this.options.month_name[date.getMonth()], ', ', date.getFullYear()]),
						$('<span>').addClass('next').append(_this.options.paging[1]).click(function(){
							_this.nextMonth();
						}),
					];
				}),
				$('<table>').append(function(){
					return [
						$('<thead>').append(function(){
							return $(_this.options.day_name).map(function(index, element){
								return $('<td>').append(element);
							}).toArray();
						}),
						$('<tbody>').append(function(){
							var ap = [];
							for (var i = 0; i < total_week; i++){
								ap.push($('<tr>').append(function(){
									var ap = [];
									for (var j = 0; j < 7; j++){
										var d = new Date();
										d.setFullYear(year);
                    					d.setDate(1);
										d.setMonth(month);
										//console.log(month, year);
										//d.setDate(1);
										d.setDate(-date_start + (j + 1)+(i*7));
										//var available = me.options.filter.call(me, d);
										ap.push($('<td>').addClass(function(){
											var cls = [];
											if (_this.isAvailable(d.getDate(), d.getMonth() + 1, d.getFullYear())){
												cls.push('available');
											}else{
												cls.push('unavailable');
											}
											if (d.getMonth() == date.getMonth()){
												cls.push('cur-month');
											}else{
												cls.push('near-month');
											}
											return cls.join(' ');
										}).data({date: d.getDate(), month: d.getMonth() + 1, year: d.getFullYear()}).append(d.getDate()).click(function(){
											var date = $(this).data('date'),
											month = $(this).data('month'),
											year = $(this).data('year');
											_this.options.onSelectDate.call(_this, date, month, year);
										}));
									}
									return ap;
								}));	
							}
							return ap;
						})
					];
				})

			]);
		},

		/**
		 * Check the date book: date, month, year have to in MySql format
		 * Base on this.unavailable data / input MySql date format (support glob)
		 * Eg: ['year-month-date', '*-month-date']
		 * @param  {[type]}  date  [description]
		 * @param  {[type]}  month month in javascript = 0-11, month in MySql = 1-12, so month input have to +1 before run this function
		 * @param  {[type]}  year  [description]
		 * @return {Boolean}       [description]
		 */
		isAvailable: function(date, month, year){
			for (var i in this.unavailable){
				var book_date = this.unavailable[i].split('-');
				if (book_date.length !== 3){
					return false;
				}else if (
					(book_date[0] == '*' || book_date[0] - year === 0)	&&
					(book_date[1] == '*' || book_date[1] - month === 0) &&
					(book_date[2] == '*' || book_date[2] - date === 0)
				){
					return false;
				}
			}
			return true;
		},
	};

	$.fn[plugin_name] = function (options){
		return this.each(function(){
			var data = $(this).data(data_key);
			if (!data){
				$(this).data(data_key, new Plugin($.extend({
					element: this
				}, defaults, options)));
			}
			if (typeof options === 'string'){
				$(this).data(data_key)[options].call(this);
			}
		});
	};
}));