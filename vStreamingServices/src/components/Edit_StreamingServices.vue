<template>
<div class="edit container">
<Alert v-if="alert" v-bind:message='alert' />
<h1 class="page-header">Modifiko te Dhenat</h1>
<form v-on:submit="updateService">
        <div class="well">
            <h4>Informata te pergjithshme</h4>
            <div class="form-group">
                <label>Servisi</label>
                <input type="text" class="form-control" placeholder="Servisi" v-model="services.Servisi_SS">
            </div>
            <div class="form-group">
                <label>Lansimi</label>
                <input type="text" class="form-control" placeholder="Lansimi" v-model="services.Lansimi_SS">
            </div>
			 <div class="form-group">
                <label>Perdoruesit</label>
                <input type="text" class="form-control" placeholder="Perdoruesit" v-model="services.Perdoruesit_SS">
            </div>
		</div>
		<div class="well">
			<h4>Lejueshmeria</h4>
            <div class="form-group">
                <label>Mbulueshmeria</label>
                <input type="text" class="form-control" placeholder="Mbulueshmeria" v-model="services.Mbulueshmeria_SS">
            </div>
			<div class="form-group">
                <label>Progresi</label>
                <input type="text" class="form-control" placeholder="Progresi" v-model="services.Progresi_SS">
            </div>
            <div class="form-group">
                <label>Kontenti</label>
                <input type="text" class="form-control" placeholder="Kontenti" v-model="services.Kontenti_SS">
            </div>
		</div>
		<div class="well">
			<h4>Kapitali</h4>
            <div class="form-group">
                <label>Vlera</label>
                <input type="text" class="form-control" placeholder="Vlera" v-model="services.Vlera_SS">
            </div>
			<div class="form-group">
                <label>Cmimi Minimal</label>
                <input type="text" class="form-control" placeholder="Cmimi Minimal" v-model="services.CmimiMinimal_SS">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Modifiko</button>
    </form>
  </div>
</template>
<script>

import Alert_StreamingServices from './Alert_StreamingServices';
export default {
name: 'add',
data () {
return {
services: {},
alert:''
}
},
methods: {
	updateService(e){
		if(!this.services.Servisi_SS || !this.services.Lansimi_SS || !this.services.Perdoruesit_SS || !this.services.Mbulueshmeria_SS || !this.services.Progresi_SS 
		|| !this.services.Kontenti_SS || !this.services.Vlera_SS || !this.services.CmimiMinimal_SS) {
			console.log('Ju lutem plotesoni te gjithe fushat e kerkuara');
		} else {
			let updService = {
					Servisi_SS: this.services.Servisi_SS,
                    Lansimi_SS: this.services.Lansimi_SS,
                    Perdoruesit_SS: this.services.Perdoruesit_SS,
                    Mbulueshmeria_SS: this.services.Mbulueshmeria_SS,
                    Progresi_SS: this.services.Progresi_SS,
                    Kontenti_SS: this.services.Kontenti_SS,
                    Vlera_SS: this.services.Vlera_SS,
					CmimiMinimal_SS: this.services.CmimiMinimal_SS
			}
			
			this.$http.put('http://slimapp/api/streamingservice/update/'+this.$route.params.id_SS, updService)
			.then(function(response){
				this.$router.push({path: '/', query: {alert: 'Te dhenat jane Modifikuar'}});
			});
			e.preventDefault();
		}
		e.preventDefault();
	},
}
}
</script>
</style>