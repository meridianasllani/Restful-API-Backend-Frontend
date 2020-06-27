<template>
  <div class="services container">
	<Alert_StreamingServices v-if="alert" v-bind:message = "alert" />
    <h1 class="page-header">Menaxho Serviset</h1>
	  <input class="form-control" placeholder="Kerko Servisin" v-model="filterInput">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Servisi</th>
				<th>Lansimi</th>
				<th>Perdoruesit</th>
				<th>Mbulueshmeria</th>
				<th>Progresi</th>
				<th>Kontenti</th>
				<th>Vlera</th>
				<th>Cmimi Minimal</th>
			</tr>
		</thead>
		<tbody>
			<tr v-for="services in filterBy(streamingservices, filterInput)">
				<td>{{services.Servisi_SS}}</td>
				<td>{{services.Lansimi_SS}}</td>
				<td>{{services.Perdoruesit_SS}}</td>
				<td>{{services.Mbulueshmeria_SS	}}</td>
				<td>{{services.Progresi_SS}}</td>
				<td>{{services.Kontenti_SS}}</td>
				<td>{{services.Vlera_SS}}</td>
				<td>{{services.CmimiMinimal_SS}}</td>
				<td>
				<router-link class="btn btn-primary" v-bind:to="'/Edit_StreamingServices/'+services.id_SS">Modifiko</router-link>
				<button class="btn btn-danger" v-on:click="Delete_StreamingService(services.id_SS)" v-bind:message='alert'>Fshij</button>
				</td>
			</tr>
		</tbody>
	</table>
	</div>
</template>

<script>
	import Alert_StreamingServices from './Alert_StreamingServices';
		export default {
			name: 'streamingservices',
				data () {
					return {
					streamingservices: [],
					alert:'',
					filterInput:''
					}
					},
					methods: {
					fetchstreamingservices(){
					this.$http.get('http://slimapp/api/streamingservices')
					.then(function(response){
					this.streamingservices = response.body;
					});
					},
					filterBy(list, value){
						value=value.charAt(0).toUpperCase()+value.slice(1);
						return list.filter(function(services){
						return services.Servisi_SS.indexOf(value) > -1; });
						},
					Delete_StreamingService(id_SS) {
					this.$http.delete('http://slimapp/api/streamingservice/delete/'+id_SS)
					.then(function(response) {
					this.$router.push({ query: {alert: 'E dhena eshte fshire!'} });
					});
					}
					},
					created: function(){
					if(this.$route.query.alert){
					this.alert = this.$route.query.alert;
					}
					this.fetchstreamingservices();
					},
					updated: function() {
					this.fetchstreamingservices();
					},
					components: {
				Alert_StreamingServices
			}
		}
</script>
</style>