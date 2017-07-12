Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('value');

new Vue({
	el: 'body',

	data: {
		banOption: "restrict",
		banning: false,
		userId: null,
		banExpire: null
	},

	methods: {

		ban: function() 
		{
			this.banning = true;
		},
		closeBan: function()
		{
			this.banning = false;
			this.banOption = "restrict";
		},
		doBan: function()
		{
			window.location.href = this.userId + "/punish/" + this.banOption + '/' + this.banExpire;
		}
	}
});