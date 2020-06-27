<template>
<div class="Add container">
<h1 class="page-header">Shto te Dhena</h1>
<form v-on:submit="addService">
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
        <button type="submit" class="btn btn-primary">Shto</button>
    </form>
  </div>
</template>
<script>

export default {
name: 'add',
data () {
return {
services: {}
}
},
methods: {
	addService(e){
		if(!this.services.Servisi_SS || !this.services.Lansimi_SS || !this.services.Perdoruesit_SS) {
			console.log('Ju lutem plotesoni te gjithe fushat e kerkuara');
		} else {
			let newService = {
					Servisi_SS: this.services.Servisi_SS,
                    Lansimi_SS: this.services.Lansimi_SS,
                    Perdoruesit_SS: this.services.Perdoruesit_SS,
                    Mbulueshmeria_SS: this.services.Mbulueshmeria_SS,
                    Progresi_SS: this.services.Progresi_SS,
                    Kontenti_SS: this.services.Kontenti_SS,
                    Vlera_SS: this.services.Vlera_SS,
					CmimiMinimal_SS: this.services.CmimiMinimal_SS
			}
			
			this.$http.post('http://slimapp/api/streamingservice/add', newService)
			.then(function(response){
				this.$router.push({path: '/', query: {alert: 'E dhena u Shtua!'}});
			});
			e.preventDefault();
		}
		e.preventDefault();
	}
}
}
</script>
</style>