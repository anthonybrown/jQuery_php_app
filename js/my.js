/*jslint         browse: true, continue : true,
devel  : true, indent  : 4,    maxerr   : 50,
newcap : true, nomen   : true, plusplus : true,
regexp : true, sloppy  : true, vars     : true,
white  : true
*/
/*global jQuery: false, $: false, Handlebars: false */

(function() {
	
	'use strict';

	var Actors = {
		init: function( config ) {
			this.config = config;

			this.setUpTemplates();
			this.bindEvents();

			$('button').remove();
		},

		bindEvents: function() {
			this.config.letterSelection.on( 'change', this.fetchActors ) ;
			this.config.actorsList.on('click', 'li', this.displayAuthorInfo);
		},

		setUpTemplates: function() {
			this.config.actorListTemplate = Handlebars.compile(this.config.actorListTemplate);

			Handlebars.registerHelper( 'fullName', function(actor) {
				return actor.first_name + ' ' + actor.last_name;
			});
		},

		fetchActors: function() {
			var self = Actors;


			$.ajax({
				url: 'index.php',
				type: 'POST',
				data: self.config.form.serialize(),
				dataType: 'json',
				success: function(results) {
					self.config.actorsList.empty();
					if (results[0] ) {
						self.config.actorsList.append(self.config.actorListTemplate(results));
					} else {
						self.config.actorsList.append('<li><h2 class="null">Nothing to return, sorry</h2></li>');
					}
				}
			});
		},

		displayAuthorInfo: function() {

		}
	};

	Actors.init({
		letterSelection: $('#q'),
		form:$('#actor-selection'),
		actorListTemplate: $('#actor_list_template').html(),
		actorsList: $('ul.actors_list'),
		actorInfo: $('.actor_info')
	});

}());
	








	
